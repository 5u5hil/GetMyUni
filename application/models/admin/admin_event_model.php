<?php
if(!defined('BASEPATH')) exit('You do not have access');
class Admin_Event_Model extends CI_Model{
		
	
	function insert_school_event_info($ans)
	{
	
		$data = array
		(		'event_img'=>json_encode($ans['event_img']),
				'event_name'=>$ans['event_name'],
				'event_date'=>$ans['event_date'],
				'event_location'=>$ans['event_location'],
				'event_school_id'=>$ans['school_name'],
				'status'=>1	

		);
		
			
			if($ans['hidden_event_id'] == "")
			{
			
				$this->db->insert('school_events',$data);
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
			->get();
		if ($query->num_rows == 0) {
            return "no";
        } else {
            return $query->result_array();
        }
        
	}	
	
}
?>
