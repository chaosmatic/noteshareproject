<?php
$topic = $_POST["topic"];
$subject = $_POST["subject"];
$YearLevel = $_POST["YearLevel"];
$author = $_POST["author"];
if (!isset($_POST['submit'])) {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head><meta http-equiv="content-type" content="text/html;charset=UTF-8"><link rel="shortcut icon" href="favicon.ico"><LINK REL=StyleSheet HREF="style.css" TYPE="text/css" MEDIA=screen>
<title>Noteshare </title>
</head>

<body link="#F01010" vlink="#B01010">

<div id=wrapper>
<div id=head><center>
    <font size="70"> <font color="#F01010">Note</font>Share</font>

</center>
	</div>
   <div id=content>
Upload form.<p>
<form method="post" action="<?php echo $PHP_SELF;?>"> 
Topic:<input type="text" size="12" maxlength="12" name="topic"><br />
Select a subject:<br />
<select name="subject">
<option value="Math">Math Methods</option>
<option value="Physics">Physics</option>
<option value="Chemistry">Chemistry</option>
<option value="Biology">Biology</option>
<option value="English">English</option>
<option value="Literature">Literature</option>
<option value="EngLang">English Language</option>
<option value="Spesh">Specialist Mathematics</option>
</select><br />
Year Level:<br />
Year 7:<input type="radio" value="7" name="YearLevel"><br />
Year 8:<input type="radio" value="8" name="YearLevel"><br /> 
Year 9:<input type="radio" value="9" name="YearLevel"><br /> 
Year 10:<input type="radio" value="10" name="YearLevel"><br /> 
Year 11:<input type="radio" value="11" name="YearLevel"><br /> 
Year 12:<input type="radio" value="12" name="YearLevel"><br />
Author:<input type="text" size="12" maxlength="18" name="author"><br />
  <input type="submit" value="submit" name="submit">
</form>
<? 
} else {
echo "htmlspecialchars($topic)";
echo "htmlspecialchars($subject)";
echo "htmlspecialchars($YearLevel)";
echo "htmlspecialchars($author)";
}
?>
</div>
<div id=contenta></div>
</div>
 </body>

