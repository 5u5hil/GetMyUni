<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Client_Forums extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('client/client_forums_model');
    }

    function forum_list_view($pageno = 1) {
        $total_rows = $this->client_forums_model->get_total_forums_count();
        $data['total_row'] = $total_rows[0]['count'];
        $pagination_url = SITE_URL . "forums/";
        $uri_segment = 2;
        $pageno = ($pageno - 1) * FORUM_DISCUSSION_PER_PAGE;
        $data['pagination'] = client_pagiantion($pagination_url, $data['total_row'], FORUM_DISCUSSION_PER_PAGE, $pageno, $uri_segment);
        $data['forums'] = $this->client_forums_model->get_all_forums($pageno, FORUM_DISCUSSION_PER_PAGE);
        $this->load->view(CLIENT_FORUMS_LIST_VIEW, $data);
    }

    function forum_details_view($id, $pageno = 1) {
        $data['forum_details'] = $this->client_forums_model->get_forum_details($id);
        $total_rows = $this->client_forums_model->get_total_topics_count($id);
        $data['total_row'] = $total_rows[0]['count'];
        $pagination_url = SITE_URL . "forums/" . $this->uri->segment(2, 0) . "/$id/";
        $uri_segment = 4;
        $pageno = ($pageno - 1) * FORUM_DISCUSSION_PER_PAGE;
        $data['pagination'] = client_pagiantion($pagination_url, $data['total_row'], FORUM_DISCUSSION_PER_PAGE, $pageno, $uri_segment);
        $data['topics'] = $this->client_forums_model->get_all_topics($id, $pageno, FORUM_DISCUSSION_PER_PAGE);
        $this->load->view(CLIENT_FORUMS_DETAILS_VIEW, $data);
    }

    function forum_topic_view($forum_id, $id, $pageno = 1) {
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

        $data['topic_details'] = $this->client_forums_model->get_topic_details($id);
        $total_rows = $this->client_forums_model->get_total_discussions_count($id);
        $data['total_row'] = $total_rows[0]['count'];
        $pagination_url = SITE_URL . "forums/" . $this->uri->segment(2, 0) . "/$forum_id/$id/";
        $uri_segment = 5;
        $pageno = ($pageno - 1) * FORUM_DISCUSSION_PER_PAGE;
        $data['pagination'] = client_pagiantion($pagination_url, $data['total_row'], FORUM_DISCUSSION_PER_PAGE, $pageno, $uri_segment);
        $data['discussions'] = $this->client_forums_model->get_all_discussions($id, $pageno, FORUM_DISCUSSION_PER_PAGE);
        $this->load->view(CLIENT_FORUMS_TOPIC_VIEW, $data);
    }

    function topic_insert() {
        $forum_id = $_POST['forum_id'];
        $followers = json_encode(array());
        $insert = $this->client_forums_model->insert_new_topic($forum_id, session('client_user_id'), addslashes($_POST['tname']), date("Y-m-d H:i:s"), $followers);
        if ($insert) {
            $this->session->set_userdata('topic_insert_id', $insert);
            $forum_details = $this->client_forums_model->get_forum_details($forum_id);
            $update_forum_topic_count = $this->client_forums_model->update_forum_topic_count($forum_id, $forum_details[0]['topics_cnt']);
            if ($update_forum_topic_count) {
                redirect(SITE_URL . "forums/" . $_POST['uriseg'] . "/$forum_id/1/");
            }
        }
    }

    function discussion_insert() {
        $forum_id = $_POST['forum_id'];
        $id = $_POST['id'];
        $comments = json_encode(array());
        $likes = json_encode(array());
        $insert = $this->client_forums_model->insert_new_discussion($forum_id, $id, session('client_user_id'), addslashes($_POST['dname']), date("Y-m-d H:i:s"), $comments, $likes);
        if ($insert) {
            $this->session->set_userdata('discussion_insert_id', $insert);
            $topic_details = $this->client_forums_model->get_topic_details($id);
            insert_discussion_notification();
            $update_topic_discussion_count = $this->client_forums_model->update_topic_replies_count($forum_id, $id, $topic_details[0]['replies_cnt']);
            if ($update_topic_discussion_count) {
                $forum_details = $this->client_forums_model->get_forum_details($forum_id);
                $update_forum_topic_count = $this->client_forums_model->update_forum_replies_count($forum_id, $forum_details[0]['replies_cnt']);
                if ($update_forum_topic_count) {
                    redirect(SITE_URL . 'forums/' . $_POST['uriseg'] . '/' . $_POST['forum_id'] . '/' . $_POST['id'] . '/1/');
                }
            }
        }
    }

    function discussion_comment_insert() {
        $id = $_POST["id"];
        $topic_id = $_POST["tid"];
        $forum_id = $_POST["fid"];
        $comment = $_POST["comment"];
        $discussion_details = $this->client_forums_model->get_discussion_details($id);
        $comments = json_decode($discussion_details[0]['comments']);
        $comments_count = count($comments) + 1;
        $newComment = array("cid" => $comments_count, "uid" => session('client_user_id'), "comment" => $comment, "time" => date("Y-m-d H:i:s"));
        array_push($comments, $newComment);
        $comments = json_encode($comments);
        $update_comments = $this->client_forums_model->update_discussion_comments($id, $comments);
        if ($update_comments) {
            $topic_details = $this->client_forums_model->get_topic_details($topic_id);
            $update_topic_discussion_count = $this->client_forums_model->update_topic_replies_count($forum_id, $topic_id, $topic_details[0]['replies_cnt']);
            if ($update_topic_discussion_count) {
                $forum_details = $this->client_forums_model->get_forum_details($forum_id);
                $update_forum_topic_count = $this->client_forums_model->update_forum_replies_count($forum_id, $forum_details[0]['replies_cnt']);
                if ($update_forum_topic_count) {
                    insert_comment_notification();
                    $get_user_details = $this->client_forums_model->get_user_details(session('client_user_id'));
                    $pic = json_decode($get_user_details[0]["profile_pic"], true);
                    $pic = $pic[0];
                    echo $get_user_details[0]["name"] . "|" . ($pic ? $pic : CLIENT_IMAGES . "defaultuser.jpg");
                }
            }
        }
    }

    function delete_discussion() {
        $id = $_POST["id"];
        $delete_discussion = $this->client_forums_model->delete_discussion($id);
    }

    function delete_wall_discussion() {
        $id = $_POST["id"];
        $delete_wall_discussion = $this->client_forums_model->delete_wall_discussion($id);
    }

    function delete_discussion_comment() {
        $id = $_POST["id"];
        $did = $_POST["did"];
        $discussion_details = $this->client_forums_model->get_discussion_details($did);
        $comments = json_decode($discussion_details[0]['comments'], true);

        $key = $this->searchForKey('cid', $id, $comments);
        unset($comments[$key]);
        $comments = json_encode($comments);
        $update_comments = $this->client_forums_model->update_discussion_comments($did, $comments);
    }

    function delete_wall_discussion_comment() {
        $id = $_POST["id"];
        $did = $_POST["did"];
        $discussion_details = $this->client_forums_model->get_wall_discussion_details($did);
        $comments = json_decode($discussion_details[0]['comments'], true);

        $key = $this->searchForKey('cid', $id, $comments);
        unset($comments[$key]);
        $comments = json_encode($comments);
        $update_comments = $this->client_forums_model->update_wall_discussion_comments($did, $comments);
    }

    function searchForKey($keyy, $value, $array) {
        foreach ($array as $key => $val) {
            if ($val[$keyy] == $value) {
                return $key;
            }
        }
        return null;
    }

    function discussion_like_insert() {
        $id = $_POST["id"];
        $topic_id = $_POST["tid"];
        $forum_id = $_POST["fid"];
        $discussion_details = $this->client_forums_model->get_discussion_details($id);
        $likes = json_decode($discussion_details[0]['likes']);
        array_push($likes, session('client_user_id'));
        $likes = json_encode($likes);
        $update_likes = $this->client_forums_model->update_discussion_likes($id, $likes);
        if ($update_likes) {
            $update_topic_discussion_time = $this->client_forums_model->update_topic_discussion_time($topic_id);
            if ($update_topic_discussion_time) {
                $update_forum_topic_time = $this->client_forums_model->update_forum_topic_time($forum_id);
                if ($update_forum_topic_time) {
                    insert_like_notification();
                }
            }
        }
    }

    function topic_follow_insert() {
        if (session('client_user_id')) {
            $topic_id = $_POST["tid"];
            $forum_id = $_POST["fid"];
            $discussion_details = $this->client_forums_model->get_topic_details($topic_id);
            $followers = json_decode($discussion_details[0]['followers']);
            array_push($followers, session('client_user_id'));
            $followers = json_encode($followers);
            $update_followers = $this->client_forums_model->update_topic_followers($topic_id, $followers);
            if ($update_followers) {
                $update_forum_topic_time = $this->client_forums_model->update_forum_topic_time($forum_id);
                if ($update_forum_topic_time) {
                    
                }
            }
        }
    }

    function topic_unfollow_insert() {
        $topic_id = $_POST["tid"];
        $forum_id = $_POST["fid"];
        $discussion_details = $this->client_forums_model->get_topic_details($topic_id);
        $followers = json_decode($discussion_details[0]['followers'], true);
        $key = array_search(session('client_user_id'), $followers);
        unset($followers[$key]);
        $followers = json_encode($followers);
        $update_followers = $this->client_forums_model->update_topic_followers($topic_id, $followers);
        if ($update_followers) {
            $update_forum_topic_time = $this->client_forums_model->update_forum_topic_time($forum_id);
            if ($update_forum_topic_time) {
                
            }
        }
    }

    function discussion_unlike_insert() {
        $id = $_POST["id"];
        $topic_id = $_POST["tid"];
        $forum_id = $_POST["fid"];
        $discussion_details = $this->client_forums_model->get_discussion_details($id);
        $likes = json_decode($discussion_details[0]['likes'], true);
        $key = array_search(session('client_user_id'), $likes);
        unset($likes[$key]);
        $likes = json_encode($likes);
        $update_likes = $this->client_forums_model->update_discussion_likes($id, $likes);
        if ($update_likes) {
            $update_topic_discussion_time = $this->client_forums_model->update_topic_discussion_time($topic_id);
            if ($update_topic_discussion_time) {
                $update_forum_topic_time = $this->client_forums_model->update_forum_topic_time($forum_id);
                if ($update_forum_topic_time) {
                    
                }
            }
        }
    }

    function wall_discussion_comment_insert() {
        $id = $_POST["id"];
        $school_id = $_POST["sid"];
        $comment = $_POST["comment"];
        $discussion_details = $this->client_forums_model->get_wall_discussion_details($id);
        $comments = json_decode($discussion_details[0]['comments']);
        $comments_count = count($comments) + 1;
        $newComment = array("cid" => $comments_count, "uid" => session('client_user_id'), "comment" => $comment, "time" => date("Y-m-d H:i:s"));
        array_push($comments, $newComment);
        $comments = json_encode($comments);
        $update_comments = $this->client_forums_model->update_wall_discussion_comments($id, $comments);
        if ($update_comments) {
            $get_user_details = $this->client_forums_model->get_user_details(session('client_user_id'));
            $pic = json_decode($get_user_details[0]["profile_pic"], true);
            $pic = $pic[0];
            echo $get_user_details[0]["name"] . "|" . ($pic ? $pic : CLIENT_IMAGES . "defaultuser.jpg");
            insert_school_comment_notification();
        }
    }

    function wall_discussion_like_insert() {
        $id = $_POST["id"];
        $school_id = $_POST["sid"];
        $discussion_details = $this->client_forums_model->get_wall_discussion_details($id);
        $likes = json_decode($discussion_details[0]['likes']);
        array_push($likes, session('client_user_id'));
        $likes = json_encode($likes);
        $update_likes = $this->client_forums_model->update_wall_discussion_likes($id, $likes);
        if ($update_likes) {
            insert_school_like_notification();  
        }
    }

    function wall_discussion_unlike_insert() {
        $id = $_POST["id"];
        $school_id = $_POST["sid"];
        $discussion_details = $this->client_forums_model->get_wall_discussion_details($id);
        $likes = json_decode($discussion_details[0]['likes'], true);
        $key = array_search(session('client_user_id'), $likes);
        unset($likes[$key]);
        $likes = json_encode($likes);
        $update_likes = $this->client_forums_model->update_wall_discussion_likes($id, $likes);
        if ($update_likes) {
            
        }
    }

    function wall_discussion_insert() {
        $school_id = $_POST['school_id'];
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
        $insert = $this->client_forums_model->insert_new_wall_discussion($school_id, session('client_user_id'), addslashes($npost), date("Y-m-d H:i:s"), $comments, $likes);
        if ($insert) {
            redirect(CLIENT_SITE_URL . 'client_college/get_college_wall/' . $school_id . '/1/' . $_POST['uriseg'] . '/');
        }
    }

    function discussion_spam_send() {
        $id = $_POST["id"];
        $url = $_POST["url"];
        $discussion_details = $this->client_forums_model->get_discussion_details($id);

        $discussion_title = $discussion_details[0]['disc'];
        $topic = $discussion_details[0]['topic'];
        $forum = $discussion_details[0]['fname'];

        $message = "
         Dear Admin, <br />
         " . session("full_name") . " has reported one of the discussions as SPAM. Here are the details : <br />
          Discussion : $discussion_title <br />
          Topic : $topic <br />
          Forum : $forum <br />
          
          URL : $url
                
                ";

        ini_set("SMTP", "aspmx.l.google.com");
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= "From: test@gmail.com" . "\r\n";
        mail(session('client_email'), "Discussion Spam Reported", $discussion_title . $topic . $forum . $url, $headers);
    }

    function comment_spam_send() {
        $id = $_POST["id"];
        $cid = $_POST["cid"];
        $url = $_POST["url"];
        $discussion_details = $this->client_forums_model->get_discussion_details($id);

        $discussion_title = $discussion_details[0]['disc'];
        $topic = $discussion_details[0]['topic'];
        $forum = $discussion_details[0]['fname'];
        $comments = json_decode($discussion_details[0]['comments'], true);

        $key = $this->searchForKey('cid', $cid, $comments);

        $message = "
         Dear Admin, <br />
         " . session("full_name") . " has reported one of the comments as SPAM. Here are the details : <br />
          
          Comment : " . $comments[$key]['comment'] . " <br />
          Discussion : $discussion_title <br />
          Topic : $topic <br />
          Forum : $forum <br />
          
          URL : $url
                
                ";


        ini_set("SMTP", "aspmx.l.google.com");
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= "From: test@gmail.com" . "\r\n";
        mail(session('client_email'), "Comment Spam Reported", $message, $headers);
    }

    function wall_discussion_spam_send() {
        $id = $_POST["id"];
        $url = $_POST["url"];
        $discussion_details = $this->client_forums_model->get_wall_discussion_details($id);

        $discussion_title = $discussion_details[0]['disc'];
        $topic = $discussion_details[0]['school_name'];


        $message = "
         Dear Admin, <br />
         " . session("full_name") . " has reported one of the wall discussions as SPAM. Here are the details : <br />
          Discussion : $discussion_title <br />
          School : $topic <br />
        
          
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
        $discussion_details = $this->client_forums_model->get_wall_discussion_details($id);

        $discussion_title = $discussion_details[0]['disc'];
        $topic = $discussion_details[0]['school_name'];

        $comments = json_decode($discussion_details[0]['comments'], true);

        $key = $this->searchForKey('cid', $cid, $comments);

        $message = "
         Dear Admin, <br />
         " . session("full_name") . " has reported one of the wall comments as SPAM. Here are the details : <br />
          
          Comment : " . $comments[$key]['comment'] . " <br />
          Discussion : $discussion_title <br />
          School : $topic <br />
        
          
          URL : $url
                
                ";


        ini_set("SMTP", "aspmx.l.google.com");
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= "From: test@gmail.com" . "\r\n";
        mail(session('client_email'), "Wall Comment Spam Reported", $message, $headers);
    }

}

?>