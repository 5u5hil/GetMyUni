<?php

if (!defined('BASEPATH'))
    exit('You do not have access');

class Client_Notification_Model extends CI_Model {

    function ticker_insert($user, $to, $message, $link, $type, $params, $date) {
        $insert = $this->db->query("Insert into ticker(`from`,`to`,`message`,`link`,`type`,`params`,`datetime`) values($user,$to,'$message','$link','$type','$params','$date')");
    }

    function notification_insert($user, $to, $message, $link, $type, $params, $date) {
        $insert = $this->db->query("Insert into notification(`from`,`to`,`message`,`link`,`type`,`params`,`datetime`) values($user,$to,'$message','$link','$type','$params','$date')");
    }

    function get_ticker_notifications($user) {
        $ticks = $this->db->query("select * from ticker where `to` = $user or `to` = 0 order by `datetime` desc limit 0,20");
        if ($ticks->num_rows == 0) {
            return FALSE;
        } else {
            return $ticks->result_array();
        }
    }

    function get_new_ticker_notifications($user, $id) {
        $ticks = $this->db->query("select * from ticker where (`to` = $user or `to` = 0) and id > $id order by `datetime` desc limit 0,20");
        if ($ticks->num_rows == 0) {
            return FALSE;
        } else {
            return $ticks->result_array();
        }
    }

    function get_unread_notification_count($user) {
        $ticks = $this->db->query("select count(*) as cnt from notification where `to` = $user and `read`=0");
        $cnt = $ticks->row_array();
        if ($cnt["cnt"] == 0) {
            return "";
        } else {

            return $cnt["cnt"];
        }
    }

    function get_unread_message_count($user) {
        $ticks = $this->db->query("select count(*) as cnt from messages where `to` = $user and `read`=0");
        $cnt = $ticks->row_array();
        if ($cnt["cnt"] == 0) {
            return "";
        } else {

            return $cnt["cnt"];
        }
    }

    function get_unread_notifications($user) {
        $ticks = $this->db->query("select *, CONVERT_TZ(datetime,'+00:00','". $_SESSION["timeZone"]."') as datetime from notification where `to` = $user  order by datetime desc");
        if ($ticks->num_rows == 0) {
            return "";
        } else {
            return $ticks->result_array();
        }
    }

    function update_unread_notifications($user) {
        $ticks = $this->db->query("update notification set `read`=1 where `to` = $user");
        if ($ticks) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function message_insert($uid, $to, $sub, $message, $pid) {
        $time = date("Y-m-d H:i:s");
        $insert = $this->db->query("insert into messages(`to`,`from`,`mid`,`subject`,`message`,`added_at`,`updated_at`) values($to,$uid,$pid,'$sub','$message','$time','$time')");

        if ($insert) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_total_messages_count($user) {
        $msgs = $this->db->query("select count(*) as count from messages where (`to` = $user or `from` = $user) and mid = 0");
        if ($msgs->num_rows == 0) {
            return FALSE;
        } else {
            return $msgs->result_array();
        }
    }

    function get_all_messages($user, $offset, $limit) {
        
        $msgs = $this->db->query("select *, CONVERT_TZ(updated_at,'+00:00','". $_SESSION["timeZone"]."') as updated_at from messages where (`to` = $user or `from` = $user) and mid = 0 order by updated_at desc limit $offset,$limit");
        if ($msgs->num_rows == 0) {
            return FALSE;
        } else {
            return $msgs->result_array();
        }
    }

    function get_message_thread($id) {
        $msgs = $this->db->query("select *, CONVERT_TZ(added_at,'+00:00','". $_SESSION["timeZone"]."') as added_at from messages where id=$id or mid = $id order by id asc");
        if ($msgs->num_rows == 0) {
            return FALSE;
        } else {
            return $msgs->result_array();
        }
    }

    function update_unread_message($id,$user) {
        $msgs = $this->db->query("update messages set `read` = 1 where (id=$id or mid = $id) and `to`=$user");
    }

    function update_parent_thread_time($pid){
        $msgs = $this->db->query("update messages set `updated_at` = '".date("Y-m-d H:i:s")."' where id=$pid ");
        if($msgs){
            return TRUE;
        }
    }
}
