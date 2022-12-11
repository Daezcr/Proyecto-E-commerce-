<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css2/style3.css">

    <title> Mostrar todos los usuarios del sistema </title>
</head>
<body>
    <?php
include 'loginModel.php';
//Iniciamos la sesión en este archivo
session_start();
//Pasamos la variable de sesion a una variable local
     $rol=$_SESSION['rol'];
if(!empty($rol) && ($rol =='administrador')){
    $objLogin= new loginModel();
    $busqueda=strtolower($_REQUEST['txtBusqueda']);
    if(empty($busqueda)){
        header('location: mostrarUsuarios.php');
    }
    $datos=$objLogin->BuscarUsuarios($busqueda);
$resultado=$objLogin->obtenerCantidadUsuariosRegistrados();
$cantidadUsuarios=$resultado[0]['total_usuarios'];
$porPagina=5;
if(empty($_GET['pagina'])){
$pagina=1;
}
else{
    $pagina=$_GET['pagina'];
}
$desde=($pagina-1)*$porPagina;
$totalPaginas=ceil($cantidadUsuarios/$porPagina);
    ?>
       <table border="1">
       <caption> USUARIOS REGISTRADOS DE LA PAGINA WEB </caption>
        <br><br>
        <tr>
            <th>
                Usuario activos
            </th>
            <th>
                Primer apellido
            </th>
            <th>
                Segundo apellido
            </th>
            <th>
                Correo electronico
            </th>
            <th>
                pass
            </th>
            <th>
                Imagen del usuario
            </th>
            <th>
                Rol 
            </th>
            <th>
                Acciones
            </th>
</tr>
<?php
foreach($datos as $dato){?>
<tr>
<tr>
    <td><!--Aca va el valor del Usuario-->
<?php echo $dato['usuario']?>
    </td>
    <td><!--Aca va el valor del  Apellido Usuario-->
<?php echo $dato['apellido_paterno']?>
    </td>
    <td><!--Aca va el valor del Apellido maternoUsuario-->
<?php echo $dato['apellido_materno']?>
    </td>
    <td><!--Aca va el valor del Apellido maternoUsuario-->
<?php echo $dato['correo']?>
    </td>
    <td><!--Aca va el valor del Apellido maternoUsuario-->
<?php echo $dato['pass']?>
    </td>
    <td><!--Aca va el valor de la imagen del Usuario-->
<img src= <?php echo $dato['ubicacion_imagen'] ?> alt=""Imagen que el usuario eligio al registrarse width="40%" height="50%">
</td>
    <td> <!--Aca va el valor del Rol-->
    <?php echo $dato['rol']?>
    </td>
    <td>
        <!-- Aca creamos un hipervinculo que nos va a llevar a EditarUsuarios,y le
        concadenamos mediante un pequeño codigo de php la llave primaria que nos va a permitir realizar la actualizción (?usuario * ...) -->
        <a href="editarUsuarios.php?usuario=<?php echo $dato['usuario']?>">Editar</a>
         --
          <a href="eliminarUsuarios.php?usuario=<?php echo $dato['usuario']?>">Eliminar</a>
    </td>
</tr> 
<?php
 }
?>
    </table>
    <br><br>
    <a href="inventario.php"> Inventario de los productos </a>
    <br><Br><br>
    <a href="crearUsuariosAdmin.php"> Crear Usuarios como Administrador </a>
    <br><BR><br><br>
    <a href="login.php">Volver Al inicio </a>

<div class="paginador">
<br><br><br><br><br>    
<ul>
        <?php
if($pagina!=1){ 
        ?>
                    <li><a href="?pagina=<?php echo '1';?>">|<</a></li>
                    <li><a href="?pagina=<?php echo $pagina-1?>"><<</a></li>
                <?php
 }
                        for($i=1;$i<=$totalPaginas;$i++){
                        
                        if($i==$pagina){?>
                        <li class="paginaSeleccionada"><?php echo $i;?></li>
                <?php
                        } 
                        else{
                ?>
                        
                        <li><a href=<?php echo"?pagina=".$i?>><?php echo $i ?></a></li>
                        <?php 
                    }

                }
                if($pagina!=$totalPaginas){ 
                ?>
    <li><a href="?pagina=<?php echo $pagina+1?>">>></a></li>
    <li><a href="?pagina=<?php echo $totalPaginas?>"><|</a></li>
    <?php
     }
     ?>
    </ul>
</div>
    <br><br><br><br><br><br>  <br><br><br><br>

</body>
<?php
 }
 else{
    Header("Location: login.php");
 }
 ?>
</html>