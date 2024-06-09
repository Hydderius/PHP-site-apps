<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<?php
	$entrada_actual = conseguirEntrada($db, $_GET['id']);

	if(!isset($entrada_actual['id'])){
		header("Location: index.php");
	}
?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>
		
<!-- CAJA PRINCIPAL -->
<div id="principal">
<h1>Edita tu entrada <?=$entrada_actual['titulo'];?></h1>
	<br/>
	<p>Comparte tus experiencias con todo detalle , todo consejo es bien recibido.</p>
	<br/>
	<form method="POST" action="guardar-ent.php?editar=<?=$entrada_actual['id'];?>" >
		<label for="titulo">Titulo</label>
		<input type="text" name="titulo" value="<?=$entrada_actual['titulo'];?>"/>
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>

		<label for="descripcion">Cuerpo</label>
		<textarea name="descripcion" > <?=$entrada_actual['descripcion'];?> </textarea>
	   <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>

		
		<label for="categoria">Categoria</label>
		<select name="categoria">
			<?php 
				$categorias = conseguirCategorias($db);
				if(!empty($categorias)):
					while($categoria = mysqli_fetch_assoc($categorias)):
			?>
				<option value="<?=$categoria['id']?>"
				<?=($categoria['id'] == $entrada_actual['categoria_id']) ? 'selected="selected"' : ''  ?>
				><?=$categoria['nombre']?></option>
			
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