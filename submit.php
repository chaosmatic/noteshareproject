<?php
//TODO: SUBMIT VALUES TO DB ON UPLOAD
require_once('head.php');
require_once ('database.php');
//SANITIZATION
$subject = filter_var($_POST["subject"], FILTER_SANITIZE_STRING);//NEED TO SANITIZE AND VALIDATE THESE GUYS
$title = filter_var($_POST["title"], FILTER_SANITIZE_STRING);
$topic = filter_var($_POST["topic"], FILTER_SANITIZE_STRING);
$yearlevel = filter_var($_POST["YearLevel"], FILTER_SANITIZE_STRING);
$author = filter_var($_POST["author"], FILTER_SANITIZE_STRING);
$filename = $_FILES['datafile']['name']; //debugging only
$ext = pathinfo($_FILES['datafile']['name'], PATHINFO_EXTENSION);
$ext = filter_var($ext, FILTER_SANITIZE_STRING);

//VALIDATION
$allowedsubject = array("Math","Physics","Chemistry","Biology","English","Literature","Spesh");
if (in_array($subject, $allowedext)){
	$validsubject = True;
}
$allowedext = array("doc","docx","ppt","pptx","xls","xlsx","txt","pdf");
if (in_array($ext, $allowedext)){
	$validext = True;
}
if (strlen($title)<=12 && strlen($topic)<=12 && strlen($author)<=12){
	$validtta = True:
}


$dbh = new databaseaccess;
$uploaddir = '/var/uploads/';
$filename = hash_file('sha256',($_FILES['datafile']['tmp_name'])) .".".$ext;
$uploadfile = $uploaddir . $filename;

if ($allowedext && $allowedsubject && $validtta && null != $subject && strlen($topic)>0 && strlen($author)>0 && strlen($filename)>0){
	if (move_uploaded_file($_FILES['datafile']['tmp_name'], $uploadfile)) {
			echo "File is valid, and was successfully uploaded.\n";
			echo "moved "; //DEBUGGING
			echo $_FILES['datafile']['tmp_name'];
			echo " to ";
			echo $uploadfile;
			echo " ".$filename;
			$dbh->write($title,$topic,$subject,$author,$filename);
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


