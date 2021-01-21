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

// Buscar Producto
$op=$_POST["tipo"];
$busqueda= $_POST["busqueda"];

if ($op=="nom") {$sql= "SELECT * from pruebas.clientes where nombre like '%".$busqueda."%'";}
    else if ($op=="apell"){$sql= "SELECT * from pruebas.clientes where apellidos like '%".$busqueda."%'";}
        else if ($op=="DNI"){$sql= "SELECT * from pruebas.clientes where DNI ='".$busqueda."'";}
            else if ($op=="email"){$sql= "SELECT * from pruebas.clientes where email ='".$busqueda."'";}

$result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                  echo "<p> - Nombre: " . $row["nombre"]. " <br>- Apellidos: " . $row["apellidos"]. "<br> - DNI: " . $row["dni"]. "<br> - Email: " . $row["email"]. "<br> - Fecha de Nacimiento: " . $row["fecha_nacimiento"]."</p><br>";
    }
} else {
    echo "0 resultados";
}

mysqli_close($conn);
?>

