<?php include('header.php') ?>
<div class="row-fluid">
	<?php include('sidebar.php') ?>
	<div class="span9">
		<fieldset>
			<legend>Dashboard</legend>
			Hi <?php echo $_SESSION['current_user'] ?>
		</fieldset>
	</div>
</div>
<?php include('footer.php') ?>