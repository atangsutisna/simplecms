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
                <form id="new_poll" method="post" action="new_poll.php?act=create">
                <label>Question</label>
		<input type="text" name="question" class="required" id="question">
                <label>Answer 1</label>
		<input type="text" name="answer1" class="required" id="answer1">
                <label>Answer 2</label>
		<input type="text" name="answer2" class="required" id="answer2">
                <label>Answer 3</label>
		<input type="text" name="answer3" class="required" id="answer3">
		<div>
			<input type="submit" class="btn btn-primary" value="Create poll"
                               class="btn btn-primary"/>
		</div>
                </form>
	</fieldset>
	</div>
</div>
<?php include('footer.php') ?>
		