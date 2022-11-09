<?php 
require('../../controladores/conexion.php');
require('../../clases/contacto.php');
require('../../clases/telefono.php');

if ($_POST['tipo_empleado'] == 1) {
	include('../../clases/obrero.php');
	$emp = new Obrero();
	$empleado = $emp->consultar($_POST['id_Persona']);
}
elseif ($_POST['tipo_empleado'] == 2) {
	include('../../clases/docente.php');
	$emp = new Docente();
	$empleado = $emp->consultar($_POST['id_Persona']);
}
elseif ($_POST['tipo_empleado'] == 3) {
	include('../../clases/administrativo.php');
	$emp = new Administrativo();
	$empleado = $emp->consultar($_POST['id_Persona']);
}

$con = new Contacto();
$contacto = $con->consultar($_POST['id_Persona']);

$tel = new Telefono();
$telefonos = $tel->consultar($contacto['id_Contacto']);

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../estilos/main.css">
	<title>Editar empleado</title>
</head>
<body>
	<main>
		<header></header>
		<section>
			<form action="../../controladores/control-empleados.php" method="post">
				<table border="1" cellpadding="10" style="max-width: 700px; margin: auto;">
					<thead>
						<tr>
							<th colspan="5">Editar personal</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td colspan="5">
								<center>
									<img 
										src="../../img/subidas/<?php echo $empleado['Ruta_Imagen'];?>" 
										alt="Foto de <?php echo $empleado['Nombre'].' '.$empleado['Apellido'];?>"
										width="128"
									>
								</center>
							</td>
						</tr>
						<tr>
							<td colspan="2"><label for="nombre">Nombre</label></td>
							<td colspan="3">
								<input 
									id="nombre" 
									type="text" 
									name="nombre" 
									maxlength="20" 
									required
									value="<?php echo $empleado['Nombre']; ?>" 
								>
							</td>
						</tr>
						<tr>
							<td colspan="2"><label for="apellido">Apellido</label></td>
							<td colspan="3">
								<input 
									id="apellido" 
									type="text" 
									name="apellido" 
									maxlength="20" 
									required
									value="<?php echo $empleado['Apellido']; ?>" 
								>
							</td>
						</tr>
						<tr>
							<td colspan="2"><label for="cedula">Cédula</label></td>
							<td colspan="3"><?php echo $empleado['Cedula']; ?></td>
							
						</tr>
						<tr>
							<td colspan="2"><label for="tipo_empleado">Tipo de empleado</label></td>

							<?php  
								$emp->setid_Empleado($_POST['tipo_empleado']);
								$tipo_empleado = $emp->verificarTipo();

								if ($tipo_empleado == 1) {
									$t = "Obrero";
								}
								elseif ($tipo_empleado == 2) {
									$t = "Docente";
								}
								elseif ($tipo_empleado == 3) {
									$t = "Administrativo";
								}
							?>
							<td>
								<?php echo $t; ?>
								<input type="hidden" name="tipo_empleado" value="<?php echo $_POST['tipo_empleado']; ?>">		
							</td>
							<!-- Cambio de tipo para despues, por ahora igual al ingresado en un comienzo -->

							<!-- <td colspan="3">
								<select id="tipo_empleado" name="tipo_empleado" required>
									<option value="<?php echo $empleado['']?>" selected disabled>Tipo de empleado</option>
									<option value="0">Obrero</option>
									<option value="1">Docente</option>
									<option value="2">Administrativo</option>
								</select>
							</td> -->
						</tr>
						<tr>
							<td colspan="2"><label for="F_nac">Fecha de nacimiento</label></td>
							<td colspan="3">
								<input 
									id="F_nac" 
									type="date" 
									name="F_nac" 
									required
									value="<?php echo $empleado['Fecha_Nac']; ?>" 
								>
							</td>
						</tr>
						<tr>
							<th colspan="5">Contacto</th>
						</tr>
						<tr>
							<td colspan="2"><label for="direccion">Dirección</label></td>
							<td colspan="3">
								<textarea id="direccion" name="direccion" rows="3" required><?php echo $contacto['Direccion']; ?></textarea>
							</td>
						</tr>
						<tr>
							<td colspan="2"><label for="correo">Correo eléctronico</label></td>
							<td colspan="3">
								<input 
									id="correo" 
									type="email" 
									name="correo"
									value="<?php echo $contacto['Correo']; ?>" 
								>
							</td>
						</tr>
						<?php foreach ($telefonos as $telefono): ?>
						<tr>
							<td>Teléfono <?php echo $tel->tipoTelefono($telefono); ?></td>
							<td colspan="4">
								<input 
									id="pref_<?php echo $telefono['Relacion']?>" 
									type="text" 
									name="pref_<?php echo $telefono['Relacion']?>" 
									placeholder="Prefijo / Codigo de país" 
									minlength="4" 
									maxlength="6" 
									required
									value="<?php echo $telefono['Prefijo']?>" 
								>
								<input 
									id="tel_<?php echo $telefono['Relacion']?>" 
									type="text" 
									name="tel_<?php echo $telefono['Relacion']?>" 
									placeholder="Número" 
									minlength="7" 
									maxlength="10" 
									required
									value="<?php echo $telefono['Numero']?>" 
								>
							</td>
						</tr>
						<?php endforeach ?>
						<tr>
							<td colspan="2"><label for="profesion">Profesion</label></td>
							<td colspan="3">
								<input 
									id="profesion" 
									type="text" 
									name="profesion" 
									required
									value="<?php echo $empleado['Profesion']?>" 
								>
							</td>
						</tr>
						<tr>
							<td colspan="2"><label for="T_cargo">Tipo de cargo</label></td>
							<td colspan="3">
								<input 
									id="T_cargo" 
									type="text" 
									name="T_cargo" 
									required
									value="<?php echo $empleado['Tipo_Cargo']?>" 
								>
							</td>
						</tr>
						<tr>
							<td colspan="2"><label for="T_nomina">Tiempo en nomina</label></td>
							<td colspan="3">
								<input 
									id="T_nomina" 
									type="text" 
									name="T_nomina" 
									required
									value="<?php echo $empleado['Tiempo_Nomina']?>" 
								>
							</td>
						</tr>

						<?php if ($_POST['tipo_empleado'] == 1): // Caso Obrero?>
						<tr>
							<th colspan="5">Especificaciones de obrero</th>
						</tr>
						<tr>
							<td colspan="2"><label for="horas">Horas semanales</label></td>
							<td colspan="3">
								<input 
									id="horas" 
									type="text" 
									name="horas" 
									required
									value="<?php echo $empleado['Horas']?>" 
								>
							</td>
						</tr>
						<?php elseif ($_POST['tipo_empleado'] == 2): // Caso Docente?>
						<tr>
							<th colspan="5">Especificaciones de docente</th>
						</tr>
						<tr>
							<td colspan="2"><label for="horas">Horas académicas semanales</label></td>
							<td colspan="3">
								<input 
									id="horas" 
									type="text" 
									name="horas" 
									required
									value="<?php echo $empleado['Hrs_Academicas']?>" 
								>
							</td>
						</tr>
						<tr>
							<td colspan="2"><label for="area">Area</label></td>
							<td colspan="3">
								<input 
									id="area" 
									type="text" 
									name="area" 
									required
									value="<?php echo $empleado['Area'] ?>" 
								>
							</td>
						</tr>
						<?php elseif ($_POST['tipo_empleado'] == 3): // Caso Administrativo?>
						<?php endif ?>

						<tr>
							<td><button type="submit">Guardar y continuar</button></td>
							<td><a href="../index.php" class="boton-primario">Abortar y volver al menú</a></td>
							<td colspan="2">
								<input type="hidden" name="editar" value="editar">
								<input type="hidden" name="orden" value="editar">	
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
		</section>
		<footer></footer>
	</main>
</body>
</html>