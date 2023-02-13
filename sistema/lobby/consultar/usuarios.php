<?php 

	require('../../controladores/conexion.php');
	require('../../clases/persona.php');
	require('../../clases/usuario.php');
	require('../../clases/calculos.php');

	$usu = new Usuario();
	$calc = new Calculo();

	$lista_usuario = $usu->mostrar();
?>

<?php if ($_SESSION['datos_login']['Rol'] == 'Administrador'): ?>	
	<p class="text-xl text-center font-semibold mt-5 mb-3">Consulta de usuarios.</p>

	<!-- <a class="boton mb-2" href="../registrar/paso-1.php">
		Registrar empleado
		<svg class="w-6 ml-1 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
		  <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
		</svg>
	</a> -->

	<table id="personal" class="table-auto w-full border-separate border border-indigo-dye">
		<thead>
			<tr>
				<th class="border bg-indigo-dye text-white p-1">Nombre</th>
				<th class="border bg-indigo-dye text-white p-1">Apellido</th>
				<th class="border bg-indigo-dye text-white p-1">Cédula</th>
				<th class="border bg-indigo-dye text-white p-1">Fecha de nacimiento</th>
				<th class="border bg-indigo-dye text-white p-1">Rol</th>
			</tr>
		</thead>
		<tbody class="text-center">
			<?php foreach ($lista_usuario as $usuario): ?>
				<tr>
					<td class="border border-indigo-dye p-1"><?php echo $usuario['Nombre']; ?></td>
					<td class="border border-indigo-dye p-1"><?php echo $usuario['Apellido']; ?></td>
					<td class="border border-indigo-dye p-1"><?php echo $usuario['Cedula']; ?></td>
					<td class="border border-indigo-dye p-1"><?php echo $usuario['Fecha_Nac']; ?></td>
					<td class="border border-indigo-dye p-1"><?php echo $usuario['Rol']; ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
<?php endif ?>

