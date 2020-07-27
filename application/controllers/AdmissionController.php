<?php

/**
 * 
 */
class AdmissionController extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Common_model');
		$this->load->model('Join_model');
	}
	public function index(){
        $data['admit_patients'] = $this->Join_model->admitPatients();
        $data['all_patient'] = $this->Common_model->get_all_info_orderby('patient', 'record_id', 'DESC');
        $data['all_doctor'] = $this->Common_model->get_all_info_orderby('doctor', 'record_id', 'DESC');
        $data['categories'] = $this->Common_model->get_all_info_orderby('operation_category', 'record_id', 'DESC');

		$this->load->view('admin/header');
		$this->load->view('admin/admission/admission-new',$data);
		$this->load->view('admin/footer');
	}
	public function getOperationName(){
		$category_id = $this->input->post('category_id');
		$names = $this->Common_model->get_all_info_by_array('operation_name',['category_id' => $category_id]);
		$data = $this->load->view('admin/admission/get-operation-name',['names' => $names],true);
		echo $data;
	}
	public function createAdmission(){

		if($this->input->post('operation_id') == 0){
			$this->session->set_flashdata('error','Please select Operation Name');
			redirect(base_url().'admission/');
		}
		$data = [
				'patient_id' => $this->input->post('patient_id'),
				'category_id' => $this->input->post('category_id'),
				'operation_id' => $this->input->post('operation_id'),
				'doctor_id' => $this->input->post('doctor_id'),
				'anesthesia_id' => $this->input->post('anesthesia_id'),
				'diagnosis' => $this->input->post('diagnosis'),
				'relation' => $this->input->post('relation'),
				'admission_date' => $this->input->post('admission_date'),
				'operation_date' => $this->input->post('operation_date'),
				'advance_fee' => $this->input->post('advance_fee')
			];
		$this->Common_model->insert_data('admission_patient', $data);
		$this->session->set_flashdata('success','Inserted Successfully');
		redirect(base_url().'admission');
	}
	public function editAdmission($record_id, $category_id){
        $data['categories'] = $this->Common_model->get_all_info_orderby('operation_category', 'record_id', 'DESC');
        $data['operations'] = $this->Common_model->get_all_info_by_array('operation_name', ['category_id'=>$category_id]);
        $data['all_doctor'] = $this->Common_model->get_all_info_orderby('doctor', 'record_id', 'DESC');
		$data['admit_patient'] = $this->Join_model->singleAdmissionPatient($record_id);
        $data['admit_patients'] = $this->Join_model->admitPatients();

		$this->load->view('admin/header');
		$this->load->view('admin/admission/admission-edit',$data);
		$this->load->view('admin/footer');
	}
	public function updateAdmission(){
		if($this->input->post('operation_id') == 0){
			$this->session->set_flashdata('error','Please select Operation Name');
			redirect(base_url().'admission/');
		}
		$data = [
				'category_id' => $this->input->post('category_id'),
				'operation_id' => $this->input->post('operation_id'),
				'doctor_id' => $this->input->post('doctor_id'),
				'anesthesia_id' => $this->input->post('anesthesia_id'),
				'diagnosis' => $this->input->post('diagnosis'),
				'relation' => $this->input->post('relation'),
				'admission_date' => $this->input->post('admission_date'),
				'operation_date' => $this->input->post('operation_date'),
				'advance_fee' => $this->input->post('advance_fee')
			];
		$this->Common_model->update_data_onerow('admission_patient', $data, 'record_id', $this->input->post('record_id'));
		$this->session->set_flashdata('success','Updated Successfully');
		redirect(base_url().'admission');		
	}
	public function operationInvoice(){
        $data['invoices'] = $this->Join_model->operationInvoice();
        $data['all_patient'] = $this->Join_model->admitPatientUnique();

		$this->load->view('admin/header');
		$this->load->view('admin/admission/operation-invoice',$data);
		$this->load->view('admin/footer');		
	}
	public function editOperationInvoice($admission_id){
        $data['invoices'] = $this->Join_model->operationInvoice();
    //    $data['all_patient'] = $this->Join_model->admitPatientUnique();
		$data['invoice'] =  $this->Join_model->invoiceIndividual($admission_id);

		$this->load->view('admin/header');
		$this->load->view('admin/admission/edit-operation-invoice',$data);
		$this->load->view('admin/footer');	
	}
	public function updateOperationInvoice(){
		$advance_fee = $this->input->post('advance_fee');
		$payable_amount = $this->input->post('payable_amount');
		$discount = $this->input->post('discount');
		$operation_price = $this->input->post('operation_price');
		$due = $operation_price - ($advance_fee + $payable_amount + $discount);	

	//	echo $operation_price;exit;
		if($operation_price < $advance_fee){
			$this->session->set_flashdata('error','Advance amount can not be larger than operation price');
			redirect(base_url().'admission/edit-operation-invoice/'.$this->input->post('admission_id'));			
		}
		else if($due < 0){
			$this->session->set_flashdata('error','Payable amount is exced than operation price');
			redirect(base_url().'admission/edit-operation-invoice/'.$this->input->post('admission_id'));			
		}			
		$data = [
				'operation_price' => $operation_price,
				'discount' => $discount,
				'payable_amount' => $payable_amount,
				'due' => $due
			];	
		$this->Common_model->update_data_onerow('operation_invoice', $data,'admission_id', $this->input->post('admission_id'));
		$this->session->set_flashdata('success','Invoice Successfully Updated');
		redirect(base_url().'admission/operation-invoice');	
	}
	public function patientAdmissionInfo(){
		$patient_id = $this->input->post('patient_id');
		$data['patient'] = $this->Common_model->single_row(['record_id' => $patient_id],'patient');
		$data['patients'] = $this->Join_model->patientAdmissionInfo($patient_id);		
		$value = $this->load->view('admin/admission/patient-admission-info', $data, true);
		echo $value;
	}
	public function patientAdmissionAnotherInfo(){
		$data['patient'] = $this->Join_model->patientAdmissionAnotherInfo($this->input->post('record_id'));
		$value = $this->load->view('admin/admission/patient-admission-another-info', $data, true);
		echo $value;
	}
	public function operationCreateInvoice(){
		$advance_fee = $this->input->post('advance_fee');
		$payable_amount = $this->input->post('payable_amount');
		$discount = $this->input->post('discount');
		$operation_price = $this->input->post('operation_price');
		$due = $operation_price - ($advance_fee + $payable_amount + $discount);

		$value = $this->Common_model->single_row(['admission_id' => $this->input->post('record_id')],'operation_invoice');

		if(isset($value->admission_id)){
			$this->session->set_flashdata('error','Already Taken Invoice');
			redirect(base_url().'admission/operation-invoice');			
		}
		else if($operation_price < $advance_fee){
			$this->session->set_flashdata('error','Advance amount can not be larger than operation price');
			redirect(base_url().'admission/operation-invoice');			
		}
		else if($due < 0){
			$this->session->set_flashdata('error','Payable amount is exced than operation price');
			redirect(base_url().'admission/operation-invoice');			
		}		
		$data = [
				'admission_id' => $this->input->post('record_id'),
				'patient_id' => $this->input->post('patient_id'),
				'operation_price' => $operation_price,
				'discount' => $discount,
				'payable_amount' => $payable_amount,
				'due' => $due
			];	
		$this->Common_model->insert_data('operation_invoice', $data);
		$this->session->set_flashdata('success','Invoice Successfully Inserted');
		redirect(base_url().'admission/operation-invoice');	
	}
}
?>