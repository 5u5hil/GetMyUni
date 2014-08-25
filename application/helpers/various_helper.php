<?php

//$con=mysqli_connect("localhost","root","","gmu");

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function random($length) {

    $characters = "0123456789abcdefghijklmnopqrstuvwxyz";
    $string = '';
    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters) - 1)];
    }

    return $string;
}

function clean_string($string, $force_lowercase = true, $temp = false) {
    $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "'", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
        "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
        "—", "–", ",", "<", ".", ">", "/", "?");
    $clean = trim(str_replace($strip, " ", strip_tags($string)));
    $clean = preg_replace('/\s+/', "-", $clean);
    $clean = ($temp) ? preg_replace("/[^a-zA-Z0-9]/", " ", $clean) : $clean;
    return ($force_lowercase) ? (function_exists('mb_strtolower')) ? mb_strtolower($clean, 'UTF-8') : strtolower($clean) : $clean;
}

/*
 * function    : get_date
 * description : function will return date as per format provided by adding 5Hrs and 30Mins to GMT time
 *
 * @param 		$format				format of datetime
 * @param 		$timestamp			timestamp to be converted to $format
 */

function get_date($format = "Y-m-d H:i:s", $timestamp = "") {
    $offset = 5 * 60 * 60;
    if ($timestamp == "") {
        return gmdate($format);
    } else {
        return gmdate($format, $timestamp);
    }
}

/*
 * function    : show
 * description : function to print array or variable in <pre> format
 *
 * @param 		$var 				variable or array
 * @param 		$exit 				1 to exit
 * @param 		$before_text 		text to be printed before
 * @param 		$after_text 		text to be printed after
 */

function display($var, $exit = "0", $before_text = "", $after_text = "") {
    if (is_array($var) || is_object($var)) {
        echo "<pre><br />";
        echo "<br />-----$before_text starts-------<br />";
        print_r($var);
        echo "</pre>";
        echo "------$after_text ends-------<br />";
    } else {
        echo "<br />-----$before_text-------<br />";
        echo "$var";
        echo "<br />-----$after_text-------<br />";
    }

    if ($exit == 1) {
        exit;
    }
}

function session($index) {
    $CI = & get_instance();
    return $CI->session->userdata($index);
}

/**
 * function unset_session() start here..
 * Function Name    : unset_session()
 * Work             : This functin is used unsetting session data.
 * Modules uses     : All Module
 * Date             : 29/05/2012(dd/mm/yyyy)
 */
function unset_session($index) {
    $CI = & get_instance();
    $CI->session->unset_userdata($index);
}

/*
 * function unset_session() end here..
 */

/**
 * function set_session() start here..
 * Function Name    : set_session()
 * Work             : This functin is used setting session data.
 * Modules uses     : All Module
 * Date             : 29/05/2012(dd/mm/yyyy)
 */
function set_session($array) {
    $CI = & get_instance();
    $CI->session->set_userdata($array);
}

/**
 * function unset_session() end here..
 */

/**
 * this function will be used to send the post valu
 */
function post($index) {
    $CI = & get_instance();
    $post_value = $CI->input->post($index, TRUE);
    // if (!is_array($post_value))
    // $post_value = $post_value);

    return $post_value;
}

/**
 * this function will be used to send the get value
 * date : 15/06/2012
 */
function get($index) {
    $CI = & get_instance();
    $get_value = $CI->input->get($index, TRUE);
    // if (!is_array($get_value))
    //$get_value = mysqli_real_escape_string($con,$get_value);
    return $get_value;
}

/**

 * this function will echo the last query 
 */
function show_query() {
    $CI = & get_instance();
    echo $CI->db->last_query();
}

/*
 * function to send email
 * date 11/06/2012 (dd/mm/yyyy)
 */

function send_email($to = '', $mail_subject = '', $message) {
    $CI = & get_instance();
    if ($to != '' && $mail_subject != '' && $message != '') {
        $CI->email->from(SITE_EMAIL_ACCOUNT, SITE_EMAIL_ACCOUNT_NAME);
        //$this->email->to($data['order_details']['email']); 
        $CI->email->to($to);
        $CI->email->subject($mail_subject);
        $CI->email->message($message);
        $CI->email->send();
    }
}

function getMasters($table) {
    if (!$table)
        return FALSE;
    $CI = & get_instance();

    $query = $CI->db
            ->select('*')
            ->from($table)
            //->where('status','1')
            ->get();
    return $query->result_array();
}

function client_pagiantion($pagination_url, $total_row, $per_page, $current_page, $uri_segment) {

    $CI = & get_instance();
    $CI->load->library('pagination');
    $config['base_url'] = $pagination_url;
    $config['per_page'] = $per_page;
    $config['cur_page'] = $current_page;
    $config['total_rows'] = $total_row;
    $config['uri_segment'] = $uri_segment;
    $config['first_url'] = '1';
    $config['full_tag_open'] = '<ul class="pagination pull-right">';
    $config['full_tag_close'] = '</ul>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a class="active" href="javascript:;">';
    $config['cur_tag_close'] = '</li></a>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['first_link'] = 'First';
    $config['next_link'] = 'Next';
    $config['prev_link'] = 'Prev';
    $config['last_link'] = 'Last';
    $config['use_page_numbers'] = TRUE;
    $CI->pagination->initialize($config);
    $pagination = $CI->pagination->create_links();
    return $pagination;
}

function client_pagiantion1($pagination_url, $total_row, $per_page, $current_page, $uri_segment) {

    $CI = & get_instance();
    $CI->load->library('pagination');
    $config['base_url'] = $pagination_url;
    $config['per_page'] = $per_page;
    $config['cur_page'] = $current_page;
    $config['total_rows'] = $total_row;
    $config['uri_segment'] = $uri_segment;
    $config['first_url'] = '1';
    $config['full_tag_open'] = '<ul class="pagination pull-right" id="search_page">';
    $config['full_tag_close'] = '</ul>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a class="active" href="javascript:;">';
    $config['cur_tag_close'] = '</li></a>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['first_link'] = 'First';
    $config['next_link'] = 'Next';
    $config['prev_link'] = 'Prev';
    $config['last_link'] = 'Last';
    $config['use_page_numbers'] = TRUE;
    $CI->pagination->initialize($config);
    $pagination = $CI->pagination->create_links();
    return $pagination;
}

function date_time_diff($date) {
    $datetime1 = new DateTime($date);
    $datetime2 = new DateTime(date("Y-m-d H:i:s"));
    $interval = $datetime1->diff($datetime2);

    if ($interval->y > 0) {
        $date = $interval->y . "y ago";
    } elseif ($interval->m > 0) {
        $date = $interval->m . "m ago";
    } elseif ($interval->d > 0) {
        $date = $interval->d . "d ago";
    } elseif ($interval->h > 0) {
        $date = $interval->h . "h ago";
    } elseif ($interval->i > 0) {
        $date = $interval->i . "m ago";
    } elseif ($interval->s > 0) {
        $date = $interval->s . "s ago";
    } else {
        $date = "0s ago";
    }

    return $date;
}

function get_user_details($user_id) {

    $CI = get_instance();

    $CI->load->model('client/client_forums_model');

    $details = $CI->client_forums_model->get_user_details($user_id);

    return $details;
}

function urlclean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}