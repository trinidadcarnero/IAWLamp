<?php


class ClassProducto
{
    private $conn;

    function __construct(){

        $servername = "localhost:33060";
        $username = "php";
        $password = "1234";
        $this->conn = mysqli_connect($servername, $username, $password);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    function buscarproducto($op,$texto) {
        if ($op=="ocod") {
            $sql= "SELECT * FROM pruebas.productos where cod='".$texto."'";
        }

        elseif ($op=="odesc")  {
            $sql= "SELECT * FROM pruebas.productos where descripcion like '%$texto%'";

        }

        elseif ($op=="opre") {
            $sql= "SELECT * FROM pruebas.productos where precio<='".$texto."'";

        }

        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<br> Codigo: ". $row["cod"]. " - Descipcion: ". $row["descripcion"]. " - Precio " . $row["precio"] . " - Stock " . $row["stock"] . "<br>";
            }
        } else {
            return "0 resultado";

        }
    }

}


