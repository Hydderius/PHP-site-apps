
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
	<h1>Nueva entrada</h1>
	<br/>
	<p>Comparte tus experiencias con todo detalle , todo consejo es bien recibido.</p>
	<br/>
	<form method="POST" action="guardar-ent.php" >
		<label for="titulo">Titulo</label>
		<input type="text" name="titulo"/>
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>

		<label for="descripcion">Cuerpo</label>
		<textarea name="descripcion"></textarea>
	   <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>

		
		<label for="categoria">Categoria</label>
		<select name="categoria">
			<?php 
				$categorias = conseguirCategorias($db);
				if(!empty($categorias)):
					while($categoria = mysqli_fetch_assoc($categorias)):
			?>
				<option value="<?=$categoria['id']?>"><?=$categoria['nombre']?></option>
			
			<?php 
				endwhile;
				endif;
			?>
		</select>
				<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : ''; ?>

		
		
		<br />
		<br />
		<input type="submit" value="Crear" />
	</form>
	
<?php borrarErrores(); ?>
</div> <!--fin principal-->
			
<?php require_once 'includes/pie.php'; ?>