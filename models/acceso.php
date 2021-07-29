<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET');
header('Access-Control-Allow-Headers: token, Content-Type');
header('Access-Control-Max-Age: 1728000');
header('Content-Length: 0');
header('Content-Type: application/json');
include 'conexion.php';
$op=$_POST['op'];
if($op===null)
{
    echo "Error";
}
else{
switch($op)
{
        case 'insertarProducto':
            header('Content-Type: application/json');
            $nombre=$_POST['nombre'];
            $precio=$_POST['precio'];
            $sqlInsert="INSERT INTO producto(nombre, precio) VALUES ('$nombre','$precio')";
            if($mysqli->query($sqlInsert)===TRUE)
            {
            echo json_encode("Se guardo correctamente");
            echo $sqlInsert;
            }
            else
            {
            echo "Error:".$sqlInsert."<br>".$mysqli->error;
            echo  $sqlInsert;
            }
            $mysqli->close();
        break;
        
        
           
        case 'updateProducto':
            header('Content-Type: application/json');
            $id=$_POST['id'];
            $precio=$_POST['precio'];
            $sqlUpdate="UPDATE producto SET precio = '$precio'
             WHERE id = '$id'";
            if($mysqli->query($sqlUpdate)===TRUE)
            {
            echo json_encode("Se actualizo correctamente");
            echo $sqlUpdate;
            }
            else
            {
            echo "Error:".$sqlUpdate."<br>".$mysqli->error;
            }
            $mysqli->close();
        break;

        case 'updateProductoCantidad':
            header('Content-Type: application/json');
            $idprod=$_POST['id'];
            $cantidad=$_POST['cantidad'];
            $ciudad=$_POST['ciudad'];
            $sqlb="SELECT id FROM bodega WHERE ciudad = '$ciudad'";
            $resultado=mysqli_query($conn,$sqlb);
            
            if($fila=mysqli_fetch_row($resultado)){
                $idbod=$fila[0];
            }

            $dql = " SELECT cantidad FROM detalle_bodega WHERE idbod = '$idbod' and idprod = '$idprod' ";
            $resultado = mysqli_query($conn,$dql);
            if( $fila = mysqli_fetch_row($resultado) ){
            $old_cant = $fila[0];
            }
            $new_cant = $cantidad + $old_cant; 
            if( $old_cant == 0){
                $actulizar = "update detalle_bodega
                            set cantidad = '$new_cant',
                                estado = 'S'
                            where idbod = '$idbod'
                            and idprod = '$idprod' ";
            }else{
                $actulizar = "update detalle_bodega
                            set cantidad = '$new_cant'
                            where idbod = '$idbod'
                            and idprod = '$idprod' ";
            }
            $resultA = mysqli_query($conn,$actulizar);
            if($resultA == true)
            {
            echo json_encode("Se actualizo correctamente");
            }
            else
            {
            echo "Error:".$sqlUpdate."<br>".$mysqli->error;
            }
            $mysqli->close();
        break;
        case 'updateProductoVender':
            header('Content-Type: application/json');
            $idprod=$_POST['id'];
            $cantidad=$_POST['cantidad'];
            $ciudad=$_POST['ciudad'];
            $sqlb="SELECT id FROM bodega WHERE ciudad = '$ciudad'";
            $resultado=mysqli_query($conn,$sqlb);
            
            if($fila=mysqli_fetch_row($resultado)){
                $idbod=$fila[0];
            }

            $dql = " SELECT cantidad FROM detalle_bodega WHERE idbod = '$idbod' and idprod = '$idprod' ";
            $resultado = mysqli_query($conn,$dql);
            if( $fila = mysqli_fetch_row($resultado) ){
            $old_cant = $fila[0];
            }

            if ($cantidad == $old_cant) {
                $new_cant = 0;
            } else  if ($cantidad > $old_cant) {
                $new_cant = $old_cant;
            } else {
                $new_cant = $old_cant - $cantidad;
            }

            if( $new_cant == 0){
                $actulizar = "update detalle_bodega
                            set cantidad = '$new_cant',
                                estado = 'A'
                            where idbod = '$idbod'
                            and idprod = '$idprod' ";
            }else{
                $actulizar = "update detalle_bodega
                            set cantidad = '$new_cant'
                            where idbod = '$idbod'
                            and idprod = '$idprod' ";
            }
            $resultA = mysqli_query($conn,$actulizar);
            if ($resultA == false) {
                echo " No se pudo vender ";
                //echo json_encode("no actualizaddo");
            } else {
                if ($cantidad > $old_cant) {
                    echo "Stock insuficiente";
                } else {
                    echo "Vendido";
                }
                //echo json_encode("Actualizado");
            }
            $mysqli->close();
        break;

        case 'buscarProducto':
            header('Content-Type: application/json');           
            $nombre = $_POST['nombre'];
            $sqlBuscar = "SELECT p.nombre, d.cantidad, b.ciudad,p.precio FROM bodega as b, producto as p, detalle_bodega as d where p.nombre like '" . $nombre . "%' and b.id=d.idbod and p.id=d.idprod and d.estado='s' order by p.nombre";
            $result = mysqli_query($conn,$sqlBuscar);
            if($row = mysqli_num_rows($result) > 0){
                   while($row = mysqli_fetch_assoc($result)){
                    echo ' NOMBRE:'.$row['nombre'];
                    echo ' BODEGA: '.$row['ciudad'];
                    echo ' CANTIDAD: '.$row['cantidad'];
                    echo ' PRECIO:'.$row['precio'];
                    echo '---';
                }
            }else{
                $result="No se encontraron datos";                    
                echo json_encode($result);
            }
        break;
}
}
?>