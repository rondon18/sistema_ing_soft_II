<?php  
require('empleado.php');

class Administrativo extends Empleado {
	private $id_Administrativo; 	

	public function __construct(){}

	public function insertarAdministrativo() {

		$this->insertarPersona();
		$this->insertarEmpleado();

		$conexion = conectar();

		$id_Empleado = $this->getid_Empleado();

		$sql = "
			INSERT IGNORE INTO `administrativos` 
			(
				`id_Administrativo`, 
				`id_Empleado`
			)
			VALUES 
			(
				NULL,
				'$id_Empleado'
			);
		";
		
		$conexion->query($sql) or die("error: ".$conexion->error);
		$this->setid_Administrativo($conexion->insert_id);

		desconectar($conexion);
	}

	public function mostrar(){
		$conexion = conectar();

		$sql = "
		SELECT * FROM `personas`,`empleados`,`administrativos` 
		WHERE 
			`personas`.`id_Persona` = `empleados`.`id_Personas` 
		AND
			`empleados`.`id_Empleado` = `administrativos`.`id_Empleado` 
		;";

		$fetch = $conexion->query($sql);

		$resultados = $fetch->fetch_all(MYSQLI_ASSOC);

		$administrativos = [];
		foreach ($resultados as $administrativo) {
			$administrativos[] = $administrativo;
		}

		desconectar($conexion);
		
		return $administrativos;
	}	

	public function consultar($id_Persona) {
		$conexion = conectar();

		$sql = "
		SELECT * FROM `personas`,`empleados`,`administrativos` 
		WHERE 
			`personas`.`id_Persona` =  '$id_Persona'
		AND
			`empleados`.`id_Personas` = '$id_Persona'
		AND
			`empleados`.`id_Empleado` = `administrativos`.`id_Empleado` 
		;";

		$fetch = $conexion->query($sql);

		$resultado = $fetch->fetch_assoc();

		desconectar($conexion);

		return $resultado;
	}
	
	public function getid_Administrativo() {
		return $this->id_Administrativo;
	}
	
	public function setid_Administrativo($id_Administrativo) {
		$this->id_Administrativo = $id_Administrativo;
	}
}


?>