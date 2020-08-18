<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Edit extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Common_model');
    }

    public function create_sms($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('date', 'Create Date', 'trim|required');
            $this->form_validation->set_rules('title', 'Message Title', 'trim|required');
            $this->form_validation->set_rules('body', 'Message Body', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_edit_form/create_sms/' . $id . '/empty', 'refresh');
            } else {
                $date = $this->input->post('date');
                $title = $this->input->post('title');
                $body = $this->input->post('body');

                $update_data = array(
                    'create_date' => $date,
                    'title' => $title,
                    'body' => $body
                );
                $this->Common_model->update_data_onerow('create_sms', $update_data, 'record_id', $id);
                redirect('Show_form/create_sms/edit', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_notice($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->form_validation->set_rules('date', 'Date', 'trim|required');
            $this->form_validation->set_rules('particular', 'Particular', 'trim|required');
            $this->form_validation->set_rules('details', 'Details', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_edit_form/insert_notice/' . $id . '/empty', 'refresh');
            } else {
                $date = $this->input->post('date');
                $particular = $this->input->post('particular');
                $details = $this->input->post('details');

                $update_data = array(
                    'date' => $date,
                    'particular' => $particular,
                    'details' => $details
                );
                $this->Common_model->update_data_onerow('insert_notice', $update_data, 'record_id', $id);
                redirect('Show_form/insert_notice/edit', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function inactive_package($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $update_data = array('block_status' => 1);
            $this->Common_model->update_data_onerow('add_package', $update_data, 'record_id', $id);
            redirect('Show_form/add_package/active', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function active_package($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $update_data = array('block_status' => 0);
            $this->Common_model->update_data_onerow('add_package', $update_data, 'record_id', $id);
            redirect('Show_form/add_package/inactive', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function block_service($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $update_data = array('block_status' => 0);
            $this->Common_model->update_data_onerow('billing_service', $update_data, 'record_id', $id);
            redirect('Show_form/create_billing_service/active', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function unblock_service($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $update_data = array('block_status' => 1);
            $this->Common_model->update_data_onerow('billing_service', $update_data, 'record_id', $id);
            redirect('Show_form/create_billing_service/inactive', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_user($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $img_name = $id . ".jpg";

            $config['file_name'] = $img_name;
            $config['upload_path'] = './assets/img/staff/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 0;
            $config['max_width'] = 0;
            $config['max_height'] = 0;
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload('image');

            $name = $this->input->post('name');
            $joining_date = $this->input->post('joining_date');
            $username = $this->input->post('username');

            $department = $this->input->post('department');
            $visiting_hour = $this->input->post('visiting_hour');
            $doctor_fee = $this->input->post('doctor_fee');
            $temp_available_days = $this->input->post('available_days');
            $available_days = "";
//            foreach ($temp_available_days as $day) {
//                $available_days = $available_days . $day . "#";
//            }

            $mobile = $this->input->post('mobile');
            $address = $this->input->post('address');
            $designation = $this->input->post('designation');
            $bank_name = $this->input->post('bank_name');
            $account_no = $this->input->post('account_no');
            $total_salary = $this->input->post('total_salary');
            $hr = $this->input->post('hr');
//            $inventory = $this->input->post('inventory');
            $billing = $this->input->post('billing');
            $accounting = $this->input->post('accounting');
            $sales = $this->input->post('sales');
//            $information = $this->input->post('information');
            $web = $this->input->post('web');
            $create_option = $this->input->post('createOption');
            $laboratory = $this->input->post('laboratory');

            $update_data = array(
                'name' => $name,
                'joining_date' => $joining_date,
                'username' => $username,
                'department' => $department,
                'visiting_hour' => $visiting_hour,
                'doctor_fee' => $doctor_fee,
                'available_days' => $available_days,
                'mobile' => $mobile,
                'address' => $address,
                'designation' => $designation,
                'bank_name' => $bank_name,
                'account_no' => $account_no,
                'total_salary' => $total_salary,
                'hr_access' => $hr,
//                'inventory_access' => $inventory,
                'billing_access' => $billing,
                'accounting_access' => $accounting,
                'sales_access' => $sales,
//                'information_access' => $information,
                'webpart_access' => $web,
                'laboratory_access' => $laboratory,
//                'information_access' => $information
            );
            $this->Common_model->update_data_onerow('staff', $update_data, 'record_id', $id);
            redirect('Show_form/create_user/edit', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function staff_active($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $update_data = array('block_status' => 0);
            $this->Common_model->update_data_onerow('staff', $update_data, 'record_id', $id);
            redirect('Show_form/create_user/active', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function staff_inactive($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $update_data = array('block_status' => 1);
            $this->Common_model->update_data_onerow('staff', $update_data, 'record_id', $id);
            redirect('Show_form/create_user/inactive', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function designation($record_id){
        $data = ['designation' => $this->input->post('designation')];
        $this->Common_model->update_data_onerow('designation', $data, 'record_id', $record_id);
        redirect(base_url().'Show_form/designation/edit');
    }
    public function insert_product_info($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $img_name = $id . ".jpg";

            $config['file_name'] = $img_name;
            $config['upload_path'] = './assets/img/product/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 0;
            $config['max_width'] = 0;
            $config['max_height'] = 0;
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload('image');

            $types_of_product = $this->input->post('types_of_product');
            $product_name = $this->input->post('product_name');
            $manufacture_company = $this->input->post('manufacture_company');
            $product_indication = $this->input->post('product_indication');
            $purchase_price = $this->input->post('purchase_price');
            $selling_price = $this->input->post('selling_price');
            $total_qty = $this->input->post('total_qty');
            $unit_type = $this->input->post('unit');
            $reminder_level = $this->input->post('reminder_level');
            $shelf = $this->input->post('shelf');
            $shelf_details = $this->input->post('shelf_details');
            $update_data = array(
                'date' => date('Y-m-d'),
                'types_of_product' => $types_of_product,
                'product_name' => $product_name,
                'manufacture_company' => $manufacture_company,
                'product_indication' => $product_indication,
                'purchase_price' => $purchase_price,
                'selling_price' => $selling_price,
                'total_qty' => $total_qty,
                'unit_type' => $unit_type,
                'reminder_level' => $reminder_level,
                'product_shelf' => $shelf,
                'shelf_details' => $shelf_details
            );

            $this->Common_model->update_data_onerow('insert_product_info', $update_data, 'record_id', $id);
            redirect('Show_form/insert_product_info/edit', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_medicine_info($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $img_name = $id . ".jpg";

            $config['file_name'] = $img_name;
            $config['upload_path'] = './assets/img/medicine/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 0;
            $config['max_width'] = 0;
            $config['max_height'] = 0;
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload('image');

            $types_of_medicine = $this->input->post('types_of_medicine');
            $medicine_name = $this->input->post('medicine_name');
            $medicine_presentation = $this->input->post('medicine_presentation');
            $generic_name = $this->input->post('generic_name');
            $manufacture_company = $this->input->post('manufacture_company');
            $store_type = $this->input->post('store_type');
            $unit_type = $this->input->post('unit');
            $drug_indication = $this->input->post('drug_indication');
            $purchase_price = $this->input->post('purchase_price');
            $selling_price = $this->input->post('selling_price');
            $total_qty = $this->input->post('total_qty');
            $reminder_level = $this->input->post('reminder_level');
            $shelf = $this->input->post('shelf');
            $shelf_details = $this->input->post('shelf_details');
            $update_data = array(
                'date' => date('Y-m-d'),
                'types_of_medicine' => $types_of_medicine,
                'medicine_name' => $medicine_name,
                'medicine_presentation' => $medicine_presentation,
                'generic_name' => $generic_name,
                'manufacture_company' => $manufacture_company,
                'store_type' => $store_type,
                'unit_type' => $unit_type,
                'drug_indication' => $drug_indication,
                'purchase_price' => $purchase_price,
                'selling_price' => $selling_price,
                'total_qty' => $total_qty,
                'reminder_level' => $reminder_level,
                'medicine_shelf' => $shelf,
                'shelf_details' => $shelf_details
            );

            $this->Common_model->update_data_onerow('insert_medicine_info', $update_data, 'record_id', $id);
            redirect('Show_form/insert_medicine_info/edit', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function appointment_status($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {

            $update_data = array(
                'status' => 1
            );

            $this->Common_model->update_data_onerow('appointment_info', $update_data, 'record_id', $id);
//            redirect('Show_form/appointment/edit', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function schedule($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {

            $staff_type = $this->input->post('staff_type');
            $date = $this->input->post('date');
            $doctor_name = $this->input->post('doctor_name');
            $department = $this->input->post('dept');
            $start_time = $this->input->post('st_time');
            $end_time = $this->input->post('end_time');
            $per_patient_time = $this->input->post('pp_time');
            $update_data = array(
                'date' => $date,
                'staff_type' => $staff_type,
                'doctor_name' => $doctor_name,
                'department' => $department,
                'start_time' => $start_time,
                'end_time' => $end_time,
                'per_patient_time' => $per_patient_time,
            );

            $this->Common_model->update_data_onerow('doctor_schedule', $update_data, 'record_id', $id);
            redirect('Show_form/doc_schedule/edit', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_patient($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $name = $this->input->post('name');
            $age = $this->input->post('age');
            $weight = $this->input->post('weight');
            $height = $this->input->post('height');
            $mobile = $this->input->post('mobile');
            $address = $this->input->post('address');
            $update_data = array(
                'name' => $name,
                'age' => $age,
                'weight' => $weight,
                'mobile' => $mobile,
                'address' => $address,
                'height' => $height
            );
            $this->Common_model->update_data_onerow('patient', $update_data, 'record_id', $id);
            redirect('Show_form/create_patient/edit', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_doctor($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $this->load->model('Common_model');
            $name = $this->input->post('name');
            $designation = $this->input->post('designation');
            $mobile = $this->input->post('mobile');
            $address = $this->input->post('address');
            $department = $this->input->post('department');
            $frees = $this->input->post('frees');
            $doctors_time = $this->input->post('doctors_time');
            $update_data = array(
                'name' => $name,
                'designation' => $designation,
                'mobile' => $mobile,
                'address' => $address,
                'department' => $department,
                'frees' => $frees,
                'doctors_time' => $doctors_time
            );
            $this->Common_model->update_data_onerow('doctor', $update_data, 'record_id', $id);
            redirect('Show_form/create_doctor/edit', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function test_price($id) {
        if ($this->session->userdata('ses_user_type') == "admin" || $this->session->userdata('ses_user_type') == "staff") {
            $this->form_validation->set_rules('test_id', 'Test Name', 'trim|required');
            $this->form_validation->set_rules('price', 'Rate', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/test_price/empty', 'refresh');
            } else {
                $test = explode("###", $this->input->post('test_id'));
                $test_id = $test[0];
                $test_name = $test[1];
                $price = $this->input->post('price');

                $update_data = array(
                    'test_id' => $test_id,
                    'test_name' => $test_name,
                    'price' => $price);
                $this->Common_model->update_data_onerow('test_price', $update_data, 'record_id', $id);
                redirect('Show_form/test_price/edit', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function birth_report($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {

            $date = $this->input->post('date');
            $patient_id = $this->input->post('patient');
            $patient_name = $this->input->post('patient_name');
            $child_name = $this->input->post('child_name');
            $gender = $this->input->post('gender');
            $doctor_id = $this->input->post('doctor');
            $doctor_name = $this->input->post('doctor_name');
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $update_data = array(
                'date' => $date,
                'patient_id' => $patient_id,
                'patient_name' => $patient_name,
                'child_name' => $child_name,
                'gender' => $gender,
                'doctor_name' => $doctor_name,
                'doctor_id' => $doctor_id,
                'title' => $title,
                'description' => $description
            );

            $this->Common_model->update_data_onerow('birth_report', $update_data, 'record_id', $id);
            redirect('Show_form/birth_report/edit', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function death_report($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {

            $date = $this->input->post('date');
            $patient_id = $this->input->post('patient');
            $patient_name = $this->input->post('patient_name');
            $gender = $this->input->post('gender');
            $doctor_id = $this->input->post('doctor');
            $doctor_name = $this->input->post('doctor_name');
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $update_data = array(
                'date' => $date,
                'patient_id' => $patient_id,
                'patient_name' => $patient_name,
                'gender' => $gender,
                'doctor_name' => $doctor_name,
                'doctor_id' => $doctor_id,
                'title' => $title,
                'description' => $description
            );

            $this->Common_model->update_data_onerow('death_report', $update_data, 'record_id', $id);
            redirect('Show_form/death_report/edit', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function operation_report($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {

            $date = $this->input->post('date');
            $patient_id = $this->input->post('patient');
            $patient_name = $this->input->post('patient_name');
            $doctor_id = $this->input->post('doctor');
            $doctor_name = $this->input->post('doctor_name');
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $update_data = array(
                'date' => $date,
                'patient_id' => $patient_id,
                'patient_name' => $patient_name,
                'doctor_name' => $doctor_name,
                'doctor_id' => $doctor_id,
                'title' => $title,
                'description' => $description
            );

            $this->Common_model->update_data_onerow('operation_report', $update_data, 'record_id', $id);
            redirect('Show_form/operation_report/edit', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function investigation_report($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {

            $img_name = $id . ".jpg";

            $config['file_name'] = $img_name;
            $config['upload_path'] = './assets/img/investigation_report/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 0;
            $config['max_width'] = 0;
            $config['max_height'] = 0;
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload('image');

            $date = $this->input->post('date');
            $patient_id = $this->input->post('patient');
            $patient_name = $this->input->post('patient_name');
            $doctor_id = $this->input->post('doctor');
            $doctor_name = $this->input->post('doctor_name');
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $update_data = array(
                'date' => $date,
                'patient_id' => $patient_id,
                'patient_name' => $patient_name,
                'doctor_name' => $doctor_name,
                'doctor_id' => $doctor_id,
                'title' => $title,
                'description' => $description
            );

            $this->Common_model->update_data_onerow('investigation_report', $update_data, 'record_id', $id);
            redirect('Show_form/investigation_report/edit', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function appointment($record_id, $patient_id){
        $patient = [
                    'name' => $this->input->post('name'),
                    'age' => $this->input->post('age'),
                    'mobile' => $this->input->post('mobile'),
                    'address' => $this->input->post('address')
                ]; 
        $this->Common_model->update_data_onerow('patient', $patient, 'record_id', $patient_id);    
        $appointment = [
                    'date' => $this->input->post('date'),
                    'doctor_id' => $this->input->post('doctor_id'),
                    'doctor_fee' => $this->input->post('doctor_fee'),
                    'appointment_time' => $this->input->post('appointment_time')
                ];    
        $this->Common_model->update_data_onerow('appointment_info', $appointment, 'record_id', $record_id);   
        $this->session->set_flashdata('success', 'Updated Successfully'); 
        redirect(base_url().'Show_form/appointment');
    }
    public function assign_bed($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {

            $discharge_date = date("Y-m-d");
            $result = $this->Common_model->get_allinfo_byid('assign_bed', 'record_id', $id);
            foreach ($result as $res) {
                $assign_date = $res->assign_date;
                $charge = $res->charge;
                $invoice_no = $res->invoice_no;
            }
            $count = 0;
            while (strtotime($assign_date) <= strtotime($discharge_date)) {
                $count++;
                $assign_date = date("Y-m-d", strtotime("+1 day", strtotime($assign_date)));
            }

            $amount = $charge * $count;

            $update_data = array(
                'discharge_date' => $discharge_date,
                'amount' => $amount,
                'status' => 1
            );
            $this->Common_model->update_data_onerow('assign_bed', $update_data, 'record_id', $id);

            $update_data = array(
                'discharge_date' => $discharge_date,
                'total' => $amount,
                'due_amount' => $amount
            );
            $this->Common_model->update_data_onerow('patient_admission', $update_data, 'invoice_no', $invoice_no);
            redirect('Show_form/assign_bed/edit', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function block_test_type($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $update_data = array('block_status' => 0);
            $this->Common_model->update_data_onerow('test_type', $update_data, 'record_id', $id);
            redirect('Show_form/test_type/active', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function unblock_test_type($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $update_data = array('block_status' => 1);
            $this->Common_model->update_data_onerow('test_type', $update_data, 'record_id', $id);
            redirect('Show_form/test_type/inactive', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function test_type($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {

            $test_name = $this->input->post('test_name');
            $description = $this->input->post('description');
            $rate = $this->input->post('rate');
            $update_data = array(
                'test_name' => $test_name,
                'description' => $description,
                'rate' => $rate
            );

            $this->Common_model->update_data_onerow('test_type', $update_data, 'record_id', $id);
            redirect('Show_form/test_type/edit', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function room_info($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {

            $room_no = $this->input->post('room_no');
            $floor_no = $this->input->post('floor_no');
            $department = $this->input->post('dept');
            $room_type = $this->input->post('room_type');
            $room_condition = $this->input->post('room_con');
            $update_data = array(
                'room_no' => $room_no,
                'floor_no' => $floor_no,
                'department' => $department,
                'room_type' => $room_type,
                'room_condition' => $room_condition
            );

            $this->Common_model->update_data_onerow('room_info', $update_data, 'record_id', $id);
            redirect('Show_form/room_info/edit', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function single_page_content($record_id){
        $this->load->library('upload',['upload_path' => './assets/img/single_page_content/',
                                        'allowed_types' => 'png|jpg|gif'
                                    ]);
        $this->upload->do_upload('image');
        $file_name = $this->upload->data('file_name');
        if(empty($file_name)){
            $value = $this->Common_model->single_row(['record_id' => $record_id], 'single_page_content');
            $file_name = $value->image; 
        }
        $array = [
                    'title' => $this->input->post('title'),
                    'image' => $file_name,
                    'details' => $this->input->post('details')
                ];
        $this->Common_model->update_data_onerow('single_page_content', $array, 'record_id', $record_id);
        $this->session->set_flashdata('message', "Information Updated Successfully");
        redirect(base_url().'Show_form/single_page_content');
    }
    public function photo_gallery($record_id){
        $this->load->library('upload',[
                                    'upload_path' => './assets/img/photo_gallery/',
                                    'allowed_types' => 'png|jpg|gif'
                                ]);
        $this->upload->do_upload('image');
        $file_name = $this->upload->data('file_name');
        if(empty($file_name)){
            $value = $this->Common_model->single_row(['record_id' => $record_id], 'photo_gallery');
            $file_name = $value->image;           
        }
        $array = [
                    'title' => $this->input->post('title'),
                    'image' => $file_name
                ];
        $this->Common_model->update_data_onerow('photo_gallery', $array, 'record_id', $record_id);
        $this->session->set_flashdata('message', "Photo Updated Successfully");
        redirect(base_url().'Show_form/photo_gallery');
    }  
    public function contact_us($id){
        $array = [
            'c_name' => $this->input->post('c_name'),
            'address' => $this->input->post('address'),
            'email' => $this->input->post('email'),
            'email2' => $this->input->post('email2'),
            'email3' => $this->input->post('email3'),
            'web' => $this->input->post('web'),
            'hotline' => $this->input->post('hotline'),
            'hotline2' => $this->input->post('hotline2'),
            'hotline3' => $this->input->post('hotline3'),
        ];
        $this->Common_model->update_data_onerow('contact',$array,'id',$id);
        $this->session->set_flashdata('success','Information Updated Successfully');
        redirect(base_url().'Show_form/contact_us');
    }   
    public function news($record_id){
        $this->Common_model->update_data_onerow('new_msg',
                                            ['news' => $this->input->post('news')],
                                            'record_id',
                                            $record_id);
        $this->session->set_flashdata('success','Information Updated Successfully');
        redirect(base_url().'Show_form/insert_news');
    } 
}
