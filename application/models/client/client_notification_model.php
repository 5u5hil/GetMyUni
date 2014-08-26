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
        $ticks = $this->db->query("select * from ticker where `to` = $user order by `datetime` desc limit 0,20");
        if ($ticks->num_rows == 0) {
            return FALSE;
        } else {
            return $ticks->result_array();
        }
    }

    function get_new_ticker_notifications($user,$id) {
        $ticks = $this->db->query("select * from ticker where `to` = $user and id > $id order by `datetime` desc limit 0,20");
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

    function get_unread_notifications($user) {
        $ticks = $this->db->query("select * from notification where `to` = $user  order by datetime desc");
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

}
