<?php
//Recupero la sesion creada
session_start();
//Incluyo mi modelo donde estan mis funciones
include 'loginModel.php';
//Asigno el rol a una variable local
$rolS=$_SESSION['rol'];


if(!empty($rolS)&&($rolS=='administrador')){
    //Recibo el usuario a la variable local desde la url(GET)
    $usuario= $_GET['usuario'];
    $objModel = new loginModel();
    $resultado = $objModel->ObtenerTablaUsuarios($usuario);
    $usuario = $resultado[0]['usuario'];
    $pass = $resultado[0]['pass'];
    $rol = $resultado[0]['rol'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css2/style3.css">
    <title>Editar Usuarios</title>
</head>
<body><BR>
    EDITA LA CONTRASEÑA O ROL DEL USUARIO <BR><BR><BR>
    <form action="controlEditarUsuario.php" method="POST">
       <table border="1">
        <tr>
            <th>
                Usuario:
            </th>
            <th>
                Contraseña:
            </th>
            <th>
                Rol
            </th>
        </tr>
        <tr>
            <td>
                <input type="text" value=<?php echo $usuario; ?>  readonly name="usuario">
            </td>
            <td>
                <input type="password" value=<?php echo $pass; ?> name="pass">
            </td>
            <td>
                <select name="rol">
                    <option value=<?php echo $rol ?>><?php echo $rol ?></option>
                    <option value=
                    <?php
                    if($rol=='administrador')
                    {echo "normal";}
                    else if($rol=='normal'){
                        echo "administrador";
                    }

                    ?>> <?php
                    if($rol=='administrador')
                    {echo "normal";}
                    else if($rol=='normal'){
                        echo "administrador";
                    }
                    ?></option>
                </select>
            </td>
        
        </tr>
                </table>
                <input type="submit" value="Actualizar">
    </form><br>
    <a href="mostrarUsuarios.php"> Editar otros usuarios  </a>
</body>
</html>
<?php
 }
 else {
     header("Location: login.php");
 }
 ?>