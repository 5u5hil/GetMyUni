<?php 
class Client_news_Model extends CI_Model {

	public function __construct()
	{
	
		$this->load->database();
	
	}
	
	
	public function get_all_news()
	{
		$this->db->order_by("date_time", "desc");
		$this->db->limit(10);
		$query = $this->db->get('news');
		
        if ($query->num_rows == 0) {
            return "no";
        } else {
            return $query->result_array();
        }
	}
	
	
	public function get_all_news_country()
	{
	
			$this->db->distinct();
			$this->db->select('country');
			$query = $this->db->get('news');
			if ($query->num_rows == 0) {
				return "no";
			} else {
				return $query->result_array();
			}
	
	}
	
	
	
	public function get_all_news_paper()
	{
	
			$this->db->distinct();
			$this->db->select('source');
			$query = $this->db->get('news');
			if ($query->num_rows == 0) {
				return "no";
			} else {
				return $query->result_array();
			}
	
	}
	
	
	public function get_all_country_news_paper($country_name)
	{
	
	if($country_name=='All')
	{
	$this->db->distinct();
		$this->db->select('source');
		$query = $this->db->get('news');
		
		// echo $this->db->last_query(); die;
			if ($query->num_rows == 0) {
				return "no";
			} else {
				return $query->result_array();
			}
	
	
	}
	else
	{
		$this->db->distinct();
		$this->db->select('source');
		$this->db->where('country', $country_name);
		$query = $this->db->get('news');
		
		// echo $this->db->last_query(); die;
			if ($query->num_rows == 0) {
				return "no";
			} else {
				return $query->result_array();
			}
	}
	}
	
	
	public function get_all_country_news($country_name)
	{
	
	if($country_name=='All')
	{
	$this->db->order_by("date_time", "desc");
	
		$this->db->limit(20);
		$query = $this->db->get('news');
		
        if ($query->num_rows == 0) {
            return "no";
        } else {
            return $query->result_array();
        }
	
	}
	else
	{
		$this->db->order_by("date_time", "desc");
		$this->db->where('country', $country_name);
		$this->db->limit(20);
		$query = $this->db->get('news');
		
        if ($query->num_rows == 0) {
            return "no";
        } else {
            return $query->result_array();
        }
	}
	
	}
	
	public function get_news_paper_topic($paper_name,$country_name)
	{
	if(!empty($paper_name))
	{
	$p_name = explode(',',$paper_name);
		$this->db->order_by("date_time", "desc");
		for($i=0; $i<count($p_name);$i++)
		{
		$this->db->or_where('source', $p_name[$i]); //$this->db->where('(id = "abc" and id LIKE %"abc"%)');
		}
		$this->db->limit(20);
		$query = $this->db->get('news');
        if ($query->num_rows == 0) {
            return "no";
        } else {
            return $query->result_array();
        }
	}
	else
	{
	    $this->db->order_by("date_time", "desc");
	    $this->db->limit(20); 
			if($country_name!='All')
			{
			$this->db->where('country', $country_name);
			}
		$query = $this->db->get('news');
        if ($query->num_rows == 0)
			 {
                     return "no";
       		 }
			 else
			 {
           			 return $query->result_array();
       		 }
	
	} 
	
	}
	
	}
	

	?>