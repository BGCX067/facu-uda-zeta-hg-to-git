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
