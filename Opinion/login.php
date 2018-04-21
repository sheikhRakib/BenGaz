<?php
session_start();
require_once ("../commonCode.php");

//this function will show the login form
function LOGIN_FORM()
{
	echo '
	<!-- container -->
	<div class="container">
		<!-- logo -->
		<div>
			<a href="../Opinion/index.php"><img src="../IMG/BengalGazetteLogo.png" style="width: 90%;height: auto;"></a>
			<hr>
			<p><i>Login with your Bengal Gazette account.</i></p>
			<br>
		</div>
		<!--Form Body-->
		<div>
			<form action="" method="post">
				<input type="text" name="username" placeholder="USERNAME" autocomplete="off">
				<input type="password" name="password" placeholder="PASSWORD" autocomplete="off">';
				if (isset($_SESSION['error'])) {
					echo '
						<div class="error">
							<p>'.$_SESSION['error'].'</p>
						</div> ';
						unset($_SESSION['error']);
				}
				echo '
				<input type="submit" name="submit" value="ENTER">
				<div>
					<a href="registration.php">Not a member?</a> <b>||</b>
					<a href="login.php?ref=forgetpassword">Can’t access account?</a>
				</div>
			</form>
		</div>
	</div>';
} //end LOGIN_FORM()

if(isset($_POST['submit'])) {
	$username="";
	$password="";

	$username = DataSanitize($_POST['username']);
	$password = DataSanitize($_POST['password']);

	if ($username != "" && $password != "") {
		$conn = DB_START();
		$sql = "SELECT * FROM users WHERE username='$username' and password=md5('$password')";
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result) == 1)
		{
			$_SESSION['username'] = $username;
			$_SESSION['loggedIn'] = "true";
			DB_STOP($conn);
			header("location: profile.php");
			exit();
		}
		else
		{
			DB_STOP($conn);
			$_SESSION['error'] = "wrong username/password";
		}
	}
	else {
		$_SESSION['error'] = "one/more field empty";
	}
}
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
	if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == 'false')
	{
		LOGIN_FORM();
	}
	else if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 'true') {
		header("location: profile.php");
	}
	?>	
</body>
</html>