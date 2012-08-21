<?php
require_once('head.php');
?>
<form method="post" action="submit.php" enctype="multipart/form-data"> 
<input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
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
</select><br /><!--
Year Level:<br />
Year 7:<input type="radio" value="7" name="YearLevel"><br />
Year 8:<input type="radio" value="8" name="YearLevel"><br /> 
Year 9:<input type="radio" value="9" name="YearLevel"><br /> 
Year 10:<input type="radio" value="10" name="YearLevel"><br /> 
Year 11:<input type="radio" value="11" name="YearLevel"><br /> 
Year 12:<input type="radio" value="12" name="YearLevel"><br />-->
Author:<input type="text" size="12" maxlength="18" name="author"><br />
Please specify a file, or a set of files:<br>
<input type="file" name="datafile" size="40"><br>
By submitting this file you acknowledge that Milfordsworld.com reserves the right to remove any file it deems unsuitable or offensive. You also acknowledge that you alone are the sole copyright holder for the file and submit it under the <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/deed.en_US">Creative Commons Attribution-ShareAlike 3.0 Unported License</a>. 
  <input type="submit" value="submit" name="submit">
</form>
<?
require_once('foot.php');
?>
