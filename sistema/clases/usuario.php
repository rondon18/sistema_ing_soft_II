<?php

class Usuario extends Persona {

	private $id_Usuario;
	private $Rol;
	private $Contraseña;
	private $Personas_id_Persona;

	public function __construct() {}

	public function insertarUsuario() {
		$conexion = conectar();

		$Nivel_Acad = $this->getNivel_Acad();
		$Titulo_Obt = $this->getTitulo_Obt();
		$Mencion = $this->getMencion();
		$Estudio_2do_Nv = $this->getEstudio_2do_Nv();
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
		$this->setid_Contacto($conexion->insert_id);

		desconectar($conexion);
	}

	public function editarUsuario() {
		$conexion = conectar();

		$Nivel_Acad = $this->getNivel_Acad();
		$Titulo_Obt = $this->getTitulo_Obt();
		$Mencion = $this->getMencion();
		$Estudio_2do_Nv = $this->getEstudio_2do_Nv();
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

	public function chequeo_login() {
		$conexion = conectar();

		$cedula = $this->getCedula();
		$contraseña = $this->getContraseña();

		$sql = "SELECT * FROM personas, usuarios WHERE personas.id_Persona = usuarios.Personas_id_Persona and personas.cedula = '$cedula' AND usuarios.contraseña = '$contraseña'; ";

		$consulta_usuario = $conexion->query($sql) or die("error: ".$conexion->error);
		$usuario = $consulta_usuario->fetch_assoc();

		desconectar($conexion);

		return $usuario;
	}

	public function consultar($id_Empleado) {
		$conexion = conectar();

		$sql = "SELECT * FROM `personas`,`usuarios` WHERE `id_Persona` and `Personas_id_Persona`;";

		$fetch = $conexion->query($sql);

		$resultado = $fetch->fetch_assoc();

		desconectar($conexion);
		
		return $resultado;
	}
	
	public function mostrar() {
		$conexion = conectar();

		$sql = "SELECT * FROM `personas`,`usuarios` WHERE `personas`.`id_Persona` = `usuarios`.`Personas_id_Persona`;";

		$fetch = $conexion->query($sql);

		$resultado = $fetch->fetch_all(MYSQLI_ASSOC);

		desconectar($conexion);
		
		return $resultado;
	}

	public function contarUsuarios() {
		$conexion = conectar();

		$sql = "SELECT COUNT(*) FROM `personas`,`usuarios` WHERE `personas`.`id_Persona` = `usuarios`.`Personas_id_Persona`";

		$fetch = $conexion->query($sql);

		$resultados = $fetch->fetch_all(MYSQLI_ASSOC);

		$conteo = $resultados[0]["COUNT(*)"];

		desconectar($conexion);
		
		return $conteo;
	}

	public function getid_Usuario() {
		return $this->id_Usuario;
	}
	public function getRol() {
		return $this->Rol;
	}
	public function getContraseña() {
		return $this->Contraseña;
	}
	public function getPersonas_id_Persona() {
		return $this->Personas_id_Persona;
	}


	public function setid_Usuario($id_Usuario) {
		$this->id_Usuario = $id_Usuario;
	}
	public function setRol($Rol) {
		$this->Rol = $Rol;
	}
	public function setContraseña($Contraseña) {
		$this->Contraseña = $Contraseña;
	}
	public function setPersonas_id_Persona($Personas_id_Persona) {
		$this->Personas_id_Persona = $Personas_id_Persona;
	}	
}

?>