<?php
require_once('head.php'); // Need to make a page that lists subjects 
require_once ('database.php');
$subject = $_GET["subject"];
$FilesPerPage = 50;
$lbound = $PostPerPage*$pageid;
$dbh = new databaseaccess;
$dbh->displayfiles($subject,$lbound,$FilesPerPage);

if ($dbh->result != null){
	foreach ($dbh->result as $v1) {
  		foreach ($v1 as  $value => $v2) {
			if ($value == "title"){
				echo "<font color='#007000'><h2>".$v2."</h2></font>";
			}elseif($value == "path"){
				echo "<a href='readfile.php?file=";
				echo $v2;
				echo "'>Go</a>";
			}elseif($value == "topic"){
				echo " Topic: " . $v2."<br>";
			}elseif($value == "subject"){
				echo " subject: " . $v2."<br>";
			}elseif($value == "author"){
				echo " author: " . $v2."<br>";
			}else{
				echo " ".$v2."<br>"." ";
			}
		}
		echo "<hr>";
	}
}else{
	echo "nothing to display<bR>";
	//$dbh->displaybyid("1");//debugonly
}

require_once('foot.php');
?>