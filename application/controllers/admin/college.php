<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class College extends CI_Controller {

	function __construct() {
        parent::__construct();
		
       $this->load->model('admin/admin_college_model');
	   $this->load->model('client/client_college_model','model');
           if(!session("client_user_id") || session("client_type") != "admin_user")
            {
                 redirect(SITE_URL."admin");
            }
           
    }
	
    function college_list()
    {
            $data['get_college_name']                                           = $this->admin_college_model->get_school_name();
         $this->load->view(ADMIN_COLLEGE_LIST_VIEW,$data);
    }
	
	 function index()
    {
       // $data['get_college_name'] 						= $this->admin_college_model->get_school_name();
       //  $this->load->view(ADMIN_COLLEGE_LIST_VIEW,$data);
      
            $data['get_college_name']                                           = $this->admin_college_model->get_school_name();
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

    function add_edit()
    {
		
		 $data['get_degree'] 												= $this->admin_college_model->get_college_degree();
		 $data['get_field'] 												= $this->admin_college_model->field_of_study();
		 $data['get_domain']											    = $this->admin_college_model->get_majors_domains();
		 $data['get_country'] 												= $this->admin_college_model->get_master_country();
		 $data['get_program_name'] 											= $this->admin_college_model->get_program_name();
		 $data['get_program_type'] 					 						= $this->admin_college_model->get_program_type();
		 $data['get_topsectors']											= $this->admin_college_model->get_topsectors();
		 $id                                                       		    = $this->uri->segment(4);
		 
		 $this->model->row                                               	= TRUE;
		 $this->model->college_id                                       	= $id;
		 $data['get_college']                                               = $this->model->get_college();
                 $data['get_college_program']                                       = $this->model->get_college_program_new();
                 $data['get_college_top_sector']                                     = $this->model->get_college_top_sector();
		// if($data['get_college'])
		 $this->load->view(ADMIN_COLLEGE_ADD_EDIT_VIEW,$data);	
			//else
			//echo 'show data not found';
    }

    function validate_form()
    {
        $this->load->library('form_validation');
        $form_field                                                         = $_POST;
        if(!$form_field)
        redirect(SITE_URL.'admin/college');
        $json_array                                                         = array();
        foreach($form_field as $key => $value)
        {
            if($key != 'hidden_college_id' && $key != "website" && $key != "avg_test_score" && $key != "int_student" && $key != "gender_distribution" && $key != "email_domain" && $key != "course_overview" && $key != "admission_procedure" && $key != "scholarships" && $key != "careers" && $key != "program_link" && $key != "quant_ability" && $key != "verbal_ability" && $key != "key_eligibility")
            {
				
		$this->form_validation->set_rules($key,$key,'required');
					
            }
            
        }

        if ($this->form_validation->run() == FALSE)
        {
            $json_array['error']                                               	= 'error';
            foreach($form_field as $key => $value)
            { 
		$json_array[$key.'_err']        = form_error($key);
            }
        }
        else
        {
                      $query = $this->db->select("id")
                              ->from("college_info")
                              ->where("school_name", $this->input->post('school_name'))
                              ->where("degree",$this->input->post('degree'))
                              ->where("field_study",$this->input->post('field_of_study'))
                                ->get();

                          $count= count($query->result_array());
                         /* if($count == 1)
                          {
                              $json_array['error']                                    = 'exist';
                              
                          }
                          else
                          {*/
            
			$json_array['error']                                    = 'success';
			$ans                                                    = $this->input->post();
			
			//display($ans);
			$this->load->model('admin/admin_college_model');
			$this->admin_college_model->insert_school_info($ans);
                       
                         // }
			//echo 1;
        }
        echo json_encode($json_array);
    }
    
    
    
    function delete_college_info()
    {
        $id = $this->input->post('id');
        $total_ass = $this->admin_college_model->get_associat_college_count($id);
       // display($total_ass);
        if($total_ass != 0)
        {
            
           echo "error";
        }
         else   
             
        { 
                echo "success";
			
                $this->admin_college_model->delete_master_college_info($id);
     
        }
        
    }
	
}
