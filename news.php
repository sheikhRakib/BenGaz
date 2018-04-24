<?php
	require_once("commonCode.php");
?>

<!-- on this day -->
<?php  
	function ON_THIS_DAY() {
		$conn = DB_START();
		$today = getdate();
		$today = $today["mon"]."-".$today["mday"];

		$sql = "SELECT * FROM `onthisday` WHERE `eventDate` LIKE '%".$today."' AND `deleted_on` IS null ORDER BY `eventDate`  ASC";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) == 0) {
			echo ' 
					<div class="event">
						No Information is Available for This Current Date
					</div>';
		}
		else {
			while ($res = mysqli_fetch_array($result)) {
				/* 
				date() function doesn't work for dates before 1970.
				This will generate those dates.
				*/
				$date = date_create($res['eventDate']);
				if (!$date) {
					$e = date_get_last_errors();
					foreach ($e['errors'] as $error) {
						echo "$error\n";
					}
					exit(1);
				}
				$year = date_format($date, "Y");
				
				echo ' 
					<div class="event">
						<span class="OTD_year">'.$year.'</span>
						<span>'.$res["event"].'</span>
					</div>';
			}
			DB_STOP($conn);
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="IMG/IconLogo.png">
	<meta charset="utf-8">
	<title>Bengal Gazette</title>
	<link rel="stylesheet" type="text/css" href="CSS/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="CSS/commonCode.css">
	<link rel="stylesheet" type="text/css" href="CSS/home.css">
</head>
<body>
	<div id="main_body">
		<!-- header icon and slogan -->
		<?php TITLE_LOGO(); ?>
		<!-- header ends -->
		<!-- navigation bar -->
		<?php NAVIGATION_BAR(); ?>
		<!-- navigation bar ends -->
		
		<!-- news div -->
		<div>
			<!-- left column -->
			<div class="leftColumn">
			<?php
			if(isset($_GET["c"])) {
				$category = $_GET["c"];
				if($category == "101" || $category == "102" || $category == "105" ||
				$category == "106" || $category == "104" || $category == "107" ||
				$category == "108" || $category == "109") {
					$conn = DB_START();
					$sql = "SELECT news.newsID, news.headline, news.description, news.written_at, newsimages.imagePath FROM news, newsimages WHERE news.categoryID = ".$category." AND news.newsID = newsimages.newsID AND news.deleted_at IS NULL ORDER BY news.newsID";
					$result = mysqli_query ($conn, $sql);
					while ($news = mysqli_fetch_array($result)) {
						echo '
						<div class="panel panel-default" style="margin: 10px 0px;">
							<img style="height: 80px;" src="docs/'.$news["imagePath"].'">
							<a style="font-size: 25px;" href="news.php?q='.$news["newsID"].'">'.$news["headline"].'</a>
						</div>';
					}
					DB_STOP($conn);
				}
				else { header("location: home.php"); exit();}
			}
			elseif(isset($_GET["q"])) {
				$nw = $_GET["q"];
				$conn = DB_START();
				$sql = "SELECT news.headline, news.description, news.popularity, news.written_at, newsimages.imagePath FROM news, newsimages WHERE news.newsID = ".$nw." AND news.categoryID != 110 AND news.newsID = newsimages.newsID AND news.deleted_at IS NULL";
				$result = mysqli_query ($conn, $sql);
				if(mysqli_num_rows($result) == 1) {
					$news = mysqli_fetch_assoc($result);
					echo '
					<div class=" panel panel-default">
						<div class="featured_news">
							<img src="docs/'.$news["imagePath"].'"><br>
							<h1>'.$news["headline"].'</h1>
							<p class="panel panel-default">Time: '.$news["written_at"].'</p>
							<p class="panel panel-default" style="text-align:justify;padding: 0px 30px;font-size:20px;">'.$news["description"].'</p>
						</div>
					</div>';
					$popularity = $news["popularity"];
					$popularity = $popularity + 1;
					$sql="UPDATE `news` SET `popularity` = ".$popularity." WHERE `news`.`newsID` = ".$nw;
					mysqli_query ($conn, $sql);
				}
				else { header("location: home.php"); exit();}
				DB_STOP($conn);
			}
			else {
				header("location: home.php");
				exit();
			}
			?>
			</div>
			<!-- left col ends -->
			




			<!-- right col starts -->
			<div class="rightColumn">
				<div class="on_this_day">
					<div style="text-align: center; background-color: #f0f0ee">
						<strong>On This Day</strong><br>
						<strong style="color: #ef4224;">
						<?php
							$today = getdate();
							$today = $today["month"]." ".$today["mday"];
							echo($today);
						?>
						</strong>
					</div>
					<div class="otd_container">
						<?php ON_THIS_DAY(); ?>
					</div>
				</div>
				<!-- on this day ends -->

				<div class="box">
					<h5>Latest News</h5>
					<hr>
				<?php  
					//latest news
					$conn = DB_START();
					$sql = "SELECT newsID, headline FROM news WHERE categoryID != 110 AND deleted_at IS NULL ORDER BY newsID DESC";
					$result = mysqli_query($conn, $sql);
					echo '<ul>';
					while ($heads = mysqli_fetch_array($result)) {
						echo '
							<li>
							<a style="font-size:20px;" href="news.php?q='.$heads["newsID"].'">'.$heads["headline"].'</a>
							</li>';
					}
					echo '</ul>';

					DB_STOP($conn);
				?>
				</div>
						
				<div class="box">
					<h5>Most Read News</h5>
					<hr>
				<?php  
					$conn = DB_START();
					$sql = "SELECT newsID, headline FROM news WHERE categoryID != 110 AND deleted_at IS NULL ORDER BY popularity DESC";
					$result = mysqli_query($conn, $sql);
					echo '<ul>';
					while ($heads = mysqli_fetch_array($result)) {
						echo '
							<li>
							<a style="font-size:20px;" href="news.php?q='.$heads["newsID"].'">'.$heads["headline"].'</a>
							</li>';
					}
					echo '</ul>';

					DB_STOP($conn);
				?>
				</div>
			</div>
			<!-- right col ends -->
		</div>
		<!-- news div ends -->

		<!-- footer -->
		<?php FOOTER(); ?>
		<!-- footer ends -->
	</div>
	<?php STICKY_SOCIAL_BAR(); ?>
</body>
</html>