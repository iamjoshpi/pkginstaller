<?php
$access="false";
if($access=="true"){
$siteName=$_POST['siteName'];
$sitePath=$_POST['sitePath'];
$install=$_POST['install'];
echo'HIGH FIVE INSTALLER<br>';
echo '
<form method="post" action="index.php">
Site Name:<input type="text" name="siteName">
<br>
Site Path:<input type="text" name="sitePath">
<br>
Yes Install Please
<input type="radio" name="install" value="yes">
<br>
<input  type="submit" name="submit">
</form>';
if($install=="yes"){
	require('set_up.php');
	setUp($siteName,$sitePath);
}
}//security ends
?> 
