<?php
include_once 'config.php';
$controllerFolder = "controller/";

$defaulController = "Login";
$defaultAction = "loginPage";
if(!is_null($_SESSION['user'])){
	$defaulController = "Home";
	$defaultAction = "home";
}

if(allowAction())
	$controller = $_GET['c'];
else
	$controller = $defaulController;

if(allowAction())
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


function allowAction(){
	if(!empty($_GET['c']) && !empty($_GET['a']) && !is_null($_SESSION['user'])){
		return true;
	}else if(!empty($_GET['c']) && !empty($_GET['a']) && is_null($_SESSION['user']) && $_GET['c'] == 'Login' && $_GET['a'] == 'login'  ){
		return true;
	}else if(!empty($_GET['c']) && !empty($_GET['a']) && is_null($_SESSION['user']) && $_GET['c'] == 'Login' && $_GET['a'] == 'logout'  ){
		return true;
	}else{
		return false;
	}
}

?>