<?php
//============================
//function lists
//
//TITLE_LOGO(); //for logo
//NAVIGATION_BAR(); // for navigation
//FOOTER(); //for footer
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
			<li class="bar_list_item"><span><a href="bangladesh.php">Bangladesh</a></span></li>
			<li class="bar_list_item"><span><a href="#">International</a></span></li>
		  	<li class="bar_list_item"><span><a href="#">Corporate</a></span></li>
		  	<li class="bar_list_item"><span><a href="#">Economics</a></span></li>
			<li class="bar_list_item"><span><a href="#">Sports</a></span></li>
		  	<li class="bar_list_item"><span><a href="#">Entertainment</a></span></li>
		  	<li class="bar_list_item"><span><a href="#">Technology</a></span></li>
			<li class="bar_list_item"><span><a href="#">LifeStyle</a></span></li>
			<li class="bar_list_item"><span><a href="#">Opinion</a></span></li>
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
				About | 
				<a class="footer_links" href="policy.php">Policy</a> |
				<a class="footer_links" href="contact.php">Contact Us</a>
			</p>
		</div>';
} //end function footer







?>