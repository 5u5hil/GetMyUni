<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Client_Review_Rating extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('client/client_review_rating_model');
        $this->load->model('client/client_college_model', 'model');
    }

    function review_rating_view() {

        $data['get_review_rating'] = $this->model->get_review_rating();
        //display($data['get_review_rating']);
        $this->load->view(CLIENT_RIVEW_RATING_VIEW, $data);
    }

    function review_listing_view() {


        $this->load->view(CLIENT_RIVEW_LISTING_VIEW);
    }

    function review_details_view() {

        $this->model->college_id = $this->uri->segment(5);
		 $school_name = $this->uri->segment(4);
		  $schoo = $this->uri->segment(6);
		  //display ($schoo);
        $this->model->row = FALSE;
		 $this->model->total = TRUE;
        $data['total_rows'] = $this->model->get_review_rating();
        $this->model->total = FALSE;
		
        $current_page = $this->uri->segment(6);
        $pagination_url = SITE_URL . "client/client_review_rating/review_details_view/".$school_name."/".$this->uri->segment(5);
        $uri_segment = 6;
		$current_page = ($current_page - 1) * REVIEW_PER_PAGE;
        $data['pagination'] = client_pagiantion($pagination_url, $data['total_rows'], REVIEW_PER_PAGE, $current_page, $uri_segment);
        ###########################################################################
		
		$this->model->limit = $current_page;
		//display ($current_page);
        $this->model->offset = REVIEW_PER_PAGE;
        $this->model->total = FALSE;
        $data['get_review_rating'] = $this->model->get_review_rating();
		
        $this->load->view(CLIENT_COLLEGE_REVIEW_DETAILS_VIEW, $data);
    }

    function review_full_details_view() {

        $this->model->review_id = $this->uri->segment(4);
        $this->model->row = TRUE;
        $data['get_review_rating'] = $this->model->get_review_rating();
        //display($data['get_review_rating']);
        $this->load->view(CLIENT_COLLEGE_FULL_REVIEW_VIEW, $data);
    }

    function review_rating_validation() {

        $this->load->library('form_validation');
        $form_field = $_POST;

        if (!$form_field)
            $json_array = array();
        foreach ($form_field as $key => $value) 
            {
            
            if( $key != "review_ans1" && $key != "review_ans2" && $key != "review_ans3" && $key != "review_ans4" && $key != "review_ans5")
            {

                 $this->form_validation->set_rules($key, " " , 'required');
            }
        }

        if ($this->form_validation->run() == FALSE) {
            $json_array['error'] = 'error';
            foreach ($form_field as $key => $value) {
                $json_array[$key . '_err'] = form_error($key);
            }
        } else {
            $json_array['error'] = 'success';
            $ans = $this->input->post();

            //display($ans);
            $this->load->model('client/client_review_rating_model');
            $this->client_review_rating_model->insert_review_rating($ans);
        }
        echo json_encode($json_array);
    }

    function get_review_sort_data() {

        $degree_type = $this->input->post('degree_type');
        $r_field = $this->input->post('r_field');
        $majors = $this->input->post('majors');
        $country = $this->input->post('country');
		$page_type = $this->uri->segment(3);
		$data['review_count'] = $this->model->review_count();
		 $this->model->total = TRUE;
        $data['total_rows'] = $this->model->get_review_rating($degree_type,$r_field,$majors,$country);
        $this->model->total = FALSE;
		
		 if ($page_type == 'get_review_sort_data') {
            $current_page = $this->uri->segment(4);
            $uri_segment = 4;
			}
            //$pagination_url = SITE_URL . 'college/page/';
		//display($this->uri->segment(3));
		//$current_page = $this->uri->segment(3);
        $pagination_url = SITE_URL . "client/client_review_rating/get_review_sort_data";
        //$uri_segment = 4;
		$current_page = ($current_page - 1) * REVIEW_PER_PAGE;
        $data['pagination'] = client_pagiantion1($pagination_url, $data['total_rows'], REVIEW_PER_PAGE, $current_page, $uri_segment);
        ###########################################################################
		
		$this->model->limit = $current_page;
		//display ($current_page);
        $this->model->offset = REVIEW_PER_PAGE;
        $this->model->total = FALSE;
       
        $data['get_review_rating'] = $this->model->get_review_rating($degree_type,$r_field,$majors,$country);
        //display($data['get_review_rating']);
        if ($data['get_review_rating'])
			
            $this->load->view("client/review_rating/client_review_listing_view.php", $data);
        else
            $this->load->view("client/review_rating/client_review_listing_view.php", $data);
    }

    function search_college_name_review() {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->client_review_rating_model->get_school_name_review($q);
        }
    }

}
