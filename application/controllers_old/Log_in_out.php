<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Log_in_out extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Common_model');
    }

    public function index()
    {
        if ($this->session->userdata('ses_logged') == "YES") {
            $array_check_ap = array(
                "date >= " => date('Y-m-d')
            );
            $data['appointment_number'] = count($this->Common_model->get_all_info_by_array('appointment_info', $array_check_ap));
            $data['patient_number'] = count($this->Common_model->get_all_info('patient'));
            $data['medicine_number'] = count($this->Common_model->get_all_info('insert_medicine_info'));
            $data['doctor_number'] = count($this->Common_model->get_allinfo_byid('staff',
                'staff_type', 'Doctor'));
            $data['nurse_number'] = count($this->Common_model->get_allinfo_byid('staff',
                'staff_type', 'Nurse'));
            $data['staff_number'] = count($this->Common_model->get_allinfo_byid('staff',
                'staff_type', 'Staff'));
            $data['enquiry_number'] = count($this->Common_model->get_all_info('enquiry'));
            $data['today_notice'] = count($this->Common_model->get_allinfo_byid('insert_notice',
                'date', date('Y-m-d')));
            $array_check = array(
                "status" => 0
            );
            $data['admitted_patient'] = count($this->Common_model->get_all_info_by_array('patient_admission', $array_check));
            $this->load->view('admin/header');
            $this->load->view('admin/dashboard', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function block_msg()
    {
        $data['wrong_msg'] = "Sorry ! Your ID is inactive now<br>Please Contact with Help Care";
        $this->load->view('website/login_check', $data);
    }

    public function login_check()
    {
        $this->form_validation->set_rules('user_id', 'User ID', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('user_type', 'User Type', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        } else {
            $user_id = $this->input->post('user_id');
            $password = $this->input->post('password');
            $user_type = $this->input->post('user_type');
            $block_status = 0;
            $has_user = 0;
            if ($user_type == "admin") {
                $checking_array = array("admin_unique_id" => $user_id, "password" => $password);
                $result = $this->Common_model->check_value_get_data('admin', $checking_array);
                if ($result) {
                    $has_user = 1;
                    foreach ($result as $result_info) {
                        $record_id = $result_info->record_id;
                        $unique_id = $result_info->admin_unique_id;
                        $password = $result_info->password;
                        $mobile = $result_info->mobile;
                        $username = $result_info->name;
                    }
                }
            } 
            elseif ($user_type == "staff") {
                $checking_array = array("username" => $user_id, "password" => $password);
                $result = $this->Common_model->check_value_get_data('staff', $checking_array);
                if ($result) {
                    $has_user = 1;
                    foreach ($result as $result_info) {
                        $block_status = $result_info->block_status;
                        $record_id = $result_info->record_id;
                        $unique_id = $result_info->username;
                        $password = $result_info->password;
                        $mobile = $result_info->mobile;
                        $username = $result_info->name;
                        $hr_access = $result_info->hr_access;
                        $inventory_access = $result_info->inventory_access;
                        $billing_access = $result_info->billing_access;
                        $accounting_access = $result_info->accounting_access;
                        $sales_access = $result_info->sales_access;
                        $createOption_access = $result_info->createOption_access;
                        $laboratory_access = $result_info->laboratory_access;
                        $information_access = $result_info->information_access;
                        $webpart_access= $result_info->webpart_access;
                    }
                    $ses_data_permission = array(
                        'ses_hr_access' => $hr_access,
                        'ses_inventory_access' => $inventory_access,
                        'ses_billing_access' => $billing_access,
                        'ses_accounting_access' => $accounting_access,
                        'ses_sales_access' => $sales_access,
                        'ses_createOption_access' => $createOption_access,
                        'ses_laboratory_access' => $laboratory_access,
                        'ses_information_access' => $information_access,
                        'ses_webpart_access' => $webpart_access,
                    );
                    $this->session->set_userdata($ses_data_permission);
                }
            }

            if ($block_status == 1) {
                redirect('Log_in_out/block_msg', 'refresh');
            } elseif ($has_user == 1) {
                $sesdata = array(
                    'ses_record_id' => $record_id,
                    'ses_username' => $username,
                    'ses_mobile' => $mobile,
                    'ses_unique_id' => $unique_id,
                    'ses_password' => $password,
                    'ses_user_type' => $user_type,
                    'ses_logged' => "YES"
                );
                $this->session->set_userdata($sesdata);

                $array_check_ap = array(
                    "date >= " => date('Y-m-d')
                );
                $data['appointment_number'] = count($this->Common_model->get_all_info_by_array('appointment_info', $array_check_ap));
                $data['patient_number'] = count($this->Common_model->get_all_info('patient'));
//                $data['doctor_number'] = count($this->Common_model->get_allinfo_byid('staff',
//                    'staff_type', 'Doctor'));
//                $data['nurse_number'] = count($this->Common_model->get_allinfo_byid('staff',
//                    'staff_type', 'Nurse'));
                $data['staff_number'] = count($this->Common_model->get_allinfo_byid('staff',
                    'staff_type', 'Staff'));
//                $data['enquiry_number'] = count($this->Common_model->get_all_info('enquiry'));
                $data['today_notice'] = count($this->Common_model->get_allinfo_byid('insert_notice',
                    'date', date('Y-m-d')));
                $array_check = array(
                   "status" => 0
                );
                $data['admitted_patient'] = count($this->Common_model->get_all_info_by_array('patient_admission',
                    $array_check));
                $this->load->view('admin/header');
                $this->load->view('admin/dashboard', $data);
                $this->load->view('admin/footer');
            } else {
                $data['wrong_msg'] = "Wrong Name/Password";
                $this->load->view('website/login_check', $data);
            }
        }
    }

    public function logout()
    {
        $user_type = $this->session->ses_user_type;
        if ($this->session->userdata('ses_logged') == "YES") {
            if ($user_type == "staff") {
                $logout_array = array('ses_record_id', 'ses_unique_id', 'ses_password', 'ses_user_type', 'ses_logged',
                    'ses_hr_access', 'ses_inventory_access', 'ses_pharmacy_access', 'ses_billing_access',
                    'ses_management_access', 'ses_accounting_access', 'ses_others_access', 'ses_purchase_access',
                    'ses_sales_access', 'ses_product_in_out_access', 'ses_income_access', 'ses_expense_access',
                    'ses_prescription_access');
            } else {
                $logout_array = array('ses_record_id', 'ses_unique_id', 'ses_username', 'ses_password', 'ses_mobile', 'ses_user_type', 'ses_logged');
            }
            $this->session->unset_userdata($logout_array);
            redirect('/Home', 'refresh');
        }
    }

}
