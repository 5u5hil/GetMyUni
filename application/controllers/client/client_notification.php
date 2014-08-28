<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Client_notification extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('client/client_notification_model', 'notification');
    }

    function notification_view() {

        $data["notifications"] = $this->notification->get_unread_notifications(session("client_user_id"));
        $this->notification->update_unread_notifications(session("client_user_id"));
        $this->load->view(CLIENT_NOTIFICATION_VIEW, $data);
    }

    function get_unread_notification_count() {
        echo $count = $this->notification->get_unread_notification_count(session("client_user_id"));
    }

    function get_unread_message_count() {
        echo $count = $this->notification->get_unread_message_count(session("client_user_id"));
    }

    function message_view($pageno = 1) {
        $total_rows = $this->notification->get_total_messages_count(session("client_user_id"));
        $data['total_row'] = $total_rows[0]['count'];
        $pagination_url = SITE_URL . "messages/";
        $uri_segment = 2;
        $pageno = ($pageno - 1) * MESSAGES_PER_PAGE;
        $data['pagination'] = client_pagiantion($pagination_url, $data['total_row'], MESSAGES_PER_PAGE, $pageno, $uri_segment);
        $data['messages'] = $this->notification->get_all_messages(session("client_user_id"), $pageno, MESSAGES_PER_PAGE);

        $this->load->view(CLIENT_MESSAGE_VIEW, $data);
    }

    function get_new_ticks() {
        if (isset($_POST["id"]) && $_POST["id"] != "") {
            $id = $_POST["id"];
            $ticks = $this->notification->get_new_ticker_notifications(session("client_user_id"), $id);
            $data = "";
            if (is_array($ticks)) {
                foreach ($ticks as $tick) {
                    $user = get_user_details($tick["from"]);
                    $pic = json_decode($user[0]["profile_pic"], true);
                    $pic = $pic[0] ? $pic[0] : CLIENT_IMAGES . "defaultuser.jpg";
                    $data.= "
                        <li data-tid='" . $tick["id"] . "'>
                            <a href='" . $tick["link"] . "'><img src='" . $pic . "' class='img-responsive ticker-img' />
                                " . $tick["message"] . "
                            </a>
                        </li>";
                }
                echo $data;
            }
        } else {
            $ticks = $this->notification->get_ticker_notifications(session("client_user_id"));
            $data = "";
            if (is_array($ticks)) {
                foreach ($ticks as $tick) {
                    $user = get_user_details($tick["from"]);
                    $pic = json_decode($user[0]["profile_pic"], true);
                    $pic = $pic[0] ? $pic[0] : CLIENT_IMAGES . "defaultuser.jpg";
                    $data.= "
                        <li data-tid='" . $tick["id"] . "'>
                            <a href='" . $tick["link"] . "'><img src='" . $pic . "' class='img-responsive ticker-img' />
                                " . $tick["message"] . "
                            </a>
                        </li>";
                }
                echo $data;
            }
        }
    }

    function message_insert() {
        $to = is_numeric($_POST["to"]) ? $_POST["to"] : get_user_id_email(trim($_POST["to"]));
        $sub = addslashes($_POST["sub"]);
        $message = addslashes($_POST["msg"]);
        $pid = isset($_POST["pid"]) ? $_POST["pid"] : 0;

        $insert = $this->notification->message_insert(session("client_user_id"), $to, $sub, $message, $pid);

        if ($insert) {
            if ($pid == 0) {
                redirect(SITE_URL . "messages/1/");
            } else {
                $update = $this->notification->update_parent_thread_time($pid);
                if ($update) {
                    redirect(SITE_URL . "message/$pid/");
                }
            }
        }
    }

    function message_detail_view($id) {
        $data["pid"] = $id;
        $data['messages'] = $this->notification->get_message_thread($id);
        $this->load->view(CLIENT_MESSAGE_DETAIL_VIEW, $data);
        $this->notification->update_unread_message($id, session("client_user_id"));
    }

}
