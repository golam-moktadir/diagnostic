<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Show_data extends CI_Controller {

    public function about() {
        $this->load->model('Common_model');
        $about = $this->Common_model->last_row('about');
        $this->load->view('website/about_us', ['about' => $about]);
        $this->load->view('website/footer');
    }

    public function contact() {
        $this->load->model('Common_model');
        $contact = $this->Common_model->last_row('contact');
        $this->load->view('website/show_contact', ['contact' => $contact]);
        $this->load->view('website/footer');
    }

    public function photo_gallery() {
        $this->load->model('Common_model');
        $data['all_value'] = $this->Common_model->get_all_info('photo_gallery');
        $this->load->view('website/header');
        $this->load->view('website/show_photo_gallery', $data);
        $this->load->view('website/footer');
    }

    public function single_page_content($title) {
        $this->load->model('Common_model');
        if ($title == 1) {
            $title_name = "Hospital Profile";
        } elseif ($title == 2) {
            $title_name = "Message from Chairman";
        } elseif ($title == 3) {
            $title_name = "Message from Director";
        } elseif ($title == 4) {
            $title_name = "X-ray Description";
        } elseif ($title == 5) {
            $title_name = "Message from Upazilla Chairman";
        } elseif ($title == 6) {
            $title_name = "Message from UNO";
        } elseif ($title == 7) {
            $title_name = "Message from Meyor";
        } elseif ($title == 8) {
            $title_name = "Mission-Vision";
        } elseif ($title == 9) {
            $title_name = "Ultrasonogram";
        } elseif ($title == 10) {
            $title_name = "Instruction for Guardians";
        } elseif ($title == 11) {
            $title_name = "Dress Code";
        }
        $result = $this->Common_model->get_allinfo_byid('single_page_content', 'title', $title);
        if (empty($result)) {
            $details = "";
            $image = "";
        } else {
            foreach ($result as $info) {
                $details = $info->details;
                $image = $info->image;
            }
        }
        $data['title_name'] = $title_name;
        $data['image'] = $image;
        $data['details'] = $details;
        $this->load->view('website/header');
        $this->load->view('website/single_page_content', $data);
        $this->load->view('website/footer');
    }

    public function show_doctor_info() {
        $this->load->model('Common_model');
        $data['doctor'] = $this->Common_model->get_all_info('doctor');
        $this->load->view('website/header');
        $this->load->view('website/show_doctor_info', $data);
        $this->load->view('website/footer');
    }

    public function show_service_info() {
        $this->load->model('Common_model');
        $data['all_price'] = $this->Common_model->get_all_info('test_price');
        $result = $this->load->view('website/show_service_info', $data, true);
        echo json_encode($result);
    }

    public function show_service() {
        $this->load->model('Common_model');
        $data['all_price'] = $this->Common_model->get_all_info('test_price');
        $this->load->view('website/header');
        $this->load->view('website/show_service', $data);
        $this->load->view('website/footer');
    }

}
