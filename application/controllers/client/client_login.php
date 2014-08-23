<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_Login extends CI_Controller
 {

	function __construct() 
	{
        parent::__construct();
		$this->load->model('client/client_login_model');
     
    }
	   function login_validate()
    {
        $this->load->library('form_validation');
        $form_field                                                         = $_POST;
        if(!$form_field)
        redirect(SITE_URL.'client/client_login_model');
        $json_array                                                         = array();
        foreach($form_field as $key => $value)
        {
           
			$this->form_validation->set_rules($key,$key,'required');
			
        }

        if ($this->form_validation->run() == FALSE)
        {
			
		
            $json_array['error']                                               	= 'error';
            foreach($form_field as $key => $value)
            { 
				
				$json_array[$key.'_err']                                		= form_error($key);
            }
        }
        else
        {
			$json_array['error']												= 'success';
			$ans																= $this->input->post();
			$this->load->model('client/client_login_model');
			$this->client_login_model->client_login($ans);
			$login_data															= $this->client_login_model->client_login($ans);
			$login_info = array(
							'id'=>$login_data[0]['id'],
							'name'=>$login_data[0]['full_name'],
							'email'=>$login_data[0]['email']
			
			);
			
			$this->session->set_userdata('login_info',$login_info);
		
        }
        echo json_encode($json_array);
    }
	
	
}
