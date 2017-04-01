<?php
session_start();

//remove all the session we set for the login purpose
$_SESSION['user_id'] = '';
$_SESSION['email'] = '';
$_SESSION['name'] = '';


header("location:login.php");
exit;