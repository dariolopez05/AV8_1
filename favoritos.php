<?php

session_start();
require_once "autoloader.php";
$brandsId = $_POST['brands'];

$data= new Gestion;
$favoritos = $data->getFavourites($brandsId);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <title>Tabla de Clientes y Marcas</title>
</head>
<body>

<table>
  <thead>
    <tr>
      <th>ID Cliente</th>
      <th>Nombre de Cliente</th>
      <th>Nombre de Marca</th>
    </tr>
  </thead>
  <tbody>
    <?php  echo $favoritos; ?>
  </tbody>
</table>
<a href="marcas.php">Volver</a>

</body>
</html>
