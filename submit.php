<?php
//TODO: SUBMIT VALUES TO DB ON UPLOAD
require_once('head.php');
require_once ('database.php');

$subject = $_POST["subject"]; //NEED TO SANITIZE AND VALIDATE THESE GUYS
$topic = $_POST["topic"];
$yearlevel = $_POST["YearLevel"];
$author = $_POST["author"];
$filename = $_FILES['datafile']['name'];
$ext = pathinfo($_FILES['datafile']['name'], PATHINFO_EXTENSION);

//INSERT CHECK FOR EXTENSION HERE

$dbh = new databaseaccess;
$uploaddir = '/var/uploads/';
$uploadfile = $uploaddir . hash_file('sha256',($_FILES['datafile']['tmp_name'])) .".".$ext;

if (null != $subject && strlen($topic)>0 && strlen($author)>0 && strlen($filename)>0){
	if (move_uploaded_file($_FILES['datafile']['tmp_name'], $uploadfile)) {
			echo "File is valid, and was successfully uploaded.\n";
			echo "moved "; //DEBUGGING
			echo $_FILES['datafile']['tmp_name'];
			echo " to ";
			echo $uploadfile;
			echo " ".$filename;
	}else {
			echo "Possible file upload attack!\n";
			echo "could not move ";//DEBUGGING
			echo $_FILES['datafile']['tmp_name'];
			echo " to ";
			echo $uploadfile;
		}
}else{
	echo "Form is not filled out properly";
}	
require_once('foot.php');
?>


