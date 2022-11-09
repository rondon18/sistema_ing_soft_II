<?php  

if (!isset($_POST['paso-1'])) {
	header('Location: paso-1.php');
}

// var_dump($_POST);

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../estilos/main.css">
		<title>Editar empleado | Paso 2</title>
	</head>
	<body>
		<main>
			<header></header>
			<section>
				<form action="../../controladores/control-empleados.php" method="post" enctype="multipart/form-data">
					<table border="1" cellpadding="10" style="max-width: 700px; margin: auto;">
						<thead>
							<tr>
								<th colspan="5">Editar personal</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="2"><label for="profesion">Foto</label></td>
								<td colspan="3"><input id="profesion" type="file" name="foto" required></td>
							</tr>
							<tr>
								<td colspan="2"><label for="profesion">Profesion</label></td>
								<td colspan="3"><input id="profesion" type="text" name="profesion" required></td>
							</tr>
							<tr>
								<td colspan="2"><label for="T_cargo">Tipo de cargo</label></td>
								<td colspan="3"><input id="T_cargo" type="text" name="T_cargo" required></td>
							</tr>
							<tr>
								<td colspan="2"><label for="T_nomina">Tiempo en nomina</label></td>
								<td colspan="3"><input id="T_nomina" type="text" name="T_nomina" required></td>
							</tr>

							<?php if ($_POST['T_empleado'] == 0): // Caso Obrero?>
							<tr>
								<th colspan="5">Especificaciones de obrero</th>
							</tr>
							<tr>
								<td colspan="2"><label for="horas">Horas semanales</label></td>
								<td colspan="3"><input id="horas" type="text" name="horas" required></td>
							</tr>
							<?php elseif ($_POST['T_empleado'] == 1): // Caso Docente?>
							<tr>
								<th colspan="5">Especificaciones de docente</th>
							</tr>
							<tr>
								<td colspan="2"><label for="horas">Horas académicas semanales</label></td>
								<td colspan="3"><input id="horas" type="text" name="horas" required></td>
							</tr>
							<tr>
								<td colspan="2"><label for="area">Area</label></td>
								<td colspan="3"><input id="area" type="text" name="area" required></td>
							</tr>
							<?php elseif ($_POST['T_empleado'] == 2): // Caso Administrativo?>
							<?php endif ?>
							<tr>
								<td><button type="submit">Guardar y continuar</button></td>
								<td colspan="2">
									<input type="hidden" name="nombre" value="<?php echo $_POST['nombre'] ?>">
									<input type="hidden" name="apellido" value="<?php echo $_POST['apellido'] ?>">
									<input type="hidden" name="cedula" value="<?php echo $_POST['T_cedula'].$_POST['cedula'] ?>">
									<input type="hidden" name="T_empleado" value="<?php echo $_POST['T_empleado'] ?>">
									<input type="hidden" name="F_nac" value="<?php echo $_POST['F_nac'] ?>">

									<input type="hidden" name="direccion" value="<?php echo $_POST['direccion'] ?>">
									<input type="hidden" name="correo" value="<?php echo $_POST['correo'] ?>">
									<input type="hidden" name="pref_P" value="<?php echo $_POST['pref_P'] ?>">
									<input type="hidden" name="tel_P" value="<?php echo $_POST['tel_P'] ?>">
									<input type="hidden" name="pref_S" value="<?php echo $_POST['pref_S'] ?>">
									<input type="hidden" name="tel_S" value="<?php echo $_POST['tel_S'] ?>">
									<input type="hidden" name="pref_A" value="<?php echo $_POST['pref_A'] ?>">
									<input type="hidden" name="tel_A" value="<?php echo $_POST['tel_A'] ?>">
									
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