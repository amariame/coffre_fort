<?php

define("ENVIRONMENT","development");

session_start();

require_once("../vendor/autoload.php");

use Util\Route;




$router = new AltoRouter();




$router->map( 'GET', '/register', 'UserController#create','user_register');
$router->map( 'POST', '/register', 'UserController#store','user_store');
$router->map( 'GET', '/login', 'UserController#logform','user_logForm');
$router->map( 'GET', '/logout', 'UserController#logout','logout');
$router->map( 'POST', '/login', 'UserController#login','user_login');
$router->map( 'GET', '/', 'UserController#home', 'home');



// match current request url
$match = $router->match($_SERVER['REQUEST_URI'],$_SERVER['REQUEST_METHOD']);

if((!isset($_SESSION['user']) && !$_SESSION['auth']) && $_SERVER['REQUEST_URI'] == '/'){
	$_SESSION['flash'] = 'Veillez vous identifier';
	header("Location:/login");
    exit;
}

if(preg_match('/^[A-Z]\w+#\w+/',$match['target'])){
	$t = explode('#',$match['target']);
	$class = "Controllers\\".$t[0];
	$class_inst = new $class;
	$match['target'] = array($class_inst, $t[1]);
}

if($_POST){
	$match['params'][] = $_POST;
}

//var_dump($_POST);die();

// call closure or throw 404 status
if( is_array($match) && is_callable( $match['target'] ) ) {
	
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	//header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
	var_dump('404');die();
}





