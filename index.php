<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mi Tienda de productos </title>
	<script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>
	/* Son las librerias que se usaron para los iconos */
	<link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="fontawesome-free-6.2.0-web/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
<?php include("layouts/_main-header.php"); ?>
	<div class="main-content">
		<div class="content-page">
			<div class="title-section"> <b>Productos mejores vendidos!!</b></div>
			<div class="products-list" id="space-list">
			</div>
		</div>
	</div>
	<?php include("layouts/_footer.php"); ?>
	<script type="text/javascript" src="js/main-scripts.js"></script>
			<script type="text/javascript">
		$(document).ready(function(){
			$.ajax({
				url:'servicios/producto/get_all_products.php',
				type:'POST',
				data:{},
				success:function(data){
					console.log(data);
					let html='';
					for (var i = 0; i < data.datos.length; i++) {
						html+=
						'<div class="product-box">'+
							'<a href="producto.php?p='+data.datos[i].id_u+'">'+
								'<div class="product">'+
									'<img src="assets/products/'+data.datos[i].ubicacion_imagen+'">'+
									'<div class="detail-title">'+data.datos[i].nombre+'</div>'+
									'<div class="detail-description">'+data.datos[i].descripcion+'</div>'+
									'<div class="detail-price">'+formato_precio(data.datos[i].precio)+'</div>'+
								'</div>'+
							'</a>'+
						'</div>';
					}
					document.getElementById("space-list").innerHTML=html;
				},
				error:function(err){
					console.error(err);
				}
			});
		});
		function formato_precio(valor){
			//El valor de la moneda es $10(","span)
			let svalor=valor.toString();
			let array=svalor.split(".");
			return "$"+array[0]+",<span>"+array[1]+"</span>";
		}
	</script>
</body>
</html>







