<?php
/**
 * 
 */
class Join_model extends CI_Model
{
	 public function admitPatientUnique(){
	 	$query = $this->db->query('select distinct admission_patient.patient_id, patient.name from admission_patient join patient on admission_patient.patient_id = patient.record_id');
	 	return $query->result();	
	 } 
	public function admitPatients(){
		$this->db->select('admission_patient.*, patient.name, operation_name.operation_name, DC.name as doctor_name, AN.name as anesthesia');
		$this->db->from('admission_patient');
		$this->db->order_by('admission_patient.record_id', 'desc');
		$this->db->join('patient','admission_patient.patient_id = patient.record_id');
		$this->db->join('operation_name','admission_patient.operation_id = operation_name.record_id');
		$this->db->join('doctor as DC','admission_patient.doctor_id = DC.record_id');
		$this->db->join('doctor as AN','admission_patient.anesthesia_id = AN.record_id');
		$this->db->order_by('admission_patient.record_id','desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function operationInvoice(){
		$this->db->select('operation_invoice.*, patient.name, operation_name.operation_name, admission_patient.advance_fee');
		$this->db->from('operation_invoice');
		$this->db->order_by('operation_invoice.record_id', 'desc');
		$this->db->join('patient','operation_invoice.patient_id = patient.record_id');
		$this->db->join('operation_name','operation_invoice.operation_id = operation_name.record_id');
		$this->db->join('admission_patient','operation_invoice.admission_id = admission_patient.record_id');
		$query = $this->db->get();
		return $query->result();
	}
	public function invoiceIndividual($admission_id){
		$this->db->select('operation_invoice.*, patient.name, patient.age, patient.mobile, patient.address, operation_name.operation_name, DC.name as doctor_name, AN.name as anesthesia, admission_patient.admission_date, admission_patient.operation_date, admission_patient.advance_fee, admission_patient.diagnosis, admission_patient.relation');
		$this->db->from('operation_invoice');
		$this->db->where('operation_invoice.admission_id', $admission_id);
		$this->db->join('admission_patient','operation_invoice.admission_id = admission_patient.record_id');
		$this->db->join('patient','patient.record_id = admission_patient.patient_id');
		$this->db->join('doctor as DC','DC.record_id = admission_patient.doctor_id');
		$this->db->join('doctor as AN','AN.record_id = admission_patient.anesthesia_id');
		$this->db->join('operation_name','operation_name.record_id = admission_patient.operation_id');
		$query = $this->db->get();
		return $query->row();
	}
	public function patientAdmissionInfo($patient_id){
		$this->db->select('admission_patient.*, operation_name.operation_name, operation_name.rate, DC.name as doctor_name, AN.name as anesthesia');
		$this->db->from('admission_patient');
		$this->db->where('admission_patient.patient_id', $patient_id);
		$this->db->join('operation_name','operation_name.record_id = admission_patient.operation_id');
		$this->db->join('doctor as DC','DC.record_id = admission_patient.doctor_id');
		$this->db->join('doctor as AN','AN.record_id = admission_patient.anesthesia_id');
		$this->db->order_by('admission_patient.record_id','desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function patientAdmissionAnotherInfo($record_id){
		$this->db->select('admission_patient.*, DC.name as doctor_name, AN.name as anesthesia, operation_name.rate');
		$this->db->from('admission_patient');
		$this->db->where('admission_patient.record_id', $record_id);
		$this->db->join('doctor as DC', 'DC.record_id = admission_patient.doctor_id');
		$this->db->join('doctor as AN', 'AN.record_id = admission_patient.anesthesia_id');
		$this->db->join('operation_name','operation_name.record_id = admission_patient.operation_id');
		$query = $this->db->get();
		return $query->row();
	}
	public function operationName(){
		$this->db->select('operation_name.*, operation_category.category_name');
		$this->db->from('operation_name');
		$this->db->join('operation_category','operation_category.record_id = operation_name.category_id');
		$query = $this->db->get();
		return $query->result(); 
	}
	public function singleAdmissionPatient($record_id){
		$this->db->select('admission_patient.*, patient.name, patient.age, patient.mobile, patient.address');
		$this->db->from('admission_patient');
		$this->db->where('admission_patient.record_id', $record_id);
		$this->db->join('patient','patient.record_id = admission_patient.patient_id');
		$query = $this->db->get();
		return $query->row(); 
	}
}
?>