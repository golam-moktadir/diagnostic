<?php
/**
 * 
 */
class OperationController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Common_model');
		$this->load->model('Join_model');
	}
	public function category(){
		$categories = $this->Common_model->get_all_info('operation_category');
		$this->load->view('admin/header');
		$this->load->view('admin/operation/category-new',['categories' => $categories]);
		$this->load->view('admin/footer');
	}
	public function createCategory(){
		$data = ['category_name' => $this->input->post('category_name')];
		
		if($this->input->post('submit')){
			$this->Common_model->insert_data('operation_category', $data);
			$this->session->set_flashdata('success','Category Name Inserted');
		}
		else{
			$this->Common_model->update_data_onerow('operation_category', $data, 'record_id',
				  									$this->input->post('record_id')
				  									);
			$this->session->set_flashdata('success','Category Name Updated');
		}
		redirect(base_url().'operation/category');

	}
	public function editCategory($record_id){
		$categories = $this->Common_model->get_all_info('operation_category');
		$category = $this->Common_model->single_row(['record_id' => $record_id],'operation_category');
		$this->load->view('admin/header');
		$this->load->view('admin/operation/category-edit',['categories' => $categories, 'category' => $category]);
		$this->load->view('admin/footer');
	}
	public function deleteCategory($record_id){
		$category = $this->Common_model->single_row(['category_id' => $record_id],'operation_name');
		if(isset($category->category_id)){
			$this->session->set_flashdata('error','Can not perform this operation. Because Operation Name is inserted Under this category');
		}
		else{
			$this->Common_model->delete_info('record_id',$record_id,'operation_category');
			$this->session->set_flashdata('success','Category Name Deleted Successfully');
		}
		redirect(base_url().'operation/category');

	}
	public function operationName(){
		$categories = $this->Common_model->get_all_info('operation_category');
		$names = $this->Join_model->operationName();
		$this->load->view('admin/header');
		$this->load->view('admin/operation/operation-new',['names' => $names, 'categories' => $categories]);
		$this->load->view('admin/footer');		
	}
	public function createOperationName(){
		$data = [
				 'category_id' => $this->input->post('category_id'),
	     		 'operation_name' => $this->input->post('operation_name'),
				 'rate' => $this->input->post('rate')
				];
		if($this->input->post('submit')){
			$this->Common_model->insert_data('operation_name', $data);
			$this->session->set_flashdata('success','Operation Name Inserted');
		}
		else{
			$this->Common_model->update_data_onerow('operation_name', $data, 'record_id', $this->input->post('record_id'));
			$this->session->set_flashdata('success','Operation Name Updated');
		}
		redirect(base_url().'operation/operation-name');		
	}
	public function editOperationName($record_id){

		$categories = $this->Common_model->get_all_info('operation_category');
		$names = $this->Join_model->operationName();
		$name = $this->Common_model->single_row(['record_id' => $record_id],'operation_name');
		$this->load->view('admin/header');
		$this->load->view('admin/operation/operation-edit',[
													'names' => $names, 
													'categories' => $categories,
													'name' => $name
													]);
		$this->load->view('admin/footer');	
	}
	public function deleteOperationName($record_id){
		$operation = $this->Common_model->single_row(['operation_id' => $record_id],'admission_patient');
		if(isset($operation->operation_id)){
			$this->session->set_flashdata('error','Can not perform this operation. Because Other value is inserted Under this operation Name');
		}
		else{
			$this->Common_model->delete_info('record_id',$record_id,'operation_name');
			$this->session->set_flashdata('success','Operation Name Deleted Successfully');
		}
		redirect(base_url().'operation/operation-name');
	}
	public function expenditure(){
		$expenditures = $this->Common_model->get_all_info('expenditure');
		$this->load->view('admin/header');
		$this->load->view('admin/operation/expenditure-new',['expenditures' => $expenditures]);
		$this->load->view('admin/footer');
	}
	public function createExpenditure(){
		$data = [
					'expenditure_title' => $this->input->post('expenditure_title'),
					'expenditure_rate' => $this->input->post('expenditure_rate')
				];
		
		if($this->input->post('submit')){
			$this->Common_model->insert_data('expenditure', $data);
			$this->session->set_flashdata('success','Expenditure Title Inserted');
		}
		else{
			$this->Common_model->update_data_onerow('expenditure', $data, 'record_id',
				  									$this->input->post('record_id')
				  									);
			$this->session->set_flashdata('success','Expenditure Name Updated');
		}
		redirect(base_url().'operation/expenditure');
	}
	public function operationDetails(){
		$invoices = $this->Join_model->operationInvoice();
		$this->load->view('admin/header');
		$this->load->view('admin/operation/operation-details',['invoices' => $invoices]);
		$this->load->view('admin/footer');		
	}
	public function getInvoiceIndividual(){
		$data['invoice'] =  $this->Join_model->invoiceIndividual($this->input->post('admission_id'));
		//print_r($data['invoice']);
		echo $this->load->view('admin/operation/get-invoice-individual', $data, true);
	}
}
?>