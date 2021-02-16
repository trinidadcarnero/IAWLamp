<?php

class BuscarProductos {
    private $conn;

    public function __construct($servername, $username, $password, $database) {

       $this->conn = new mysqli($servername, $username, $password, $database);

       if ( $this->conn->connect_error) {
            die("ERROR: " .  $this->conn->connect_error);
        } else {
            echo "Se conectó correctamente.";
        }
    }

    public function obtenerSqlByOp($op, $texto) {
        if ($op=="ocod") {
            return "SELECT * FROM productos where cod=$texto";
        } elseif ($op=="odesc") {

            return "SELECT * FROM productos where descripcion like '%$texto%'";

        } elseif ($op=="opre") {

         return "SELECT * FROM productos where precio<=$texto";
        }
    }

    public function obtenerProductos($sql) {
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<br> Codigo: ". $row["cod"]. " - Descipcion: ". $row["descripcion"]. " - Precio " . $row["precio"] . " - Stock " . $row["stock"] . "<br>";
            }
        } else {
            echo "0 resultado";
        }
        $this->conn->close();
    }
}

$conexion = new BuscarProductos("localhost", "php", "1234","pruebas");
$resultado = $conexion->obtenerSqlByOp();
$conexion->obtenerProductos($resultado);

?>
 