<?php

// require_once('database.php');
include ("admin/include/config.php");

// DATABASE CONNECTION SETTINGS // 
function emailSent($email, $name, $message, $subject, $reply_email = "no-reply@creativedge.com.sg", $reply_name = "NUS MBA", $username = "", $password = "", $host = "mail.creativedge.com.sg")
{
	require_once('class/class.phpmailer.php');	
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

    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $mobile = htmlspecialchars(trim($_POST['mobile']));
    $subject1  = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

        // EMAIL CONTENT DISPLAY
        $email_message = "<html><head></head><body>";
        $email_message .= "<p style='FONT-SIZE: 13pt; font-family: arial;'><b>Ask SP :</b></p>";
        $email_message .= "<table width=\"600\" border=\"0\" align=\"left\" cellpadding=\"1\" cellspacing=\"3\">";
        $email_message .= "<tr>";
        $email_message .= "<td width='120'>Name</td>";
        $email_message .= "<td width='480'>". $name . "</td>";
        $email_message .= "</tr>";
        $email_message .= "<tr>";
        $email_message .= "<td width='120'>Email</td>";
        $email_message .= "<td width='480'>". $email . "</td>";
        $email_message .= "</tr>";
        $email_message .= "<tr>";
        $email_message .= "<td width='120'>Contact</td>";
        $email_message .= "<td width='480'>". $mobile . "</td>";
        $email_message .= "</tr>";
        $email_message .= "<tr>";
        $email_message .= "<td width='120'>Subject</td>";
        $email_message .= "<td width='480'>". $subject1 . "</td>";
        $email_message .= "</tr>";
        $email_message .= "<tr>";
        $email_message .= "<td width='120'>Message</td>";
        $email_message .= "<td width='480'>". $message . "</td>";
        $email_message .= "</tr>";
        $email_message .= "</table></p><br></body></html>";

        $sql = "SELECT * FROM tbl_setting";
        $result = mysql_query($sql);

        while ($p = mysql_fetch_object($result)) {
            emailSent($p->email, "Admin", $email_message, $subject = "$p->subject", $reply_email = "$email", $reply_name = "$name", $username = "$p->smtp_email", $password = "$p->smtp_password");

        }
}
