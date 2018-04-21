<?php
	session_start();
	require_once("../commonCode.php");
	
	$username = "";
	$al = "none";
	if (!isset($_SESSION['username'])) {
		header('location: login.php');
	}
	else {
		$conn = DB_START();
		$username = $_SESSION['username'];

		$sql = "SELECT * FROM `users` WHERE `userName` = '".$username."'";		
		$result = mysqli_query($conn,$sql);
		while ($res = mysqli_fetch_array($result)) {
			$userID = $res["userID"];
			$fullname = $res["firstName"] ." ". $res["lastName"];
			$fullname = ucwords($fullname);//make uppercase first letter of every word
		}
		unset($result);


		if (isset($_POST["AddPost"])) {
			$headline = ucwords($_POST["headline"]);
			$description = $_POST["description"];
			$category = 110;
			if($headline != "" && $description != "") {
				$sql = "INSERT INTO news(headline, description, writterID, categoryID, deleted_at) VALUES('".$headline."', '".$description."', ".$userID.", ".$category.", NULL)";
				$result = mysqli_query($conn, $sql);

				//log
				$logsql = "INSERT INTO logs(log) VALUES('[".$username."] Gave an Opinion.')";
				mysqli_query($conn, $logsql);
				unset($logsql);
				$al = "block";
			}
		}

		if (isset($_POST["changePass"])) {
			$current_password = $_POST["current_password"];
			$newpass1 = $_POST["newpass1"];
			$newpass2 = $_POST["newpass2"];

			if($current_password != "" && $newpass1 != "" && $newpass1 == $newpass2) {
				$sql = "UPDATE `users` SET `password`='".md5($newpass1)."' WHERE `userID`=".$userID."AND `password`='".md5(current_password)."'";
				$result = mysqli_query($conn, $sql);
				echo($sql);

				//log
				$logsql = "INSERT INTO logs(log) VALUES('[".$username."] Changed Password.')";
				mysqli_query($conn, $logsql);
				unset($logsql);
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="../IMG/IconLogo.png">
	<title><?php echo($fullname); ?></title>
	
	<link rel="stylesheet" type="text/css" href="../CSS/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../CSS/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../CSS/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../CSS/css/sb-admin-2.css">
	<link rel="stylesheet" type="text/css" href="../CSS/css/sb-admin-2.min.css">
	<link rel="stylesheet" type="text/css" href="../CSS/profile.css">
</head>

<body>
	<div id="main_body">
		<!-- nav top bar -->
		<div class="nav-default">
			<ul class="nav_list">
				<li class="nav_list_item">
					<span><a href="index.php">
						<img src="../img/BengalGazetteLogo.png" style="width: 300px;height:auto;">
					</a></span>
				</li>
				
				<li class="nav_list_item text" style="float: right;">
					<span><a href="logout.php">
						<img src="../img/logout.png" style="height: 30px;width: auto;">
					</a></span>
				</li>
				<li class="nav_list_item text" style="float: right;">
					<span>Welcome </span><span><a href="#aboutMe"><?php echo($fullname); ?></a></span>
				</li>
			</ul>
		</div> 
		<!-- endof top nav_list -->

		<!-- side nav bar -->
		<nav>
            <div class="navbar-default sidebar" role="navigation" style="margin-bottom: 0;margin-top: 10px;">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li><a href="#mypost">My Posts</a></li>
                        <li><a href="#addpost">Add Post</a></li>
                        <li><a href="#aboutMe">Profile</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- end side nav bar -->

        <!-- post list -->
        <div id="mypost">
	        <div id="page-wrapper">
	            <div class="row">
	                <div class="col-lg-12">
	                    <div class=" panel panel-default">
	                    	<?php  
	                    		$conn = DB_START();
	                    		$sql = "SELECT * FROM news WHERE writterID = '".$userID."' AND categoryID = 110 AND deleted_at is NULL ORDER BY newsID DESC";
	                    		$result = mysqli_query($conn, $sql);
	                    		echo "<table>";
	                    		echo "<caption>MY OPINIONS</caption>";
	                    		while ($opinion = mysqli_fetch_array($result)) {
                					echo '<tr>
                					<td>'.$opinion["headline"].'</td>
                					<td>
                						<a href="edit.php?id='.$opinion["newsID"].'" title="edit" target="_blank">
                							<img class="ico" src="../IMG/edit.png">
                            			</a>
                        				<span>&nbsp;&nbsp;</span>
                        				<a href="delete.php?id='.$opinion["newsID"].'" onClick="return confirm(\'Are you sure you want to delete?\')" title="delete">
                            				<img class="ico" src="../IMG/delete.png">
                        				</a>
                    				</td>
                    				</tr>';
                				}
                				echo "</table>";

	                    	?>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- post list ends -->

	    <!-- add post -->
        <div id="addpost">
			<div id="page-wrapper">
				<div class="alert alert-success alert-dismissible" style="display:<?php echo $al; ?>">
    				<strong>Success!</strong> Your Opinion Published.
  				</div>
				<h2>Give a Opinion</h2>
				<form action="" method="post">
					<div class="form-group">
				  		<input type="text" class="form-control" id="headline" placeholder="HeadLine" name="headline" required autocomplete="off">
					</div>
					<div class="form-group">
						<textarea class="form-control" rows="10" name="description" id="description" placeholder="Description....." required></textarea>
					</div>
					<button type="submit" class="btn btn-success" name="AddPost">Submit</button>
				</form>
			</div>
		</div>
		<!-- add post ends -->

		<div id="aboutMe">
			<div id="page-wrapper">
				<h2>Change Password</h2>
				<form action="" method="post">
					<div class="form-group col-lg-8">
						<input type="password" class="form-control" placeholder="Current Password" name="current_password" required autocomplete="off">
				  	</div>
				  	<div class="form-group col-lg-8">
				  		<input type="password" class="form-control" placeholder="New Password" name="newpass1" required autocomplete="off">
				  	</div>
				  	<div class="form-group col-lg-8">
				  		<input type="password" class="form-control" placeholder="HeadLine" name="newpass2" required autocomplete="off">
					</div>
					<button type="submit" class="btn btn-success col-lg-8" name="changePass">Submit</button>
				</form>
			</div>
		</div>
	</div>



</body>
</html>