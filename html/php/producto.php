<?php
require 'emailProductos.php';

//Definición de las clases

class Producto {
    //Estado
    private $codigo;
    private $descripcion;
    private $precio;
    private $stock;

//Comportamiento

    function __construct($codigo,$descripcion,$precio,$stock) {
        $this->codigo = $codigo;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->stock = $stock;
    }
    function get_codigo() {
        return $this->codigo;
    }
    function get_descripcion() {
        return $this->descripcion;
    }
    function get_precio() {
        return $this->precio;
    }
    function get_stock() {
        return $this->stock;
    }

    //Insercion Producto
    function insertar($conn) {
        $sql = "INSERT INTO productos (cod, descripcion, precio, stock) VALUES (".$this->get_codigo().",'".$this->get_descripcion()."',".$this->get_precio().",".$this->get_stock().")";

        if ($conn->query($sql) === TRUE) {

            //hago la construccion del email y lo mando
            echo "Producto insertado correctamente y notificado por email al Administrador";
            $miEmail = new envioEmail();
            $miEmail->sendMail();

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

}
?>
