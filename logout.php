<?php
	session_start();
	require_once("commonCode.php");
	$conn = DB_START();
	$logsql = "INSERT INTO logs(log) VALUES('[".$_SESSION['username']."] Logged out')";
	mysqli_query($conn, $logsql);
	unset($logsql);
	DB_STOP($conn);
	session_unset();
	session_destroy();
	header("location:home.php");
?>