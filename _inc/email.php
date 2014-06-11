<?php

// require_once('database.php');
// include ("class/config.php");
session_start();

// DATABASE CONNECTION SETTINGS // 
function emailSent($email, $name, $message, $subject, $reply_email = "no-reply@creativedge.com.sg", $reply_name = "NUS MBA", $username = "", $password = "", $host = "mail.creativedge.com.sg")
{
	require_once('class.phpmailer.php');	
	$mail  = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth      = true;
	$mail->SMTPKeepAlive = true;
	$mail->Host          = $host;
	$mail->Port          = 25;
	$mail->Username      = $username;
	$mail->Password      = $password;
	$mail->AddReplyTo($reply_email,$reply_name);
	$mail->SetFrom($reply_email, $reply_name);
	$mail->AddReplyTo($reply_email,$reply_name);
	$mail->AddAddress($email, $name);
	
	$mail->Subject = $subject;
	$mail->MsgHTML($message);

	
	// EMAIL SUBMIT
	$mail->Send();
}


if ($_POST['submit'] == "Submit") {

    // echo $_SESSION['security_code'];


   if( $_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code'] ) ) {

        // Insert you code for processing the form here, e.g emailing the submission, entering it into a database. 

    $lname = htmlspecialchars(trim($_POST['lname']));
    $fname = htmlspecialchars(trim($_POST['fname']));
    // $ = htmlspecialchars(trim($_POST['']));
    $company = htmlspecialchars(trim($_POST['company']));
    $message = htmlspecialchars(trim($_POST['message']));
    $email = htmlspecialchars(trim($_POST['email']));

        // EMAIL CONTENT DISPLAY
        $email_message = "<html><head></head><body>";
        $email_message .= "<p style='FONT-SIZE: 13pt; font-family: arial;'><b>Signup Form :</b></p>";
        $email_message .= "<table width=\"600\" border=\"0\" align=\"left\" cellpadding=\"1\" cellspacing=\"3\">";
        $email_message .= "<tr>";
        $email_message .= "<td width='180'>Name</td>";
        $email_message .= "<td width='480'>" . $fname . " " . $lname . "</td>";
        $email_message .= "</tr>";
        $email_message .= "<tr>";
        $email_message .= "<td width='180'>Company Name</td>";
        $email_message .= "<td width='480'>". $company . "</td>";
        $email_message .= "</tr>";
        $email_message .= "<tr>";
        $email_message .= "<td width='180'>Email</td>";
        $email_message .= "<td width='480'>". $email . "</td>";
        $email_message .= "</tr>";
        $email_message .= "<tr>";
        $email_message .= "<td width='180'>Message</td>";
        $email_message .= "<td width='480' align='top'>". $message . "</td>";
        $email_message .= "</tr>";
        $email_message .= "</table></p><br></body></html>";

        emailSent("rex@mashroom.sg", "Admin", $email_message, $subject = "Folio Editing", $reply_email = "$email", $reply_name = "$fname", $username = "no-reply@creativedge.com.sg", $password = "ce*chuchu0877");

        // return true;
        echo "true";

        unset($_SESSION['security_code']);


   } else {

        // Insert your code for showing an error message here

       // return false;
       echo "false";
        // echo 'Sorry, you have provided an invalid security code';

   }
}
