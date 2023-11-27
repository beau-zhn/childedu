<?php
$dbhost = "localhost";
$dbuser = "h70237xf_edu";
$dbpassword = "do123!";
$dbdatabase = "h70237xf_edu";
$config_basedir = "http://h70237xf.beget.tech/";
$config_sitename = "ChildEdu";
$db = mysql_connect($dbhost, $dbuser, $dbpassword) or die(mysql_error());
mysql_select_db($dbdatabase, $db) or die(mysql_error());
?>