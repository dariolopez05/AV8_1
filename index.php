<?php
session_start();
require_once "autoloader.php";
$brand = "Volvo";

$data = new Importar;
$data->customers();
$brandId = $data->getBrandId($brand);
echo $brandId['brandId'];

?>