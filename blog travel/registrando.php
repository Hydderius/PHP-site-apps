<?php


if(isset($_POST['submit'])){
	
	require_once 'includes/conexion.php';

if(isset($_SESSION)){
	session_start();
}


	$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : false;
	$apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db,$_POST['apellidos']) : false;
	$email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
	$password = isset($_POST['password']) ? mysqli_real_escape_string($db,$_POST['password']) : false;
	
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
// validar contraseña	
	if(!empty($password) ){
		$password_validado = true;
	}
	else {
		$password_validado = false;
		$errores['password'] = "la password esta vacia";
	}
	
	$guardar_usuario = false;
	
	if(count($errores) == 0 ) {
		$guardar_usuario = true;
		//insertamos el usuario en la bd
		$password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
		/*var_dump($password);
		var_dump($password_segura);
		var_dump(password_verify($password, $password_segura));
		die();*/
		$sql ="insert into usuarios values(null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE())";
		$registro = mysqli_query($db,$sql);
		
		//var_dump(mysqli_error($db));
		//die();
		
		if($registro) {
			$_SESSION['completado'] = "El registro ha sido realizado exitosamente";
		}else {
			$_SESSION['errores']['general'] = "Fallo al registrar el usuario";
		}
		
	}else {
		
		$_SESSION['errores'] = $errores ;
		header('Location: index.php');
		
	}
	
	
}
header('Location: index.php');

?>