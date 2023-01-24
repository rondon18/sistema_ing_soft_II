<?php

	require("conexion.php");

	session_start();
	
	// destruye la sesion
	session_destroy();

	// redirecciona al menu
	header('Location: ../index.php');
	
	// finaliza cualquier script php
	exit();
?>