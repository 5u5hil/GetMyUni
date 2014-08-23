<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_home extends CI_Controller
 {

	function __construct() 
	{
        parent::__construct();
		$this->load->model('client/client_college_model','model');
     
    }
	function home_view()
	{
		 $data['get_field'] 												= $this->model->field_of_study();
		 $data['get_domain']											    = $this->model->get_majors_domains();
		 $data['get_country'] 												= $this->model->get_master_country();
		 $this->load->view(CLIENT_COLLEGE_HOME_VIEW,$data);
	}
		
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */