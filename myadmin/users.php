<?php include('header.php') ?>
<div class="row-fluid">
	<?php include('sidebar.php') ?>
	<div class="span9">
	<?php include "act_post.php" ?>
	<fieldset>
		<legend>Users</legend>
		<a href="new_user.php" class="btn btn-primary">Create new user</a>
		<table class="table table-striped">
		<thead>
			<tr>
				<th>Username</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>	
		<?php $user = new User(); ?>
		<?php foreach ($user->findAll() as $user) : ?>
		<tr>
			<td><?php echo $user->username ?></td>
			<td><?php echo $user->email ?> </td>
			<td>
				<a href="edit_user.php?act=edit&id=<?php echo $user->authorid?>">
					edit
				</a> 
			</td>
		</tr>
		<?php endforeach; ?>
		</tbody>
		</table>
	</fieldset>
	</div>
</div>
<?php include('footer.php') ?>
		