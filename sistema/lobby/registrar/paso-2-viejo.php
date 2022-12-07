<?php  

// if (!isset($_POST['paso-1'])) {
// 	header('Location: paso-1.php');
// }

// foreach ($_POST as $key => $value) {
// 	var_dump($key);
// 	var_dump($value);
// 	echo "<br>";
// }

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../estilos/main.css">
	<title>Registrar empleado | Paso 2</title>
</head>
<style type="text/css">
	
	input:valid, select:valid {
		box-shadow: green 0 0 2px !important;
	}	
	input:invalid, select:invalid {
		box-shadow: red 0 0 2px !important;
	}

</style>
<body>
	<main>
		<header></header>
		<section>
			<form action="../../controladores/control-empleados.php" method="post" enctype="multipart/form-data">
				<table border="1" cellpadding="6" style="max-width: 700px; margin: auto;">
					<thead>
						<tr>
							<th colspan="5">Registrar personal</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td colspan="2"><label for="">Foto</label></td>
							<td colspan="3"><input id="foto" type="file" name="foto" required></td>
						</tr>
						<tr>
							<td colspan="2"><label for="profesion">Profesión</label></td>
							<td colspan="3"><input id="profesion" type="text" name="profesion" required></td>
						</tr>
						<tr>
							<td colspan="2"><label for="T_cargo">Tipo de cargo</label></td>
							<td colspan="3"><input id="T_cargo" type="text" name="T_cargo" required></td>
						</tr>
						<tr>
							<td colspan="2"><label for="FI_nomina">Fecha de ingreso a nomina</label></td>
							<td colspan="3"><input id="FI_nomina" type="date" name="FI_nomina" required></td>
						</tr>
						<tr>
							<th colspan="5">Carga horaria semanal</th>
						</tr>
						<tr>
							<td colspan="2"><label for="horas">Horas a cumplir por semana</label></td>
							<td colspan="3"><input id="horas" type="number" min="6" name="horas" required></td>
						</tr>

						<?php #if ($_POST['T_empleado'] == 0): // Caso Obrero?>
						<tr>
							<th colspan="5">Especificaciones de obrero</th>
						</tr>
						<tr>
							<td colspan="2"><label for="rol">Rol de obrero</label></td>
							<td colspan="3">
								<input id="rol" list="roles" type="text" name="rol" required>
								<datalist id="roles">
									<option value="Limpieza">
									<option value="Cocina">
									<option value="Jardineria">
									<option value="Mantenimiento">
								</datalist>
							</td>
						</tr>
						<?php #elseif ($_POST['T_empleado'] == 1): // Caso Docente?>
						<tr>
							<th colspan="5">Especificaciones de docente</th>
						</tr>
						<tr>
							<td colspan="2"><label for="horas_acad">Horas de clases semanales</label></td>
							<td colspan="3"><input id="horas_acad" type="number" min="6" name="horas_acad" required></td>
						</tr>
						<tr>
							<td colspan="2"><label for="area">Área de especialidad</label></td>
							<td colspan="3"><input id="area" type="text" name="area" required></td>
						</tr>
						<?php #elseif ($_POST['T_empleado'] == 2): // Caso Administrativo?>
						<tr>
							<th colspan="5">Especificaciones de administrativo</th>
						</tr>
						<?php #endif; ?>
						<tr>
							<td><button type="submit">Guardar y continuar</button></td>
							<td colspan="2">
								<input type="hidden" name="nombre" value="<?php echo $_POST['nombre']; ?>">
								<input type="hidden" name="apellido" value="<?php echo $_POST['apellido']; ?>">
								<input type="hidden" name="cedula" value="<?php echo $_POST['T_cedula'].$_POST['cedula']?>">
								<input type="hidden" name="T_empleado" value="<?php echo $_POST['T_empleado']; ?>">
								<input type="hidden" name="F_nac" value="<?php echo $_POST['F_nac']; ?>">
								<input type="hidden" name="sexo" value="<?php echo $_POST['sexo']; ?>">
								<input type="hidden" name="sexo" value="<?php echo $_POST['sexo']; ?>">
								<input type="hidden" name="municipio" value="<?php echo $_POST['municipio']; ?>">
								<input type="hidden" name="parroquia" value="<?php echo $_POST['parroquia']; ?>">
								<input type="hidden" name="direccion" value="<?php echo $_POST['direccion']; ?>">
								<input type="hidden" name="N_academico" value="<?php echo $_POST['N_academico']; ?>">
								<input type="hidden" name="titulo" value="<?php echo $_POST['titulo']; ?>">
								<input type="hidden" name="mencion" value="<?php echo $_POST['mencion']; ?>">
								<input type="hidden" name="E_2do_nivel" value="<?php echo $_POST['E_2do_nivel']; ?>">
								<input type="hidden" name="correo" value="<?php echo $_POST['correo']; ?>">
								<input type="hidden" name="pref_P" value="<?php echo $_POST['pref_P']; ?>">
								<input type="hidden" name="tel_P" value="<?php echo $_POST['tel_P']; ?>">
								<input type="hidden" name="pref_S" value="<?php echo $_POST['pref_S']; ?>">
								<input type="hidden" name="tel_S" value="<?php echo $_POST['tel_S']; ?>">
								<input type="hidden" name="pref_A" value="<?php echo $_POST['pref_A']; ?>">
								<input type="hidden" name="tel_A" value="<?php echo $_POST['tel_A']; ?>">
								<input type="hidden" name="vacuna" value="<?php echo $_POST['vacuna']; ?>">
								<input type="hidden" name="dosis_vacuna" value="<?php echo $_POST['dosis_vacuna']; ?>">
								
								<input type="hidden" name="paso-2" value="paso-2">	
								<input type="hidden" name="orden" value="insertar">	
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<th colspan="5">Hecho por Elber Rondón</th>
						</tr>
					</tfoot>
				</table>
			</form>
			<footer></footer>
		</section>
	</main>
</body>
</html>