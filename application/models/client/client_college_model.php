<?php

if (!defined('BASEPATH'))
    exit('You do not have access');

class Client_college_Model extends CI_Model {

    public $row = NULL;
    public $limit = NULL;
    public $offset = 0;
    public $total = NULL;
    public $college_id = NULL;

    function field_of_study() {
        $query = $this->db->get('field_of_study');

        if ($query->num_rows == 0) {
            return "no";
        } else {
            return $query->result_array();
        }
    }

    function get_majors_domains() {
        $query = $this->db->get('master_majors_domains');
        if ($query->num_rows == 0) {
            return "no";
        } else {
            return $query->result_array();
        }
    }

    function get_master_country() {
        $query = $this->db->get('country');
        if ($query->num_rows == 0) {
            return "no";
        } else {
            return $query->result_array();
        }
    }
	
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
	

    function get_college_program() {

        $this->db->where('C_P.college_id', $this->college_id);
        $query = $this->db
                ->select('
							C_P.id,
							C_P.program_name_id,
							C_P.program_legth,
							C_P.program_type_id,
							C_P.program_size,
							M_P.program_name,
							M_T.program_type
																				')
                ->from('college_has_program as C_P')
                ->join('master_program_name as M_P', 'M_P.id= C_P.program_name_id')
                ->join('master_program_type as M_T', 'M_T.id= C_P.program_type_id')
                ->get();

        //show_query();
        if ($query->num_rows == 0) {
            return "no";
        } else {
            return $query->result_array();
        }
    }

    function get_college_compare($id) {
        if (is_numeric($id)) {
            $get = $this->db->query("SELECT CONCAT_WS(  ' - ', c.school_name, m.degree_name ) school_name, c.address, concat(c.rank,'&deg;'), concat(c.acc_rate,'%'),CONCAT('$', FORMAT(c.avg_tution, 2)) , c.test_score, c.top_sectors, CONCAT('$', FORMAT(c.avg_salary, 0)), c.work_exp FROM college_info c, master_degree m WHERE c.id =$id AND c.degree = m.id");
            if ($get->num_rows == 0) {
                return FALSE;
            } else {
                return $get->result_array();
            }
        } else {
            return false;
        }
    }

    function get_college($type = NULL, $course = NULL, $country = NULL, $degree = NULL, $word = NULL, $tuition = NULL, $topschools = NULL, $verbalability = NULL, $quantability = NULL, $test_scores = NULL, $topsector = NULL, $sort_by_rank = NULL, $sort_by_tution = NULL) {

        if ($type)
            $this->db->where("(F_S.field_name LIKE '%$type%')");
        if ($country) {
            $this->db->where("(country.country_name IN ('" . implode("','", $country) . "'))");
        }
        if ($degree)
            $this->db->where("(M_DGREE.degree_name LIKE '%$degree%')");
        if ($course)
            $this->db->where('(C_D.domain_id IN (' . implode(',', $course) . '))');
        if ($word)
            $this->db->where("(C_I.school_name LIKE '%$word%')");
        if ($tuition)
            $this->db->where("(C_I.avg_tution BETWEEN $tuition)");
        if ($topschools)
            $this->db->where("(C_I.rank $topschools)");
        if ($verbalability)
            $this->db->where("(C_I.verbal_ability LIKE '%$verbalability%')");
        if ($quantability)
            $this->db->where("(C_I.quant_ability LIKE '%$quantability%')");
        if ($test_scores) {
            $ans = explode("-", $test_scores);
            $this->db->where('C_I.test_score', $ans[1]);
            $this->db->where("(C_I.avg_test_score BETWEEN $ans[0])");
        }
        if ($topsector)
            $this->db->where('(C_T.topsector_id IN (' . implode(',', $topsector) . '))');

        if ($sort_by_rank)
            $this->db->order_by("C_I.rank", $sort_by_rank);

        if ($sort_by_tution)
            $this->db->order_by("C_I.avg_tution", $sort_by_tution);

        if (!is_null($this->limit)) {
            $this->db->limit($this->offset, $this->limit);
        }

        if ($this->college_id)
            $this->db->where('C_I.id', $this->college_id);

        $query = $this->db
                ->select(
                        'C_I.id,
                        C_I.school_name,
                        C_I.email_domain,
                        C_I.degree,
                        C_I.field_study,
                        C_I.address,
                        C_I.zipcode,
                        C_I.country,
                        C_I.city,
                        C_I.website,
                        C_I.avg_tution,
                        C_I.rank,
                        C_I.acc_rate,
                        C_I.test_score,
                        C_I.avg_test_score,
                        C_I.work_exp,
                        C_I.inter_stud,
                        C_I.gender_dist,
                        C_I.acco_mod,
                        C_I.percentage_job,
                        C_I.avg_salary,
                        C_I.gmat_score,
                        C_I.resume,
                        C_I.app_essay,
                        C_I.interview,
                        C_I.transcript,
                        C_I.verbal_ability,
                        C_I.quant_ability,
                        C_I.college_logo,
                        F_S.field_name,
                        GROUP_CONCAT(DISTINCT(C_D.domain_id ))as domain,
						GROUP_CONCAT(DISTINCT(M_TOP.top_sectors	))as topsector,
                        GROUP_CONCAT(DISTINCT(C_P.program_name_id ))as program'
                )
                ->from('college_info as  C_I')
                ->join('college_has_domain as C_D', 'C_I.id = C_D.college_id')
                ->join('college_has_program as C_P', 'C_I.id = C_P.college_id')
                ->join('college_has_topsectors as C_T', 'C_I.id = C_T.college_id')
                ->join('field_of_study as F_S', 'C_I.field_study = F_S.id')
                ->join('country', 'C_I.country= country.country_id')
                ->join('master_degree as M_DGREE', 'C_I.degree= M_DGREE.id')
                ->join('master_top_sectors as M_TOP', 'C_T.topsector_id= M_TOP.id')
                ->group_by('C_D.college_id')
                ->group_by('C_P.college_id')
                ->get();
        //show_query();
        if ($this->row)
            return $query->row();
        elseif ($this->total)
            return $query->num_rows();
        else
            return $query->result_array();
    }

    function get_review_rating($degree_type = NULL, $r_field = NULL, $majors = NULL, $country = NULL) {
       
		if (!is_null($this->limit)) {
            $this->db->limit($this->offset, $this->limit);
			}
	   if ($degree_type)
            $this->db->where('C_I.degree', $degree_type);
        if ($r_field)
            $this->db->where('REVIEW.program_id', $r_field);
        if ($majors) {
            $this->db->where('(C_D.domain_id IN (' . $majors . '))');
            $this->db->join('college_has_domain as C_D', 'REVIEW.college_id = C_D.college_id');
        }
        if ($country)
            $this->db->where('C_I.country', $country);
        if (isset($this->order)) {
            $this->db->where('REVIEW.college_id', $this->college_id);
            $this->db->order_by("REVIEW.id", $this->order);
        }
        if (isset($this->review_id))
		{
            $this->db->where('REVIEW.id', $this->review_id);
		
        }
        if (isset($this->college_id)) {
            $this->db->where('REVIEW.college_id', $this->college_id);
            // $this->db->group_by('REVIEW.college_id');
        } else {
            $this->db->where('REVIEW.status', 1);
            $this->db->group_by('REVIEW.college_id');
            //$this->db->group_by('REVIEW.student_id');
        }
        $query = $this->db
                ->select(
                        'REVIEW.id,
                        REVIEW.college_id,
                        REVIEW.student_id,
                        REVIEW.year,
                        REVIEW.language,
                        REVIEW.program_id,
                        REVIEW.academic_rigor,
                        REVIEW.academic_exchange,
                        REVIEW.academic_library,
                        REVIEW.life_fraternities,
                        REVIEW.life_party,
                        REVIEW.life_sport,
                        REVIEW.infra_school,
                        REVIEW.infra_housing,
                        REVIEW.placement_career,
                        REVIEW.placement_intership,
                        REVIEW.review_ans1,
                        REVIEW.review_ans2,
                        REVIEW.review_ans3,
                        REVIEW.review_ans4,
                        REVIEW.review_ans5,
                       (REVIEW.academic_rigor+ REVIEW.academic_exchange+REVIEW.academic_library+REVIEW.life_fraternities+REVIEW.life_party+REVIEW.life_sport+REVIEW.infra_school+REVIEW.infra_housing+REVIEW.placement_career+REVIEW.placement_intership)/10 as avg,
                        U_T.name,
                        U_T.profile_pic,
                       (select COUNT(REVIEW.id) from college_review_rating as REVIEW  WHERE REVIEW.college_id = C_I.id) as review_count,		   
                        C_I.school_name,
                        C_I.field_study,
                        C_I.country,
                        C_I.degree,
                        C_I.address,			
						M_P.program_name'
                )//GROUP_CONCAT(DISTINCT(C_D.domain_id ))as domain, ( return only single value)
                ->from('college_review_rating as  REVIEW')
                ->join('user as U_T', 'REVIEW.student_id = U_T.id')
                ->join('college_info as C_I', 'C_I.id = REVIEW.college_id')
                ->join('master_program_name as M_P', 'REVIEW.program_id = M_P.id')
                ->order_by("REVIEW.id", "desc")
                ->get();
        //show_query();

        if ($this->row)
            return $query->row();
        elseif ($this->total)
            return $query->num_rows();
        else
            return $query->result_array();
    }

    function get_school_event() {
        $query = $this->db
                ->select(
                        'S_E.id,
                        S_E.event_img,
                        S_E.event_name,
                        S_E.event_date,
                        S_E.event_location,
                        S_E.event_school_id,'
                )
                ->from('school_events as  S_E')
                ->where('S_E.event_school_id', $this->college_id)
                ->get();

        return $query->result_array();
    }

    function get_school($q) {
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

    function review_count() {
        $result = $this->db->where('college_id', $this->college_id)->count_all_results("college_review_rating");
        //show_query();
        return $result;
    }

    function following_count() {
        $result = $this->db->select('id')
                ->where('school_id', $this->college_id)
                ->group_by('student_id')
                ->group_by('school_id')
                ->from("user_interested_in_school")
                ->get();
        //show_query();
        return $result->num_rows();
    }

    function get_avg_rating() {

        $query = $this->db
                ->select(
                        'REVIEW.id,
                        REVIEW.college_id,
                        REVIEW.academic_rigor,
                        REVIEW.academic_exchange,
                        REVIEW.academic_library,
                        REVIEW.life_fraternities,
                        REVIEW.life_party,
                        REVIEW.life_sport,
                        REVIEW.infra_school,
                        REVIEW.infra_housing,
                        REVIEW.placement_career,
                        REVIEW.placement_intership'
                )
                ->from('college_review_rating as  REVIEW')
                ->where('REVIEW.college_id', $this->college_id)
                ->get();
        return $query->result_array();
    }

    function get_user_following_info() {

        if ($this->college_id)
            $this->db->where('U_I.school_id', $this->college_id);
        $query = $this->db
                ->select(
                        'U_I.id,
                        U_I.school_id,
                        U_I.student_id,
                        U_I.following,
                        U_I.interest_yes_maybe,
                        U_I.program_id,
                        U_I.pro_yes_maybe,
                        '
                )
                ->from('user_interested_in_school as  U_I')
                ->where('U_I.student_id', session('client_user_id'))
                ->get();
        return $query->result_array();
    }

    function get_student_college_review_count() {

        $result = $this->db->select('id')
                ->where('college_id', $this->college_id)
                ->where('student_id', session('client_user_id'))
                ->from("college_review_rating")
                ->get();
        //show_query();
        return $result->num_rows();
    }

  function get_student_following_college() {
        $query = $this->db
                ->select('U_I.student_id,
					   U_I.school_id as college_id,
					   U_T.name,
					   U_T.profile_pic
                      ')
                ->from('user_interested_in_school as U_I')
                ->join('user as U_T', 'U_I.student_id = U_T.id')
                ->where('U_I.school_id', $this->college_id)
                ->get();
        return $query->result_array();
    }

    function get_student_edu() {
        $query = $this->db
                ->select('
																						   U_E.student_id,
                                                                                           U_E.college_id,
                                                                                           U_T.name,
																						   U_T.profile_pic
                                                                                        ')
                ->from('user_education_info as U_E')
                ->join('user as U_T', 'U_E.student_id = U_T.id')
                ->where('U_E.college_id', $this->college_id)
                ->get();

        //show_query();
        return $query->result_array();
    }

    function get_student_review_rate() {
        $query = $this->db
                ->select('
							   C_R.student_id,
							   C_R.college_id,
							   U_T.name,
							   U_T.profile_pic
					      ')
                ->from('college_review_rating as C_R')
                ->join('user as U_T', 'C_R.student_id = U_T.id')
                ->where('C_R.college_id', $this->college_id)
                ->get();

        //show_query();
        return $query->result_array();
    }

}
?>