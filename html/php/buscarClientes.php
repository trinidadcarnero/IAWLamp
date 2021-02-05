<?php

require 'clientes.php';

// Buscar Clientes
$op=$_POST["tipo"];
$busqueda= $_POST["busqueda"];

$clienteNuevo=new Clientes();
echo $clienteNuevo->buscar($op,$busqueda);

?>

