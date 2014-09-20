<?php

if(!defined('BASEPATH')) exit('You do not have access');
class Client_Follow_School_Model extends CI_Model{
	
	function insert_user_follow_info($ans)
	{
		
		
			if(($ans['type'] == "following") && ($ans['following'] == 0))
			{
			
				$this->db->where('school_id',$ans['school_id']);
				$this->db->where('student_id',session('client_user_id'));
				$this->db->where('following !=',0);
				$this->db->delete('user_interested_in_school'); 
			
			}
			
			else if(($ans['type'] == "interest-yes") && ($ans['interest_yes_maybe'] == 0))
			{
			
				$this->db->where('school_id',$ans['school_id']);
				$this->db->where('student_id',session('client_user_id'));
				$this->db->where('interest_yes_maybe !=',0);
				$this->db->delete('user_interested_in_school'); 
			
			}
                        
                        else if(($ans['type'] == "program-yes") && ($ans['pro_yes_maybe'] == 0))
			{
			
				$this->db->where('school_id',$ans['school_id']);
				$this->db->where('student_id',session('client_user_id'));
                                $this->db->where('program_id',$ans['program_id']);
				$this->db->where('pro_yes_maybe !=',0);
				$this->db->delete('user_interested_in_school'); 
			
			}
		
		else
		{
			
			if($ans['type'] == "following")
			{
			

				$data = array
				(		'school_id'				=>$ans['school_id'],
						'student_id'			=>session('client_user_id'),
						'following'				=>$ans['following'],
					
				);
				
				
				
			}
		
			 else if($ans['type'] == "interest-yes")
			{
				
				
				$data = array
				(		'school_id'                     =>$ans['school_id'],
						'student_id'			=>session('client_user_id'),
						'interest_yes_maybe'            =>$ans['interest_yes_maybe'],
				);
                                
                                
                        }
                        else if($ans['type'] == "program-yes")
                             
                         {
                             
                             $data = array
				(		'school_id'				=>$ans['school_id'],
						'student_id'                            =>session('client_user_id'),
                                                'program_id'                            =>$ans['program_id'],
						'pro_yes_maybe'                         =>$ans['pro_yes_maybe'],
				);
                             
                         }
                                
			
			
		 $this->db->where('school_id',$ans['school_id']);
		 $this->db->where('student_id',session('client_user_id'));
		 if($ans['type'] == "following")
		 {
			$this->db->select('following');
			$this->db->where('following !=', 0);
		}
		  else if($ans['type'] == "interest-yes")
		  {
			$this->db->select('interest_yes_maybe');
			$this->db->where('interest_yes_maybe !=', 0);
		 }
                 
                 else if($ans['type'] == "program-yes")
		  {
			$this->db->select('pro_yes_maybe');
                        $this->db->where('program_id',$ans['program_id']);
			$this->db->where('pro_yes_maybe !=', 0);
		 }

		 $query = $this->db->get('user_interested_in_school');
		
		if ($query->num_rows() > 0)
		{
			
			$this->db->update('user_interested_in_school', $data); 
		
		}
		else
		{
	
			$this->db->insert('user_interested_in_school',$data);
                        insert_follow_school($ans['school_id']);
		}
		
                }
		
	}
	
	function get_student_following_info()
	{
	
		  $query = $this->db
                ->select(
                        'U_I.id,
                        U_I.school_id,
                        U_I.following'
                      
						
                        )
                ->from('user_interested_in_school as  U_I')
				->wehre('')
                ->get();
		//show_query();
        if ($this->row)
            return $query->row();
        elseif ($this->total)
            return $query->num_rows();
        else
            return $query->result_array();
	
	
	}
	
	
         function user_following_school($id)
     {
         
         $query = $this->db->select('student_id')
                 -> from('user_interested_in_school')
                 ->where('school_id',$id)
                 ->group_by('student_id')
                 ->get();
         return $query->result_array();
        //return $query['student_id'];  
    } 
}
?>


 