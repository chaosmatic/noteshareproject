<?php
require_once('head.php');
require_once ('database.php');

$subject = $_POST["subject"];
$topic = $_POST["topic"];
$yearlevel = $_POST["YearLevel"];
$author = $_POST["author"];
$filename = $_FILES['datafile']['name'];

$dbh = new databaseaccess;
$uploaddir = '/var/www/noteshareproject/upload/';
$uploadfile = $uploaddir . "lol.doc";/*hash_file('sh1',($_FILES['datafile']['tmp_name'])) . ".doc"*/;

if (null != $subject && strlen($topic)>0 && strlen($author)>0 && strlen($filename)>0){
	if (move_uploaded_file($_FILES['datafile']['tmp_name'], $uploadfile)) {
			echo "File is valid, and was successfully uploaded.\n";
	}else {
			echo "Possible file upload attack!\n";
			echo "could not move ";
			echo $_FILES['datafile']['tmp_name'];
			echo " to ";
			echo $uploadfile;
		}
}else{
	echo "Form is not filled out properly";
}	
require_once('foot.php');
?>


