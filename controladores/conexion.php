<?php  


function conectar() {
	
	$servidor 	= "localhost";
	$usuario		= "root";	
	$bd       	= "ingsoft_ii";
	$clave		= "";
	
	//instancia la clase mysqli y se conecta a la base de datos
	$conexion = new mysqli($servidor,$usuario,$clave,$bd);

	$conexion->set_charset("utf8");
	
	if($conexion->connect_errno) {
		echo "Error al conectar ". $this->conexion->connect_errno."<br>";
		exit();
	}

	return $conexion;
}

function desconectar($conexion) {
	if ($conexion) {
		$conexion->close();
	}
}

?>