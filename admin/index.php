<?php
use controller\AdminController;
use controller\ArticleController;
use controller\IndexController;
use controller\MemberController;
use controller\PartnerController;
use controller\ErrorController;
use vendor\Model;
use vendor\CategoryModel;
header("content-type:text/html;charset=UTF-8");
define('CONF_PATH',__DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR);
session_start();
require_once 'vendor\Model.php';
require_once 'vendor\CategoryModel.php';
date_default_timezone_set('Asia/shanghai');
$ctl = ucfirst(strtolower($_GET['ctl']));
$ctl = ($ctl == '' ? 'Index' : $ctl) . 'Controller';
$action = strtolower($_GET['action']);
$action = $action == '' ? 'index' : $action;
$classFile = 'controller/' . $ctl . '.php';
if(!file_exists($classFile)){
	$classFile = 'controller/ErrorController.php';
	$ctl = 'ErrorController';
}
require_once $classFile;

$class = 'controller\\' .$ctl; 
$object  = new $class;
if(!method_exists($object,$action)){
	require_once 'controller/ErrorController.php';
	$object = new ErrorController();
	$action = 'noFound';
}

if($_SESSION['id'] == '' || $_SESSION['admin_name'] == '' || $_SESSION['admin_level'] == ''){
 	require_once 'controller/AdminController.php';
 	$object = new AdminController();
 	$action = 'login';
}

$object->$action();



