<!-- BARRA LATERAL -->
<?php require_once 'helpers.php'; ?>

				<aside id="sidebar">
				
	<div id="buscador" class="bloque">
		<h3>Buscar</h3>

		<form action="buscar.php" method="POST"> 
			<input type="text" name="busqueda" />
			<input type="submit" value="Buscar" />
		</form>
	</div>
				<?php if(isset($_SESSION['usuario'])): ?>
				<div id="usuario-logueado" class="bloque">
				<h3>Bienvenido <?=$_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos']; ?></h3>
				<!-- botones de usuario  -->
				<a href="crear-entradas.php" class="boton boton-naranja">Crear entradas</a>
				<a href="crear-categoria.php" class="boton boton-naranja">Crear categoria</a>
				<a href="mis-datos.php" class="boton boton-verde">Config cuenta</a>
				<a href="logout.php" class="boton boton-rojo">Cerrar sesión</a>
				</div>
				<?php endif; ?>
				<?php if(!isset($_SESSION['usuario'])): ?>
					<div id="login" class="bloque">
						<h3>Identificate:</h3>
						
							<?php if(isset($_SESSION['error_login'])): ?>
				<div  class="alerta alerta-error">
				 <?=$_SESSION['error_login'];?>
				</div>
				<?php endif; ?> 
				
						<form action="logueando.php" method="POST">
							<label for="email">Usuario</label>
							<input type="text" name="email" />
							
							<label for="password">Contraseña</label>
							<input type="password" name="password" />
							
						
							<input type="submit" value="Login" />
						</form>
					</div>
					<div id="register" class="bloque">
					<?php  //if(isset($_SESSION['errores'])) : ?>
					<?php // var_dump($_SESSION['errores']); ?>
					<?php // endif; ?>
						<h3>Registrate:</h3>
						
						
						<?php if(isset($_SESSION['completado'])): ?>
						<div class="alerta alerta-exito"><?=$_SESSION['completado']?></div>
						<?php  elseif(isset($_SESSION['errores']['general'])): ?>
						<div class="alerta alerta-error"><?=$_SESSION['errores']['general'] ?></div>
						<?php  endif; ?>
						
						
						<form action="registrando.php" method="POST">
							<label for="nombre">Nombre</label>
							<input type="text" name="nombre" />
							<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
							
							<label for="apellidos">Apellidos</label>
							<input type="text" name="apellidos" />
							<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

							<label for="email">Usuario</label>
							<input type="text" name="email" />
							<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

							<label for="password">Contraseña</label>
							<input type="password" name="password" />
							<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>

						
							<input type="submit" name="submit" value="Registrar" />
							<?php   borrarErrores(); ?>
						</form>
						
					</div>
					
					<?php endif; ?>
				</aside>