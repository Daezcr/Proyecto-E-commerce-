
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, Initial-scale=1.0"> 
        <script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="fontawesome-free-6.2.0-web/css/all.css">
 <link rel="stylesheet" href="css2/style.css">
        <title>Inicio de sesion de administrador</title>
    </head>
    <div class="form"> 
    <body>
    <header>
            <form action="controlLogin2.php" method="POST"> 
        <table> 
<h2> INICIO DE SESIÓN  DE ADMINISTRADOR  </h2><br>
                <tr><br>
     
    Usuario: 
        
    
<input type="text" name="user" id="nombre" placeholder="Nombre de Usuario">

     
                </tr>
                <br></br>
                <tr>
                    
                        Contraseña:
                
                 
                        <input type="password" name="pass" id="contrasena" placeholder="Contraseña">
                  
                </tr>
        

                    <tr>   
                        <td>
                        <input type="submit" name="submit" value="Ingresar">
                    
                        </td>       
                    <td>
                        <input type="reset" value="Borrar">
                    </td>
                </tr>
</form>
            </table>     
      No soy un usuario administrador <br><br>
              <p><a href="login.php"> Regresa al inicio de sesion para clientes </a></p>
  
  
             
 
  <!--         <a href="editarUsuarios.html">--Editar Usuario--</a>
    <br><br> -->
   
      <!-- <a href="eliminarUsuarios.php">--Elimina tu Usuario--</a>  -->
      
        </div>
  

    </body>

</html>
