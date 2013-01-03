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
	<fieldset>
		<legend>Edit user</legend>
                <a href="users.php"><< Back </a><br/>
                <form id="new_user" method="post" action="edit_user.php?act=update">
		<input type="hidden" name="user_id" value="<?php echo $user->authorid ?>">
                <label>Username</label>
		<input type="text" name="username" class="input-xlarge uneditable-input" id="username"
		value="<?php echo $user->username ?>">
                <label>Email</label>
		<input type="text" name="email" class="required" id="email"
		value="<?php echo $user->email ?>">
                <label>Password</label>
		<input type="text" name="password" class="required" id="password" >
		<div>
			<input type="submit" class="btn btn-primary" value="Update user"
                               class="btn btn-primary"/>
		</div>
                </form>
	</fieldset>
	</div>
</div>
<?php include('footer.php') ?>
		