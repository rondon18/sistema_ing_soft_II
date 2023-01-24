<?php

	// Se llama conexion

	require("conexion.php");

	// Llama las clases
	require_once('../clases/persona.php');
	require_once('../clases/usuario.php');


	$usuarios = new usuario();

	// var_dump($_POST);

	// Si los campos de cedula y contraseña fueron llenados
	if (isset($_POST['cedula'],$_POST['contraseña'])) {

		// Verifica que la cadena recibida no esté vacia
		if (!empty($_POST['cedula']) and !empty($_POST['contraseña'])) {

			$cedula = $_POST['nacionalidad'] . $_POST['cedula'];			
			$contraseña = $_POST['contraseña'];

			$usuarios->setCedula($cedula);
			$usuarios->setContraseña($contraseña);

			$chequeo_login = $usuarios->chequeo_login();

			// verifica que la base de datos no dé una respuesta nula
			if ($chequeo_login) {

				session_start();

				$_SESSION['datos_login'] = $chequeo_login;
				$_SESSION['login'] = true;

				header('Location: ../lobby/index.php');

			}

			// en caso de retornar nulo regresa al menú
			else {
				// devuelve al menú por error de datos (usuario o clave errados)
				// header('Location: ../index.php?ed');
			}

		}
		else {
			// devuelve al menú por error de datos (usuario o clave errados)
			// header('Location: ../index.php?ed');
		}
	}

	// si se envia el formulario con las preguntas de seguridad
	elseif (isset($_POST['cedula'],$_POST['respuesta_1'],$_POST['respuesta_2'])) {
		
		// verifica los datos del usuario
		$usuarios->set_cedula($_POST['cedula']);
		if ($datos_usuario = $usuarios->consultar_usuario()) {
			// si al menos una de las dos preguntas admite el acceso
			if (($_POST['respuesta_1'] == $datos_usuario['respuesta_1']) or ($_POST['respuesta_2'] == $datos_usuario['respuesta_2'])) {
				session_start();

				$_SESSION['datos_login'] = $datos_usuario;
				$_SESSION['login'] = true;

				$bitacora->set_cedula_usuario($_POST['cedula']);

				$_SESSION['id_bitacora'] = $bitacora->iniciar_bitacora();
				$_SESSION['acciones'] = "Inicia Sesión (inicio alterno)";

				// header('Location: ../lobby/index.php');
			}
			else {
				// header('Location: ../index.php?datos_invalidos');
			}
		}
		else {
			// header('Location: ../index.php?datos_invalidos');
		}
	}
	else {
		// header('Location: ../index.php?error');
	}
?>