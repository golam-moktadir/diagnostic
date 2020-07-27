<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Get_ajax_value extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Common_model');
    }

    public function get_all_test_report() {
        $test_id = $this->input->post('test_id');
        $result = $this->Common_model->get_allinfo_byid('test_result', 'unique_id', $test_id);

        $all_sales = array();
        $arr_count = 0;
        foreach ($result as $single_sale) {
            $arr_count++;
            $date = $single_sale->date;
            $patient_id = $single_sale->patient_id;
            $patient_name = $single_sale->patient_name;
            $doctor_name = $single_sale->mobile;
            $age = $single_sale->age;
            $mobile = $single_sale->mobile;
            $test_category = $single_sale->test_category;
            $test_name = $single_sale->test_name;
            $test_result = $single_sale->test_result;
            $all_sales[$arr_count] = array("3" => $test_category, "4" => $test_name, "5" => $test_result);
        }

        $data['date'] = $date;
        $data['patient_id'] = $patient_id;
        $data['referenced_by'] = $doctor_name;
        $data['patient_name'] = $patient_name;
        $data['report_category'] = $test_category;
        $data['age'] = $age;
        $data['mobile'] = $mobile;
        $data['unique_id'] = $test_id;
        $data['all_sales'] = $all_sales;
        $this->load->view('admin/report_all_test', $data);
    }

    public function get_create_bill_invoice() {
        $patient_id = $this->input->post('patient_id');
        $patient_name = $this->input->post('patient_name');
        $discount = $this->input->post('discount');
        $pay = $this->input->post('pay');
        $due = $this->input->post('due');

        $insert_data = array(
            'date' => date("Y-m-d"),
            'particular' => "Final Bill",
            'patient_id' => $patient_id,
            'patient_name' => $patient_name,
            'discount' => $discount,
            'amount' => 0,
            'paid' => $pay,
            'due' => $due
        );
        $this->Common_model->insert_data('create_bill', $insert_data);

        $data['patient_id'] = $patient_id;
        $data['patient_name'] = $patient_name;
        $data['result'] = $this->Common_model->get_allinfo_byid('create_bill', 'patient_id', $patient_id);
        $this->load->view('admin/get_create_bill_invoice', $data);
    }

    public function get_bil_again() {
        $patient_id = $this->input->post('patient_id');
        $patient_name = $this->input->post('patient_name');
        $data['patient_id'] = $patient_id;
        $data['patient_name'] = $patient_name;
        $data['result'] = $this->Common_model->get_allinfo_byid('create_bill', 'patient_id', $patient_id);

        $this->load->view('admin/get_create_bill_invoice', $data);
    }

    public function get_test_request() {
        $date_from = $this->input->post('date_from');
        $date_to = $this->input->post('date_to');

        $checking_array = array();
        $data['date_range'] = "";
        $data['patient_id'] = "";
        $data['patient_name'] = "";

        if (!empty($date_from) && !empty($date_to)) {
            $checking_array['date>='] = $date_from;
            $checking_array['date<='] = $date_to;
            $data['date_range'] = "(" . date('d F', strtotime($date_from)) . " - " . date('d F', strtotime($date_to)) . ")";
        }

        $patient_id = $this->input->post('patient_id');
        $patient_name = $this->input->post('patient_name');
//        $data['patient_id'] = $patient_id;
//        $data['patient_name'] = $patient_name;
        if (!empty($patient_id) && !empty($patient_name)) {
            $checking_array['patient_id'] = $patient_id;
            $checking_array['patient_name'] = $patient_name;
            $data['patient_id'] = $patient_id;
            $data['patient_name'] = $patient_name;
        }

//        $data['result'] = $this->Common_model->get_allinfo_byid('sales_test', 'patient_id', $patient_id);
        $data["result"] = $this->Common_model->get_all_info_by_array("sales_test", $checking_array);

        $this->load->view('admin/get_test_request_invoice', $data);
    }

    public function get_all_payment_due() {
        $patient_id = $this->input->post('patient_id');
        $data['result'] = $this->Common_model->get_allinfo_byid('create_bill', 'patient_id', $patient_id);

        $this->load->view('admin/get_all_payment_due', $data);
    }

    public function get_service_due() {
        $patient_id = $this->input->post('patient_id');
        $result = $this->Common_model->get_allinfo_byid('sales_service', 'patient_id', $patient_id);

        $total_amount = 0;
        $total_paid = 0;
        foreach ($result as $info) {
            $total_amount += $info->sub_total;
            $total_paid += $info->pay;
        }

        $result = $this->Common_model->get_allinfo_byid('pay_service_due', 'patient_id', $patient_id);
        foreach ($result as $info) {
            $total_paid += $info->pay;
        }
        echo ($total_amount - $total_paid);
    }

    public function get_test_due() {
        $patient_id = $this->input->post('patient_id');

        $result = $this->Common_model->get_allinfo_byid('create_bill', 'patient_id', $patient_id);

        $total_amount = 0;
        $total_paid = 0;
        $total_discount = 0;
        foreach ($result as $info) {
            $total_amount += $info->amount;
            $total_discount += $info->discount;
            $total_paid += $info->paid;
        }
        echo (($total_amount - $total_discount) - $total_paid);
    }

    public function get_total_day() {
        $date_from = date_create($this->input->post('date_from'));
        $date_to = date_create($this->input->post('date_to'));
        $diff = date_diff($date_from, $date_to);
        echo $diff->format("%a");
    }

    public function get_room_price() {
        $room_no = $this->input->post('room_no');
        $result = $this->Common_model->get_allinfo_byid('bed_type', 'room_no', $room_no);
        $price = 0;
        foreach ($result as $info) {
            $price = $info->charge;
        }
        echo $price;
    }

    public function edit_sales_test_confirm() {
        $all_purchase = $this->input->post('all_purchase');
        $amount = $this->input->post('amount');
        $discount = $this->input->post('discount');
        $sub_total = $this->input->post('sub_total');
        $pay = $this->input->post('pay');
        $due = $this->input->post('due');
        $advance = $this->input->post('advance');
        $invoice_no = $this->input->post('old_inv');

        $this->Common_model->delete_info('invoice_no', $invoice_no, 'sales_test');
        $this->Common_model->delete_info('invoice_no', $invoice_no, 'create_bill');
        $test_collection = "";
        foreach ($all_purchase as $single_purchase) {
            $date = $single_purchase[0];
            $age = $single_purchase[4];
            $mobile = $single_purchase[5];
            $patient_id = $single_purchase[1];
            $patient_name = $single_purchase[2];
            $doctor = $single_purchase[3];
            $test_category = $single_purchase[6];
            $test_name = $single_purchase[7];
            $test_price = $single_purchase[8];
            $test_collection .= "$test_name ($test_price BDT),</br> ";
            $insert_data = array(
                'date' => $date,
                'invoice_no ' => $invoice_no,
                'patient_id' => $patient_id,
                'patient_name' => $patient_name,
                'doctor_name' => $doctor,
                'age' => $age,
                'mobile' => $mobile,
                'test_name' => $test_name,
                'test_category' => $test_category,
                'test_price' => $test_price,
                'amount' => $amount,
                'discount' => $discount,
                'sub_total' => $sub_total,
                'pay' => $pay,
                'due' => $due,
                'advance' => $advance
            );
            $this->Common_model->insert_data('sales_test', $insert_data);
        }
        $data['date'] = $date;
        $data['patient_id'] = $patient_id;
        $data['patient_name'] = $patient_name;
        $data['doctor_name'] = $doctor;
        $data['age'] = $age;
        $data['mobile'] = $mobile;
        $data['amount'] = $amount;
        $data['discount'] = $discount;
        $data['sub_total'] = $sub_total;
        $data['pay'] = $pay;
        $data['due'] = $due;
        $data['advance'] = $advance;
        $data['invoice_no'] = $invoice_no;
//        $data['test_collection'] = $test_collection;
//        Test name and price
        $result = $this->Common_model->get_allinfo_byid('sales_test', 'invoice_no', $invoice_no);
        $data['one_sales'] = $result;
//        Test name and price
        $insert_data = array(
            'date' => $date,
            'invoice_no' => $invoice_no,
            'particular' => "Sales Test",
            'patient_id' => $patient_id,
            'patient_name' => $patient_name,
            'discount' => $discount,
            'amount' => $amount,
            'paid' => $pay,
            'due' => $due,
            'advance' => $advance
        );
        $this->Common_model->insert_data('create_bill', $insert_data);

        $this->zend->load('Zend/Barcode');
        $image_file = Zend_Barcode::draw('code128', 'image', array('text' => 'INV' . sprintf('%d', $invoice_no)), array());
        imagejpeg($image_file, "./assets/img/barcode/INV$invoice_no.jpg");

        $this->load->view('admin/sales_test_invoice', $data);
    }

    public function sales_test_confirm() {
        $all_purchase = $this->input->post('all_purchase');
        $amount = $this->input->post('amount');
        $discount = $this->input->post('discount');
        $sub_total = $this->input->post('sub_total');
        $pay = $this->input->post('pay');
        $due = $this->input->post('due');
        $advance = $this->input->post('advance');
        $c_status = $this->input->post('c_status');
        $invoice_no = 0;
//Invoice Create Sales
        $result = $this->Common_model->find_last_id('invoice_no', 'sales_test');
        if (!$result) {
            $invoice_no = 1;
        } else {
            foreach ($result as $row) {
                $invoice_no = ($row->invoice_no) + 1;
            }
        }
//Invoice Create Sales END
        $test_collection = "";
        $count_pa = 0;
        foreach ($all_purchase as $single_purchase) {
            $count_pa++;
            $date = $single_purchase[0];
            $age = $single_purchase[4];
            $mobile = $single_purchase[5];

            if ($count_pa == 1) {
                if ($c_status == 1) {
                    $result = $this->Common_model->find_last_id('record_id', 'patient');

                    if (!$result) {
                        $patient_id = 1;
                    } else {
                        foreach ($result as $row) {
                            $patient_id = ($row->record_id) + 1;
                        }
                    }
                    $patient_name = $single_purchase[2];
                    $insert_data = array(
                        'record_id' => $patient_id,
                        'name' => $patient_name,
                        'age' => $age,
                        'mobile' => $mobile
                    );
                    $this->Common_model->insert_data('patient', $insert_data);
                } else {
                    $patient_id = $single_purchase[1];
                    $patient_name = $single_purchase[2];
                }
            }
//            $patient_id = $single_purchase[1];
//            $patient_name = $single_purchase[2];
            $doctor = $single_purchase[3];
            $test_category = $single_purchase[6];
            $test_name = $single_purchase[7];
            $test_price = $single_purchase[8];
            $doctor_commission = $single_purchase[9];
            $test_collection .= "$test_name ($test_price BDT),</br> ";
            $insert_data = array(
                'date' => $date,
                'invoice_no ' => $invoice_no,
                'patient_id' => $patient_id,
                'patient_name' => $patient_name,
                'doctor_name' => $doctor,
                'age' => $age,
                'mobile' => $mobile,
                'test_name' => $test_name,
                'test_category' => $test_category,
                'test_price' => $test_price,
                'amount' => $amount,
                'discount' => $discount,
                'sub_total' => $sub_total,
                'pay' => $pay,
                'due' => $due,
                'advance' => $advance,
                'doctor_commission' => $doctor_commission
            );
            $this->Common_model->insert_data('sales_test', $insert_data);
        }
        $data['date'] = $date;
        $data['patient_id'] = $patient_id;
        $data['patient_name'] = $patient_name;
        $data['doctor_name'] = $doctor;
        $data['age'] = $age;
        $data['mobile'] = $mobile;
        $data['amount'] = $amount;
        $data['discount'] = $discount;
        $data['sub_total'] = $sub_total;
        $data['pay'] = $pay;
        $data['due'] = $due;
        $data['advance'] = $advance;
        $data['invoice_no'] = $invoice_no;
//        $data['test_collection'] = $test_collection;
//        Test name and price
        $result = $this->Common_model->get_allinfo_byid('sales_test', 'invoice_no', $invoice_no);
        $data['one_sales'] = $result;
//        Test name and price
        $insert_data = array(
            'date' => $date,
            'invoice_no' => $invoice_no,
            'particular' => "Sales Test",
            'patient_id' => $patient_id,
            'patient_name' => $patient_name,
            'discount' => $discount,
            'amount' => $amount,
            'paid' => $pay,
            'due' => $due,
            'advance' => $advance
        );
        $this->Common_model->insert_data('create_bill', $insert_data);

        $this->zend->load('Zend/Barcode');
        $image_file = Zend_Barcode::draw('code128', 'image', array('text' => 'INV' . sprintf('%d', $invoice_no)), array());
        imagejpeg($image_file, "./assets/img/barcode/INV$invoice_no.jpg");

        $this->load->view('admin/sales_test_invoice', $data);
    }

    public function sales_test_report() {
        $invoice_no = $this->input->post('id');
        $result = $this->Common_model->get_allinfo_byid('sales_test', 'invoice_no', $invoice_no);
        $data['date'] = $result[0]->date;
        $data['patient_id'] = $result[0]->patient_id;
        $data['patient_name'] = $result[0]->patient_name;
        $data['doctor_name'] = $result[0]->doctor_name;
        $data['age'] = $result[0]->age;
        $data['mobile'] = $result[0]->mobile;
        $data['amount'] = $result[0]->amount;
        $data['discount'] = $result[0]->discount;
        $data['sub_total'] = $result[0]->sub_total;
        $data['pay'] = $result[0]->pay;
        $data['due'] = $result[0]->due;
        $data['advance'] = $result[0]->advance;
        $data['invoice_no'] = $result[0]->invoice_no;
        $data['one_sales'] = $result;

        $this->load->view('admin/sales_test_invoice', $data);
    }

    public function appointment_confirm() {
        $patient_id = $this->input->post('patient_id');
        $patient_name = $this->input->post('patient_name');
        $mobile = $this->input->post('mobile');
        $address = $this->input->post('address');
        $age = $this->input->post('age');
        $doctor_designation = $this->input->post('doctor_designation');
        $doctor_name = $this->input->post('doctor_name');
        $doctor_fee = $this->input->post('doctor_fee');
        $date = $this->input->post('date');
        $time = $this->input->post('appointment_time');
        $c_status = $this->input->post('c_status');

        if ($c_status == 1) {
            $result = $this->Common_model->find_last_id('record_id', 'patient');

            if (!$result) {
                $patient_id = 1;
            } else {
                foreach ($result as $row) {
                    $patient_id = ($row->record_id) + 1;
                }
            }
            $insert_data = array(
                'record_id' => $patient_id,
                'name' => $patient_name,
                'age' => $age,
                'mobile' => $mobile
            );
            $this->Common_model->insert_data('patient', $insert_data);
        }

        $insert_data = array(
            'patient_id' => $patient_id,
            'patient_name' => $patient_name,
            'mobile' => $mobile,
            'address' => $address,
            'age' => $age,
            'doctor_name' => $doctor_name,
            'designation' => $doctor_designation,
            'doctor_fee' => $doctor_fee,
            'date' => $date,
            'appointment_time' => $time,
            'status' => 0
        );
        $this->Common_model->insert_data('appointment_info', $insert_data);

//        $data["name"] = $patient_name;
//        $data["age"] = $age;
//        $data["doctor"] = $doctor_name;
//        $data["designation"] = $doctor_designation;
//        $data["date"] = $date;
//        $this->load->view("admin/doctor_appointment_pad", $data);
    }

    public function consultancy_confirm_edit() {
        $consultancy_id = $this->input->post('record_id');
        $patient_id = $this->input->post('patient_id');
        $patient_name = $this->input->post('patient_name');
        $mobile = $this->input->post('mobile');
        $address = $this->input->post('address');
        $age = $this->input->post('age');
        $doctor_designation = $this->input->post('doctor_designation');
        $doctor_name = $this->input->post('doctor_name');
        $doctor_fee = $this->input->post('doctor_fee');
        $discount = $this->input->post('discount');
        $sub_total = $this->input->post('sub_total');
        $doctor_commission = $this->input->post('doctor_commission');
        $company_commission = $this->input->post('company_commission');
        $date = $this->input->post('date');
        $time = $this->input->post('appointment_time');

        $update_data = array(
            'patient_id' => $patient_id,
            'patient_name' => $patient_name,
            'mobile' => $mobile,
            'address' => $address,
            'age' => $age,
            'doctor_name' => $doctor_name,
            'designation' => $doctor_designation,
            'doctor_fee' => $doctor_fee,
            'discount' => $discount,
            'sub_total' => $sub_total,
            'doctor_commission' => $doctor_commission,
            'company_commission' => $company_commission,
            'date' => $date,
            'appointment_time' => $time,
            'status' => 0
        );
        $this->Common_model->update_data_onerow('consultancy', $update_data, 'record_id', $consultancy_id);
        echo $consultancy_id;
    }
    
    public function consultancy_confirm() {
        $patient_id = $this->input->post('patient_id');
        $patient_name = $this->input->post('patient_name');
        $mobile = $this->input->post('mobile');
        $address = $this->input->post('address');
        $age = $this->input->post('age');
        $doctor_designation = $this->input->post('doctor_designation');
        $doctor_name = $this->input->post('doctor_name');
        $doctor_fee = $this->input->post('doctor_fee');
        $discount = $this->input->post('discount');
        $sub_total = $this->input->post('sub_total');
        $doctor_commission = $this->input->post('doctor_commission');
        $company_commission = $this->input->post('company_commission');
        $date = $this->input->post('date');
        $time = $this->input->post('appointment_time');
        $c_status = $this->input->post('c_status');

        if ($c_status == 1) {
            $result = $this->Common_model->find_last_id('record_id', 'patient');

            if (!$result) {
                $patient_id = 1;
            } else {
                foreach ($result as $row) {
                    $patient_id = ($row->record_id) + 1;
                }
            }
            $insert_data = array(
                'record_id' => $patient_id,
                'name' => $patient_name,
                'age' => $age,
                'mobile' => $mobile
            );
            $this->Common_model->insert_data('patient', $insert_data);
        }

        $result_id = $this->Common_model->find_last_id('record_id', 'consultancy');

        if (!$result_id) {
            $consultancy_id = 1;
        } else {
            foreach ($result_id as $row) {
                $consultancy_id = ($row->record_id) + 1;
            }
        }
        $insert_data = array(
            'record_id' => $consultancy_id,
            'patient_id' => $patient_id,
            'patient_name' => $patient_name,
            'mobile' => $mobile,
            'address' => $address,
            'age' => $age,
            'doctor_name' => $doctor_name,
            'designation' => $doctor_designation,
            'doctor_fee' => $doctor_fee,
            'discount' => $discount,
            'sub_total' => $sub_total,
            'doctor_commission' => $doctor_commission,
            'company_commission' => $company_commission,
            'date' => $date,
            'appointment_time' => $time,
            'status' => 0
        );
        $this->Common_model->insert_data('consultancy', $insert_data);

        $this->zend->load('Zend/Barcode');
        $image_file = Zend_Barcode::draw('code128', 'image', array('text' => 'CONS' . sprintf('%d', $consultancy_id)), array());
        imagejpeg($image_file, "./assets/img/barcode/CONS$consultancy_id.jpg");

        echo $consultancy_id;


//        $data["name"] = $patient_name;
//        $data["age"] = $age;
//        $data["doctor"] = $doctor_name;
//        $data["designation"] = $doctor_designation;
//        $data["date"] = $date;
//        $this->load->view("admin/doctor_appointment_pad", $data);
    }

    public function sales_service_confirm() {
        $all_purchase = $this->input->post('all_purchase');
        $amount = $this->input->post('amount');
        $discount = $this->input->post('discount');
        $sub_total = $this->input->post('sub_total');
        $pay = $this->input->post('pay');
        $due = $this->input->post('due');
        $advance = $this->input->post('advance');
        $test_collection = "";
        foreach ($all_purchase as $single_purchase) {
            $date = $single_purchase[0];
            $patient_id = $single_purchase[1];
            $patient_name = $single_purchase[2];
            $doctor = $single_purchase[3];
            $age = $single_purchase[4];
            $mobile = $single_purchase[5];
            $service = $single_purchase[6];
            $service_price = $single_purchase[7];
            $test_collection .= "$service ($service_price BDT), ";
            $insert_data = array(
                'date' => $date,
                'patient_id' => $patient_id,
                'patient_name' => $patient_name,
                'doctor_name' => $doctor,
                'age' => $age,
                'mobile' => $mobile,
                'service' => $service,
                'service_price' => $service_price,
                'amount' => $amount,
                'discount' => $discount,
                'sub_total' => $sub_total,
                'pay' => $pay,
                'due' => $due,
                'advance' => $advance
            );
            $this->Common_model->insert_data('sales_service', $insert_data);
        }
        $data['date'] = $date;
        $data['patient_id'] = $patient_id;
        $data['patient_name'] = $patient_name;
        $data['doctor_name'] = $doctor;
        $data['age'] = $age;
        $data['mobile'] = $mobile;
        $data['amount'] = $amount;
        $data['discount'] = $discount;
        $data['sub_total'] = $sub_total;
        $data['pay'] = $pay;
        $data['due'] = $due;
        $data['advance'] = $advance;
        $data['test_collection'] = $test_collection;
//        $data['service'] = $service;
//        $data['service_price'] = $service_price;
        $insert_data = array(
            'date' => $date,
            'particular' => "Sales Service",
            'patient_id' => $patient_id,
            'patient_name' => $patient_name,
            'amount' => $amount,
            'paid' => $pay,
            'due' => $due
        );
        $this->Common_model->insert_data('create_bill', $insert_data);
        $this->load->view('admin/sales_service_invoice', $data);
    }

    public function get_test_price() {
        $test_name = $this->input->post('test_category');
        $result = $this->Common_model->get_allinfo_byid('test_price', 'test_name', $test_name);
        $price = 0;
        foreach ($result as $info) {
            $price = $info->price;
        }
        echo $price;
    }

    public function get_patient_age_mobile() {
        $patient_id = $this->input->post('patient_id');
        $result = $this->Common_model->get_allinfo_byid('patient', 'record_id', $patient_id);

        $age = "";
        $mobile = "";
        foreach ($result as $info) {
            $age = $info->age;
            $mobile = $info->mobile;
        }
        $data = array($age, $mobile);
        echo json_encode($data);
    }

    public function get_patient_age_mobile_address() {
        $patient_id = $this->input->post('patient_id');
        $result = $this->Common_model->get_allinfo_byid('patient', 'record_id', $patient_id);

        $age = "";
        $mobile = "";
        $address = "";
        foreach ($result as $info) {
            $age = $info->age;
            $mobile = $info->mobile;
            $address = $info->address;
        }
        $data = array($age, $mobile, $address);
        echo json_encode($data);
    }

    public function get_patient_age_category() {
        $patient_id = $this->input->post('patient_id');
        $date = $this->input->post('date');
        $checking_array = array();
        $checking_array["date"] = $date;
        $checking_array["patient_id"] = $patient_id;
//        $pat_res = $this->Common_model->get_allinfo_byid('patient', 'record_id', $patient_id);
//        foreach ($pat_res as $info) {
//            $age = $info->age;
//        }
        $result = $this->Common_model->get_all_info_by_array('sales_test', $checking_array);
        $option = "<option value=>--Select--</option>";
        $age = "";
// $mobile = "";
//$test_category[] = "";
        foreach ($result as $info) {
            $age = $info->age;
            $doctor_name = $info->doctor_name;
//$mobile = $info->mobile;
// $test_category=$info->test_category;
            $option .= "<option value='$info->test_name###$info->test_category'>$info->test_name [$info->test_category]</option>";
        }
        $data = array($age, $option, $doctor_name);
        echo json_encode($data);
    }

    public function get_doctor_fee() {
        $doctor_name = $this->input->post('doctor_name');
        $result = $this->Common_model->get_allinfo_byid('doctor', 'name', $doctor_name);
        $doc_commission = $this->Common_model->find_doc_commission($doctor_name);
        if (empty($doc_commission)) {
            $doc_commission = 0;
        }
        $frees = 0;
        foreach ($result as $info) {
            $frees = $info->frees;
        }
        $comp_commission = $frees - $doc_commission;
        $data = array($frees, $doc_commission, $comp_commission);
        echo json_encode($data);
    }

    public function get_test_form() {
        $test_category = $this->input->post('test_category');
        $data["test_name"] = $this->input->post('test_name');
        if ($test_category == "Haematology") {
            $this->load->view('admin/Test/haematology', $data);
        } elseif ($test_category == "Biochemistry") {
            $this->load->view('admin/Test/biochemistry', $data);
        } elseif ($test_category == "Immunology") {
            $this->load->view('admin/Test/IMMUNOLOGY', $data);
        } elseif ($test_category == "MT") {
            $this->load->view('admin/Test/MT', $data);
        } elseif ($test_category == "Urine Examination") {
            $this->load->view('admin/Test/Urine_RME', $data);
        } elseif ($test_category == "Stool Examination") {
            $this->load->view('admin/Test/Stool_RME', $data);
        } elseif ($test_category == "Cross Matching") {
            $this->load->view('admin/Test/Cross_matching', $data);
        } elseif ($test_category == "Semen Analysis") {
            $this->load->view('admin/Test/Semen_Analysis_Report', $data);
        } elseif ($test_category == "Skin Scraping Test") {
            $this->load->view('admin/Test/Skin_Scraping_Report', $data);
        } elseif ($test_category == "Serological Test") {
            $this->load->view('admin/Test/Serological_Test_Report', $data);
        }
    }

    public function serial_check() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {

            $product_id = $this->input->post('product_id');
            $result = $this->Common_model->get_allinfo_byid('sell_product', 'product_id', $product_id);
            $all_serial = "";
            foreach ($result as $info) {
                $all_serial .= $info->serial . "###";
            }

            $temp_serial = $this->input->post('serial');
            $serial = preg_replace('/\s+/', '###', $temp_serial);
            $serial = explode('###', $serial);
            $sold_serial = array();
            foreach ($serial as $s) {
                if (preg_match('~\b' . $s . '\b~', $all_serial)) {
                    if ($s != 'N/A') {
                        array_push($sold_serial, $s);
                    }
                }
            }
            $data = array($sold_serial);
            echo json_encode($data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function send_sms($mobile, $sms_body) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://107.20.199.106/restapi/sms/1/text/single",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{ "
            . "\"from\":\"+8804445650406\", "
            . "\"to\":\"" . $mobile . "\", "
            . "\"text\":\"" . $sms_body . "\" }",
            CURLOPT_HTTPHEADER => array(
                "accept: application/json",
                "authorization: Basic bGVvcGFyZDU4OmFiYzI3MTEzMTg5MA==",
                "content-type: application/json"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
//echo "cURL Error #:" . $err;
            return -1;
        } else {
//echo $response;
            $result = json_decode($response, true);
            return $result['messages'][0]['status']['groupId'];
        }
    }

    public function send_sms_employee() {
        $sms_body = $this->input->post('sms_body');

        $result = $this->Common_model->get_all_info('staff');

        if (!empty($result)) {
            foreach ($result as $res) {
                $return_code = $this->send_sms("+88" . $res->mobile, $sms_body);
            }
            echo "<p style='color: green; font-size: 20px; padding: 10px;'>Message Sent Successfully</p>";
        } else {
            echo "<p style='color: red; font-size: 20px; padding: 10px;'>No user found</p>";
        }
    }

    public function get_sms_by_title() {
        $title = $this->input->post('title');
        $this->load->model('Common_model');
        $message = $this->Common_model->one_column_one_info('body', 'title', $title, 'create_sms');
        foreach ($message as $m) {
            $msg = $m->body;
        }
        echo $msg;
    }

    public function search_bill() {
        $bill_id = $this->input->post('bill_id');
        $result = $this->Common_model->get_allinfo_byid('create_bill', 'bill_id', $bill_id);
        $count = 0;
        foreach ($result as $info) {
            $count++;
            if ($count == 1) {
                $data['bill_date'] = $info->bill_date;
                $data['bill_id'] = $info->bill_id;
                $data['patient_id'] = $info->patient_id;
                $data['patient_name'] = $info->patient_name;
                $data['discount'] = $info->discount;
                $data['tax'] = $info->tax;
                $data['total'] = $info->total;
            }
            $data['invoice_no' . $count] = $info->invoice_no;
            $data['invoice_total' . $count] = $info->invoice_total;
        }
        $data['count_it'] = $count;
        $this->load->view('admin/search_bill', $data);
    }

    public function search_admission_invoice() {
        $invoice_no = $this->input->post('invoice_no');
        $result = $this->Common_model->get_allinfo_byid('patient_admission', 'invoice_no', $invoice_no);
        $count = 0;
        foreach ($result as $info) {
            $count++;
            if ($count == 1) {
                $data['invoice_no'] = $info->invoice_no;
                $data['patient_id'] = $info->patient_id;
                $data['patient_name'] = $info->patient_name;
                $data['age'] = $info->age;
                $data['height'] = $info->height;
                $data['weight'] = $info->weight;
                $data['admission_date'] = $info->admission_date;
                $data['discharge_date'] = $info->discharge_date;
                $data['guardian_name'] = $info->guardian_name;
                $data['relation'] = $info->relation;
                $data['contact'] = $info->contact;
                $data['address'] = $info->address;
                $data['total'] = $info->total;
                $data['due'] = $info->due_amount;
                $status = $info->status;
                if ($status == 0) {
                    $data['status'] = "Unpaid";
                } elseif ($status == 1) {
                    $data['status'] = "Paid";
                }
            }
            $data['doctor_name' . $count] = $info->doctor_name;
            $data['service_name' . $count] = $info->service_name;
            $data['package_name' . $count] = $info->package_name;
        }
        $data['count_it'] = $count;

        $this->load->view('admin/search_admission_invoice', $data);
    }

    public function get_bill_invoice() {
        $date = $this->input->post('date');
        $patient_id = $this->input->post('patient');
        $tax = $this->input->post('tax');
        $discount = $this->input->post('discount');
        $payable_amount = $this->input->post('payable_amount');
        $column_with_value_array = array(
            "patient_id" => $patient_id,
            "status" => 0
        );
        $result = $this->Common_model->get_allinfo_byid('patient', 'record_id', $patient_id);
        foreach ($result as $info) {
            $patient_name = $info->name;
        }
        $result = $this->Common_model->find_last_id('bill_id', 'create_bill');
        if (empty($result)) {
            $bill_id = 1;
        } else {
            foreach ($result as $info) {
                $bill_id = $info->bill_id;
            }
            $bill_id += 1;
        }
        $result = $this->Common_model->get_distinct_value_where('invoice_no', 'patient_admission', $column_with_value_array);
        $update_data = array(
            'discharge_date' => date('Y-m-d'),
            'due_amount' => 0,
            'status' => 1
        );
        $count = 0;
        foreach ($result as $info) {
            $count++;
            $invoice_result = $this->Common_model->get_allinfo_byid('patient_admission', 'invoice_no', $info->invoice_no);
            foreach ($invoice_result as $invoice_info) {
                $invoice_total = $invoice_info->total;
            }
            $insert_data = array(
                'bill_date' => $date,
                'bill_id' => $bill_id,
                'patient_id' => $patient_id,
                'patient_name' => $patient_name,
                'invoice_no' => $info->invoice_no,
                'invoice_total' => $invoice_total,
                'discount' => $discount,
                'tax' => $tax,
                'total' => $payable_amount,
            );
            $this->Common_model->insert_data('create_bill', $insert_data);
            $this->Common_model->update_data_onerow('patient_admission', $update_data, 'invoice_no', $info->invoice_no);
            $data['invoice_no' . $count] = $info->invoice_no;
            $data['invoice_total' . $count] = $invoice_total;
        }

        $data['bill_date'] = $date;
        $data['bill_id'] = $bill_id;
        $data['patient_id'] = $patient_id;
        $data['patient_name'] = $patient_name;
        $data['discount'] = $discount;
        $data['tax'] = $tax;
        $data['total'] = $payable_amount;
        $data['count_it'] = $count;
        $this->load->view('admin/get_bill_invoice', $data);
    }

    public function get_due_bill() {
        $patient = $this->input->post('patient');
        $column_with_value_array = array(
            "patient_id" => $patient,
            "status" => 0
        );
        $result = $this->Common_model->get_distinct_value_where('invoice_no', 'patient_admission', $column_with_value_array);
        $count = 0;
        foreach ($result as $info) {
            $count++;
            $data['admission_result' . $count] = $this->Common_model->get_allinfo_byid('patient_admission', 'invoice_no', $info->invoice_no);
        }
        $data['count_it'] = $count;
        $this->load->view('admin/get_due_bill', $data);
    }

    public function get_admission_invoice_data() {
        $invoice_no = $this->input->post('invoice_no');
        $result = $this->Common_model->get_allinfo_byid('patient_admission', 'invoice_no', $invoice_no);
        foreach ($result as $info) {
            $patient_id = $info->patient_id;
            $patient_name = $info->patient_name;
            $due_amount = $info->due_amount;
        }
        $data = array($patient_id, $patient_name, $due_amount);
        echo json_encode($data);
    }

    public function get_admission_invoice() {
        $patient_type = $this->input->post('patient_type');
        $patient_id = $this->input->post('patient_id');
        $patient_name = $this->input->post('patient_name');
        $age = $this->input->post('age');
        $height = $this->input->post('height');
        $weight = $this->input->post('weight');
        $admission_date = $this->input->post('admission_date');
        $discharge_date = $this->input->post('discharge_date');
        $guardian_name = $this->input->post('guardian_name');
        $relation = $this->input->post('relation');
        $contact = $this->input->post('contact');
        $address = $this->input->post('address');
        $all_purchase = $this->input->post('all_purchase');
        $all_purchase_val = $this->input->post('all_purchase_val');
        $service_total = 0;
        $package_total = 0;
        foreach ($all_purchase_val as $single_purchase_val) {
            $service_id = $single_purchase_val[1];
            $package_id = $single_purchase_val[2];
            $result = $this->Common_model->get_allinfo_byid('billing_service', 'record_id', $service_id);
            foreach ($result as $info) {
                $service_total += $info->rate;
            }
            $result = $this->Common_model->get_allinfo_byid('add_package', 'record_id', $package_id);
            foreach ($result as $info) {
                $package_total += $info->rate;
            }
        }
        $total_amount = $service_total + $package_total;
        if ($patient_type == "old") {
            $result = $this->Common_model->get_allinfo_byid('patient', 'record_id', $patient_id);
            foreach ($result as $info) {
                $patient_name = $info->name;
                $age = $info->age;
                $weight = $info->weight;
                $height = $info->height;
            }
        } elseif ($patient_type == "new") {
            $result = $this->Common_model->find_last_id('record_id', 'patient');
            if (empty($result)) {
                $patient_id = 1;
            } else {
                foreach ($result as $info) {
                    $patient_id = $info->record_id;
                }
                $patient_id += 1;
            }
            $insert_data = array(
                'record_id' => $patient_id,
                'name' => $patient_name,
                'age' => $age,
                'weight' => $weight,
                'height' => $height
            );
            $this->Common_model->insert_data('patient', $insert_data);
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
        foreach ($all_purchase as $single_purchase) {
            $doctor = $single_purchase[0];
            $service = $single_purchase[1];
            $package = $single_purchase[2];
            $insert_data = array(
                "invoice_no" => $invoice,
                "patient_id" => $patient_id,
                "patient_name" => $patient_name,
                "age" => $age,
                "height" => $height,
                "weight" => $weight,
                "admission_date" => $admission_date,
                "discharge_date" => $discharge_date,
                "doctor_name" => $doctor,
                "service_name" => $service,
                "package_name" => $package,
                "guardian_name" => $guardian_name,
                "relation" => $relation,
                "contact" => $contact,
                "address" => $address,
                'total' => $total_amount,
                'due_amount' => $total_amount,
                "status" => 0
            );
            $this->Common_model->insert_data('patient_admission', $insert_data);
        }

        $data['invoice_no'] = $invoice;
        $data['patient_id'] = $patient_id;
        $data['patient_name'] = $patient_name;
        $data['age'] = $age;
        $data['height'] = $height;
        $data['weight'] = $weight;
        $data['admission_date'] = $admission_date;
        $data['discharge_date'] = $discharge_date;
        $data['guardian_name'] = $guardian_name;
        $data['relation'] = $relation;
        $data['contact'] = $contact;
        $data['address'] = $address;
        $data['total'] = $total_amount;

        $data['all_purchase'] = $all_purchase;

        $this->load->view('admin/show_admission_invoice', $data);
    }

    public function get_salary_sheet() {
        $month = $this->input->post('month');
        $this->load->model('Common_model');
        $data['all_value'] = $this->Common_model->get_allinfo_byid('create_salary_sheet', 'month', $month);
        $total = 0;
        foreach ($data['all_value'] as $info) {
            $total += $info->salary_scale;
        }
        $data['month'] = $month;
        $data['total'] = $total;
        $this->load->view('admin/show_salary_sheet', $data);
    }

    public function get_des_acc_salary() {
        $this->load->model('Common_model');
        $employee_id = $this->input->post('employee_id');

        $result = $this->Common_model->get_allinfo_byid('staff', 'record_id', $employee_id);
        if (empty($result)) {
            $data = array("Not Available", "Not Available", "Not Available");
        } else {
            foreach ($result as $info) {
                $designation = $info->designation;
                $account = $info->account_no;
                $salary = $info->total_salary;
            }
            $data = array($designation, $account, $salary);
        }
        echo json_encode($data);
    }

    public function get_report_info() {
        $date_from = $this->input->post('date_from');
        $date_to = $this->input->post('date_to');
        $start_date = $date_from;
        $count = 0;
        while (strtotime($date_from) <= strtotime($date_to)) {
            $count++;

            $con_res = $this->Common_model->get_allinfo_byid('consultancy', 'date', $date_from);
            $con_in_sum = 0;
            $con_ex_sum = 0;
            foreach ($con_res as $info) {
                $con_in_sum += $info->sub_total;
                $con_ex_sum += $info->doctor_commission;
            }

            $test_invoice_res = $this->Common_model->group_by_usual("date", $date_from, "invoice_no", "sales_test");
            $test_invoice_in_sum = 0;
            $test_invoice_ex_sum = 0;
            foreach ($test_invoice_res as $info) {
                $test_invoice_in_sum += $info->pay;
                $test_invoice_ex_sum += $info->doctor_commission;
            }

            $income_res = $this->Common_model->get_allinfo_byid('income', 'date', $date_from);
            $income = 0;
            foreach ($income_res as $info) {
                $income += $info->amount;
            }
            $expense_res = $this->Common_model->get_allinfo_byid('expense', 'date', $date_from);
            $expense = 0;
            foreach ($expense_res as $info) {
                $expense += $info->amount;
            }

            $balance = ($con_in_sum+$test_invoice_in_sum+$income) - ($con_ex_sum+$test_invoice_ex_sum+$expense);

            $data['date' . $count] = date('d F, Y', strtotime($date_from));
            $data['con_in_sum' . $count] = $con_in_sum;
            $data['test_invoice_in_sum' . $count] = $test_invoice_in_sum;
            $data['income' . $count] = $income;
            $data['con_ex_sum' . $count] = $con_ex_sum;
            $data['test_invoice_ex_sum' . $count] = $test_invoice_ex_sum;
            $data['expense' . $count] = $expense;
            $data['balance' . $count] = $balance;

            $date_from = date("Y-m-d", strtotime("+1 day", strtotime($date_from)));
        }
        $data['start_date'] = $start_date;
        $data['end_date'] = $date_to;
        $data['count_it'] = $count;
        $this->load->view('admin/show_report_info', $data);
    }

    public function get_con_report_info() {
        $date_from = $this->input->post('date_from');
        $date_to = $this->input->post('date_to');

        $data['start_date'] = $date_from;
        $data['end_date'] = $date_to;
        $data['all_value'] = $this->Common_model->data_date_to_date('consultancy', 'date', $date_from, $date_to);
        $this->load->view('admin/show_con_report_info', $data);
    }

    public function get_honorarium_report_info() {
        $date_from = $this->input->post('date_from');
        $date_to = $this->input->post('date_to');
        $doctor = $this->input->post('doctor');

        $data['start_date'] = $date_from;
        $data['end_date'] = $date_to;
        if (!empty($doctor)) {
            $data['all_value'] = $this->Common_model->data_between_date_where('sales_test', 'date', $date_from, $date_to, 'doctor_name', $doctor);
        } else {
            $data['all_value'] = $this->Common_model->data_date_to_date('sales_test', 'date', $date_from, $date_to);
        }
        $this->load->view('admin/show_honorarium_report_info', $data);
    }

    public function show_prescription() {
        $user_type = $this->session->ses_user_type;
        $record_id = $this->session->ses_record_id;
        $dr_name = $this->session->ses_unique_id;
        $dr_mobile = $this->session->ses_mobile;
        if ($user_type == "admin") {
            $designation_res = $this->Common_model->one_column_one_info('designation', 'record_id', $record_id, 'admin');
            foreach ($designation_res as $des) {
                $designation = $des->designation;
            }
        } elseif ($user_type == "staff") {
            $designation_res = $this->Common_model->one_column_one_info('designation', 'record_id', $record_id, 'staff');
            foreach ($designation_res as $des) {
                $designation = $des->designation;
            }
        }

        $all_goods = $this->input->post('all_goods');
        $all_tests = $this->input->post('all_tests');
        $date = $this->input->post('date');
        $name = $this->input->post('name');
        $age = $this->input->post('age');
        $weight = $this->input->post('weight');
        $height = $this->input->post('height');
        $result = $this->Common_model->find_last_id('prescription_id', 'prescription');

        if (empty($result)) {
            $prescription_id = 1;
        } else {
            foreach ($result as $info) {
                $prescription_id = $info->prescription_id;
            }
            $prescription_id += 1;
        }

        foreach ($all_goods as $single_good) {
            $product_name = $single_good[0];
            $per_day_dose = $single_good[1];
            $meal_type = $single_good[2];
            $description = $single_good[3];
            $no_of_days = $single_good[4];

            $insert_data = array(
                'prescription_id' => $prescription_id,
                'date' => $date,
                'dr_name' => $dr_name,
                'dr_mobile' => $dr_mobile,
                'designation' => $designation,
                'customer_name' => $name,
                'age' => $age,
                'weight' => $weight,
                'height' => $height,
                'product_name' => $product_name,
                'per_day_dose' => $per_day_dose,
                'meal_type' => $meal_type,
                'description' => $description,
                'no_of_days' => $no_of_days
            );
            $this->Common_model->insert_data('prescription', $insert_data);
        }

        foreach ($all_tests as $single_test) {
            $test_name = $single_test[1];
            $test_description = $single_test[2];
            $test_rate = $single_test[3];

            $insert_data = array(
                'prescription_id' => $prescription_id,
                'date' => $date,
                'dr_name' => $dr_name,
                'dr_mobile' => $dr_mobile,
                'designation' => $designation,
                'customer_name' => $name,
                'age' => $age,
                'weight' => $weight,
                'height' => $height,
                'test_name' => $test_name,
                'test_description' => $test_description,
                'test_rate' => $test_rate,
            );
            $this->Common_model->insert_data('prescription', $insert_data);
        }

        $data['date'] = $date;
        $data['designation'] = $designation;
        $data['prescription_id'] = $prescription_id;
        $data['dr_name'] = $dr_name;
        $data['dr_mobile'] = $dr_mobile;
        $data['name'] = $name;
        $data['age'] = $age;
        $data['weight'] = $weight;
        $data['height'] = $height;
        $data['age'] = $age;
        $data['weight'] = $weight;

        $data['all_goods'] = $all_goods;
        $data['all_tests'] = $all_tests;

        $this->load->view('admin/show_prescription', $data);
    }

//    public function get_ledger_info() {
//        $date_from = $this->input->post('date_from');
//        $date_to = $this->input->post('date_to');
//        $data['all_sales'] = $this->Common_model->data_date_to_date('sell_product', 'date', $date_from, $date_to);
//        $data['all_income'] = $this->Common_model->data_date_to_date('income', 'date', $date_from, $date_to);
//        $data['all_bill'] = $this->Common_model->data_date_to_date_group_by('create_bill', 'bill_id', 'bill_date', $date_from, $date_to);
//
//        $data['all_purchase_medicine'] = $this->Common_model->data_date_to_date('purchase_medicine', 'date', $date_from, $date_to);
//        $data['all_purchase_product'] = $this->Common_model->data_date_to_date('purchase_product', 'date', $date_from, $date_to);
//        $data['all_expense'] = $this->Common_model->data_date_to_date('expense', 'date', $date_from, $date_to);
//        $data['all_salary'] = $this->Common_model->data_date_to_date('create_salary_sheet', 'date', $date_from, $date_to);
//
//        $count = 0;
//        foreach ($data['all_sales'] as $info1) {
//            $count++;
//            $data['date' . $count] = $info1->date;
//            $data['particular' . $count] = $info1->product_name;
//            $data['invoice_no' . $count] = $info1->invoice_no;
//            $data['quantity' . $count] = $info1->product_qty;
//            $data['amount' . $count] = $info1->sub_total;
//        }
//        foreach ($data['all_income'] as $info1) {
//            $count++;
//            $data['date' . $count] = $info1->date;
//            $data['particular' . $count] = $info1->head;
//            $data['invoice_no' . $count] = $info1->invoice_no;
//            $data['quantity' . $count] = $info1->quantity;
//            $data['amount' . $count] = $info1->amount;
//        }
//        foreach ($data['all_bill'] as $info1) {
//            $count++;
//            $data['date' . $count] = $info1->bill_date;
//            $data['particular' . $count] = 'Hospital Bill';
//            $data['invoice_no' . $count] = $info1->bill_id;
//            $data['quantity' . $count] = 1;
//            $data['amount' . $count] = $info1->total;
//        }
//
//        $count_ex = 0;
//        foreach ($data['all_purchase_medicine'] as $info1) {
//            $count_ex++;
//            $data['date' . $count_ex] = $info1->date;
//            $data['expense_particular' . $count_ex] = $info1->medicine_name;
//            $data['expense_voucher_no' . $count_ex] = $info1->invoice_no;
//            $data['expense_quantity' . $count_ex] = $info1->medicine_qty;
//            $data['expense_amount' . $count_ex] = $info1->total_price;
//        }
//        foreach ($data['all_purchase_product'] as $info1) {
//            $count_ex++;
//            $data['date' . $count_ex] = $info1->date;
//            $data['expense_particular' . $count_ex] = $info1->product_name;
//            $data['expense_voucher_no' . $count_ex] = $info1->invoice_no;
//            $data['expense_quantity' . $count_ex] = $info1->product_qty;
//            $data['expense_amount' . $count_ex] = $info1->total_price;
//        }
//        foreach ($data['all_expense'] as $info1) {
//            $count_ex++;
//            $data['expense_date' . $count_ex] = $info1->date;
//            $data['expense_particular' . $count_ex] = $info1->head;
//            $data['expense_voucher_no' . $count_ex] = $info1->voucher_no;
//            $data['expense_quantity' . $count_ex] = $info1->quantity;
//            $data['expense_amount' . $count_ex] = $info1->amount;
//        }
//        foreach ($data['all_salary'] as $info1) {
//            $count_ex++;
//            $data['expense_date' . $count_ex] = $info1->date;
//            $data['expense_particular' . $count_ex] = "Staff Salary";
//            $data['expense_voucher_no' . $count_ex] = "0";
//            $data['expense_quantity' . $count_ex] = "1";
//            $data['expense_amount' . $count_ex] = $info1->salary_scale;
//        }
//        if ($count >= $count_ex) {
//            $empty_range = $count - $count_ex;
//            $start = $count_ex + 1;
//            $finish = $count_ex + $empty_range;
//            for ($i = $start; $i <= $finish; $i++) {
//                $data['expense_date' . $i] = "";
//                $data['expense_particular' . $i] = "";
//                $data['expense_voucher_no' . $i] = "";
//                $data['expense_quantity' . $i] = "";
//                $data['expense_amount' . $i] = "";
//            }
//            $data['count_it'] = $count;
//        } else {
//            $empty_range = $count_ex - $count;
//            $start = $count + 1;
//            $finish = $count + $empty_range;
//            for ($i = $start; $i <= $finish; $i++) {
//                $data['date' . $i] = "";
//                $data['particular' . $i] = "";
//                $data['invoice_no' . $i] = "";
//                $data['quantity' . $i] = "";
//                $data['amount' . $i] = "";
//            }
//            $data['count_it'] = $count_ex;
//        }
//
//        $this->load->view('admin/show_ledger_info', $data);
//    }
    public function get_ledger_info() {
        $date_from = $this->input->post('date_from');
        $date_to = $this->input->post('date_to');
        $data['all_sales'] = $this->Common_model->data_date_to_date('sell_product', 'date', $date_from, $date_to);
        $data['all_income'] = $this->Common_model->data_date_to_date('income', 'date', $date_from, $date_to);
        $data['all_bill'] = $this->Common_model->data_date_to_date_group_by('create_bill', 'record_id', 'date', $date_from, $date_to);

        $data['all_purchase_medicine'] = $this->Common_model->data_date_to_date('insert_medicine_info', 'date', $date_from, $date_to);
        $data['all_purchase_product'] = $this->Common_model->data_date_to_date('insert_product_info', 'date', $date_from, $date_to);
        $data['all_expense'] = $this->Common_model->data_date_to_date('expense', 'date', $date_from, $date_to);
        $data['all_salary'] = $this->Common_model->data_date_to_date('create_salary_sheet', 'date', $date_from, $date_to);

        $count = 0;
        foreach ($data['all_sales'] as $info1) {
            $count++;
            $data['date' . $count] = $info1->date;
            $data['particular' . $count] = $info1->product_name;
            $data['record_id' . $count] = $info1->record_id;
            $data['quantity' . $count] = $info1->product_qty;
            $data['amount' . $count] = $info1->sub_total;
        }
        foreach ($data['all_income'] as $info1) {
            $count++;
            $data['date' . $count] = $info1->date;
            $data['particular' . $count] = $info1->head;
//            $data['invoice_no' . $count] = $info1->invoice_no;
            $data['record_id' . $count] = $info1->invoice_no;
            $data['quantity' . $count] = $info1->quantity;
            $data['amount' . $count] = $info1->amount;
        }
        foreach ($data['all_bill'] as $info1) {
            $count++;
            $data['date' . $count] = $info1->date;
            $data['particular' . $count] = $info1->particular;
            $data['record_id' . $count] = $info1->record_id;
            $data['quantity' . $count] = 1;
            $data['amount' . $count] = $info1->paid;
        }

        $count_ex = 0;
        foreach ($data['all_purchase_medicine'] as $info1) {
            $count_ex++;
//            $data['date' . $count_ex] = $info1->date;
            $data['expense_date' . $count_ex] = $info1->date;
            $data['expense_particular' . $count_ex] = $info1->medicine_name;
            $data['expense_voucher_no' . $count_ex] = $info1->record_id;
            $data['expense_quantity' . $count_ex] = $info1->total_qty;
            $data['expense_amount' . $count_ex] = $info1->total_purchase_price;
        }
        foreach ($data['all_purchase_product'] as $info1) {
            $count_ex++;
//            $data['date' . $count_ex] = $info1->date;
            $data['expense_date' . $count_ex] = $info1->date;
            $data['expense_particular' . $count_ex] = $info1->product_name;
            $data['expense_voucher_no' . $count_ex] = $info1->record_id;
            $data['expense_quantity' . $count_ex] = $info1->total_qty;
            $data['expense_amount' . $count_ex] = $info1->purchase_price;
        }
        foreach ($data['all_expense'] as $info1) {
            $count_ex++;
            $data['expense_date' . $count_ex] = $info1->date;
            $data['expense_particular' . $count_ex] = $info1->head;
//            $data['expense_voucher_no' . $count_ex] = $info1->voucher_no;
            $data['expense_voucher_no' . $count_ex] = $info1->record_id;
            $data['expense_quantity' . $count_ex] = $info1->quantity;
            $data['expense_amount' . $count_ex] = $info1->amount;
        }
        foreach ($data['all_salary'] as $info1) {
            $count_ex++;
            $data['expense_date' . $count_ex] = $info1->date;
            $data['expense_particular' . $count_ex] = "Staff Salary";
//            $data['expense_voucher_no' . $count_ex] = "0";
//            $data['expense_quantity' . $count_ex] = "1";
            $data['expense_voucher_no' . $count_ex] = $info1->record_id;
            $data['expense_quantity' . $count_ex] = "1";
            $data['expense_amount' . $count_ex] = $info1->salary_scale;
        }
        if ($count >= $count_ex) {
            $empty_range = $count - $count_ex;
            $start = $count_ex + 1;
            $finish = $count_ex + $empty_range;
            for ($i = $start; $i <= $finish; $i++) {
                $data['expense_date' . $i] = "";
                $data['expense_particular' . $i] = "";
                $data['expense_voucher_no' . $i] = "";
                $data['expense_quantity' . $i] = "";
                $data['expense_amount' . $i] = "";
            }
            $data['count_it'] = $count;
        } else {
            $empty_range = $count_ex - $count;
            $start = $count + 1;
            $finish = $count + $empty_range;
            for ($i = $start; $i <= $finish; $i++) {
                $data['date' . $i] = "";
                $data['particular' . $i] = "";
                $data['invoice_no' . $i] = "";
                $data['quantity' . $i] = "";
                $data['amount' . $i] = "";
            }
            $data['count_it'] = $count_ex;
        }

        $this->load->view('admin/show_ledger_info', $data);
    }

    public function get_purchase_statement() {
        $date_from = $this->input->post('date_from');
        $date_to = $this->input->post('date_to');
        $invoice = $this->input->post('invoice');
        $manufacturer = $this->input->post('manufacturer');
        $category = $this->input->post('category');

        if ($category == "medicine") {
            $table_name = "purchase_medicine";
        } elseif ($category == "product") {
            $table_name = "purchase_product";
        }

        $checking_array = array();

        if ($category == "medicine") {
            if (!empty($date_from) && !empty($date_to)) {
                $checking_array['date>='] = $date_from;
                $checking_array['date<='] = $date_to;
            }
            if (!empty($invoice)) {
                $checking_array['invoice_no'] = $invoice;
            }
            if (!empty($manufacturer)) {
                $checking_array['manufacture_company'] = $manufacturer;
            }
            $result = $this->Common_model->get_distinct_value_where('invoice_no', "purchase_medicine", $checking_array);
            $count = 0;
            foreach ($result as $info) {
                $count++;
                $checking_array['invoice_no'] = $info->invoice_no;
                $data['med_result' . $count] = $this->Common_model->get_all_info_by_array("purchase_medicine", $checking_array);
            }
            $data['count_it'] = $count;
            $data['category'] = ucfirst($category);
            $this->load->view('admin/purchase_statement_medicine', $data);
        } elseif ($category == "product") {
            if (!empty($date_from) && !empty($date_to)) {
                $checking_array['date>='] = $date_from;
                $checking_array['date<='] = $date_to;
            }
            if (!empty($invoice)) {
                $checking_array['invoice_no'] = $invoice;
            }
            if (!empty($manufacturer)) {
                $checking_array['manufacture_company'] = $manufacturer;
            }
            $result = $this->Common_model->get_distinct_value_where('invoice_no', "purchase_product", $checking_array);
            $count = 0;
            foreach ($result as $info) {
                $count++;
                $checking_array['invoice_no'] = $info->invoice_no;
                $data['med_result' . $count] = $this->Common_model->get_all_info_by_array("purchase_product", $checking_array);
            }
            $data['count_it'] = $count;
            $data['category'] = ucfirst($category);
            $this->load->view('admin/purchase_statement_product', $data);
        } else {
            $checking_array_p = array();
            if (!empty($date_from) && !empty($date_to)) {
                $checking_array['date>='] = $date_from;
                $checking_array['date<='] = $date_to;
                $checking_array_p['date>='] = $date_from;
                $checking_array_p['date<='] = $date_to;
            }
            if (!empty($invoice)) {
                $checking_array['invoice_no'] = $invoice;
                $checking_array_p['invoice_no'] = $invoice;
            }
            if (!empty($manufacturer)) {
                $checking_array['manufacture_company'] = $manufacturer;
                $checking_array_p['manufacture_company'] = $manufacturer;
            }
//Medicine
            $result1 = $this->Common_model->get_distinct_value_where('invoice_no', 'purchase_medicine', $checking_array);
            $count1 = 0;
            foreach ($result1 as $info1) {
                $count1++;
                $checking_array['invoice_no'] = $info1->invoice_no;
                $data['med_result1' . $count1] = $this->Common_model->get_all_info_by_array('purchase_medicine', $checking_array);
            }
            $data['count_it1'] = $count1;
//Product
            $result2 = $this->Common_model->get_distinct_value_where('invoice_no', 'purchase_product', $checking_array_p);
            $count2 = 0;
            foreach ($result2 as $info2) {
                $count2++;
                $checking_array_p['invoice_no'] = $info2->invoice_no;
                $data['med_result2' . $count2] = $this->Common_model->get_all_info_by_array('purchase_product', $checking_array_p);
            }
            $data['count_it2'] = $count2;
            $data['category'] = "";
            $this->load->view('admin/purchase_statement_show_all', $data);
        }
    }

    public function medicine_info() {
        $medicine_id = $this->input->post('medicine_id');
        $medicine_name = $this->input->post('medicine_name');
        $result = $this->Common_model->get_allinfo_byid('insert_medicine_info', 'record_id', $medicine_id);
        foreach ($result as $info) {
            $manufacture_company = $info->manufacture_company;
            $purchase_price = $info->purchase_price;
            $selling_price = $info->selling_price;
            $medicine_quantity = 1;
            $total_price = $medicine_quantity * $purchase_price;
        }
        $result = $this->Common_model->get_allinfo_byid('purchase_medicine', 'medicine_name', $medicine_id);
        $price = 0;
        $qty = 0;
        foreach ($result as $info) {
            $price += $info->total_price;
            $qty += $info->medicine_qty;
        }
        $data = array($manufacture_company, $purchase_price, $selling_price, $medicine_quantity, $total_price, $price, $qty);
        echo json_encode($data);
    }

    public function medicine_info2() {
        $medicine = $this->input->post('medicine');

        $result = $this->Common_model->get_allinfo_byid('purchase_medicine', 'medicine_name', $medicine);
        $price = 0;
        $qty = 0;
        foreach ($result as $info) {
            $price += $info->total_price;
            $qty += $info->medicine_qty;
        }
        $data = array($price, $qty);
        echo json_encode($data);
    }

    public function product_info() {
        $product_id = $this->input->post('product_id');
        $result = $this->Common_model->get_allinfo_byid('insert_product_info', 'record_id', $product_id);
        foreach ($result as $info) {
            $manufacture_company = $info->manufacture_company;
            $purchase_price = $info->purchase_price;
            $selling_price = $info->selling_price;
            $product_quantity = 1;
            $total_price = $product_quantity * $purchase_price;
        }
        $data = array($manufacture_company, $purchase_price, $selling_price, $product_quantity, $total_price);
        echo json_encode($data);
    }

    public function purchase_success_msg() {
        $all_purchase = $this->input->post('all_purchase');
        $date = $this->input->post('date');
        $invoice_no = $this->input->post('invoice_no');
        foreach ($all_purchase as $single_purchase) {
            $medicine_name = $single_purchase[1];
            $manufacture_company = $single_purchase[2];
            $purchase_price = $single_purchase[3];
            $selling_price = $single_purchase[4];
            $medicine_qty = $single_purchase[5];
            $total_price = $single_purchase[6];
            $average_price = $single_purchase[7];
            $expiry_date = $single_purchase[8];
            $insert_data = array(
                'date' => $date,
                'invoice_no' => $invoice_no,
                'medicine_name' => $medicine_name,
                'manufacture_company' => $manufacture_company,
                'purchase_price' => $purchase_price,
                'selling_price' => $selling_price,
                'medicine_qty' => $medicine_qty,
                'total_price' => $total_price,
                'average_price' => $average_price,
                'expiry_date' => $expiry_date
            );
            $this->Common_model->insert_data('purchase_medicine', $insert_data);
        }
    }

    public function purchase_success_msg2() {
        $all_purchase = $this->input->post('all_purchase');
        $date = $this->input->post('date');
        $invoice_no = $this->input->post('invoice_no');
        foreach ($all_purchase as $single_purchase) {
            $product_name = $single_purchase[1];
            $manufacture_company = $single_purchase[2];
            $purchase_price = $single_purchase[3];
            $selling_price = $single_purchase[4];
            $product_qty = $single_purchase[5];
            $total_price = $single_purchase[6];
            $expiry_date = $single_purchase[7];
            $insert_data = array(
                'date' => $date,
                'invoice_no' => $invoice_no,
                'product_name' => $product_name,
                'manufacture_company' => $manufacture_company,
                'purchase_price' => $purchase_price,
                'selling_price' => $selling_price,
                'product_qty' => $product_qty,
                'total_price' => $total_price,
                'expiry_date' => $expiry_date
            );
            $this->Common_model->insert_data('purchase_product', $insert_data);
        }
    }

    public function selling_product_info() {
        $product_id = $this->input->post('product_id');
        if (preg_match('/m/', $product_id)) {

            $result = $this->Common_model->get_allinfo_byid('insert_medicine_info', 'record_id', substr($product_id, 1));
        } else {
            $result = $this->Common_model->get_allinfo_byid('insert_product_info', 'record_id', substr($product_id, 1));
        }
        foreach ($result as $info) {
            $selling_price = $info->selling_price;
            $product_quantity = 1;
            $discount = 0;
            $total_price = $product_quantity * $selling_price;
        }
        $data = array($selling_price, $product_quantity, $discount, $total_price);
        echo json_encode($data);
    }

    public function send_prescription_sell() {
        $all_sales = $this->input->post('all_sales');
        $date = date('Y-m-d');
        $invoice_no = $this->input->post('invoice_no');
        $user = $this->session->ses_username;
        foreach ($all_sales as $single_sale) {
            $product_name = $single_sale[1];
            $price = $single_sale[2];
            $product_qty = $single_sale[3];
            $discount = $single_sale[4];
            $total_price = $single_sale[5];
            $customer_name = $single_sale[6];
            $mobile = "";
            $address = "";
            $type = $single_sale[7];
            $insert_data = array(
                'date' => $date,
                'invoice_no' => $invoice_no,
                'product_name' => $product_name,
                'type' => $type,
                'price_per_unit' => $price,
                'product_qty' => $product_qty,
                'discount' => $discount,
                'sub_total' => $total_price,
                'customer_name' => $customer_name,
                'mobile_no' => $mobile,
                'address' => $address,
                'sold_by' => $user
            );
            $this->Common_model->insert_data('sell_product', $insert_data);
            $product_name = explode("[", $product_name);
            $product_name[0] = preg_replace('% %', '', $product_name[0]);
            $product_name[1] = preg_replace('%]%', '', $product_name[1]);
            if ($type == "Medicine") {
                $checking_array = array(
                    'medicine_name' => $product_name[0],
                    'medicine_presentation' => $product_name[1],
                );
                $result = $this->Common_model->get_all_info_by_array('insert_medicine_info', $checking_array);
                foreach ($result as $r) {
                    $old_qty = $r->total_qty;
                    $new_qty = $old_qty - $product_qty;
                }
                $update_data = array(
                    'total_qty' => $new_qty
                );
                $this->Common_model->update_data_onerow_where_array('insert_medicine_info', $update_data, $checking_array);
            } else {
                $checking_array = array(
                    'product_name' => $product_name[0],
                    'types_of_product' => $product_name[1],
                );
                $result = $this->Common_model->get_all_info_by_array('insert_product_info', $checking_array);
                foreach ($result as $r) {
                    $old_qty = $r->total_qty;
                    $new_qty = $old_qty - $product_qty;
                }
                $update_data = array(
                    'total_qty' => $new_qty
                );
                $this->Common_model->update_data_onerow_where_array('insert_product_info', $update_data, $checking_array);
            }
        }
    }

    public function sales_success_msg2() {
        $all_sales = $this->input->post('all_sales');
        $date = $this->input->post('date');
        $invoice_no = $this->input->post('invoice_no');
        $user = $this->session->ses_username;
        foreach ($all_sales as $single_sale) {
            $product_name = $single_sale[1];
            $price = $single_sale[2];
            $product_qty = $single_sale[3];
            $discount = $single_sale[4];
            $total_price = $single_sale[5];
            $customer_name = $single_sale[6];
            $mobile = $single_sale[7];
            $address = $single_sale[8];
            $type = $single_sale[9];
            if (preg_match('/m/', $type)) {
                $product_type = 'Medicine';
            } else {
                $product_type = 'Product';
            }
            $insert_data = array(
                'date' => $date,
                'invoice_no' => $invoice_no,
                'product_name' => $product_name,
                'type' => $product_type,
                'price_per_unit' => $price,
                'product_qty' => $product_qty,
                'discount' => $discount,
                'sub_total' => $total_price,
                'customer_name' => $customer_name,
                'mobile_no' => $mobile,
                'address' => $address,
                'sold_by' => $user
            );
            $this->Common_model->insert_data('sell_product', $insert_data);
            $product_name = explode("[", $product_name);
            $product_name[0] = preg_replace('% %', '', $product_name[0]);
            $product_name[1] = preg_replace('%]%', '', $product_name[1]);
            if (preg_match('/m/', $type)) {
                $checking_array = array(
                    'medicine_name' => $product_name[0],
                    'medicine_presentation' => $product_name[1],
                );
                $result = $this->Common_model->get_allinfo_byid('insert_medicine_info', 'record_id', substr($type, 1));
                foreach ($result as $r) {
                    $old_qty = $r->total_qty;
                    $new_qty = $old_qty - $product_qty;
                }
                $update_data = array(
                    'total_qty' => $new_qty
                );
                $this->Common_model->update_data_onerow_where_array('insert_medicine_info', $update_data, $checking_array);
            } else {
                $checking_array = array(
                    'product_name' => $product_name[0],
                    'types_of_product' => $product_name[1],
                );
                $result = $this->Common_model->get_allinfo_byid('insert_product_info', 'record_id', substr($type, 1));
                foreach ($result as $r) {
                    $old_qty = $r->total_qty;
                    $new_qty = $old_qty - $product_qty;
                }
                $update_data = array(
                    'total_qty' => $new_qty
                );
                $this->Common_model->update_data_onerow_where_array('insert_product_info', $update_data, $checking_array);
            }
        }
    }

    public function test_result_success() {
        $all_sales = $this->input->post('all_sales');
        $date = $this->input->post('date');
        $data['date'] = $date;
        $data['all_sales'] = $all_sales;

        $result = $this->Common_model->find_last_id('unique_id', 'test_result');
        if (empty($result)) {
            $unique_id = 1;
        } else {
            foreach ($result as $info) {
                $unique_id = $info->unique_id;
            }
            $unique_id += 1;
        }
        foreach ($all_sales as $single_sale) {
            $patient_id = $single_sale[0];
            $patient_name = $single_sale[1];
            $doctor_name = $single_sale[2];
            $test_category = $single_sale[3];
            $test_name = $single_sale[4];
            $test_result = $single_sale[5];

            $result = $this->Common_model->get_allinfo_byid('patient', 'record_id', $patient_id);
            foreach ($result as $r) {
                $age = $r->age;
                $mobile = $r->mobile;
            }


            $insert_data = array(
                'date' => $date,
                'unique_id' => $unique_id,
                'patient_id' => $patient_id,
                'patient_name' => $patient_name,
                'age' => $age,
                'mobile' => $mobile,
                'doctor_name' => $doctor_name,
                'test_category' => $test_category,
                'test_name' => $test_name,
                'test_result' => $test_result
            );
            $this->Common_model->insert_data('test_result', $insert_data);

            $data['patient_id'] = $patient_id;
            $data['referenced_by'] = $doctor_name;
            $data['patient_name'] = $patient_name;
            $data['report_category'] = $test_category;
            $data['age'] = $age;
            $data['mobile'] = $mobile;
            $data['unique_id'] = $unique_id;
        }
        $this->load->view('admin/report_all_test', $data);
    }

    public function sold_product_info() {
        $invoice = $this->input->post('invoice_no');
        $result = $this->Common_model->get_allinfo_byid('sell_product', 'invoice_no', $invoice);

        $data['return_product'] = $result;
        $this->load->view('admin/sold_product_info', $data);
    }

    public function return_product_full_row() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $product_name = $this->input->post('product_name');
            $product_type = $this->input->post('product_type');
            $record_id = $this->input->post('record_id');
            $invoice = $this->input->post('invoice_no');
            $date = date("Y-m-d");

            $product_name = explode("[", $product_name);
            $product_name[0] = preg_replace('% %', '', $product_name[0]);
            $product_name[1] = preg_replace('%]%', '', $product_name[1]);
            $result = $this->Common_model->get_allinfo_byid('sell_product', 'record_id', $record_id);
            foreach ($result as $r) {
                $sell_qty = $r->product_qty;
                $sell_amount = $r->sub_total;
            }
            if ($product_type == 'Medicine') {
                $checking_array = array(
                    'medicine_name' => $product_name[0],
                    'medicine_presentation' => $product_name[1],
                );
                $result = $this->Common_model->get_all_info_by_array('insert_medicine_info', $checking_array);
                foreach ($result as $r) {
                    $old_qty = $r->total_qty;
                    $new_qty = $old_qty + $sell_qty;
                }
                $update_data = array(
                    'total_qty' => $new_qty
                );
                $this->Common_model->update_data_onerow_where_array('insert_medicine_info', $update_data, $checking_array);
            } else {
                $checking_array = array(
                    'product_name' => $product_name[0],
                    'types_of_product' => $product_name[1],
                );
                $result = $this->Common_model->get_all_info_by_array('insert_product_info', $checking_array);
                foreach ($result as $r) {
                    $old_qty = $r->total_qty;
                    $new_qty = $old_qty + $sell_qty;
                }
                $update_data = array(
                    'total_qty' => $new_qty
                );
                $this->Common_model->update_data_onerow_where_array('insert_product_info', $update_data, $checking_array);
            }

            $returned_qty = $sell_qty;
            $returned_amount = $sell_amount;
            $insert_data = array(
                'date' => $date,
                'invoice_no' => $invoice,
                'product_name' => $product_name[0] . ' [' . $product_name[1] . ']',
                'type' => $product_type,
                'returned_qty' => $returned_qty,
                'returned_amount' => $returned_amount,
            );
            $this->Common_model->insert_data('returned_product_info', $insert_data);

            $this->Common_model->delete_info('record_id', $record_id, 'sell_product');
            $result = $this->Common_model->get_allinfo_byid('sell_product', 'invoice_no', $invoice);

            $data['return_product'] = $result;
            $this->load->view('admin/sold_product_info', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function return_product() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $invoice = $this->input->post('invoice_no');
            $result = $this->Common_model->get_allinfo_byid('sell_product', 'invoice_no', $invoice);
            foreach ($result as $r) {
                $product_name = $r->product_name;
                $record_id = $r->record_id;
                $product_type = $r->type;
                $date = date("Y-m-d");

                $product_name = explode("[", $product_name);
                $product_name[0] = preg_replace('% %', '', $product_name[0]);
                $product_name[1] = preg_replace('%]%', '', $product_name[1]);
                $result = $this->Common_model->get_allinfo_byid('sell_product', 'record_id', $record_id);
                foreach ($result as $r) {
                    $sell_qty = $r->product_qty;
                    $sell_amount = $r->sub_total;
                }
                if ($product_type == 'Medicine') {
                    $checking_array = array(
                        'medicine_name' => $product_name[0],
                        'medicine_presentation' => $product_name[1],
                    );
                    $result = $this->Common_model->get_all_info_by_array('insert_medicine_info', $checking_array);
                    foreach ($result as $r) {
                        $old_qty = $r->total_qty;
                        $new_qty = $old_qty + $sell_qty;
                    }
                    $update_data = array(
                        'total_qty' => $new_qty
                    );
                    $this->Common_model->update_data_onerow_where_array('insert_medicine_info', $update_data, $checking_array);
                } else {
                    $checking_array = array(
                        'product_name' => $product_name[0],
                        'types_of_product' => $product_name[1],
                    );
                    $result = $this->Common_model->get_all_info_by_array('insert_product_info', $checking_array);
                    foreach ($result as $r) {
                        $old_qty = $r->total_qty;
                        $new_qty = $old_qty + $sell_qty;
                    }
                    $update_data = array(
                        'total_qty' => $new_qty
                    );
                    $this->Common_model->update_data_onerow_where_array('insert_product_info', $update_data, $checking_array);
                }

                $returned_qty = $sell_qty;
                $returned_amount = $sell_amount;
                $insert_data = array(
                    'date' => $date,
                    'invoice_no' => $invoice,
                    'product_name' => $product_name[0] . ' [' . $product_name[1] . ']',
                    'type' => $product_type,
                    'returned_qty' => $returned_qty,
                    'returned_amount' => $returned_amount,
                );
                $this->Common_model->insert_data('returned_product_info', $insert_data);
            }

            $this->Common_model->delete_info('invoice_no', $invoice, 'sell_product');
            $result = $this->Common_model->get_allinfo_byid('sell_product', 'invoice_no', $invoice);
            $data['return_product'] = $result;
            $this->load->view('admin/sold_product_info', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function update_product_full_row() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $product_name = $this->input->post('product_name');
            $product_type = $this->input->post('product_type');
            $record_id = $this->input->post('record_id');
            $invoice = $this->input->post('invoice_no');
            $product_qty = $this->input->post('product_qty');
            $sub_total = $this->input->post('sub_total');
            $date = date("Y-m-d");

            $product_name = explode("[", $product_name);
            $product_name[0] = preg_replace('% %', '', $product_name[0]);
            $product_name[1] = preg_replace('%]%', '', $product_name[1]);


            $result = $this->Common_model->get_allinfo_byid('sell_product', 'record_id', $record_id);
            foreach ($result as $r) {
                $sell_qty = $r->product_qty;
                $sell_amount = $r->sub_total;
            }
            if ($product_type == 'Medicine') {
                $checking_array = array(
                    'medicine_name' => $product_name[0],
                    'medicine_presentation' => $product_name[1],
                );
                $result = $this->Common_model->get_all_info_by_array('insert_medicine_info', $checking_array);
                foreach ($result as $r) {
                    $old_qty = $r->total_qty;
                    $new_qty = $old_qty + $sell_qty - $product_qty;
                }
                $update_data = array(
                    'total_qty' => $new_qty
                );
                $this->Common_model->update_data_onerow_where_array('insert_medicine_info', $update_data, $checking_array);
            } else {
                $checking_array = array(
                    'product_name' => $product_name[0],
                    'types_of_product' => $product_name[1],
                );
                $result = $this->Common_model->get_all_info_by_array('insert_product_info', $checking_array);
                foreach ($result as $r) {
                    $old_qty = $r->total_qty;
                    $new_qty = $old_qty + $sell_qty - $product_qty;
                }
                $update_data = array(
                    'total_qty' => $new_qty
                );
                $this->Common_model->update_data_onerow_where_array('insert_product_info', $update_data, $checking_array);
            }

            $returned_qty = $sell_qty - $product_qty;
            $returned_amount = $sell_amount - $sub_total;
            $insert_data = array(
                'date' => $date,
                'invoice_no' => $invoice,
                'product_name' => $product_name[0] . ' [' . $product_name[1] . ']',
                'type' => $product_type,
                'returned_qty' => $returned_qty,
                'returned_amount' => $returned_amount,
            );
            $this->Common_model->insert_data('returned_product_info', $insert_data);

            $update_data = array(
                'product_qty' => $product_qty,
                'sub_total' => $sub_total,
            );
            $this->Common_model->update_data_onerow('sell_product', $update_data, 'record_id', $record_id);
            $result = $this->Common_model->get_allinfo_byid('sell_product', 'invoice_no', $invoice);

            $data['return_product'] = $result;
            $this->load->view('admin/sold_product_info', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function inout_report() {
        $date_from = $this->input->post('date_from');
        $date_to = $this->input->post('date_to');
        $trans_type = $this->input->post('trans_type');

        $checking_array = array();
        if ($trans_type == "in") {
            $checking_array_p = array();
            if (!empty($date_from) && !empty($date_to)) {
                $checking_array['date>='] = $date_from;
                $checking_array['date<='] = $date_to;
                $checking_array_p['date>='] = $date_from;
                $checking_array_p['date<='] = $date_to;
            }

//Medicine
            $result1 = $this->Common_model->get_distinct_value_where('invoice_no', 'purchase_medicine', $checking_array);
            $count1 = 0;
            foreach ($result1 as $info1) {
                $count1++;
                $checking_array['invoice_no'] = $info1->invoice_no;
                $data['med_result1' . $count1] = $this->Common_model->get_all_info_by_array('purchase_medicine', $checking_array);
            }
            $data['count_it1'] = $count1;
//Product
            $result2 = $this->Common_model->get_distinct_value_where('invoice_no', 'purchase_product', $checking_array_p);
            $count2 = 0;
            foreach ($result2 as $info2) {
                $count2++;
                $checking_array_p['invoice_no'] = $info2->invoice_no;
                $data['med_result2' . $count2] = $this->Common_model->get_all_info_by_array('purchase_product', $checking_array_p);
            }
            $data['count_it2'] = $count2;
            $this->load->view('admin/product_in_report', $data);
        } elseif ($trans_type == "out") {
            if (!empty($date_from) && !empty($date_to)) {
                $checking_array['date>='] = $date_from;
                $checking_array['date<='] = $date_to;
            }

            $result = $this->Common_model->get_distinct_value_where('invoice_no', "sell_product", $checking_array);
            $count = 0;
            foreach ($result as $info) {
                $count++;
                $checking_array['invoice_no'] = $info->invoice_no;
                $data['med_result' . $count] = $this->Common_model->get_all_info_by_array("sell_product", $checking_array);
            }
            $data['count_it'] = $count;
            $this->load->view('admin/product_out_report', $data);
        } else {
            $checking_array_p = array();
            $checking_array_p2 = array();
            if (!empty($date_from) && !empty($date_to)) {
                $checking_array['date>='] = $date_from;
                $checking_array['date<='] = $date_to;
                $checking_array_p['date>='] = $date_from;
                $checking_array_p['date<='] = $date_to;
                $checking_array_p2['date>='] = $date_from;
                $checking_array_p2['date<='] = $date_to;
            }

//Medicine
            $result1 = $this->Common_model->get_distinct_value_where('invoice_no', 'purchase_medicine', $checking_array);
            $count1 = 0;
            foreach ($result1 as $info1) {
                $count1++;
                $checking_array['invoice_no'] = $info1->invoice_no;
                $data['med_result1' . $count1] = $this->Common_model->get_all_info_by_array('purchase_medicine', $checking_array);
            }
            $data['count_it1'] = $count1;
//Product
            $result2 = $this->Common_model->get_distinct_value_where('invoice_no', 'purchase_product', $checking_array_p);
            $count2 = 0;
            foreach ($result2 as $info2) {
                $count2++;
                $checking_array_p['invoice_no'] = $info2->invoice_no;
                $data['med_result2' . $count2] = $this->Common_model->get_all_info_by_array('purchase_product', $checking_array_p);
            }
            $data['count_it2'] = $count2;
//sell
            $result3 = $this->Common_model->get_distinct_value_where('invoice_no', 'sell_product', $checking_array_p2);
            $count3 = 0;
            foreach ($result3 as $info3) {
                $count3++;
                $checking_array_p2['invoice_no'] = $info3->invoice_no;
                $data['med_result3' . $count3] = $this->Common_model->get_all_info_by_array('sell_product', $checking_array_p2);
//                echo "<pre>";
//                print_r($data['med_result3' . $count3] );
            }
            $data['count_it3'] = $count3;
            $this->load->view('admin/product_inout_report', $data);
        }
    }

    public function lab_inout_report() {
        $date_from = $this->input->post('date_from');
        $date_to = $this->input->post('date_to');
        $trans_type = $this->input->post('trans_type');

        $checking_array = array();
        if ($trans_type == "in") {
            $checking_array_p = array();
            if (!empty($date_from) && !empty($date_to)) {
                $checking_array['date>='] = $date_from;
                $checking_array['date<='] = $date_to;
                $checking_array_p['date>='] = $date_from;
                $checking_array_p['date<='] = $date_to;
            }

//lab_product_use_in
            $result1 = $this->Common_model->get_distinct_value_where('record_id', 'lab_product_use_in', $checking_array);
            $count1 = 0;
            foreach ($result1 as $info1) {
                $count1++;
                $checking_array['record_id'] = $info1->record_id;
                $data['med_result1' . $count1] = $this->Common_model->get_all_info_by_array('lab_product_use_in', $checking_array);
            }
            $data['count_it1'] = $count1;
//Product
//            $result2 = $this->Common_model->get_distinct_value_where('invoice_no', 'purchase_product', $checking_array_p);
//            $count2 = 0;
//            foreach ($result2 as $info2) {
//                $count2++;
//                $checking_array_p['invoice_no'] = $info2->invoice_no;
//                $data['med_result2' . $count2] = $this->Common_model->get_all_info_by_array('purchase_product', $checking_array_p);
//            }
//            $data['count_it2'] = $count2;
            $this->load->view('admin/lab_product_use_in_report', $data);
        } elseif ($trans_type == "out") {
            if (!empty($date_from) && !empty($date_to)) {
                $checking_array['date>='] = $date_from;
                $checking_array['date<='] = $date_to;
            }

            $result = $this->Common_model->get_distinct_value_where('record_id', "lab_product_use_out", $checking_array);
            $count = 0;
            foreach ($result as $info) {
                $count++;
                $checking_array['record_id'] = $info->record_id;
                $data['med_result' . $count] = $this->Common_model->get_all_info_by_array("lab_product_use_out", $checking_array);
            }
            $data['count_it'] = $count;
            $this->load->view('admin/lab_product_use_out_report', $data);
        } else {
            $checking_array_p = array();
            $checking_array_p2 = array();
            if (!empty($date_from) && !empty($date_to)) {
                $checking_array['date>='] = $date_from;
                $checking_array['date<='] = $date_to;
                $checking_array_p['date>='] = $date_from;
                $checking_array_p['date<='] = $date_to;
                $checking_array_p2['date>='] = $date_from;
                $checking_array_p2['date<='] = $date_to;
            }

//Medicine
            $result1 = $this->Common_model->get_distinct_value_where('product_name', 'lab_product_use_in', $checking_array);
            $count1 = 0;
            foreach ($result1 as $info1) {
                $count1++;
                $checking_array['product_name'] = $info1->product_name;
                $data['med_result1' . $count1] = $this->Common_model->get_all_info_by_array('lab_product_use_in', $checking_array);
            }
            $data['count_it1'] = $count1;
//            //Product
//            $result2 = $this->Common_model->get_distinct_value_where('record_id', 'lab_product_use_out', $checking_array_p);
//            $count2 = 0;
//            foreach ($result2 as $info2) {
//                $count2++;
//                $checking_array_p['record_id'] = $info2->record_id;
//                $data['med_result2' . $count2] = $this->Common_model->get_all_info_by_array('lab_product_use_out', $checking_array_p);
//            }
//            $data['count_it2'] = $count2;
//sell
            $result3 = $this->Common_model->get_distinct_value_where('product_name', 'lab_product_use_out', $checking_array_p2);
            $count3 = 0;
            foreach ($result3 as $info3) {
                $count3++;
                $checking_array_p2['product_name'] = $info3->product_name;
                $data['med_result3' . $count3] = $this->Common_model->get_all_info_by_array('lab_product_use_out', $checking_array_p2);
//                echo "<pre>";
//                print_r($data['med_result3' . $count3] );
            }
            $data['count_it3'] = $count3;
            $this->load->view('admin/lab_inout_report', $data);
        }
    }

    public function get_sales_statement() {
        $date_from = $this->input->post('date_from');
        $date_to = $this->input->post('date_to');
        $invoice = $this->input->post('invoice');
        $category = $this->input->post('category');
        $user = $this->input->post('user');
        $table_name = "sell_product";

        $checking_array = array();

        if (!empty($date_from) && !empty($date_to)) {
            $checking_array['date>='] = $date_from;
            $checking_array['date<='] = $date_to;
        }
        if (!empty($invoice)) {
            $checking_array['invoice_no'] = $invoice;
        }
        if (!empty($category)) {
            $checking_array['type'] = $category;
        }
        if (!empty($user)) {
            $checking_array['sold_by'] = $user;
        }
        $result = $this->Common_model->get_distinct_value_where('invoice_no', $table_name, $checking_array);
        $count = 0;
        foreach ($result as $info) {
            $count++;
            $checking_array['invoice_no'] = $info->invoice_no;
            $data['pro_result' . $count] = $this->Common_model->get_all_info_by_array($table_name, $checking_array);
        }
        $data['count_it'] = $count;
        $data['category'] = ucfirst($category);
        $this->load->view('admin/sales_statement_show_all', $data);
    }

    public function appointment_by_date() {
        $date = $this->input->post('date');
        $patient_id = $this->input->post('patient_id');
        $checking_array = array();
        $checking_array['date'] = $date;
        $checking_array['patient_id'] = $patient_id;
        $result = $this->Common_model->get_all_info_by_array("appointment_info", $checking_array);

        $data['all_value'] = $result;

        $this->load->view('admin/appointment_by_date', $data);
    }

    public function purchased_product_info() {
        $invoice = $this->input->post('invoice_no');
        $result = $this->Common_model->get_allinfo_byid('purchase_medicine', 'invoice_no', $invoice);
        $data['return_medicine'] = $result;
        $result = $this->Common_model->get_allinfo_byid('purchase_product', 'invoice_no', $invoice);
        $data['return_product'] = $result;

        $this->load->view('admin/purchased_product_info', $data);
    }

    public function return_to_manufacture_full_row() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $product_name = $this->input->post('product_name');
            $product_type = $this->input->post('product_type');
            $record_id = $this->input->post('record_id');
            $invoice = $this->input->post('invoice_no');
            $date = date("Y-m-d");

            $product_name = explode("[", $product_name);
            $product_name[0] = preg_replace('% %', '', $product_name[0]);
            $product_name[1] = preg_replace('%]%', '', $product_name[1]);

            if ($product_type == 'Medicine') {
                $result = $this->Common_model->get_allinfo_byid('purchase_medicine', 'record_id', $record_id);
                foreach ($result as $r) {
                    $purchase_qty = $r->medicine_qty;
                    $purchase_amount = $r->total_price;
                }
                $checking_array = array(
                    'medicine_name' => $product_name[0],
                    'medicine_presentation' => $product_name[1],
                );
                $result = $this->Common_model->get_all_info_by_array('insert_medicine_info', $checking_array);
                foreach ($result as $r) {
                    $old_qty = $r->total_qty;
                    $new_qty = $old_qty - $purchase_qty;
                }
                $update_data = array(
                    'total_qty' => $new_qty
                );
                $this->Common_model->update_data_onerow_where_array('insert_medicine_info', $update_data, $checking_array);
                $this->Common_model->delete_info('record_id', $record_id, 'purchase_medicine');
            } else {
                $result = $this->Common_model->get_allinfo_byid('purchase_product', 'record_id', $record_id);
                foreach ($result as $r) {
                    $purchase_qty = $r->product_qty;
                    $purchase_amount = $r->total_price;
                }
                $checking_array = array(
                    'product_name' => $product_name[0],
                    'types_of_product' => $product_name[1],
                );
                $result = $this->Common_model->get_all_info_by_array('insert_product_info', $checking_array);
                foreach ($result as $r) {
                    $old_qty = $r->total_qty;
                    $new_qty = $old_qty - $purchase_qty;
                }
                $update_data = array(
                    'total_qty' => $new_qty
                );
                $this->Common_model->update_data_onerow_where_array('insert_product_info', $update_data, $checking_array);
                $this->Common_model->delete_info('record_id', $record_id, 'purchase_product');
            }

//            $returned_qty = $sell_qty;
//            $returned_amount = $sell_amount;
//            $insert_data = array(
//                'date' => $date,
//                'invoice_no' => $invoice,
//                'product_name' => $product_name[0] . ' [' . $product_name[1] . ']',
//                'type' => $product_type,
//                'returned_qty' => $returned_qty,
//                'returned_amount' => $returned_amount,
//            );
//            $this->Common_model->insert_data('returned_product_info', $insert_data);


            $result = $this->Common_model->get_allinfo_byid('purchase_medicine', 'invoice_no', $invoice);
            $data['return_medicine'] = $result;
            $result = $this->Common_model->get_allinfo_byid('purchase_product', 'invoice_no', $invoice);
            $data['return_product'] = $result;
            $this->load->view('admin/purchased_product_info', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function return_to_manufacture() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $invoice = $this->input->post('invoice_no');
            $product_type = $this->input->post('product_type');

            if ($product_type == 'Medicine') {
                $result = $this->Common_model->get_allinfo_byid('purchase_medicine', 'invoice_no', $invoice);
                foreach ($result as $r) {
                    $product_name = $r->medicine_name;
                    $record_id = $r->record_id;
                    $date = date("Y-m-d");

                    $product_name = explode("[", $product_name);
                    $product_name[0] = preg_replace('% %', '', $product_name[0]);
                    $product_name[1] = preg_replace('%]%', '', $product_name[1]);
                    $result = $this->Common_model->get_allinfo_byid('purchase_medicine', 'record_id', $record_id);
                    foreach ($result as $r) {
                        $purchase_qty = $r->medicine_qty;
                        $purchase_amount = $r->total_price;
                    }

                    $checking_array = array(
                        'medicine_name' => $product_name[0],
                        'medicine_presentation' => $product_name[1],
                    );
                    $result = $this->Common_model->get_all_info_by_array('insert_medicine_info', $checking_array);
                    foreach ($result as $r) {
                        $old_qty = $r->total_qty;
                        $new_qty = $old_qty - $purchase_qty;
                    }
                    $update_data = array(
                        'total_qty' => $new_qty
                    );
                    $this->Common_model->update_data_onerow_where_array('insert_medicine_info', $update_data, $checking_array);
//
//                    $returned_qty = $sell_qty;
//                    $returned_amount = $sell_amount;
//                    $insert_data = array(
//                        'date' => $date,
//                        'invoice_no' => $invoice,
//                        'product_name' => $product_name[0] . ' [' . $product_name[1] . ']',
//                        'type' => $product_type,
//                        'returned_qty' => $returned_qty,
//                        'returned_amount' => $returned_amount,
//                    );
//                    $this->Common_model->insert_data('returned_product_info', $insert_data);
                }

                $this->Common_model->delete_info('invoice_no', $invoice, 'purchase_medicine');
            } else {
                $result = $this->Common_model->get_allinfo_byid('purchase_product', 'invoice_no', $invoice);
                foreach ($result as $r) {
                    $product_name = $r->product_name;
                    $record_id = $r->record_id;
                    $date = date("Y-m-d");

                    $product_name = explode("[", $product_name);
                    $product_name[0] = preg_replace('% %', '', $product_name[0]);
                    $product_name[1] = preg_replace('%]%', '', $product_name[1]);
                    $result = $this->Common_model->get_allinfo_byid('purchase_product', 'record_id', $record_id);
                    foreach ($result as $r) {
                        $purchase_qty = $r->product_qty;
                        $purchase_amount = $r->total_price;
                    }

                    $checking_array = array(
                        'product_name' => $product_name[0],
                        'types_of_product' => $product_name[1],
                    );
                    $result = $this->Common_model->get_all_info_by_array('insert_product_info', $checking_array);
                    foreach ($result as $r) {
                        $old_qty = $r->total_qty;
                        $new_qty = $old_qty - $purchase_qty;
                    }
                    $update_data = array(
                        'total_qty' => $new_qty
                    );
                    $this->Common_model->update_data_onerow_where_array('insert_product_info', $update_data, $checking_array);

//                    $returned_qty = $sell_qty;
//                    $returned_amount = $sell_amount;
//                    $insert_data = array(
//                        'date' => $date,
//                        'invoice_no' => $invoice,
//                        'product_name' => $product_name[0] . ' [' . $product_name[1] . ']',
//                        'type' => $product_type,
//                        'returned_qty' => $returned_qty,
//                        'returned_amount' => $returned_amount,
//                    );
//                    $this->Common_model->insert_data('returned_product_info', $insert_data);
                }
                $this->Common_model->delete_info('invoice_no', $invoice, 'purchase_product');
            }

            $result = $this->Common_model->get_allinfo_byid('purchase_medicine', 'invoice_no', $invoice);
            $data['return_medicine'] = $result;
            $result = $this->Common_model->get_allinfo_byid('purchase_product', 'invoice_no', $invoice);
            $data['return_product'] = $result;
            $this->load->view('admin/purchased_product_info', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function return_to_manufacture_update_full_row() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $product_name = $this->input->post('product_name');
            $product_type = $this->input->post('product_type');
            $record_id = $this->input->post('record_id');
            $invoice = $this->input->post('invoice_no');
            $product_qty = $this->input->post('product_qty');
            $total_price = $this->input->post('total_price');
            $date = date("Y-m-d");

            $product_name = explode("[", $product_name);
            $product_name[0] = preg_replace('% %', '', $product_name[0]);
            $product_name[1] = preg_replace('%]%', '', $product_name[1]);


            if ($product_type == 'Medicine') {
                $result = $this->Common_model->get_allinfo_byid('purchase_medicine', 'record_id', $record_id);
                foreach ($result as $r) {
                    $purchase_qty = $r->medicine_qty;
                    $purchase_amount = $r->total_price;
                }
                $checking_array = array(
                    'medicine_name' => $product_name[0],
                    'medicine_presentation' => $product_name[1],
                );
                $result = $this->Common_model->get_all_info_by_array('insert_medicine_info', $checking_array);
                foreach ($result as $r) {
                    $old_qty = $r->total_qty;
                    $new_qty = $old_qty - $purchase_qty + $product_qty;
                }
                $update_data = array(
                    'total_qty' => $new_qty
                );
                $this->Common_model->update_data_onerow_where_array('insert_medicine_info', $update_data, $checking_array);
                $update_data = array(
                    'medicine_qty' => $product_qty,
                    'total_price' => $total_price,
                );
                $this->Common_model->update_data_onerow('purchase_medicine', $update_data, 'record_id', $record_id);
            } else {
                $result = $this->Common_model->get_allinfo_byid('purchase_product', 'record_id', $record_id);
                foreach ($result as $r) {
                    $purchase_qty = $r->product_qty;
                    $purchase_amount = $r->total_price;
                }
                $checking_array = array(
                    'product_name' => $product_name[0],
                    'types_of_product' => $product_name[1],
                );
                $result = $this->Common_model->get_all_info_by_array('insert_product_info', $checking_array);
                foreach ($result as $r) {
                    $old_qty = $r->total_qty;
                    $new_qty = $old_qty - $purchase_qty + $product_qty;
                }
                $update_data = array(
                    'total_qty' => $new_qty
                );
                $this->Common_model->update_data_onerow_where_array('insert_product_info', $update_data, $checking_array);
                $update_data = array(
                    'product_qty' => $product_qty,
                    'total_price' => $total_price,
                );
                $this->Common_model->update_data_onerow('purchase_product', $update_data, 'record_id', $record_id);
            }

//            $returned_qty = $sell_qty - $product_qty;
//            $returned_amount = $sell_amount - $sub_total;
//            $insert_data = array(
//                'date' => $date,
//                'invoice_no' => $invoice,
//                'product_name' => $product_name[0] . ' [' . $product_name[1] . ']',
//                'type' => $product_type,
//                'returned_qty' => $returned_qty,
//                'returned_amount' => $returned_amount,
//            );
//            $this->Common_model->insert_data('returned_product_info', $insert_data);


            $result = $this->Common_model->get_allinfo_byid('purchase_medicine', 'invoice_no', $invoice);
            $data['return_medicine'] = $result;
            $result = $this->Common_model->get_allinfo_byid('purchase_product', 'invoice_no', $invoice);
            $data['return_product'] = $result;
            $this->load->view('admin/purchased_product_info', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function get_purchase_for_manufacture_return() {
        $date_from = $this->input->post('date_from');
        $date_to = $this->input->post('date_to');


        $checking_array = array();

        $checking_array_p = array();
        if (!empty($date_from) && !empty($date_to)) {
            $checking_array['date>='] = $date_from;
            $checking_array['date<='] = $date_to;
            $checking_array_p['date>='] = $date_from;
            $checking_array_p['date<='] = $date_to;
        }
        if (!empty($invoice)) {
            $checking_array['invoice_no'] = $invoice;
            $checking_array_p['invoice_no'] = $invoice;
        }
        if (!empty($manufacturer)) {
            $checking_array['manufacture_company'] = $manufacturer;
            $checking_array_p['manufacture_company'] = $manufacturer;
        }
//Medicine
        $result1 = $this->Common_model->get_distinct_value_where('invoice_no', 'purchase_medicine', $checking_array);
        $count1 = 0;
        foreach ($result1 as $info1) {
            $count1++;
            $checking_array['invoice_no'] = $info1->invoice_no;
            $data['med_result1' . $count1] = $this->Common_model->get_all_info_by_array('purchase_medicine', $checking_array);
        }
        $data['count_it1'] = $count1;
//Product
        $result2 = $this->Common_model->get_distinct_value_where('invoice_no', 'purchase_product', $checking_array_p);
        $count2 = 0;
        foreach ($result2 as $info2) {
            $count2++;
            $checking_array_p['invoice_no'] = $info2->invoice_no;
            $data['med_result2' . $count2] = $this->Common_model->get_all_info_by_array('purchase_product', $checking_array_p);
        }
        $data['count_it2'] = $count2;
        $data['category'] = "";
        $this->load->view('admin/get_purchase_for_manufacture_return', $data);
    }

    public function show_prescription_byid() {

        $prescription_id = $this->input->post('prescription_id');
        $checking_array['prescription_id'] = $prescription_id;
        $result = $this->Common_model->get_distinct_value_where('prescription_id', 'prescription', $checking_array);

        $count = 0;
        foreach ($result as $info) {
            $count++;
            $data['all_goods' . $count] = $this->Common_model->get_allinfo_byid('prescription', 'prescription_id', $info->prescription_id);
        }
        $data['count_it'] = $count;
        $this->load->view('admin/show_prescription2', $data);
    }

    public function prescription_product_info() {
        $product_name = $this->input->post('product_name');

        $product_name = explode("[", $product_name);
        $product_name[0] = preg_replace('% %', '', $product_name[0]);
        $product_name[1] = preg_replace('%]%', '', $product_name[1]);
        $checking_array = array(
            'medicine_name' => $product_name[0],
            'medicine_presentation' => $product_name[1],
        );
        $result = $this->Common_model->get_all_info_by_array('insert_medicine_info', $checking_array);
        $data['med'] = $result;

        $checking_array = array(
            'product_name' => $product_name[0],
            'types_of_product' => $product_name[1],
        );
        $result = $this->Common_model->get_all_info_by_array('insert_product_info', $checking_array);
        $data['pro'] = $result;

        if (!empty($data['med'])) {
            foreach ($data['med'] as $info) {
                $selling_price = $info->selling_price;
                $product_quantity = 1;
                $discount = 0;
                $total_price = $product_quantity * $selling_price;
                $product_type = 'Medicine';
            }
        } else {
            foreach ($data['pro'] as $info) {
                $selling_price = $info->selling_price;
                $product_quantity = 1;
                $discount = 0;
                $total_price = $product_quantity * $selling_price;
                $product_type = 'Product';
            }
        }
        $data = array($selling_price, $product_quantity, $discount, $total_price, $product_type);
        echo json_encode($data);
    }

//08-07-2018

    public function get_dept() {
        $id = $this->input->post('doctor_id');

        $result = $this->Common_model->get_allinfo_byid('staff', 'record_id', $id);

        foreach ($result as $info) {
            $dept = $info->department;
            $name = $info->name;
        }
        $data = array($dept, $name);
        echo json_encode($data);
    }

//09-08-2018

    public function get_staff() {
        $staff = $this->input->post('staff');

        if ($staff == 'All') {
            $result = $this->Common_model->get_all_info('staff');
        } else {
            $result = $this->Common_model->get_allinfo_byid('staff', 'staff_type', $staff);
        }


        $data['all_staff'] = $result;
        $this->load->view('admin/staff_by_type', $data);
    }

    public function get_patient() {
        $id = $this->input->post('patient_id');

        $result = $this->Common_model->get_allinfo_byid('patient', 'record_id', $id);

        foreach ($result as $info) {
            $name = $info->name;
            $age = $info->age;
            $height = $info->height;
            $weight = $info->weight;
        }
        $data = array($name, $age, $height, $weight);
        echo json_encode($data);
    }

    public function get_patient2() {
        $id = $this->input->post('patient_id');

        $result = $this->Common_model->get_allinfo_byid_groupby('patient_id', $id, 'patient_admission');
        foreach ($result as $info) {
            $name = $info->patient_name;
            $age = $info->age;
            $height = $info->height;
            $weight = $info->weight;
            $guardian_name = $info->guardian_name;
            $relation = $info->relation;
            $contact = $info->contact;
            $address = $info->address;
        }
        $data = array($name, $age, $height, $weight, $guardian_name, $relation, $contact, $address);
        echo json_encode($data);
    }

    public function get_bed_invoice() {

        $id = $this->input->post('id');
        $result = $this->Common_model->get_allinfo_byid('assign_bed', 'record_id', $id);
        foreach ($result as $res) {
            $invoice_no = $res->invoice_no;
        }

        $result = $this->Common_model->get_allinfo_byid('patient_admission', 'invoice_no', $invoice_no);
        foreach ($result as $res) {
            $invoice = $res->invoice_no;
            $patient_id = $res->patient_id;
            $patient_name = $res->patient_name;
            $age = $res->age;
            $height = $res->height;
            $weight = $res->weight;
            $admission_date = $res->admission_date;
            $discharge_date = $res->discharge_date;
            $guardian_name = $res->guardian_name;
            $relation = $res->relation;
            $contact = $res->contact;
            $address = $res->address;
            $total_amount = $res->total;
        }
        $data['invoice_no'] = $invoice;
        $data['patient_id'] = $patient_id;
        $data['patient_name'] = $patient_name;
        $data['age'] = $age;
        $data['height'] = $height;
        $data['weight'] = $weight;
        $data['admission_date'] = $admission_date;
        $data['discharge_date'] = $discharge_date;
        $data['guardian_name'] = $guardian_name;
        $data['relation'] = $relation;
        $data['contact'] = $contact;
        $data['address'] = $address;
        $data['total'] = $total_amount;

        $data['service'] = 'Bed Charge';
        $this->load->view('admin/show_bed_invoice', $data);
    }

    public function get_test_rate() {
        $id = $this->input->post('test_id');

        $result = $this->Common_model->get_allinfo_byid('test_type', 'record_id', $id);

        foreach ($result as $info) {
            $rate = $info->rate;
        }
        $data = array($rate);
        echo json_encode($data);
    }

// Change product name type by Sells Type
    public function get_med_pro_info() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $salesType = $this->input->post('salesType');
            if ($salesType == "medicine") {
                $result = $this->Common_model->get_all_info("insert_medicine_info");
                $option = "<option value=''>-- Select --</option>";
                foreach ($result as $info) {
                    $option .= "<option value='m$info->record_id'>$info->medicine_name [$info->medicine_presentation]</option>";
                }
            } elseif ($salesType == "product") {
                $result = $this->Common_model->get_all_info("insert_product_info");
                $option = "<option value=''>-- Select --</option>";
                foreach ($result as $info) {
                    $option .= "<option value='p$info->record_id'>$info->product_name [$info->types_of_product]</option>";
                }
            }

            echo $option;
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function show_sales_due() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $search_client = $this->input->post('search_client');
            if (empty($search_client)) {
                echo "<p style='color: red;font-size: 20px;'>Please select a client.</p>";
            } else {
                $search_client = explode('#', $this->input->post('search_client'));
                $patient_name = $search_client[0];
                $patient_id = $search_client[1];

                $data['all_value'] = $this->Common_model->get_allinfo_byid('sales_test', 'patient_id', $patient_id);
                $data['all_value'] = $this->Common_model->get_allinfo_byid('sales_test', 'patient_id', $patient_id);
                $sub_total = 0;
                $pay = 0;
                foreach ($data['all_value'] as $info) {
                    $sub_total += $info->sub_total;
                    $pay += $info->pay;
                }
                $due = $sub_total - $pay;
                $data['due'] = $due;
                $data['patient_name'] = $patient_name;
                $data['patient_id'] = $patient_id;
                $this->load->view('admin/show_created_bill', $data);
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public
            function get_sales_due_statement() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $date_from = $this->input->post('date_from');
            $date_to = $this->input->post('date_to');
            $client_id = $this->input->post('client_id');

            $checking_array = array();
            $data['date_range'] = "";
            if (!empty($client_id)) {
                $checking_array['client_id'] = $client_id;
            }
            if (!empty($date_from) && !empty($date_to)) {
                $checking_array['date>='] = $date_from;
                $checking_array['date<='] = $date_to;
                $data['date_range'] = "(" . date('d F', strtotime($date_from)) . " - " . date('d F', strtotime($date_to)) . ")";
            }
            $data["all_value"] = $this->Common_model->get_all_info_by_array("sales_due", $checking_array);

            $this->load->view('admin/show_sales_due_statement', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public
            function get_customer_info() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $client_id = $this->input->post('customer_id');
            $result = $this->Common_model->get_allinfo_byid('sales_due', 'client_id', $client_id);
            $total = 0;
            $paid = 0;
            foreach ($result as $info) {
                $total += $info->total;
                $paid += $info->paid;
            }
            $old_due = $total - $paid;
            $data['old_due'] = $old_due;
            $data['all_value'] = $this->Common_model->get_allinfo_byid('add_client', 'record_id', $client_id);
            $this->load->view('admin/get_customer_info', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

}
