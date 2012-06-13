<div id="content-header" class="content-header">
	<h2>Comentarios</h2>
</div>
<div id="comment-container" class="comment-container">
	<?php 

	foreach ($comments as $id => $comment)
	{
		include 'view/comments/comment.php';
	}

	?>
</div>
<?php if ($isPaginated) {?>
<div id="navigation" class="comment-pagination">
	<?php 
	for ($page = 0; $page < $pages; $page++) {
		if ($page == $index) {
			echo("<a name='nav' class='button-default' data-page='$page'><span>$page</span></a>");
		}else{
			echo("<a name='nav' class='button-default button-default-disabled' data-page='$page'><span>$page</span></a>");
		}
	}
	?>
</div>
<?php }?>
<script type="text/javascript">
	var comments = new Comments();
	comments.bindEvents();
</script>