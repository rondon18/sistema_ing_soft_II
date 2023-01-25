<?php  
	require('empleado.php');

	class Docente extends Empleado {
		private $id_Docente; 	
		private $Horas_Clase_S;
		private $Area;

		public function __construct(){}

		public function insertarDocente() {

			$this->insertarPersona();
			$this->insertarEmpleado();

			$conexion = conectar();

			$Horas_Clase_S = $this->getHoras_Clase_S();
			$Area = $this->getArea();
			$id_Empleado = $this->getid_Empleado();

			$sql = "
				INSERT IGNORE INTO `docentes`(
				    `id_Docente`,
				    `Area`,
				    `Horas_Clase_S`,
				    `id_Empleado`
				)
				VALUES(
				    NULL,
				    '$Horas_Clase_S',
				    '$Area',
				    '$id_Empleado'
				);
			";
			
			$conexion->query($sql) or die("error: ".$conexion->error);
			$this->setid_Docente($conexion->insert_id);

			desconectar($conexion);
		}

		public function editarDocente() {

			$this->editarPersona();
			$this->editarEmpleado();

			$conexion = conectar();

			$Horas_Clase_S = $this->getHoras_Clase_S();
			$Area = $this->getArea();
			$id_Empleado = $this->getid_Empleado();

			$sql = "
				UPDATE 
					`docentes` 
				SET 
					`Horas_Clase_S`='$Horas_Clase_S',
					`Area`='$Area'
				WHERE 
					`id_Empleado`='$id_Empleado' 
			";
			
			$conexion->query($sql) or die("error: ".$conexion->error);
			desconectar($conexion);
		}

		public function mostrar(){
			$conexion = conectar();

			$sql = "
			SELECT * FROM `personas`,`empleados`,`docentes` 
			WHERE 
				`personas`.`id_Persona` = `empleados`.`id_Personas` 
			AND
				`empleados`.`id_Empleado` = `docentes`.`id_Empleado` 
			;";

			$fetch = $conexion->query($sql);

			$resultados = $fetch->fetch_all(MYSQLI_ASSOC);

			$docentes = [];
			foreach ($resultados as $docente) {
				$docentes[] = $docente;
			}

			desconectar($conexion);
			
			return $docentes;
		}

		public function consultar($id_Persona) {
			$conexion = conectar();

			$sql = "
			SELECT * FROM `personas`,`empleados`,`docentes` 
			WHERE 
				`personas`.`id_Persona` =  '$id_Persona'
			AND
				`empleados`.`id_Personas` = '$id_Persona'
			AND
				`empleados`.`id_Empleado` = `docentes`.`id_Empleado` 
			;";

			$fetch = $conexion->query($sql);

			$resultado = $fetch->fetch_assoc();

			desconectar($conexion);

			return $resultado;
		}

		public function getid_Docente() {
			return $this->id_Docente;
		}
		public function getHoras_Clase_S() {
			return $this->Horas_Clase_S;
		}
		public function getArea() {
			return $this->Area;
		}

		public function setid_Docente($id_Docente) {
			$this->id_Docente = $id_Docente;
		} 
		public function setHoras_Clase_S($Horas_Clase_S) {
			$this->Horas_Clase_S = $Horas_Clase_S;
		} 
		public function setArea($Area) {
			$this->Area = $Area;
		} 
	}
?>