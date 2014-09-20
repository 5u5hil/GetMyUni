<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class School_Events extends CI_Controller {

	function __construct() 
	{
        parent::__construct();
		$this->load->model('admin/admin_event_model','model');
	 if(!session("client_user_id") || session("client_type") != "admin_user")
            {
                 redirect(SITE_URL."admin");
            }
           
    }
	
	 function school_event_listing_view()
    {
		 $data['get_school_event']                          =       $this->model->get_school_event();
		 $this->load->view(ADMIN_COLLEGE_EVENT_LIST,$data);	
			
    }
	
	function school_event_add_edit_view()
    {
		 
		$data['get_school']                                               = $this->model->get_school();
                $data['get_school_event_id']                                      = $this->model->get_school_event_id($this->uri->segment(4));
		 $this->load->view(ADMIN_COLLEGE_EVENT_ADD_EDIT_VIEW,$data);	
			
    }
	
	    function event_validate_form()
    {
        $this->load->library('form_validation');
        $form_field                                                         = $_POST;
        if(!$form_field)
        redirect(SITE_URL.'admin/college');
        $json_array                                                         = array();
        foreach($form_field as $key => $value)
        {
            if($key != 'eventimg' && $key != 'hidden_event_id')
            {
				
		$this->form_validation->set_rules($key,$key,'required');
					
            }
            
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
			
			//display($ans);
			$this->load->model('admin/admin_event_model');
			$this->model->insert_school_event_info($ans);

			//echo 1;
        }
        echo json_encode($json_array);
    }
    
    
      function delete_college_event()
    {
        $id = $this->input->post('id');
       /* $total_ass = $this->admin_event_model->get_associat_forum_count($id);
       // display($total_ass);
        if($total_ass != 0)
        {
            
           echo "error";
        }
         else   
             
        { */
                echo "success";
			
                $this->model->delete_college_event_info($id);
     
        //}
        
    }

}
