<?php
	
	session_start();

	if (!$_SESSION['login']) {
		header('Location: ../index.php');
		exit();
	}

	session_start();
	
	// destruye la sesion
	session_destroy();

	// redirecciona al menu
	header('Location: ../index.php');
	
	// finaliza cualquier script php
	exit();
?>