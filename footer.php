<?php

if(isset($_SESSION['SESS_ADMINLOGGEDIN']))
{
echo "[<a href='" . $config_basedir . "adminorders.php'>admin</a>]>admin logout</a>]";
}
echo "<p><i> Welcome to "
. $config_sitename . "</i></p>";

?>
<a href="<?php echo $config_basedir; ?>">Home</a>
</div>
</div>
</body>
</html>

