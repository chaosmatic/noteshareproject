<?php
session_start();
require_once('head.php'); 
require_once ('database.php');
$subject = $_GET["subject"];

if ($subject != null){
	echo "<a href='index.php'>Home</a> <a href='form.php'>Submit</a>";
	$pageid = $_GET["pageid"];
	$FilesPerPage = 50;
	$lbound = $FilesPerPage*$pageid;
	$dbh = new databaseaccess;
	$dbh->displayfiles($subject,$lbound,$FilesPerPage);
	$dbh->count();
	$totalpages = ceil($dbh->amount/$FilesPerPage);

	if ($dbh->result != null){
		foreach ($dbh->result as $v1) {
	  		foreach ($v1 as  $value => $v2) {
				if ($value == "title"){
					echo "<font color='#007000'><h2>".$v2."</h2></font>";
				}elseif($value == "path"){
					echo "<a href='readfile.php?file=";
					echo $v2;
					echo "'>Download</a><br>";
				}elseif($value == "topic"){
					echo " Topic: " . $v2."<br>";
				}elseif($value == "subject"){
					echo " subject: " . $v2."<br>";
				}elseif($value == "author"){
					echo " author: " . $v2."<br>";
				}elseif($value == "id"){
					echo "<a href='vote.php?file=".$v2."'>UPVOTE</a>";
				}elseif($value == "votes"){
					echo "Votes: ".$v2."<br>";
				}else{
					//echo " ".$v2."<br>"." ";
				}
			}
			echo "<hr>";
		}
		if($pageid == 0){//if first page
			if($totalpages>1){//if filled
				?>
				<form method="get" action="<?php echo $PHP_SELF; ?>">
				<button name="pageid" value="<?php echo ($pageid + 1);?>" type="submit">Older Posts</button>
				</form>
				<?php	
			}
		}elseif($totalpages>$pageid+1){//if middle page
			?>
			<form method="get" action="<?php echo $PHP_SELF; ?>">
			<button name="pageid" value="<?php echo ($pageid + 1);?>" type="submit">Older Posts</button>
			<button name="pageid" value="<?php echo ($pageid - 1);?>" type="submit">Newer Posts</button>
			</form>
			<?php
		}elseif($totalpages==$pageid+1){//if last page
			?>
			<form method="get" action="<?php echo $PHP_SELF; ?>">
			<button name="pageid" value="<?php echo ($pageid - 1);?>" type="submit">Newer Posts</button>
			</form>
			<?php
			}
			
	}else{
		echo "<br>nothing to display<bR>";
		//$dbh->displaybyid("1");//debugonly
	}
}else{
	echo "Disclaimer: Neither Milfordsworld.com nor any person or group associated with Milfordsworld.com
	 	endorses any content uploaded by users. No warranty or affirmation of quality is given.<br>";
	echo "<a href='index.php?subject=Math'>All Math uploads</a><br>";
	echo "<a href='index.php?subject=Physics'>All Physics uploads</a><br>";
	echo "<a href='index.php?subject=Chemistry'>All Chemistry uploads</a><br>";
	echo "<a href='index.php?subject=Biology'>All Biology uploads</a><br>";
	echo "<a href='index.php?subject=English'>All English uploads</a><br>";
	echo "<a href='index.php?subject=Literature'>All Literature uploads</a><br>";
	echo "<a href='index.php?subject=EngLang'>All English Language uploads</a><br>";
	echo "<a href='index.php?subject=Spesh'>All Specialist Mathematics uploads</a><br>";
	echo "Do you have something to share? Why not <a href='form.php'>upload something useful?</a><br>";
}
require_once('foot.php');
?>
