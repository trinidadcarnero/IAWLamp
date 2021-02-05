<?php
  require 'ClassCliente.php';
  require 'ClassEnvioMail.php';

  $servername = "localhost";
  $database = "pruebas";
  $username = "php";
  $password = "1234";

  $nombre=$_POST["nombre"];
  $apellidos=$_POST["apellido"];
  $dni=$_POST["dni"];
  $email=$_POST["email"];
  $fecha_nacimiento=$_POST["naci"];



  // Se crea la conexion
  $conn = mysqli_connect($servername, $username, $password, $database);
  // Se comprueba la conexion
  if (!$conn) {
    die("ERROR CONECTANDO: " . mysqli_connect_error());
  }


  $clienteNuevo=new Cliente($nombre,$apellidos,$dni,$email,$fecha_nacimiento);
  $clienteNuevo->darAlta($conn);

  $miEmail = new envioEmail($nombre, $email);
  $miEmail->sendMail($conn);
  $conn-> close();

?>
