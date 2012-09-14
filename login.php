<?php
session_start();
require_once('head.php'); 
require_once('database.php');
require_once('PasswordHash.php');
$dbh = new databaseaccess;
$hasher = new PasswordHash(8, false);
$password = $_POST["password"];
$username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
$dbh->getuser($username);
$hash = $dbh->hash;
#echo $hash.'<br>';
#echo $password.'<br>';
#$phash = $hasher->HashPassword($password);
#echo $phash.'<br>';
#echo $username;
$_SESSION['check'] = $hasher->CheckPassword($password, $hash);
if ($_SESSION['check']){
	echo "Logged in.";
	$_SESSION['username'] = $username;
	#echo $username;
	#echo $_SESSION['username'];
}else{
	echo "wrong username or password.<br>";
	#var_dump($_SESSION['check']);
}
require_once('foot.php');
?>
