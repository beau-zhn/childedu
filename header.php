<?php
session_start();
if(isset($_SESSION['SESS_CHANGEID']) == TRUE)
{
session_unset();
session_regenerate_id();
}
require("config.php");

?>
<!DOCTYPE HTML>

<body>

<?php
echo "<hr>";
if(isset($_SESSION['SESS_LOGGEDIN']))
{
echo "Logged in as <strong>" . $_SESSION['SESS_USERNAME']. "</strong>[<a href='" . $config_basedir. "logout.php'>logout</a>]";
}
else

?>

<div id="main">
