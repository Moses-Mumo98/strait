<?php
error_reporting(E_STRICT);
date_default_timezone_set('Africa/Nairobi');
include('class.smtp.php'); 
include('class.phpmailer.php');

function connect($server)
{
	$typehere = 'funcs';
	debug('Initialising ' . $server . 'DB connection....', $typehere);
	switch ($server) {
		
		case "timetracker1":
			$ip = "localhost";
			$u = "root";
			$p = "";
			$d = 'openpractice';
			$port = '3306';
		break;
		
		case "timetracker":
			$ip = "185.148.145.77";
			$u = "strait";
			$p = "pC@Ljyj6tF";
			$d = 'strait_legal';
			$port = '8062';
		break;
		
		case "pasa":
			$ip = "185.148.145.77";
			$u = "strait";
			$p = "pC@Ljyj6tF";
			$d = 'generic_ticketing';
			$port = '8062';
		break;

		case "users":
			$u = "strait";
			$p = "pC@Ljyj6tF";
			$d = 'general_users';
			$port = '8062';
		break;
		
		case "docs":
			$ip = "185.148.145.77";
			$u = "strait";
			$p = "pC@Ljyj6tF";
			$d = 'strait_docs';
			$port = '8062';
		break;
		
	}

	if ($conn = mysqli_connect($ip, $u, $p,$d,$port)) {
		debug('Connnected to ' . $server, $typehere);
		return $conn;
	}
	else {
		debug('NOT connnected....', $typehere);
		$author = $GLOBALS['author'];
	}
}

function execute_($s, $link)
{
	$typehere = 'execute';
	debug("Executing " . $s, $typehere);
	if ($q = mysqli_query($link,$s)) {
		return $q;
	}
	else {
		debug(mysqli_error($link) . '<br />  <b> SQL ERROR </b>: ' . $s, $typehere);
	}
}

function fetch($q)
{
	if ($f = mysqli_fetch_assoc($q)) {
		return $f;
	}
	else {
	}
}

function num($q)
{
	if ($n = mysqli_num_rows($q)) {
		return $n;
	}
	else {
		return 0;
	}
}

function affected($conn){
	return mysqli_affected_rows($conn);
}

function last_id($conn){
	return mysqli_insert_id($conn);
}

function closer($conn){
	mysqli_close($conn);
}

function generateOTP($digits_needed) {
	$otp='';
	$count=0;
	while ( $count < $digits_needed ) {
		$random_digit = mt_rand(0, 9);
		$otp .= $random_digit;
		$count++;
	}
	return $otp;
}

function createticketserial($opid){
	#create a unique and yet random number
	 if($opid ==6){
		 $divider='123456789';
	 }else if($opid==14){
		$divider='1'; 
	 }
	 $agid = 21;
	
	
	$random1 = floor(10000 + rand(1000,10000)*5);
	$total = strval($random1/1000);
	$timestamper = strval(date('Ymdhis')/$divider) + 0;
	$calc = (($random1 + $timestamper)* 2.3)/0.56;
	$calc2 =floor($calc);
	$total =strval($random1 + $calc2);
	
	
	return $total;
}

	
function random_password($length) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}

 function multiexplode ($delimiters,$string) {
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}


function debug($msg, $type)
{
	$filename = "APITraces/" . date('dmY-H') . "_$type.txt";
	if (!file_exists('APITraces')) {
		mkdir('APITraces', '0777');
	}

	if (!$handle = fopen($filename, 'a')) {
	}else{
	if (is_writable($filename)) {
		fwrite($handle, date('Y-m-d H:i:s') . ' - ' . $msg . "\n");
		fclose($handle);
	}
	}
}

function randomString($length) {
	$str = "";
	$characters = array_merge(range('A','Z'), range('0','9'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}
	return $str;
}

function push_mail1($email, $mail_msg,$subject,$sent_from_user,$sent_from_email){
		$typehere = "SendMail";
		debug("======================================",$typehere);
			$name=$fname.' '.$lname;
			$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
			 $break_ip=explode('.',$_SERVER['REMOTE_ADDR']);
			$wildcad=$break_ip[0].'.'.$break_ip[1].'.'.$break_ip[2];
		
			$mail->IsSMTP(); // telling the class to use SMTP
			 $break_ip=explode('.',$_SERVER['REMOTE_ADDR']);
			$wildcad=$break_ip[0].'.'.$break_ip[1].'.'.$break_ip[2];
			if( $wildcad=='41.139.142' or $wildcad=='41.215.1' or $wildcard=='10.20.21' ){
				$host='smtp.gmail.com';
				
			}else{
				$host='smtp.gmail.com';//'185.148.145.4';
			}
			//echo "HOST:". $host."<br>";
			//die();
			try {
				$mail->SMTPSecure = 'tls';
			  $mail->Host       =  $host; // SMTP server
			  $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
			  $mail->SMTPAuth   = Yes;                  // enable SMTP authentication
			  $mail->Host       = $host; // sets the SMTP serverdie('got yah');
			  $mail->Port       = 587;//25;587;                    // set the SMTP port for the GMAIL server
				//$mail->Username   = "jmbaaro@kaps.co.ke"; // SMTP account username
				//$mail->Password   = "donotkick";        // SMTP account password
			  $mail->Username   = "kapsdatacollection@gmail.com"; // SMTP account username
			  $mail->Password   = "K@pS@dm1n";        // SMTP account password
			  $mail->AddReplyTo($sent_from_email, $sent_from_user);
			  $mail->AddAddress($email,$name);
			  
			  $mail->SetFrom($sent_from_email, $sent_from_user);
			  $mail->AddReplyTo($sent_from_email, $sent_from_user);
			  $mail->Subject = $subject;
			  $mail->AltBody = 'To view this email properly, you need to allow pictures from  '.$sent_from_email.' or  visit http://41.215.22.90/2017errc ';  // optional - MsgHTML will create an alternate automatically
			  $mail->MsgHTML($mail_msg);
			  $mail->Send();
			  debug( "Message Sent OK",$typehere);
			} catch (phpmailerException $e) {
			  debug( $e->errorMessage(),$typehere); //Pretty error messages from PHPMailer
			} catch (Exception $e) {
			 debug( $e->getMessage(),$typehere); //Boring error messages from anything else!
			}
}

function push_mail($email, $mail_msg,$subject,$sent_from_user,$sent_from_email){
	$typehere = "SendMail";
	debug("======================================",$typehere);
	debug("Sending Email to " . $email, $typehere);
	debug("Email Message " . $mail_msg, $typehere);

	$mail = new PHPMailer;
	$mail->isSMTP();                                      
	$mail->Host = 'mail.kaps.co.ke';  
	$mail->SMTPAuth = true;                               
	$mail->Username = 'kapslabnotify@kaps.co.ke';                
	$mail->Password = '7X3?b=fkE!';                           
	$mail->SMTPSecure = 'tls';                            

	$mail->From = $sent_from_email;
	$mail->FromName = $sent_from_user;
	$mail->addAddress($email);     

	$mail->WordWrap = 50;                                 
	$mail->isHTML(true);                                 

	$mail->Subject = $subject;
	$mail->Body    = $mail_msg;

	if(!$mail->send()) {
		debug('Message could not be sent.',$typehere);
		debug('Mailer Error: ' . $mail->ErrorInfo,$typehere);
	} else {
		debug('Message has been sent',$typehere);
	}
}

?>