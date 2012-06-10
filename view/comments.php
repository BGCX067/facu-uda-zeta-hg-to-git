<html>
<head></head>

<body>

	<table>
		<tbody><tr><td>Fullname</td><td>Email</td><td>Message</td></tr></tbody>
		<?php 

		foreach ($comments as $id => $comment)
			{
				echo '<tr><td><a href="index.php?m='.$comment->id.'">'.$comment->name.'</a></td><td>'.$comment->message.'</td><td>'.$comment->email.'</td></tr>';
			}

		?>
	</table>

</body>
</html>
