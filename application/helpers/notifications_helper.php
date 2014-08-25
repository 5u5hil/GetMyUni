<?php

function insert_discussion_notification() {
    $CI = & get_instance();
    $class_name = $CI->router->fetch_class();
    $function_name = $CI->router->fetch_method();
    $uri_params = $CI->uri->segment_array();
    $get_params = $CI->input->get();
    $post_params = $CI->input->post();

    $CI->load->model('client/client_forums_model', 'forum');
    $CI->load->model('client/client_notification_model', 'notification');
    $get_topic_details = $CI->forum->get_topic_details($post_params["id"]);



    $followers = json_decode($get_topic_details[0]["followers"], true);
    $message = "New Discussion has been initiated by " . session("full_name") . " in '" . substr($get_topic_details[0]["topic"], 0, 25) . "'";
    $link = SITE_URL . "discussion/" . session("discussion_insert_id") . "/";
    $type = "Discussion Added";
    $params = json_encode(array($class_name, $function_name, $get_params, $post_params, $uri_params));
    foreach ($followers as $follow) {
        if ($follow != session("client_user_id")) {
            $CI->notification->ticker_insert(session("client_user_id"), $follow, addslashes($message), $link, $type, $params, date("Y-m-d H:i:s"));
        }
    }
}

function insert_new_community_notification($cid, $uri) {
    $CI = & get_instance();
    $class_name = $CI->router->fetch_class();
    $function_name = $CI->router->fetch_method();
    $uri_params = $CI->uri->segment_array();
    $get_params = $CI->input->get();
    $post_params = $CI->input->post();


    $CI->load->model('client/client_notification_model', 'notification');



    $followers = get_all_user_ids();
    $message = "New community  '" . substr($post_params["cname"], 0, 25) . "' has been created on GMU ";
    $link = SITE_URL . "communities/$uri/$cid/";
    $type = "Community Added";
    $params = json_encode(array($class_name, $function_name, $get_params, $post_params, $uri_params));

    foreach ($followers as $follow) {
        $CI->notification->ticker_insert(session("client_user_id"), $follow["id"], addslashes($message), $link, $type, $params, date("Y-m-d H:i:s"));
    }
}

function insert_new_event_notification() {
    $CI = & get_instance();
    $class_name = $CI->router->fetch_class();
    $function_name = $CI->router->fetch_method();
    $uri_params = $CI->uri->segment_array();
    $get_params = $CI->input->get();
    $post_params = $CI->input->post();

    $CI->load->model('client/client_communities_model', 'comm');
    $CI->load->model('client/client_notification_model', 'notification');
    $get_comm_details = $CI->comm->get_community_details($post_params["cid"]);


    $followers = json_decode($get_comm_details[0]["members"], true);
    $message = "New Events happening in '" . $get_comm_details[0]["cname"] . "'";
    $link = SITE_URL . "communities/" . urlclean($get_comm_details[0]["cname"]) . "/" . $get_comm_details[0]["id"] . "/";
    $type = "Event Added";
    $params = json_encode(array($class_name, $function_name, $get_params, $post_params, $uri_params));
    foreach ($followers as $follow) {
        if ($follow != session("client_user_id")) {
            $CI->notification->ticker_insert(session("client_user_id"), $follow, addslashes($message), $link, $type, $params, date("Y-m-d H:i:s"));
        }
    }

    if ($get_comm_details[0]['added_by'] != session("client_user_id")) {
        $message = session("full_name") . " has created an event '" . $_POST["ename"] . "' in your Community '" . $get_comm_details[0]['cname'] . "'.";
        $CI->notification->notification_insert(session("client_user_id"), $get_comm_details[0]['added_by'], addslashes($message), $link, $type, $params, date("Y-m-d H:i:s"));
    }
}

function insert_comm_discussion_notification() {
    $CI = & get_instance();
    $class_name = $CI->router->fetch_class();
    $function_name = $CI->router->fetch_method();
    $uri_params = $CI->uri->segment_array();
    $get_params = $CI->input->get();
    $post_params = $CI->input->post();

    $CI->load->model('client/client_communities_model', 'comm');
    $CI->load->model('client/client_notification_model', 'notification');
    $get_comm_details = $CI->comm->get_community_details($post_params["community_id"]);



    $followers = json_decode($get_comm_details[0]["members"], true);
    $message = "New Discussion has been initiated by " . session("full_name") . " in '" . substr($get_comm_details[0]["cname"], 0, 25) . "'";
    $link = SITE_URL . "communities/" . urlclean($get_comm_details[0]["cname"]) . "/" . $get_comm_details[0]["id"] . "/";
    $type = "Community Discussion Added";
    $params = json_encode(array($class_name, $function_name, $get_params, $post_params, $uri_params));
    foreach ($followers as $follow) {
        if ($follow != session("client_user_id")) {
            $CI->notification->ticker_insert(session("client_user_id"), $follow, addslashes($message), $link, $type, $params, date("Y-m-d H:i:s"));
        }
    }
}

function insert_comm_user_join_notification() {
    $CI = & get_instance();
    $class_name = $CI->router->fetch_class();
    $function_name = $CI->router->fetch_method();
    $uri_params = $CI->uri->segment_array();
    $get_params = $CI->input->get();
    $post_params = $CI->input->post();

    $CI->load->model('client/client_communities_model', 'comm');
    $CI->load->model('client/client_notification_model', 'notification');
    $get_comm_details = $CI->comm->get_community_details($post_params["cid"]);



    $followers = json_decode($get_comm_details[0]["members"], true);
    $message = session("full_name") . " Just Joined '" . substr($get_comm_details[0]["cname"], 0, 25) . "'";
    $link = SITE_URL . "profile/" . session("client_user_id") . "/";
    $type = "Community Member Added";
    $params = json_encode(array($class_name, $function_name, $get_params, $post_params, $uri_params));
    foreach ($followers as $follow) {
        if ($follow != session("client_user_id")) {
            $CI->notification->ticker_insert(session("client_user_id"), $follow, addslashes($message), $link, $type, $params, date("Y-m-d H:i:s"));
        }
    }

    if ($get_comm_details[0]['added_by'] != session("client_user_id")) {
        $message = session("full_name") . " has joined your Community '" . $get_comm_details[0]['cname'] . "'.";
        $CI->notification->notification_insert(session("client_user_id"), $get_comm_details[0]['added_by'], addslashes($message), $link, $type, $params, date("Y-m-d H:i:s"));
    }
}

function insert_like_notification() {
    $CI = & get_instance();
    $class_name = $CI->router->fetch_class();
    $function_name = $CI->router->fetch_method();
    $uri_params = $CI->uri->segment_array();
    $get_params = $CI->input->get();
    $post_params = $CI->input->post();

    $CI->load->model('client/client_forums_model', 'forum');
    $CI->load->model('client/client_notification_model', 'notification');
    $get_topic_details = $CI->forum->get_discussion_details($post_params["id"]);



    $follow = $get_topic_details[0]["d_by"];
    $message = session("full_name") . " has liked your Discussion";
    $link = SITE_URL . "discussion/" . $post_params["id"] . "/";
    $type = "Discussion Liked";
    $params = json_encode(array($class_name, $function_name, $get_params, $post_params, $uri_params));

    $CI->notification->notification_insert(session("client_user_id"), $follow, addslashes($message), $link, $type, $params, date("Y-m-d H:i:s"));
}

function insert_comment_notification() {
    $CI = & get_instance();
    $class_name = $CI->router->fetch_class();
    $function_name = $CI->router->fetch_method();
    $uri_params = $CI->uri->segment_array();
    $get_params = $CI->input->get();
    $post_params = $CI->input->post();

    $CI->load->model('client/client_forums_model', 'forum');
    $CI->load->model('client/client_notification_model', 'notification');
    $get_topic_details = $CI->forum->get_discussion_details($post_params["id"]);



    $follow = $get_topic_details[0]["d_by"];
    $comments = json_decode($get_topic_details[0]["comments"], true);
    $message = session("full_name") . " has commented on your Discussion";
    $link = SITE_URL . "discussion/" . $post_params["id"] . "/";
    $type = "Discussion Commented";
    $params = json_encode(array($class_name, $function_name, $get_params, $post_params, $uri_params));

    if ($follow != session('client_user_id')) {
        $CI->notification->notification_insert(session("client_user_id"), $follow, addslashes($message), $link, $type, $params, date("Y-m-d H:i:s"));
    }
    $uids = array();
    foreach ($comments as $comment) {
        $message = session("full_name") . " has commented on a Discussion that you've commented on";
        if ($comment["uid"] !== $follow && $comment["uid"] != session("client_user_id") && !in_array($comment["uid"], $uids)) {
            $CI->notification->notification_insert(session("client_user_id"), $comment["uid"], addslashes($message), $link, $type, $params, date("Y-m-d H:i:s"));
            array_push($uids, $comment["uid"]);
        }
    }
}

function insert_school_like_notification() {
    $CI = & get_instance();
    $class_name = $CI->router->fetch_class();
    $function_name = $CI->router->fetch_method();
    $uri_params = $CI->uri->segment_array();
    $get_params = $CI->input->get();
    $post_params = $CI->input->post();

    $CI->load->model('client/client_forums_model', 'forum');
    $CI->load->model('client/client_notification_model', 'notification');
    $get_topic_details = $CI->forum->get_wall_discussion_details($post_params["id"]);



    $follow = $get_topic_details[0]["added_by"];
    $message = session("full_name") . " has liked your Discussion";
    $link = SITE_URL . "college/" . clean_string($get_topic_details[0]['school_name']) . "/" . $post_params["sid"] . "/";
    $type = "School Discussion Liked";
    $params = json_encode(array($class_name, $function_name, $get_params, $post_params, $uri_params));

    $CI->notification->notification_insert(session("client_user_id"), $follow, addslashes($message), $link, $type, $params, date("Y-m-d H:i:s"));
}

function insert_school_comment_notification() {
    $CI = & get_instance();
    $class_name = $CI->router->fetch_class();
    $function_name = $CI->router->fetch_method();
    $uri_params = $CI->uri->segment_array();
    $get_params = $CI->input->get();
    $post_params = $CI->input->post();

    $CI->load->model('client/client_forums_model', 'forum');
    $CI->load->model('client/client_notification_model', 'notification');
    $get_topic_details = $CI->forum->get_wall_discussion_details($post_params["id"]);



    $follow = $get_topic_details[0]["added_by"];
    $comments = json_decode($get_topic_details[0]["comments"], true);
    $message = session("full_name") . " has commented on your Discussion";
    $link = SITE_URL . "college/" . clean_string($get_topic_details[0]['school_name']) . "/" . $post_params["sid"] . "/";
    $type = "School Discussion Commented";
    $params = json_encode(array($class_name, $function_name, $get_params, $post_params, $uri_params));

    if ($follow != session('client_user_id')) {
        $CI->notification->notification_insert(session("client_user_id"), $follow, addslashes($message), $link, $type, $params, date("Y-m-d H:i:s"));
    }
    $uids = array();
    foreach ($comments as $comment) {
        $message = session("full_name") . " has commented on a Discussion that you've commented on";
        if ($comment["uid"] !== $follow && $comment["uid"] != session("client_user_id") && !in_array($comment["uid"], $uids)) {
            $CI->notification->notification_insert(session("client_user_id"), $comment["uid"], addslashes($message), $link, $type, $params, date("Y-m-d H:i:s"));
            array_push($uids, $comment["uid"]);
        }
    }
}

function insert_comm_like_notification() {
    $CI = & get_instance();
    $class_name = $CI->router->fetch_class();
    $function_name = $CI->router->fetch_method();
    $uri_params = $CI->uri->segment_array();
    $get_params = $CI->input->get();
    $post_params = $CI->input->post();

    $CI->load->model('client/client_communities_model', 'forum');
    $CI->load->model('client/client_notification_model', 'notification');
    $get_topic_details = $CI->forum->get_wall_discussion_details($post_params["id"]);



    $follow = $get_topic_details[0]["d_by"];
    $message = session("full_name") . " has liked your Discussion";
    $link = SITE_URL . "communities/" . urlclean($get_topic_details[0]["cname"]) . "/" . $get_topic_details[0]["id"] . "/";
    $type = "Community Discussion Liked";
    $params = json_encode(array($class_name, $function_name, $get_params, $post_params, $uri_params));

    $CI->notification->notification_insert(session("client_user_id"), $follow, addslashes($message), $link, $type, $params, date("Y-m-d H:i:s"));
}

function insert_comm_comment_notification() {
    $CI = & get_instance();
    $class_name = $CI->router->fetch_class();
    $function_name = $CI->router->fetch_method();
    $uri_params = $CI->uri->segment_array();
    $get_params = $CI->input->get();
    $post_params = $CI->input->post();

    $CI->load->model('client/client_communities_model', 'forum');
    $CI->load->model('client/client_notification_model', 'notification');
    $get_topic_details = $CI->forum->get_wall_discussion_details($post_params["id"]);



    $follow = $get_topic_details[0]["d_by"];
    $comments = json_decode($get_topic_details[0]["comments"], true);
    $message = session("full_name") . " has commented on your Discussion";
    $link = SITE_URL . "communities/" . urlclean($get_topic_details[0]["cname"]) . "/" . $get_topic_details[0]["id"] . "/";
    $type = "Community Discussion Commented";
    $params = json_encode(array($class_name, $function_name, $get_params, $post_params, $uri_params));

    if ($follow != session('client_user_id')) {
        $CI->notification->notification_insert(session("client_user_id"), $follow, addslashes($message), $link, $type, $params, date("Y-m-d H:i:s"));
    }
    $uids = array();
    foreach ($comments as $comment) {
        $message = session("full_name") . " has commented on a Discussion that you've commented on";
        if ($comment["uid"] !== $follow && $comment["uid"] != session("client_user_id") && !in_array($comment["uid"], $uids)) {
            $CI->notification->notification_insert(session("client_user_id"), $comment["uid"], addslashes($message), $link, $type, $params, date("Y-m-d H:i:s"));
            array_push($uids, $comment["uid"]);
        }
    }
}

function get_all_user_ids() {
    $CI = & get_instance();
    $get_users = $CI->db->query("select distinct id from user where id !=" . session("client_user_id"));
    return $get_users->result_array();
}
