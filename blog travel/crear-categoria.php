
<?php
include_once 'includes/redireccion.php';

?>
<?php
include_once 'includes/cabecera.php';

?>

<?php
include_once 'includes/lateral.php';

?>


<!-- CAJA PRINCIPAL -->
<div id="principal">
	<h1>Nueva Categoría</h1>
	<br/>
	<p>Añade nuevos lugares donde te lleven tus viajes para poder compartir tus guias y consejos.</p>
	<br/>
	<form method="POST" action="guardar-cat.php" >
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre"/>
		<input type="submit" value="Crear" />
	</form>
	

</div> <!--fin principal-->
			
<?php require_once 'includes/pie.php'; ?>