<?php
	session_start();

   	$userName="";
   	$password="";
   	$errors = array();
   	
   	if(isset($_POST['submit']))
   	{
	   	$userName = $_POST['userName'];
	   	$password = $_POST['password'];
	   
	   	if (empty($userName)) {
	   		array_push($errors, "Username required");
	   	}
	   	if (empty($password)) {
	   		array_push($errors, "Password required");
	   	}
	   	if (count($errors) == 0) {
	   		if(isValidUser($userName, $password)) {
				header("location: profile.php");
			}
			else {
				array_push($errors, "Wrong username/password");
			}
	   	}
	}
//this function will show the login form
function LOGIN_FORM()
{
	echo '
	<!-- container -->
	<div class="container">
		<!-- logo -->
		<div>
			<a href="../home.php"><img src="../IMG/BengalGazetteLogo.png" style="width: 90%;height: auto;"></a>
			<hr>
			<p><i>Login with your Bengal Gazette account.</i></p>
			<br>
		</div>
		<!--Form Body-->
		<div>
			<form action="" method="post">
				<input type="text" name="userName" placeholder="USERNAME" autocomplete="off">
				<input type="password" name="password" placeholder="PASSWORD" autocomplete="off" minlength="3">
				<input class=".btn_submit" type="submit" name="submit" value="ENTER">
				<div>
					<a href="registration.php">Not a member?</a> <b>||</b>
					<a href="login.php?ref=forgetpassword">Can’t access account?</a>
				</div>
			</form>
		</div>
	</div>';
} //end LOGIN_FORM()

//end php
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="../IMG/IconLogo.png">
	<title>Login | Bengal Gazette</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../CSS/login.css">
</head>

<body>
	<?php
	// this if statement will check if the user is able to logged in or not 
	if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == 'false')
	{
		LOGIN_FORM();
	}
	else
	{
		header('location: index.php');
	}
	?>
	
</body>
</html>