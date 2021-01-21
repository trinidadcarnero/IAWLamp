<?php
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
 
$cod=$_GET["fcod"];
$desc=$_GET["fdesc"];
$precio=$_GET["fprecio"];
$stock=$_GET["fstock"];

$sql = "INSERT INTO productos (cod, descripcion, precio, stock) VALUES ($cod, '$desc' , $precio, $stock)";
if (mysqli_query($conn, $sql)) {
     echo "El nuevo campo ha sido añadido correctamente";
} 
else {
      echo "ERROR INSERTANDO: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>