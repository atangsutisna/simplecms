<?php include('header.php') ?>
<div class="row-fluid">
	<?php include('sidebar.php') ?>
	<div class="span9">
	<?php include "act_poll.php" ?>
	<fieldset>
		<legend>Polls</legend>
		<p>Select version you want to show
		<select name="lang" id="lang">
			<option value="english">English</option>
			<option value="italia">Italia</option>
			<option value="czech">Czech</option>
		</select>
		</p>
		<form action="polls.php?act=act_poll" method="post">
		<a href="new_poll.php" class="btn">Create New poll</a>
		<input type="submit" name="active_poll" value="Activate Poll" class="btn btn-primary"/>
		<?php
		$pollObj = new poll();
		if (isset($_GET['lang'])) {
			$lang = $_GET['lang'];
		}
		else {
			$lang = 'english';
		}
		$polls = $pollObj->findByLang($lang);
		
		?>
		<p>&nbsp;</p>
		<p>Polling with <b><?php echo $lang ?></b> version </p><hr>
		<table class="table table-striped">
		<thead>
			<tr>
				<th>Question</th>
				<th>Version</th>
				<th>Answer 1</th>
				<th>Answer 2</th>
				<th>Answer 3</th>
				<th>Active</th>
			</tr>
		</thead>
		<tbody>	
		<?php
		//var_dump($polls);
		foreach ($polls as $poll) : ?>
		<tr>
			<td><?php echo $poll->question ?></td>
			<td><?php echo $poll->language ?></td>
			<td><?php echo $poll->answer1 ?> </td>
			<td><?php echo $poll->answer2 ?> </td>
			<td><?php echo $poll->answer3 ?> </td>
			<td>
				<input type="radio" name="active_poll"
				       value="<?php echo $poll->id?>"
				       <?php echo $poll->active == 'Yes' ? "checked=\"checked\"" : '' ;?>">
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
		<?php if (empty($polls)) {
			echo "No contents";
		}?>
		</form>
	</fieldset>
	</div>
</div>
<script>
	$('#lang').change(function(){
		var lang = $(this).val();
		window.location.href = '?lang='+ lang;
	});
</script>
<?php include('footer.php') ?>
		