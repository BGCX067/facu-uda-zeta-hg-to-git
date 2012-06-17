<div class="box ">
	<h2>
		<strong>Esperamos tu Comentario</strong>
	</h2>
<form id="message-form" method="POST" enctype="multipart/form-data"  action="?c=Comment&a=newComment" target="upload_target">
		<div class="box">
			<span class="placeholder">Nombre completo</span>
			<div class="placeholding-input">
				<input type="text" maxlength="20" name="name" class="text-input">
			</div>
			<span class="placeholder">Correo electrónico</span>
			<div class="placeholding-input">
				<input type="text" name="email" class="text-input email-input">
			</div>
			<span class="placeholder">Mensaje</span>
			<div id="message-text-area" class="text-area">
				<textarea dir="ltr" style="width: 258px; height: 82px;" name="message"
					class="message-area"></textarea>
			</div>
		</div>
		<div style="position: relative; padding-left: 12px;">
			<input type="file" class="file-input" name="file" accept="image/*"/>
			<button class="btn" type="button">Elige archivo</button>
			<span id="file-name" class="photo-file-name">No se ha seleccionado ningún archivo</span>
		</div>
		<div  class="button-comment-container box">
			<a id="commit" class="button-comment btn">Comentar</a>
		</div>
	</form>
	<iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe> 
</div>
<script type="text/javascript">
	var newComment = new NewComment();
	newComment.initialize();
	newComment.bindEvents();
</script>