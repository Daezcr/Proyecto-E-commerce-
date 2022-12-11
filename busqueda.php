<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mi Tienda de productos</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="fontawesome-free-6.2.0-web/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
<div class="search-place">
			<input type="text" id="idbusqueda" placeholder="Encuentra todo lo que necesitas...">
			<button class="btn-main btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
		</div>
		<div class="options-place">
			<div class="item-option" title="Registrate"><i class="fa-solid fa-user"></i></div>
			<div class="item-option" title="Ingresar"><i class="fa fa-sign-in" aria-hidden="true"></i></div>
			<div class="item-option" title="Mis compras"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
		</div>
	<?php include("layouts/_main-header.php"); ?>
	<div class="main-content">
		<div class="content-page">
			<div class="title-section">Resultados para <strong>"<?php echo $_GET['text']; ?>"</strong></div>
			<div class="products-list" id="space-list">
			</div>
		</div>
	</div>
	<?php include("layouts/_footer.php"); ?>
	<script type="text/javascript" src="js/main-scripts.js"></script>
	<script type="text/javascript">
		var text="<?php echo $_GET['text']; ?>";
		$(document).ready(function(){
			$.ajax({
				url:'servicios/producto/get_all_results.php',
				type:'POST',
				data:{
					text:text
				},
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
					if (html=='No se a encontrado el producto que querias') {
						document.getElementById("space-list").innerHTML="No hay resultados";
					}else{
						document.getElementById("space-list").innerHTML=html;
					}
				},
				error:function(err){
					console.error(err);
				}
			});
		});
		function formato_precio(valor){
			//10.99
			let svalor=valor.toString();
			let array=svalor.split(".");
			return "$"+array[0]+",<span>"+array[1]+"</span>";
		}
	</script>
</body>
</html>