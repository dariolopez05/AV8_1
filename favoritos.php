<?php

session_start();
require_once "autoloader.php";
$brandsId = $_POST['brands'];
var_dump($brandsId);

$data= new Gestion;


?>