<?php 
include "autoload.php";
$metodo = $_GET["m"] ?? "index";
$metodo = strtolower($metodo);

$nomeParcialController = $_GET["c"] ?? "Home";
$nomeParcialController = ucfirst(strtolower($nomeParcialController));

$nomeController = "Vendor\\Controller\\{$nomeParcialController}Controller";

 $controller = new $nomeController();
 $view = $controller->$metodo();
 $view->render();

?>