<?php
	require 'PHPMailerAutoload.php';

	if(!empty($_POST))
    {
    	$name=$_POST['name'];
    	$email=$_POST['email'];
    	$message=$_POST['message'];
    	$_subject=$_POST['subject'];

		$mail = new PHPMailer;

		//$mail->SMTPDebug = 2;                               // Enable verbose debug output
		$mail->SMTPAutoTLS = false;
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.georgetown.co.za';  			  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'no-reply@georgetown.co.za';        // SMTP username
		$mail->Password = 'noReplyGeorgetownBitches1';        // SMTP password
		$mail->SMTPSecure = 'tsl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom($email, 'Website Mailer: '. $name);
        $mail->addAddress('info@georgetown.co.za', 'Michael');     // Add a recipient
        $mail->addAddress('ronnie@georgetown.co.za', 'Ronnie');     // Add a recipient
		$mail->addReplyTo($email, $name);

		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = $_subject;
		$mail->Body    = '<p style="font-weight:bold;">Subject: </p><p>'.$_subject.'</p><p style="font-weight:bold;">Message: </p><p>' . $message . '</p>';
		$mail->AltBody = $message;

		if(!$mail->send()) {
			echo 'false';
		} else {
			echo 'true';
		}
	}
?>