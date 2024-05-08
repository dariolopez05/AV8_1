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
    <style>
        /* Estilos generales */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: rgb(222, 239, 231);
}

.container {
    width: 400px;
    margin: 50px auto;
    background-color: rgb(92, 115, 115);
    color: rgb(255, 255, 255);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

/* Estilos para el formulario */
form {
    display: flex;
    flex-direction: column;
}

.checkbox-group {
    margin-bottom: 20px;
}

.checkbox {
    margin-bottom: 10px;
}

/* Estilos para los checkboxes y las etiquetas */
input[type="checkbox"] {
    margin-right: 10px;
}

label {
    display: inline-block;
    font-size: 16px;
}

/* Estilos para el botón de enviar */
input[type="submit"] {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

table {
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 20px;
}

th {
    background-color: #f2f2f2;
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

tr:nth-child(odd) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f2f2f2;
}

#button-top-right {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 16px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease;
}

#button-top-right:hover {
    background-color: #0056b3;
}

    </style>
    
</head>
<script src="01.js"></script>
<body>
<div class="container" id="paco">
    <h1>Buscador de marcas favoritas</h1>
    <form action="favoritos.php" method="post">
    <div class="checkbox-group">
        <?php echo $brands ?>
    </div>
    <input type="submit" value="Buscar">
    </form>
    
</div><button id="button-top-right">Modo oscuro</button>
</body>
</html>