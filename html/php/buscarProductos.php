<?php
require 'ClassProducto.php';


$op=$_GET["opcion"];
$texto=$_GET["ftext"];

$productoL=new ClassProducto();
echo $productoL->buscarproducto($op,$texto);


?>