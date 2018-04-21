<?php  
	require_once("../commonCode.php");
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
			  	<li class="bar_item"><a class="bar_btn" href="index.php?tab=recent">Most Recent</a></li>
			</ul>
		</div>
		<div id="newspage_div">
			<?php
				$conn = DB_START();
				if(isset($_GET["tab"]) && $_GET["tab"] == "recent") {
					$sql = "SELECT * FROM news WHERE deleted_at is NULL ORDER BY newsID DESC";
				}
				else {
					$sql="SELECT * FROM news WHERE deleted_at is NULL ORDER BY popularity DESC";
				}
				$result = mysqli_query ($conn, $sql);
				while ($opinion = mysqli_fetch_array($result)) {
					echo '
						<div class="panel panel-default">
							<div class="opinion">
								<a class="panel-heading aa" href="opinion.php?q='.$opinion["newsID"].'">'.$opinion["headline"].'</a>
							</div>
						</div>';
				}
			?>



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