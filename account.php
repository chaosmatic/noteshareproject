<?php
session_start();
require_once('head.php'); 
?>
<b>Login:</b>
<form method="post" action="login.php">
Username:<input type="text" size="20" maxlength="20" name="username"><br />
Password:<input type="password" size="20" maxlength="20" name="password"><br />
<input type="submit" value="Login" name="submit">
</form>
<!--Add reCAPCHA-->
<b>New Account:</b>
<form method="post" action="newuser.php">
Username:<input type="text" size="20" maxlength="20" name="username"><br />
Password:<input type="password" size="20" maxlength="20" name="password1"><br />
Re-enter Password:<input type="password" size="20" maxlength="20" name="password2"><br />
<input type="submit" value="Make User" name="submit">
</form>
<!--Add reCAPCHA-->
<?php
require_once('foot.php');
?>