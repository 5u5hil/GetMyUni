<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Client_Follow_User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('client/client_user_model', 'model');
    }

    function follow_user_info() {
        //display($_POST);   
        if (session('client_user_id')) {
            
            if($_POST["user_following"] == 1)
            {
            
                $id = $_POST["student_id"];
                $follwer_details = $this->model->user_following_details(session('client_user_id'));
               // display($follwer_details[0]['user_following']);
                //display(session('client_user_id'));
                $user_following = json_decode($follwer_details[0]['user_following']);
                //display($user_following);
                array_push($user_following, $id);
                $user_following = json_encode($user_following);
                $update_user = $this->model->save_following_details($id, $user_following);
                insert_user_follow_notification();
                insert_user_follow_user($id);
                 echo "success";
            }
            else if($_POST["user_following"] == 0) 
            {
                
                $id = $_POST["student_id"];
            $follwer_details = $this->model->user_following_details(session('client_user_id'));
             $user_following = json_decode($follwer_details[0]['user_following'],true);
            $key = array_search($id,  $user_following);
            unset($user_following[$key]);
            $user_following = json_encode($user_following);
            $update_user = $this->model->save_following_details($id, $user_following);
            echo "delete";
            }
        }
    }

}

?>