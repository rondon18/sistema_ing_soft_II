<?php 

require('../../controladores/conexion.php');
require('../../clases/docente.php');

$doc = new Docente();

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
						<td colspan="5">
							<table id="" border="1" cellpadding="8" style="width: 100%;">
								<thead>
									<tr>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Cédula</th>
										<th>Fecha de nacimiento</th>
										<th>Profesión</th>
										<th>Tipo de cargo</th>
										<th>Horas académicas</th>
										<th>Área</th>
										<th colspan="3">Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($lista_doc as $Docente): ?>
									<tr>
										<td><?php echo $Docente['Nombre']; ?></td>
										<td><?php echo $Docente['Apellido']; ?></td>
										<td><?php echo $Docente['Cedula']; ?></td>
										<td><?php echo $Docente['Fecha_Nac']; ?></td>
										<td><?php echo $Docente['Profesion']; ?></td>
										<td><?php echo $Docente['Tipo_Cargo']; ?></td>
										<td><?php echo $Docente['Hrs_Academicas']; ?></td>
										<td><?php echo $Docente['Area']; ?></td>
										<td><a href="#">Consultar</a></td>
										<td><a href="#">Editar</a></td>
										<td><a href="#">Eliminar</a></td>
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