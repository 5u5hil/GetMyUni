<?php

if (!defined('BASEPATH'))
    exit('You do not have access');

class client_review_rating_model extends CI_Model {

    function insert_review_rating($ans) {
        $university_name = ucwords(str_replace("-", " ", $this->uri->segment(4)));
        $data = array
            (
            'college_id' => $ans['college_id'],
            'student_id' => session('client_user_id'),//$ans['student_id'],
            'year' => $ans['year'],
            'language' => $ans['language'],
            'program_id' => $ans['program_id'],
            'academic_rigor' => $ans['academic_rigor'],
            'academic_exchange' => $ans['academic_exchange'],
            'academic_library' => $ans['academic_library'],
            'life_fraternities' => $ans['life_fraternities'],
            'life_party' => $ans['life_party'],
            'life_sport' => $ans['life_sport'],
            'infra_school' => $ans['infra_school'],
            'infra_housing' => $ans['infra_housing'],
            'placement_career' => $ans['placement_career'],
            'placement_intership' => $ans['placement_intership'],
            'review_ans1' => $ans['review_ans1'],
            'review_ans2' => $ans['review_ans2'],
            'review_ans3' => $ans['review_ans3'],
            'review_ans4' => $ans['review_ans4'],
            'review_ans5' => $ans['review_ans5'],
            'status' => 1,
        );

        $this->db->insert('college_review_rating', $data);
        $max_id = $this->db->insert_id();
        insert_user_review_notification($university_name,$ans['college_id'],$max_id);
        return $max_id;
        
        //show_query();
    }

    function get_school_name_review($q) {
        /*$query = $this->db
                ->select('REVIEW.id,
				REVIEW.college_id,
				C_I.school_name,
				')
                ->like('school_name', $q)
                ->from('college_review_rating as REVIEW')
                ->join('college_info as C_I', 'C_I.id = REVIEW.college_id')
                ->group_by('REVIEW.college_id')
                ->get();
        if ($query->num_rows > 0) {
            foreach ($query->result_array() as $row) {
                $new_row['value'] = htmlentities(stripslashes(clean_string($row['school_name'])));
                $new_row['id'] = $row['college_id'];
                $new_row['label'] = htmlentities(stripslashes($row['school_name']));
                $row_set[] = $new_row; //build an array
            }
            echo json_encode($row_set); //format the array into json data
        }*/
		
		 $query = $this->db
                ->select('C_I.id,
				C_I.school_name,
				F_S.field_name,
				M_D.degree_name')
                ->like('school_name', $q)
                ->from('college_info as C_I')
                ->join('field_of_study as F_S', 'C_I.field_study = F_S.id')
                ->join('master_degree as M_D', 'C_I.degree = M_D.id')
                ->get();

        if ($query->num_rows > 0) {
            foreach ($query->result_array() as $row) {
                $new_row['value'] = htmlentities(stripslashes(($row['school_name']))) . " - " . htmlentities(stripslashes($row['degree_name']));
                $new_row['id'] = $row['id'];
                $new_row['label'] = htmlentities(stripslashes($row['school_name'])) . " - " . htmlentities(stripslashes($row['degree_name']));
                $row_set[] = $new_row; //build an array
            }
            echo json_encode($row_set); //format the array into json data
        }
		
    }

}

?>
