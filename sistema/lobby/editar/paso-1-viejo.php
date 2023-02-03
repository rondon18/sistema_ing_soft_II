<?php 
	
	require('../../controladores/conexion.php');
	require('../../clases/calculos.php');

	require('../../clases/contacto.php');
	require('../../clases/telefono.php');
	require('../../clases/direccion.php');
	require('../../clases/informe.php');
	require('../../clases/estudio.php');
	require('../../clases/carga-horaria.php');

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

	$dir = new Direccion();
	$direccion = $dir->consultar($contacto['id_Contacto']);

	$inf = new Informe();
	$informe = $inf->consultar($_POST['id_Persona']);

	$est = new Estudio();
	$estudio = $est->consultar($empleado['id_Empleado']);

	$ch = new Carga_Horaria();
	$carga = $ch->consultar($empleado['id_Empleado']);


	$calc = new Calculo();

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
								$tipo_empleado = $_POST['tipo_empleado'];
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
								<input type="hidden" name="T_empleado" value="<?php echo $_POST['tipo_empleado']; ?>">		
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
							<td colspan="2"><label>Sexo</label></td>
							<td colspan="3">
								<span>Femenino</span>
								<input type="radio" name="sexo" id="sexo_F" value="F" required <?php if ($empleado['Sexo'] == "F") {echo "checked";} ?>>
								<span>Masculino</span>
								<input type="radio" name="sexo" id="sexo_M" value="M" required <?php if ($empleado['Sexo'] == "M") {echo "checked";} ?>>
							</td>
						</tr>
						<tr>
							<th colspan="5">Dirección</th>
						</tr>
						<tr>
							<td colspan="2">Municipio</td>
							<td colspan="3"><input id="municipio" type="text" name="municipio" value="<?php echo $direccion['Municipio'] ?>"></td>
						</tr>
						<tr>
							<td colspan="2">Parroquia</td>
							<td colspan="3"><input id="parroquia" type="text" name="parroquia" value="<?php echo $direccion['Parroquia'] ?>"></td>
						</tr>
						<tr>
							<td colspan="2"><label for="direccion">Dirección</label></td>
							<td colspan="3">
								<textarea id="direccion" name="direccion" rows="3" required><?php echo $direccion['Direccion']; ?></textarea>
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
						<tr>
							<th colspan="5">Contacto</th>
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
									<?php if($telefono['Relacion'] != 'A'){echo "required";} ?>
									value="<?php echo $telefono['Prefijo']?>" 
								>
								<input 
									id="tel_<?php echo $telefono['Relacion']?>" 
									type="text" 
									name="tel_<?php echo $telefono['Relacion']?>" 
									placeholder="Número" 
									minlength="7" 
									maxlength="10" 
									<?php if($telefono['Relacion'] != 'A'){echo "required";} ?>
									value="<?php echo $telefono['Numero']?>" 
								>
							</td>
						</tr>
						<?php endforeach ?>
						<tr>
							<th colspan="5">Educación</th>
						</tr>
						<tr>
							<td colspan="2"><label for="N_academico">Nivel académico</label></td>
							<td colspan="3">
								<select id="N_academico" name="N_academico" required>
									<option value="" selected disabled>Nivel académico</option>
									<option value="0" <?php if ($estudio['Nivel_Acad'] == 0) {echo "selected";} ?>>Sin estudios</option>
									<option value="1" <?php if ($estudio['Nivel_Acad'] == 1) {echo "selected";} ?>>Primaria</option>
									<option value="2" <?php if ($estudio['Nivel_Acad'] == 2) {echo "selected";} ?>>Bachillerato</option>
									<option value="3" <?php if ($estudio['Nivel_Acad'] == 3) {echo "selected";} ?>>Universidad</option>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2"><label for="titulo">Titulo universitario</label></td>
							<td colspan="3">
								<input id="titulo" type="text" name="titulo" list="titulos" value="<?php echo $estudio['Titulo_Obt'] ?>">
								<datalist id="titulos">
									<option value="Tsu.">
									<option value="Lic.">
									<option value="Ing.">
									<option value="Dr.">
								</datalist>
							</td>
						</tr>
						<tr>
							<td colspan="2"><label for="mencion">Mención</label></td>
							<td colspan="3"><input id="mencion" name="mencion" type="text" value="<?php echo $estudio['Mencion'] ?>"></td>
						</tr>
						<tr>
							<td colspan="2"><label for="E_2do_nivel">Estudio de segundo nivel</label></td>
							<td colspan="3"><input id="E_2do_nivel" name="E_2do_nivel" type="text" value="<?php echo $estudio['Estudio_2do_Nvl'] ?>"></td>
						</tr>
						<tr>
							<th colspan="5">Especificaciones laborales</th>
						</tr>

						<tr>
							<td colspan="2"><label for="horas">Horas semanales</label></td>
							<td colspan="3">
								<input 
									id="horas" 
									type="number" 
									name="horas" 
									min="6"
									required
									value="<?php echo $carga['Carga_Horaria_Semanal']?>" 
								>
							</td>
						</tr>

						<tr>
							<td colspan="2"><label for="FI_nomina">Fecha de ingreso a nomina</label></td>
							<td colspan="3"><input id="FI_nomina" type="date" name="FI_nomina" required value="<?php echo $empleado['Fecha_Ingreso'] ?>"></td>
						</tr>

						<?php if ($_POST['tipo_empleado'] == 1): // Caso Obrero?>
						<tr>
							<th colspan="5">Especificaciones de obrero</th>
						</tr>
						<tr>
							<td colspan="2"><label for="rol">Rol de obrero</label></td>
							<td colspan="3">
								<input id="rol" list="roles" type="text" name="rol" required value="<?php echo $empleado['Rol'] ?>">
								<datalist id="roles">
									<option value="Limpieza">
									<option value="Cocina">
									<option value="Jardineria">
									<option value="Mantenimiento">
								</datalist>
							</td>
						</tr>
						
						<?php elseif ($_POST['tipo_empleado'] == 2): // Caso Docente?>
						<tr>
							<th colspan="5">Especificaciones de docente</th>
						</tr>
						<tr>
							<td colspan="2"><label for="horas_acad">Horas de clases semanales</label></td>
							<td colspan="3"><input id="horas_acad" type="number" min="6" name="horas_acad" required value="<?php echo $empleado['Horas_Clase_S']; ?>"></td>
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
								<input type="hidden" name="id_Persona" value="<?php echo $_POST['id_Persona']; ?>">
								<input type="text" name="T_empleado" value="<?php echo $_POST['tipo_empleado']; ?>">
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