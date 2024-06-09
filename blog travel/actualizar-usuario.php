<?php


if(isset($_POST['submit'])){
	
	require_once 'includes/conexion.php';

// recoger datos de actualizacion
	$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : false;
	$apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db,$_POST['apellidos']) : false;
	$email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
	
//array de errores
	
	$errores = array();





 //validar los datos antes de guardarlos con condiciones de seguridad
 
 
 
 //validar campo nombre
	 if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
		$nombre_validado = true;
	 }
	else {
		$nombre_validado = false;
		$errores['nombre'] = "El nombre no es valido";
	}
//validar campo apellidos
	 if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
		$apellido_validado = true;
	 }
	else {
		$apellido_validado = false;
		$errores['apellidos'] = "Los apellidos no son validos";
	}
//validar el email	
	 if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
		$email_validado = true;
	 }
	else {
		$email_validado = false;
		$errores['email'] = "El email no es valido";
	}

	
	$guardar_usuario = false;
	
	if(count($errores) == 0 ) {
		$guardar_usuario = true;
		$sql="select email from usuarios where email = '$email';";
		$isset_email = mysqli_query($db, $sql);
		
		$isset_user = mysqli_fetch_assoc($isset_email);
		
		if($isset_user['id'] == $usuario['id'] || empty($isset_user['id'])){
		//actualizar el usuario en la bd
		$usuario = $_SESSION['usuario'];
		$sql ="update usuarios set nombre='$nombre',apellidos='$apellidos', email='$email' where id =".$usuario['id'];
		$registro = mysqli_query($db,$sql);
		
		//var_dump(mysqli_error($db));
		//die();
		
		if($registro) {
			$_SESSION['usuario']['nombre'] = $nombre;
			$_SESSION['usuario']['apellidos'] = $apellidos;
			$_SESSION['usuario']['email'] = $email;
			$_SESSION['completado'] = "La actualización de datos ha sido realizada exitosamente";
		}else {
			$_SESSION['errores']['general'] = "Fallo al actualizar los datos";
		}
		}else {
			
						$_SESSION['errores']['general'] = "Fallo el ususario ya existe";
		}
		
	}else {
		
		$_SESSION['errores'] = $errores ;
		header('Location: mis-datos.php');
		
	}
	
	
}
header('Location: mis-datos.php');

?>