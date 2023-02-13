<?php 

	require('../../controladores/conexion.php');
	require('../../clases/calculos.php');
	require('../../clases/obrero.php');

	$ob = new Obrero();
	$calc = new Calculo();

	$lista_ob = $ob->mostrar();

?>

<p class="text-xl text-center font-semibold mt-5 mb-3">Consulta de obreros.</p>

<a class="boton mb-2" href="../registrar/paso-1.php">
	Registrar empleado
	<svg class="w-6 ml-1 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
	  <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
	</svg>
</a>

<table id="obreros" class="table-auto w-full border-separate border border-indigo-dye">
	<thead>
		<tr>
		<th class="border bg-indigo-dye text-white p-1">Nombre</th>
		<th class="border bg-indigo-dye text-white p-1">Apellido</th>
		<th class="border bg-indigo-dye text-white p-1">Cédula</th>
		<th class="border bg-indigo-dye text-white p-1">Fecha de nacimiento</th>
		<th class="border bg-indigo-dye text-white p-1">Rol de obrero</th>
		<th class="border bg-indigo-dye text-white p-1">Tiempo en nomina</th>
		<th class="border bg-indigo-dye text-white p-1">Acciones</th>
		</tr>
	</thead>
	<tbody class="text-center">
	<?php foreach ($lista_ob as $Obrero): ?>
		<tr>
			<td class="border border-indigo-dye p-1"><?php echo $Obrero['Nombre']; ?></td>
			<td class="border border-indigo-dye p-1"><?php echo $Obrero['Apellido']; ?></td>
			<td class="border border-indigo-dye p-1"><?php echo $Obrero['Cedula']; ?></td>
			<td class="border border-indigo-dye p-1"><?php echo $Obrero['Fecha_Nac']; ?></td>
			<td class="border border-indigo-dye p-1"><?php echo $Obrero['Rol']; ?></td>
			<td class="border border-indigo-dye p-1"><?php echo $calc->diferenciaF($Obrero['Fecha_Ingreso']); ?></td>
			<td class="border border-indigo-dye p-1">
				<form action="index.php?con=emp" method="post">
					<input type="hidden" name="id_Persona" value="<?php echo $Obrero['id_Persona']; ?>">
					<input type="hidden" name="tipo_empleado" value="0">
					<button class="boton p-1 px-2 text-sm" type="submit">
						consultar
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 ml-1 inline-block">
						  <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
						</svg>
					</button>
				</form>
			</td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>

