<?php

session_start();
require_once "autoloader.php";

$data= new Gestion;
$brands = $data->getBrands();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body class="container">
    <h1>Buscador de marcas favoritas</h1>
    <form action="" method="post">
    <div class="checkbox-group">
        <?php echo $brands ?>
    </div>
    <input type="submit" value="Seleccionar">
    </form>
</body>
</html>