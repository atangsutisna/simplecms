<?php
include "../config.php";
include "../common_resource.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Simple CMS : Login Form</title>
	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
	<style>
	.error {
		color:red;
	}
	</style>
	<script type="text/javascript" src="asset/js/jquery.min.js"></script>
	<script type="text/javascript" src="asset/js/jquery.validate.min.js"></script>
	<script type="text/javascript">
	$('document').ready(function(){
		$('#form-login').validate();
	});
	</script>
</head>	
<body>
	<div class="container">
		<div class="row">
			<div class="span4 offset4" style="margin-top: 50px;">
				<div class="well">
					<legend>Sign in to WebApp</legend>
					<?php include "act_login.php" ?>
					<form id="form-login" method="POST" action="login.php?act=signin">
						<input class="required" placeholder="Username" type="text" name="username">
						<input class="required" placeholder="Password" type="password" name="password">
						<div>
							<button class="btn-info btn" type="submit">Sign In</button> 
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>