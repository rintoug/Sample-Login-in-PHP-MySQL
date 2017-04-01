<?php
session_start();
require_once "config.inc.php";
$email = '';
$password='';
$errors = array();
//Checking the request method post to know if the form really posts any data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = strip_tags($_POST['email']);
	$password = strip_tags($_POST['password']);
	
	//perfroming the validation	
	if(empty($email)){
		$errors[] = "Email field is required"; 
	}
	if(empty($password)){
		$errors[] = "Password field is required"; 
	}
	
	//You are goo to go
	if(empty($errors)) {
		$sth = $conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
		$sth->bindParam(':email', $email, PDO::PARAM_STR);
		$sth->execute();
		$user = $sth->fetch(PDO::FETCH_OBJ);
		if(!empty($user)) {
			//Verifying the password
			$hashedPwdDB = $user->password;
			if (password_verify($password, $hashedPwdDB)) {
				$_SESSION['user_id'] =  $user->user_id;
				$_SESSION['name'] =  $user->name;
				$_SESSION['email'] =  $user->email;
				header("Location:dashboard.php");
				exit;
			}	
			else {
				$errors[] = "Invalid login"; 
			}	
			
		}
		else {
			$errors[] = "Invalid login"; 
		}
	}
	
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Tutsplanet Login Form</title>

<!-- Bootstrap -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script></head>
<body>
<div class="container" style="width:20%;">
  <form class="form-signin" method="post">
    <?php if(!empty($errors)):?>
    <div class="alert alert-danger">
    <?php foreach($errors as $error):?>
    <?php echo $error,"<br>";?>
    <?php endforeach;?>
    <?php endif;?>
    </div>
    <h2 class="form-signin-heading">Please sign in</h2>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="email">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  </form>
</div>
<!-- /container -->

</body>
</html>