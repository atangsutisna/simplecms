<?php include('header.php') ?>
<script type="text/javascript">
    jQuery('document').ready(function(){
        jQuery('#new_post').validate();
    });
</script>
<div class="row-fluid">
	<?php include('sidebar.php') ?>
	<div class="span9">
	<?php
	include "act_post.php";
	?>
	<p><a href="posts.php"><< Back</a></p>
	<fieldset>
		<legend>Edit posts</legend>
                <form id="new_post" method="post" action="edit_post.php?act=update">
		<input type="hidden" name="article_id" value="<?php echo $article->id ?>">
		<input type="text" placeholder="Enter the title here"
                       name="title" class="required" id="title" style="width: 500px;"
		       value="<?php echo $article->title ?>">
		<textarea rows="3" class="required"
                          name="textVal" id="textVal" style="width: 507px; height: 82px;">
                <?php echo $article->text ?>
		</textarea>
		<label for="lang">select language</label>
		<select name="lang">
		    <option value="english" <?php echo $article->language == 'english' ? "selected=\"selected\"" : ""?>>
			English
		    </option>
		    <option value="italia" <?php echo $article->language == 'italia' ? "selected=\"selected\"" : ""?>>
			Italia
		    </option>
		    <option value="czech" <?php echo $article->language == 'czech' ? "selected=\"selected\"" : ""?>>
			Czech
		    </option>
		</select>
		<div>
			<input type="submit" class="btn btn-primary" value="Update post"
                               class="btn btn-primary"/>
		</div>
                </form>
	</fieldset>
	</div>
</div>
<?php include('footer.php') ?>
		