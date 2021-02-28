<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SalarioTest
 *
 * @author -Marta Trinidad Carnero, Antonio Abel García Castillero, Angel del corral, Juan Carlos Retamero Murillo
 */

require 'vendor/autoload.php';
require 'producto.php';
require 'ClassProducto.php';
class ProductoTest extends \PHPUnit\Framework\TestCase {

    public function testInsertarProducto() 
    {

        $servername = "localhost";
        $username = "php";
        $password = "1234";
        $dbname = "pruebas";

        // Establecer conexión con la base de datos
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }


        //Primera tanda
        //Primero calculo cuantas lineas hay en la tabla
        $sqlPrueba = "select * from productos;";
        $resultado = $conn->query($sqlPrueba);

        // Consulta para realizar la busqueda en la base de datos
        $productoAntes = $resultado->num_rows;


        $productonuevo = new Producto("25", "pruebainsert", "10", "99");

        $productonuevo->insertar($conn);

        $resultado = $conn->query($sqlPrueba);

        // Consulta para realizar la busqueda en la base de datos
        $productoDespues = $resultado->num_rows;


        $this->assertEquals($productoAntes + 1, $productoDespues, "El producto se ha insertado correctamente");

        //Segunda tanda
        $sqlPrueba = "select * from productos where cod like 'cod';";
        $resultado = $conn->query($sqlPrueba);

        // Consulta para realizar la busqueda en la base de datos
        $numeroFilas = $resultado->num_rows;

        $this->assertEquals(null, $numeroFilas, "El producto se inserta correctamente, 2a prueba, y no se repiten filas");

        $conn->close();
    }
    public function testbuscarProducto()
    {

        $servername = "localhost";
        $username = "php";
        $password = "1234";
        $dbname = "pruebas";

        // Establecer conexión con la base de datos
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        //primero inserto 5 filas en la tabla

        //creo un objeto Cliente, y le pongo valores al azar como en el código real


        $buscador = new ClassProducto("1","1","1","1");



        //lanzo una peticion cliente->buscar("Ped","onom",$conn) que tiene que ser resultado == 1
        $resultado = $buscador->buscarproducto("ocod","123");
        $this->assertEquals(null,$resultado,"Hemos buscado un producto con el codigo 1 y no estaba??");
    }
    public function testbuscarProductoPrecio()
    {

        $servername = "localhost";
        $username = "php";
        $password = "1234";
        $dbname = "pruebas";

        // Establecer conexión con la base de datos
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        //primero inserto 5 filas en la tabla

        //creo un objeto Cliente, y le pongo valores al azar como en el código real


        $buscador = new ClassProducto("1","1","1","1");



        //lanzo una peticion cliente->buscar("Ped","onom",$conn) que tiene que ser resultado == 1
        $resultado = $buscador->buscarproducto("odesc", "descripcionprueba");
        $this->assertEquals(null,$resultado,"Hemos buscado un precio de 1 y no estaba??");
    }
    public function testbuscarProductoStock()
    {

        $servername = "localhost";
        $username = "php";
        $password = "1234";
        $dbname = "pruebas";

        // Establecer conexión con la base de datos
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        //primero inserto 5 filas en la tabla

        //creo un objeto Cliente, y le pongo valores al azar como en el código real


        $buscador = new ClassProducto("1","1","1","1");



        //lanzo una peticion cliente->buscar("Ped","onom",$conn) que tiene que ser resultado == 1
        $resultado = $buscador->buscarProducto("opre", "14");
        $this->assertEquals(null,$resultado,"Hemos buscado un producto con el stock 1 y no estaba??");
    }
}