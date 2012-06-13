<div id="comment-item" class="comment-item">
	<div id="comment" class="comment">
		<div class="comment-content">
			<div class="comment-header">
				<a> <img class="avatar"
					src="assest/avatar/avatar.jpg" /> <strong
					class="fullname"><?php echo $comment->name ?>
				</strong>
				</a>
				<p class="message-text">
					<?php echo $comment->message ?>
				</p>
			</div>
			<?php if (isset($comment->imageUrl) && $comment->imageUrl != "" ){?>
			<div>
				<a> <img class="attachment"
					src="<?php echo 'img_recibidas/'.$comment->imageUrl?>" />
				</a>
			</div>
			<?php }?>
		</div>
	</div>
</div>
