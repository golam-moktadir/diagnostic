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
	// public function index(){
 //        $data['admit_patients'] = $this->Join_model->admitPatients();
 //        $data['all_patient'] = $this->Join_model->admissionInvoice();
 //        $data['all_doctor'] = $this->Common_model->get_all_info_orderby('doctor', 'record_id', 'DESC');
 //        $data['categories'] = $this->Common_model->get_all_info_orderby('operation_category', 'record_id', 'DESC');

	// 	$this->load->view('admin/header');
	// 	$this->load->view('admin/admission/admission-new',$data);
	// 	$this->load->view('admin/footer');
	// }
	public function getOperationName(){
		$category_id = $this->input->post('category_id');
		$names = $this->Common_model->get_all_info_by_array('operation_name',['category_id' => $category_id]);
        $data = "<option value=''>-- Select --</option>";
      	foreach($names as $name){
      	$data .= "<option value='$name->record_id'>$name->operation_name</option>";	
      	}                              
		echo json_encode($data);
	}
	public function getOperationPrice(){
		$operation_id = $this->input->post('operation_id');
		$data = $this->Common_model->single_row(['record_id' => $operation_id], 'operation_name');
		echo json_encode($data);
	}
	// public function createAdmission(){

	// 	$value = $this->Common_model
	// 				  ->single_row(['admit_id' => $this->input->post('admit_id'),
	// 				  				'operation_id' => $this->input->post('operation_id')
	// 				  			   ],
	// 				  			   'admission_patient');
	// 	if(isset($value->admit_id)){
	// 		$this->session->set_flashdata('error','Already Inserted');
	// 		redirect(base_url().'admission');
	// 	}
	// 	$data = [
	// 			'admit_id' => $this->input->post('admit_id'),
	// 			'patient_id' => $this->input->post('patient_id'),
	// 			'category_id' => $this->input->post('category_id'),
	// 			'operation_id' => $this->input->post('operation_id'),
	// 			'doctor_id' => $this->input->post('doctor_id'),
	// 			'anesthesia_id' => $this->input->post('anesthesia_id'),
	// 			'diagnosis' => $this->input->post('diagnosis'),
	// 			'relation' => $this->input->post('relation'),
	// 			'operation_date' => $this->input->post('operation_date'),
	// 		];
	// 	$this->Common_model->insert_data('admission_patient', $data);
	// 	$this->session->set_flashdata('success','Inserted Successfully');
	// 	redirect(base_url().'admission');
	// }
	// public function editAdmission($record_id, $category_id){
 //        $data['categories'] = $this->Common_model->get_all_info_orderby('operation_category', 'record_id', 'DESC');
 //        $data['operations'] = $this->Common_model->get_all_info_by_array('operation_name', ['category_id'=>$category_id]);
 //        $data['all_doctor'] = $this->Common_model->get_all_info_orderby('doctor', 'record_id', 'DESC');
	// 	$data['admit_patient'] = $this->Join_model->singleAdmissionPatient($record_id);
 //        $data['admit_patients'] = $this->Join_model->admitPatients();

	// 	$this->load->view('admin/header');
	// 	$this->load->view('admin/admission/admission-edit',$data);
	// 	$this->load->view('admin/footer');
	// }
	// public function updateAdmission(){

	// 	$data = [
	// 			'category_id' => $this->input->post('category_id'),
	// 			'operation_id' => $this->input->post('operation_id'),
	// 			'doctor_id' => $this->input->post('doctor_id'),
	// 			'anesthesia_id' => $this->input->post('anesthesia_id'),
	// 			'diagnosis' => $this->input->post('diagnosis'),
	// 			'relation' => $this->input->post('relation'),
	// 			'operation_date' => $this->input->post('operation_date'),
	// 			'advance_fee' => $this->input->post('advance_fee')
	// 		];
	// 	$this->Common_model->update_data_onerow('admission_patient', $data, 'record_id', $this->input->post('record_id'));
	// 	$this->session->set_flashdata('success','Updated Successfully');
	// 	redirect(base_url().'admission');		
	// }
	public function admissionInvoice(){
        $data['invoices'] = $this->Join_model->admissionInvoice();
        $data['all_patient'] = $this->Common_model->get_all_info_orderby('patient','record_id','desc');

		$this->load->view('admin/header');
		$this->load->view('admin/admission/admission-invoice',$data);
		$this->load->view('admin/footer');			
	}
	public function patientBasicInfo(){
		$value = $this->Common_model->single_row(['record_id'=>$this->input->post('patient_id')], 'patient');
		echo json_encode($value);
	}
	public function editAdmissionInvoice($record_id){
        $data['invoices'] = $this->Join_model->admissionInvoice();
        $data['all_patient'] = $this->Common_model->get_all_info_orderby('patient','record_id','desc');
        $data['patient'] = $this->Join_model->getSinglePatientAdmitInfo($record_id);

		$this->load->view('admin/header');
		$this->load->view('admin/admission/edit-admission-invoice',$data);
		$this->load->view('admin/footer');	
	}
	public function admissionCreateInvoice(){
        if($this->input->post('name')){
        	$data = ['name' => $this->input->post('name'), 'mobile' => $this->input->post('mobile')];
        	$value = $this->Common_model->single_row($data, 'patient');
        	
        	if($value->record_id){
        		$this->session->set_flashdata('error', 'This Patient Already Exist in dropdown');
				redirect(base_url().'admission/admission-invoice');
        	}
            $insert_data = [
                    		'name' => $this->input->post('name'),
                    		'age' => $this->input->post('age'),
                    		'mobile' => $this->input->post('mobile'),
                    		'address' => $this->input->post('address')
                        ];      
            $insert_id = $this->Common_model->insert_data('patient', $insert_data);   
        
			$data = [
					'patient_id' => $insert_id,
					'admission_fee' => $this->input->post('admission_fee'),
					'advance_amount' => $this->input->post('advance_amount'),
					'admission_date' => $this->input->post('admission_date')
				];
        }
        else{
            $update_data = [
                  		  'age' => $this->input->post('age'),
                  		  'mobile' => $this->input->post('mobile'),
                 		  'address' => $this->input->post('address'),
                        ];  
            $this->Common_model
            	->update_data_onerow('patient', $update_data, 'record_id', $this->input->post('patient_id'));

			$data = [
					'patient_id' => $this->input->post('patient_id'),
					'admission_fee' => $this->input->post('admission_fee'),
					'advance_amount' => $this->input->post('advance_amount'),
					'admission_date' => $this->input->post('admission_date')
				];
		}
		$invoice_id = $this->Common_model->insert_data('admission_fee_invoice', $data);
		$this->session->set_flashdata('success','Inserted Successfully');
		redirect(base_url().'admission/print-invoice/'.$invoice_id);
	}
	public function updateAdmissionInvoice(){
        $data = [
                	'name' => $this->input->post('name'),
             	    'age' => $this->input->post('age'),
                 	'mobile' => $this->input->post('mobile'),
                	'address' => $this->input->post('address'),
              ]; 
        $this->Common_model
        	->update_data_onerow('patient', $data, 'record_id', $this->input->post('patient_id'));
		$data = [
				'admission_fee' => $this->input->post('admission_fee'),
				'advance_amount' => $this->input->post('advance_amount'),
				'admission_date' => $this->input->post('admission_date')
			];
		$this->Common_model
			->update_data_onerow('admission_fee_invoice', $data, 'record_id', $this->input->post('record_id'));
		$this->session->set_flashdata('success','Updated Successfully');
		redirect(base_url().'admission/admission-invoice');
	}
	public function printInvoice($record_id){
		$data['invoice'] = $this->Join_model->getSinglePatientAdmitInfo($record_id);
		$this->load->view('admin/header');
		$this->load->view('admin/admission/print-invoice',$data);
		$this->load->view('admin/footer');	
	}
	public function deleteAdmissionInvoice($patient_id){
		$value = $this->Common_model->single_row(['patient_id' => $patient_id],'operation_details');
		if(isset($value->patient_id)){
			$this->session->set_flashdata('error', 'This patient Already Admitted For Operation');
			redirect(base_url().'admission/admission-invoice');
		}
		$this->Common_model->delete_info('patient_id', $patient_id,'admission_fee_invoice');
		$this->session->set_flashdata('success', 'Deleted Successfully');
		redirect(base_url().'admission/admission-invoice');
	}
	public function operationdetails(){
        $data['admit_patients'] = $this->Join_model->admissionInvoice();
        $data['categories'] = $this->Common_model->get_all_info_orderby('operation_category', 'record_id', 'DESC');
        $data['all_doctor'] = $this->Common_model->get_all_info_orderby('doctor', 'record_id', 'DESC');
        $data['expenditures'] = $this->Common_model->get_all_info('expenditure');
        $data['invoices'] = $this->Join_model->operationdetails();

		$this->load->view('admin/header');
		$this->load->view('admin/admission/operation-details',$data);
		$this->load->view('admin/footer');		
	}
	public function getExpenditureRate(){
		$record_id = $this->input->post('record_id');
		$value = $this->Common_model->single_row(['record_id' => $record_id],'expenditure');
		echo json_encode($value);
	}
	public function operationDetailsInvoice(){
		$operation_price = $this->input->post('operation_price');
		$total_expenditure_price = $this->input->post('total_expenditure_price');
		$discount = $this->input->post('discount');
		$total_price = $operation_price + $total_expenditure_price;
		$sub_total = $total_price - $discount;
		$payable_amount = $this->input->post('payable_amount');
		$due = $operation_price + $total_expenditure_price - ($payable_amount + $discount);

		$data = [
				'patient_id' => $this->input->post('patient_id'),
				'category_id' => $this->input->post('category_id'),
				'operation_id' => $this->input->post('operation_id'),
				'doctor_id' => $this->input->post('doctor_id'),
				'anesthesia_id' => $this->input->post('anesthesia_id'),
				'diagnosis' => $this->input->post('diagnosis'),
				'operation_date' => $this->input->post('operation_date'),
				'operation_price' => $operation_price,
				'total_price' => $total_price,
				'sub_total' => $sub_total,
				'payable_amount' => $payable_amount,
				'discount' => $discount,
				'due' => $due
			];	
		$invoice_id = $this->Common_model->insert_data('operation_details', $data);

		$expenditure_id = $this->input->post('expenditure_id');
		$new_expenditure_price = $this->input->post('new_expenditure_price');
		for($i = 0; $i < count($expenditure_id); $i++){
       		$this->db->insert('operation_equipment', [
       												'invoice_id' => $invoice_id,
       												'expenditure_id' => $expenditure_id[$i],
       												'new_expenditure_price' => $new_expenditure_price[$i]
       												]);
		}
		$this->session->set_flashdata('success','Invoice Successfully Inserted');
		redirect(base_url().'admission/invoice-individual/'.$invoice_id);	
	}
	public function editOperationDetails($record_id,$category_id){
        $data['admit_patients'] = $this->Join_model->admissionInvoice();
        $data['categories'] = $this->Common_model->get_all_info_orderby('operation_category', 'record_id', 'DESC');
        $data['operations'] = $this->Common_model->get_all_info_by_array('operation_name',['category_id' => $category_id]);
        $data['all_doctor'] = $this->Common_model->get_all_info_orderby('doctor', 'record_id', 'DESC');
        $data['expenditures'] = $this->Common_model->get_all_info('expenditure');
		$data['invoice'] =  $this->Common_model->single_row(['record_id' => $record_id],'operation_details');
        $data['equipments'] = $this->Join_model->equipments($record_id);
        $data['invoices'] = $this->Join_model->operationdetails();
   	
		$this->load->view('admin/header');
		$this->load->view('admin/admission/edit-operation-details',$data);
		$this->load->view('admin/footer');	
	}
	public function updateOperationDetails($record_id){
		$operation_price = $this->input->post('operation_price');
		$total_expenditure_price = $this->input->post('total_expenditure_price');
		$discount = $this->input->post('discount');
		$total_price = $operation_price + $total_expenditure_price;
		$sub_total = $total_price - $discount;
		$payable_amount = $this->input->post('payable_amount');
		$due = $operation_price + $total_expenditure_price - ($payable_amount + $discount);
			
		$data = [
				'patient_id' => $this->input->post('patient_id'),
				'category_id' => $this->input->post('category_id'),
				'operation_id' => $this->input->post('operation_id'),
				'doctor_id' => $this->input->post('doctor_id'),
				'anesthesia_id' => $this->input->post('anesthesia_id'),
				'diagnosis' => $this->input->post('diagnosis'),
				'operation_date' => $this->input->post('operation_date'),
				'operation_price' => $operation_price,
				'total_price' => $total_price,
				'sub_total' => $sub_total,
				'payable_amount' => $payable_amount,
				'discount' => $discount,
				'due' => $due
			];	
		$this->Common_model->update_data_onerow('operation_details', $data,'record_id', $record_id);
		$this->Common_model->delete_info('invoice_id', $record_id, 'operation_equipment');

		$expenditure_id = $this->input->post('expenditure_id');
		$new_expenditure_price = $this->input->post('new_expenditure_price');
		for($i = 0; $i < count($expenditure_id); $i++){
       		$this->db->insert('operation_equipment', [
       												'invoice_id' => $record_id,
       												'expenditure_id' => $expenditure_id[$i],
       												'new_expenditure_price' => $new_expenditure_price[$i]
       												]);
		}
		$this->session->set_flashdata('success','Invoice Successfully Updated');
		redirect(base_url().'admission/operation-details');	
	}
	public function invoiceIndividual($record_id){
		$data['invoice'] =  $this->Join_model->invoiceIndividual($record_id);
        $data['equipments'] = $this->Join_model->equipments($record_id);
		
		$this->load->view('admin/header');
		$this->load->view('admin/admission/invoice-individual',$data);
		$this->load->view('admin/footer');			
	}
	public function deleteOperationDetails($record_id){
		$this->Common_model->delete_info('record_id', $record_id, 'operation_details');
		$this->Common_model->delete_info('invoice_id', $record_id, 'operation_equipment');
		
		$this->session->set_flashdata('success','Invoice Successfully Deleted');
		redirect(base_url().'admission/operation-details');	
	}
}
?>