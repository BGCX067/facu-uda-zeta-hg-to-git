<?php
	
	$controllerFolder = "controller/";
	
	$defaulController = "Home";
	
	$defaultAction = "home";
	
	if(!empty($_GET['c']))
		$controller = $_GET['c'];
	else
		$controller = $defaulController;
	
	if(! empty($_GET['a']))
		$action = $_GET['a'];
	else
		$action = $defaultAction;
	
	$fileController = $controllerFolder . $controller . 'Controller.php';
	$controller .= "Controller";
	
	if(is_file($fileController))
		require_once($fileController);
	else
		header("HTTP/1.0 404 Not Found");

	$class = new ReflectionClass($controller);
	$instance = $class->newInstance(null);
	
	//Ejecuta el Metodo del controller por reflección
	if($class->hasMethod($action)){
		$instance->{$action}();
	}else{
		header("HTTP/1.0 404 Not Found");
	}
?>