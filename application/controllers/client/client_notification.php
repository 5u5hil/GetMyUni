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

    function message_view() {

        $this->load->view(CLIENT_MESSAGE_VIEW);
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
                    $pic = $pic ? $pic : CLIENT_IMAGES . "defaultuser.jpg";
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
                    $pic = $pic ? $pic : CLIENT_IMAGES . "defaultuser.jpg";
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

}
