<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Show_form extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Common_model');
    }

    public function test_commission($msg) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_value'] = $this->Common_model->get_all_info('sales_test');
            $data['doctor'] = $this->Common_model->get_all_info('doctor');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/test_commission', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function con_report($msg) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_value'] = $this->Common_model->get_all_info('consultancy');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/con_report', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function single_page_content() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_value'] = $this->Common_model->get_all_info('single_page_content');
            $this->load->view('admin/header');
            $this->load->view('admin/single_page_content', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_doctors_info($msg) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['doctor'] = $this->Common_model->get_doctor('doctor');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/insert_doctors_info', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function about_us() {
        $data['about'] = $this->Common_model->get_all_info('about');
        $this->load->view('admin/header');
        $this->load->view('admin/about_us/about_us', $data);
        $this->load->view('admin/footer');
    }

    public function our_service() {
        $this->load->model('Common_model');
        $data['our_service'] = $this->Common_model->get_our_service();
        $this->load->view('admin/our_service', $data);
    }

    public function photo_gallery() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_value'] = $this->Common_model->get_all_info('photo_gallery');
            $this->load->view('admin/header');
            $this->load->view('admin/photo_gallery', $data);
            $this->load->view('admin/footer');
        } else {
            redirect('Web_Ct/login', 'refresh');
        }
    }

    public function contact_us() {
        $this->load->model('Common_model');
        $data['contact'] = $this->Common_model->get_contact('contact');
        $this->load->view('admin/header');
        $this->load->view('admin/update_contact', $data);
        $this->load->view('admin/footer');
    }
    public function update_our_service() {
        $admin_type = $this->session->ses_usertype;
//        if ($admin_type == 'Super Admin') {

        $this->load->model('Common_model');
        $max_id = '1';


        $this->form_validation->set_rules('about', 'About Us', 'trim|required');


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('admin/update_our_service');
        } else {

            $about = $this->input->post('our_service');

            $this->load->model('Common_model');
            $this->Common_model->update_our_service($max_id, $service_name, $service_rate);

            redirect('Show_form/success_msg_update', 'refresh');
        }
//        } else {
//            redirect('Admin_Ct/about_us', 'refresh');
//        }
    }
    public function success_msg_insert() {
        $this->load->view('admin/success_msg_insert');
    }

    public function success_msg_update() {
        $this->load->view('admin/success_msg_update');
    }

    public function service($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_value'] = $this->Common_model->get_all_info('service');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/service', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function test_price($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_value'] = $this->Common_model->get_all_info('test_name');
//       $data['all_category'] = $this->Common_model->get_all_info('test_category');
            
            $data['all_price'] = $this->Common_model->get_all_info('test_price');
//            $data['all_price'] = $this->Common_model->get_all_info_orderby('test_price', 'test_name', 'asc');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/test_price', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_doctor($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_value'] = $this->Common_model->get_all_info('doctor');
            $data['all_designation'] = $this->Common_model->get_all_info('designation');
            $data['all_dept'] = $this->Common_model->get_all_info('departments');

            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/create_doctor', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function all_test_report($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_test'] = $this->Common_model->get_distinct_value('unique_id', 'test_result');

            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/all_test_report', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function pay_service_due($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_patient'] = $this->Common_model->get_all_info_orderby('patient', 'record_id', 'DESC');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/pay_service_due', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function pay_test_due($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_patient'] = $this->Common_model->get_all_info_orderby('patient', 'record_id', 'DESC');
            $data['all_test'] = $this->Common_model->get_all_info('test_name');
            $data['all_category'] = $this->Common_model->get_all_info('test_category');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/pay_test_due', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function test_result($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $data['all_patient'] = $this->Common_model->get_all_info_orderby('patient', 'record_id', 'DESC');
            $data['all_doctor'] = $this->Common_model->get_all_info('doctor');
            $data['all_test'] = $this->Common_model->get_all_info('test_name');
            $data['all_category'] = $this->Common_model->get_all_info('test_category');
            $data['all_test_result'] = $this->Common_model->get_all_info_orderby('test_result',  'record_id', 'DESC');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/test_result', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function dashboard($no) {
        if ($this->session->userdata('ses_user_type') == "admin" || $this->session->userdata('ses_user_type') == "staff") {
            if ($no == 1) {
                $array_check_ap = array(
                    "date >= " => date('Y-m-d')
                );
                $data['appointment'] = $this->Common_model->get_all_info_by_array('appointment_info', $array_check_ap);
            } elseif ($no == 2) {
                $data['patient'] = $this->Common_model->get_all_info('patient');
            } elseif ($no == 3) {
                $data['employee'] = $this->Common_model->get_allinfo_byid('staff', 'staff_type', 'Doctor');
                $data["title"] = "Doctor Info.";
            } elseif ($no == 4) {
                $data['employee'] = $this->Common_model->get_allinfo_byid('staff', 'staff_type', 'Nurse');
                $data["title"] = "Nurse Info.";
            } elseif ($no == 5) {
                $data['employee'] = $this->Common_model->get_allinfo_byid('staff', 'staff_type', 'Staff');
                $data["title"] = "Staff Info.";
            } elseif ($no == 6) {
                $data['enquiry'] = $this->Common_model->get_all_info('enquiry');
            } elseif ($no == 7) {
                $data['notice'] = $this->Common_model->get_allinfo_byid('insert_notice', 'date', date('Y-m-d'));
                $data["title"] = "Today Notice";
            } elseif ($no == 8) {
                $array_check = array(
                    "status" => 0
                );
                $data['admitted_patient'] = $this->Common_model->get_all_info_by_array('patient_admission', $array_check);
                $data["title"] = "Admitted Patients";
            } elseif ($no == 9) {
                $array_check = array(
                );
                $data['medicine_qty'] = $this->Common_model->get_all_info_by_array('insert_medicine_info', $array_check);
                $data["title"] = "Medicine Qty";
            } elseif ($no == 10) {
                $array_check = array(
                );
                $data['product_qty'] = $this->Common_model->get_all_info_by_array('insert_product_info', $array_check);
                $data["title"] = "Product Qty";
            }
            $data['no'] = $no;
            $this->load->view('admin/header');
            $this->load->view('admin/dashboard_link', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function send_sms_employee() {
        if ($this->session->userdata('ses_user_type') == "admin" || $this->session->userdata('ses_user_type') == "staff") {
            $data['all_value'] = $this->Common_model->get_all_info('create_sms');
            $this->load->view('admin/header');
            $this->load->view('admin/send_sms_employee', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_sms($msg) {
        if ($this->session->userdata('ses_user_type') == "admin" || $this->session->userdata('ses_user_type') == "staff") {
            $this->load->model('Common_model');
            $table_name = "create_sms";
            $data['all_value'] = $this->Common_model->get_all_info($table_name);
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/create_sms', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_notice($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {

            $data['all_value'] = $this->Common_model->get_all_info('insert_notice');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/insert_notice', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function bill_list2() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
//            $result = $this->Common_model->get_distinct_value('bill_id', 'create_bill');
            $count = 0;
            foreach ($result as $info) {
                $count++;
//                $data['bill_result' . $count] = $this->Common_model->get_allinfo_byid('create_bill', 'bill_id', $info->bill_id);
            }
//            $data['all_bill'] = $result;
//            $data['count_it'] = $count;
            $this->load->view('admin/header');
            $this->load->view('admin/bill_list', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function bill_list() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_patient'] = $this->Common_model->get_all_info_orderby('patient', 'record_id', 'DESC');
            $this->load->view('admin/header');
            $this->load->view('admin/bill_list', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_bill($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_patient'] = $this->Common_model->get_all_info_orderby('patient', 'record_id', 'DESC');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/create_bill', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function designation($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_value'] = $this->Common_model->get_all_info('designation');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/designation', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

//    public function service($msg) {
//        $user_type = $this->session->ses_user_type;
//        if ($user_type == "admin") {
//            $data['all_value'] = $this->Common_model->get_all_info('service');
//            $data['msg'] = $msg;
//            $this->load->view('admin/header');
//            $this->load->view('admin/service', $data);
//            $this->load->view('admin/footer');
//        } else {
//            $data['wrong_msg'] = "";
//            $this->load->view('website/login_check', $data);
//        }
//    }

    public function advance_payment($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_value'] = $this->Common_model->get_all_info('advance_payment');
            $data['all_patient'] = $this->Common_model->get_all_info_orderby('patient', 'record_id', 'DESC');
            $data['all_dept'] = $this->Common_model->get_all_info('departments');
            $data['doctor'] = $this->Common_model->get_all_info('doctor');
            $data['all_room'] = $this->Common_model->get_all_info('room_info');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/advance_payment', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function admission_list() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $result = $this->Common_model->get_distinct_value('invoice_no', 'patient_admission');
            $count = 0;
            foreach ($result as $info) {
                $count++;
                $data['admission_result' . $count] = $this->Common_model->get_allinfo_byid('patient_admission', 'invoice_no', $info->invoice_no);
            }
            $data['all_invoice'] = $result;
            $data['count_it'] = $count;
            $this->load->view('admin/header');
            $this->load->view('admin/admission_list', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function patient_admission($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['msg'] = $msg;
//            $data['old_patient'] = $this->Common_model->get_all_info('patient');
            $data['all_patient'] = $this->Common_model->get_all_info_orderby('patient', 'record_id', 'DESC');
            $data['all_dept'] = $this->Common_model->get_all_info('departments');
            $data['doctor'] = $this->Common_model->get_all_info('doctor');
            $data['all_value'] = $this->Common_model->get_all_info('patient_admission');
            $data['all_room'] = $this->Common_model->get_all_info('room_info');
//            $data['all_service'] = $this->Common_model->get_all_info('billing_service');
//            $data['all_package'] = $this->Common_model->get_all_info('add_package');
//            $data['doctor_list'] = $this->Common_model->get_allinfo_byid('staff', 'staff_type', 'Doctor');

            $this->load->view('admin/header');
            $this->load->view('admin/patientAdmission', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function add_package($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['msg'] = $msg;
            $data['all_package'] = $this->Common_model->get_all_info('add_package');
            $this->load->view('admin/header');
            $this->load->view('admin/add_package', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_billing_service($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['msg'] = $msg;
            $data['all_service'] = $this->Common_model->get_all_info('billing_service');
            $this->load->view('admin/header');
            $this->load->view('admin/create_billing_service', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function dashboard_prescription() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $result = $this->Common_model->get_distinct_value('prescription_id', 'prescription');
            $count = 0;
            foreach ($result as $info) {
                $count++;
                $data['prescription_result' . $count] = $this->Common_model->get_allinfo_byid('prescription', 'prescription_id', $info->prescription_id);
            }
            $data['count_it'] = $count;
            $this->load->view('admin/header');
            $this->load->view('admin/dashboard_prescription', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function stock_shortage() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['med_result'] = $this->Common_model->get_all_info('insert_medicine_info');
            $data['product_result'] = $this->Common_model->get_all_info('insert_product_info');
            $this->load->view('admin/header');
            $this->load->view('admin/stock_shortage', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function near_expired_product() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $array_check_expire = array(
                "expiry_date>=" => date('Y-m-d'),
                "expiry_date<" => date('Y-m-d', strtotime('+15 days'))
            );
            $data['expired_medicine'] = $this->Common_model->get_all_info_by_array('purchase_medicine', $array_check_expire);
            $data['expired_product'] = $this->Common_model->get_all_info_by_array('purchase_product', $array_check_expire);
            $title = "Near ";
            $data['title'] = $title;
            $this->load->view('admin/header');
            $this->load->view('admin/expired_product', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function expired_product() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $array_check_expire = array(
                "expiry_date<" => date('Y-m-d')
            );
            $data['expired_medicine'] = $this->Common_model->get_all_info_by_array('purchase_medicine', $array_check_expire);
            $data['expired_product'] = $this->Common_model->get_all_info_by_array('purchase_product', $array_check_expire);
            $title = " ";
            $data['title'] = $title;
            $this->load->view('admin/header');
            $this->load->view('admin/expired_product', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function monthly_sales_number() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $column_with_value_array = array(
                "date>=" => date('Y-m-d', strtotime('-1 month')),
                "date<=" => date('Y-m-d')
            );
            $result = $this->Common_model->get_distinct_value_where('invoice_no', 'sell_product', $column_with_value_array);
            $count = 0;
            foreach ($result as $info) {
                $count++;
                $data['pro_result' . $count] = $this->Common_model->get_allinfo_byid('sell_product', 'invoice_no', $info->invoice_no);
            }
            $data['count_it'] = $count;
            $data['title'] = "Sales of Month";
            $this->load->view('admin/header');
            $this->load->view('admin/sales_number', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function today_sales_number() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $column_with_value_array = array(
                "date" => date('Y-m-d')
            );
            $result = $this->Common_model->get_distinct_value_where('invoice_no', 'sell_product', $column_with_value_array);
            $count = 0;
            foreach ($result as $info) {
                $count++;
                $data['pro_result' . $count] = $this->Common_model->get_allinfo_byid('sell_product', 'invoice_no', $info->invoice_no);
            }
            $data['count_it'] = $count;
            $data['title'] = "Sales of Day";
            $this->load->view('admin/header');
            $this->load->view('admin/sales_number', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function lab_inout_info($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/lab_inout_info', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function only_product_info() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_value'] = $this->Common_model->get_all_info('insert_product_info');
            $this->load->view('admin/header');
            $this->load->view('admin/only_product_info', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function only_medicine_info() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_value'] = $this->Common_model->get_all_info('insert_medicine_info');
            $this->load->view('admin/header');
            $this->load->view('admin/only_medicine_info', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function report($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/report', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_prescription($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_medicine'] = $this->Common_model->get_all_info('insert_medicine_info');
            $data['all_product'] = $this->Common_model->get_all_info('insert_product_info');
            $data['all_test'] = $this->Common_model->get_all_info('test_type');
            $data['all_patient'] = $this->Common_model->get_all_info_orderby('patient', 'record_id', 'DESC');

            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/create_prescription', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_patient($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_value'] = $this->Common_model->get_all_info_orderby('patient', 'record_id', 'DESC');

            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/create_patient', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function income($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['income_head'] = $this->Common_model->get_all_info('income_head');
            $data['all_value'] = $this->Common_model->get_all_info('income');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/income', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function income_head($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_value'] = $this->Common_model->get_all_info('income_head');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/income_head', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function expense($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['expense_head'] = $this->Common_model->get_all_info('expense_head');
            $data['all_value'] = $this->Common_model->get_all_info('expense');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/expense', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function expense_head($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_value'] = $this->Common_model->get_all_info('expense_head');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/expense_head', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function ledger($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/ledger', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_customer($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_value'] = $this->Common_model->get_all_info('customer');

            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/create_customer', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function purchase_medicine($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $result = $this->Common_model->get_distinct_value('invoice_no', 'purchase_medicine');
            $count = 0;
            foreach ($result as $info) {
                $count++;
                $data['med_result' . $count] = $this->Common_model->get_allinfo_byid('purchase_medicine', 'invoice_no', $info->invoice_no);
            }
            $data['count_it'] = $count;
            $data['all_medicine'] = $this->Common_model->get_all_info('insert_medicine_info');
            $data['manufacture_company'] = $this->Common_model->get_all_info('manufacture_company');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/purchase_medicine', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function purchase_product($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $result = $this->Common_model->get_distinct_value('invoice_no', 'purchase_product');
            $count = 0;
            foreach ($result as $info) {
                $count++;
                $data['pro_result' . $count] = $this->Common_model->get_allinfo_byid('purchase_product', 'invoice_no', $info->invoice_no);
            }
            $data['count_it'] = $count;
            $data['all_product'] = $this->Common_model->get_all_info('insert_product_info');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/purchase_product', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_product_info($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_product'] = $this->Common_model->get_all_info('product_name');
            $data['manufacture_company'] = $this->Common_model->get_all_info('manufacture_company');
            $data['all_value'] = $this->Common_model->get_all_info('insert_product_info');

            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/insert_product_info', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function lab_product_use_in($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_product'] = $this->Common_model->get_all_info('product_name');
            $data['all_value'] = $this->Common_model->get_all_info('lab_product_use_in');

            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/lab_product_use_in', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function lab_product_use_out($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_product'] = $this->Common_model->get_all_info('product_name');
            $data['all_value'] = $this->Common_model->get_all_info('lab_product_use_out');

            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/lab_product_use_out', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_medicine_info($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['types_of_medicine'] = $this->Common_model->get_all_info('medicine_name');
            $data['medicine_presentation'] = $this->Common_model->get_all_info('medicine_presentation');
            $data['generic_name'] = $this->Common_model->get_all_info('generic_name');
            $data['manufacture_company'] = $this->Common_model->get_all_info('manufacture_company');
            $data['store_type'] = $this->Common_model->get_all_info('store_type');
            $data['all_value'] = $this->Common_model->get_all_info('insert_medicine_info');

            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/insert_medicine_info', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function types_of_product($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_value'] = $this->Common_model->get_all_info('types_of_product');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/types_of_product', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function medicine_name($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_value'] = $this->Common_model->get_all_info('medicine_name');
            $data['all_generic'] = $this->Common_model->get_all_info('generic_name');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/medicine_name', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_test_name($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_value'] = $this->Common_model->get_all_info_orderby('test_name', 'test_category', 'asc');
            $data['all_category'] = $this->Common_model->get_all_info('test_category');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/test_name', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

//    public function test_price($msg) {
//        $user_type = $this->session->ses_user_type;
//        if ($user_type == "admin") {
//            $data['all_value'] = $this->Common_model->get_all_info('test_name');
////       $data['all_category'] = $this->Common_model->get_all_info('test_category');
//            $data['all_price'] = $this->Common_model->get_all_info('test_price');
//            $data['msg'] = $msg;
//            $this->load->view('admin/header');
//            $this->load->view('admin/test_price', $data);
//            $this->load->view('admin/footer');
//        } else {
//            $data['wrong_msg'] = "";
//            $this->load->view('website/login_check', $data);
//        }
//    }

    public function product_name($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_value'] = $this->Common_model->get_all_info('product_name');
            $data['all_product_category'] = $this->Common_model->get_all_info('types_of_product');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/product_name', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function medicine_presentation($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_value'] = $this->Common_model->get_all_info('medicine_presentation');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/medicine_presentation', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function generic_name($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_value'] = $this->Common_model->get_all_info('generic_name');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/generic_name', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function manufacture_company($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_value'] = $this->Common_model->get_all_info('manufacture_company');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/manufacture_company', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function store_type($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_value'] = $this->Common_model->get_all_info('store_type');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/store_type', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function sales($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $result = $this->Common_model->get_distinct_value('invoice_no', 'sell_product');
            $count = 0;
            foreach ($result as $info) {
                $count++;
                $data['pro_result' . $count] = $this->Common_model->get_allinfo_byid('sell_product', 'invoice_no', $info->invoice_no);
            }
            $data['count_it'] = $count;
            $data['all_medicine'] = $this->Common_model->get_all_info('insert_medicine_info');
            $data['all_product'] = $this->Common_model->get_all_info('insert_product_info');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/sell_product', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function sales_test($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_patient'] = $this->Common_model->get_all_info_orderby('patient', 'record_id', 'DESC');
            $data['doctor'] = $this->Common_model->get_all_info('doctor');
            $data['all_test'] = $this->Common_model->get_all_info('test_name');
            $data['all_testPrice'] = $this->Common_model->get_all_info('test_price');
            $result = $this->Common_model->get_distinct_value_order_by('invoice_no', 'sales_test');
            $count = 0;
            foreach ($result as $info) {
                $count++;
                $data['pro_result' . $count] = $this->Common_model->get_allinfo_byid('sales_test', 'invoice_no', $info->invoice_no);
            }
            $data['count_it'] = $count;
//            $data['all_product_type'] = $this->Common_model->get_all_info('create_product_type');
//            $data['all_product'] = $this->Common_model->get_all_info('insert_product_info');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/sales_test', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function test_request($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_patient'] = $this->Common_model->get_all_info_orderby('patient', 'record_id', 'DESC');

            $result = $this->Common_model->get_distinct_value('patient_id', 'sales_test');
            $count = 0;
            foreach ($result as $info) {
                $count++;
                $data['pro_result' . $count] = $this->Common_model->get_allinfo_byid('sales_test', 'patient_id', $info->patient_id);
            }
            $data['count_it'] = $count;
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/test_request', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function sales_service($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_patient'] = $this->Common_model->get_all_info_orderby('patient', 'record_id', 'DESC');
            $data['doctor'] = $this->Common_model->get_all_info('doctor');
            $data['all_test'] = $this->Common_model->get_all_info('test_name');
            $data['all_testPrice'] = $this->Common_model->get_all_info('test_price');
            $data['all_services'] = $this->Common_model->get_all_info('service');
            $result = $this->Common_model->get_distinct_value_order_by('invoice_no', 'sell_product');
            $count = 0;
            foreach ($result as $info) {
                $count++;
                $data['pro_result' . $count] = $this->Common_model->get_allinfo_byid('sell_product', 'invoice_no', $info->invoice_no);
            }
            $data['count_it'] = $count;
//            $data['all_product_type'] = $this->Common_model->get_all_info('create_product_type');
//            $data['all_product'] = $this->Common_model->get_all_info('insert_product_info');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/sales_service', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_client_info($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['msg'] = $msg;
            $result = $this->Common_model->get_all_info_orderby('add_client', 'record_id', 'DESC');
            $count = 0;
            foreach ($result as $info) {
                $count++;
                $client_id = $info->record_id;
                $due_result = $this->Common_model->get_allinfo_byid('sales_due', 'client_id', $client_id);
                $total = 0;
                $paid = 0;
                foreach ($due_result as $due_info) {
                    $total += $due_info->total;
                    $paid += $due_info->paid;
                }
                $old_due = $total - $paid;
                $data['old_due' . $count] = $old_due;
            }
            $data['all_value'] = $result;
            $this->load->view('admin/header');
            $this->load->view('admin/insert_client_info', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

//    public function create_doctor($msg) {
//        $user_type = $this->session->ses_user_type;
//        if ($user_type == "admin") {
//            $data['all_value'] = $this->Common_model->get_all_info('doctor');
//            $data['all_designation'] = $this->Common_model->get_all_info('designation');
//            $data['all_dept'] = $this->Common_model->get_all_info('departments');
//
//            $data['msg'] = $msg;
//            $this->load->view('admin/header');
//            $this->load->view('admin/create_doctor', $data);
//            $this->load->view('admin/footer');
//        } else {
//            $data['wrong_msg'] = "";
//            $this->load->view('website/login_check', $data);
//        }
//    }
//    public function create_doctor($msg) {
//        $user_type = $this->session->ses_user_type;
//        if ($user_type == "admin" || $user_type == "staff") {
//            $data['msg'] = $msg;
//            $result = $this->Common_model->get_all_info_orderby('add_client', 'record_id', 'DESC');
//            $data['all_designation'] = $this->Common_model->get_all_info('designation');
////            $data['$all_department'] = $this->Common_model->get_all_info('departments');
//             $data['all_dept'] = $this->Common_model->get_all_info('departments');
//            $count = 0;
//            foreach ($result as $info) {
//                $count++;
//                $client_id = $info->record_id;
//                $due_result = $this->Common_model->get_allinfo_byid('sales_due', 'client_id', $client_id);
//                $total = 0;
//                $paid = 0;
//                foreach ($due_result as $due_info) {
//                    $total += $due_info->total;
//                    $paid += $due_info->paid;
//                }
//                $old_due = $total - $paid;
//                $data['old_due' . $count] = $old_due;
//            }
//            $data['all_value'] = $result;
//            $this->load->view('admin/header');
//            $this->load->view('admin/create_doctor', $data);
//            $this->load->view('admin/footer');
//        } else {
//            $data['wrong_msg'] = "";
//            $this->load->view('website/login_check', $data);
//        }
//    }

    public function purchase_statement($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['invoice_medicine'] = $this->Common_model->get_distinct_value('invoice_no', 'purchase_medicine');
            $data['invoice_product'] = $this->Common_model->get_distinct_value('invoice_no', 'purchase_product');
            $data['company'] = $this->Common_model->get_all_info('manufacture_company');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/purchase_statement', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function sales_statement($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_client'] = $this->Common_model->get_all_info('add_client');
            $data['all_product'] = $this->Common_model->get_all_info('insert_product_info');
//            $data['product_type'] = $this->Common_model->get_all_info('create_product_type');
            $data['invoice'] = $this->Common_model->get_distinct_value('invoice_no', 'sell_product');
            $data['admin'] = $this->Common_model->get_all_info('admin');
//            $data['employee'] = $this->Common_model->get_all_info('employee');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/sales_statement', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function sales_due($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_invoice'] = $this->Common_model->get_distinct_value("invoice_no", "sales_due");
            $data['all_client'] = $this->Common_model->get_all_info('add_client');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/sales_due', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function sales_due_statement() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_client'] = $this->Common_model->get_all_info('add_client');
            $this->load->view('admin/header');
            $this->load->view('admin/sales_due_statement', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function product_inout($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/product_inout', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_salary_info($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {

            $data['all_value'] = $this->Common_model->get_all_info('employee_salary');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/create_salary_info', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function bank_report($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {

            $data['all_bank'] = $this->Common_model->get_bank_name();
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/bank_report', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_bank_name($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {

            $data['all_value'] = $this->Common_model->get_all_info('create_bank_name');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/create_bank_name', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function bank_deposit($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {

            $data['all_bank'] = $this->Common_model->get_all_info('create_bank_name');
            $data['all_value'] = $this->Common_model->get_all_info('bank_deposit');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/bank_deposit', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function bank_withdraw($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {

            $data['all_bank'] = $this->Common_model->get_all_info('create_bank_name');
            $data['all_value'] = $this->Common_model->get_all_info('bank_withdraw');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/bank_withdraw', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_salary_sheet($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_value'] = $this->Common_model->get_all_info('create_salary_sheet');
            $data['all_employee'] = $this->Common_model->get_all_info('staff');
            $data['all_desig'] = $this->Common_model->get_all_info('designation');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/create_salary_sheet', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_user($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $data['all_staff'] = $this->Common_model->get_all_info('staff');
            $data['all_doctor'] = $this->Common_model->get_allinfo_byid('staff', 'staff_type', "doctor");
            $data['all_dept'] = $this->Common_model->get_all_info('departments');
            $data['all_desig'] = $this->Common_model->get_all_info('designation');
            $data['all_doc'] = $this->Common_model->get_all_info('doctor');

            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/create_user', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function return_product($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {


            $data['sold_product'] = $this->Common_model->get_distinct_value('invoice_no', 'sell_product');
            $data['all_value'] = $this->Common_model->get_all_info('returned_product_info');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/return_product', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function appointment($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_doctor'] = $this->Common_model->get_all_info_orderby('doctor', 'record_id', 'DESC');
            $data['all_patient'] = $this->Common_model->get_all_info_orderby('patient', 'record_id', 'DESC');
            $data['all_value'] = $this->Common_model->get_all_info_orderby('appointment_info', 'record_id', 'DESC');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/appointment', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function consultancy($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_doctor'] = $this->Common_model->get_all_info_orderby('doctor', 'record_id', 'DESC');
            $data['all_patient'] = $this->Common_model->get_all_info_orderby('patient', 'record_id', 'DESC');
            $data['all_value'] = $this->Common_model->get_all_info_orderby('consultancy', 'record_id', 'DESC');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/consultancy', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function manufacturer_return($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {


            $data['purchased_medicine'] = $this->Common_model->get_distinct_value('invoice_no', 'purchase_medicine');
            $data['purchased_product'] = $this->Common_model->get_distinct_value('invoice_no', 'purchase_product');
            $data['all_value'] = $this->Common_model->get_all_info('returned_product_info');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/return_to_manufacture', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function sales_prescription($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {

            $data['prescription'] = $this->Common_model->get_distinct_value('prescription_id', 'prescription');
            $data['all_value'] = $this->Common_model->get_all_info('prescription');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/sale_by_prescription', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_test_category($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            
            $data['all_value'] = $this->Common_model->get_all_info_orderby('test_category', 'test_category', 'asc');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/test_category', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    //08-07-2018

    public function department($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {

            $data['all_value'] = $this->Common_model->get_all_info('departments');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/create_department', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function doc_schedule($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {


            $data['all_doctor'] = $this->Common_model->get_all_info('staff');
            $data['all_value'] = $this->Common_model->get_all_info('doctor_schedule');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/create_schedule', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function birth_report($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {


            $data['all_doctor'] = $this->Common_model->get_allinfo_byid('staff', 'staff_type', 'Doctor');
            $data['all_patient'] = $this->Common_model->get_all_info_orderby('patient', 'record_id', 'DESC');
            $data['all_value'] = $this->Common_model->get_all_info('birth_report');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/add_birth_report', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function death_report($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {


            $data['all_doctor'] = $this->Common_model->get_allinfo_byid('staff', 'staff_type', 'Doctor');
            $data['all_patient'] = $this->Common_model->get_all_info_orderby('patient', 'record_id', 'DESC');
            $data['all_value'] = $this->Common_model->get_all_info('death_report');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/add_death_report', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function operation_report($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {


            $data['all_doctor'] = $this->Common_model->get_allinfo_byid('staff', 'staff_type', 'Doctor');
            $data['all_patient'] = $this->Common_model->get_all_info_orderby('patient', 'record_id', 'DESC');
            $data['all_value'] = $this->Common_model->get_all_info('operation_report');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/add_operation_report', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function investigation_report($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {


            $data['all_doctor'] = $this->Common_model->get_allinfo_byid('staff', 'staff_type', 'Doctor');
            $data['all_patient'] = $this->Common_model->get_all_info_orderby('patient', 'record_id', 'DESC');
            $data['all_value'] = $this->Common_model->get_all_info('investigation_report');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/add_investigation_report', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function bed_type($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {


            $data['all_room'] = $this->Common_model->get_all_info('room_info');
            $data['all_value'] = $this->Common_model->get_all_info('bed_type');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/create_bed_type', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function add_bed($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {

            $data['all_bed_type'] = $this->Common_model->get_all_info('bed_type');
            $data['all_value'] = $this->Common_model->get_all_info('add_bed');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/add_bed', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function assign_bed($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {

            $data['all_patient'] = $this->Common_model->get_all_info_orderby('patient', 'record_id', 'DESC');
            $data['all_bed_no'] = $this->Common_model->get_all_info('bed_no');
            $data['all_room_no'] = $this->Common_model->get_all_info('room_info');
            $data['all_value'] = $this->Common_model->get_all_info('assign_bed');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/assign_bed', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function case_patient($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $data['all_patient'] = $this->Common_model->get_all_info_orderby('patient', 'record_id', 'DESC');
            $data['all_staff'] = $this->Common_model->get_all_info('staff');
            $data['all_value'] = $this->Common_model->get_all_info('case_patient');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/add_case_patient', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function enquiry($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {

            $data['all_value'] = $this->Common_model->get_all_info('enquiry');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/insert_enquiry', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function test_type($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {

            $data['all_value'] = $this->Common_model->get_all_info('test_type');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/create_test_type', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function room_info($msg) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {

            $data['all_dept'] = $this->Common_model->get_all_info('departments');
            $data['all_value'] = $this->Common_model->get_all_info('room_info');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/create_room_info', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function insert_news(){
        $data = $this->Common_model->last_row('new_msg');
   //     print_r($data);exit;
        $this->load->view('admin/header');
        $this->load->view('admin/news/insert_news', ['data' => $data]);
        $this->load->view('admin/footer');
    }    

}
