<?php
if(!defined('BASEPATH')) exit('You do not have access');
class Admin_Event_Model extends CI_Model{
		
	
	function insert_school_event_info($ans)
	{
                 if (isset($ans['event_img'])) {
            $event_pic = $ans['event_img'];
        } else {
            $event_pic = "";
        }
            
		$data = array
		(		'event_img'=>$event_pic,
				'event_name'=>$ans['event_name'],
				'event_date'=>$ans['event_date'],
				'event_location'=>$ans['event_location'],
				'event_school_id'=>$ans['school_name'],
                                'added_by'=>session('client_user_name'),
				'status'=>1	

		);
		
			
			if($ans['hidden_event_id'] == "")
			{
			
				$this->db->insert('school_events',$data);
                                insert_university_event_notification($ans['school_name']);
			}
		
			else
			{
				$this->db->where('id',$ans['hidden_event_id']);
				$this->db->update('school_events', $data); 
				
			}
			
	}		
	

		function get_school()
		{
			$query = $this->db
						->select('C_I.id,
						C_I.school_name,
						F_S.field_name')

			->from('college_info as C_I')
			->join('field_of_study as F_S', 'C_I.field_study = F_S.id')
                        ->where('C_I.status',"1")
			->get();
		if ($query->num_rows == 0) {
            return "no";
        } else {
            return $query->result_array();
        }
        
	}	
	
        function get_school_event()
		{
			$query = $this->db
			->select('S_E.id,S_E.event_img,S_E.event_name,S_E.event_date,S_E.event_location,S_E.status,S_E.event_school_id,C_I.school_name')

			->from('school_events as S_E')
			->join('college_info as C_I', 'C_I.id = S_E.event_school_id')
                        ->where('S_E.status','1')
                        ->order_by('C_I.school_name','desc')
			->get();
		if ($query->num_rows == 0) {
            return "no";
        } else {
            return $query->result_array();
        }
        
	}	
        
         function get_school_event_id($id)
		{
			$query = $this->db
			->select('S_E.id,S_E.event_img,S_E.event_name,S_E.event_date,S_E.event_location,S_E.status,S_E.event_school_id,C_I.school_name')

			->from('school_events as S_E')
			->join('college_info as C_I', 'C_I.id = S_E.event_school_id')
                        ->where('S_E.status','1')
                        ->where('S_E.id',$id)
                        
			->get();
		if ($query->num_rows == 0) {
            return "no";
        } else {
            return $query->row();
        }
        
	}	
	
        function delete_college_event_info($id)
        {
          $data = array(
               'status' => 0
             
            );

            $this->db->where('id', $id);
            $this->db->update('school_events', $data); 
        }
	
    
        
}
?>
