<?php 
	session_start();
	require_once("commonCode.php");

	if (!isset($_SESSION["AdminLoggedIn"]) || $_SESSION["AdminLoggedIn"] == "false") {
		header("location: home.php");
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <link href="CSS/css/bootstrap.min.css" rel="stylesheet">
    <link href="CSS/css/sb-admin-2.css" rel="stylesheet">
    <link href="CSS/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style type="text/css">
    	#users, #logs, #logout
    	{
    		display: none;
    	}
    </style>
</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default" role="navigation" style="margin-bottom: 0">
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li><a href="#dashboard" onclick="changetoDashboard()">Dashboard</a></li>
                        <li><a href="#users" onclick="changetoUsers()">Users</a></li>
                        <li><a href="#news" onclick="changetoNews()">News</a></li>
                        <li><a href="#category" onclick="changetoCategory()">Category</a></li>
                        <li><a href="#reported" onclick="changetoReported()">Reported</a></li>
                        <li><a href="#settings" onclick="changetoSettings()">Settings</a></li>
                        <li><a href="#logs" onclick="changetoLogs()">System Logs</a></li>
                        <li><a href="#logout" onclick="changetoLogout()">Log Out</a></li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <!-- navigation ends -->

        <!-- dashboard starts -->
        <div id="dashboard">
	        <div id="page-wrapper">
	            <div class="row">
	                <div class="col-lg-12">
	                    <h1 class="page-header">Dashboard</h1>
	                </div>
	                <!-- /.col-lg-12 -->
	            </div>
	            <!-- /.row -->
	            <div class="row">
	                <div class="col-lg-3 col-md-6">
	                    <div class="panel panel-primary">
	                        <div class="panel-heading">
	                            <div class="row">
	                                <div class="col-xs-3">
	                                </div>
	                                <div class="col-xs-9 text-right">
	                                    <div class="huge">26</div>
	                                    <div>News Posts</div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-lg-3 col-md-6">
	                    <div class="panel panel-primary">
	                        <div class="panel-heading">
	                            <div class="row">
	                                <div class="col-xs-3">
	                                </div>
	                                <div class="col-xs-9 text-right">
	                                    <div class="huge">26</div>
	                                    <div>Opinion Posts</div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-lg-3 col-md-6">
	                    <div class="panel panel-green">
	                        <div class="panel-heading">
	                            <div class="row">
	                                <div class="col-xs-3">
	                                </div>
	                                <div class="col-xs-9 text-right">
	                                    <div class="huge">12</div>
	                                    <div>News Has Been Read</div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-lg-3 col-md-6">
	                    <div class="panel panel-yellow">
	                        <div class="panel-heading">
	                            <div class="row">
	                                <div class="col-xs-3">
	                                </div>
	                                <div class="col-xs-9 text-right">
	                                    <div class="huge">124</div>
	                                    <div>New User</div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-lg-3 col-md-6">
	                    <div class="panel panel-red">
	                        <div class="panel-heading">
	                            <div class="row">
	                                <div class="col-xs-3">
	                                </div>
	                                <div class="col-xs-9 text-right">
	                                    <div class="huge">13</div>
	                                    <div>Subscribers</div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <!-- /.row -->
	            <div class="row">
	                <div class="col-lg-12">
	                    <div class=" panel panel-default">
	                        <div class="panel-heading">BODY</div>
	                        <!-- /.panel-heading -->
	                        <div class="panel-body">
	                            <!-- content goes here -->
	                            AAA
	                        </div>
	                        <!-- /.panel-body -->
	                    </div>
	                    <!-- /.panel .chat-panel -->
	                </div>
	                <!-- /.col-lg-6 -->
	            </div>
	            <!-- /.row -->
	        </div><!-- /#page-wrapper -->
    	</div>
        <!-- dashboard ends -->

        <!-- user -->
        <div id="users">
	        <div id="page-wrapper">
	            <div class="row">
	                <div class="col-lg-12">
	                    <h1 class="page-header">Users List</h1>
	                </div>
	                <!-- /.col-lg-12 -->
	            </div>
	            <!-- /.row -->
	            <div class="row">
	                <div class="col-lg-3 col-md-6">
	                    <div class="panel panel-primary">
	                        <div class="panel-heading">
	                            <div class="row">
	                                <div class="col-xs-3">
	                                </div>
	                                <div class="col-xs-9 text-right">
	                                    <div class="huge">26</div>
	                                    <div>Total User</div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-lg-3 col-md-6">
	                    <div class="panel panel-red">
	                        <div class="panel-heading">
	                            <div class="row">
	                                <div class="col-xs-3">
	                                </div>
	                                <div class="col-xs-9 text-right">
	                                    <div class="huge">26</div>
	                                    <div>Banned User</div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <!-- /.row -->
	            <div class="row">
	                <div class="col-lg-12">
	                    <div class=" panel panel-default">
	                        <div>
	                        	<table>
	                        		<tr>
	                        			<th>User ID</th>
	                        			<th>First Name</th>
	                        			<th>Last Name</th>
	                        			<th>Sex</th>
	                        			<th>Mail</th>
	                        		</tr>
	                        	</table>
	                        </div>
	                        <!-- /.panel-body -->
	                    </div>
	                    <!-- /.panel .chat-panel -->
	                </div>
	                <!-- /.col-lg-6 -->
	            </div>
	            <!-- /.row -->
	        </div><!-- /#page-wrapper -->
    	</div>
    	<!-- user ends -->



    	<!-- system log -->
		<div id="logs">
	        <div id="page-wrapper">
	            <div class="row">
	                <div class="col-lg-12">
	                    <h1 class="page-header">System Logs</h1>
	                </div>
	                <!-- /.col-lg-12 -->
	            </div>
	            <!-- /.row -->
	            <div class="row">
	                <div class="col-lg-12">
	                    <div class=" panel panel-default">
	                        <div class="panel-heading">Logs</div>
	                        <!-- /.panel-heading -->
	                        <div class="panel-body" style="max-height: 500px;overflow-y: auto;">
	                        	<?php  
	                        		$conn = DB_START();
        							$sql = "SELECT time,log FROM logs order by logID DESC";
        							$log_result = mysqli_query ($conn, $sql);
        							unset($sql);

        							echo "<ul style= 'font-size:18px;'>";
        							while ($log = mysqli_fetch_array($log_result)) {
                						echo "<li> [".$log["time"]."] &nbsp;&nbsp;".$log["log"]."</li>";
                					}
                					echo "</ul>";
	        						DB_STOP($conn);
	                        	?>
	                        </div> <!-- /.panel-body -->
	                    </div> <!-- /.panel .chat-panel -->
	                </div> <!-- /.col-lg-6 -->
	            </div> <!-- /.row -->
	        </div><!-- /#page-wrapper -->
    	</div>
    	<!-- system log ends -->













































        <!-- logout starts -->
        <div id="logout">
	        <div id="page-wrapper">
	            <div class="row">
	                <div class="col-lg-12">
	                    <h1 class="page-header">Logout</h1>
	                </div>
	                <!-- /.col-lg-12 -->
	            </div>
	            <!-- /.row -->
	            
	            <div class="row">
	                <div class="col-lg-12">
	                    <div class=" panel panel-default">
	                        <div class="panel-heading">Really Want to Logout?</div>
	                        <!-- /.panel-heading -->
	                        <div class="panel-body"><a href="logout.php">Logout</a></div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
        <!-- logout ends -->



    </div>
















    <!-- javascript -->
    <script type="text/javascript">
    	function hideElements() {
    		document.getElementById("dashboard").style.display = "none";
    		document.getElementById("users").style.display = "none";
    		//document.getElementById("news").style.display = "none";
    		//document.getElementById("category").style.display = "none";
    		//document.getElementById("reported").style.display = "none";
    		//document.getElementById("settings").style.display = "none";
    		document.getElementById("logs").style.display = "none";
    		document.getElementById("logout").style.display = "none";
    	}
    	function changetoDashboard() {
    		hideElements();
    		document.getElementById("dashboard").style.display = "block";
    	} 
    	function changetoLogs() {
    		hideElements();
    		document.getElementById("logs").style.display = "block";
    	}
    	function changetoLogout() {
    		hideElements();
    		document.getElementById("logout").style.display = "block";
    	}
    </script>
</body>
</html>