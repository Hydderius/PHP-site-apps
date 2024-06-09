<?php

//iniciar la sesion

require_once 'includes/conexion.php';


//recoger los formularios
if(isset($_POST)){
	//borrar error de usuario incorrecto antiguo
	if(isset($_SESSION['error_login'])){
				unset($_SESSION['error_login']);
			}
			
			//recoger userpusers
	$email = trim($_POST['email']);
	$password = $_POST['password'];
	
	$sql = "select * from usuarios where email = '$email' LIMIT 1";
	$login = mysqli_query($db, $sql);
	
	if($login && mysqli_num_rows($login) == 1){
		
		$usuario = mysqli_fetch_assoc($login);
		$verify = password_verify($password, $usuario['password']);
		if($verify) {
			$_SESSION['usuario'] = $usuario;
			
		}else {
			$_SESSION['error_login'] = "Login incorrecto";
			
		}
	}else{
		$_SESSION['error_login'] = "Login incorrecto";
		
	}
	
	
	
}
header ('Location: index.php');

//comprobar la password


//consulta para comprobar las credenciales del usuario



//utilizar una sesion para guardar los datos del usuario logueado


//si algo falla enviar una sesion con el error_get_last

// redirigir al index.php


?>