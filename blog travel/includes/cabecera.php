
<?php

require_once 'conexion.php';


?>
<?php 
require_once 'includes/helpers.php';

?>

<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title> Blog de viajes DANOLI</title>
		<link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
	</head>
	<body>
	<!-- CABECERA -->
	<header id="cabecera">
	<!-- LOGO -->
		<div id="logo">
		<img src="assets/img/logodanoli.png" class="logo" >
			<a href="index.php" >
				
		Viajes Danoli
			</a>
				<!-- MENU -->
				
		<nav id="menu">
			<ul>
				<li>
					<a href="index.php">Inicio<a>
				</li>
				<?php 
				$categorias = conseguirCategorias($db);
				if(!empty($categorias)):
					while($categoria = mysqli_fetch_assoc($categorias)): 
					
					?>
					<li>
						<a href="categoria.php?id=<?=$categoria['id']?>"><?=$categoria['nombre']?><a>
					</li>
					<?php endwhile;
					endif;
				?>
				<li>
					<a href="index.php">Sobre nosotros<a>
				</li>
				<li>
					<a href="index.php">Contacto<a>
				</li>
			</ul>
		</nav>
	</header>
	
		<div id="contenedor">