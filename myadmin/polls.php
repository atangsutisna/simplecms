<?php include('header.php') ?>
<div class="row-fluid">
	<?php include('sidebar.php') ?>
	<div class="span9">
	<?#php include "act_poll.php" ?>
	<fieldset>
		<legend>Polls</legend>
		<form action="polls.php" method="post">
		<a href="new_poll.php" class="btn">Create New poll</a>
		<input type="submit" name="active_poll" value="Activate Poll" class="btn btn-primary"/>
		<table class="table table-striped">
		<thead>
			<tr>
				<th>Question</th>
				<th>Answer 1</th>
				<th>Answer 2</th>
				<th>Answer 3</th>
				<th>Active</th>
			</tr>
		</thead>
		<tbody>	
		<?php $polls = new poll(); ?>
		<?php foreach ($polls->findAll() as $poll) : ?>
		<tr>
			<td><?php echo $poll->question ?></td>
			<td><?php echo $poll->answer1 ?> </td>
			<td><?php echo $poll->answer2 ?> </td>
			<td><?php echo $poll->answer3 ?> </td>
			<td>
				<input type="radio" name="active_poll"
				       value="<?php echo $poll->id?>"
				       checked="<?php echo $poll->active == 'Yes' ? true : false ;?>">
			</td>
			<td>
				<a href="edit_poll.php?act=edit&id=<?php echo $poll->id?>">
					edit
				</a> | 
				<a href="polls.php?act=delete&id=<?php echo $poll->id ?>"
				onclick="return confirm('Are you sure ?');">
					delete
				</a> 
			</td>
		</tr>
		<?php endforeach; ?>
		</tbody>
		</table>
		</form>
	</fieldset>
	</div>
</div>
<?php include('footer.php') ?>
		