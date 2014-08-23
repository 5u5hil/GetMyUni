<?php

if(!defined('BASEPATH')) exit('You do not have access');
class Client_Signup_Model extends CI_Model{
	
	function insert_student_signup_info($ans)
	{
		$data = array
		(		'full_name'=>$ans['full_name'],
				'email'=>$ans['email'],
				'password'=>md5($ans['password']),
				
		);
		$this->db->insert('student_signup_info',$data);
	}		

}
?>
