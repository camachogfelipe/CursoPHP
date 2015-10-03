
<?php
//error_reporting(0);
session_start();
define("BASE_URL", "http://" . $_SERVER['SERVER_NAME']."/directorio");
define("BASE_PATH", $_SERVER['DOCUMENT_ROOT']."/directorio/");

require_once('class/users.php');
require_once('class/directory.php');
require_once('class/error.php');
require_once('class/bd.php');

$usuarios = new Users();
$directorio = new DirectoryManager();

$objeto = isset($_REQUEST['c']) ? $_REQUEST['c'] : "usuarios";
$funcion =  isset($_REQUEST['f']) ? $_REQUEST['f'] : "index";

if(isset(${$objeto})) :
	$class = get_class(${$objeto});
else :
	$class = "";
endif;

try {
    if(class_exists($class) == true) :
		${$objeto}->$funcion();
	else :
		throw new Exception('La página no existe.');
	endif;
} catch (Exception $e) {
    $error = new Error("La página solicitada no existe.");
	$error = $error->show_info();
	$usuarios->load_view(array("error", "login"), $error);
}