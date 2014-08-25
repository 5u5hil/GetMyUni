<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Client_Communities extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('client/client_communities_model');
    }

    function client_communities_view($pageno = 1) {
        $total_rows = $this->client_communities_model->get_total_communities_count();
        $data['total_row'] = $total_rows[0]['count'];
        $pagination_url = SITE_URL . "communities/";
        $uri_segment = 2;
        $pageno = ($pageno - 1) * COMMUNITIES_PER_PAGE;
        $data['pagination'] = client_pagiantion($pagination_url, $data['total_row'], COMMUNITIES_PER_PAGE, $pageno, $uri_segment);
        $data['communities'] = $this->client_communities_model->get_all_communities($pageno, COMMUNITIES_PER_PAGE);
        $this->load->view(CLIENT_COMMUNITIES_VIEW, $data);
    }

    function client_com_details_view($id) {

        $data["community"] = $this->client_communities_model->get_community_details($id);
        $data["events"] = $this->client_communities_model->get_community_events($id);
        $this->load->view(CLIENT_COMMUNITIES_DETAILS_VIEW, $data);
    }

    function community_insert() {
        $name = $_POST["cname"];
        $members = array();
        array_push($members, session("client_user_id"));
        $user_id = session("client_user_id");
        $time = date("Y-m-d H:i:s");
        $desc = $_POST["desc"];

        if (isset($_FILES["file"])) {
            $config['upload_path'] = './uploads/comm_pics/';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload("file")) {
                $pic = '';
            } else {
                $data = array('upload_data' => $this->upload->data());

                $pic = $data["upload_data"]["file_name"];
            }
        }

        $insert = $this->client_communities_model->insert_new_community($name, json_encode($members), $user_id, $time, $pic, $desc);
        if ($insert) {
            $uri = urlclean(strtolower($insert[0]['cname']));
            insert_new_community_notification($insert[0]['id'], $uri);
            redirect(SITE_URL . "communities/$uri/" . $insert[0]["id"] . "/");
        }
    }

    function community_join_insert() {
        if (session('client_user_id')) {
            $id = $_POST["cid"];
            $comm_details = $this->client_communities_model->get_community_details($id);
            $members = json_decode($comm_details[0]['members']);
            array_push($members, session('client_user_id'));
            $members = json_encode($members);
            $update_members = $this->client_communities_model->update_community_members($id, $members);
            if ($update_members) {
                insert_comm_user_join_notification();
            }
        }
    }

    function community_wall($community_id, $pageno = 1) {
        $this->load->model('client/client_forums_model');
        if (session("client_user_id")) {
            $get_type = $this->client_forums_model->get_user_details(session("client_user_id"));
            if ($get_type[0]["user_type"] == "admin_user") {
                $this->session->set_userdata(array("is_admin" => 1));
            }
            if ($get_type[0]["user_type"] == "admin_user") {
                $this->session->set_userdata(array("is_admin" => 1));
            } else {
                $this->session->unset_userdata("is_admin");
            }
        }
        $data["uriseg"] = $this->uri->segment(6);
        $total_rows = $this->client_communities_model->get_total_communities_discussions_count($community_id);
        $data['total_row'] = $total_rows[0]['count'];
        $pagination_url = CLIENT_SITE_URL . "client_communities/community_wall/$community_id/";
        $uri_segment = 5;
        $pageno = ($pageno - 1) * FORUM_DISCUSSION_PER_PAGE;
        $data['pagination'] = client_pagiantion($pagination_url, $data['total_row'], FORUM_DISCUSSION_PER_PAGE, $pageno, $uri_segment);
        $data['discussions'] = $this->client_communities_model->get_all_communities_discussions($community_id, $pageno, FORUM_DISCUSSION_PER_PAGE);
        $this->load->view(CLIENT_COMMUNITY_WALL_VIEW, $data);
    }

    function community_unjoin_insert() {
        if (session('client_user_id')) {
            $id = $_POST["cid"];
            $comm_details = $this->client_communities_model->get_community_details($id);
            $members = json_decode($comm_details[0]['members'], true);
            $key = array_search(session('client_user_id'), $members);
            unset($members[$key]);
            $members = json_encode($members);
            $update_members = $this->client_communities_model->update_community_members($id, $members);
            if ($update_members) {
                
            }
        }
    }

    function wall_discussion_comment_insert() {
        $id = $_POST["id"];
        $comment = $_POST["comment"];
        $discussion_details = $this->client_communities_model->get_wall_discussion_details($id);
        $comments = json_decode($discussion_details[0]['comments']);
        $comments_count = count($comments) + 1;
        $newComment = array("cid" => $comments_count, "uid" => session('client_user_id'), "comment" => $comment, "time" => date("Y-m-d H:i:s"));
        array_push($comments, $newComment);
        $comments = json_encode($comments);
        $update_comments = $this->client_communities_model->update_wall_discussion_comments($id, $comments);
        if ($update_comments) {
            $this->load->model('client/client_forums_model');
            $get_user_details = $this->client_forums_model->get_user_details(session('client_user_id'));
            $pic = json_decode($get_user_details[0]["profile_pic"], true);
            $pic = $pic[0];
            echo $get_user_details[0]["name"] . "|" . ($pic ? $pic : CLIENT_IMAGES . "defaultuser.jpg");
            insert_comm_comment_notification();
        }
    }

    function wall_discussion_like_insert() {
        $id = $_POST["id"];
        $community_id = $_POST["cid"];
        $discussion_details = $this->client_communities_model->get_wall_discussion_details($id);
        $likes = json_decode($discussion_details[0]['likes']);
        array_push($likes, session('client_user_id'));
        $likes = json_encode($likes);
        $update_likes = $this->client_communities_model->update_wall_discussion_likes($id, $likes);
        if ($update_likes) {
            insert_comm_like_notification();
        }
    }

    function wall_discussion_unlike_insert() {
        $id = $_POST["id"];
        $community_id = $_POST["cid"];
        $discussion_details = $this->client_communities_model->get_wall_discussion_details($id);
        $likes = json_decode($discussion_details[0]['likes'], true);
        $key = array_search(session('client_user_id'), $likes);
        unset($likes[$key]);
        $likes = json_encode($likes);
        $update_likes = $this->client_communities_model->update_wall_discussion_likes($id, $likes);
        if ($update_likes) {
            
        }
    }

    function wall_discussion_insert() {
        $community_id = $_POST['community_id'];
        $npost = $_POST['dname'];

        if (isset($_FILES["file"])) {
            $config['upload_path'] = './uploads/wall_pics/';
            $config['allowed_types'] = 'gif|jpg|png';


            $this->load->library('upload', $config);

            if (!$this->upload->do_upload("file")) {
                $error = array('error' => $this->upload->display_errors());

                var_dump($error);
            } else {
                $data = array('upload_data' => $this->upload->data());

                $npost .= "|~~~~~~~~|" . $data["upload_data"]["file_name"];
            }
        }


        $comments = json_encode(array());
        $likes = json_encode(array());
        $insert = $this->client_communities_model->insert_new_wall_discussion($community_id, session('client_user_id'), addslashes($npost), date("Y-m-d H:i:s"), $comments, $likes);
        if ($insert) {
            insert_comm_discussion_notification();
            redirect(CLIENT_SITE_URL . 'client_communities/community_wall/' . $community_id . '/1/' . $_POST['uriseg'] . '/');
        }
    }

    function wall_discussion_spam_send() {
        $id = $_POST["id"];
        $url = $_POST["url"];
        $discussion_details = $this->client_communities_model->get_wall_discussion_details($id);

        $discussion_title = $discussion_details[0]['disc'];
        $topic = $discussion_details[0]['cname'];


        $message = "
         Dear Admin, <br />
         " . session("full_name") . " has reported one of the wall discussions as SPAM. Here are the details : <br />
          Discussion : $discussion_title <br />
          Community : $topic <br />
        
          
          URL : $url
                
                ";

        ini_set("SMTP", "aspmx.l.google.com");
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= "From: test@gmail.com" . "\r\n";
        mail(session('client_email'), "Wall Discussion Spam Reported", $message, $headers);
    }

    function wall_comment_spam_send() {
        $id = $_POST["id"];
        $cid = $_POST["cid"];
        $url = $_POST["url"];
        $discussion_details = $this->client_communities_model->get_wall_discussion_details($id);

        $discussion_title = $discussion_details[0]['disc'];
        $topic = $discussion_details[0]['cname'];

        $comments = json_decode($discussion_details[0]['comments'], true);

        $key = $this->searchForKey('cid', $cid, $comments);

        $message = "
         Dear Admin, <br />
         " . session("full_name") . " has reported one of the wall comments as SPAM. Here are the details : <br />
          
          Comment : " . $comments[$key]['comment'] . " <br />
          Discussion : $discussion_title <br />
          Community : $topic <br />
        
          
          URL : $url
                
                ";


        ini_set("SMTP", "aspmx.l.google.com");
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= "From: test@gmail.com" . "\r\n";
        mail(session('client_email'), "Wall Comment Spam Reported", $message, $headers);
    }

    function delete_wall_discussion() {
        $id = $_POST["id"];
        $delete_wall_discussion = $this->client_communities_model->delete_wall_discussion($id);
    }

    function delete_wall_discussion_comment() {
        $id = $_POST["id"];
        $did = $_POST["did"];
        $discussion_details = $this->client_communities_model->get_wall_discussion_details($did);
        $comments = json_decode($discussion_details[0]['comments'], true);

        $key = $this->searchForKey('cid', $id, $comments);
        unset($comments[$key]);
        $comments = json_encode($comments);
        $update_comments = $this->client_communities_model->update_wall_discussion_comments($did, $comments);
    }

    function searchForKey($keyy, $value, $array) {
        foreach ($array as $key => $val) {
            if ($val[$keyy] == $value) {
                return $key;
            }
        }
        return null;
    }

    function event_insert() {
        $name = $_POST["ename"];
        $members = array();
        array_push($members, session("client_user_id"));
        $user_id = session("client_user_id");
        $time = date("Y-m-d H:i:s");
        $edate = date('Y-m-d', strtotime($_POST["edate"]));
        $etime = $_POST["etime"];
        $location = $_POST["location"];
        $desc = $_POST["desc"];
        $cid = $_POST["cid"];

        if (isset($_FILES["file"])) {
            $config['upload_path'] = './uploads/comm_pics/';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload("file")) {
                $pic = '';
            } else {
                $data = array('upload_data' => $this->upload->data());

                $pic = $data["upload_data"]["file_name"];
            }
        }

        $insert = $this->client_communities_model->insert_new_event($name, $cid, json_encode($members), $user_id, $time, $pic, $desc, $edate, $etime, $location);
        if ($insert) {
            insert_new_event_notification();
            $uri = $_POST["uriseg"];
            redirect(SITE_URL . "communities/$uri/$cid/");
        }
    }

    function search_users() {
        $term = $_GET["term"];
        $getUsers = $this->client_communities_model->get_users($term);

        echo json_encode($getUsers);
    }

    function send_join_invite() {
        
    }

}
