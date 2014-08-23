<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_User extends CI_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->model('client/client_user_model', 'model');
    }


	function validate_admin_user() {
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
            if ($get_user->status == 1 && $get_user->user_type == "admin_user") {
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
}
