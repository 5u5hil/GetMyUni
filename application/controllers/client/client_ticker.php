<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_ticker extends CI_Controller
 {

	function __construct() 
	{
        parent::__construct();
		
     
    }
	function ticker_view()
	{
		
		 $this->load->view(CLIENT_TICKER_VIEW);
	}
		
	
}
