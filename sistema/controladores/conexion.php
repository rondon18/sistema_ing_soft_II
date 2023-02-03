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

	function comprobar_bd() {
		$servidor 	= "localhost";
		$usuario		= "root";	
		$clave		= "";

		//instancia la clase mysqli y se conecta a la base de datos
		$conexion = new mysqli($servidor,$usuario,$clave);

		$conexion->set_charset("utf8");

		// Verifica si la base de datos existe
		$sql = "show DATABASES LIKE 'ingsoft_ii'";
		$res = $conexion->query($sql);
		if ($res->num_rows >= 1) {
			return true;
		}
		else {
			return false;
		}
	}

	function desconectar($conexion) {
		if ($conexion) {
			$conexion->close();
		}
	}
?>