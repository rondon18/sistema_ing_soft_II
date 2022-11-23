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
$informe = $inf->consultar($contacto['id_Contacto']);

$est = new Estudio();
$estudio = $est->consultar($contacto['id_Contacto']);

$ch = new Carga_Horaria();
$carga = $ch->consultar($contacto['id_Contacto']);


$calc = new Calculo();
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
									<td>Sexo</td>
									<td colspan="4"><?php echo $empleado['Sexo']; ?></td>
								</tr>

								<tr>
									<th colspan="5">Información de contacto</th>
								</tr>
								
								<tr>
									<td>id_Contacto</td>
									<td colspan="4"><?php echo $contacto['id_Contacto']; ?></td>
								</tr>	

								<tr>
									<td>Correo</td>
									<td colspan="4"><?php echo $contacto['Correo']; ?></td>
								</tr>

								<tr>
									<td>Municipio</td>
									<td colspan="4"><?php echo $direccion['Municipio']; ?></td>
								</tr>
								<tr>
									<td>Parroquia</td>
									<td colspan="4"><?php echo $direccion['Parroquia']; ?></td>
								</tr>
								<tr>
									<td>Direccion</td>
									<td colspan="4"><?php echo $direccion['Direccion']; ?></td>
								</tr>
								
								<?php foreach ($telefonos as $telefono): ?>
								<tr>
									<td><?php echo $tel->tipoTelefono($telefono); ?></td>
									<td colspan="4">
										<?php echo $telefono['Prefijo']."-".$telefono['Numero']; ?>
									</td>
								</tr>
								<?php endforeach ?>

								<tr>
									<th colspan="5">Estudios</th>
								</tr>

								<tr>
									<td>Nivel académico</td>
									<td colspan="4"><?php echo $calc->nivelAcademico($estudio['Nivel_Acad']); ?></td>
								</tr>
								<tr>
									<td>Titulo</td>
									<td colspan="4"><?php echo $estudio['Titulo_Obt']; ?></td>
								</tr>
								<tr>
									<td>Mención</td>
									<td colspan="4"><?php echo $estudio['Mencion']; ?></td>
								</tr>
								<tr>
									<td>Estudio de segundo grado</td>
									<td colspan="4"><?php echo $estudio['Estudio_2do_Nvl']; ?></td>
								</tr>

								<tr>
									<th colspan="5">Informes médicos</th>
								</tr>
								<tr>
									<td>Certificado de salud</td>
									<td colspan="4"><?php echo $informe['Cert_Salud']; ?></td>
								</tr>
								<tr>
									<td>Tarjeta de vacunacion</td>
									<td colspan="4"><?php echo $informe['Tarjeta_Vac']; ?></td>
								</tr>

								<tr>
									<th colspan="5">Información de empleado</th>
								</tr>
								
								<tr>
									<td>Id</td>
									<td colspan="4"><?php echo $empleado['id_Empleado']; ?></td>
								</tr>
																
								<tr>
									<td>Fecha de ingreso</td>
									<td colspan="4"><?php echo $empleado['Fecha_Ingreso']; ?></td>
								</tr>
																
								<tr>
									<td>Carga horaria semanal</td>
									<td colspan="4"><?php echo $carga['Carga_Horaria_Semanal']." Horas"; ?></td>
								</tr>	
																
								<tr>
									<td>Carga horaria mensual</td>
									<td colspan="4"><?php echo $calc->cargaHoraria_M($carga['Carga_Horaria_Semanal'])." Horas"; ?></td>
								</tr>	
																
								<tr>
									<td>Carga horaria anual</td>
									<td colspan="4"><?php echo $calc->cargaHoraria_A($carga['Carga_Horaria_Semanal'])." Horas"; ?></td>
								</tr>	

								<tr>
									<td>Tiempo_Nomina</td>
									<td colspan="4"><?php echo $calc->diferenciaF($empleado['Fecha_Ingreso']); ?></td>
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
									<td>Rol de obrero</td>
									<td colspan="4"><?php echo $empleado['Rol']; ?></td>
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
									<td>Horas de clase semanales</td>
									<td colspan="4"><?php echo $empleado['Horas_Clase_S']; ?></td>
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
									<td>
										<form action="../editar/paso-1.php" method="post">
											<input type="hidden" name="id_Persona" value="<?php echo $empleado['id_Persona']; ?>">
											<input type="hidden" name="tipo_empleado" value="<?php echo $_POST['tipo_empleado']; ?>">
											<button type="submit">Editar</button>
										</form>
									</td>
									<td>
										<form action="../../controladores/control-empleados.php" method="post">
											<input type="hidden" name="id_Persona" value="<?php echo $empleado['id_Persona']; ?>">
											<input type="hidden" name="eliminar" value="eliminar">
											<input type="hidden" name="orden" value="eliminar">

											<button type="submit">Eliminar</button>
										</form>
									</td>
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