<?php
  
	require('conexion.php');
	$con = conectar();

	// Vacia la base de datos
	$sql = 'DELETE FROM `personas`';
	$con->query($sql);

	// Lista de archivos sql a importar
	// Nota: deben importarse de manera ordenada
	$archivos = [
		'personas',
		'empleados',
		'obreros',
		'docentes',
		'administrativos',
		'contactos',
		'telefonos',
		'direcciones',
		'estudios',
		'carga-horaria',
		'informes',
		'usuarios',
	];

	// Itera los archivos y los va ejecutando secuencialmente
	foreach ($archivos as $sql) {
		$instrucciones = file_get_contents("../sql/".$sql.".sql");
		$con->query($instrucciones);
	}

	desconectar($con);

	header('Location: ../lobby/index.php?BD_RESTAURADA');
?>