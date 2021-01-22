<?php
$servername = "localhost";
$username = "php";
$password = "1234";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insertar Cliente
$nombre= $_POST["nombre"];
$apellidos= $_POST["apellido"];
$dni= $_POST["dni"];
$email= $_POST["email"];
$nacimiento= $_POST["naci"];

$sql ="insert into pruebas.clientes (nombre,apellidos,dni,email,fecha_nacimiento) values ('$nombre','$apellidos','$dni','$email','$nacimiento')";

if (mysqli_query($conn, $sql)==1) {
    echo "Insertado Correctamente";
} else {
    echo "Error Insertando: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
