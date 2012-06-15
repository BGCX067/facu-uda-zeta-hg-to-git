<?php require 'utils/config.php';?>
<!DOCTYPE script PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<link rel="stylesheet" href="<?php echo $url.'styles/fubica.css'?>" type="text/css" media="screen" >
		<script type="text/javascript" src="<?php echo $url.'scripts/common.js'?>" ></script>
		<script type="text/javascript" src="<?php echo $url.'scripts/ajax.js'?>" ></script>
		<script type="text/javascript" src="<?php echo $url.'scripts/home/home.js'?>" ></script>
		<script type="text/javascript" src="<?php echo $url.'scripts/comments.js'?>" ></script>
		<script type="text/javascript" src="<?php echo $url.'scripts/home/homeMenu.js'?>" ></script>
	</head>
	<body>
		<?php include 'view/home/header.html';?>
		<div id="body">
			<div id="page-container" class="wrapper">
				<div id="home">
					<div id="dashboard" class="dashboard">
					</div>
					<div id="content" class="content-main">
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
