<?php 

class Telefono {

	private $id_Telefono;
	private $Prefijo;
	private $Numero;
	private $Relacion;

	public function __construct(){}

	public function insertarTelefono($Prefijo,$Numero,$Relacion,$id_Contacto) {
		$conexion = conectar();

		$sql = "
			INSERT IGNORE INTO `telefonos`
			(
				`id_Telefono`,
				`Prefijo`,
				`Numero`,
				`Relacion`,
				`id_Contacto`
			) 
			VALUES 
			(
				NULL,
				'$Prefijo',
				'$Numero',
				'$Relacion',
				'$id_Contacto'
			);
		";
		
		$conexion->query($sql) or die("error: ".$conexion->error);
		$this->setid_Telefono($conexion->insert_id);

		desconectar($conexion);
	}

	public function telefonoCompleto(){
		return $this->Prefijo.$this->Numero;
	}

	public function getid_Telefono() {
		return $this->id_Telefono;
	}
	public function getPrefijo() {
		return $this->Prefijo;
	}
	public function getNumero() {
		return $this->Numero;
	}
	public function getRelacion() {
		return $this->Relacion;
	}	

	public function setid_Telefono($id_Telefono) {
		$this->id_Telefono = $id_Telefono;
	}
	public function setPrefijo($Prefijo) {
		$this->Prefijo = $Prefijo;
	}
	public function setNumero($Numero) {
		$this->Numero = $Numero;
	}
	public function setRelacion($Relacion) {
		$this->Relacion = $Relacion;
	}	

}

?>