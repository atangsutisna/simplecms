<?php
include('header.php');
?>
<script type="text/javascript">
    jQuery('document').ready(function(){
        jQuery('#new_user').validate();
    });
</script>
<div class="row-fluid">
	<?php include('sidebar.php') ?>
	<div class="span9">
	<?php include "act_user.php" ?>
	<a href="users.php"><< Back </a><br/>
	<fieldset>
		<legend>New user</legend>
                <form id="new_user" method="post" action="new_user.php?act=create">
                <label>Username</label>
		<input type="text" name="username" class="required" id="username">
                <label>Email</label>
		<input type="text" name="email" class="required" id="email">
                <label>Password</label>
		<input type="text" name="password" class="required" id="password" >
                <label>Retype Password</label>
		<input type="text" 
                       name="retype_password" class="required" id="retype_password" >
		<div>
			<input type="submit" class="btn btn-primary" value="Create user"
                               class="btn btn-primary"/>
		</div>
                </form>
	</fieldset>
	</div>
</div>
<?php include('footer.php') ?>
		