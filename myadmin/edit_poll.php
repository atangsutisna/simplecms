<?php
include('header.php');
?>
<script type="text/javascript">
    jQuery('document').ready(function(){
        jQuery('#new_poll').validate();
    });
</script>
<div class="row-fluid">
	<?php include('sidebar.php') ?>
	<div class="span9">
	<?php include "act_poll.php" ?>
	<a href="polls.php"><< Back </a><br/>
	<fieldset>
		<legend>New Poll</legend>
                <form id="new_poll" method="post" action="edit_poll.php?act=update">
		<input type="hidden" name="poll_id" value="<?php echo $poll->id ?>">
                <label>Question</label>
		<input type="text" name="question" class="required"
		       id="question" value="<?php echo $poll->question ?>">
                <label>Answer 1</label>
		<input type="text" name="answer1" class="required"
		       id="answer1" value="<?php echo $poll->answer1 ?>">
                <label>Answer 2</label>
		<input type="text" name="answer2" class="required"
		       id="answer2" value="<?php echo $poll->answer2 ?>">
                <label>Answer 3</label>
		<input type="text" name="answer3" class="required"
		       id="answer3" value="<?php echo $poll->answer3 ?>">
		<div>
			<input type="submit" class="btn btn-primary" value="Update poll"
                               class="btn btn-primary"/>
		</div>
                </form>
	</fieldset>
	</div>
</div>
<?php include('footer.php') ?>
		