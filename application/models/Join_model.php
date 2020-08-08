<?php
/**
 * 
 */
class Join_model extends CI_Model
{
	public function admitPatients(){
		$this->db->select('admission_patient.*, patient.name, operation_name.operation_name, DC.name as doctor_name, AN.name as anesthesia');
		$this->db->from('admission_patient');
		$this->db->join('patient','admission_patient.patient_id = patient.record_id');
		$this->db->join('operation_name','admission_patient.operation_id = operation_name.record_id');
		$this->db->join('doctor as DC','admission_patient.doctor_id = DC.record_id');
		$this->db->join('doctor as AN','admission_patient.anesthesia_id = AN.record_id');
		$this->db->order_by('admission_patient.record_id','desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function admissionInvoice(){
		$this->db->select('admission_fee_invoice.*, patient.name, patient.mobile, patient.age, patient.address');
		$this->db->from('admission_fee_invoice');
		$this->db->order_by('admission_fee_invoice.record_id', 'desc');
		$this->db->join('patient','admission_fee_invoice.patient_id = patient.record_id');
		$query = $this->db->get();
		return $query->result();
	}
	public function operationdetails(){
		$this->db->select('operation_details.*, patient.name, operation_name.operation_name');
		$this->db->from('operation_details');
		$this->db->join('patient','patient.record_id = operation_details.patient_id');
		$this->db->join('operation_name','operation_name.record_id = operation_details.operation_id');
		$this->db->order_by('operation_details.record_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function invoiceIndividual($record_id){
		$this->db->select('operation_details.*, patient.name, patient.age, patient.mobile, operation_name.operation_name, DC.name as doctor_name, AN.name as anesthesia');
		$this->db->from('operation_details');
		$this->db->where('operation_details.record_id', $record_id);
		$this->db->join('patient','patient.record_id = operation_details.patient_id');
		$this->db->join('operation_name','operation_name.record_id = operation_details.operation_id');
		$this->db->join('doctor as DC','DC.record_id = operation_details.doctor_id');
		$this->db->join('doctor as AN','AN.record_id = operation_details.anesthesia_id');
		return $this->db->get()->row();
	}
	public function admitPatient($admit_id){
		$this->db->select('admission_patient.*,  operation_name.operation_name, operation_name.rate, DC.name as doctor_name, AN.name as anesthesia');
		$this->db->from('admission_patient');
		$this->db->where('admission_patient.admit_id', $admit_id);
		$this->db->join('operation_name','operation_name.record_id = admission_patient.operation_id');
		$this->db->join('doctor as DC','DC.record_id = admission_patient.doctor_id');
		$this->db->join('doctor as AN','AN.record_id = admission_patient.anesthesia_id');
		$query = $this->db->get();
		return $query->result();
	}
	public function getSinglePatientAdmitInfo($patient_id){
		$this->db->select('admission_fee_invoice.*, patient.age, patient.mobile, patient.address');
		$this->db->from('admission_fee_invoice');
		$this->db->where('admission_fee_invoice.patient_id', $patient_id);
		$this->db->join('patient', 'patient.record_id = admission_fee_invoice.patient_id');
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
	public function equipments($invoice_id){
		$this->db->select('operation_equipment.*, expenditure.expenditure_title');
		$this->db->from('operation_equipment');
		$this->db->where('operation_equipment.invoice_id', $invoice_id);
		$this->db->join('expenditure', 'expenditure.record_id = operation_equipment.expenditure_id');
		return $this->db->get()->result();

	}
}
?>