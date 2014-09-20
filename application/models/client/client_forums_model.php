<?php

if (!defined('BASEPATH'))
    exit('You do not have access');

class Client_Forums_Model extends CI_Model {

    function get_all_forums($offset, $limit) {
        $forums = $this->db->query("select * from master_forums order by updated_at desc limit $offset,$limit");
        if ($forums->num_rows == 0) {
            return FALSE;
        } else {
            return $forums->result_array();
        }
    }

    function get_total_forums_count() {
        $forums = $this->db->query("select count(*) as count from master_forums");
        if ($forums->num_rows == 0) {
            return FALSE;
        } else {
            return $forums->result_array();
        }
    }

    function get_forum_details($id) {
        if (is_numeric($id)) {
            $forum_details = $this->db->query("select * from master_forums where id=$id limit 1");
            if ($forum_details->num_rows == 0) {
                return FALSE;
            } else {
                return $forum_details->result_array();
            }
        } else {
            return FALSE;
        }
    }

    function get_all_topics($id, $pageno, $limit) {
        if (is_numeric($id) && is_numeric($pageno)) {
            $topics = $this->db->query("select * from user_forum_topics where forum_id=$id order by updated_at desc limit $pageno, $limit");
            if ($topics->num_rows == 0) {
                return FALSE;
            } else {
                return $topics->result_array();
            }
        } else {
            return FALSE;
        }
    }

    function insert_new_topic($forum_id, $user_id, $title, $time, $followers) {
        if (is_numeric($forum_id) && is_numeric($user_id)) {
            $insert = $this->db->query("insert into user_forum_topics(`forum_id`,`topic`,`followers`,`added_by`,`added_at`,`updated_at`) values($forum_id,'$title','$followers',$user_id,'$time','$time')");
            if ($insert) {
                return $this->db->insert_id();
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function update_forum_topic_count($forum_id, $topic_cnt) {
        if (is_numeric($forum_id)) {
            $topic_cnt ++;
            $update = $this->db->query("update master_forums set topics_cnt = $topic_cnt, updated_at = '" . date("Y-m-d H:i:s") . "' where id=$forum_id");
            if ($update) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function get_topic_details($id) {
        if (is_numeric($id)) {
            $topic_details = $this->db->query("select * from user_forum_topics where id=$id limit 1");
            if ($topic_details->num_rows == 0) {
                return FALSE;
            } else {
                return $topic_details->result_array();
            }
        } else {
            return FALSE;
        }
    }

    function get_all_discussions($id, $pageno, $limit) {
        if (is_numeric($id) && is_numeric($pageno) && is_numeric($limit)) {
            $discussions = $this->db->query("select d.*, u.name, u.profile_pic from user_forum_topic_discussions d, user u where d.topic_id = $id and d.added_by = u.id order by d.updated_at desc limit $pageno, $limit");
            if ($discussions->num_rows == 0) {
                return FALSE;
            } else {
                return $discussions->result_array();
            }
        } else {
            return FALSE;
        }
    }

    function insert_new_discussion($forum_id, $id, $user_id, $title, $time, $comments, $likes) {
        if (is_numeric($forum_id) && is_numeric($user_id) && is_numeric($id)) {
            $insert = $this->db->query("insert into user_forum_topic_discussions(`forum_id`,`topic_id`,`disc`,`added_by`,`added_at`,`updated_at`,`comments`,`likes`) values($forum_id,$id,'$title','$user_id','$time','$time','$comments','$likes')");
            if ($insert) {
                return $this->db->insert_id();
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function update_topic_replies_count($forum_id, $id, $replies_cnt) {
        if (is_numeric($forum_id)) {
            $replies_cnt ++;
            $update = $this->db->query("update user_forum_topics set replies_cnt = $replies_cnt, updated_at = '" . date("Y-m-d H:i:s") . "' where id=$id");
            if ($update) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function update_forum_replies_count($forum_id, $replies_cnt) {
        if (is_numeric($forum_id)) {
            $replies_cnt ++;
            $update = $this->db->query("update master_forums set replies_cnt = $replies_cnt, updated_at = '" . date("Y-m-d H:i:s") . "' where id=$forum_id");
            if ($update) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function get_discussion_details($id) {
        if (is_numeric($id)) {
            $discussion_details = $this->db->query("select *, d.added_by d_by from user_forum_topic_discussions d, user_forum_topics t , master_forums f where d.id=$id and d.topic_id = t.id and d.forum_id = f.id limit 1");
            if ($discussion_details->num_rows == 0) {
                return FALSE;
            } else {
                return $discussion_details->result_array();
            }
        } else {
            return FALSE;
        }
    }

    function get_discussion_details_indi($id) {
        if (is_numeric($id)) {
            $discussion_details = $this->db->query("select d.*, d.id as did, d.added_by d_by,u.name,u.profile_pic  from user_forum_topic_discussions d, user_forum_topics t , master_forums f, user u where d.id=$id and d.added_by = u.id and d.topic_id = t.id and d.forum_id = f.id limit 1");
            if ($discussion_details->num_rows == 0) {
                return FALSE;
            } else {
                return $discussion_details->result_array(); 
            }
        } else {
            return FALSE;
        }
    }
    
    function update_discussion_comments($id, $comments) {
        if (is_numeric($id)) {
            $update = $this->db->query("update user_forum_topic_discussions set comments = '$comments', updated_at = '" . date("Y-m-d H:i:s") . "' where id=$id");
            if ($update) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function update_discussion_likes($id, $likes) {
        if (is_numeric($id)) {
            $update = $this->db->query("update user_forum_topic_discussions set likes = '$likes', updated_at = '" . date("Y-m-d H:i:s") . "' where id=$id");
            if ($update) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function update_topic_discussion_time($id) {
        if (is_numeric($id)) {
            $update = $this->db->query("update user_forum_topics set updated_at = '" . date("Y-m-d H:i:s") . "' where id=$id");
            if ($update) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function update_forum_topic_time($forum_id) {
        if (is_numeric($forum_id)) {
            $update = $this->db->query("update master_forums set updated_at = '" . date("Y-m-d H:i:s") . "' where id=$forum_id");
            if ($update) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function update_topic_followers($topic_id, $followers) {
        if (is_numeric($topic_id)) {
            $update = $this->db->query("update user_forum_topics set followers = '$followers', updated_at = '" . date("Y-m-d H:i:s") . "' where id=$topic_id");
            if ($update) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function get_user_details($user_id) {
        if (is_numeric($user_id)) {
            $details = $this->db->query("select name,profile_pic,user_type from user where id= $user_id limit 1");
            if ($details->num_rows == 0) {
                return FALSE;
            } else {
                return $details->result_array();
            }
        } else {
            return FALSE;
        }
    }

    function get_total_discussions_count($topic_id) {
        $count = $this->db->query("select count(*) as count from  user_forum_topic_discussions where topic_id=$topic_id");
        if ($count->num_rows == 0) {
            return FALSE;
        } else {
            return $count->result_array();
        }
    }

    function get_total_topics_count($forum_id) {
        $count = $this->db->query("select count(*) as count from  user_forum_topics where forum_id=$forum_id");
        if ($count->num_rows == 0) {
            return FALSE;
        } else {
            return $count->result_array();
        }
    }

    function get_total_school_discussions_count($school_id) {
        $count = $this->db->query("select count(*) as count from  school_walls where school_id=$school_id");
        if ($count->num_rows == 0) {
            return FALSE;
        } else {
            return $count->result_array();
        }
    }

    function get_all_school_discussions($id, $pageno, $limit) {
        if (is_numeric($id) && is_numeric($pageno) && is_numeric($limit)) {
            $discussions = $this->db->query("select d.*, u.name, u.profile_pic from school_walls d, user u where d.school_id = $id and d.a_by = u.id order by d.updated_at desc limit $pageno, $limit");
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
            $discussion_details = $this->db->query("select * from school_walls s, college_info c where s.id=$id and s.school_id = c.id limit 1");
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
            $update = $this->db->query("update school_walls set comments = '$comments', updated_at = '" . date("Y-m-d H:i:s") . "' where id=$id");
           
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
            $update = $this->db->query("update school_walls set likes = '$likes', updated_at = '" . date("Y-m-d H:i:s") . "' where id=$id");
             
            if ($update) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function insert_new_wall_discussion($school_id, $user_id, $title, $time, $comments, $likes) {
        if (is_numeric($school_id) && is_numeric($user_id)) {
            $insert = $this->db->query("insert into school_walls(`school_id`,`disc`,`a_by`,`added_at`,`updated_at`,`comments`,`likes`) values($school_id,'$title','$user_id','$time','$time','$comments','$likes')");
           
            if ($insert) {
                return $this->db->insert_id();
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function delete_discussion($id) {
        if (is_numeric($id)) {
            $del = $this->db->query("delete from user_forum_topic_discussions where id=$id");
        } else {
            return false;
        }
    }

    function delete_wall_discussion($id) {
        if (is_numeric($id)) {
            $del = $this->db->query("delete from school_walls where id=$id");
        } else {
            return false;
        }
    }
}
