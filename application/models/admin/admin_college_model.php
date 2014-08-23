<?php
if(!defined('BASEPATH')) exit('You do not have access');
class Admin_college_Model extends CI_Model{
		
	function get_college_degree()
	{
		 $query = $this->db->get('master_degree');
		 
		 if($query->num_rows==0)
		{
			return "no";
			
		}
		else
		{
			$ans = $query->result_array();
			return $ans;
		}
		
	}	
	
	function field_of_study()
	{
		$query = $this->db->get('field_of_study');
		
		 if($query->num_rows==0)
		{
			return "no";
			
		}
		else
		{
			$ans = $query->result_array();
			return $ans;
		}
		
		
	}	
	
	
	function get_topsectors()
	{
		$query = $this->db->get('master_top_sectors');
		
		 if($query->num_rows==0)
		{
			return "no";
			
		}
		else
		{
			$ans = $query->result_array();
			return $ans;
		}
		
		
	}	
	
	function get_majors_domains()
	{
	    $query = $this->db->get('master_majors_domains');
		 if($query->num_rows==0)
		{
			return "no";
			
		}
		else
		{
			$ans = $query->result_array();
			return $ans;
		}
		
		
	}	
	
	function get_master_country()
	{
		$query = $this->db->get('country');
		 if($query->num_rows==0)
		{
			return "no";
			
		}
		else
		{
			$ans = $query->result_array();
			return $ans;
		}
		
		
	}	
	
	function get_program_name()
	{
		$query = $this->db->get('master_program_name');
		 if($query->num_rows==0)
		{
			return "no";
			
		}
		else
		{
			$ans = $query->result_array();
			return $ans;
		}
		
		
	}

	function get_program_type()
	{
		$query = $this->db->get('master_program_type');
		 if($query->num_rows==0)
		{
			return "no";
			
		}
		else
		{
			$ans = $query->result_array();
			return $ans;
		}
		
		
	}	
	
	
	function insert_school_info($ans)
	{
		
		$data = array
		(		'school_name'=>$ans['school_name'],
				'email_domain'=>$ans['email_domain'],
				'degree'=>$ans['degree'],
				'field_study'=>$ans['field_of_study'],
				'address'=>$ans['address'],
				'zipcode'=>$ans['zipcode'],	
				'country'=>$ans['country'],
				'website'=>$ans['website'],
				'avg_tution'=>$ans['avg_tution'],
				'rank'=>$ans['rank'],
				'acc_rate'=>$ans['acceptance_rate'],	
				'test_score'=>$ans['test_score'],
				'avg_test_score'=>$ans['avg_test_score'],
				'work_exp'=>$ans['avg_work_exp'],
				'inter_stud'=>$ans['int_student'],
				'gender_dist'=>$ans['gender_distribution'],
				'acco_mod'=>$ans['accomodation'],
				'percentage_job'=>$ans['percentage_job'],
				'avg_salary'=>$ans['avg_salary'],
				//'top_sectors'=>$ans['top_sectors'],	
				'gmat_score'=>$ans['gmat_scores'],
				'resume'=>$ans['work_exp'],
				'app_essay'=>$ans['application_essay'],
				'interview'=>$ans['interviews'],
				'transcript'=>$ans['transcripts'],
				'college_logo'=>json_encode($ans['college_logo'])
				
		);
		
			
			if($ans['hidden_college_id'] == "")
			{
				
			$this->db->where('school_name');
			$this->db->insert('college_info',$data);
			$this->db->select_max('id');
			$query = $this->db->get('college_info');
			$id = $query->result_array();
			$count_dom = count($ans['domains']);
			
			for($i=0;$i<=$count_dom-1;$i++)
			{
			
					$data = array
					(		'college_id'=>$id[0]['id'],
							'domain_id'=>$ans['domains'][$i]
							
					);
				$this->db->insert('college_has_domain',$data);
			}
			
			$count = count($ans['program_name']);
			
			for($i=0;$i<=$count-1;$i++)
			{
			$data = array
			(		'college_id'=>$id[0]['id'],
				'program_name_id'=>$ans['program_name'][$i],
				'program_legth'=>$ans['program_length'][$i],
				'program_type_id'=>$ans['program_type'][$i],
				'program_size'=>$ans['program_size'][$i]
				
			);
			$this->db->insert('college_has_program',$data);
			}
			
			$count = count($ans['top_sectors']);
			
			for($i=0;$i<=$count-1;$i++)
			{
			$data = array
			(		'college_id'=>$id[0]['id'],
				'topsector_id'=>$ans['top_sectors'][$i]

			);
			$this->db->insert('college_has_topsectors',$data);
			}
			}
			
			else
			{
				$this->db->where('id',$ans['hidden_college_id']);
				$this->db->update('college_info', $data); 
			}
			
	}		
	
	function get_school_name()
	{
		$query = $this->db->get('college_info');
		 if($query->num_rows==0)
		{
			return "no";
			
		}
		else
		{
			$ans = $query->result_array();
			return $ans;
		}
		
	}
	

	
}
?>
