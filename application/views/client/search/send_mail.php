<?php session_start();
include_once('class.phpmailer.php');
$mail = new PHPMailer(true);
	$email_from=$_REQUEST['email'];
	

//Send mail using gmail

    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 465; // set the SMTP port for the GMAIL server
    $mail->Username = "info.getmyuni@gmail.com"; // GMAIL username
    $mail->Password = "getmyuni@1234"; // GMAIL password


//Typical mail data
//$email3="sandeep.shetty@vijaygroup.com";
//$email2="webenquiries@vijaygroup.com";
//$email1="onlinead@vijaygroup.com";
$name = "GetMyUni";
//$email_from = $email_form;
//$name_from = $name_form;
$mail->AddBCC('info.getmyuni@gmail.com');
$mail->AddAddress($email_from);
$mail->SetFrom('info.getmyuni@gmail.com', $name);
$mail->Subject = "Enquiry on GetMyUni Coming soon Page";
$mail->Body ="Dear Sender,\n\nThank you for your interest in Getmyuni. We shall keep you updated\n\nPlease note that this is system generated mail. 
";

try{
    $mail->Send();
	$_SESSION['success']='Thank you for your interest in Getmyuni. We shall keep you updated.';
   header('location:index.php');
 echo "mail succesfully";
} catch(Exception $e){
    //Something went bad
 //  echo "Fail :(";
}

?>