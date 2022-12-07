<?php
  
require('empleado.php');

class Obrero extends Empleado {
	private $id_Obrero; 	
	private $Rol;

	public function __construct(){}

	public function insertarObrero() {

		$this->insertarPersona();
		$this->insertarEmpleado();

		$conexion = conectar();

		$Rol = $this->getRol();
		$id_Empleado = $this->getid_Empleado();

		$sql = "
			INSERT INTO `obreros`(`id_Obrero`, `Rol`, `id_Empleado`)
			VALUES(
			    NULL,
			    '$Rol',
			    '$id_Empleado'
			);
		";
		
		$conexion->query($sql) or die("error: ".$conexion->error);
		$this->setid_Obrero($conexion->insert_id);

		desconectar($conexion);
	}

	public function editarObrero() {

		$this->editarPersona();
		$this->editarEmpleado();

		$conexion = conectar();

		$Rol = $this->getRol();
		$id_Empleado = $this->getid_Empleado();

		$sql = "
			UPDATE 
				`obreros` 
			SET 
				`Rol`='$Rol'			
			WHERE 
				`id_Empleado`='$id_Empleado' 
		";
		
		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectar($conexion);
	}

	public function mostrar(){
		$conexion = conectar();

		$sql = "
		SELECT * FROM `personas`,
		`empleados`,`obreros` 
		WHERE 
			`personas`.`id_Persona` = `empleados`.`id_Personas` 
		AND
			`empleados`.`id_Empleado` = `obreros`.`id_Empleado` 
		;";

		$fetch = $conexion->query($sql);

		$resultados = $fetch->fetch_all(MYSQLI_ASSOC);

		$obreros = [];
		foreach ($resultados as $obrero) {
			$obreros[] = $obrero;
		}

		desconectar($conexion);
		
		return $obreros;
	}

	public function consultar($id_Persona) {
		$conexion = conectar();

		$sql = "
		SELECT * FROM `personas`,`empleados`,`obreros` 
		WHERE 
			`personas`.`id_Persona` =  '$id_Persona'
		AND
			`empleados`.`id_Personas` = '$id_Persona'
		AND
			`empleados`.`id_Empleado` = `obreros`.`id_Empleado` 
		;";

		$fetch = $conexion->query($sql);

		$resultado = $fetch->fetch_assoc();

		desconectar($conexion);

		return $resultado;
	}
	
	public function getid_Obrero() {
		return $this->id_Obrero;
	}
	
	public function getRol() {
		return $this->Rol;
	}
	
	public function setid_Obrero($id_Obrero) {
		$this->id_Obrero = $id_Obrero;
	}
	
	public function setRol($Rol) {
		$this->Rol = $Rol;
	}
}

?>