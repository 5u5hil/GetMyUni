<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_news extends CI_Controller
 {

	function __construct() 
	{
        parent::__construct();
		
     
    }
	function news_view()
	{
		
		 $this->load->view(CLIENT_NEWS_VIEW);
	}
		
	
}
