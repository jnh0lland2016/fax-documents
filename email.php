<?php
header("Access-Control-Allow-Headers: Authorization, Content-Type");
header("Access-Control-Allow-Origin: *");
header('content-type: application/json; charset=utf-8');
?>
<?php 
session_start();
$Receive_email="the@gmail.com";
$_SESSION['sendermail'] = $Receive_email;

?>