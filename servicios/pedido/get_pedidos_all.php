<?php
include('../_conexion.php');
$response=new stdClass();

function estado2texto($id){
	switch ($id) {
		case '1':
			return 'Por procesar compra';
			break;
		case '2':
			return 'Por pagar compra';
			break;
		case '3':
			return 'Por entregar producto';
			break;
		case '4':
			return 'En camino';
			break;			
		case '5':
			return 'Entregado';
			break;
		default:
			break;
	}
}

session_start();
$id=$_SESSION['id'];
$datos=[];
$i=0;
$sql="select ped.*,nombre.*,ped.estado estadoped
from pedido ped
inner join producto nombre
on ped.id_u=nombre.id_u
where ped.id=$id and ped.estado!=2
 and ped.estado!=1";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
	$obj=new stdClass();
	$obj->nombre=utf8_encode($row['nombre']);
	$obj->descripcion=utf8_encode($row['descripcion']);
	$obj->fecped=$row['fecped'];
	$obj->dirusuped=utf8_encode($row['dirusuped']);
	$obj->telusuped=utf8_encode($row['telusuped']);
	$obj->precio=$row['precio'];
	$obj->estado=$row['estadoped'];
	$obj->estadotxt=estado2texto($row['estadoped']);
	$obj->ubicacion_imagen=$row['ubicacion_imagen'];
	$datos[$i]=$obj;
	$i++;
}
$response->datos=$datos;

mysqli_close($con);
header('Content-Type: application/json');
echo json_encode($response);
