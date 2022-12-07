<?php  

require_once 'persona.php';

class Empleado extends Persona {
	private $id_Empleado;
	private $Fecha_Ingreso;

	public function __construct() {}

	public function insertarEmpleado() {
		$conexion = conectar();
		
		$Fecha_Ingreso = $this->getFecha_Ingreso();
		$id_Personas = $this->getid_Personas();

		$sql = "INSERT IGNORE INTO `empleados`(`id_Empleado`, `Fecha_Ingreso`, `id_Personas`) VALUES (
			NULL,
			'$Fecha_Ingreso',
			'$id_Personas'
		);";

		$conexion->query($sql) or die("error: ".$conexion->error);
		$this->setid_Empleado($conexion->insert_id);
		desconectar($conexion);
	}

	public function editarEmpleado() {
		$conexion = conectar();
		
		$Fecha_Ingreso = $this->getFecha_Ingreso();
		$id_Personas = $this->getid_Personas();

		// La cédula no es actualizable
		$sql = "
		UPDATE `empleados` SET 
		`Fecha_Ingreso`='$Fecha_Ingreso'
		WHERE 
		`id_Personas`='$id_Personas'
		;";

		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectar($conexion);
	}

	public function mostrar() {
		$conexion = conectar();

		$sql = "SELECT * FROM `personas`,`empleados` WHERE `personas`.`id_Persona` = `empleados`.`id_Personas`";

		$fetch = $conexion->query($sql);

		$resultados = $fetch->fetch_all(MYSQLI_ASSOC);

		$empleados = [];
		foreach ($resultados as $empleado) {
			$empleados[] = $empleado;
		}

		desconectar($conexion);
		
		return $empleados;
	}

	public function verificarTipo() {
		$conexion = conectar();

		$id_Empleado = $this->getid_Empleado();

		// Consulta obrero
		$sql = "SELECT COUNT(*) as 'Cuenta' FROM `empleados`,`obreros`	WHERE `empleados`.`id_Empleado` = '$id_Empleado' AND `obreros`.`id_Empleado` = '$id_Empleado'";
		$ob = $conexion->query($sql);
		$ob = $ob->fetch_assoc();

		// Consulta docente
		$sql = "SELECT COUNT(*) as 'Cuenta' FROM `empleados`,`docentes` WHERE `empleados`.`id_Empleado` = '$id_Empleado' AND `docentes`.`id_Empleado` = '$id_Empleado'";
		$doc = $conexion->query($sql);
		$doc = $doc->fetch_assoc();

		// Consulta administrativo
		$sql = "SELECT COUNT(*) as 'Cuenta' FROM `empleados`,`administrativos` WHERE `empleados`.`id_Empleado` = '$id_Empleado' AND `administrativos`.`id_Empleado` = '$id_Empleado'";
		$adm = $conexion->query($sql);
		$adm = $adm->fetch_assoc();
		
		desconectar($conexion);
 
 		// Dependiendo de cual de las 3 retorna un valor

 		// Obrero
		if ($ob['Cuenta'] == '1' and ($doc['Cuenta'] == '0' and $adm['Cuenta'] == '0')) {
			$val = 0;
		}
		// Docente
		elseif ($doc['Cuenta'] == '1' and ($ob['Cuenta'] == '0' and $adm['Cuenta'] == '0')) {
			$val = 1;
		}
		// Administrativo
		elseif ($adm['Cuenta'] == '1' and ($doc['Cuenta'] == '0' and $ob['Cuenta'] == '0')) {
			$val = 2;
		}
		// Otro
		else {
			$val = 3;
		}

		return $val;
	}

	public function contarEmpleados() {
		$conexion = conectar();

		$sql = "SELECT COUNT(*) FROM `personas`,`empleados` WHERE `personas`.`id_Persona` = `empleados`.`id_Personas`";

		$fetch = $conexion->query($sql);

		$resultados = $fetch->fetch_all(MYSQLI_ASSOC);

		$conteo = $resultados[0]["COUNT(*)"];

		desconectar($conexion);
		
		return $conteo;
	}

	// Getters
	public function getid_Empleado() {
		return $this->id_Empleado;
	}

	public function getFecha_Ingreso() {
		return $this->Fecha_Ingreso;
	}


	// Setters
	public function setid_Empleado($id_Empleado) {
		$this->id_Empleado = $id_Empleado;
	}
	public function setFecha_Ingreso($Fecha_Ingreso) {
		$this->Fecha_Ingreso = $Fecha_Ingreso;
	}

}
?>