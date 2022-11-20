<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../estilos/main.css">
	<title>Registrar empleado | Paso 1</title>
</head>
<body>
	<main>
		<header></header>
		<section>
			<form action="paso-2.php" method="post">
				<table border="1" cellpadding="6" style="max-width: 90vw; margin: auto;">
					<thead>
						<tr>
							<th colspan="5">Editar personal</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td colspan="2"><label for="nombre">Nombre</label></td>
							<td colspan="3"><input id="nombre" type="text" name="nombre" maxlength="20" required></td>
						</tr>
						<tr>
							<td colspan="2"><label for="apellido">Apellido</label></td>
							<td colspan="3"><input id="apellido" type="text" name="apellido" maxlength="20" required></td>
						</tr>
						<tr>
							<td colspan="2"><label for="cedula">Cédula</label></td>
							<td>
								<select id="T_cedula" name="T_cedula" required>
									<option value="" selected disabled>Tipo de cédula</option>
									<option value="V">V</option>
									<option value="E">E</option>
								</select>
							</td>
							<td colspan="2"><input id="cedula" type="text" name="cedula" maxlength="9" required></td>
						</tr>
						<tr>
							<td colspan="2"><label for="T_empleado">Tipo de empleado</label></td>

							<td colspan="3">
								<select id="T_empleado" name="T_empleado" required>
									<option value="" selected disabled>Tipo de empleado</option>
									<option value="0">Obrero</option>
									<option value="1">Docente</option>
									<option value="2">Administrativo</option>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2"><label for="F_nac">Fecha de nacimiento</label></td>
							<td colspan="3"><input id="F_nac" type="date" name="F_nac" required></td>
						</tr>
						<tr>
							<td colspan="2"><label>Sexo</label></td>
							<td colspan="3">
								<span>Femenino</span>
								<input type="radio" name="sexo" id="sexo_F" value="F">
								<span>Masculino</span>
								<input type="radio" name="sexo" id="sexo_M" value="M">
							</td>
						</tr>
						<tr>
							<td colspan="2"><label>Observaciones</label></td>
							<td colspan="3">
								<textarea id="observaciones" name="observaciones" rows="3"></textarea>
							</td>
						</tr>
						
						<tr>
							<th colspan="5">Dirección</th>
						</tr>
						<tr>
							<td colspan="2">Municipio</td>
							<td colspan="3"><input type="text"></td>
						</tr>
						<tr>
							<td colspan="2">Parroquia</td>
							<td colspan="3"><input type="text"></td>
						</tr>
						<tr>
							<td colspan="2"><label for="direccion">Dirección</label></td>
							<td colspan="3">
								<textarea id="direccion" name="direccion" rows="2" required></textarea>
							</td>
						</tr>

						<tr>
							<th colspan="5">Contacto</th>
						</tr>
						<tr>
							<td colspan="2"><label for="correo">Correo eléctronico</label></td>
							<td colspan="3"><input id="correo" type="email" name="correo"></td>
						</tr>
						<tr>
							<td colspan="2"><label>Teléfono principal</label></td>
							<td colspan="3">
								<input id="pref_P" type="text" name="pref_P" placeholder="Prefijo / Codigo de país" minlength="4" maxlength="6" required>
								<input id="tel_P" type="text" name="tel_P" placeholder="Número" minlength="7" maxlength="10" required>
							</td>
						</tr>
						<tr>
							<td colspan="2"><label>Teléfono secundario</label></td>
							<td colspan="3">
								<input id="pref_S" type="text" name="pref_S" placeholder="Prefijo / Codigo de país" minlength="4" maxlength="6" required>
								<input id="tel_S" type="text" name="tel_S" placeholder="Número" minlength="7" maxlength="10" required>
							</td>
						</tr>
						<tr>
							<td colspan="2"><label>Teléfono auxiliar</label></td>
							<td colspan="3">
								<input id="pref_A" type="text" name="pref_A" placeholder="Prefijo / Codigo de país" minlength="4" maxlength="6">
								<input id="tel_A" type="text" name="tel_A" placeholder="Número" minlength="7" maxlength="10">
							</td>
						</tr>
						<tr>
							<th colspan="5">Vacunación</th>
						</tr>
						<tr>
							<td colspan="2"><label for="T_empleado">Vacuna aplicada</label></td>
							<td colspan="3"><input type="text"></td>
						</tr>
						<tr>
							<td colspan="2"><label for="T_empleado">Dosis aplicadas</label></td>
							<td colspan="3"><input type="number"></td>
						</tr>
						<tr>
							<td><button type="submit">Guardar y continuar</button></td>
							<td><a href="../index.php" class="boton-primario">Volver</a></td>
							<td colspan="2"><input type="hidden" name="paso-1" value="paso-1"></td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<th colspan="5">Hecho por Elber Rondón</th>
						</tr>
					</tfoot>
				</table>
			</form>
		</section>
		<footer></footer>
	</main>
</body>
</html>