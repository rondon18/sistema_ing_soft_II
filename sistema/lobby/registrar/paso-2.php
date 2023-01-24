<?php  

if (!isset($_POST['paso-1'])) {
	header('Location: paso-1.php');
}

// foreach ($_POST as $key => $value) {
// 	var_dump($key);
// 	var_dump($value);
// 	echo "<br>";
// }

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../css/estilos.css">
	<link rel="shortcut icon" href="../../img/sisno-18.png" type="image/png">
	<title>Registrar empleado</title>
</head>
<body>
	<main class="w-100 h-screen max-h-screen flex flex-col justify-between bg-white fondo-patron overflow-auto">
		<header class="w-100 bg-indigo-dye shadow-lg">
			<nav class="flex flex-row flex-wrap text-white font-semibold">
				
				<span class="p-3 px-8 bg-cg-blue lg:border-r-4 lg:border-oxford-blue font-extrabold flex justify-center items-center text-lg" title="Sistema de nómina SISNO-18">
					<img class="inline-block bg-white rounded-full mr-3" src="../../img/sisno-18.png" alt="Sistema de nómina SISNO-18" width="40">
					SISNO-18
				</span>
				
				<span class="p-4 lg:hidden ml-auto">
					<label id="boton-navbar" for="switch-navbar">
						<svg class="w-6 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
						</svg>
					</label>
				</span>
				<input id="switch-navbar" class="hidden" type="checkbox">
				
				<div id="items-navbar" class="flex flex-col md:flex-row w-full lg:w-auto border-t-2 border-white lg:border-none">
					<a class="item-navbar" href="../index.php">
						<svg class="w-6 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
						  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
						</svg>

						<span>Inicio</span>
					</a>
					<a class="item-navbar active" href="../consultar/index.php">
						<svg class="w-6 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
						</svg>
						<span>Personal</span>
					</a>
					<a class="item-navbar" href="../consultar/index.php?con=usu">
						<svg class="w-6 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
						</svg>
						<span>Usuarios</span>
					</a>
					<a class="item-navbar" href="../mantenimiento/index.php">
						<svg class="w-6 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
						</svg>
						<span>Base de datos</span>
					</a>
					<a class="item-navbar" href="../../controladores/logout.php">
						<svg class="w-6 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1012.728 0M12 3v9" />
						</svg>
						<span>Salir</span>
					</a>
				</div>
			</nav>
		</header>
		<section class="flex flex-row justify-center items-center my-4 lg:my-0">
			<section class="bg-white w-11/12 border-2 border-oxford-blue rounded-3xl">
				<div class="p-2 border-b border-oxford-blue text-center font-bold">
					Registro de personal
				</div>

				<div class="max-h-96 overflow-y-auto p-6">
					<form id="paso-2" class="grid grid-cols-12 gap-4 mx-6" action="../../controladores/control-empleados.php" method="post" enctype="multipart/form-data">
						
						<div class="col-span-12">
							<p class="text-xl font-semibold underline">Información del empleado.</p>
						</div>

						<div class="col-span-12">
							<label class="form-label" for="">Foto:</label>
							<input 
								id="foto" 
								class="form-input w-full" 
								type="file" 
								name="foto" 
								required
							>
						</div>



						<div class="col-span-4">
							<label class="form-label" for="profesion">Profesión:</label>
							<input id="profesion" class="form-input w-full" type="text" name="profesion" required>
						</div>



						<div class="col-span-4">
							<label class="form-label" for="T_cargo">Tipo de cargo:</label>
							<input id="T_cargo" class="form-input w-full" type="text" name="T_cargo" required>
						</div>



						<div class="col-span-4">
							<label class="form-label" for="FI_nomina">Fecha de ingreso a nomina:</label>
							<input id="FI_nomina" class="form-input w-full" type="date" name="FI_nomina" required>
						</div>



						<div class="col-span-4">
							<label class="form-label" for="horas">Carga horaria semanal:</label>
							<input id="horas" class="form-input w-full" type="number" min="6" name="horas" required>
						</div>



						<?php if ($_POST['T_empleado'] == 0): // Caso Obrero?>
						<div class="col-span-12">
							<p class="text-xl font-semibold underline">
								Especificaciones de obrero.
							</p>
						</div>



						<div class="col-span-4">
							<label class="form-label" for="rol">Rol de obrero:</label>
							<input id="rol" class="form-input w-full" list="roles" type="text" name="rol" required>
							<datalist id="roles">
								<option value="Limpieza">
								<option value="Cocina">
								<option value="Jardineria">
								<option value="Mantenimiento">
							</datalist>
						</div>
						<?php elseif ($_POST['T_empleado'] == 1): // Caso Docente?>
						<div class="col-span-12">
							<p class="text-xl font-semibold underline">
								Especificaciones de docente.
							</p>
						</div>



						<div class="col-span-4">
							<label class="form-label" for="horas_acad">Horas de clases semanales:</label>
							<input id="horas_acad" class="form-input w-full" type="number" min="6" name="horas_acad" required>
						</div>



						<div class="col-span-4">
							<label class="form-label" for="area">Área de especialidad:</label>
							<input id="area" class="form-input w-full" type="text" name="area" required>
						</div>
						<?php elseif ($_POST['T_empleado'] == 2): // Caso Administrativo?>
						<div class="col-span-12">
							<p class="text-xl font-semibold underline">
								Especificaciones de administrativo.
							</p>
						</div>
						<?php endif; ?>
						<div class="col-span-12">
							<input type="hidden" name="nombre" value="<?php echo $_POST['nombre']; ?>">
							<input type="hidden" name="apellido" value="<?php echo $_POST['apellido']; ?>">
							<input type="hidden" name="cedula" value="<?php echo $_POST['T_cedula'].$_POST['cedula']?>">
							<input type="hidden" name="T_empleado" value="<?php echo $_POST['T_empleado']; ?>">
							<input type="hidden" name="F_nac" value="<?php echo $_POST['F_nac']; ?>">
							<input type="hidden" name="sexo" value="<?php echo $_POST['sexo']; ?>">
							<input type="hidden" name="sexo" value="<?php echo $_POST['sexo']; ?>">
							<input type="hidden" name="municipio" value="<?php echo $_POST['municipio']; ?>">
							<input type="hidden" name="parroquia" value="<?php echo $_POST['parroquia']; ?>">
							<input type="hidden" name="direccion" value="<?php echo $_POST['direccion']; ?>">
							<input type="hidden" name="N_academico" value="<?php echo $_POST['N_academico']; ?>">
							<input type="hidden" name="titulo" value="<?php echo $_POST['titulo']; ?>">
							<input type="hidden" name="mencion" value="<?php echo $_POST['mencion']; ?>">
							<input type="hidden" name="E_2do_nivel" value="<?php echo $_POST['E_2do_nivel']; ?>">
							<input type="hidden" name="correo" value="<?php echo $_POST['correo']; ?>">
							<input type="hidden" name="pref_P" value="<?php echo $_POST['pref_P']; ?>">
							<input type="hidden" name="tel_P" value="<?php echo $_POST['tel_P']; ?>">
							<input type="hidden" name="pref_S" value="<?php echo $_POST['pref_S']; ?>">
							<input type="hidden" name="tel_S" value="<?php echo $_POST['tel_S']; ?>">
							<input type="hidden" name="pref_A" value="<?php echo $_POST['pref_A']; ?>">
							<input type="hidden" name="tel_A" value="<?php echo $_POST['tel_A']; ?>">
							<input type="hidden" name="vacuna" value="<?php echo $_POST['vacuna']; ?>">
							<input type="hidden" name="dosis_vacuna" value="<?php echo $_POST['dosis_vacuna']; ?>">
							
							<input type="hidden" name="paso-2" value="paso-2">	
							<input type="hidden" name="orden" value="insertar">	
						</div>
					</form>
				</div>
				
				<div class="p-3 px-6 border-t border-oxford-blue">
					<input type="hidden" name="paso-2" value="paso-2" form="paso-2">
					<button class="boton" type="submit" form="paso-2">
						Guardar y continuar
						<svg class="w-6 ml-1 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
						</svg>
					</button>
					<a class="boton" href="../index.php" class="boton-primario">
						Volver
						<svg class="w-6 ml-1 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
						</svg>
					</a>
				</div>
			</section>
		</section>	
		<footer class="w-100 bg-indigo-dye text-center p-2">
			<span class="text-white font-bold">Hecho con <img class="inline-block" src="../../img/tailwind-css-logo.png" width="25" alt=""> tailwindcss por Elber Rondón</span>
		</footer>
	</main>
<script type="text/javascript" src="../../js/jquery-3.6.1.min.js"></script>
<script type="text/javascript" src="../../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../../js/messages_es.min.js"></script>
<script type="text/javascript" src="../../js/validaciones-registro.js"></script>
</body>
</html>