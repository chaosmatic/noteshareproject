<?php
session_start();
require_once('head.php'); 
require_once ('database.php');
$dbh = new databaseaccess;
$file = $_GET["file"];

if ($_SESSION['username']!=null){
	if($dbh->checkvote($_SESSION['username'],$file)==false){
		echo "Vote added.";
		$dbh->vote($_SESSION['username'],$file);
	}else{
		echo 'You have already voted!';
	}
}else{
	echo 'Please Log in to vote.';
}
require_once('foot.php');