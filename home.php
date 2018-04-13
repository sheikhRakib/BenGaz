<?php  
	require_once("commonCode.php");
	
	function ON_THIS_DAY() {
		$conn = DB_START();
		$today = getdate();
		$today = $today["mon"]."-".$today["mday"];

		$sql = "SELECT * FROM `onthisday` WHERE `eventDate` LIKE '%".$today."' AND `deleted_on` IS null";
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
	<title>Home | Bengal Gazette</title>
	<meta charset="utf-8">
	<!-- css files -->
	<link rel="stylesheet" type="text/css" href="CSS/commonCode.css">
	<link rel="stylesheet" type="text/css" href="CSS/home.css">
</head>

<body>
	<!--main div starts from here-->
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
				<!-- featured news -->
				<div class="featured_news">
					<img src="IMG/tesat.jpg"><br>
					<h2 class="hot_news_headline">Arrested Alchemist Must Make Gold To Win Freedom</h2>
				</div>
				<!-- featured news ends -->

				<!-- normal news section -->
				<div class="news_section">
					<div style="width: 100%;">
						<div class="news">
							<img class="news_image" src="photo.png">
							<h2 class="news_headline">Communist Party to regulate China’s media, film 	industry</h2>
						</div>

						<div class="news">
							<img class="news_image" src="photo.png">
							<h2 class="news_headline">Communist Party to regulate China’s media, film 	industry</h2>
						</div>

						<div class="news">
							<img class="news_image" src="photo.png">
							<h2 class="news_headline">Communist Party to regulate China’s media, film 	industry</h2>
						</div>
					</div>
				</div>
				<!-- normal news ends -->
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
				<div class="box">
					<h5>Latest News</h5>
					<ul>
						<li>A</li>
						<li>A</li>
						<li>A</li>
						<li>A</li>
					</ul>
				</div>
						
				<div class="box">
					<h5>Most Read News</h5>
					<ul>
						<li>A</li>
						<li>A</li>
						<li>A</li>
						<li>A</li>
					</ul>
				</div>
			</div>
			<!-- right col ends -->
		</div>
		<!-- news div ends -->

		<!-- footer -->
		<?php FOOTER(); ?>
		<!-- footer ends -->
	</div>
		
</body>
</html>