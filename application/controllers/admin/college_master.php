<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class College_master extends CI_Controller {

	function __construct() {
        parent::__construct();
		
       $this->load->model('admin/admin_college_model');
       $this->load->model('client/client_college_model','model');
       $this->load->model('admin/admin_master_model');
         if(!session("client_user_id") || session("client_type") != "admin_user")
            {
                 redirect(SITE_URL."admin");
            }
           
    }
	
    function index()
    {
		 $data['get_college_name'] 											= $this->admin_college_model->get_school_name();
         $this->load->view(ADMIN_COLLEGE_LIST_VIEW,$data);
    }
	
	 function master_degree_add_edit()
    {
		 $data['get_master_degree'] 				= $this->admin_master_model->get_master_degree($this->uri->segment(4));
		 $this->load->view(ADMIN_MASTER_DEGREE_ADD_EDIT_VIEW,$data);	
			
    }
    
     function master_degree_list_view()
    {
		 $data['get_master_degree_info'] 				= $this->admin_master_model->get_master_degree_info();
		 $this->load->view(ADMIN_MASTER_DEGREE_LIST_VIEW,$data);	
			
    }
	
	 function master_field_add_edit()
    {
		 $data['get_master_field_study']                                =$this->admin_master_model->get_master_field_study($this->uri->segment(4));
		 $this->load->view(ADMIN_MASTER_FIELD_ADD_EDIT_VIEW,$data);	
			
    }
    
     function master_field_list_view()
    {
		 $data['get_master_field_study_info']                           =$this->admin_master_model->get_master_field_study_info();
		 $this->load->view(ADMIN_MASTER_FIELD_LIST_VIEW,$data);	
			
    }
	
	 function master_domain_add_edit()
    {
		 $data['get_master_domain_info']                                =$this->admin_master_model->get_master_domain($this->uri->segment(4));
		 $this->load->view(ADMIN_MASTER_DOMAIN_ADD_EDIT_VIEW,$data);	
			
    }
    
     function master_domain_list_view()
    {
		 $data['get_master_domain']                           =$this->admin_master_model->get_master_domain_info();
		 $this->load->view(ADMIN_MASTER_DOMAIN_LIST_VIEW,$data);	
			
    }
	
	 function master_country_add_edit()
    {
		 $data['get_master_country']                                =$this->admin_master_model->get_master_country($this->uri->segment(4));
		 $this->load->view(ADMIN_MASTER_COUNTRY_ADD_EDIT_VIEW,$data);	
			
    }
    
     function master_country_list_view()
    {
		 $data['get_master_country_info']                           =$this->admin_master_model->get_master_country_info();
		 $this->load->view(ADMIN_MASTER_COUNTRY_LIST_VIEW,$data);	
			
    }
	
	 function master_type_add_edit()
    {
		 
		 $this->load->view(ADMIN_MASTER_TYPE_ADD_EDIT_VIEW);	
			
    }
	
	 function master_name_add_edit()
    {
		 $data['get_master_program']                                =$this->admin_master_model->get_master_program_name($this->uri->segment(4));
		 $this->load->view(ADMIN_MASTER_NAME_ADD_EDIT_VIEW,$data);	
			
    }
    
     function master_name_list_view()
    {
		 $data['get_master_program_name_info']                           =$this->admin_master_model->get_master_program_name_info();
		 $this->load->view(ADMIN_MASTER_NAME_LIST_VIEW,$data);	
			
    }
    
    
    
     function master_top_add_edit()
    {
		 $data['get_master_top']                                =$this->admin_master_model->get_master_top($this->uri->segment(4));
		 $this->load->view(ADMIN_MASTER_TOP_ADD_EDIT_VIEW,$data);	
			
    }
    
     function master_top_list_view()
    {
		 $data['get_master_top_info']                           =$this->admin_master_model->get_master_top_info();
		 $this->load->view(ADMIN_MASTER_TOP_LIST_VIEW,$data);	
			
    }
    
    
    
     function master_forum_add_edit()
    {
		 $data['get_master_forum']                                =$this->admin_master_model->get_master_forum($this->uri->segment(4));
		 $this->load->view(ADMIN_MASTER_FORUM_ADD_EDIT_VIEW,$data);	
			
    }
    
     function master_forum_list_view()
    {
		 $data['get_master_forum_info']                           =$this->admin_master_model->get_master_forum_info();
		 $this->load->view(ADMIN_MASTER_FORUM_LIST_VIEW,$data);	
			
    }
    
   /******************* Master Degree *******************/ 
    
    function master_degree_validation()
    {
        
        $this->load->library('form_validation');
        $form_field                                                             = $_POST;
        if(!$form_field)
        redirect(SITE_URL.'admin/college');
        $json_array                                                             = array();
       		
	$this->form_validation->set_rules('master_degree','Master Degree','required|is_unique[master_degree.degree_name]');
					
          

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
			
			
			$this->admin_master_model->insert_master_degree_info($ans);

        }
        echo json_encode($json_array);
    }

    
    function delete_master_degree()
    {
        $id = $this->input->post('id');
        $total_ass = $this->admin_master_model->get_associat_degree_count($id);
       // display($total_ass);
        if($total_ass != 0)
        {
            
           echo "error";
        }
         else   
             
        { 
                echo "success";
			
                $this->admin_master_model->delete_master_degree_info($id);
     
        }
        
    }
    
    /******************* Master Degree *******************/   
    
    
       /******************* Master Field Of study  *******************/ 
    
    function master_field_study_validation()
    {
        
        $this->load->library('form_validation');
        $form_field                                                             = $_POST;
        if(!$form_field)
        redirect(SITE_URL.'admin/college');
        $json_array                                                             = array();
       		
	$this->form_validation->set_rules('master_field_study','Field Of Study','required|is_unique[field_of_study.field_name]');
					
          

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
			
			
			$this->admin_master_model->insert_master_field_study_info($ans);

        }
        echo json_encode($json_array);
    }

    
    function delete_master_field_study()
    {
        $id = $this->input->post('id');
        $total_ass = $this->admin_master_model->get_associat_filed_count($id);
       // display($total_ass);
        if($total_ass != 0)
        {
            
           echo "error";
        }
         else   
             
        { 
                echo "success";
			
                $this->admin_master_model->delete_master_filed_info($id);
     
        }
        
    }
    
     /******************* Master Field Of study  *******************/ 
    
    
    
      /******************* Master Field Of study  *******************/ 
    
    function master_domain_validation()
    {
        
        $this->load->library('form_validation');
        $form_field                                                             = $_POST;
        if(!$form_field)
        redirect(SITE_URL.'admin/college');
        $json_array                                                             = array();
       		
	$this->form_validation->set_rules('master_domain_name','Master Domain','required|is_unique[master_majors_domains.domains_name]');
					
          

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
			
			
			$this->admin_master_model->insert_master_domain_info($ans);

        }
        echo json_encode($json_array);
    }

    
    function delete_master_domain()
    {
        $id = $this->input->post('id');
        $total_ass = $this->admin_master_model->get_associat_domain_count($id);
       // display($total_ass);
        if($total_ass != 0)
        {
            
           echo "error";
        }
         else   
             
        { 
                echo "success";
			
                $this->admin_master_model->delete_master_domain_info($id);
     
        }
        
    }
    
     /******************* Master Field Of study  *******************/ 
    
    
        
      /******************* Master country  *******************/ 
    
    function master_country_validation()
    {
        
        $this->load->library('form_validation');
        $form_field                                                             = $_POST;
        if(!$form_field)
        redirect(SITE_URL.'admin/college');
        $json_array                                                             = array();
       		
	$this->form_validation->set_rules('master_country','Country','required|is_unique[country.country_name]');
					
          

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
			
			
			$this->admin_master_model->insert_master_country_info($ans);

        }
        echo json_encode($json_array);
    }

    
    function delete_master_coutry()
    {
        $id = $this->input->post('id');
        $total_ass = $this->admin_master_model->get_associat_country_count($id);
       // display($total_ass);
        if($total_ass != 0)
        {
            
           echo "error";
        }
         else   
             
        { 
                echo "success";
			
                $this->admin_master_model->delete_master_country_info($id);
     
        }
        
    }
    
     /******************* Master country  *******************/ 
    
    
     /******************* Master program name  *******************/ 
    
    function master_program_name_validation()
    {
        
        $this->load->library('form_validation');
        $form_field                                                             = $_POST;
        if(!$form_field)
        redirect(SITE_URL.'admin/college');
        $json_array                                                             = array();
       		
	$this->form_validation->set_rules('master_program_name','Program Name','required|is_unique[master_program_name.program_name]');
					
          

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
			
			
			$this->admin_master_model->insert_master_progran_name_info($ans);

        }
        echo json_encode($json_array);
    }

    
    function delete_master_program_name()
    {
        $id = $this->input->post('id');
        $total_ass = $this->admin_master_model->get_associat_program_name_count($id);
       // display($total_ass);
        if($total_ass != 0)
        {
            
           echo "error";
        }
         else   
             
        { 
                echo "success";
			
                $this->admin_master_model->delete_master_program_name_info($id);
     
        }
        
    }
    
     /******************* Master country  *******************/ 
    
    
     /******************* Master top  *******************/ 
    
    function master_top_validation()
    {
        
        $this->load->library('form_validation');
        $form_field                                                             = $_POST;
        if(!$form_field)
        redirect(SITE_URL.'admin/college');
        $json_array                                                             = array();
       		
	$this->form_validation->set_rules('master_top_name','Topsector Name','required|is_unique[master_top_sectors.top_sectors]');
					
          

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
			
			
			$this->admin_master_model->insert_master_top_info($ans);

        }
        echo json_encode($json_array);
    }

    
    function delete_master_top()
    {
        $id = $this->input->post('id');
        $total_ass = $this->admin_master_model->get_associat_top_count($id);
       // display($total_ass);
        if($total_ass != 0)
        {
            
           echo "error";
        }
         else   
             
        { 
                echo "success";
			
                $this->admin_master_model->delete_master_top_info($id);
     
        }
        
    }
    
     /******************* Master country  *******************/ 
    
    
     /******************* Master forum  *******************/ 
    
    function master_forum_validation()
    {
        
        $this->load->library('form_validation');
        $form_field                                                             = $_POST;
        if(!$form_field)
        redirect(SITE_URL.'admin/college');
        $json_array                                                             = array();
       		
	$this->form_validation->set_rules('master_forum','Forum Name','required|is_unique[master_forums.fname]');
					
          

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
			
			
			$this->admin_master_model->insert_master_forum_info($ans);

        }
        echo json_encode($json_array);
    }

    
    function delete_master_forum()
    {
        $id = $this->input->post('id');
        $total_ass = $this->admin_master_model->get_associat_forum_count($id);
       // display($total_ass);
        if($total_ass != 0)
        {
            
           echo "error";
        }
         else   
             
        { 
                echo "success";
			
                $this->admin_master_model->delete_master_forum_info($id);
     
        }
        
    }
    
     /******************* Master forum  *******************/ 
    
    
    
  }

    
	

