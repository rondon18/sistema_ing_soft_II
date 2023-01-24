

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="shortcut icon" href="img/sisno-18.png" type="image/png">
	<title>Menú principal</title>
</head>

<style>
	
	label.error {
		margin-top: .3rem;
		margin-bottom: .3rem;
	}

</style>


<body>
	<main class="w-100 h-screen max-h-screen flex flex-col justify-between bg-white fondo-patron overflow-auto">
		<header class="w-100 bg-indigo-dye shadow-lg">
			<nav class="flex flex-row flex-wrap text-white font-semibold">
				
				<span class="p-3 px-8 bg-cg-blue lg:border-r-4 lg:border-oxford-blue font-extrabold flex justify-center items-center text-lg" title="Sistema de nómina SISNO-18">
					<img class="inline-block bg-white rounded-full mr-3" src="img/sisno-18.png" alt="Sistema de nómina SISNO-18" width="40">
					SISNO-18
				</span>

			</nav>
		</header>
		<section class="flex flex-row justify-center items-center my-4 lg:my-0">
			<form id="login" action="controladores/login.php" method="post" class="bg-white w-11/12 border-2 border-oxford-blue rounded-3xl max-w-lg">
				<div class="p-2 border-b border-oxford-blue text-center font-bold">
					Iniciar sesión
				</div>

				<div class="max-h-96 overflow-y-auto p-6">
					<div class="menu-inicio p-4">
						
						<!-- Cédula -->
						<div class="campo col-span-12">
							<label class="form-label" for="cedula">Cédula:</label>
							<div class="grid grid-cols-1 md:grid-cols-3 gap-2">
								<div class="md:col-span-1">
									<select id="nacionalidad" class="form-select w-full" name="nacionalidad" required>
										<option value="" selected disabled>Nacionalidad</option>
										<option value="V">Venezolano(a)</option>
										<option value="E">Extranjero(a)</option>
									</select>
								</div>
								<div class="md:col-span-2">
									<input id="cedula" class="form-input w-full" type="text" name="cedula" minlength="7" maxlength="8" placeholder="Número de cédula" required>
								</div>
							</div>
						</div>

						<!-- Contraseña -->
						<div class="campo col-span-12">
							<label class="form-label" for="nombre">
								Contraseña:
							</label>
							<input 
								id="contraseña" 
								class="form-input w-full" 
								type="text" 
								name="contraseña" 
								minlength="3" 
								maxlength="20"  
								required
								placeholder="Contraseña de ingreso" 
							>
							<label id="contraseña-error" class="error" for="contraseña" style="display: none;"></label>
						</div>

						<div class="col-span-12 mt-2">
							<button class="boton w-auto" type="submit">
								Guardar y continuar
								<svg class="w-6 ml-1 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
								</svg>
							</button>
						</div>

					</div>
				</div>
				
			</form>
		</section>	
		<footer class="w-100 bg-indigo-dye text-center p-2">
			<span class="text-white font-bold">Hecho con <img class="inline-block" src="img/tailwind-css-logo.png" width="25" alt=""> tailwindcss por Elber Rondón</span>
		</footer>
	</main>
	<script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="js/messages_es.min.js"></script>
	<script type="text/javascript" src="js/login.js"></script>
</body>
</html>