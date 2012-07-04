<!DOCTYPE script PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" href="styles/fubica.css" type="text/css"
	media="screen">
<script type="text/javascript" src="scripts/common.js"></script>
<script type="text/javascript" src="scripts/ajax.js"></script>
<script type="text/javascript" src="scripts/login/login.js"></script>
</head>
<body>
	<div id="header" class="header">
		<div class="topbar">
			<div class="nav">
				<div class="container" style="text-align: center;">
					<span class="placeholder" style="font-size: 24px;">Fubica</span>
				</div>
			</div>
		</div>
	</div>
	<div style="text-align: center; width: 100%; margin-top: 50px;">
		<div class="content-login" id="content-login">
			<h1>Login</h1>
			<form id="form-login" action="?c=Login&a=login" class="form-login" method=post>
				<span class="placeholder">Ccorreo electrónico</span>
				<div class="placeholding-input">
					<input name="email" class="text-input"
						title="correo electrónico" 
						type="text">
				</div>
				<span class="placeholder">Contraseña</span>
				<div class="placeholding-input">
					<input name="pass" class="text-input"
						title="Contraseña" type="password">
				</div>
				<div style="padding-top: 15px;">
					<div class="button-comment-container box">
						<a id="commit" class="button-comment btn">Iniciar Sessión</a>
					</div>
				</div>
			</form>
			<?php if($status=='failed') echo "<span class='error'>Usuario o contraseña invalida</span>"?>
		</div>
	</div>
</body>
</html>
