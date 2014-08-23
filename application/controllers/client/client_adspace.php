<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_adspace extends CI_Controller
 {

	function __construct() 
	{
        parent::__construct();
		
     
    }
	function adspace_view()
	{
		
		 $this->load->view(CLIENT_ADS_VIEW);
	}
		
	
}
