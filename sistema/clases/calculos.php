<?php 

	// interfaz con los métodos para realizar calculos de tiempo
	// en nómina y de carga horaria

	class Calculo {
		public function diferenciaF($FI) {
			$fecha_Ingreso = date_create($FI);
			$fecha_Actual = date_create();
			$diferencia = date_diff($fecha_Ingreso,$fecha_Actual);
			
			// Formateo de diferencia
			$Tiempo_direfencia = '';
			// $Tiempo_direfencia .= ($diferencia->invert == 1) ? ' - ' : '';
			if ($diferencia->y > 0) {
				// Años
				$Tiempo_direfencia .= ($diferencia->y > 1) ? $diferencia->y . ' Años ' : $diferencia->y . ' Año ';
			} 
			elseif ($diferencia->m > 0 and $diferencia->y == 0) {
				// Meses
				$Tiempo_direfencia .= ($diferencia->m > 1) ? $diferencia->m . ' Meses ' : $diferencia->m . ' Mes ';
			} 
			elseif ($diferencia->d > 0 and $diferencia->m == 0) {
				// Días
				$Tiempo_direfencia .= ($diferencia->d > 1) ? $diferencia->d . ' Días ' : $diferencia->d . ' Día ';
			}
			else {
				$Tiempo_direfencia = "No figura";
			}

			return $Tiempo_direfencia;
		}

		public function cargaHoraria_M($c) {
			$carga = $c*4;
			return $carga;
		}

		public function cargaHoraria_A($c) {
			$carga = $c*52;
			return $carga;
		}

		public function nivelAcademico($n) {
			if ($n == 0) {
				$nivelAcademico = "Sin estudios";
			}
			elseif ($n == 1) {
				$nivelAcademico = "Primaria";
			}
			elseif ($n == 2) {
				$nivelAcademico = "Bachillerato";
			}
			elseif ($n == 3) {
				$nivelAcademico = "Universitario";
			}
			return $nivelAcademico;
		}	
	}

?>