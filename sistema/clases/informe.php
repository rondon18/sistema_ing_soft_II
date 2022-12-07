<?php

class Informe {
	private $id_Informe;
	private $Cert_Salud;
	private $Tarjeta_Vac;
	private $Personas_id_Persona;

	public function __construct() {}

	public function insertarInforme() {
		$conexion = conectar();

		$Cert_Salud = $this->getCert_Salud();
		$Tarjeta_Vac = $this->getTarjeta_Vac();
		$Personas_id_Persona = $this->getPersonas_id_Persona();

		$sql = "INSERT IGNORE INTO `informes`(`id_Informe`, `Cert_Salud`, `Tarjeta_Vac`, `Personas_id_Persona`) VALUES (
			NULL,
			'$Cert_Salud',
			'$Tarjeta_Vac',
			'$Personas_id_Persona'
		)";
		
		$conexion->query($sql) or die("error: ".$conexion->error);
		$this->setPersonas_id_Persona($conexion->insert_id);

		desconectar($conexion);
	}

	public function editarInforme() {
		$conexion = conectar();

		$Cert_Salud = $this->getCert_Salud();
		$Tarjeta_Vac = $this->getTarjeta_Vac();
		$Personas_id_Persona = $this->getPersonas_id_Persona();

		$sql = "UPDATE `informes` SET 
		`Cert_Salud`='$Cert_Salud',
		`Tarjeta_Vac`='$Tarjeta_Vac'
		WHERE 
		`Personas_id_Persona`='$Personas_id_Persona';";

		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectar($conexion);
	}

	public function consultar($id_Persona) {
		$conexion = conectar();

		$sql = "SELECT * FROM `informes` WHERE `Personas_id_Persona`='$id_Persona';";

		$fetch = $conexion->query($sql);

		$resultado = $fetch->fetch_assoc();

		desconectar($conexion);
		
		return $resultado;
	}

	public function setid_Informe($id_Informe) {
		$this->id_Informe = $id_Informe;
	}
	public function setCert_Salud($Cert_Salud) {
		$this->Cert_Salud = $Cert_Salud;
	}
	public function setTarjeta_Vac($Tarjeta_Vac) {
		$this->Tarjeta_Vac = $Tarjeta_Vac;
	}
	public function setPersonas_id_Persona($Personas_id_Persona) {
		$this->Personas_id_Persona = $Personas_id_Persona;
	}

	public function getid_Informe() {
		return $this->id_Informe;
	}
	public function getCert_Salud() {
		return $this->Cert_Salud;
	}
	public function getTarjeta_Vac() {
		return $this->Tarjeta_Vac;
	}
	public function getPersonas_id_Persona() {
		return $this->Personas_id_Persona;
	}
}

?>