<?php
	session_start();
	require_once('commonCode.php');

	if (isset($_POST['submit'])) 
	{
		$username = DataSanitize($_POST['username']);
		$password = DataSanitize($_POST['password']);

		if ($username != '' && $password != '')
		{
			$conn = DB_START();
			$sql = "SELECT * FROM users WHERE userName = '$username' AND password = '".md5($password)."' AND role = 'admin' AND deleted_at is NULL";
			//log
			$logsql = "INSERT INTO logs(log) VALUES('[".$username."] attempts to LOG IN')";
			mysqli_query($conn, $logsql);
			unset($logsql);

			$result = mysqli_query($conn, $sql);

			if(mysqli_num_rows($result) == 1)
			{
				$logsql = "INSERT INTO logs(log) VALUES('[".$username."] successfully logged in')";
				mysqli_query($conn, $logsql);
				unset($logsql);
				
				$_SESSION['username'] = $username;
				$_SESSION['AdminLoggedIn'] = "true";
				DB_STOP($conn);
				header("location: admin.php");
				exit();
			}
			else
			{
				DB_STOP($conn);
				$_SESSION['error'] = "wrong username/password";
			}
		}
		else{
			$_SESSION['error'] = "field empty";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="IMG/IconLogo.png">
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="CSS/adminLogin.css">
</head>

<body>
	<?php  
	if (isset($_SESSION['AdminLoggedIn']) && $_SESSION['AdminLoggedIn'] == 'true') {
		header('location: admin.php');
		exit();
	}
	?>
	<div id="loginpanel">
		<h1><i>Login</i></h1>
		<form name="login" method="post" action="">
			<table>
				<tr>
					<td colspan="3">
						<input name="username" type="text" placeholder="username" autocomplete="off">
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<input name="password" type="password" placeholder="password">
					</td>
				</tr>
				<?php
				if (isset($_SESSION['error'])) {
					echo '
					<tr>
					<td colspan="3">
					<p class = "err" style="background-color:red;margin:0px">'.$_SESSION['error'].'</p>
					</td>
					</tr> ';
					unset($_SESSION['error']);
				}
				?>
				<tr>
					<td>&nbsp;</td>
					<td colspan="2" style="text-align: right;">
						<input type="submit" name="submit" value="Login">
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>