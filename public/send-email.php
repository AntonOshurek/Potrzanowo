<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './mailer/PHPMailer.php';
require './mailer/SMTP.php';
require './mailer/Exception.php';

// require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = htmlspecialchars($_POST['name']);
	$email = htmlspecialchars($_POST['email']);
	$message = htmlspecialchars($_POST['message']);

	$email_body = "This is the HTML message body <b>in bold!</b>" . "\n";
	$email_body .= "Name: " . $name . "\n";
	$email_body .= "Email: " . $email . "\n";
	$email_body .= "Message: " . $message . "\n";

	//Create an instance; passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
		//Server settings
		$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		$mail->isSMTP();                                            //Send using SMTP
		$mail->CharSet = "UTF-8";
		$mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = "";                     //SMTP username
		$mail->Password   = "";                               //SMTP password
		$mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
		$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		//Recipients
		$mail->setFrom(", "Astro email form");
		$mail->addAddress($email, $name);     //Add a recipient
		$mail->addReplyTo("", "");
		// $mail->addCC('cc@example.com');
		// $mail->addBCC('bcc@example.com');

		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = "Email from Astro email form";
		$mail->Body    =  $email_body;
		$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

		$mail->send();
		echo json_encode(["status" => "success", "message" => "Email sent successfully"]);
	} catch (Exception $e) {
		$status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
		echo json_encode(["status" => "error", "message" => "Failed to send email"]);
	}
} else {
	$status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
	echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
