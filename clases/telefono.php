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

	public function editarTelefono($Prefijo,$Numero,$Relacion,$id_Contacto) {
		$conexion = conectar();

		$sql = "
			UPDATE 
				`telefonos` 
			SET 
				`Prefijo`='$Prefijo',
				`Numero`='$Numero'
			WHERE 
				`Relacion`='$Relacion'
			AND
				`id_Contacto`='$id_Contacto' 
		";
		
		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectar($conexion);
	}

	public function consultar($id_Contacto) {
		$conexion = conectar();

		$sql = "SELECT * FROM `telefonos` WHERE `id_Contacto` = '$id_Contacto';";

		$fetch = $conexion->query($sql);

		$resultados = $fetch->fetch_all(MYSQLI_ASSOC);

		$telefonos = [];
		foreach ($resultados as $telefono) {
			$telefonos[] = $telefono;
		}

		desconectar($conexion);
		
		return $telefonos;
	}

	public function tipoTelefono($telefono) {
		if ($telefono['Relacion'] == "P") {
			$tipoTelefono = "Principal";
		}
		elseif ($telefono['Relacion'] == "S") {
			$tipoTelefono = "Secundario";
		}
		elseif ($telefono['Relacion'] == "A") {
			$tipoTelefono = "Auxiliar";
		}
		else {
			$tipoTelefono = "Desconocido";
		}
		return $tipoTelefono;
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