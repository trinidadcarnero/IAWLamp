<?php
$servername = "localhost";
$database = "pruebas";
$username = "php";
$password = "1234";

// Crea la conexion
$conn = new mysqli($servername, $username, $password, $database);
// Comprueba que la conexion funciona correctamente
if ($conn->connect_error) {
  die("ERROR: " . $conn->connect_error);
}

$op=$_GET["opcion"];
$texto=$_GET["ftext"];

if ($op=="ocod") {

	$sql = "SELECT * FROM productos where cod=$texto";

}
elseif ($op=="odesc"){

	$sql = "SELECT * FROM productos where descripcion like '%$texto%'";

}
elseif ($op=="opre"){

	$sql = "SELECT * FROM productos where precio<=$texto";

}
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    // Muestra todas las columnas
	    while($row = $result->fetch_assoc()) {
	        echo "<br> Codigo: ". $row["cod"]. " - Descipcion: ". $row["descripcion"]. " - Precio " . $row["precio"] . " - Stock " . $row["stock"] . "<br>";
	    }
	} 
	else {
	    echo "0 resultados";
	}

	$conn->close();
?>