<?php
session_start();
require_once('head.php');
session_destroy();
echo "Logged out.<br>";
require_once('foot.php');