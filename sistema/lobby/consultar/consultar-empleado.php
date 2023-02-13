<?php 

	require('../../controladores/conexion.php');
	require('../../clases/calculos.php');

	require('../../clases/contacto.php');
	require('../../clases/telefono.php');
	require('../../clases/direccion.php');
	require('../../clases/informe.php');
	require('../../clases/estudio.php');
	require('../../clases/carga-horaria.php');

	if ($_POST['tipo_empleado'] == 0) {
		include('../../clases/obrero.php');
		$emp = new Obrero();
		$empleado = $emp->consultar($_POST['id_Persona']);
	}
	elseif ($_POST['tipo_empleado'] == 1) {
		include('../../clases/docente.php');
		$emp = new Docente();
		$empleado = $emp->consultar($_POST['id_Persona']);
	}
	elseif ($_POST['tipo_empleado'] == 2) {
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
<div class="w-2/3 border-2 border-indigo-dye mx-auto mt-5 rounded-2xl p-4">
	<div class="grid grid-cols-1">
		<div class="p-1">
			<p class="text-center">
				Información de 
				<?php echo $empleado['Nombre']." ".$empleado['Apellido']; ?>
			</p>
		</div>
		<div class="p-4 col-span-1 flex justify-center items-center">
			<img 
				class="w-1/2 rounded-2xl"
				src="../../img/subidas/<?php echo $empleado['Ruta_Imagen'];?>" 
				alt="Foto de <?php echo $empleado['Nombre'].' '.$empleado['Apellido'];?>"
			>
		</div>
		<div class="p-2 px-5">
			<p>
				<span class="font-semibold">
					Nombre completo:
				</span>			
				<?php echo $empleado['Nombre']." ".$empleado['Apellido'];?>
			</p>
		</div>
		<div class="p-2 px-5">
			<p>
				<span class="font-semibold">
					Cédula:
				</span>			
				<?php echo $empleado['Cedula'];?>
			</p>
		</div>
		<div class="p-2 px-5">
			<p>
				<span class="font-semibold">
					Fecha de nacimiento:
				</span>			
				<?php echo $empleado['Fecha_Nac'];?>
			</p>
		</div>
		<div class="p-2 px-5">
			<p>
				<span class="font-semibold">
					Sexo:
				</span>			
				<?php echo $empleado['Sexo'];?>
			</p>
		</div>
		<div class="p-2 px-5">
			<p>
				<span class="font-semibold">
					Correo:
				</span>			
				<?php echo $contacto['Correo'];?>
			</p>
		</div>
		<div class="p-2 px-5">
			<p>
				<span class="font-semibold">
					Municipio:
				</span>			
				<?php echo $direccion['Municipio'];?>
			</p>
		</div>
		<div class="p-2 px-5">
			<p>
				<span class="font-semibold">
					Parroquia:
				</span>			
				<?php echo $direccion['Parroquia'];?>
			</p>
		</div>
		<div class="p-2 px-5">
			<p>
				<span class="font-semibold">
					Direccion:
				</span>			
				<?php echo $direccion['Direccion'];?>
			</p>
		</div>
		<?php foreach ($telefonos as $telefono): ?>
		<div class="p-2 px-5">
			<p>
				<span class="font-semibold">
					Teléfono <?php echo $tel->tipoTelefono($telefono); ?>:
				</span>			
				<?php echo $telefono['Prefijo']."-".$telefono['Numero']; ?>
			</p>
		</div>
		<?php endforeach ?>	
		<div class="p-2 px-5">
			<p>
				<span class="font-semibold">
					Nivel académico:
				</span>			
				<?php echo $calc->nivelAcademico($estudio['Nivel_Acad']); ?>
			</p>
		</div>
		<div class="p-2 px-5">
			<p>
				<span class="font-semibold">
					Titulo:
				</span>			
				<?php echo $estudio['Titulo_Obt'];?>
			</p>
		</div>	
		<div class="p-2 px-5">
			<p>
				<span class="font-semibold">
					Mención:
				</span>			
				<?php echo $estudio['Mencion'];?>
			</p>
		</div>	
		<div class="p-2 px-5">
			<p>
				<span class="font-semibold">
					Estudio de segundo grado:
				</span>			
				<?php echo $estudio['Estudio_2do_Nvl'];?>
			</p>
		</div>	
		<div class="p-2 px-5">
			<p>
				<span class="font-semibold">
					Certificado de salud:
				</span>			
				<?php echo $informe['Cert_Salud'];?>
			</p>
		</div>	
		<div class="p-2 px-5">
			<p>
				<span class="font-semibold">
					Tarjeta de vacunacion:
				</span>			
				<?php echo $informe['Tarjeta_Vac'];?>
			</p>
		</div>	
		<div class="p-2 px-5">
			<p>
				<span class="font-semibold">
					Fecha de ingreso:
				</span>			
				<?php echo $empleado['Fecha_Ingreso']; ?>
			</p>
		</div>
		<div class="p-2 px-5">
			<p>
				<span class="font-semibold">
					Carga horaria semanal
				</span>			
				<?php echo $carga['Carga_Horaria_Semanal']." Horas"; ?>
			</p>
		</div>
		<div class="p-2 px-5">
			<p>
				<span class="font-semibold">
					Carga horaria mensual
				</span>			
				<?php echo $calc->cargaHoraria_M($carga['Carga_Horaria_Semanal'])." Horas"; ?>
			</p>
		</div>
		<div class="p-2 px-5">
			<p>
				<span class="font-semibold">
					Carga horaria anual
				</span>			
				<?php echo $calc->cargaHoraria_A($carga['Carga_Horaria_Semanal'])." Horas"; ?>
			</p>
		</div>
		<div class="p-2 px-5">
			<p>
				<span class="font-semibold">
					Tiempo en nómina
				</span>			
				<?php echo $calc->diferenciaF($empleado['Fecha_Ingreso']); ?>
			</p>
		</div>
		<?php if ($_POST['tipo_empleado'] == 0): ?>
			<div class="p-2 px-5">
				<p>
					<span class="font-semibold">
						Rol de obrero
					</span>			
					<?php echo $empleado['Rol']; ?>
				</p>
			</div>
		<?php elseif ($_POST['tipo_empleado'] == 1): ?>
			<div class="p-2 px-5">
				<p>
					<span class="font-semibold">
						Horas de clase semanales
					</span>			
					<?php echo $empleado['Horas_Clase_S']; ?>
				</p>
			</div>
			<div class="p-2 px-5">
				<p>
					<span class="font-semibold">
						Área
					</span>			
					<?php echo $empleado['Area']; ?>
				</p>
			</div>
		<?php elseif ($_POST['tipo_empleado'] == 2): ?>
		<?php endif;?>
	</div>
	<form class="inline-block" action="../editar/paso-1.php" method="post">
		<input type="hidden" name="id_Persona" value="<?php echo $empleado['id_Persona']; ?>">
		<input type="hidden" name="tipo_empleado" value="<?php echo $_POST['tipo_empleado']; ?>">
		<button class="boton" type="submit">Editar</button>
	</form>
	<form class="inline-block" action="../../controladores/control-empleados.php" method="post">
		<input type="hidden" name="id_Persona" value="<?php echo $empleado['id_Persona']; ?>">
		<input type="hidden" name="eliminar" value="eliminar">
		<input type="hidden" name="orden" value="eliminar">

		<button class="boton" type="submit">Eliminar</button>
	</form>
</div>
</table>