<?php 

require('../../controladores/conexion.php');

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

// print_r($empleado);

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../estilos/main.css">
	<title>Consultar empleado</title>
</head>
<body>
	<main>
		<header></header>
		<section>
			<table border="1" cellpadding="10" style="max-width: 90vw; margin: auto;">
				<thead>
					<tr>
						<th colspan="5">Área de consulta</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><a href="../index.php" class="boton-primario">Menú principal</a></td>
						<td><a href="personal.php" class="boton-primario">Consultar personal</a></td>
						<td><a href="obreros.php" class="boton-primario">Consultar obreros</a></td>
						<td><a href="docentes.php" class="boton-primario">Consultar docentes</a></td>
						<td><a href="administrativos.php" class="boton-primario">Consultar administrativos</a></td>
					</tr>
					<tr>
						<th colspan="5">Consulta de empleado</th>
					</tr>
					<tr>
						<td colspan="5">
							<table border="1" cellpadding="6" style="width: 100%; max-width: 500px; margin: auto;">
								<tr>
									<th colspan="5">Información personal</th>
								</tr>

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
									<td>Id</td>
									<td colspan="4"><?php echo $empleado['id_Persona']; ?></td>
								</tr>

								<tr>
									<td>Nombre</td>
									<td colspan="4"><?php echo $empleado['Nombre']; ?></td>
								</tr>
								
								<tr>
									<td>Apellido</td>
									<td colspan="4"><?php echo $empleado['Apellido']; ?></td>
								</tr>

								<tr>
									<td>Cedula</td>
									<td colspan="4"><?php echo $empleado['Cedula']; ?></td>
								</tr>
								
								<tr>
									<td>Fecha_Nac</td>
									<td colspan="4"><?php echo $empleado['Fecha_Nac']; ?></td>
								</tr>

								<tr>
									<th colspan="5">Información de contacto</th>
								</tr>
								
								<tr>
									<th colspan="5">Información de empleado</th>
								</tr>

								<tr>
									<td>Id</td>
									<td colspan="4"><?php echo $empleado['id_Empleado']; ?></td>
								</tr>
								
								<tr>
									<td>Profesion</td>
									<td colspan="4"><?php echo $empleado['Profesion']; ?></td>
								</tr>
								
								<tr>
									<td>Tipo_Cargo</td>
									<td colspan="4"><?php echo $empleado['Tipo_Cargo']; ?></td>
								</tr>
								
								<tr>
									<td>Tiempo_Nomina</td>
									<td colspan="4"><?php echo $empleado['Tiempo_Nomina']; ?></td>
								</tr>

								<?php if ($_POST['tipo_empleado'] == 1): ?>
								<tr>
									<th colspan="5">Detalles de Obrero</th>
								</tr>
								
								<tr>
									<td>id_Obrero</td>
									<td colspan="4"><?php echo $empleado['id_Obrero']; ?></td>
								</tr>

								<tr>
									<td>Horas</td>
									<td colspan="4"><?php echo $empleado['Horas']; ?></td>
								</tr>
								<?php elseif ($_POST['tipo_empleado'] == 2): ?>
								<tr>
									<th colspan="5">Detalles de Docente</th>
								</tr>
								
								<tr>
									<td>id_Docente</td>
									<td colspan="4"><?php echo $empleado['id_Docente']; ?></td>
								</tr>
								
								<tr>
									<td>Hrs_Academicas</td>
									<td colspan="4"><?php echo $empleado['Hrs_Academicas']; ?></td>
								</tr>
								
								<tr>
									<td>Area</td>
									<td colspan="4"><?php echo $empleado['Area']; ?></td>
								</tr>
								<?php elseif ($_POST['tipo_empleado'] == 3): ?>
								<tr>
									<th colspan="5">Detalles de Administrativo</th>
								</tr>
								
								<?php endif ?>

								<tr>
									<th colspan="5">Acciones</th>
								</tr>

								<tr>
									<td>Editar</td>
									<td>Eliminar</td>
									<td></td>
								</tr>
							</table>
						</td>
					</tr>
				</tbody>
				<tfoot>
					<th colspan="5">Hecho por Elber Rondón</th>
				</tfoot>
			</table>
		</section>
		<footer></footer>
	</main>
</body>
</html>