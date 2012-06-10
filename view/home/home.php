<?php require 'utils/config.php';?>
<html>
	<head>
		<link rel="stylesheet" href="<?php echo $url.'styles/fubica.css'?>" type="text/css" media="screen" >
		<script type="text/javascript" src="<?php echo $url.'scripts/ajax.js'?>" ></script>
		<script type="text/javascript" src="<?php echo $url.'scripts/home/home.js'?>" ></script>
	</head>
	<body>
		<?php include 'view/home/header.html';?>
		<div id="body">
			<div id="page-container" class="wrapper">
				<div id="home">
					<div class="dashboard">
					</div>
					<div id="content" class="content-main">
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
