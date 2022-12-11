<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css2/style.css">
    <title>Registro de Usuarios</title>
</head>
 <div class="form"> 
        <body>
            <form action="agregarUsuarioControl.php" method="POST" enctype="multipart/form-data">
            <table>
               <h2> REGISTRO DE USUARIOS </h2>
<BR><br>

        Nombre de usuario:
    
         
         
        <input type="text" name="user"  required placeholder="Nombre de Usuario">

Apellido:
<input type="text" name="app" required placeholder="Apellido paterno">
<BR>
Segundo apellido:

<input type="text" name="apm" required placeholder="Apellido materno">
<br>
Correo electrónico:

<input type="text" name="email" required placeholder="Correo electrónico">
<BR>

Introduce una foto de ti:

<input type="file" name="imagen">

<br>
    Contraseña:
    <input type="password" name="password"  required placeholder="Contraseña">
    <tr>
    <td>
        <input type="submit" value="Agregar Usuario">
    </td>
    <td>
        <input type="reset" value="Borrar">
    </td>
</tr>
</td>
                </form>

            </table>
            <a href="login.php">--Regresa al inicio--</a>
</div>

        </body>
    </head>
</html>