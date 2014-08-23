<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_Student_Signup extends CI_Controller
 {

	function __construct() 
	{
        parent::__construct();
		$this->load->model('client/client_signup_model');
     
    }
	function signup_view()
	{
		
		 $this->load->view(CLIENT_SIGNUP_LOGIN_VIEW);
	}
	
	function signup_popup_view()
	{
		
		 $this->load->view(CLIENT_SIGNUP_POPUP_VIEW);
	}
        
        
        function student_pre_view()
	{
		
		 $this->load->view(CLIENT_STUDENT_PRE_PROFILE_VIEW);
	}
        
        function student_details_view()
	{
		
		 $this->load->view(CLIENT_STUDENT_DETAILS_VIEW);
	}
        
	
	   function signup_form_validate()
    {
        $this->load->library('form_validation');
        $form_field                                                         = $_POST;
        if(!$form_field)
        redirect(SITE_URL.'client/client_student_signup');
        $json_array                                                         = array();
        foreach($form_field as $key => $value)
        {
           
			$this->form_validation->set_rules($key,$key,'required');
			
			if($key == "password")
			
				$this->form_validation->set_rules($key,$key,'required|matches[confirm_password]');
			
        }

        if ($this->form_validation->run() == FALSE)
        {
			
		
            $json_array['error']                                               	= 'error';
            foreach($form_field as $key => $value)
            { 
				
				$json_array[$key.'_err']                                = form_error($key);
            }
        }
        else
        {
			$json_array['error']												= 'success';
			$ans																= $this->input->post();
			display($ans);
			$this->load->model('client/client_signup_model');
			$this->client_signup_model->insert_student_signup_info($ans);
				echo 1;
			
        }
        echo json_encode($json_array);
    }
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */