<?php
//============================
//you will need to the "CSS/CommonCode.css" file to use these functions 
//function lists
//
//TITLE_LOGO(); //for logo
//NAVIGATION_BAR(); // for navigation
//FOOTER(); //for footer
//DB_START(); // for DB connect
//DB_STOP($conn); // for DB disconect
//DataSanitize($value) // for sanitizaing data
//
//=================================

//title logo
//header title
function TITLE_LOGO()
{
	echo '
	<div id="header_logo">
		<a href="index.php">
			<img src="img/BengalGazetteLogo.png" style="width: 500px;height:auto;">
		</a>
	</div>';
} //title logo ends

// navigation bar function
// this will call the sticky navigation bar
function NAVIGATION_BAR()
{
	echo '
	<div id="nav_bar">
		<ul id="bar_list">
			<li class="bar_list_item"><span><a href="home.php">Feature</a></span></li>
			<li class="bar_list_item"><span><a href="news.php?c=101">Bangladesh</a></span></li>
			<li class="bar_list_item"><span><a href="news.php?c=102">International</a></span></li>
		  	<li class="bar_list_item"><span><a href="news.php?c=105">Corporate</a></span></li>
		  	<li class="bar_list_item"><span><a href="news.php?c=106">Economics</a></span></li>
			<li class="bar_list_item"><span><a href="news.php?c=104">Sports</a></span></li>
		  	<li class="bar_list_item"><span><a href="news.php?c=107">Entertainment</a></span></li>
		  	<li class="bar_list_item"><span><a href="news.php?c=108">Technology</a></span></li>
			<li class="bar_list_item"><span><a href="news.php?c=109">LifeStyle</a></span></li>
			<li class="bar_list_item"><span><a href="opinion/">Opinion</a></span></li>
			<li class="bar_list_item"><span><a href="#">Photo</a></span></li>
		</ul>
	</div>';
} // end function navigation bar

//footer function
function FOOTER()
{
	echo'
		<div id="footer">
			<p>Bengal Gazette | &copy 1780-' . date("Y").'<br>
				<a class="footer_links" href="about.php">About</a> | 
				<a class="footer_links" href="policy.php">Policy</a> |
				<a class="footer_links" href="contact.php">Contact Us</a>
			</p>
		</div>';
} //end function footer

//database start functions
function DB_START()
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$databasename = "bengaz";
	$conn = mysqli_connect($servername, $username, $password, $databasename);

	if ($conn->connect_error) 
	{
    	die("Connection failed: " . $conn->connect_error);
	}

	return $conn;
} //end function db start
//
function DB_STOP($conn)
{
	mysqli_close($conn);
}

function DataSanitize($value)
{
	$value = trim($value);
	$value = stripcslashes($value);
	$value = strip_tags($value);

	return $value;
}

function STICKY_SOCIAL_BAR()
{
	echo '<div class="sticky-container">
    <ul class="sticky">
        <li>
            <img src="IMG/facebook.png" width="32" height="32">
            <p><a href="https://www.facebook.com" target="_blank">Like Us on<br>Facebook</a></p>
        </li>
        <li>
            <img src="IMG/twitter.png" width="32" height="32">
            <p><a href="https://twitter.com" target="_blank">Follow Us on<br>Twitter</a></p>
        </li>
        <li>
            <img src="IMG/g-plus.JPG" width="32" height="32">
            <p><a href="https://plus.google.com" target="_blank">Follow Us on<br>Google+</a></p>
        </li>
        <li>
            <img src="IMG/linkedin.png" width="32" height="32">
            <p><a href="https://www.linkedin.com" target="_blank">Follow Us on<br>LinkedIn</a></p>
        </li>
        <li>
            <img src="IMG/youtube.png" width="32" height="32">
            <p><a href="http://www.youtube.com" target="_blank">Subscribe on<br>YouYube</a></p>
        </li>
    </ul>
</div>';
}
?>