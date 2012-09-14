<?php
echo "<html><head><meta http-equiv='content-type' content='text/html;charset=UTF-8'><link rel='shortcut icon' href='favicon.ico'><LINK REL=StyleSheet HREF='style.css' TYPE='text/css' MEDIA=screen>";
echo "<title>NoteShare</title>"; //title in top of browser
echo "</head>";

echo "<body link='#F01010' vlink='#B01010'>";

echo "<div id=wrapper>";
echo "<div id=head><center>";
echo "<font size='70'> <font color='#10B010'>NoteShare</font></font>"; //title at top of page

echo "</center>";
	echo "</div>";
   echo "<div id=content>";
   echo "<a href='account.php'>Login or make user</a> <a href='index.php'>Browse entries</a> <a href='form.php'>Submit something good</a>";
	if($_SESSION['check']){
		echo " <a href='logout.php'>Logout</a>";
	}
	echo "<br>";   	  
?>
