<?php 

require('../../controladores/conexion.php');
require('../../clases/docente.php');
require('../../clases/calculos.php');

$doc = new Docente();
$calc = new Calculo();

$lista_doc = $doc->mostrar();

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../estilos/main.css">
	<title>Consultar docentes</title>
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
						<th colspan="5">Consulta de docentes</th>
					</tr>
					<tr>
						<td><a href="../../controladores/docente-excel.php">Descargar Excel</a></td>
						<td><a href="../../controladores/docente-pdf.php" target="_blank">Descargar PDF</a></td>
					</tr>
					<tr>
						<td colspan="5">
							<table id="" border="1" cellpadding="8" style="width: 100%;">
								<thead>
									<tr>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Cédula</th>
										<th>Fecha de nacimiento</th>
										<th>Horas académicas</th>
										<th>Tiempo en nomina</th>	
										<th>Área</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($lista_doc as $Docente): ?>
									<tr>
										<td><?php echo $Docente['Nombre']; ?></td>
										<td><?php echo $Docente['Apellido']; ?></td>
										<td><?php echo $Docente['Cedula']; ?></td>
										<td><?php echo $Docente['Fecha_Nac']; ?></td>
										<td><?php echo $Docente['Horas_Clase_S']." Horas semanales"; ?></td>
										<td><?php echo $calc->diferenciaF($Docente['Fecha_Ingreso']); ?></td>

										<td><?php echo $Docente['Area']; ?></td>
										<td>
											<form action="consultar-empleado.php" method="post">
												<input type="hidden" name="id_Persona" value="<?php echo $Docente['id_Persona']; ?>">
												<input type="hidden" name="tipo_empleado" value="2">
												<button type="submit">Consultar</button>
											</form>
										</td>
									</tr>
									<?php endforeach ?>
								</tbody>
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