<?php 
	session_start();
	require_once("../commonCode.php"); 
	if (isset($_GET["q"])) {
		$q = $_GET["q"];
		$conn = DB_START();
		$sql = "SELECT * FROM news WHERE newsID = $q";
		
		$result = mysqli_query ($conn, $sql);
		$opinion = mysqli_fetch_assoc($result);

		$popularity = $opinion["popularity"];
		$popularity = $popularity+1;
		$sql = "UPDATE `news` SET `popularity` = ".$popularity." WHERE `news`.`newsID` = ".$opinion['newsID'].";";
		mysqli_query($conn, $sql);
		$sql1 = "SELECT userName FROM users WHERE userID = ".$opinion['writterID'];
		$us = mysqli_query($conn, $sql1);
		$user = mysqli_fetch_assoc($us);

		//whent comment
		if (isset($_POST["submit"])) {
			$commenter = DataSanitize($_POST["commenter"]);
			$comment = DataSanitize($_POST["comment"]);
			$sql = "INSERT INTO `comments`(`newsID`, `commenter`, `comment`, `deleted_at`) VALUES (".$opinion["newsID"].",'".$commenter."', '".$comment."', NULL)";
			mysqli_query($conn, $sql);
		}

		$sql1 = "SELECT * FROM comments WHERE newsID = ".$q." AND deleted_at IS NULL ORDER BY commentID DESC";
		$comment_list = mysqli_query($conn, $sql1);
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="../IMG/IconLogo.png">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../CSS/opinionindex.css">
	<link rel="stylesheet" type="text/css" href="../CSS/css/bootstrap.css">
	<title>Opinion | Bengal Gazette</title>
</head>
<body>
	<div id="main_div">
		<!--this division is for login and registration purpose-->
		<div>
			<ul>
				<li class="login_reg"><a class="log_reg_btn" href="login.php">Login</a></li>
				<li class="login_reg"><a class="log_reg_btn" href="signup.php">registration</a></li>
			</ul>
		</div>
		<!--Logo-->
		<div id="top_logo">
			<a href="index.php"><img src="../IMG/BengalGazetteLogo.png" width="200px" height="80px"></a>
			<div style="float:right;">
				<input id="search_btn" style="float: right" type="submit" name="searchbtn" value="Go" onclick="alert('Coming soon...')">
				<input id="search_box" type="text" name="searchBox" placeholder="search">
			</div>
			<p style="font-family:'Segoe UI';font-size: 20px;margin: 0px;">Opinion is Free</p>
		</div>
		<div id="menubar">
			<!--sticky menu bar-->
			<ul id="menubar_ul">
				<li class="bar_item"><a class="bar_btn" href="index.php">Feed</a></li>
	  			<li class="bar_item"><a class="bar_btn" href="profile.php">Profile</a></li>
			  	<li class="bar_item"><a class="bar_btn" href="#contact">Most Read</a></li>
			</ul>
		</div>

		<div class="panel panel-default" style="padding: 0px 50px;text-align: justify;">
			<h1> <?php echo($opinion["headline"]); ?></h1>
			<p>
				<span class=" panel panel-default">Time : <?php echo($opinion["written_at"]); ?></span>&nbsp;&nbsp;&nbsp;<span class=" panel panel-default">Writter : <?php echo($user["userName"]); ?></span>
			</p>
			<p style="font-size: 20px;"><?php echo($opinion["description"]); ?></p>
		
			<div class="panel panel-default">
				<h3>Comments</h3>
				<div class="panel panel-default">
					<form method="post" action="">
						<div class="form-group">
							<input type="text" class="form-control" name="commenter" placeholder="your name">
						</div>
						<div class="form-group">
	      					<textarea class="form-control" rows="5" name="comment" placeholder="comment"></textarea>
	    				</div>
	    				<div class="form-group">
	    					<input type="submit" class="btn btn-success" name="submit" value="Comment">
	    				</div>
	    			</form>
				</div>
				<div class="panel panel-default">
				<?php
					while ($cmt = mysqli_fetch_array($comment_list)) {
					echo '
						<div class="panel panel-primary">
							<div class="panel-heading">'.$cmt["commenter"].'</div>
							<div class="panel-body">'.$cmt["comment"].'</div>
						</div>';
					}  
				?>
				</div>
			</div>


		</div>

		
		<div id="footer">
			<p>Bengal Gazette | &copy 1780- <?php echo date("Y"); ?><br>
				<a class="footer_links" href="../about.php">About</a> | 
				<a class="footer_links" href="../policy.php">Policy</a> |
				<a class="footer_links" href="../contact.php">Contact Us</a>
			</p>
		</div>
	</div>
</body>
</html>
<?php  
	}
	else {
		header("location: index.php");
	}
?>