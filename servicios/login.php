<?php
//1: Error de conexion
//2: Email invalido
//3: Contraseña incorrecta
include('_conexion.php');
$correo=$_POST['correo'];
$sql="SELECT * FROM usuarios WHERE correo='$correo'";
$result=mysqli_query($con,$sql);
if ($result) {
	$row=mysqli_fetch_array($result);
	$count=mysqli_num_rows($result);
	if ($count!=0) {
		$pass=$_POST['pass'];
		if ($row['pass']!=$pass) {
			header('Location: ../login.php?e=3');
		}else{
			session_start();
			$_SESSION['id']=$row['id'];
			$_SESSION['correo']=$row['correo'];
			$_SESSION['nombre']=$row['nombre'];
			header('Location: ../');
		}
	}else{
		header('Location: ../login.php?e=2');
	}
}else{
	header('Location: ../login.php?e=1');
}