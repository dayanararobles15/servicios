<?php
$servername="bouqyro7qarzwymhfexr-mysql.services.clever-cloud.com";
$username="ubhxtrm5xmwbswzy";
$password="89QAlkECDWRqQT4y3UDA";
$dbname="bouqyro7qarzwymhfexr";
$conn= mysqli_connect($servername,$username,$password,$dbname);
$mysqli = new mysqli($servername,$username,$password,$dbname);
if(!$mysqli)
{
    die("Error en la conexion".mysqli_connect_error());
}
function utf8_converter($array)
{
    array_walk_recursive($array, function($item) {
        $item =utf8_encode($item);
    });
    return json_encode($array);
}


?>