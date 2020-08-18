<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Show_edit_form extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Common_model');
    }
    public function appointment($record_id,$patient_id){
        $data['all_doctor'] = $this->Common_model->get_all_info_orderby('doctor', 'record_id', 'DESC');
        $data['all_patient'] = $this->Common_model->get_all_info_orderby('patient', 'record_id', 'DESC');
        $data['all_value'] = $this->Common_model->get_all_info_orderby('appointment_info', 'record_id', 'DESC');
        $data['appointment'] = $this->Common_model->single_row(['record_id' => $record_id], 'appointment_info');
        $data['patient'] = $this->Common_model->single_row(['record_id' => $patient_id], 'patient');

        $this->load->view('admin/header');
        $this->load->view('admin/appointment-edit', $data);
        $this->load->view('admin/footer');
    }
    public function consultancy($id, $msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_doctor'] = $this->Common_model->get_all_info_orderby('doctor', 'record_id', 'DESC');
            $data['all_patient'] = $this->Common_model->get_all_info_orderby('patient', 'record_id', 'DESC');
            $data['all_value'] = $this->Common_model->get_all_info_orderby('consultancy', 'record_id', 'DESC');
            $data["one_value"] = $this->Common_model->get_allinfo_byid('consultancy', 'record_id', $id);
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/edit_consultancy', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function sales_test($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_patient'] = $this->Common_model->get_all_info_orderby('patient', 'record_id', 'DESC');
            $data['doctor'] = $this->Common_model->get_all_info('doctor');
            $data['all_test'] = $this->Common_model->get_all_info('test_name');
            $data['all_testPrice'] = $this->Common_model->get_all_info('test_price');
            $data["all_sales"] = $this->Common_model->get_allinfo_byid('sales_test', 'invoice_no', $id);

            $this->load->view('admin/header');
            $this->load->view("admin/edit_sales_test", $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function print_appointment($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $result = $this->Common_model->get_allinfo_byid('appointment_info', 'record_id', $id);
            foreach ($result as $info) {
                $patient_name = $info->patient_name;
                $age = $info->patient_name;
                $doctor_name = $info->doctor_name;
                $doctor_designation = $info->designation;
                $date = $info->date;
            }
            $data["name"] = $patient_name;
            $data["age"] = $age;
            $data["doctor"] = $doctor_name;
            $data["designation"] = $doctor_designation;
            $data["date"] = $date;

            $this->load->view('admin/header');
            $this->load->view("admin/doctor_appointment_pad", $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function single_page_content($record_id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_value'] = $this->Common_model->get_all_info('single_page_content');
            $data['one_value'] = $this->Common_model->single_row(['record_id' => $record_id], 'single_page_content');

            $this->load->view('admin/header');
            $this->load->view('admin/edit_single_page_content', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function invoice_app($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('consultancy', 'record_id', $id);
            $this->load->view('admin/header');
            $this->load->view('admin/invoice_app', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function pad($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('appointment_info', 'record_id', $id);
//            $this->load->view('admin/header');
            $this->load->view('admin/pad', $data);
//            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_sms($id, $msg) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_value'] = $this->Common_model->get_all_info('create_sms');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('create_sms', 'record_id', $id);
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/edit_create_sms', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_doctor($id, $msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_value'] = $this->Common_model->get_all_info('doctor');
            $data['all_designation'] = $this->Common_model->get_all_info('designation');
            $data['all_dept'] = $this->Common_model->get_all_info('departments');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('doctor', 'record_id', $id);

            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/edit_doctor', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function test_price($id, $msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_value'] = $this->Common_model->get_all_info('test_name');
//       $data['all_category'] = $this->Common_model->get_all_info('test_category');
            $data['all_price'] = $this->Common_model->get_all_info('test_price');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('test_price', 'record_id', $id);
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/edit_test_price', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_patient($id, $msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_value'] = $this->Common_model->get_all_info('patient');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('patient', 'record_id', $id);
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/edit_patient', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_notice($id, $msg) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['one_value'] = $this->Common_model->get_allinfo_byid('insert_notice', 'record_id', $id);
            $data['all_value'] = $this->Common_model->get_all_info('insert_notice');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/edit_insert_notice', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function designation($record_id){
     $data['value'] = $this->Common_model->single_row(['record_id' => $record_id], 'designation');
     $data['all_value'] = $this->Common_model->get_all_info('designation');
     $this->load->view('admin/header');
     $this->load->view('admin/designation-edit', $data);
     $this->load->view('admin/footer');       
    }
    public function create_user($id, $msg) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['one_value'] = $this->Common_model->get_allinfo_byid('staff', 'record_id', $id);
            $data['all_dept'] = $this->Common_model->get_all_info('departments');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/edit_create_user', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_product_info($id, $msg) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['types_of_product'] = $this->Common_model->get_all_info('types_of_product');
            $data['manufacture_company'] = $this->Common_model->get_all_info('manufacture_company');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('insert_product_info', 'record_id', $id);
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/edit_product_info', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_medicine_info($id, $msg) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['types_of_medicine'] = $this->Common_model->get_all_info('types_of_medicine');
            $data['medicine_presentation'] = $this->Common_model->get_all_info('medicine_presentation');
            $data['generic_name'] = $this->Common_model->get_all_info('generic_name');
            $data['manufacture_company'] = $this->Common_model->get_all_info('manufacture_company');
            $data['store_type'] = $this->Common_model->get_all_info('store_type');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('insert_medicine_info', 'record_id', $id);
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/edit_medicine_info', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function schedule($id, $msg) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['one_value'] = $this->Common_model->get_allinfo_byid('doctor_schedule', 'record_id', $id);
            $data['all_doctor'] = $this->Common_model->get_all_info('staff');

            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/edit_schedule', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function birth_report($id, $msg) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_doctor'] = $this->Common_model->get_allinfo_byid('staff', 'staff_type', 'Doctor');
            $data['all_patient'] = $this->Common_model->get_all_info('patient');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('birth_report', 'record_id', $id);

            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/edit_birth_report', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function death_report($id, $msg) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_doctor'] = $this->Common_model->get_allinfo_byid('staff', 'staff_type', 'Doctor');
            $data['all_patient'] = $this->Common_model->get_all_info('patient');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('death_report', 'record_id', $id);

            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/edit_death_report', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function operation_report($id, $msg) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_doctor'] = $this->Common_model->get_allinfo_byid('staff', 'staff_type', 'Doctor');
            $data['all_patient'] = $this->Common_model->get_all_info('patient');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('operation_report', 'record_id', $id);

            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/edit_operation_report', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function investigation_report($id, $msg) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_doctor'] = $this->Common_model->get_allinfo_byid('staff', 'staff_type', 'Doctor');
            $data['all_patient'] = $this->Common_model->get_all_info('patient');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('investigation_report', 'record_id', $id);

            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/edit_investigation_report', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function test_type($id, $msg) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['one_value'] = $this->Common_model->get_allinfo_byid('test_type', 'record_id', $id);

            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/edit_test_type', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function room_info($id, $msg) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['one_value'] = $this->Common_model->get_allinfo_byid('room_info', 'record_id', $id);
            $data['all_dept'] = $this->Common_model->get_all_info('departments');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/edit_room_info', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function about_us($id){
       $data = $this->Common_model->single_row(['id' => $id], 'about');
       $this->load->view('admin/header');
       $this->load->view('admin/about_us/edit_about_us',['data' => $data]);
       $this->load->view('admin/footer');
    }
    public function photo_gallery($record_id){
       $data['photos'] = $this->Common_model->get_all_info('photo_gallery');
       $data['photo'] = $this->Common_model->single_row(['record_id' => $record_id], 'photo_gallery');
       $this->load->view('admin/header');
       $this->load->view('admin/photo_gallery/edit_photo_gallery', $data);
       $this->load->view('admin/footer'); 
    }
    public function contact_us($id){
        $data['contacts'] = $this->Common_model->get_contact('contact');
        $data['contact'] = $this->Common_model->single_row(['id' => $id], 'contact');
        $this->load->view('admin/header');
        $this->load->view('admin/contact_us/edit_contact_us',$data);
        $this->load->view('admin/footer');
    }
    public function news($record_id){
        $data = $this->Common_model->single_row(['record_id' => $record_id], 'new_msg');
        $this->load->view('admin/header');
        $this->load->view('admin/news/edit_news', ['data' => $data]);
        $this->load->view('admin/footer');
    }

}
