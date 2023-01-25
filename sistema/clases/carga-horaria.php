<?php 

	class Carga_Horaria {

		private $id_Carga_Horaria;
		private $Carga_Horaria_Semanal;
		private $Empleados_id_Empleado;

		public function __construct() {}


		// Inserta la carga horaria semanal de un empleado
		public function insertarCarga_Horaria() {
			$conexion = conectar();

			$Carga_Horaria_Semanal = $this->getCarga_Horaria_Semanal();
			$Empleados_id_Empleado = $this->getEmpleados_id_Empleado();

			$sql = "INSERT IGNORE INTO `carga_horaria`(`id_Carga_Horaria`,		 `Carga_Horaria_Semanal`, `Empleados_id_Empleado`) VALUES (
				NULL,
				'$Carga_Horaria_Semanal',
				'$Empleados_id_Empleado'
				)";
			
			$conexion->query($sql) or die("error: ".$conexion->error);
			$this->setid_Carga_Horaria($conexion->insert_id);

			desconectar($conexion);
		}


		// Edita la carga horaria semanal de un empleado
		public function editarCarga_Horaria() {
			$conexion = conectar();

			$Carga_Horaria_Semanal = $this->getCarga_Horaria_Semanal();
			$Empleados_id_Empleado = $this->getEmpleados_id_Empleado();

			$sql = "UPDATE `carga_horaria` SET 
			`Carga_Horaria_Semanal`='$Carga_Horaria_Semanal'
			WHERE 
			`Empleados_id_Empleado`='$Empleados_id_Empleado' 
			";

			$conexion->query($sql) or die("error: ".$conexion->error);
			desconectar($conexion);
		}


		// Consulta la carga horaria semanal de un empleado en especifico
		public function consultar($id_Empleado) {
			$conexion = conectar();

			$sql = "SELECT * FROM `carga_horaria` WHERE `Empleados_id_Empleado`='$id_Empleado';";

			$fetch = $conexion->query($sql);

			$resultado = $fetch->fetch_assoc();

			desconectar($conexion);
			
			return $resultado;
		}

		public function getid_Carga_Horaria() {
			return $this->id_Carga_Horaria;
		}
		public function getCarga_Horaria_Semanal() {
			return $this->Carga_Horaria_Semanal;
		}
		public function getEmpleados_id_Empleado() {
			return $this->Empleados_id_Empleado;
		}

		public function setid_Carga_Horaria($id_Carga_Horaria) {
			$this->id_Carga_Horaria = $id_Carga_Horaria;
		}
		public function setCarga_Horaria_Semanal($Carga_Horaria_Semanal) {
			$this->Carga_Horaria_Semanal = $Carga_Horaria_Semanal;
		}
		public function setEmpleados_id_Empleado($Empleados_id_Empleado) {
			$this->Empleados_id_Empleado = $Empleados_id_Empleado;
		}
	}

?>