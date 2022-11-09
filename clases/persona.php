<?php 

class Persona {

	private $id_Personas;
	private $Nombre;
	private $Apellido;
	private $Cedula;
	private $Fecha_Nac;
	private $Ruta_Imagen;


	public function __construct() {}

	public function insertarPersona() {
		$conexion = conectar();
		

		$Nombre = $this->getNombre();
		$Apellido = $this->getApellido();
		$Cedula = $this->getCedula();
		$Fecha_Nac = $this->getFecha_Nac();
		$Ruta_Imagen = $this->getRuta_Imagen();

		$sql = "
			INSERT IGNORE INTO `personas`
			(
				`id_Persona`, 
				`Nombre`, 
				`Apellido`, 
				`Cedula`, 
				`Fecha_Nac`, 
				`Ruta_Imagen`
			) 
			VALUES 
			(
				NULL,
				'$Nombre',
				'$Apellido',
				'$Cedula',
				'$Fecha_Nac',
				'$Ruta_Imagen'
			);
		";

		$conexion->query($sql) or die("error: ".$conexion->error);
		$this->setid_Personas($conexion->insert_id);
		desconectar($conexion);
	}

	public function editarPersona() {
		$conexion = conectar();
		
		$id_Personas = $this->getid_Personas();

		$Nombre = $this->getNombre();
		$Apellido = $this->getApellido();
		$Fecha_Nac = $this->getFecha_Nac();
		$Ruta_Imagen = $this->getRuta_Imagen();

		// La cédula no es actualizable
		$sql = "
			UPDATE 
				`personas` 
			SET 
				`Nombre`='$Nombre',
				`Apellido`='$Apellido',
				`Fecha_Nac`='$Fecha_Nac',
				`Ruta_Imagen`='$Ruta_Imagen' 
			WHERE
				`id_Persona`='$id_Personas'
		";

		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectar($conexion);
	}

	public function eliminarPersona() {
		$conexion = conectar();
		
		$id_Personas = $this->getid_Personas();

		// La cédula no es actualizable
		$sql = "DELETE FROM `personas` WHERE `id_Persona`='$id_Personas'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectar($conexion);
	}

	// Getters

	public function getid_Personas() {
		return $this->id_Personas;
	}

	public function getNombre() {
		return $this->Nombre;
	}

	public function getApellido() {
		return $this->Apellido;
	}

	public function getCedula() {
		return $this->Cedula;
	}

	public function getFecha_Nac() {
		return $this->Fecha_Nac;
	}

	public function getRuta_Imagen() {
		return $this->Ruta_Imagen;
	}


	// Setters
	public function setid_Personas($id_Personas) {
		$this->id_Personas = $id_Personas;
	}

	public function setNombre($Nombre) {
		$this->Nombre = $Nombre;
	}

	public function setApellido($Apellido) {
		$this->Apellido = $Apellido;
	}

	public function setCedula($Cedula) {
		$this->Cedula = $Cedula;
	}

	public function setFecha_Nac($Fecha_Nac) {
		$this->Fecha_Nac = $Fecha_Nac;
	}

	public function setRuta_Imagen($Ruta_Imagen) {
		$this->Ruta_Imagen = $Ruta_Imagen;
	}

}

?>