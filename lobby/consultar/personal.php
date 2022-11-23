<?php 

require('../../controladores/conexion.php');
require('../../clases/empleado.php');
require('../../clases/calculos.php');

$emp = new Empleado();
$calc = new Calculo();

$lista_personal = $emp->mostrar();

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../estilos/main.css">
	<title>Consultar Personal</title>
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
						<th colspan="5">Consulta de personal</th>
					</tr>
					<tr>
						<td colspan="5"><a href="../registrar/paso-1.php">Registrar empleado</a></td>
					</tr>
					<tr>
						<td colspan="5">
							<div style="max-width: 100vw; overflow: auto;">
								<table id="" border="1" cellpadding="4" style="width: 100%; font-size: 88%;">
									<thead>
										<tr>
											<th>Nombre</th>
											<th>Apellido</th>
											<th>Cédula</th>
											<th>Fecha de nacimiento</th>
											<th>Tiempo en nomina</th>
											<th>Tipo de personal</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($lista_personal as $empleado): ?>
											<tr>
												<td><?php echo $empleado['Nombre']; ?></td>
												<td><?php echo $empleado['Apellido']; ?></td>
												<td><?php echo $empleado['Cedula']; ?></td>
												<td><?php echo $empleado['Fecha_Nac']; ?></td>
												<td><?php echo $calc->diferenciaF($empleado['Fecha_Ingreso']); ?></td>
												<?php  
													$emp->setid_Empleado($empleado['id_Empleado']);
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
												<td><?php echo $t; ?></td>
												<td>
													<form action="consultar-empleado.php" method="post">
														<input type="hidden" name="id_Persona" value="<?php echo $empleado['id_Persona']; ?>">
														<input type="hidden" name="tipo_empleado" value="<?php echo $tipo_empleado; ?>">
														<button type="submit">Consultar</button>
													</form>
												</td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
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