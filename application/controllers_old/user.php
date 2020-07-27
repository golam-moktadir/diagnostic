<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class user extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->model('Common_model');
    }
	public function index(){
		if($this->session->has_userdata('username')){
			
		}
		else{
			redirect(base_url().'user/login');
		}
    }
    public function login(){

		if($this->input->post('submit')){
    		$this->form_validation->set_rules('username', "Username", 'required', ['required' => 'Please input Username']);
    		$this->form_validation->set_rules('password', "Password", 'required');	

    		if($this->form_validation->run() == false){
				$this->load->view('admin/user/login');
    		}		
    		else{
    			
    		}
		}
		else{
			$this->load->view('admin/user/login');
		}
    }
}