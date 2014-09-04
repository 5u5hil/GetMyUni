<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Client_Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('client/client_login_model');
    }

    function login_validate() {
        $this->load->library('form_validation');
        $form_field = $_POST;
        if (!$form_field)
            redirect(SITE_URL . 'client/client_login_model');
        $json_array = array();
        foreach ($form_field as $key => $value) {

            $this->form_validation->set_rules($key, $key, 'required');
        }

        if ($this->form_validation->run() == FALSE) {


            $json_array['error'] = 'error';
            foreach ($form_field as $key => $value) {

                $json_array[$key . '_err'] = form_error($key);
            }
        } else {
            $json_array['error'] = 'success';
            $ans = $this->input->post();
            $this->load->model('client/client_login_model');
            $this->client_login_model->client_login($ans);
            $login_data = $this->client_login_model->client_login($ans);
            $login_info = array(
                'id' => $login_data[0]['id'],
                'name' => $login_data[0]['full_name'],
                'email' => $login_data[0]['email']
            );

            $this->session->set_userdata('login_info', $login_info);
        }
        echo json_encode($json_array);
    }

    function forgot_pass_email_validation() {
        $email = $_POST["email"];
        $id = get_user_id_email($email);
        if ($id) {
            $url = SITE_URL . "password-reset/" . urlencode(base64_encode($email));
            
            $message = '<div>
                            <table cellspacing="0" cellpadding="0" border="0" bgcolor="#ebebeb" align="center" style="max-width:600px;min-width:200px">
                                <tbody><tr>
                                        <td width="600" style="padding:10px 0px">
                                            <table width="217" cellspacing="0" cellpadding="0" border="0" align="left">
                                                <tbody><tr>
                                                        <td style="padding:14px">Hello '.get_user_name_id($id).' ,</td>

                                                    </tr>
                                                </tbody></table></td>
                                    </tr>
                                </tbody></table>

                            <table border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF" style="max-width:600px;min-width:320px;border:1px solid #e2e2e2">
                                <tbody><tr>
                                        <td valign="top" width="600">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tbody><tr>

                                                    </tr>
                                                    <tr>

                                                    </tr><tr>

                                                    </tr>
                                                    <tr>

                                                    </tr><tr>
                                                        <td height="10"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><table width="90%" border="0" cellspacing="0" cellpadding="0">
                                                                <tbody><tr>
                                                                        <td width="10"></td>
                                                                        <td style="font-family:calibri;font-size:15px;color:#1b1b1b;text-align:justify;line-height:20px">
                                                                            We have received a request to reset the password for your e-mail address. 
                                                                            <br><br>Click the link mentioned below and change your password:
                                                                            <br><a href="'.$url.'" target="_blank">Click</a>
                                                                            <br><br>If you did not request to reset your password for this ID, kindly report it to Admin 
                                                                            or ignore this email.
                                                                        </td>
                                                                        <td width="10"></td>
                                                                    </tr>
                                                                </tbody></table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" valign="top">
                                                            <div style="width:100%"></div></td>
                                                    </tr>

                                                    <tr>
                                                        <td height="10"></td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor="#5c884d"></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="20"></td>
                                                    </tr><tr>
                                        <td bgcolor="#ebebeb"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tbody><tr>
                                                        <td width="10"></td>
                                                        <td height="10"></td>
                                                        <td width="10"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                       <td height="10"></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td height="10"></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody></table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#ebebeb"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tbody><tr>
                                                        <td width="10"></td>
                                                        <td height="10"></td>
                                                        <td width="10"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td style="font-family:calibri;font-size:14px;color:#1b1b1b;text-align:center">
                                                        Feel free to write to us @ gmu@admin.com for any queries.
                                                            <br>Team Get My Uni</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td height="10"></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody></table>
                                        </td>
                                    </tr></tbody></table></td></tr></tbody></table></div>';
            $sendMail = sendMail($email, "Password Re-set Link", $message);
            if ($sendMail) {
                echo "1";
            }
        }
    }

    function reset_password($email) {
        $data["email"] = base64_decode(urldecode($email));
        $this->load->view("client/user/client_reset_password.php", $data);
    }

    function update_password() {
        $email = $_POST["email"];
        $pass = $_POST["pass"];

        $id = get_user_id_email($email);
        if ($id) {
            $update = $this->client_login_model->update_password($id, $email, md5($pass));

            if ($update) {
                echo "1";
            }
        }
    }

}
