<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Client_college extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('client/client_college_model', 'model');
        $this->load->model('admin/admin_college_model');
    }

    function college_compare() {

        $data['ids'] = @$_POST["comapre_school"];

        //$this->input->post('comapre_school');
        //display($data);
        $this->load->view(CLIENT_COLLEGE_COMPARE_VIEW, $data);
    }

    function get_college_data() {
        $id = $_POST["id"];
        $col = $_POST["col"];

        $data = $this->model->get_college_compare($id);

        foreach ($data[0] as $key => $value) {
            echo "<li class='compare$col'>$value</li>";
        }
    }

    function college_list() {
        $college = $this->uri->segment(1);
        $page_type = $this->uri->segment(2);
        $id = $this->uri->segment(3);
        $user_id = session('client_user_id');
        if (($page_type == 'page' || $page_type == 'search' || $page_type == '')) {

            $data = $this->get_data();
            if ($data['get_college']) {
                $this->load->view(CLIENT_COLLEGE_LISTING_VIEW, $data);
            } else {
                $this->load->view(CLIENT_COLLEGE_LISTING_VIEW, $data);
                //exit;
            }
        } else {
            if (!is_numeric($id) || $id == 0) {
                echo 'not valid college id';
                exit;
            }
            $data['get_domain'] = $this->admin_college_model->get_majors_domains();
            $this->model->row = TRUE;
            $this->model->college_id = $id;
            $this->model->order = "desc";
            $data['get_college'] = $this->model->get_college();
            $data['get_review_rating'] = $this->model->get_review_rating();
            $data['get_college_program'] = $this->model->get_college_program();
            $data['get_school_event'] = $this->model->get_school_event();
            $data['review_count'] = $this->model->review_count();
            $data['get_avg_rating'] = $this->model->get_avg_rating();
            $data['following_count'] = $this->model->following_count();
            $data['get_user_following_info'] = $this->model->get_user_following_info();
            $data['get_student_college_review_count'] = $this->model->get_student_college_review_count();
            $data['get_student_following_college'] = $this->model->get_student_following_college();
            $data['get_student_edu'] = $this->model->get_student_edu();
            $data['get_student_review_rate'] = $this->model->get_student_review_rate();
            $data['get_college_top_sector'] = $this->model->get_college_top_sector();
            $data['get_user_follow_info'] = $this->model->get_user_follow_info($user_id);
            //display($data['get_user_following_info']);
            if ($data['get_college'])
                $this->load->view(CLIENT_COLLEGE_DETAIL_VIEW, $data);
            else
                echo 'show data not found';
        }
    }

    function get_data($id = NULL) {
        $data['get_domain'] = $this->admin_college_model->get_majors_domains();
        $data['get_country'] = $this->admin_college_model->get_master_country();
        $data['get_field'] = $this->admin_college_model->field_of_study();
        $data['get_topsectors'] = $this->admin_college_model->get_topsectors();
        $data['get_user_following_info'] = $this->model->get_user_following_info();

        if ($id) {
            
        } else {
            $type = $this->input->post('type');
            $course = $this->input->post('course');
            $country = $this->input->post('country');
            $degree = $this->input->post('degree');
            $word = $this->input->post('word');
            $tuition = $this->input->post('tuition');
            $topschools = $this->input->post('topschools');
            $verbalability = $this->input->post('verbalability');
            $quantability = $this->input->post('quantability');
            $test_scores = $this->input->post('test_scores');
            $topsector = $this->input->post('topsector');
            $sort_by_rank = $this->input->post('sort_by_rank');
            $sort_by_tution = $this->input->post('sort_by_tution');
        }
        $this->model->total = TRUE;
        $data['total_rows'] = $this->model->get_college($type, $course, $country, $degree, $word, $tuition, $topschools, $verbalability, $quantability, $test_scores, $topsector, $sort_by_rank, $sort_by_tution);
        $this->model->total = FALSE;
        ###################################pagination settings#####################
        $page_type = $this->uri->segment(2);
        $current_page = 0;
        //display($this->uri->segment(4));
        $pagination_url = SITE_URL . 'college/page/';
        $uri_segment = 3;
        if ($page_type == 'page') {
            $current_page = $this->uri->segment(3);
            $uri_segment = 3;
            $pagination_url = SITE_URL . 'college/page/';
        } elseif ($page_type == 'search') {
            $current_page = $this->uri->segment(4);
            $uri_segment = 4;
            $pagination_url = SITE_URL . 'college/search/page/';
        }

        if ($current_page <= 0)
            $current_page = $current_page * CLIENT_PER_PAGE;
        else
            $current_page = ($current_page - 1) * CLIENT_PER_PAGE;

        $data['pagination'] = client_pagiantion($pagination_url, $data['total_rows'], CLIENT_PER_PAGE, $current_page, $uri_segment);
        ###########################################################################
        $this->model->limit = $current_page;
        $this->model->offset = CLIENT_PER_PAGE;
        $this->model->total = FALSE;
        $data['get_college'] = $this->model->get_college($type, $course, $country, $degree, $word, $tuition, $topschools, $verbalability, $quantability, $test_scores, $topsector, $sort_by_rank, $sort_by_tution);
        //show_query();
        return $data;
    }

    function get_sort_data() {

        $data = $this->get_data();

        //$data['get_college'] = $this->model->get_college($type, $course, $country, $degree, $word, $tuition, $topschools, $verbalability, $quantability, $test_scores, $topsector, $sort_by_rank, $sort_by_tution);
        //show_query();
        if ($data['get_college'])
            $this->load->view('client/college/client_ajax_college_listing_view', $data);
        else
            $this->load->view('client/college/client_ajax_college_listing_view', $data);
    }

    function college_review() {
        $id = $this->uri->segment(5);
        $this->model->college_id = $id;
        $data['get_college'] = $this->model->get_college();
        $data['get_field'] = $this->admin_college_model->field_of_study();
        $data['get_college_program'] = $this->model->get_college_program();
        $this->load->view(CLIENT_COLLEGE_REVIEW_VIEW, $data);
    }

    function search_college_name() {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->model->get_school($q);
        }
    }

    function get_college_wall($school_id, $pageno = 1) {
        $this->load->model('client/client_forums_model');
        if (session("client_user_id")) {
            $get_type = $this->client_forums_model->get_user_details(session("client_user_id"));
            if ($get_type[0]["user_type"] == "admin_user") {
                $this->session->set_userdata(array("is_admin" => 1));
            }
            if ($get_type[0]["user_type"] == "admin_user") {
                $this->session->set_userdata(array("is_admin" => 1));
            } else {
                $this->session->unset_userdata("is_admin");
            }
        }
        $data["uriseg"] = $this->uri->segment(6);
        $total_rows = $this->client_forums_model->get_total_school_discussions_count($school_id);
        $data['total_row'] = $total_rows[0]['count'];
        $pagination_url = CLIENT_SITE_URL . "client_college/get_college_wall/$school_id/";
        $uri_segment = 5;
        $pageno = ($pageno - 1) * FORUM_DISCUSSION_PER_PAGE;
        $data['pagination'] = client_pagiantion($pagination_url, $data['total_row'], FORUM_DISCUSSION_PER_PAGE, $pageno, $uri_segment);
        $data['discussions'] = $this->client_forums_model->get_all_school_discussions($school_id, $pageno, FORUM_DISCUSSION_PER_PAGE);
        $this->load->view(CLIENT_COLLEGE_WALL_VIEW, $data);
    }

    function send_passcode() {
        if (!session("coll_dom_email")) {
            $this->session->set_userdata("coll_dom_email", $_POST["email"]);
        }
        if (!session("passcode") || isset($_POST["resend"])) {
            $this->session->set_userdata("passcode", rand(111111, 999999));
        }
        $send = sendMail(session("coll_dom_email"), "College Review Passcode", "Your One time Passcode is :" . session("passcode"));
        if ($send) {
            echo "sent";
        }
    }

    function check_passcode() {
        $passcode = $_POST["passcode"];
        if ($passcode == session("passcode")) {
            echo "1";
        } else {
            echo "0";
        }
    }

}

?>