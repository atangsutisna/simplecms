<?php include('header.php') ?>
<div class="row-fluid">
	<?php include('sidebar.php') ?>
	<div class="span9">
	<?#php include "act_poll.php" ?>
	<fieldset>
		<legend>Polls</legend>
		<a href="new_poll.php" class="btn btn-primary">Create New poll</a>
		<table class="table table-striped">
		<thead>
			<tr>
				<th>Question</th>
				<th>Answer 1</th>
				<th>Answer 2</th>
				<th>Answer 3</th>
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
	</fieldset>
	</div>
</div>
<?php include('footer.php') ?>
		