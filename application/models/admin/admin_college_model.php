<?php

if(!defined('BASEPATH')) exit('You do not have access');
class Admin_college_Model extends CI_Model{
		
	function get_college_degree()
	{
              $query = $this->db->select('*')
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
	
	function field_of_study()
	{
		
                
                $query = $this->db->select('*')
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
	
	
	function get_topsectors()
	{
		
            $query = $this->db->select('*')
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
	
	function get_majors_domains()
	{
	    
                
                $query = $this->db->select('*')
                     ->from("master_majors_domains")
                     ->where("status",1)
                     ->order_by("domains_name",'asc')
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
	
	function get_master_country()
	{
		
                  $query = $this->db->select('*')
                     ->from("country")
                     ->where("status",1)
                     ->order_by("country_name",'asc')
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
	
	function get_program_name()
	{
		
                
                 $query = $this->db->select('*')
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

	function get_program_type()
	{
		
                   $query = $this->db->select('*')
                     ->from("master_program_type")
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
	
	
	function insert_school_info($ans)
	{    if (isset($ans['college_logo'])) {

            $profile_pic = json_encode($ans['college_logo']);
        } else {
            $profile_pic = "";
        }
        
        
           if (isset($ans['college_doc'])) {

            $college_pic = json_encode($ans['college_doc']);
        } else {
            $college_pic = "";
        }

		
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
				//'gmat_score'=>$ans['gmat_scores'],
				//'resume'=>$ans['work_exp'],
				//'app_essay'=>$ans['application_essay'],
				//'interview'=>$ans['interviews'],
				//'transcript'=>$ans['transcripts'],
				'college_logo'=>$profile_pic,
                                'document'=>$college_pic,
                                'course_overview'=>$ans['course_overview'],
                                'admission_procedure'=>$ans['admission_procedure'],
                                'scholarships'=>$ans['scholarships'],
                                'careers'=>$ans['careers'],
                                'verbal_ability'=>$ans['verbal_ability'],
                                'quant_ability'=>$ans['quant_ability'],
                                'key_eligibility'=>$ans['key_eligibility'],
                                'status'=>1,
                                'added_by'=>session('client_user_name'),
				
		);
		
                         
                        
                   	if($ans['hidden_college_id'] == "")
			{
				
			$this->db->where('school_name');
			$this->db->insert('college_info',$data);
			$this->db->select_max('id');
                         
			$query = $this->db->get('college_info');
			$id = $query->result_array();
                        if(isset($ans['domains']))
                        {
			$count_dom = count($ans['domains']);
			
			for($i=0;$i<=$count_dom-1;$i++)
			{
			
					$data = array
					(		'college_id'=>$id[0]['id'],
							'domain_id'=>$ans['domains'][$i],
							'status'=>1
					);
				$this->db->insert('college_has_domain',$data);
			}
                        }
                        if(isset($ans['program_name']))
                        {
			$count = count($ans['program_name']);
			
			for($i=0;$i<=$count-1;$i++)
			{
                            
			$data = array
			(		'college_id'=>$id[0]['id'],
				'program_name_id'=>$ans['program_name'][$i],
				//'program_legth'=>$ans['program_length'][$i],
				//'program_type_id'=>$ans['program_type'][$i],
				//'program_size'=>$ans['program_size'][$i],
				'program_link'=>$ans['program_link'][$i],
                                'status' => 1
			);
			$this->db->insert('college_has_program',$data);
                        }
			}
			if (isset($ans['top_sectors']))
                        {
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
                          insert_university_notification(($ans['school_name']),$id[0]['id']);  
                        }
			else
			{
                                $this->db->where('id',$ans['hidden_college_id']);
                                $this->db->update('college_info', $data); 
                                insert_university_update_notification($ans['hidden_college_id']);
                               
                                $this->db->delete('college_has_program',array('college_id' => $ans['hidden_college_id']));
                                 if(isset($ans['program_name']))
                        {
                                $count = count($ans['program_name']);
			
                            for($i=0;$i<=$count-1;$i++)
                            {

                            $data = array
                            (	'college_id'=>$ans['hidden_college_id'],
                                    'program_name_id'=>$ans['program_name'][$i],
                                    //'program_legth'=>$ans['program_length'][$i],
                                    //'program_type_id'=>$ans['program_type'][$i],
                                    //'program_size'=>$ans['program_size'][$i],
                                    'program_link'=>$ans['program_link'][$i],
                                    'status' => 1
                            );

                            $this->db->insert('college_has_program',$data);
                             }
                        }
                             $this->db->delete('college_has_domain',array('college_id' => $ans['hidden_college_id']));
                             if(isset($ans['domains']))
                            {
                             $count_dom = count($ans['domains']);
                            
                            for($i=0;$i<=$count_dom-1;$i++)
                            {

                                $data = array
                                (		'college_id'=>$ans['hidden_college_id'],
                                                'domain_id'=>$ans['domains'][$i],
                                                'status'=>1
                                );
                                $this->db->insert('college_has_domain',$data);
                            }
                        }
                        $this->db->delete('college_has_topsectors',array('college_id' => $ans['hidden_college_id']));
                         if(isset($ans['top_sectors']))
                        {
                           
                             $count = count($ans['top_sectors']);
			
			for($i=0;$i<=$count-1;$i++)
			{
			$data = array
			(   
                                'college_id'=>$ans['hidden_college_id'],
				'topsector_id'=>$ans['top_sectors'][$i]

			);
			$this->db->insert('college_has_topsectors',$data);
			}
                        }
                            
			}
                   
	}		
	
	function get_school_name()
	{
		  $query = $this->db->select('*')
                     ->from("college_info")
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
	

        
             function get_associat_college_count($id)
        {
           
            $query = $this->db->select('id')
                     ->from("college_review_rating")
                     ->where("college_id",$id)
                     ->get();
            $count1 = $query->num_rows();
            
             $query = $this->db->select('id')
                     ->from("user_education_info")
                     ->where("college_id",$id)
                     ->get();
            $count2 = $query->num_rows();
            
            return $total_count = ($count1 + $count2);
        }
        
        
        function delete_master_college_info($id)
        {
          $data = array(
               'status' => 0
             
            );

            $this->db->where('id', $id);
            $this->db->update('college_info', $data); 
        }
	
	
}
?>
