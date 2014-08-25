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

}
