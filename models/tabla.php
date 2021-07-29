<?php
//TABLA FORMULARIO PRINCIPAL productos
header('Content-Type:application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
include 'conexion.php';
session_start();
$bodega=$_SESSION['ciudad'];

if($bodega=='ADMIN'){
    $sqlSelect = "SELECT p.id, p.nombre, b.ciudad,d.cantidad, p.precio,d.estado FROM bodega as b, producto as p, detalle_bodega as d where b.id=d.idbod and p.id=d.idprod and b.ciudad <>'$bodega'";
}else{
    $sqlSelect = "SELECT p.id, p.nombre, b.ciudad,d.cantidad, p.precio,d.estado FROM bodega as b, producto as p, detalle_bodega as d where b.id=d.idbod and p.id=d.idprod and d.estado='S' and b.ciudad <>'$bodega'";
}



$respuesta = $conn->query($sqlSelect);
$result = array();
if($respuesta->num_rows>0)
{
    while($filaEstudiante=$respuesta->fetch_assoc())
    {
        array_push($result,$filaEstudiante);
    }
}else
{
    $result = "base de datos vacia";
}
echo json_encode($result);
?>