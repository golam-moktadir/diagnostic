<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Insert extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Common_model');
    }

    public function photo_gallery() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('image_name', 'Image Name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/photo_gallery/empty', 'refresh');
            } else {
                $result = $this->Common_model->find_last_id('record_id', 'photo_gallery');
                if (!$result) {
                    $max_id = 1;
                } else {
                    foreach ($result as $row) {
                        $max_id = ($row->record_id) + 1;
                    }
                }

                $img_name = $max_id . ".jpg";

                $config['file_name'] = $img_name;
                $config['upload_path'] = './assets/img/photo_gallery/';
                $config['allowed_types'] = '*';
                $config['max_size'] = 0;
                $config['max_width'] = 0;
                $config['max_height'] = 0;
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->do_upload('image');

                $image_name = $this->input->post('image_name');
                $insert_data = array(
                    'record_id' => $max_id,
                    'image_name' => $image_name,
                    'image_id' => $img_name
                );
                $this->Common_model->insert_data('photo_gallery', $insert_data);
                redirect('Show_form/photo_gallery/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_contact() {

        $admin_type = $this->session->ses_usertype;
        if ($admin_type == 'Super Admin') {

            $this->load->model('Common_model');
            $max_id = '1';


            $this->form_validation->set_rules('c_name', 'Company Name', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('web', 'Web Address', 'trim|required');
            $this->form_validation->set_rules('hotline', 'Hotline No.', 'trim|required');


            if ($this->form_validation->run() == FALSE) {

                $this->load->view('admin/update_contact');
            } else {

                $c_name = $this->input->post('c_name');
                $address = $this->input->post('address');
                $email = $this->input->post('email');
                $email2 = $this->input->post('email2');
                $email3 = $this->input->post('email3');
                $web = $this->input->post('web');
                $hotline = $this->input->post('hotline');
                $hotline2 = $this->input->post('hotline2');
                $hotline3 = $this->input->post('hotline3');


                $this->load->model('Common_model');
                $this->Common_model->update_contact($max_id, $c_name, $address, $email, $email2, $email3, $web, $hotline, $hotline2, $hotline3);

                redirect('Show_form/success_msg_update', 'refresh');
            }
        } else {
            redirect('Show_form/contact_us', 'refresh');
        }
    }

    public function service() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $service_name = $this->input->post('service_name');
            $insert_data = array(
                'service' => $service_name
            );
            $this->Common_model->insert_data('service', $insert_data);
            redirect('Show_form/service/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function single_page_content() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('details', 'Details', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/single_page_content/empty', 'refresh');
            } else {
                $result = $this->Common_model->find_last_id('record_id', 'single_page_content');
                if (!$result) {
                    $max_id = 1;
                } else {
                    foreach ($result as $row) {
                        $max_id = ($row->record_id) + 1;
                    }
                }

                $img_name = $max_id . ".jpg";

                $config['file_name'] = $img_name;
                $config['upload_path'] = './assets/img/single_page_content/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 0;
                $config['max_width'] = 0;
                $config['max_height'] = 0;
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->do_upload('image');

                $title = $this->input->post('title');
                $details = $this->input->post('details');
                $insert_data = array(
                    'record_id' => $max_id,
                    'title' => $title,
                    'details' => $details,
                    'image' => $img_name
                );
                $this->Common_model->insert_data('single_page_content', $insert_data);
                redirect('Show_form/single_page_content/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

//    public function create_doctor() {
//        $user_type = $this->session->ses_user_type;
//        if ($user_type == "admin") {
//            $this->load->model('Common_model');
//            $name = $this->input->post('name');
//            $designation = $this->input->post('designation');
//            $mobile = $this->input->post('mobile');
//            $address = $this->input->post('address');
//            $department = $this->input->post('department');
//            $frees = $this->input->post('frees');
//            $doctors_time = $this->input->post('doctors_time');
//            $insert_data = array(
//                'name' => $name,
//                'designation' => $designation,
//                'mobile' => $mobile,
//                'address' => $address,
//                'department' => $department,
//                'frees' => $frees,
//                'doctors_time' => $doctors_time
//            );
//            $this->Common_model->insert_data('doctor', $insert_data);
//            redirect('Show_form/create_doctor/created', 'refresh');
//        } else {
//            $data['wrong_msg'] = "";
//            $this->load->view('website/login_check', $data);
//        }
//    }
//
////    public function test_name() {
//        if ($this->session->userdata('ses_user_type') == "admin") {
//            $this->form_validation->set_rules('test_category', 'Test Category', 'trim|required');
//            $this->form_validation->set_rules('test_name', 'Test Name', 'trim|required');
//            if ($this->form_validation->run() == FALSE) {
//                redirect('Show_form/create_test_name/empty', 'refresh');
//            } else {
//                $medicine_name = $this->input->post('test_category');
//                $generic_name = $this->input->post('test_name');
//                $insert_data = array(
//                    'test_category' => $medicine_name,
//                    'test_name' => $generic_name
//                );
//                $this->Common_model->insert_data('test_name', $insert_data);
//                redirect('Show_form/create_test_name/created', 'refresh');
//            }
//        } else {
//            $data['wrong_msg'] = "";
//            $this->load->view('website/login_check', $data);
//        }
//    }

    public function test_category() {
        if ($this->session->userdata('ses_user_type') == "admin" || $this->session->userdata('ses_user_type') == "staff") {
            $this->form_validation->set_rules('test_category', 'Test Category', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/test_category/empty', 'refresh');
            } else {
                $test_category = $this->input->post('test_category');

                $insert_data = array(
                    'test_category' => $test_category
                );
                $this->Common_model->insert_data('test_category', $insert_data);
                redirect('Show_form/create_test_category/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

//    public function test_price() {
//        if ($this->session->userdata('ses_user_type') == "admin") {
//            $this->form_validation->set_rules('test_id', 'Test Name', 'trim|required');
//            $this->form_validation->set_rules('description', 'Description', 'trim|required');
//            $this->form_validation->set_rules('price', 'Rate', 'trim|required');
//
//            if ($this->form_validation->run() == FALSE) {
//                redirect('Show_form/test_price/empty', 'refresh');
//            } else {
//                $test = explode("###", $this->input->post('test_id'));
//                $test_id = $test[0];
//                $test_name = $test[1];
//                $description = $this->input->post('description');
//                $price = $this->input->post('price');
//
//                $insert_data = array(
//                    'test_id' => $test_id,
//                    'test_name' => $test_name,
//                    'description' => $description,
//                    'price' => $price);
//                $this->Common_model->insert_data('test_price', $insert_data);
//                redirect('Show_form/test_price/created', 'refresh');
//            }
//        } else {
//            $data['wrong_msg'] = "";
//            $this->load->view('website/login_check', $data);
//        }
//    }


    public function pay_service_due() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $date = $this->input->post('date');
            $patient = explode("###", $this->input->post('patient_id'));
            $patient_id = $patient[0];
            $patient_name = $patient[1];
            $previous_due = $this->input->post('previous_due');
            $pay = $this->input->post('pay');
            $due = $this->input->post('due');

            $insert_data = array(
                'patient_id' => $patient_id,
                'patient_name' => $patient_name,
                'date' => $date,
                'previous_due' => $previous_due,
                'pay' => $pay,
                'due' => $due
            );
            $this->Common_model->insert_data('pay_service_due', $insert_data);

            $data['patient_id'] = $patient_id;
            $data['patient_name'] = $patient_name;
            $data['date'] = $date;
            $data['previous_due'] = $previous_due;
            $data['pay'] = $pay;
            $data['due'] = $due;

            $insert_data = array(
                'date' => $date,
                'particular' => "Pay Service Due",
                'patient_id' => $patient_id,
                'patient_name' => $patient_name,
                'amount' => 0,
                'paid' => $pay,
                'due' => $due
            );
            $this->Common_model->insert_data('create_bill', $insert_data);
            $this->load->view('admin/header');
            $this->load->view('admin/pay_service_due_invoice', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function pay_test_due() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $date = $this->input->post('date');
            $patient = explode("###", $this->input->post('patient_id'));
            $patient_id = $patient[0];
            $patient_name = $patient[1];
            $previous_due = $this->input->post('previous_due');
            $pay = $this->input->post('pay');
            $due = $this->input->post('due');

            $insert_data = array(
                'patient_id' => $patient_id,
                'patient_name' => $patient_name,
                'date' => $date,
                'previous_due' => $previous_due,
                'pay' => $pay,
                'due' => $due
            );
            $this->Common_model->insert_data('pay_test_due', $insert_data);

            $data['patient_id'] = $patient_id;
            $data['patient_name'] = $patient_name;
            $data['date'] = $date;
            $data['previous_due'] = $previous_due;
            $data['pay'] = $pay;
            $data['due'] = $due;

            $insert_data = array(
                'date' => $date,
                'particular' => "Pay Test Due",
                'patient_id' => $patient_id,
                'patient_name' => $patient_name,
                'amount' => 0,
                'paid' => $pay,
                'due' => $due
            );
            $this->Common_model->insert_data('create_bill', $insert_data);

//            redirect('/Test_result/show_report/' . $test_inserted_id, 'refresh');
            $this->load->view('admin/header');
            $this->load->view('admin/pay_test_due_invoice', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

//    
//    public function pay_test_due_invoice() {
//        $data['patient_id'] = $patient_id;
//            $data['patient_name'] = $patient_name;
//            $data['date'] = $date;
//            $data['previous_due'] = $previous_due;
//            $data['pay'] = $pay;
//            $data['due'] = $due;
//            $this->load->view('admin/header');
//            $this->load->view('admin/pay_test_due_invoice', $data);
//            $this->load->view('admin/footer');
//    }

    public function test_result() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $date = $this->input->post('date');
            $patient = explode("###", $this->input->post('patient_id'));
            $patient_id = $patient[0];
            $patient_name = $patient[1];
            $test_category = $this->input->post('test_category');
            $age = $this->input->post('age');
            $sex = $this->input->post('sex');
            $ref_by = $this->input->post('ref_by');
            if ($test_category == "Haematology") {
                $Hemoglobin = $this->input->post('Hemoglobin');
                $ESR = $this->input->post('ESR');
                $Total_WBC_Count = $this->input->post('Total_WBC_Count');
                $Neutrophils = $this->input->post('Neutrophils');
                $Lymphocytes = $this->input->post('Lymphocytes');
                $Monocytes = $this->input->post('Monocytes');
                $Eosinophils = $this->input->post('Eosinophils');
                $Basophils = $this->input->post('Basophils');
                $Others_Cell = $this->input->post('Others_Cell');
                $Total_Eosinophil = $this->input->post('Total_Eosinophil');
                $Platelet_Count = $this->input->post('Platelet_Count');
                $MPV = $this->input->post('MPV');
                $PDW = $this->input->post('PDW');
                $PCT = $this->input->post('PCT');
                $RBC_Count = $this->input->post('RBC_Count');
                $HCT_PCV = $this->input->post('HCT_PCV');
                $MCV = $this->input->post('MCV');
                $MCH = $this->input->post('MCH');
                $MCHC = $this->input->post('MCHC');
                $RDW_CV = $this->input->post('RDW_CV');
                $insert_data = array(
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'date' => $date,
                    'age' => $age,
                    'sex' => $sex,
                    'referenced_by' => $ref_by,
                    'hemoglobin' => $Hemoglobin,
                    'esr' => $ESR,
                    'total_wbc' => $Total_WBC_Count,
                    'neutrophils' => $Neutrophils,
                    'lymphocytes' => $Lymphocytes,
                    'monocytes' => $Monocytes,
                    'eosinophils' => $Eosinophils,
                    'basophils' => $Basophils,
                    'others_cell' => $Others_Cell,
                    'total_eosinophils' => $Total_Eosinophil,
                    'platelet_count' => $Platelet_Count,
                    'mpv' => $MPV,
                    'pdw' => $PDW,
                    'pct' => $PCT,
                    'rbc_count' => $RBC_Count,
                    'hct_pcv' => $HCT_PCV,
                    'mcv' => $MCV,
                    'mch' => $MCH,
                    'mchc' => $MCHC,
                    'rdw_cv' => $RDW_CV
                );
                $this->Common_model->insert_data('report_haematology', $insert_data);

                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['hemoglobin'] = $Hemoglobin;
                $data['esr'] = $ESR;
                $data['total_wbc'] = $Total_WBC_Count;
                $data['neutrophils'] = $Neutrophils;
                $data['lymphocytes'] = $Lymphocytes;
                $data['monocytes'] = $Monocytes;
                $data['eosinophils'] = $Eosinophils;
                $data['basophils'] = $Basophils;
                $data['others_cell'] = $Others_Cell;
                $data['total_eosinophils'] = $Total_Eosinophil;
                $data['platelet_count'] = $Platelet_Count;
                $data['mpv'] = $MPV;
                $data['pdw'] = $PDW;
                $data['pct'] = $PCT;
                $data['rbc_count'] = $RBC_Count;
                $data['hct_pcv'] = $HCT_PCV;
                $data['mcv'] = $MCV;
                $data['mch'] = $MCH;
                $data['mchc'] = $MCHC;
                $data['rdw_cv'] = $RDW_CV;

                $this->load->view('admin/header');
                $this->load->view('admin/report_haematology_print', $data);
                $this->load->view('admin/footer');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_sms() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('date', 'Create Date', 'trim|required');
            $this->form_validation->set_rules('title', 'Message Title', 'trim|required');
            $this->form_validation->set_rules('body', 'Message Body', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/create_sms/empty', 'refresh');
            } else {
                $date = $this->input->post('date');
                $title = $this->input->post('title');
                $body = $this->input->post('body');

                $insert_data = array(
                    'create_date' => $date,
                    'title' => $title,
                    'body' => $body
                );
                $this->Common_model->insert_data('create_sms', $insert_data);
                redirect('Show_form/create_sms/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_notice() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('date', 'Date', 'trim|required');
            $this->form_validation->set_rules('particular', 'Particular', 'trim|required');
            $this->form_validation->set_rules('details', 'Details', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/insert_notice/empty', 'refresh');
            } else {
                $date = $this->input->post('date');
                $particular = $this->input->post('particular');
                $details = $this->input->post('details');

                $insert_data = array(
                    'date' => $date,
                    'particular' => $particular,
                    'details' => $details
                );
                $this->Common_model->insert_data('insert_notice', $insert_data);
                redirect('Show_form/insert_notice/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function advance_payment() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $date = $this->input->post('date');
            $patient = explode("###", $this->input->post('patient_id'));
            $patient_id = $patient[0];
            $patient_name = $patient[1];
            $age = $this->input->post('age');
            $mobile = $this->input->post('mobile');
            $doctor = $this->input->post('doctor');
            $department = $this->input->post('department');
            $room_no = $this->input->post('room_no');
            $amount = $this->input->post('amount');
//         $rest_amount = $this->input->post('rest_amount');
            $insert_data = array(
                'date' => $date,
                'patient_id' => $patient_id,
                'patient_name' => $patient_name,
                'age' => $age,
                'mobile' => $mobile,
                'doctor' => $doctor,
                'department' => $department,
                'room_no' => $room_no,
                'payment_amount' => $amount
            );
            $this->Common_model->insert_data('advance_payment', $insert_data);
            //Send ta to create bill
            $insert_data = array(
                'date' => $date,
                'particular' => "Advance Payment",
                'patient_id' => $patient_id,
                'patient_name' => $patient_name,
                'amount' => 0,
                'paid' => $amount,
                'due' => 0
            );
            $this->Common_model->insert_data('create_bill', $insert_data); //Send ta to create bill END

            $data['date'] = $date;
            $data['patient_id'] = $patient_id;
            $data['patient_name'] = $patient_name;
            $data['age'] = $age;
            $data['mobile'] = $mobile;
            $data['doctor'] = $doctor;
            $data['department'] = $department;
            $data['room_no'] = $room_no;

//            $data['payment_method'] = $payment_method;
            $data['payment_amount'] = $amount;
            $this->load->view('admin/header');
            $this->load->view('admin/show_advance_payment_receipt', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function add_package() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $package_name = $this->input->post('package_name');
            $description = $this->input->post('description');
            $rate = $this->input->post('rate');
            $discount = $this->input->post('discount');
            $insert_data = array(
                'package_name' => $package_name,
                'description' => $description,
                'rate' => $rate
            );
            $this->Common_model->insert_data('add_package', $insert_data);
            redirect('Show_form/add_package/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_billing_service() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $service_name = $this->input->post('service_name');
            $description = $this->input->post('description');
            $rate = $this->input->post('rate');
            $insert_data = array(
                'service_name' => $service_name,
                'description' => $description,
                'rate' => $rate
            );
            $this->Common_model->insert_data('billing_service', $insert_data);
            redirect('Show_form/create_billing_service/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

//    public function service() {
//        $user_type = $this->session->ses_user_type;
//        if ($user_type == "admin") {
//            $service_name = $this->input->post('service_name');
//            $insert_data = array(
//                'service' => $service_name
//            );
//            $this->Common_model->insert_data('service', $insert_data);
//            redirect('Show_form/service/created', 'refresh');
//        } else {
//            $data['wrong_msg'] = "";
//            $this->load->view('website/login_check', $data);
//        }
//    }

    public function designation() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $designation = $this->input->post('designation');
            $insert_data = array(
                'designation' => $designation
            );
            $this->Common_model->insert_data('designation', $insert_data);
            redirect('Show_form/designation/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_patient() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $this->load->model('Common_model');
            $name = $this->input->post('name');
            $age = $this->input->post('age');
            $weight = $this->input->post('weight');
            $height = $this->input->post('height');
            $mobile = $this->input->post('mobile');
            $address = $this->input->post('address');
            $insert_data = array(
                'name' => $name,
                'age' => $age,
                'weight' => $weight,
                'mobile' => $mobile,
                'address' => $address,
                'height' => $height
            );
            $this->Common_model->insert_data('patient', $insert_data);
            redirect('Show_form/create_patient/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function patient_admission() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $amount = $this->input->post('amount');
            $discount = $this->input->post('discount');
            $sub_total = $this->input->post('sub_total');
            $pay = $this->input->post('pay');
            $due = $this->input->post('due');
//            $advance = $this->input->post('advance');
            $date_from = $this->input->post('date_from');
            $date_to = $this->input->post('date_to');
            $patient = explode('###', $this->input->post('patient_id'));
            $patient_id = $patient[0];
            $patient_name = $patient[1];
//            $doctor = $this->input->post('doctor');
//            $department = $this->input->post('department');
            $room_no = $this->input->post('room_no');
//            $age = $this->input->post('age');
//            $mobile = $this->input->post('mobile');
            $total_day = $this->input->post('total_day');
            $single_day_price = $this->input->post('single_day_price');
            $insert_data = array(
                'date_from' => $date_from,
                'date_to' => $date_to,
                'patient_id' => $patient_id,
                'patient_name' => $patient_name,
//                'doctor_name' => $doctor,
//                'department' => $department,
                'room_no' => $room_no,
                'total_day' => $total_day,
                'single_day_price' => $single_day_price,
//                'age' => $age,
//                'mobile' => $mobile,
                'amount' => $amount,
                'discount' => $discount,
                'sub_total' => $sub_total,
                'pay' => $pay,
                'due' => $due,
//                'advance' => $advance
            );
            $this->Common_model->insert_data('patient_admission', $insert_data);

            $data['date_from'] = $date_from;
            $data['date_to'] = $date_to;
            $data['patient_id'] = $patient_id;
            $data['patient_name'] = $patient_name;
//            $data['doctor_name'] = $doctor;
//            $data['department'] = $department;
            $data['room_no'] = $room_no;
            $data['total_day'] = $total_day;
            $data['single_day_price'] = $single_day_price;
//            $data['age'] = $age;
//            $data['mobile'] = $mobile;
            $data['amount'] = $amount;
            $data['discount'] = $discount;
            $data['sub_total'] = $sub_total;
            $data['pay'] = $pay;
            $data['due'] = $due;
//            $data['advance'] = $advance;

            $insert_data = array(
                'date' => date("Y-m-d"),
                'particular' => "Patient Admission",
                'patient_id' => $patient_id,
                'patient_name' => $patient_name,
                'amount' => $sub_total,
                'paid' => $pay,
                'due' => $due
            );
            $this->Common_model->insert_data('create_bill', $insert_data);
            $this->load->view('admin/header');
            $this->load->view('admin/patient_admission_invoice', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_doctor() {
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
            $insert_data = array(
                'name' => $name,
                'designation' => $designation,
                'mobile' => $mobile,
                'address' => $address,
                'department' => $department,
                'frees' => $frees,
                'doctors_time' => $doctors_time
            );
            $this->Common_model->insert_data('doctor', $insert_data);
            redirect('Show_form/create_doctor/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function expense() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $this->load->model('Common_model');
            $date = $this->input->post('date');
            $expense_head = $this->input->post('expense_head');
            $voucher_no = $this->input->post('voucher_no');
            $quantity = $this->input->post('quantity');
            $amount = $this->input->post('amount');

            $insert_data = array(
                'date' => $date,
                'head' => $expense_head,
                'voucher_no' => $voucher_no,
                'quantity' => $quantity,
                'amount' => $amount
            );
            $this->Common_model->insert_data('expense', $insert_data);
            redirect('Show_form/expense/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function expense_head() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $this->load->model('Common_model');

            $expense_head = $this->input->post('expense_head');
            $insert_data = array(
                'head' => $expense_head
            );
            $this->Common_model->insert_data('expense_head', $insert_data);
            redirect('Show_form/expense_head/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function income() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $this->load->model('Common_model');

            $date = $this->input->post('date');
            $income_head = $this->input->post('income_head');
            $invoice_no = $this->input->post('invoice_no');
            $quantity = $this->input->post('quantity');
            $amount = $this->input->post('amount');

            $insert_data = array(
                'date' => $date,
                'head' => $income_head,
                'invoice_no' => $invoice_no,
                'quantity' => $quantity,
                'amount' => $amount
            );
            $this->Common_model->insert_data('income', $insert_data);
            redirect('Show_form/income/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function income_head() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $this->load->model('Common_model');

            $income_head = $this->input->post('income_head');
            $insert_data = array(
                'head' => $income_head
            );
            $this->Common_model->insert_data('income_head', $insert_data);
            redirect('Show_form/income_head/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_customer() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $this->load->model('Common_model');

            $name = $this->input->post('name');
            $mobile = $this->input->post('mobile');
            $email = $this->input->post('email');
            $address = $this->input->post('address');
            $insert_data = array(
                'name' => $name,
                'mobile' => $mobile,
                'email' => $email,
                'address' => $address
            );
            $this->Common_model->insert_data('customer', $insert_data);
            redirect('Show_form/create_customer/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_user() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $result = $this->Common_model->find_last_id('record_id', 'staff');
            if (!$result) {
                $max_id = 1;
            } else {
                foreach ($result as $row) {
                    $max_id = ($row->record_id) + 1;
                }
            }
            $img_name = $max_id . ".jpg";

            $config['file_name'] = $img_name;
            $config['upload_path'] = './assets/img/staff/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 0;
            $config['max_width'] = 0;
            $config['max_height'] = 0;
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload('image');

            $staff_type = $this->input->post('staff_type');
            $name = $this->input->post('name');
            $doctor_name = $this->input->post('doctor_name');
            $joining_date = $this->input->post('joining_date');
            $username = $this->input->post('username');
            $password = $this->input->post('password');

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
            $create_option = $this->input->post('create_option');
            $billing = $this->input->post('billing');
            $laboratory = $this->input->post('laboratory');
            $accounting = $this->input->post('accounting');
//            $information = $this->input->post('information');
            $web = $this->input->post('web');
            $sales = $this->input->post('sales');
            $insert_data = array(
                'record_id' => $max_id,
                'staff_type' => $staff_type,
                'name' => $name,
                'doctor_name' => $doctor_name,
                'joining_date' => $joining_date,
                'username' => $username,
                'password' => $password,
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
                'image' => $img_name,
                'hr_access' => $hr,
//                'inventory_access' => $inventory,
                'createOption_access' => $create_option,
                'billing_access' => $billing,
                'laboratory_access' => $laboratory,
                'accounting_access' => $accounting,
//                'information_access' => $information,
                'webpart_access' => $web,
                'sales_access' => $sales,
                'block_status' => 0
            );
            $this->Common_model->insert_data('staff', $insert_data);
            redirect('Show_form/create_user/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_product_info() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $result = $this->Common_model->find_last_id('record_id', 'insert_product_info');
            if (!$result) {
                $max_id = 1;
            } else {
                foreach ($result as $row) {
                    $max_id = ($row->record_id) + 1;
                }
            }
            $img_name = $max_id . ".jpg";

            $config['file_name'] = $img_name;
            $config['upload_path'] = './assets/img/product/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 0;
            $config['max_width'] = 0;
            $config['max_height'] = 0;
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload('image');

            $temp_medicine_name = explode("###", $this->input->post('product_name'));
            $product_name = $temp_medicine_name[0];
//            $medicine_presentation = $this->input->post('medicine_presentation');
            $product_category = $temp_medicine_name[1];
            $manufacture_company = $this->input->post('manufacture_company');
//            $store_type = $this->input->post('store_type');
            $unit_type = $this->input->post('unit');
//            $drug_indication = $this->input->post('drug_indication');
            $total_purchase_price = $this->input->post('total_purchase_price');
            $purchase_price = $this->input->post('unit_purchase_price');
            $total_sales_price = $this->input->post('total_sales_price');
            $selling_price = $this->input->post('unit_sales_price');
            $total_qty = $this->input->post('total_qty');
            $expired_date = $this->input->post('expired_date');
            $reminder_level = $this->input->post('reminder_level');
//            $shelf = $this->input->post('shelf');
//            $shelf_details = $this->input->post('shelf_details');
            $insert_data = array(
                'record_id' => $max_id,
                'date' => date('Y-m-d'),
//                'types_of_medicine' => $types_of_medicine,
                'product_name' => $product_name,
                'product_category' => $product_category,
                'manufacture_company' => $manufacture_company,
//                'store_type' => $store_type,
                'unit_type' => $unit_type,
//                'drug_indication' => $drug_indication,
                'purchase_price' => $purchase_price,
                'total_purchase_price' => $total_purchase_price,
                'selling_price' => $selling_price,
                'total_Sales_price' => $total_sales_price,
                'total_qty' => $total_qty,
                'reminder_level' => $reminder_level,
                'image' => $img_name,
//                'medicine_shelf' => $shelf,
//                'shelf_details' => $shelf_details,
                'expired_date' => $expired_date
            );
            $this->Common_model->insert_data('insert_product_info', $insert_data);
            redirect('Show_form/insert_product_info/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function lab_product_use_in() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $result = $this->Common_model->find_last_id('record_id', 'lab_product_use_in');
            if (!$result) {
                $max_id = 1;
            } else {
                foreach ($result as $row) {
                    $max_id = ($row->record_id) + 1;
                }
            }

            $product_name = $this->input->post('product_name');
            $total_qty = $this->input->post('total_qty');
            $unit_price = $this->input->post('unit_price');
            $total_price = $this->input->post('total_price');

            $insert_data = array(
                'record_id' => $max_id,
                'date' => date('Y-m-d'),
                'product_name' => $product_name,
                'qty' => $total_qty,
                'unit_price' => $unit_price,
                'total_price' => $total_price
            );
            $this->Common_model->insert_data('lab_product_use_in', $insert_data);
            redirect('Show_form/lab_product_use_in/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function lab_product_use_out() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $result = $this->Common_model->find_last_id('record_id', 'lab_product_use_out');
            if (!$result) {
                $max_id = 1;
            } else {
                foreach ($result as $row) {
                    $max_id = ($row->record_id) + 1;
                }
            }

            $product_name = $this->input->post('product_name');
            $total_qty = $this->input->post('total_qty');
//            $unit_price = $this->input->post('unit_price');
//            $total_price = $this->input->post('total_price');

            $insert_data = array(
                'record_id' => $max_id,
                'date' => date('Y-m-d'),
                'product_name' => $product_name,
                'qty' => $total_qty
//                'unit_price' => $unit_price,
//                'total_price' => $total_price,
            );
            $this->Common_model->insert_data('lab_product_use_out', $insert_data);
            redirect('Show_form/lab_product_use_out/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_medicine_info() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $result = $this->Common_model->find_last_id('record_id', 'insert_medicine_info');
            if (!$result) {
                $max_id = 1;
            } else {
                foreach ($result as $row) {
                    $max_id = ($row->record_id) + 1;
                }
            }
            $img_name = $max_id . ".jpg";

            $config['file_name'] = $img_name;
            $config['upload_path'] = './assets/img/medicine/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 0;
            $config['max_width'] = 0;
            $config['max_height'] = 0;
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload('image');

//         $types_of_medicine = $this->input->post('types_of_medicine');
            $temp_medicine_name = explode("###", $this->input->post('medicine_name'));
            $medicine_name = $temp_medicine_name[0];
            $medicine_presentation = $this->input->post('medicine_presentation');
            $generic_name = $temp_medicine_name[1];
            // $manufacture_company = $this->input->post('manufacture_company');
//            $store_type = $this->input->post('store_type');
            $unit_type = $this->input->post('unit');
//            $drug_indication = $this->input->post('drug_indication');
            $total_purchase_price = $this->input->post('total_purchase_price');
            $purchase_price = $this->input->post('unit_purchase_price');
            $total_sales_price = $this->input->post('total_sales_price');
            $selling_price = $this->input->post('unit_sales_price');
            $total_qty = $this->input->post('total_qty');
            $expired_date = $this->input->post('expired_date');
            $reminder_level = $this->input->post('reminder_level');
//            $shelf = $this->input->post('shelf');
//            $shelf_details = $this->input->post('shelf_details');
            $insert_data = array(
                'record_id' => $max_id,
                'date' => date('Y-m-d'),
//                'types_of_medicine' => $types_of_medicine,
                'medicine_name' => $medicine_name,
                'medicine_presentation' => $medicine_presentation,
                'generic_name' => $generic_name,
                //      'manufacture_company' => $manufacture_company,
//                'store_type' => $store_type,
                'unit_type' => $unit_type,
//                'drug_indication' => $drug_indication,
//                'purchase_price' => $purchase_price,
//                'total_purchase_price' => $total_purchase_price,
//                'selling_price' => $selling_price,
//                'total_Sales_price' => $total_sales_price,
//                'total_qty' => $total_qty,
                'reminder_level' => $reminder_level,
//                'image' => $img_name,
//                'medicine_shelf' => $shelf,
//                'shelf_details' => $shelf_details,
//                'expired_date' => $expired_date
            );
            $this->Common_model->insert_data('insert_medicine_info', $insert_data);
            redirect('Show_form/insert_medicine_info/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function sell_product() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $result = $this->Common_model->find_last_id('record_id', 'sell_product');
            if (!$result) {
                $max_id = 1;
            } else {
                foreach ($result as $row) {
                    $max_id = ($row->record_id) + 1;
                }
            }

            // $types_of_medicine = $this->input->post('types_of_medicine');
            //  $medicine_name = $temp_medicine_name[0];

            $sales_type = $this->input->post('sales_type');
            $customer_name = $this->input->post('customer_name');
            $product_id = $this->input->post('product_id');
            //  $generic_name =$temp_medicine_name[1];
            //            $manufacture_company = $this->input->post('manufacture_company');
            //            $store_type = $this->input->post('store_type');
            $unit_type = $this->input->post('unit');
            //        $drug_indication = $this->input->post('drug_indication');
            $total_purchase_price = $this->input->post('total_purchase_price');
            $purchase_price = $this->input->post('unit_purchase_price');
            $total_sales_price = $this->input->post('total_sales_price');
            $selling_price = $this->input->post('unit_sales_price');
            $total_qty = $this->input->post('total_qty');
            $expired_date = $this->input->post('expired_date');
            $reminder_level = $this->input->post('reminder_level');
//            $shelf = $this->input->post('shelf');
//            $shelf_details = $this->input->post('shelf_details');
            $insert_data = array(
                'record_id' => $max_id,
                'date' => date('Y-m-d'),
//                'types_of_medicine' => $types_of_medicine,
                'medicine_name' => $medicine_name,
                'medicine_presentation' => $medicine_presentation,
                'generic_name' => $generic_name,
                'manufacture_company' => $manufacture_company,
//                'store_type' => $store_type,
                'unit_type' => $unit_type,
//                'drug_indication' => $drug_indication,
                'purchase_price' => $purchase_price,
                'total_purchase_price' => $total_purchase_price,
                'selling_price' => $selling_price,
                'total_Sales_price' => $total_sales_price,
                'total_qty' => $total_qty,
                'reminder_level' => $reminder_level,
                'image' => $img_name,
//                'medicine_shelf' => $shelf,
//                'shelf_details' => $shelf_details,
                'expired_date' => $expired_date
            );
            $this->Common_model->insert_data('insert_medicine_info', $insert_data);
            redirect('Show_form/insert_medicine_info/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function store_type() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->form_validation->set_rules('store_type', 'Store Type', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/store_type/empty', 'refresh');
            } else {
                $store_type = $this->input->post('store_type');
                $insert_data = array(
                    'store_type' => $store_type
                );
                $this->Common_model->insert_data('store_type', $insert_data);
                redirect('Show_form/store_type/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function add_client() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $result = $this->Common_model->find_last_id('record_id', 'add_client');
            if (!$result) {
                $max_id = 1;
            } else {
                foreach ($result as $row) {
                    $max_id = ($row->record_id) + 1;
                }
            }
            $client_name = $this->input->post('client_name');
            $mobile = $this->input->post('mobile');
            $address = $this->input->post('address');
            $previous_due = $this->input->post('previous_due');

            if (empty($previous_due)) {
                $previous_due = 0;
            }

            $insert_data = array(
                'record_id' => $max_id,
                'date' => date('Y-m-d'),
                'name' => $client_name,
                'mobile' => $mobile,
                'address' => $address,
                'previous_due' => $previous_due
            );
            $this->Common_model->insert_data('add_client', $insert_data);

            $update_data = array('delete_status' => 0);
            $this->Common_model->update_data_all_column('sales_due', $update_data);

            $insert_data = array(
                'date' => date('Y-m-d'),
                'invoice_no' => "Previous Due",
                'client_name' => $client_name,
                'client_id' => $max_id,
                'mobile' => $mobile,
                'total' => $previous_due,
                'paid' => 0,
                'due' => $previous_due,
                'delete_status' => 1
            );
            $this->Common_model->insert_data('sales_due', $insert_data);
            redirect('Show_form/insert_client_info/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_sales_payment() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $search_client = explode('#', $this->input->post('search_client'));
            $client_name = $search_client[0];
            $client_id = $search_client[1];

            $paid = $this->input->post('paid');
            $final_due = $this->input->post('final_due');
            $update_data = array('delete_status' => 0);
            $this->Common_model->update_data_all_column('sales_due', $update_data);

            $insert_data = array(
                'date' => date('Y-m-d'),
                'invoice_no' => "Payment",
                'client_name' => $client_name,
                'client_id' => $client_id,
                'total' => 0,
                'paid' => $paid,
                'due' => $final_due,
                'delete_status' => 1
            );
            $this->Common_model->insert_data('sales_due', $insert_data);

            $data['all_value'] = $this->Common_model->get_allinfo_byid('sales_due', 'client_id', $client_id);
            $data['old_due'] = $this->input->post('final_due');
            $data['client_name'] = $client_name;
            $data['client_id'] = $client_id;
            $this->load->view('admin/show_sales_due', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function medicine_name() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->form_validation->set_rules('medicine_name', 'Medicine Name', 'trim|required');
            $this->form_validation->set_rules('generic_name', 'Generic Name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/medicine_name/empty', 'refresh');
            } else {
                $medicine_name = $this->input->post('medicine_name');
                $generic_name = $this->input->post('generic_name');
                $insert_data = array(
                    'medicine_name' => $medicine_name,
                    'generic_name' => $generic_name
                );
                $this->Common_model->insert_data('medicine_name', $insert_data);
                redirect('Show_form/medicine_name/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function test_name() {
        if ($this->session->userdata('ses_user_type') == "admin" || $this->session->userdata('ses_user_type') == "staff") {
            $this->form_validation->set_rules('test_category', 'Test Category', 'trim|required');
            $this->form_validation->set_rules('test_name', 'Test Name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/create_test_name/empty', 'refresh');
            } else {
                $medicine_name = $this->input->post('test_category');
                $generic_name = $this->input->post('test_name');
                $insert_data = array(
                    'test_category' => $medicine_name,
                    'test_name' => $generic_name
                );
                $this->Common_model->insert_data('test_name', $insert_data);
                redirect('Show_form/create_test_name/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

//    public function test_category() {
//        if ($this->session->userdata('ses_user_type') == "admin") {
//            $this->form_validation->set_rules('test_category', 'Test Category', 'trim|required');
//
//            if ($this->form_validation->run() == FALSE) {
//                redirect('Show_form/test_category/empty', 'refresh');
//            } else {
//                $test_category = $this->input->post('test_category');
//
//                $insert_data = array(
//                    'test_category' => $test_category
//                );
//                $this->Common_model->insert_data('test_category', $insert_data);
//                redirect('Show_form/create_test_category/created', 'refresh');
//            }
//        } else {
//            $data['wrong_msg'] = "";
//            $this->load->view('website/login_check', $data);
//        }
//    }

    public function test_price() {
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

                $insert_data = array(
                    'test_id' => $test_id,
                    'test_name' => $test_name,
                    'price' => $price);
                $this->Common_model->insert_data('test_price', $insert_data);
                redirect('Show_form/test_price/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function product_name() {
        if ($this->session->userdata('ses_user_type') == "admin" || $this->session->userdata('ses_user_type') == "staff") {
            $this->form_validation->set_rules('product_name', 'Product Name', 'trim|required');
            $this->form_validation->set_rules('product_category', 'Product Category', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/medicine_name/empty', 'refresh');
            } else {
                $product_name = $this->input->post('product_name');
                $product_category = $this->input->post('product_category');
                $insert_data = array(
                    'product_name' => $product_name,
                    'product_category' => $product_category
                );
                $this->Common_model->insert_data('product_name', $insert_data);
                redirect('Show_form/product_name/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function types_of_product() {
        if ($this->session->userdata('ses_user_type') == "admin" || $this->session->userdata('ses_user_type') == "staff") {
            $this->form_validation->set_rules('types_of_product', 'Types of Product', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/types_of_product/empty', 'refresh');
            } else {
                $types_of_product = $this->input->post('types_of_product');
                $insert_data = array(
                    'types_of_product' => $types_of_product
                );
                $this->Common_model->insert_data('types_of_product', $insert_data);
                redirect('Show_form/types_of_product/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function medicine_presentation() {
        if ($this->session->userdata('ses_user_type') == "admin" || $this->session->userdata('ses_user_type') == "staff") {
            $this->form_validation->set_rules('medicine_presentation', 'Medicine Presentation', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/medicine_presentation/empty', 'refresh');
            } else {
                $medicine_presentation = $this->input->post('medicine_presentation');
                $insert_data = array(
                    'medicine_presentation' => $medicine_presentation
                );
                $this->Common_model->insert_data('medicine_presentation', $insert_data);
                redirect('Show_form/medicine_presentation/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function generic_name() {
        if ($this->session->userdata('ses_user_type') == "admin" || $this->session->userdata('ses_user_type') == "staff") {
            $this->form_validation->set_rules('generic_name', 'Generic Name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/generic_name/empty', 'refresh');
            } else {
                $generic_name = $this->input->post('generic_name');
                $insert_data = array(
                    'generic_name' => $generic_name
                );
                $this->Common_model->insert_data('generic_name', $insert_data);
                redirect('Show_form/generic_name/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function manufacture_company() {
        if ($this->session->userdata('ses_user_type') == "admin" || $this->session->userdata('ses_user_type') == "staff") {
            $this->form_validation->set_rules('manufacture_company', 'Manufacture Company', 'trim|required');
            $this->form_validation->set_rules('mobile_no', 'Mobile No', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('previous_due', 'Previous Due', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/manufacture_company/empty', 'refresh');
            } else {
                $manufacture_company = $this->input->post('manufacture_company');
                $mobile_no = $this->input->post('mobile_no');
                $address = $this->input->post('address');
                $previous_due = $this->input->post('previous_due');
                $insert_data = array(
                    'manufacture_company' => $manufacture_company,
                    'mobile_no' => $mobile_no,
                    'address' => $address,
                    'previous_due' => $previous_due
                );
                $this->Common_model->insert_data('manufacture_company', $insert_data);
                redirect('Show_form/manufacture_company/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_salary_info() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $this->load->model('Common_model');

            $employee = $this->input->post('employee');
            $designation = $this->input->post('designation');
            $bank_name = $this->input->post('bank_name');
            $account_no = $this->input->post('account_no');
            $salary_scale = $this->input->post('salary_scale');
            $insert_data = array(
                'employee_name' => $employee,
                'designation' => $designation,
                'bank_name' => $bank_name,
                'account_no' => $account_no,
                'salary_amount' => $salary_scale
            );
            $this->Common_model->insert_data('employee_salary', $insert_data);
            redirect('Show_form/create_salary_info/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function bank_withdraw() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $this->load->model('Common_model');
            $date = $this->input->post('date');
            $bank = explode("#", $this->input->post('bank'));
            $amount = $this->input->post('amount');
            $responsible_person = $this->input->post('responsible_person');
            $insert_data = array(
                'date' => $date,
                'bank_name' => $bank[0],
                'account_no' => $bank[1],
                'amount' => $amount,
                'responsible_person' => $responsible_person
            );
            $this->Common_model->insert_data('bank_withdraw', $insert_data);
            redirect('Show_form/bank_withdraw/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function bank_deposit() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $this->load->model('Common_model');
            $date = $this->input->post('date');
            $bank = explode("#", $this->input->post('bank'));
            $amount = $this->input->post('amount');
            $responsible_person = $this->input->post('responsible_person');
            $insert_data = array(
                'date' => $date,
                'bank_name' => $bank[0],
                'account_no' => $bank[1],
                'amount' => $amount,
                'responsible_person' => $responsible_person
            );
            $this->Common_model->insert_data('bank_deposit', $insert_data);
            redirect('Show_form/bank_deposit/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_bank_name() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $this->load->model('Common_model');
            $bank_name = $this->input->post('bank_name');
            $account_no = $this->input->post('account_no');
            $insert_data = array(
                'bank_name' => $bank_name,
                'account_no' => $account_no
            );
            $this->Common_model->insert_data('create_bank_name', $insert_data);
            redirect('Show_form/create_bank_name/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_salary_sheet() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $this->load->model('Common_model');

            $employee_id = $this->input->post('employee_id');
            $result = $this->Common_model->one_column_one_info('name', 'record_id', $employee_id, 'staff');
            foreach ($result as $info) {
                $employee_name = $info->name;
            }
            $month = $this->input->post('month');
            $month_list = $this->input->post('month_list');
            $designation = $this->input->post('designation');
            $account_no = $this->input->post('account_no');
            $salary_scale = $this->input->post('salary_scale');
            $insert_data = array(
                'date' => $month,
                'employee_id' => $employee_id,
                'employee_name' => $employee_name,
                'month' => $month_list,
                'designation' => $designation,
                'account_no' => $account_no,
                'salary_scale' => $salary_scale
            );
            $this->Common_model->insert_data('create_salary_sheet', $insert_data);
            redirect('Show_form/create_salary_sheet/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

//    public function appointment() {
//        $user_type = $this->session->ses_user_type;
//        if ($user_type == "admin" || $user_type == "staff") {
//            $this->load->model('Common_model');
//            $patient_name = $this->input->post('name');
//            $mobile = $this->input->post('mobile');
//            $address = $this->input->post('address');
//            $age = $this->input->post('age');
//            $doctor_name = $this->input->post('doctor_name');
//            $doctor_fee = $this->input->post('doctor_fee');
//            $date = $this->input->post('date');
//            $appointment_time = $this->input->post('appointment_time');
//            $insert_data = array(
//                'patient_name' => $patient_name,
//                'mobile' => $mobile,
//                'address' => $address,
//                'age' => $age,
//                'doctor_name' => $doctor_name,
//                'doctor_fee' => $doctor_fee,
//                'date' => $date,
//                'appointment_time' => $appointment_time,
//                'status' => 0
//            );
//            $this->Common_model->insert_data('appointment_info', $insert_data);
//            redirect('Show_form/appointment/created', 'refresh');
//        } else {
//            $data['wrong_msg'] = "";
//            $this->load->view('website/login_check', $data);
//        }
//    }
    //New appointment
    public function appointment() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $this->load->model('Common_model');
            $patient_name = $this->input->post('name');
            $mobile = $this->input->post('mobile');
            $address = $this->input->post('address');
            $age = $this->input->post('age');
            $doctor = explode("###", $this->input->post('doctor_name'));
            $doctor_name = $doctor[0];
            $designation = $doctor[1];
            $doctor_fee = $this->input->post('doctor_fee');
            $date = $this->input->post('date');
            $appointment_time = $this->input->post('appointment_time');
            $insert_data = array(
                'patient_name' => $patient_name,
                'mobile' => $mobile,
                'address' => $address,
                'age' => $age,
                'doctor_name' => $doctor_name,
                'doctor_fee' => $doctor_fee,
                'date' => $date,
                'appointment_time' => $appointment_time,
                'status' => 0
            );
            $this->Common_model->insert_data('appointment_info', $insert_data);
            $insert_data = array(
                'name' => $patient_name,
                'mobile' => $mobile,
                'address' => $address,
                'age' => $age
            );
            $this->Common_model->insert_data('patient', $insert_data);


            $data["name"] = $patient_name;
            $data["age"] = $age;
            $data["doctor"] = $doctor_name;
            $data["designation"] = $designation;
            $data["date"] = $date;
            $this->load->view('admin/header');
            $this->load->view("admin/doctor_appointment_pad", $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    //08-07-2018

    public function department() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->form_validation->set_rules('dept', 'Department', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/department/empty', 'refresh');
            } else {
                $department = $this->input->post('dept');
                $insert_data = array(
                    'department' => $department
                );
                $this->Common_model->insert_data('departments', $insert_data);
                redirect('Show_form/department/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function schedule() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->form_validation->set_rules('staff_type', '', 'trim|required');
            $this->form_validation->set_rules('doctor_name', 'Doctor Name', 'trim|required');
            $this->form_validation->set_rules('dept', 'Department', 'trim|required');
            $this->form_validation->set_rules('st_time', 'Department', 'trim|required');
            $this->form_validation->set_rules('end_time', 'Department', 'trim|required');
            $this->form_validation->set_rules('pp_time', 'Department', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/doc_schedule/empty', 'refresh');
            } else {
                $staff_type = $this->input->post('staff_type');
                $date = $this->input->post('date');
                $doctor_name = $this->input->post('name');
                $department = $this->input->post('dept');
                $start_time = $this->input->post('st_time');
                $end_time = $this->input->post('end_time');
                $per_patient_time = $this->input->post('pp_time');
                $insert_data = array(
                    'date' => $date,
                    'staff_type' => $staff_type,
                    'doctor_name' => $doctor_name,
                    'department' => $department,
                    'start_time' => $start_time,
                    'end_time' => $end_time,
                    'per_patient_time' => $per_patient_time,
                    'status' => 1
                );
                $this->Common_model->insert_data('doctor_schedule', $insert_data);
                redirect('Show_form/doc_schedule/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function birth_report() {
        if ($this->session->userdata('ses_user_type') == "admin") {
//            $this->form_validation->set_rules('patient', '', 'trim|required');
//            $this->form_validation->set_rules('gender', '', 'trim|required');
//            $this->form_validation->set_rules('doctor', 'Doctor ', 'trim|required');
//            $this->form_validation->set_rules('title', '', 'trim|required');
//            $this->form_validation->set_rules('description', '', 'trim|required');
//            if ($this->form_validation->run() == FALSE) {
//                redirect('Show_form/doc_schedule/empty', 'refresh');
//            } else {
            $date = $this->input->post('date');
            $patient_id = $this->input->post('patient');
            $patient_name = $this->input->post('patient_name');
            $child_name = $this->input->post('child_name');
            $gender = $this->input->post('gender');
            $doctor_id = $this->input->post('doctor');
            $doctor_name = $this->input->post('doctor_name');
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $insert_data = array(
                'date' => $date,
                'patient_id' => $patient_id,
                'patient_name' => $patient_name,
                'child_name' => $child_name,
                'gender' => $gender,
                'doctor_name' => $doctor_name,
                'doctor_id' => $doctor_id,
                'title' => $title,
                'description' => $description,
                'status' => 1
            );
            $this->Common_model->insert_data('birth_report', $insert_data);
            redirect('Show_form/birth_report/created', 'refresh');
//            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function death_report() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->form_validation->set_rules('patient', '', 'trim|required');
            $this->form_validation->set_rules('doctor', 'Doctor ', 'trim|required');
            $this->form_validation->set_rules('title', '', 'trim|required');
            $this->form_validation->set_rules('description', '', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/doc_schedule/empty', 'refresh');
            } else {
                $date = $this->input->post('date');
                $patient_id = $this->input->post('patient');
                $patient_name = $this->input->post('patient_name');
                $doctor_id = $this->input->post('doctor');
                $doctor_name = $this->input->post('doctor_name');
                $gender = $this->input->post('gender');
                $title = $this->input->post('title');
                $description = $this->input->post('description');
                $insert_data = array(
                    'date' => $date,
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'gender' => $gender,
                    'doctor_name' => $doctor_name,
                    'doctor_id' => $doctor_id,
                    'title' => $title,
                    'description' => $description,
                    'status' => 1
                );
                $this->Common_model->insert_data('death_report', $insert_data);
                redirect('Show_form/death_report/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function operation_report() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->form_validation->set_rules('patient', '', 'trim|required');
            $this->form_validation->set_rules('doctor', 'Doctor ', 'trim|required');
            $this->form_validation->set_rules('gender', 'Doctor ', 'trim|required');
            $this->form_validation->set_rules('title', '', 'trim|required');
            $this->form_validation->set_rules('description', '', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/operation_report/empty', 'refresh');
            } else {
                $date = $this->input->post('date');
                $patient_id = $this->input->post('patient');
                $patient_name = $this->input->post('patient_name');
                $gender = $this->input->post('gender');
                $doctor_id = $this->input->post('doctor');
                $doctor_name = $this->input->post('doctor_name');
                $title = $this->input->post('title');
                $description = $this->input->post('description');
                $insert_data = array(
                    'date' => $date,
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'gender' => $gender,
                    'doctor_name' => $doctor_name,
                    'doctor_id' => $doctor_id,
                    'title' => $title,
                    'description' => $description,
                    'status' => 1
                );
                $this->Common_model->insert_data('operation_report', $insert_data);
                redirect('Show_form/operation_report/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function investigation_report() {
        if ($this->session->userdata('ses_user_type') == "admin") {
//            $this->form_validation->set_rules('patient', '', 'trim|required');
//            $this->form_validation->set_rules('gender', 'Doctor ', 'trim|required');
//            $this->form_validation->set_rules('doctor', 'Doctor ', 'trim|required');
//            $this->form_validation->set_rules('title', '', 'trim|required');
//            $this->form_validation->set_rules('description', '', 'trim|required');
//            if ($this->form_validation->run() == FALSE) {
//                redirect('Show_form/investigation_report/empty', 'refresh');
//            } else {
            $result = $this->Common_model->find_last_id('record_id', 'investigation_report');
            if (!$result) {
                $max_id = 1;
            } else {
                foreach ($result as $row) {
                    $max_id = ($row->record_id) + 1;
                }
            }
            $img_name = $max_id . ".jpg";

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
            $gender = $this->input->post('gender');
            $doctor_id = $this->input->post('doctor');
            $doctor_name = $this->input->post('doctor_name');
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $insert_data = array(
                'date' => $date,
                'patient_id' => $patient_id,
                'patient_name' => $patient_name,
                'gender' => $gender,
                'doctor_name' => $doctor_name,
                'doctor_id' => $doctor_id,
                'title' => $title,
                'description' => $description,
                'image' => $img_name,
                'status' => 1
            );
            $this->Common_model->insert_data('investigation_report', $insert_data);
            redirect('Show_form/investigation_report/created', 'refresh');
//            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function bed_type() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->form_validation->set_rules('bed_cabin', 'Bed/Cabin', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/bed_type/empty', 'refresh');
            } else {
                $bed_cabin = $this->input->post('bed_cabin');
                $room_no = $this->input->post('room_no');
                $no_bed = $this->input->post('no_bed');
                $capacity = $this->input->post('capacity');
                $charge = $this->input->post('charge');
                $insert_data = array(
                    'room_no' => $room_no,
                    'bed_type' => $bed_cabin,
                    'bed_qty' => $no_bed,
                    'capacity' => $capacity,
                    'charge' => $charge
                );
                $this->Common_model->insert_data('bed_type', $insert_data);
                redirect('Show_form/bed_type/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function add_bed() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->form_validation->set_rules('bed_type', '', 'trim|required');
            $this->form_validation->set_rules('bed_qty', 'Doctor ', 'trim|required');
            $this->form_validation->set_rules('price', '', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/bed_type/empty', 'refresh');
            } else {
                $date = $this->input->post('date');
                $bed_type = $this->input->post('bed_type');
                $bed_qty = $this->input->post('bed_qty');
                $price = $this->input->post('price');
                $total = $this->input->post('total');
                $insert_data = array(
                    'date' => $date,
                    'bed_type' => $bed_type,
                    'bed_qty' => $bed_qty,
                    'purchase_price' => $price,
                    'total' => $total
                );
                $this->Common_model->insert_data('add_bed', $insert_data);

                $result = $this->Common_model->get_allinfo_byid('bed_type', 'bed_type', $bed_type);
                foreach ($result as $res) {
                    $total_bed_qty = $res->bed_qty;
                }
                $total_bed_qty += $bed_qty;
                $update_data = array(
                    'bed_qty' => $total_bed_qty
                );
                $this->Common_model->update_data_onerow('bed_type', $update_data, 'bed_type', $bed_type);

                for ($i = 0; $i < $bed_qty; $i++) {
                    $checking_array['bed_type'] = $bed_type;
                    $result = $this->Common_model->find_last_id_where('bed_no', $checking_array, 'bed_no');
                    if (!$result) {
                        $bed_no = 1;
                    } else {
                        foreach ($result as $row) {
                            $bed_no = ($row->bed_no) + 1;
                        }
                    }
                    $insert_data = array(
                        'bed_no' => $bed_no,
                        'bed_type' => $bed_type
                    );
                    $this->Common_model->insert_data('bed_no', $insert_data);
                }

                redirect('Show_form/add_bed/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function assign_bed() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->form_validation->set_rules('date', '', 'trim|required');
            $this->form_validation->set_rules('patient_id', ' ', 'trim|required');
            $this->form_validation->set_rules('bed_no', ' ', 'trim|required');
            $this->form_validation->set_rules('room_no', ' ', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/assign_bed/empty', 'refresh');
            } else {
                $assign_date = $this->input->post('date');
                $patient_id = $this->input->post('patient_id');
                $bed_no = $this->input->post('bed_no');
                $room_no = $this->input->post('room_no');
                $guardian_name = $this->input->post('guardian_name');
                $relation = $this->input->post('relation');
                $contact = $this->input->post('contact');
                $address = $this->input->post('address');

                $result = $this->Common_model->get_allinfo_byid('patient', 'record_id', $patient_id);
                foreach ($result as $res) {
                    $patient_name = $res->name;
                    $age = $res->age;
                    $height = $res->height;
                    $weight = $res->weight;
                }

                $result = $this->Common_model->get_allinfo_byid('bed_no', 'bed_no', $bed_no);
                foreach ($result as $res) {
                    $bed_type = $res->bed_type;
                }

                $result = $this->Common_model->get_allinfo_byid('bed_type', 'bed_type', $bed_type);
                foreach ($result as $res) {
                    $charge = $res->charge;
                }

                $result = $this->Common_model->find_last_id('invoice_no', 'patient_admission');
                if (empty($result)) {
                    $invoice = 1;
                } else {
                    foreach ($result as $info) {
                        $invoice = $info->invoice_no;
                    }
                    $invoice += 1;
                }

                $insert_data = array(
                    "invoice_no" => $invoice,
                    'assign_date' => $assign_date,
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'bed_no' => $bed_no,
                    'bed_type' => $bed_type,
                    'room_no' => $room_no,
                    'charge' => $charge,
                    'amount' => 0,
                    'discharge_date' => '',
                    'guardian_name' => $guardian_name,
                    'relation' => $relation,
                    'contact' => $contact,
                    'address' => $address,
                    'status' => 0
                );
                $this->Common_model->insert_data('assign_bed', $insert_data);


                $insert_data = array(
                    "invoice_no" => $invoice,
                    "patient_id" => $patient_id,
                    "patient_name" => $patient_name,
                    "age" => $age,
                    "height" => $height,
                    "weight" => $weight,
                    "admission_date" => $assign_date,
                    "discharge_date" => '',
                    "doctor_name" => '',
                    "service_name" => 'Bed Charge',
                    "package_name" => '',
                    "guardian_name" => $guardian_name,
                    "relation" => $relation,
                    "contact" => $contact,
                    "address" => $address,
                    'total' => 0,
                    'due_amount' => 0,
                    "status" => 0
                );
                $this->Common_model->insert_data('patient_admission', $insert_data);
                redirect('Show_form/assign_bed/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function case_patient() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->form_validation->set_rules('date', '', 'trim|required');
            $this->form_validation->set_rules('patient_id', 'Doctor ', 'trim|required');
            $this->form_validation->set_rules('name', '', 'trim|required');
            $this->form_validation->set_rules('mobile', '', 'trim|required');
            $this->form_validation->set_rules('case_manager', '', 'trim|required');
            $this->form_validation->set_rules('ref_doctor', '', 'trim|required');
            $this->form_validation->set_rules('hospital', '', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/case_patient/empty', 'refresh');
            } else {

                $date = $this->input->post('date');
                $patient_id = $this->input->post('patient_id');
                $patient_name = $this->input->post('name');
                $mobile_no = $this->input->post('mobile');
                $case_manager_id = $this->input->post('case_manager');
                $ref_doctor = $this->input->post('ref_doctor');
                $hospital = $this->input->post('hospital');

                $result = $this->Common_model->get_allinfo_byid('staff', 'record_id', $case_manager_id);
                foreach ($result as $res) {
                    $case_manager = $res->name;
                }
                $insert_data = array(
                    'date' => $date,
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'mobile_no' => $mobile_no,
                    'case_manager_id' => $case_manager_id,
                    'case_manager' => $case_manager,
                    'ref_doctor' => $ref_doctor,
                    'hospital' => $hospital,
                );
                $this->Common_model->insert_data('case_patient', $insert_data);
                redirect('Show_form/case_patient/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function enquiry() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->form_validation->set_rules('date', '', 'trim|required');
            $this->form_validation->set_rules('title', '', 'trim|required');
            $this->form_validation->set_rules('name', '', 'trim|required');
            $this->form_validation->set_rules('mobile', '', 'trim|required');
            $this->form_validation->set_rules('email', '', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/enquiry/empty', 'refresh');
            } else {

                $date = $this->input->post('date');
                $title = $this->input->post('title');
                $name = $this->input->post('name');
                $mobile_no = $this->input->post('mobile');
                $email = $this->input->post('email');

                $insert_data = array(
                    'date' => $date,
                    'title' => $title,
                    'name' => $name,
                    'mobile' => $mobile_no,
                    'email' => $email,
                );
                $this->Common_model->insert_data('enquiry', $insert_data);
                redirect('Show_form/enquiry/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_test_type() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $test_name = $this->input->post('test_name');
            $description = $this->input->post('description');
            $rate = $this->input->post('rate');
            $insert_data = array(
                'test_name' => $test_name,
                'description' => $description,
                'rate' => $rate
            );
            $this->Common_model->insert_data('test_type', $insert_data);
            redirect('Show_form/test_type/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function room_info() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $room_no = $this->input->post('room_no');
            $floor_no = $this->input->post('floor_no');
            $department = $this->input->post('dept');
            $room_type = $this->input->post('room_type');
            $room_condition = $this->input->post('room_con');
            $insert_data = array(
                'room_no' => $room_no,
                'floor_no' => $floor_no,
                'department' => $department,
                'room_type' => $room_type,
                'room_condition' => $room_condition
            );
            $this->Common_model->insert_data('room_info', $insert_data);
            redirect('Show_form/room_info/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

}
