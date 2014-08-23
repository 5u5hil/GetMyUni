<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Client_user extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('client/client_user_model', 'model');
        $this->load->library('form_validation');
    }

    function login_view() {
        if (session('client_user_id'))
            redirect(SITE_URL . 'user/my-profile');
        $this->load->view(CLIENT_LOGIN_SIGNUP_VIEW);
    }

    function login_page_view() {
        if (session('client_user_id'))
            redirect(SITE_URL . 'user/my-profile');
        $this->load->view(CLIENT_LOGIN_SIGNUP_VIEW);
    }

    function pre_login_view() {
        $data = array();
        if (!session('full_name') || !session('email'))
            redirect(SITE_URL . 'user/login-view');

        $data['country'] = getMasters('country');
        $data['get_domain'] = getMasters('master_majors_domains');
        $data['master_degree'] = getMasters('master_degree');
        $data['study_field'] = getMasters('field_of_study');
        $this->load->view(CLIENT_PRE_REGISTER_VIEW, $data);
    }

    function pre_login_validation() {

        $this->form_validation->set_rules('full_name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
        if (post('profile_type') == 'normal') {
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required||matches[password]');
        }


        if ($this->form_validation->run() == FALSE) {
            $json_error['error'] = 'error';
            $json_error['email_err'] = form_error('email');
            $json_error['full_name_err'] = form_error('full_name');
            $json_error['password_err'] = form_error('password');
            $json_error['confirm_password_err'] = form_error('confirm_password');
        } else {
            $pre_register_data = array(
                'full_name' => post('full_name'),
                'email' => post('email'),
                'password' => post('password'),
                'profile_id' => post('profile_id'),
                'profile_type' => post('profile_type'),
            );
            $this->session->set_userdata($pre_register_data);
            $json_error['error'] = 'success';
        }

        echo json_encode($json_error);
    }

    function my_profile() {
        if (!session('client_user_id'))
            redirect(SITE_URL . 'user/login-view');

        $data = array();
        $pre_register_data = array(
            'full_name' => '',
            'email' => '',
            'password' => '',
            'profile_id' => '',
            'profile_type' => '',
        );
        $this->session->set_userdata($pre_register_data);
        $user_id = session('client_user_id');
        //display($this->session->all_userdata());
        $this->model->user_id = session('client_user_id');
        $data['user_data'] = $this->model->getUserData();
        $data['get_user_save_school'] = $this->model->get_user_save_school();
        $data['get_user_following_school'] = $this->model->get_user_following_school();
        $data['get_school_follower'] = $this->model->get_school_follower();
        $data['get_user_review'] = $this->model->get_user_review();
        $data['get_school_name'] = $this->model->get_school_name();
        $data['get_edu'] = $this->model->getUserEduInfo();
        $data['get_test'] = $this->model->getUserTestInfo();
        $data['master_degree'] = getMasters('master_degree');
        $data['study_field'] = getMasters('field_of_study');
        $this->load->view(CLIENT_USER_PROFILE_VIEW, $data);
    }

    function create_user() {

        $data = array();
        $data = $this->input->post(NULL, TRUE);
        $data['email'] = session('email');
        $data['full_name'] = session('full_name');
        $data['password'] = session('password');
        $data['profile_type'] = session('profile_type');
        $data['profile_id'] = session('profile_id');
        $json_array['error'] = 'error';
        $json_array['msg'] = 'Something went wrong';
        if ($data['email'] && $data['full_name']) {
            $create_user = $this->model->create_user($data);
            if ($create_user) {
                $user_session_data = array(
                    'client_user_id' => $create_user,
                    'client_email' => session('email'),
                        //'password'           => '',
                );
                $this->session->set_userdata($user_session_data);

                $json_array['error'] = 'success';
                $json_array['msg'] = 'Success';
            }
        }

        echo json_encode($json_array);
    }

    function validate_user() {
        $email = post('email');
        $password = $this->input->post('password');
        $json_array['error'] = 'error';
        $json_array['msg'] = 'Invalid Email/Password';

        if (!$email || !$password) {

            echo json_encode($json_array);
            exit;
        }

        $this->model->email = $email;
        $this->model->password = $password;
        $get_user = $this->model->getUserData();

        if ($get_user) {
            if ($get_user->status == 1) {
                $json_array['error'] = 'success';
                $json_array['msg'] = 'Success';
                $user_session_data = array(
                    'client_user_id' => $get_user->id,
                    'client_email' => $get_user->email,
                );
                $this->session->set_userdata($user_session_data);
            } else {
                $json_array['error'] = 'error';
                $json_array['msg'] = 'User has been blocked';
            }
        }
        echo json_encode($json_array);
    }

    function save_user() {
	
		$this->form_validation->set_rules('name', 'Name', 'required');
		if ($this->form_validation->run() == FALSE) 
		{
			$json_array['error'] = 'error';
			$json_array['name_err'] = form_error('name');
		}
		else
		{
        $data = array();
        //$json_array['error'] = 'error';
        //$json_array['msg'] = 'Something went wrong';
        if (!session('client_user_id'))
            return FALSE;
        $data = $this->input->post(NULL, TRUE);


        $this->model->user_id = session('client_user_id');
        $save_user = $this->model->save_user($data);
        $json_array['error'] = 'success';
        $json_array['msg'] = 'Profile Updated Successfully';
		}
        echo json_encode($json_array);
    }

    function getUser() {
        
    }

    function logout() {
        $user_session_data = array(
            'client_user_id' => '',
            'client_email' => '',
        );
        $this->session->set_userdata($user_session_data);
        redirect(SITE_URL);
    }

    function delete_record() {
        $data = $this->input->post(NULL, TRUE);
        $json_array['error'] = 'error';
        $json_array['msg'] = 'something went wrong';
        $user_data = $this->model->delete_record($data);
        if ($user_data) {
            $json_array['error'] = 'success';
            $json_array['msg'] = 'success';
        }

        echo json_encode($json_array);
    }
	
	
	function user_show_profile() {
      
        $user_id = $this->uri->segment(4);
        //display($this->session->all_userdata());
        $this->model->user_id = $this->uri->segment(4);
        $data['user_data'] = $this->model->getUserData();
        $data['get_user_save_school'] = $this->model->get_user_save_school();
        $data['get_user_following_school'] = $this->model->get_user_following_school();
        $data['get_school_follower'] = $this->model->get_school_follower();
        $data['get_user_review'] = $this->model->get_user_review();
        $data['get_school_name'] = $this->model->get_school_name();
        $data['get_edu'] = $this->model->getUserEduInfo();
        $data['get_test'] = $this->model->getUserTestInfo();
        $data['master_degree'] = getMasters('master_degree');
        $data['study_field'] = getMasters('field_of_study');
        $this->load->view(CLIENT_SHOW_DETAILS_VIEW, $data);
    }
	
	

}

?>