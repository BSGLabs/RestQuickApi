<?php 
header('Content-type: application/json;charset=utf-8');
session_start();
function o ($obj)
{
	echo json_encode($obj);
}
$type = $_SERVER["REQUEST_METHOD"];
$uri = $_SERVER["REQUEST_URI"];
$uri = trim($uri,"/");
if($uri == "")
{
	$uri = "home";
}	
include $uri.".php";
$obj = new $uri();
switch ($type) {
	case 'GET':
	case 'POST':
    case 'PUT':
	case "DELETE":
		o($obj->$type());
		break;
	

}
