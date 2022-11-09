<?php  

class Contacto {
	private $id_Contacto;
	private $Correo;
	private $Direccion;
	private $id_Personas;

	private $T_principal;
	private $T_secundario;
	private $T_auxiliar;

	public function __construct(){}

	public function insertarContacto() {
		$conexion = conectar();

		$Correo = $this->getCorreo();
		$Direccion = $this->getDireccion();
		$id_Personas = $this->getid_Personas();

		$sql = "
		INSERT IGNORE INTO `contactos`
		(
			`id_Contacto`,

			`Correo`,
			`Direccion`,
			`id_Personas`) 
		VALUES 
		(
			NULL,
			'$Correo',
			'$Direccion',
			'$id_Personas'
		);
		";
		
		$conexion->query($sql) or die("error: ".$conexion->error);
		$this->setid_Contacto($conexion->insert_id);

		desconectar($conexion);
	}

	public function editarContacto() {
		$conexion = conectar();

		$Correo = $this->getCorreo();
		$Direccion = $this->getDireccion();
		$id_Personas = $this->getid_Personas();

		$sql = "
			UPDATE 
				`contactos` 
			SET 
				`Correo`='$Correo',
				`Direccion`='$Direccion'
			WHERE 
				`id_Personas`='$id_Personas'
		";

		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectar($conexion);
	}

	public function consultar($id_Personas) {
		$conexion = conectar();

		$sql = "SELECT * FROM `contactos` WHERE `id_Personas` = '$id_Personas';";

		$fetch = $conexion->query($sql);

		$resultado = $fetch->fetch_assoc();

		desconectar($conexion);
		
		return $resultado;
	}

	// Getters
	public function getid_Contacto() {
		return $this->id_Contacto;
	}
	
	public function getCorreo() {
		return $this->Correo;
	}
	
	public function getDireccion() {
		return $this->Direccion;
	}
	
	public function getid_Personas() {
		return $this->id_Personas;
	}
	
	public function getT_principal() {
		return $this->T_principal;
	}
	
	public function getT_secundario() {
		return $this->T_secundario;
	}
	
	public function getT_auxiliar() {
		return $this->T_auxiliar;
	}

	// Setters
	public function setid_Contacto($id_Contacto) {
		$this->id_Contacto = $id_Contacto;
	}
	
	public function setCorreo($Correo) {
		$this->Correo = $Correo;
	}
	
	public function setDireccion($Direccion) {
		$this->Direccion = $Direccion;
	}
	
	public function setid_Personas($id_Personas) {
		$this->id_Personas = $id_Personas;
	}
	
	public function setT_principal($T_principal) {
		$this->T_principal = $T_principal;
	}
	
	public function setT_secundario($T_secundario) {
		$this->T_secundario = $T_secundario;
	}
	
	public function setT_auxiliar($T_auxiliar) {
		$this->T_auxiliar = $T_auxiliar;
	}





}

?>