<?php 

class Estudio {
	private $id_Estudio;
	private $Nivel_Acad;
	private $Titulo_Obt;
	private $Mencion;
	private $Estudio_2do_Nvl;
	private $Empleados_id_Empleado;

	public function __construct() {}

	public function insertarEstudio() {
		$conexion = conectar();

		$Nivel_Acad = $this->getNivel_Acad();
		$Titulo_Obt = $this->getTitulo_Obt();
		$Mencion = $this->getMencion();
		$Estudio_2do_Nv = $this->getEstudio_2do_Nvl();
		$Empleados_id_Empleado = $this->getEmpleados_id_Empleado();

		$sql = "INSERT IGNORE INTO `estudios`(`id_Estudio`, `Nivel_Acad`, `Titulo_Obt`, `Mencion`, `Estudio_2do_Nvl`, `Empleados_id_Empleado`) 
		VALUES (
		NULL,
		'$Nivel_Acad',
		'$Titulo_Obt',
		'$Mencion',
		'$Estudio_2do_Nv',
		'$Empleados_id_Empleado'
		)";
		
		$conexion->query($sql) or die("error: ".$conexion->error);
		$this->setid_Estudio($conexion->insert_id);

		desconectar($conexion);
	}

	public function editarEstudio() {
		$conexion = conectar();

		$Nivel_Acad = $this->getNivel_Acad();
		$Titulo_Obt = $this->getTitulo_Obt();
		$Mencion = $this->getMencion();
		$Estudio_2do_Nv = $this->getEstudio_2do_Nvl();
		$Empleados_id_Empleado = $this->getEmpleados_id_Empleado();

		$sql = "UPDATE `estudios` SET 
		`Nivel_Acad`='$Nivel_Acad',
		`Titulo_Obt`='$Titulo_Obt',
		`Mencion`='$Mencion',
		`Estudio_2do_Nvl`='$Estudio_2do_Nv'
		WHERE 
		`Empleados_id_Empleado`='$Empleados_id_Empleado'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectar($conexion);
	}

	public function consultar($id_Empleado) {
		$conexion = conectar();

		$sql = "SELECT * FROM `estudios` WHERE `Empleados_id_Empleado`='$id_Empleado';";

		$fetch = $conexion->query($sql);

		$resultado = $fetch->fetch_assoc();

		desconectar($conexion);
		
		return $resultado;
	}

	public function getIdEstudio() {
		return $this->id_Estudio;
	}
	public function getNivel_Acad() {
		return $this->Nivel_Acad;
	}
	public function getTitulo_Obt() {
		return $this->Titulo_Obt;
	}
	public function getMencion() {
		return $this->Mencion;
	}
	public function getEstudio_2do_Nvl() {
		return $this->Estudio_2do_Nvl;
	}
	public function getEmpleados_Id_Empleado(){
		return $this->Empleados_id_Empleado;
	}
	

	public function setid_Estudio($id_Estudio) {
		$this->id_Estudio = $id_Estudio;
	}
	public function setNivel_Acad($Nivel_Acad) {
		$this->Nivel_Acad = $Nivel_Acad;
	}
	public function setTitulo_Obt($Titulo_Obt) {
		$this->Titulo_Obt = $Titulo_Obt;
	}
	public function setMencion($Mencion) {
		$this->Mencion = $Mencion;
	}
	public function setEstudio_2do_Nvl($Estudio_2do_Nvl) {
		$this->Estudio_2do_Nvl = $Estudio_2do_Nvl;
	}
	public function setEmpleados_id_Empleado($Empleados_id_Empleado) {
		$this->Empleados_id_Empleado = $Empleados_id_Empleado;
	}
}


?>