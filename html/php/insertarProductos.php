<?php

require 'producto.php';

$servername = "localhost";
$database = "pruebas";
$username = "php";
$password = "1234";
// Se crea la conexion
$conn = mysqli_connect($servername, $username, $password, $database);
// Se comprueba la conexion
if (!$conn) {
      die("ERROR CONECTANDO: " . mysqli_connect_error());
}
 
$codigo=$_GET["fcod"];
$descripcion=$_GET["fdesc"];
$precio=$_GET["fprecio"];
$stock=$_GET["fstock"];

$productoNuevo=new Producto($codigo,$descripcion,$precio,$stock);
$productoNuevo->insertar($conn);
$conn->close();


?>