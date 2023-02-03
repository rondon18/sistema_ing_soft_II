<?php 

	class Direccion {

		private $id_Direccion;
		private $Municipio;
		private $Parroquia;
		private $Direccion;
		private $Contactos_id_Contacto;

		public function __construct() {}


		// inserta la direccion de una persona
		public function insertarDireccion() {
			$conexion = conectar();

			$Municipio = $this->getMunicipio();
			$Parroquia = $this->getParroquia();
			$Direccion = $this->getDireccion();

			$id_Contacto = $this->getContactos_id_Contacto();

			$sql = "
			INSERT IGNORE INTO `direcciones`(`id_Direccion`, `Municipio`, `Parroquia`, `Direccion`, `Contactos_id_Contacto`) 
			VALUES (
				NULL,
				'$Municipio',
				'$Parroquia',
				'$Direccion',
				'$id_Contacto'
			);
			";
			
			$conexion->query($sql) or die("error: ".$conexion->error);
			$this->setid_Direccion($conexion->insert_id);

			desconectar($conexion);
		}


		// edita la direccion de una persona
		public function editarDireccion() {
			$conexion = conectar();

			$Municipio = $this->getMunicipio();
			$Parroquia = $this->getParroquia();
			$Direccion = $this->getDireccion();

			$id_Contacto = $this->getContactos_id_Contacto();

			$sql = "UPDATE `direcciones` SET 
			`Municipio`='$Municipio',
			`Parroquia`='$Parroquia',
			`Direccion`='$Direccion'
			WHERE 
			`Contactos_id_Contacto`='$id_Contacto';";

			$conexion->query($sql) or die("error: ".$conexion->error);
			desconectar($conexion);
		}


		// consulta la direccion de una persona
		public function consultar($id_Contacto) {
			$conexion = conectar();

			$sql = "SELECT * FROM `direcciones` WHERE `Contactos_id_Contacto`='$id_Contacto';";

			$fetch = $conexion->query($sql);

			$resultado = $fetch->fetch_assoc();

			desconectar($conexion);
			
			return $resultado;
		}

		public function setid_Direccion($id_Direccion) {
			$this->id_Direccion = $id_Direccion;
		}
		public function setMunicipio($Municipio) {
			$this->Municipio = $Municipio;
		}
		public function setParroquia($Parroquia) {
			$this->Parroquia = $Parroquia;
		}
		public function setDireccion($Direccion) {
			$this->Direccion = $Direccion;
		}
		public function setContactos_id_Contacto($Contactos_id_Contacto) {
			$this->Contactos_id_Contacto = $Contactos_id_Contacto;
		}

		public function getid_Direccion() {
			return $this->id_Direccion;
		}
		public function getMunicipio() {
			return $this->Municipio;
		}
		public function getParroquia() {
			return $this->Parroquia;
		}
		public function getDireccion() {
			return $this->Direccion;
		}
		public function getContactos_id_Contacto() {
			return $this->Contactos_id_Contacto;
		}

	}

?>