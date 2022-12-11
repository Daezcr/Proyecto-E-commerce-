<?php

session_start();
$rolS= $_SESSION['rol'];

if(!empty($rolS)&& $rolS=='administrador'){
 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css2/style4.css">
    <title> Crear Usuario</title>
</head>
<body>
<form action="controlAgregarUsuariosAdmin.php" method="POST">
    <table border="1">
    <caption> Creación de nuevos usuarios</caption>
    <tr>
        <td>
            Usuario:
        </td>
        <td>
            <input type="text" name="txtUsuario" required>
            <tr>
        <td>
             Primer apellido:
        </td>
        <td>
            <input type="text" name="primerapellido" required>
            <tr>
        <td>
            Segundo apellido:
        </td>
        <td>
            <input type="text" name="segundoapellido" required>
            <tr>
        <td>
            Correo electronico:
        </td>
        <td>
            <input type="text" name="correo" required>
        </td>
    </tr>
        <tr>
            <td>
            Password:
            </td>
            <td>
<input type="password" name="txtPassword" required>
            </td>
        </tr>
        <tr>
            <td>
                Rol:
            </td>
            <td>
                <select name="rol">
                    <option value="administrador">Administrador</option>
                    <option value="normal">Normal</option>
</select>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Crear usuario">
            </td>
            <td>
                <input type="reset" value="Borrar datos">
            </td>
        </tr>
</table>    <br>
<a href="mostrarUsuarios.php"> Editar otros usuarios </a><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<a href="login2.php">SALIR DEL ADMINISTRADOR DE USUARIOS</a>
</form>
</body>
</html>
<?php
 }
 else{
    header ("location:login.php");
 }
 ?>