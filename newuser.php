<?php
session_start();
require_once('head.php'); 
require_once('database.php');
require_once('PasswordHash.php');
$hasher = new PasswordHash(8, false);
$dbh = new databaseaccess;
$password1 = $_POST["password1"];
$password2 = $_POST["password2"];
$username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
$userlen = strlen($username);
$dbh->getuser($username);
if($password2!=$password1){
	echo "Passwords do not match.<br>";
}elseif($dbh->hash!=null){
	echo "User already exiests.<br>";
}elseif($username!=$_POST["username"] && $userlen < 1 && $userlen > 20){
	echo "Username is invalid.<br>";
}elseif(strlen($password1)<8){
	echo "Password is too short.<br>";
}else{
	$hash = $hasher->HashPassword($password1);
	if (strlen($hash) < 20){
		echo "Failed to hash new password";
	}else{
		$dbh->writeuser($username,$hash);
		echo "Password Updated";
		#echo $pass.'<br>';
		#echo $hash.'<br>';
	}
}

require_once('foot.php'); 
?>
