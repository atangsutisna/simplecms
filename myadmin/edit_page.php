<?php include('header.php') ?>
<script type="text/javascript">
    jQuery('document').ready(function(){
        jQuery('#new_page').validate();
    });
</script>
<div class="row-fluid">
	<?php include('sidebar.php') ?>
	<div class="span9">
	<?php include "act_page.php"; ?>
	<p><a href="pages.php"><< Back</a></p>
	<fieldset>
		<legend>Edit Page</legend>
                <form id="new_page" method="post" action="edit_page.php?act=update">
		<input type="hidden" name="page_id" value="<?php echo $page->page_id ?>">
		<input type="text" placeholder="Enter the title here"
                       name="title" class="required" id="title" style="width: 500px;"
		       value="<?php echo $page->title ?>">
		<textarea rows="3" class="required"
                          name="textVal" id="textVal" style="width: 507px; height: 82px;">
                <?php echo $page->content ?>
		</textarea>
		<div>
			<input type="submit" class="btn btn-primary" value="Update page"
                               class="btn btn-primary"/>
		</div>
                </form>
	</fieldset>
	</div>
</div>
<?php include('footer.php') ?>
		