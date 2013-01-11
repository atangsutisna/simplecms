<?php
include('header.php');
?>
<script type="text/javascript">
    jQuery('document').ready(function(){
        jQuery('#new_post').validate();
    });
</script>
<div class="row-fluid">
	<?php include('sidebar.php') ?>
	<div class="span9">
	<?php include "act_page.php" ?>
	<p><a href="pages.php"><< Back</a></p>
	<fieldset>
		<legend>New Page</legend>
		
                <form id="new_post" method="post" action="new_page.php?act=create">
		<input type="text" placeholder="Enter the title here"
                       name="title" class="required" id="title" style="width: 500px;">
		<textarea rows="3" class="required"
                          name="textVal" id="textVal" style="width: 507px; height: 82px;">
                </textarea>
		<label for="lang">select language</label>
		<select name="lang">
		    <option value="english">English</option>
		    <option value="italia">Italia</option>
		    <option value="czech">Czech</option>
		</select>
		<div>
			<input type="submit" class="btn btn-primary" value="Create page"
                               class="btn btn-primary"/>
		</div>
                </form>
	</fieldset>
	</div>
</div>
<?php include('footer.php') ?>
		