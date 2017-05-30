<?php  
	$path = $_SERVER["DOCUMENT_ROOT"];
	$path .= "projet_estore/include/phpmailer/PHPMailerAutoload.php";
	require_once($path);

	function send_email($to, $subject, $body) {
		global $error;
		$mail = new PHPMailer();
		$from_name = "eStore Company";
		$mail->Username = "estore.concordia@gmail.com";
		$mail->Password = "flochondidou";

		$mail->IsSMTP();
		$mail->SMTPAuth = true;  // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465; 
		$mail->SetFrom($mail->Username, $from_name);
		$mail->Subject = $subject;
		$mail->Body = $body;
		$mail->AddAddress($to);
		if(!$mail->Send()) 
		{
			$error = 'Mail error: '.$mail->ErrorInfo; 
			return false;
		} 
		else 
		{
			$error = 'Message sent!';
			return true;
		}

	}

?>