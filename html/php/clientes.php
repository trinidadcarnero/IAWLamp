<?php

class Clientes{

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

function buscar($op,$busqueda){
    if ($op=="nom") {
        $sql= "SELECT * from pruebas.clientes where nombre like '%".$busqueda."%'";
    }
    else if ($op=="apell"){
        $sql= "SELECT * from pruebas.clientes where apellidos like '%".$busqueda."%'";
    }
        else if ($op=="DNI"){
            $sql= "SELECT * from pruebas.clientes where DNI ='".$busqueda."'";
        }
            else if ($op=="email"){
                $sql= "SELECT * from pruebas.clientes where email ='".$busqueda."'";
            }
    $result = mysqli_query($this->conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            return "<p> - Nombre: " . $row["nombre"]. " <br>- Apellidos: " . $row["apellidos"]. "<br> - DNI: " . $row["dni"]. "<br> - Email: " . $row["email"]. "<br> - Fecha de Nacimiento: " . $row["fecha_nacimiento"]."</p><br>";
        }
    } 
    else {
    return "0 resultados";}
 
}

}



