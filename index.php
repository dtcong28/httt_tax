<?php
require_once('vendor/autoload.php');

require_once("db.php");
//$db = Db::getInstance();
if(isset($_GET["controller"])&&isset($_GET["action"])){
$controller=$_GET["controller"];
$action=$_GET["action"];
}
else
{
//in case the product doesnt give us this values, we set them to a default controller and action
$controller="home";
$action="index";
}

//we load up our routing code, that will execute the action on the controller
require_once("routes.php");

?>