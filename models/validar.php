<?php

session_start();
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("bouqyro7qarzwymhfexr-mysql.services.clever-cloud.com","ubhxtrm5xmwbswzy","89QAlkECDWRqQT4y3UDA","bouqyro7qarzwymhfexr");

$consulta="SELECT nombre,perfil,idbod,ciudad FROM usuarios as a,bodega as b WHERE a.nombre='$usuario' and a.contra='$contraseña' and a.idbod=b.id";

$resultado=mysqli_query($conexion,$consulta);


$filas=mysqli_fetch_array($resultado);

if(is_null($filas)){
    
    echo "<script>
               alert('Usuario o contraseña incorrecto');
               window.location= '../index.php?action=login'
   </script>";
?>
<?php



    
}else
    $_SESSION['nom'] = $filas['nombre']; 
    $_SESSION['perfil'] = $filas['perfil'];
    $_SESSION['idbod'] = $filas['idbod'];
    $_SESSION['ciudad']=$filas['ciudad'];
    if($filas['perfil']=='admin'){ //administrador
    header('location: ../index.php?action=servicios');

    }else
    if($filas['perfil']=='vendedor'){ //vendedor
    header('location: ../index.php?action=servicios');
    }
    else{
    ?>
    
  
    <?php
    include('location: ../index.php?action=login');

}

mysqli_free_result($resultado);

mysqli_close($conexion);
