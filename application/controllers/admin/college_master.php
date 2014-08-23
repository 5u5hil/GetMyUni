<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class College_master extends CI_Controller {

	function __construct() {
        parent::__construct();
		
       $this->load->model('admin/admin_college_model');
	   $this->load->model('client/client_college_model','model');
    }
	
    function index()
    {
		 $data['get_college_name'] 											= $this->admin_college_model->get_school_name();
         $this->load->view(ADMIN_COLLEGE_LIST_VIEW,$data);
    }
	
	 function master_degree_add_edit()
    {
		 
		 $this->load->view(ADMIN_MASTER_DEGREE_ADD_EDIT_VIEW);	
			
    }
	
	 function master_field_add_edit()
    {
		 
		 $this->load->view(ADMIN_MASTER_FIELD_ADD_EDIT_VIEW);	
			
    }
	
	 function master_domain_add_edit()
    {
		 
		 $this->load->view(ADMIN_MASTER_DOMAIN_ADD_EDIT_VIEW);	
			
    }
	
	 function master_country_add_edit()
    {
		 
		 $this->load->view(ADMIN_MASTER_COUNTRY_ADD_EDIT_VIEW);	
			
    }
	
	 function master_type_add_edit()
    {
		 
		 $this->load->view(ADMIN_MASTER_TYPE_ADD_EDIT_VIEW);	
			
    }
	
	 function master_name_add_edit()
    {
		 
		 $this->load->view(ADMIN_MASTER_NAME_ADD_EDIT_VIEW);	
			
    }

    
	
}
