<?php
session_start();
print $name = $_SESSION['name'];
//Check session is already set, otherwise redirect to login page
if(empty($name)) {
	header("Location:login.php");
	exit;
}
print "<h2>Welcome ".$name."</h2>";

print "<br>";

print '<a href="logout.php">Logout</a>';