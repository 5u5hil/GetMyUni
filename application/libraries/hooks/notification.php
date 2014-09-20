<?php

class Notification {

    var $CI;

    function Notification() {
        $this->CI = & get_instance();
    }

    function index() {



        $class_name = $this->CI->router->fetch_class();
        $function_name = $this->CI->router->fetch_method();
        $uri_params = $this->CI->uri->segment_array();
        $get_params = $this->CI->input->get();
        $post_params = $this->CI->input->post();


        switch ($function_name) {
            case "topic_insert":
                $this->Insert_topic_notification($class_name, $function_name, $uri_params, $get_params, $post_params, session("client_user_id"));
                break;
            case "discussion_insert":
                $this->Insert_discussion_notification($class_name, $function_name, $uri_params, $get_params, $post_params, session("client_user_id"));
                break;
            default:
            //echo "No number between 1 and 3";
        }
    }

    function Insert_topic_notification($class_name, $function_name, $uri_params, $get_params, $post_params, $user_id) {
        echo $class_name . " " . $function_name;
    }

    function Insert_discussion_notification($class_name, $function_name, $uri_params, $get_params, $post_params, $user_id) {
        $this->CI->load->model('client/client_forums_model', 'forum');
        $this->CI->load->model('client/client_notification_model', 'notification');
        $get_topic_details = $this->CI->forum->get_topic_details($post_params["id"]);

        $followers = json_decode($get_topic_details[0]["followers"],true);
        $message = "New Discussion has been initiated by " . session("full_name") . " in '" . substr($get_topic_details[0]["topic"], 0, 25) . "'";
        $link = SITE_URL . "discussion/" . session("discussion_insert_id")."/";
        $type = "Discussion Added";
        $params = json_encode(array($class_name, $function_name, $get_params, $post_params, $uri_params));
        foreach ($followers as $follow) {
            $this->CI->notification->notification_insert(session("client_user_id"), $post_params["id"], addslashes($message), $link, $type, $params, date("Y-m-d H:i:s"));
        }
    }

}

?>