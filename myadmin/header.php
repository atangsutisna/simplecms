<?php
include "../config.php";
include "../common_resource.php";
if (!isset($_SESSION['is_admin'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Simple CMS</title>
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
    <script type="text/javascript" src="asset/js/jquery.min.js"></script>
    <script type="text/javascript" src="asset/js/jquery.validate.min.js"></script>      
    <style type="text/css">
        body {
          padding-top: 60px;
          padding-bottom: 40px;
        }
        .sidebar-nav {
          padding: 9px 0;
        }
	.error {
	    color : red;
	}
    </style>
</head>
	
<body>
	<!-- nav bar -->
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="#">Simple CMS</a>
				<div class="nav-collapse collapse">
				    <p class="navbar-text pull-right">
					Logged in as
					<?php
					if (isset($_SESSION['is_admin'])) {
					$currentUser = $_SESSION['current_user'];
					echo $currentUser;
					}
					?>,
					click <a href="logout.php" class="navbar-link">Logout</a> to exit this program
				    </p>
				</div>
			</div>
		</div>
	</div>
	<!-- end nav bar -->
    <div class="container-fluid">