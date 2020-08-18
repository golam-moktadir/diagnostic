<?php

/**
 * 
 */
class ProductController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Common_model');
		$this->load->model('Join_model');
	}
	public function category(){
        $data['all_value'] = $this->Common_model->get_all_info('types_of_product');
        $this->load->view('admin/header');
        $this->load->view('admin/products/category-new', $data);
        $this->load->view('admin/footer');		
	}
	public function createProductCategory(){
		$data = ['types_of_product' => $this->input->post('types_of_product')];
		if($this->input->post('submit')){
			$this->Common_model->insert_data('types_of_product', $data);
		 	$this->session->set_flashdata('success','Inserted Successfully');
		}
		else{
		 $this->Common_model
			->update_data_onerow('types_of_product', $data, 'record_id', $this->input->post('record_id'));
		 $this->session->set_flashdata('success','Updated Successfully');
		}
		redirect(base_url().'product/category');
	}
	public function editCategory($record_id){
        $data['all_value'] = $this->Common_model->get_all_info('types_of_product');
        $data['category'] = $this->Common_model->single_row(['record_id' => $record_id], 'types_of_product');
        $this->load->view('admin/header');
        $this->load->view('admin/products/category-edit', $data);
        $this->load->view('admin/footer');		
	}
	public function product(){
        $data['all_value'] = $this->Common_model->get_all_info('product_name');
        $data['all_product_category'] = $this->Common_model->get_all_info('types_of_product');
        $this->load->view('admin/header');
        $this->load->view('admin/products/product-new', $data);
        $this->load->view('admin/footer');			
	}
	public function createProduct(){
		$data = ['category_id' => $this->input->post('category_id'),
				 'product_name' => $this->input->post('product_name')
				];
		if($this->input->post('submit')){
			$this->Common_model->insert_data('product_name', $data);
		 	$this->session->set_flashdata('success','Inserted Successfully');
		}
		else{
		 $this->Common_model
			->update_data_onerow('product_name', $data, 'record_id', $this->input->post('record_id'));
		 $this->session->set_flashdata('success','Updated Successfully');	
		}
		redirect(base_url().'product/product');	
	}
	public function editProductName($record_id){
        $data['product'] = $this->Common_model->single_row(['record_id' => $record_id], 'product_name');
        $data['all_value'] = $this->Common_model->get_all_info('product_name');
        $data['all_product_category'] = $this->Common_model->get_all_info('types_of_product');
        $this->load->view('admin/header');
        $this->load->view('admin/products/product-edit', $data);
        $this->load->view('admin/footer');		
	}
	public function getDoctorFee(){
        $data = $this->Common_model->single_row(['record_id' => $this->input->post('doctor_id')], 'doctor');
		echo json_encode($data);
	}
}