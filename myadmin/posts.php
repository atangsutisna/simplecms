<?php include('header.php') ?>
<div class="row-fluid">
	<?php include('sidebar.php') ?>
	<div class="span9">
	<?php include "act_post.php" ?>
	<fieldset>
		<legend>Posts</legend>
		<a href="new_post.php" class="btn btn-primary">Create New Post</a>
		<table class="table table-striped">
		<thead>
			<tr>
				<th>Title</th>
				<th>Author</th>
				<th>Version</th>
				<th>Created</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>	
		<?php $posts = new Post(); ?>
		<?php foreach ($posts->findAll() as $post) : ?>
		<tr>
			<td><?php echo $post->title ?></td>
			<td><?php echo $post->username ?> </td>
			<td><?php echo $post->language ?> </td>
			<td><?php echo $post->date ?></td>
			<td>
				<a href="edit_post.php?act=edit&id=<?php echo $post->id?>">
					edit
				</a> | 
				<a href="posts.php?act=delete&id=<?php echo $post->id ?>"
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
		