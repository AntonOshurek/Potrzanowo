<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require './mailer/PHPMailer.php';
require './mailer/SMTP.php';
require './mailer/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	try {
		$name = htmlspecialchars($_POST['name']);
		$surname = htmlspecialchars($_POST['surname']);
		$email = htmlspecialchars($_POST['email']);
		$telephone = htmlspecialchars($_POST['telephone']);
		$message = htmlspecialchars($_POST['message']);

		$email_body = "Wiadomość od osoby z formularza kontaktowego na stronie potrzanowo.pl <br>";
		$email_body .= "Imię: " . $name . "<br>";
		$email_body .= "Nazwisko: " . $surname . "<br>";
		$email_body .= "Adres e-mail: " . $email . "<br>";
		$email_body .= "Numer telefonu: " . $telephone . "<br>";
		$email_body .= "Wiadomość: " . $message . "<br>";

		//Create an instance; passing `true` enables exceptions
		$mail = new PHPMailer(true);

		//Server settings
		$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		$mail->isSMTP();                                            //Send using SMTP
		$mail->CharSet = "UTF-8";
		$mail->Host       = "";                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = "";                     //SMTP username
		$mail->Password   = "";                               //SMTP password
		$mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
		$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		//hello@potrzanowo.pl
		//Recipients
		$mail->setFrom("", "potrzanowo");
		$mail->addAddress("", "formularz kontaktowy");     //Add a recipient
		$mail->addAddress("", "formularz kontaktowy");
		$mail->addAddress("", "formularz kontaktowy");
		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = "Email from potrzanowo.pl email form";
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
