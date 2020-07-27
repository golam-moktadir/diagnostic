<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Get_ajax_value extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Common_model');
    }

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

    public function show_sales_due()
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $search_client = $this->input->post('search_client');
            if (empty($search_client)) {
                echo "<p style='color: red;font-size: 20px;'>Please select a client.</p>";
            } else {
                $search_client = explode('#', $this->input->post('search_client'));
                $client_name = $search_client[0];
                $client_id = $search_client[1];

                $data['all_value'] = $this->Common_model->get_allinfo_byid('sales_due', 'client_id', $client_id);
                $total = 0;
                $paid = 0;
                foreach ($data['all_value'] as $info) {
                    $total += $info->total;
                    $paid += $info->paid;
                }
                $old_due = $total - $paid;
                $data['old_due'] = $old_due;
                $data['client_name'] = $client_name;
                $data['client_id'] = $client_id;
                $this->load->view('admin/show_sales_due', $data);
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    
    
     public
    function get_sales_due_statement()
    {
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
    function get_customer_info()
    {
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
