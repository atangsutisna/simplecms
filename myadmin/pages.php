<?php include('header.php') ?>
<div class="row-fluid">
	<?php include('sidebar.php') ?>
	<div class="span9">
	<?php include "act_page.php" ?>
	<fieldset>
		<legend>Pages</legend>
		<a href="new_page.php" class="btn btn-primary">Create new page</a>
		<table class="table table-striped">
		<thead>
			<tr>
				<th>Title</th>
				<th>Author</th>
				<th>Version</th>
				<th>Created</th>
				<th>Last update</th>
                                <th>Action</th>
			</tr>
		</thead>
		<tbody>	
		<?php
                $pageObj = new Page();
                $pages = $pageObj->findAll();
                ?>
		<?php foreach ($pages as $page) : ?>
		<tr>
			<td><?php echo $page->title ?></td>
			<td><?php echo $page->username ?> </td>
			<td><?php echo $page->language ?> </td>
			<td><?php echo $page->created_at ?></td>
                        <td><?php echo $page->updated_at ?></td>
			<td>
				<a href="edit_page.php?act=edit&id=<?php echo $page->page_id?>">
					edit
				</a> | 
				<a href="pages.php?act=delete&id=<?php echo $page->page_id ?>"
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
		
                