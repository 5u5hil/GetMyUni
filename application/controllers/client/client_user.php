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
    
    function social_login()
    {
        $json_array['error'] = 'error';
        $json_array['msg'] = 'Something Went Wrong!';
        $data = $this->input->post();     
        if(isset($data['social_type']) && $data['email'])
        {
            $create_user = $this->social_save($data['social_type'],$data);
            $json_array['error'] = 'success';
            $json_array['msg'] = 'success';
            $json_array['type'] = $data['social_type'];
            $json_array['redirect_path'] = $create_user['redirect_path'];
        }
        echo json_encode($json_array);
    }
    
    function social_save($type,$data)
    {
        $responce_array = array('error'=>'error','type'=>$type,'redirect_path'=>'');
        if($data['email'])
        {
            
            $this->model->email = $data['email'];
            $user_data  = $this->model->getUserData();
            $industry_id = $data['industry_id'] = ($data['industry'] ? $this->get_industry($data['industry']):'');
            //$functionality_id = $this->get_functionality($data['']);
            $company = $data['company'] = ($data['position'] ? $data['position']['values'][0]['company']['name'] : ''); 
            $fileName = '';
            if(isset($data['profile_pic']) && $data['profile_pic'])
            {
                /*$url = $data['profile_pic'];
                $image_data = file_get_contents($url);
                $fileName = $data['profile_id'].'_'.$type.'.jpg';
                $save_path = $_SERVER['DOCUMENT_ROOT'].'/public/admin/scripts/plugins/uploads/eventimg/';
                $save_image = file_put_contents($save_path.$fileName, $image_data);*/
                $fileName = json_encode($data['profile_pic']);
            }
            
            
            $profile_pic = $data['profile_pic'] = $fileName;
            $public_profile_url = $data['public_profile_url'];
            $dob = @($data['dob'] ? date('Y-m-d',strtotime($data['dob'])) : '');
            $gender = ($data['gender'] == 'female' ? 'F' : 'M');
            $name = $data['name'] = $data['first_name'].' '.$data['last_name'];
            //display($data);
            if(!$user_data)
            {
                // pre login
                $redirect_path = SITE_URL.'user/pre-login-view';
                $pre_register_data = array(
                'full_name' => $name,
                'email' => $data['email'],
                'industry_id' => $industry_id,
                'dob' => $dob,
                'gender' => $gender,
                'company'    => $company,
                'profile_id' => $data['profile_id'],
                'profile_pic' => $profile_pic,
                'public_profile_url' => $public_profile_url,
                'profile_type' => $type,
                );
                $this->session->set_userdata($pre_register_data);
            }
            else
            {
                //display($_SERVER);
                //display($user_data);
                //update user
                $redirect_path = SITE_URL;
                $http_ref = explode('/',$_SERVER['HTTP_REFERER']);
                //echo '--->'.$http_ref[(count($http_ref)-2)];
                if(isset($_SERVER['HTTP_REFERER']) &&  $http_ref[count($http_ref)-2] != 'user')
                {
                    $redirect_path = 'reload';
                }
                
                $data['interested_degree_id'] = $user_data->interested_degree_id;
                $data['interested_field_id'] = $user_data->interested_field_id;
                $data['interested_domain_id'] = $user_data->interested_domain_id;
                $data['country_id'] = $user_data->country_id;
                $data['preferred_destination'] = $user_data->preferred_destination;
                $this->model->user_id = $user_data->id;
                $save_user = $this->model->save_user($data); 
                $user_session_data = array(
                    'client_user_id' => $user_data->id,
                    'client_email' => $data['email'],
                );
                $this->session->set_userdata($user_session_data);
            }
            $responce_array = array('error'=>'error','type'=>$type,'redirect_path'=>$redirect_path);
            
            
        }
        //display($this->session->all_userdata());
        return $responce_array;
    }
    
    function facebook_login($data)
    {
        $responce_array = array('error'=>'error','redirect_path'=>'');
        if($data['email'])
        {
            
        }
        return $responce_array;
    }
    
    function get_industry($industry)
    {
        $industry = $this->model->get_industry($industry);
        return $industry->id; 
    }
    
    function get_functionality()
    {
        
    }
	
	

}

?>