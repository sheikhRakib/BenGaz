<?php
session_start();
require_once("commonCode.php");

function author_login() {
	echo '<!-- login panel -->
	<div class="col-sm-3"></div>
		<div class="panel panel-default col-sm-6">
  		<div class="panel-heading" style="text-align: center;">LOGIN</div>
  		<div class="panel-body">
  			<form class="form-horizontal" method="post" action="">
				<div class="form-group">
  					<label class="control-label col-sm-2">ID:</label>
  					<div class="col-sm-8">
    					<input type="text" class="form-control" placeholder="Author ID" name="author">
  					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Password:</label>
  					<div class="col-sm-8">          
    					<input type="password" class="form-control" placeholder="Enter password" name="password">
  					</div>
				</div>
				<div class="form-group">        
  					<div class="col-sm-offset-2 col-sm-10">
    					<button type="submit" name="login" class="btn btn-success">Submit</button>
  					</div>
				</div>
				</form>
  		</div>
  		<!-- panel body ends -->
	</div>
	<!-- panel ends -->
	<!-- login panel ends -->';
}

function author_profile() {
	echo '<!-- author profile body -->
	<div class="panel panel-default">
		<nav class="navbar navbar-default">
				<div class="container-fluid">
				<div class="navbar-header">
  					<a class="navbar-brand" href="home.php"><img src="IMG/BengalGazetteLogo.png" height="20px" "></a>
				</div>
					<ul class="nav navbar-nav">
				    	<li><a href="author.php">Home</a></li>
				    	<li><a href="author.php?tab=add">Add a News</a></li>
				    	<li><a href="logout.php">Logout</a></li>
				</ul>
				</div>
		</nav>';
		//nav ends
		//home page
	if(!isset($_GET["tab"])) {
		echo '<h1 class="panel-heading">MY LIST</h1>';
		echo '<table class="table table-hover">
			<tr>
		        <th style="width: 50%;">Head Line</th>
		        <th style="width: 30%;">Category</th>
		        <th style="width: 10%;">Time</th>
		        <th style="width: 10%;">Action</th>
	      	</tr>';
	    $conn = DB_START();
		$sql = "SELECT news.newsID, news.headline, news.description, categories.category, news.written_at FROM news,categories,users WHERE news.categoryID = categories.categoryID AND news.categoryID != 110 AND news.writterID = users.userID AND users.userName = '".$_SESSION["author"]."' AND news.deleted_at IS NULL ORDER BY news.newsID DESC";
	    $result = mysqli_query($conn, $sql);
	    while ($nn = mysqli_fetch_assoc($result)) {
	    	echo '<tr>
	    		<td><a href="news.php?q='.$nn["newsID"].'">'.$nn["headline"].'</a></td>
    			<td>'.$nn["category"].'</td>
    			<td>'.$nn["written_at"].'</td>
    			<td>
            		<a href="author.php?tab=edit&q='.$nn["newsID"].'" title="edit" target="_blank"><img class="ico" src="IMG/edit.png"></a>
                    <span>&nbsp;&nbsp;</span>
    				<a href="author.php?tab=delete&q='.$nn["newsID"].'" onClick="return confirm(\'Are you sure you want to delete?\')" title="delete"><img class="ico" src="IMG/delete.png"></a>
				</td>
  				</tr>';
	    }
	    DB_STOP($conn);
	}
	elseif(isset($_GET["tab"]) && $_GET["tab"] == "add") {
		echo '
		<div class="panel-body">
			<h1 class="panel-heading">Add a News</h1>
			<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
				<div class="form-group">
  					<label class="control-label col-sm-2">Head Line:</label>
  					<div class="col-sm-8">
    					<input type="text" class="form-control" placeholder="Headline..." name="headline">
  					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Category:</label>
					<div class="col-sm-8">
						<select class="form-control" name="category">
							<option value="">Select</option>
						    <option value="101">Bangladesh</option>
						    <option value="102">International</option>
						    <option value="105">Corporate</option>
						    <option value="106">Economics</option>
						    <option value="104">Sports</option>
						    <option value="107">Entertainment</option>
						    <option value="108">Technology</option>
						    <option value="109">Lifestyle</option>
						</select>
					</div>
				</div>
				<div class="form-group">
  					<label class="control-label col-sm-2">Image:</label>
  					<div class="col-sm-8">
    					<input type="file" class="form-control" name="newsimage">
  					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Details:</label>
  					<div class="col-sm-8">
    					<textarea class="form-control" rows="8" name="description" id="description" placeholder="Description....." required></textarea>
  					</div>
				</div>
				<div class="form-group">        
  					<div class="col-sm-offset-2 col-sm-10">
    					<button type="submit" name="addnews" class="btn btn-success">Submit</button>
  					</div>
				</div>
				</form>
		</div>';
	}
	elseif (isset($_GET["tab"]) && $_GET["tab"] == "edit") {
		if (!isset($_GET["q"])) {
			header("location: author.php");
			exit();
		}
		$q = $_GET["q"];
		$conn = DB_START();
		$sql = "SELECT * FROM news WHERE newsID = '$q' AND deleted_at IS NULL";
		$result = mysqli_query($conn, $sql);
	    if(mysqli_num_rows($result) == 1) {
	    	$nn = mysqli_fetch_assoc($result);
	    	
	    	echo '
		<div class="panel-body">
			<h1 class="panel-heading">EDIT</h1>
			<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
				<div class="form-group">
  					<label class="control-label col-sm-2">Head Line:</label>
  					<div class="col-sm-8">
    					<input type="text" class="form-control" placeholder="Headline..." name="headline" value="'.$nn["headline"].'">
  					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Details:</label>
  					<div class="col-sm-8">
    					<textarea class="form-control" rows="8" name="description" id="description" placeholder="Description.....">'.$nn["description"].'</textarea>
  					</div>
				</div>
				<div class="form-group">        
  					<div class="col-sm-offset-2 col-sm-10">
    					<button type="submit" name="updatenews" class="btn btn-success">Update</button>
  					</div>
				</div>
				</form>
		</div>';

	    }
	    DB_STOP($conn);
	}
	elseif(isset($_GET["tab"]) && $_GET["tab"] == "delete") {
		if (!isset($_GET["q"])) {
			header("location: author.php");
			exit();
		}
		$q = $_GET["q"];
		$conn = DB_START();
		$sql = "SELECT * FROM news WHERE newsID = '$q' AND deleted_at IS NULL";
		$result = mysqli_query($conn, $sql);
	    if(mysqli_num_rows($result) == 1) {
	    	$nn = mysqli_fetch_assoc($result);
			
			$sql = "UPDATE news SET deleted_at = '".date('Y-m-d H:i:s')."' WHERE news.newsID = '".$_GET["q"]."'";
			mysqli_query($conn, $sql);
			echo '<script> alert("Deleted..."); </script>';
			header("location: author.php");
		}
	    DB_STOP($conn);
	}
	echo '	
	</div>
	<!-- author profile body ends -->';
}

if(isset($_POST["login"])) {
	$authorname = DataSanitize($_POST["author"]);
	$password = DataSanitize($_POST["password"]);
	$password = md5($password);
	if($authorname != "" && $password != "") {
		$conn = DB_START();

		$sql = "SELECT * FROM users WHERE userName = '".$authorname."' AND password = '".$password."' AND role != 'user' AND deleted_at IS NULL";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) == 1) {
			$_SESSION["author"] = $authorname;
			
			$lgsql="INSERT INTO logs(log) VALUES('[".$authorname."] [AUTHOR] logged in')";
			mysqli_query($conn, $lgsql);
			unset($lgsql);

			DB_STOP($conn);
		}
	}
}
elseif (isset($_POST["addnews"])) {
	$conn = DB_START();
	$headline = mysqli_real_escape_string($conn, $_POST["headline"]);
	$category = mysqli_real_escape_string($conn, $_POST["category"]);
	$description = mysqli_real_escape_string($conn, $_POST["description"]);
	if($headline != "" && $category !="" && $_FILES['newsimage']['name'] && $description != ""){
		$author = $_SESSION["author"];
		$sql = "SELECT * FROM users WHERE userName = '".$author."'";
		$us = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($us);

		$userID = $user["userID"];

		unset($sql);
		unset($us);
		unset($user);

		$sql = "INSERT INTO news(headline, description, writterID, categoryID, deleted_at) VALUES('".$headline."', '".$description."', ".$userID.", ".$category.", NULL)";
		$result = mysqli_query($conn, $sql);

		$last_id = mysqli_insert_id($conn);

		$info = pathinfo($_FILES['newsimage']['name']);
		$ext = $info['extension']; // get the extension of the file
		$newname = $last_id.".".$ext;
		$target = 'docs/'.$newname;
		move_uploaded_file( $_FILES['newsimage']['tmp_name'], $target);


		$sql = "INSERT INTO `newsimages`(`newsID`, `imagePath`, `deleted_at`) VALUES (".$last_id.", '".$newname."', NULL)";
		mysqli_query($conn, $sql);

		$logsql = "INSERT INTO logs(log) VALUES('[".$author."] [new NEWS Added]')";
		mysqli_query($conn, $logsql);
		unset($logsql);

		echo '<script> alert("News Added"); </script>';
		header("location: author.php");
	}
	else { 
		echo '<script> alert("Invalid Information"); </script>';
	}
}
elseif(isset($_POST["updatenews"])) {
	$conn = DB_START();
	$headline = mysqli_real_escape_string($conn, $_POST["headline"]);
	$description = mysqli_real_escape_string($conn, $_POST["description"]);

	if($headline != "" && $description != "") {
		$sql = "UPDATE news SET headline = '".$headline."', description = '".$description."' WHERE news.newsID = '".$_GET["q"]."'";
		mysqli_query($conn, $sql);
		echo '<script> alert("Updated..."); </script>';
		header("location: author.php");
	}
	else{ 
		echo '<script> alert("Field Empty..."); </script>';
	}
	DB_STOP($conn);
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>AUTHOR</title>
	<link rel="icon" href="IMG/IconLogo.png">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="CSS/css/bootstrap.css">
	<style type="text/css">
	.ico
	{
	    width: 25px;
	    height: auto;
	}
	</style>
</head>
<body>
	<div class="container">
	<?php  
		 if (!isset($_SESSION["author"])) {
		 	author_login();
		 }
		 else {
			author_profile();
		 }
	?>
	</div>
	<!-- container ends  -->
</body>
</html>