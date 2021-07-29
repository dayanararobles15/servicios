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
$sqlSelect = "SELECT p.id,p.nombre, d.cantidad, b.ciudad,p.precio FROM bodega as b, producto as p, detalle_bodega as d where b.ciudad='$bodega' and b.id=d.idbod and p.id=d.idprod and d.estado='s'";


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