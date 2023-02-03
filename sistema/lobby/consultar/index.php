<?php 
	session_start();

	if (!$_SESSION['login']) {
		header('Location: ../../index.php');
		exit();
	}
	
	if (isset($_GET['con'])) {
		if ($_GET['con'] == "obr") {
			$con = 0;
			$title = "obreros";
		}
		elseif ($_GET['con'] == "doc") {
			$con = 1;
			$title = "docentes";
		}
		elseif ($_GET['con'] == "adm") {
			$con = 2;
			$title = "personal administrativo";
		}
		elseif ($_GET['con'] == "usu") {
			$con = 3;
			$title = "usuarios";
		}
		elseif ($_GET['con'] == "per") {
			$con = 4;
			$title = "personal";
		}
		elseif ($_GET['con'] == "emp" and isset($_POST['id_Persona'],$_POST['tipo_empleado'])) {
			$con = 5;
			$title = "empleado";
		}
		else {
			$con = 4;
			$title = "personal";
		}
	}
	else {
		$con = 4;
		$title = "personal";
	}
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../css/estilos.css">
	<link rel="shortcut icon" href="../../img/sisno-18.png" type="image/png">
	<title>Consultar <?php echo $title; ?></title>
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
					<a class="item-navbar <?php if($con!=3) {echo "active";}?>" href="index.php">
						<svg class="w-6 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
						</svg>
						<span>Personal</span>
					</a>
					<?php if ($_SESSION['datos_login']['Rol'] == 'Administrador'): ?>

					<a class="item-navbar <?php if($con==3) {echo "active";}?>" href="index.php?con=usu">
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
				<?php endif; ?>
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
					Área de consulta
				</div>

				<div class="max-h-96 overflow-y-auto p-6">
					<p class="text-xl text-center font-semibold mb-2">Selector de consulta</p>
					<div class="flex flex-wrap text-sm justify-center">
						<a class="boton mx-2 mb-2" href="index.php?con=per">Consultar Personal</a>
						<a class="boton mx-2 mb-2" href="index.php?con=obr">Consultar Obreros</a>
						<a class="boton mx-2 mb-2" href="index.php?con=doc">Consultar Docentes</a>
						<a class="boton mx-2 mb-2" href="index.php?con=adm">Consultar Administrativos</a>
						<a class="boton mx-2 mb-2" href="index.php?con=usu">Consultar Usuarios</a>
					</div>
					<?php  
						if ($con == 0){
							require 'obreros.php';
						}		
						elseif($con == 1){
							require 'docentes.php';
						}
						elseif($con == 2){
							require 'administrativos.php';
						}
						elseif($con == 3){
							require 'usuarios.php';
						}
						elseif($con == 4){
							require 'personal.php';
						}
						elseif($con == 5){
							require 'consultar-empleado.php';
						}
					?>				
				</div>
				
				<div class="p-2 border-t border-oxford-blue text-center font-bold">
					Sistema de nómina
				</div>
			</section>
		</section>	
		<footer class="w-100 bg-indigo-dye text-center p-2">
			<span class="text-white font-bold">Hecho con <img class="inline-block" src="../../img/tailwind-css-logo.png" width="25" alt=""> tailwindcss por Elber Rondón</span>
		</footer>
	</main>
</body>
</html>