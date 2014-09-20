<?php
if(!defined('BASEPATH')) exit('You do not have access');
class Admin_Master_Model extends CI_Model{
		
	/******************* Master Degree **********************/
	function insert_master_degree_info($ans)
	{
	
		$data = array
		(		
				'degree_name'=>$ans['master_degree'],
				'status'=>1,
                                 'added_by'=>session('client_user_name'),

		);
		
			
			if($ans['hidden_master_deree_id'] == "")
			{
			
				$this->db->insert('master_degree',$data);
			}
		
			else
			{
				$this->db->where('id',$ans['hidden_master_deree_id']);
				$this->db->update('master_degree', $data); 
				
			}
			
	}	
        
        function get_master_degree_info()
        {
            $query = $this->db->select('id,degree_name,status')
                     ->from("master_degree")
                     ->where("status",1)
                     ->get();
		 if($query->num_rows ==0)
		{
			return "no";
			
		}
		else
		{
			$ans = $query->result_array();
			return $ans;
		}
            
            
        }
        
        function get_master_degree($id)
        {
            $query = $this->db->select('id,degree_name,status')
                     ->from("master_degree")
                     ->where("id",$id)
                     ->get();
		
            return $query->row();
		
            
        }
        
        function get_associat_degree_count($id)
        {
            $query = $this->db->select('id')
                     ->from("college_info")
                     ->where("degree",$id)
                     ->get();
		
            $count = $query->num_rows();
           
            $query = $this->db->select('id')
                     ->from("user")
                     ->where("interested_degree_id",$id)
                     ->get();
            $count1 = $query->num_rows();
            
             $query = $this->db->select('id')
                     ->from("user_education_info")
                     ->where("degree",$id)
                     ->get();
            $count2 = $query->num_rows();
            
            return $total_count = ($count + $count1 + $count2);
        }
        
        
        function delete_master_degree_info($id)
        {
          $data = array(
               'status' => 0
             
            );

            $this->db->where('id', $id);
            $this->db->update('master_degree', $data); 
        }
	
        /******************* Master Degree **********************/
        
        
        /******************* Master field **********************/
        
        
        function insert_master_field_study_info($ans)
	{
	
		$data = array
		(		
				'field_name'=>$ans['master_field_study'],
				'status'=>1,
                                 'added_by'=>session('client_user_name'),

		);
		
			
			if($ans['hidden_master_field_study_id'] == "")
			{
			
				$this->db->insert('field_of_study',$data);
			}
		
			else
			{
				$this->db->where('id',$ans['hidden_master_field_study_id']);
				$this->db->update('field_of_study', $data); 
				
			}
			
	}	
        
        
          function get_master_field_study_info()
        {
            $query = $this->db->select('id,field_name,status')
                     ->from("field_of_study")
                     ->where("status",1)
                     ->get();
		 if($query->num_rows ==0)
		{
			return "no";
			
		}
		else
		{
			$ans = $query->result_array();
			return $ans;
		}
            
            
        }
        
        
          function get_master_field_study($id)
        {
            $query = $this->db->select('id,field_name,status')
                     ->from("field_of_study")
                     ->where("id",$id)
                     ->get();
		
            return $query->row();
		
            
        }
        
        
        
         function get_associat_filed_count($id)
        {
            $query = $this->db->select('id')
                     ->from("college_info")
                     ->where("field_study",$id)
                     ->get();
		
            $count = $query->num_rows();
           
            $query = $this->db->select('id')
                     ->from("user")
                     ->where("interested_field_id",$id)
                     ->get();
            $count1 = $query->num_rows();
            
              $query = $this->db->select('id')
                     ->from("user_education_info")
                     ->where("field_study",$id)
                     ->get();
            $count2 = $query->num_rows();
            
            return $total_count = ($count + $count1 + $count2);
        }
        
        function delete_master_filed_info($id)
        {
          $data = array(
               'status' => 0
             
            );

            $this->db->where('id', $id);
            $this->db->update('field_of_study', $data); 
        }
	
        
        
         /******************* Master field **********************/
        
        
        
        /******************* Master domain **********************/
        
        
        function insert_master_domain_info($ans)
	{
	
		$data = array
		(		
				'domains_name'=>$ans['master_domain_name'],
				'status'=>1,
                                 'added_by'=>session('client_user_name'),

		);
		
			
			if($ans['hidden_master_domain_id'] == "")
			{
			
				$this->db->insert('master_majors_domains',$data);
			}
		
			else
			{
				$this->db->where('id',$ans['hidden_master_domain_id']);
				$this->db->update('master_majors_domains', $data); 
				
			}
			
	}	
        
        
          function get_master_domain_info()
        {
            $query = $this->db->select('id,domains_name,status')
                     ->from("master_majors_domains")
                     ->where("status",1)
                     ->get();
		 if($query->num_rows ==0)
		{
			return "no";
			
		}
		else
		{
			$ans = $query->result_array();
			return $ans;
		}
            
            
        }
        
        
          function get_master_domain($id)
        {
            $query = $this->db->select('id,domains_name,status')
                     ->from("master_majors_domains")
                     ->where("id",$id)
                     ->get();
		
            return $query->row();
		
            
        }
        
        
        
         function get_associat_domain_count($id)
        {
            $query = $this->db->select('id')
                     ->from("college_has_domain")
                     ->where("domain_id",$id)
                     ->get();
		
            $count = $query->num_rows();
           
            $query = $this->db->select('id')
                     ->from("user")
                     ->where("interested_domain_id",$id)
                     ->get();
            $count1 = $query->num_rows();
            
             
            
            return $total_count = ($count + $count1);
        }
        
        function delete_master_domain_info($id)
        {
          $data = array(
               'status' => 0
             
            );

            $this->db->where('id', $id);
            $this->db->update('master_majors_domains', $data); 
        }
	
        
        
         /******************* Master field **********************/
        
        
        
        /******************* Master country **********************/
	function insert_master_country_info($ans)
	{
	
		$data = array
		(		
				'country_name'=>$ans['master_country'],
				'status'=>1,
                                'added_by'=>session('client_user_name'),

		);
		
			
			if($ans['hidden_master_country_id'] == "")
			{
			
				$this->db->insert('country',$data);
			}
		
			else
			{
				$this->db->where('country_id',$ans['hidden_master_country_id']);
				$this->db->update('country', $data); 
				
			}
			
	}	
        
        function get_master_country_info()
        {
            $query = $this->db->select('country_id,country_name,status')
                     ->from("country")
                     ->where("status",1)
                     ->get();
		 if($query->num_rows ==0)
		{
			return "no";
			
		}
		else
		{
			$ans = $query->result_array();
			return $ans;
		}
            
            
        }
        
        function get_master_country($id)
        {
            $query = $this->db->select('country_id,country_name,status')
                     ->from("country")
                     ->where("country_id",$id)
                     ->get();
		
            return $query->row();
		
            
        }
        
        function get_associat_country_count($id)
        {
            $query = $this->db->select('id')
                     ->from("college_info")
                     ->where("country",$id)
                     ->get();
		
            $count = $query->num_rows();
           
          
            
             $query = $this->db->select('id')
                     ->from("user")
                     ->where("country_id",$id)
                     ->get();
            $count1 = $query->num_rows();
            
            return $total_count = ($count + $count1 );
        }
        
        
        function delete_master_country_info($id)
        {
          $data = array(
               'status' => 0
             
            );

            $this->db->where('country_id', $id);
            $this->db->update('country', $data); 
        }
	
        /******************* Master country**********************/
        
        /******************* Master Progran Name **********************/
	function insert_master_progran_name_info($ans)
	{
	
		$data = array
		(		
				'program_name'=>$ans['master_program_name'],
				'status'=>1,
                                 'added_by'=>session('client_user_name'),

		);
		
			
			if($ans['hidden_master_program_name_id'] == "")
			{
			
				$this->db->insert('master_program_name',$data);
			}
		
			else
			{
				$this->db->where('id',$ans['hidden_master_program_name_id']);
				$this->db->update('master_program_name', $data); 
				
			}
			
	}	
        
        function get_master_program_name_info()
        {
            $query = $this->db->select('id,program_name,status')
                     ->from("master_program_name")
                     ->where("status",1)
                     ->get();
		 if($query->num_rows ==0)
		{
			return "no";
			
		}
		else
		{
			$ans = $query->result_array();
			return $ans;
		}
            
            
        }
        
        function get_master_program_name($id)
        {
            $query = $this->db->select('id,program_name,status')
                     ->from("master_program_name")
                     ->where("id",$id)
                     ->get();
		
            return $query->row();
		
            
        }
        
        function get_associat_program_name_count($id)
        {
            $query = $this->db->select('id')
                     ->from("college_has_program")
                     ->where("program_name_id",$id)
                     ->get();
		
            $count = $query->num_rows();
           
            return $total_count = ($count);
        }
        
        
        function delete_master_program_name_info($id)
        {
          $data = array(
               'status' => 0
             
            );

            $this->db->where('id', $id);
            $this->db->update('master_program_name', $data); 
        }
	
        /******************* Master country**********************/
        
        
        
       /******************* Master Top **********************/
	function insert_master_top_info($ans)
	{
	
		$data = array
		(		
				'top_sectors'=>$ans['master_top_name'],
				'status'=>1,
                                 'added_by'=>session('client_user_name'),

		);
		
			
			if($ans['hidden_master_top_id'] == "")
			{
			
				$this->db->insert('master_top_sectors',$data);
			}
		
			else
			{
				$this->db->where('id',$ans['hidden_master_top_id']);
				$this->db->update('master_top_sectors', $data); 
				
			}
			
	}	
        
        function get_master_top_info()
        {
            $query = $this->db->select('id,top_sectors,status')
                     ->from("master_top_sectors")
                     ->where("status",1)
                     ->get();
		 if($query->num_rows ==0)
		{
			return "no";
			
		}
		else
		{
			$ans = $query->result_array();
			return $ans;
		}
            
            
        }
        
        function get_master_top($id)
        {
            $query = $this->db->select('id,top_sectors,status')
                     ->from("master_top_sectors")
                     ->where("id",$id)
                     ->get();
		
            return $query->row();
		
            
        }
        
        function get_associat_top_count($id)
        {
            $query = $this->db->select('id')
                     ->from("college_has_topsectors")
                     ->where("topsector_id",$id)
                     ->get();
		
            $count = $query->num_rows();
           
            return $total_count = ($count);
        }
        
        
        function delete_master_top_info($id)
        {
          $data = array(
               'status' => 0
             
            );

            $this->db->where('id', $id);
            $this->db->update('master_top_sectors', $data); 
        }
	
        /******************* Master country**********************/
        
        
         /******************* Master forum **********************/
	function insert_master_forum_info($ans)
	{
	
		$data = array
		(		
				'fname'=>$ans['master_forum'],
				'status'=>1,
                                'added_by'=>session("client_user_name")

		);
		
			
			if($ans['hidden_master_forums_id'] == "")
			{
			
				$this->db->insert('master_forums',$data);
                                $last_id = $this->db->insert_id();
                                insert_forum_notification($last_id,$ans['master_forum']);
 			}
		
			else
			{
				$this->db->where('id',$ans['hidden_master_forums_id']);
				$this->db->update('master_forums', $data); 
				
			}
			
	}	
        
        function get_master_forum_info()
        {
            $query = $this->db->select('id,fname,status')
                     ->from("master_forums")
                     ->where("status",1)
                     ->get();
		 if($query->num_rows ==0)
		{
			return "no";
			
		}
		else
		{
			$ans = $query->result_array();
			return $ans;
		}
            
            
        }
        
        function get_master_forum($id)
        {
            $query = $this->db->select('id,fname,status')
                     ->from("master_forums")
                     ->where("id",$id)
                     ->get();
		
            return $query->row();
		
            
        }
        
        function get_associat_forum_count($id)
        {
            $query = $this->db->select('id')
                     ->from("user_forum_topics")
                     ->where("forum_id",$id)
                     ->get();
		
            $count = $query->num_rows();
           
            return $total_count = ($count);
        }
        
        
        function delete_master_forum_info($id)
        {
          $data = array(
               'status' => 0
             
            );

            $this->db->where('id', $id);
            $this->db->update('master_forums', $data); 
        }
	
        /******************* Master country**********************/
        
        
}
?>
