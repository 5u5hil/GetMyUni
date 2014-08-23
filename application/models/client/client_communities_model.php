<?php

if (!defined('BASEPATH'))
    exit('You do not have access');

class Client_Communities_Model extends CI_Model {

    function insert_new_community($name, $members, $user_id, $time, $pic, $desc) {
        if (is_numeric($user_id)) {
            $insert = $this->db->query("insert into communities(`cname`,`members`,`added_by`,`added_at`,`updated_at`,`pic`,`desc`) values('$name','$members',$user_id,'$time','$time','$pic','$desc')");
            if ($insert) {
                $id = $this->db->insert_id();
                $community = $this->db->get_where('communities', array('id' => $id));
                return $community->result_array();
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function get_community_details($id) {
        if (is_numeric($id)) {
            $community = $this->db->get_where('communities', array('id' => $id));
            return $community->result_array();
        } else {
            return FALSE;
        }
    }

    function get_total_communities_count() {
        $communities = $this->db->query("select count(*) as count from communities");
        if ($communities->num_rows == 0) {
            return FALSE;
        } else {
            return $communities->result_array();
        }
    }

    function get_all_communities($offset, $limit) {
        $communities = $this->db->query("select * from communities order by updated_at desc limit $offset,$limit");
        if ($communities->num_rows == 0) {
            return FALSE;
        } else {
            return $communities->result_array();
        }
    }

    function get_total_communities_discussions_count($community_id) {
        $count = $this->db->query("select count(*) as count from  community_walls where community_id=$community_id");
        if ($count->num_rows == 0) {
            return FALSE;
        } else {
            return $count->result_array();
        }
    }

    function get_all_communities_discussions($id, $pageno, $limit) {
        if (is_numeric($id) && is_numeric($pageno) && is_numeric($limit)) {
            $discussions = $this->db->query("select d.*, u.name, u.profile_pic from community_walls d, user u where d.community_id = $id and d.added_by = u.id order by d.updated_at desc limit $pageno, $limit");
            if ($discussions->num_rows == 0) {
                return FALSE;
            } else {
                return $discussions->result_array();
            }
        } else {
            return FALSE;
        }
    }

    function get_wall_discussion_details($id) {
        if (is_numeric($id)) {
            $discussion_details = $this->db->query("select * from community_walls s, communities c where s.id=$id and s.community_id = c.id limit 1");
            if ($discussion_details->num_rows == 0) {
                return FALSE;
            } else {
                return $discussion_details->result_array();
            }
        } else {
            return FALSE;
        }
    }

    function update_wall_discussion_comments($id, $comments) {
        if (is_numeric($id)) {
            $update = $this->db->query("update community_walls set comments = '$comments', updated_at = '" . date("Y-m-d H:i:s") . "' where id=$id");
            if ($update) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function update_wall_discussion_likes($id, $likes) {
        if (is_numeric($id)) {
            $update = $this->db->query("update community_walls set likes = '$likes', updated_at = '" . date("Y-m-d H:i:s") . "' where id=$id");
            if ($update) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function insert_new_wall_discussion($community_id, $user_id, $title, $time, $comments, $likes) {
        if (is_numeric($community_id) && is_numeric($user_id)) {
            $insert = $this->db->query("insert into community_walls(`community_id`,`disc`,`added_by`,`added_at`,`updated_at`,`comments`,`likes`) values($community_id,'$title','$user_id','$time','$time','$comments','$likes')");
            if ($insert) {
                return $this->db->insert_id();
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function delete_wall_discussion($id) {
        if (is_numeric($id)) {
            $del = $this->db->query("delete from community_walls where id=$id");
        } else {
            return false;
        }
    }

    function update_community_members($id, $members) {
        if (is_numeric($id)) {
            $update = $this->db->query("update communities set members = '$members', updated_at = '" . date("Y-m-d H:i:s") . "' where id=$id");
            if ($update) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function insert_new_event($name, $cid, $members, $user_id, $time, $pic, $desc, $edate, $etime, $location) {
        if (is_numeric($user_id) && is_numeric($cid)) {
            $insert = $this->db->query("insert into community_events(`ename`,`community_id`,`edate`,`etime`,`location`,`added_by`,`added_at`,`updated_at`,`pic`,`desc`) values('$name', '$cid', '$edate', '$etime', '$location', $user_id,'$time','$time','$pic','$desc')");
            if ($insert) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function get_community_events($id) {
        if (is_numeric($id)) {
            $get = $this->db->query("select * from community_events where community_id = $id ORDER BY CONCAT(SUBSTR(edate,6) < SUBSTR(CURDATE(),6), SUBSTR(edate,6))");
            if ($get->num_rows == 0) {
                return FALSE;
            } else {
                return $get->result_array();
            }
        } else {
            return FALSE;
        }
    }

    function get_users($term) {
        $get = $this->db->query("select email as id, name as label, email as value  from user where name like '%$term%'");
        if ($get->num_rows == 0) {
            return FALSE;
        } else {
            return $get->result_array();
        }
    }

}
