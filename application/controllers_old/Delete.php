<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Delete extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Common_model');
    }

    public function test_result($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, 'test_result');
            redirect('Show_form/test_result/main', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function photo_gallery($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, 'photo_gallery');
            redirect('Show_form/photo_gallery/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function sales_test($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('invoice_no', $id, 'sales_test');
            $this->Common_model->delete_info('invoice_no', $id, 'create_bill');
            redirect('Show_form/sales_test/main', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function single_page_content($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, 'single_page_content');
            redirect('Show_form/single_page_content/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function delete_contact($id) {
        $this->load->model('Common_model', 'edm');
        $this->edm->delete_info('id', $id, 'contact');
//        redirect('/Show_form/update_contact', 'refresh');
    }


    public function delete_about($id) {
        $this->load->model('Edit_delete_model', 'edm');
        $this->edm->delete_info('id', $id, 'about');
        redirect('/Show_form/update_about', 'refresh');
    }

    public function delete_our_service($id) {
        $this->load->model('Edit_delete_model', 'edm');
        $this->edm->delete_info('id', $id, 'our_service');
        redirect('/Show_form/update_our_service', 'refresh');
    }

 
    public function designation($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $this->Common_model->delete_info('record_id', $id, 'designation');
            redirect('Show_form/designation/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function add_client($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $this->Common_model->delete_info('record_id', $id, 'add_client');
            redirect('Show_form/insert_client_info/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function service($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $this->Common_model->delete_info('record_id', $id, 'service');
            redirect('Show_form/service/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_sms($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $this->Common_model->delete_info('record_id', $id, 'create_sms');
            redirect('Show_form/create_sms/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_notice($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $this->Common_model->delete_info('record_id', $id, 'insert_notice');
            redirect('Show_form/insert_notice/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function advance_payment($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $this->Common_model->delete_info('record_id', $id, 'advance_payment');
            redirect('Show_form/advance_payment/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function add_package($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $this->Common_model->delete_info('record_id', $id, 'add_package');
            redirect('Show_form/add_package/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_billing_service($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin"  || $user_type == "staff") {
            $this->Common_model->delete_info('record_id', $id, 'billing_service');
            redirect('Show_form/create_billing_service/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function manufacture_company($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin"  || $user_type == "staff") {
            $this->Common_model->delete_info('record_id', $id, 'manufacture_company');
            redirect('Show_form/manufacture_company/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_patient($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $this->Common_model->delete_info('record_id', $id, 'patient');
            redirect('Show_form/create_patient/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function patientAdmission($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin"  || $user_type == "staff") {
            $this->Common_model->delete_info('record_id', $id, 'patient_admission');
            redirect('Show_form/patient_admission/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_doctor($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $this->Common_model->delete_info('record_id', $id, 'doctor');
            redirect('Show_form/create_doctor/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function expense($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin"  || $user_type == "staff") {
            $this->Common_model->delete_info('record_id', $id, 'expense');
            redirect('Show_form/expense/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function expense_head($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $this->Common_model->delete_info('record_id', $id, 'expense_head');
            redirect('Show_form/expense_head/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function income($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $this->Common_model->delete_info('record_id', $id, 'income');
            redirect('Show_form/income/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function income_head($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin"  || $user_type == "staff") {
            $this->Common_model->delete_info('record_id', $id, 'income_head');
            redirect('Show_form/income_head/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_customer($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin"  || $user_type == "staff") {
            $this->Common_model->delete_info('record_id', $id, 'customer');
            redirect('Show_form/create_customer/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_user($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin"  || $user_type == "staff") {
            $this->Common_model->delete_info('record_id', $id, 'staff');
            $image_name = $id . ".jpg";
            if (file_exists('./assets/img/staff/' . $image_name)) {
                unlink('./assets/img/staff/' . $image_name);
            }
            redirect('Show_form/create_user/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function purchase_medicine($invoice_no) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin"  || $user_type == "staff") {
            $this->Common_model->delete_info('invoice_no', $invoice_no, 'purchase_medicine');
            redirect('Show_form/purchase_medicine/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function purchase_product($invoice_no) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin"  || $user_type == "staff") {
            $this->Common_model->delete_info('invoice_no', $invoice_no, 'purchase_product');
            redirect('Show_form/purchase_product/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_medicine_info($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin"  || $user_type == "staff" ) {
            $this->Common_model->delete_info('record_id', $id, 'insert_medicine_info');
            redirect('Show_form/insert_medicine_info/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_product_info($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin"  || $user_type == "staff") {
            $this->Common_model->delete_info('record_id', $id, 'insert_product_info');
            redirect('Show_form/insert_product_info/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
 

    public function lab_product_use_in($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $this->Common_model->delete_info('record_id', $id, 'lab_product_use_in');
            redirect('Show_form/lab_product_use_in/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function lab_product_use_out($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $this->Common_model->delete_info('record_id', $id, 'lab_product_use_out');
            redirect('Show_form/lab_product_use_out/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function store_type($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin"  || $user_type == "staff") {
            $this->Common_model->delete_info('record_id', $id, 'store_type');
            redirect('Show_form/store_type/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function medicine_name($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin"  || $user_type == "staff") {
            $this->Common_model->delete_info('record_id', $id, 'medicine_name');
            redirect('Show_form/medicine_name/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function test_name($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $this->Common_model->delete_info('record_id', $id, 'test_name');
            redirect('Show_form/create_test_name/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function test_price($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin"  || $user_type == "staff") {
            $this->Common_model->delete_info('record_id', $id, 'test_price');
            redirect('Show_form/test_price/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function product_name($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin"  || $user_type == "staff") {
            $this->Common_model->delete_info('record_id', $id, 'product_name');
            redirect('Show_form/product_name/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function types_of_product($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin"  || $user_type == "staff") {
            $this->Common_model->delete_info('record_id', $id, 'types_of_product');
            redirect('Show_form/types_of_product/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function medicine_presentation($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $this->Common_model->delete_info('record_id', $id, 'medicine_presentation');
            redirect('Show_form/medicine_presentation/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_test_category($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $this->Common_model->delete_info('record_id', $id, 'test_category');
            redirect('Show_form/create_test_category/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function generic_name($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $this->Common_model->delete_info('record_id', $id, 'generic_name');
            redirect('Show_form/generic_name/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_salary_info($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, 'employee_salary');
            redirect('Show_form/create_salary_info/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function bank_withdraw($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, 'bank_withdraw');
            redirect('Show_form/bank_withdraw/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function bank_deposit($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, 'bank_deposit');
            redirect('Show_form/bank_deposit/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_bank_name($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, 'create_bank_name');
            redirect('Show_form/create_bank_name/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_salary_sheet($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin"  || $user_type == "staff") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, 'create_salary_sheet');
            redirect('Show_form/create_salary_sheet/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function sell_product($invoice_no) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $this->Common_model->delete_info('invoice_no', $invoice_no, 'sell_product');
            redirect('Show_form/sales/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function get_all_payment_due($record_id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $this->Common_model->delete_info('record_id', $record_id, 'create_bill');
            redirect('Show_form/create_bill//delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function appointment($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin"  || $user_type == "staff") {
            $this->Common_model->delete_info('record_id', $id, 'appointment_info');
            redirect('Show_form/appointment/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    
    public function consultancy($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin"  || $user_type == "staff") {
            $this->Common_model->delete_info('record_id', $id, 'consultancy');
            redirect('Show_form/consultancy/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function department($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin"  || $user_type == "staff") {
            $this->Common_model->delete_info('record_id', $id, 'departments');
            redirect('Show_form/department/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function schedule($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin"  || $user_type == "staff") {
            $this->Common_model->delete_info('record_id', $id, 'doctor_schedule');
            redirect('Show_form/doc_schedule/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function birth_report($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $this->Common_model->delete_info('record_id', $id, 'birth_report');
            redirect('Show_form/birth_report/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function death_report($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $this->Common_model->delete_info('record_id', $id, 'death_report');
            redirect('Show_form/death_report/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function operation_report($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $this->Common_model->delete_info('record_id', $id, 'operation_report');
            redirect('Show_form/operation_report/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function investigation_report($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $this->Common_model->delete_info('record_id', $id, 'investigation_report');
            redirect('Show_form/investigation_report/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function bed_type($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $this->Common_model->delete_info('record_id', $id, 'bed_type');
            redirect('Show_form/bed_type/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function add_bed($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $this->Common_model->delete_info('record_id', $id, 'add_bed');
            redirect('Show_form/add_bed/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function case_patient($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $this->Common_model->delete_info('record_id', $id, 'case_patient');
            redirect('Show_form/case_patient/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function enquiry($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $this->Common_model->delete_info('record_id', $id, 'enquiry');
            redirect('Show_form/enquiry/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function test_type($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $this->Common_model->delete_info('record_id', $id, 'test_type');
            redirect('Show_form/test_type/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function room_info($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $this->Common_model->delete_info('record_id', $id, 'room_info');
            redirect('Show_form/room_info/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

}
