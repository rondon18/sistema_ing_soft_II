<?php 

	session_start();

	if (!$_SESSION['login']) {
		header('Location: ../index.php');
		exit();
	}

	require('conexion.php');

	function subirImagen($cedula) {
		// Codigo adaptado de https://www.w3schools.com/php/php_file_upload.asp
		$direct_objetivo = "../img/subidas/";

		// Se asigna la cédula de la persona como nombre de archivo. Se conseva la extensión
		$t = explode('.', $_FILES["foto"]["name"]);
		$nombre_archivo = $cedula.".".$t[1];

		$archivo_objetivo = $direct_objetivo . $nombre_archivo;
		$estado_subida = 1;
		$filetype_imagen = strtolower(pathinfo($archivo_objetivo,PATHINFO_EXTENSION));

		// Verifica si la imagen enviada existe
		$check = getimagesize($_FILES["foto"]["tmp_name"]);
		
		if($check !== false) {$estado_subida = 1;} 
		else {$estado_subida = 0;}

		// Verifica si el archivo ya existe
		if (file_exists($archivo_objetivo)) {
			unlink($archivo_objetivo);
		}

		// Validacion de tamaño del archivo subido
		if ($_FILES["foto"]["size"] > 500000) {
			$estado_subida = 0;
		}

		// Limitar los formatos elegibles de JPG, JPEG, PNG y GIF
		if ($filetype_imagen != "jpg" && $filetype_imagen != "png" && 
			$filetype_imagen != "jpeg" && $filetype_imagen != "gif" ) {
			$estado_subida = 0;
		}

		// Verifica si no hay errores
		if ($estado_subida == 0) {
			// Establecer nula la imagen en BD
		} 
			// Intenta subir la imagen
		else {
			if (move_uploaded_file($_FILES["foto"]["tmp_name"], $archivo_objetivo)) {
				return $nombre_archivo;
			}
			else {
				// Establecer nula la imagen en BD
			}
		}
	}


	// Condicionales para distinguir acciones 
	if 
	(
		(
			isset($_POST['paso-1'],$_POST['orden']) 
			or 
			isset($_POST['paso-2'],$_POST['orden']) 
			or 
			isset($_POST['editar'],$_POST['orden'])
			or 
			isset($_POST['eliminar'],$_POST['orden'])
		) 
		and 
		!empty($_POST['orden'])
	) 
	{
		// ORDENES PARA INSERTAR
		if ($_POST['orden'] == 'insertar') {
			switch ($_POST['T_empleado']) {
				// Caso Obrero
				case 0:
					require("../clases/obrero.php");
					$emp = new Obrero();

					// Persona
					$emp->setNombre($_POST['nombre']);
					$emp->setApellido($_POST['apellido']);
					$emp->setCedula($_POST['cedula']);
					$emp->setFecha_Nac($_POST['F_nac']);
					$emp->setSexo($_POST['sexo']);
					
					// Foto
					$foto = subirImagen($_POST['cedula']);
					$emp->setRuta_Imagen($foto);
					
					// Empleado
					$emp->setFecha_Ingreso($_POST['FI_nomina']);
					
					// Obrero
					$emp->setRol($_POST['rol']);
					
					$emp->insertarObrero();
					break;
				
				// Caso Docente
				case 1:
					require("../clases/docente.php");
					$emp = new Docente();

					// Persona
					$emp->setNombre($_POST['nombre']);
					$emp->setApellido($_POST['apellido']);
					$emp->setCedula($_POST['cedula']);
					$emp->setFecha_Nac($_POST['F_nac']);
					$emp->setSexo($_POST['sexo']);

					
					// Foto
					$foto = subirImagen($_POST['cedula']);
					$emp->setRuta_Imagen($foto);
					
					// Empleado
					$emp->setFecha_Ingreso($_POST['FI_nomina']);

					// Docente
					$emp->setHoras_Clase_S($_POST['horas_acad']);
					$emp->setArea($_POST['area']);

					$emp->insertarDocente();
					break;

				// Caso Administrativo
				case 2:
					require("../clases/administrativo.php");
					$emp = new Administrativo();

					// Persona
					$emp->setNombre($_POST['nombre']);
					$emp->setApellido($_POST['apellido']);
					$emp->setCedula($_POST['cedula']);
					$emp->setFecha_Nac($_POST['F_nac']);
					$emp->setSexo($_POST['sexo']);

					
					// Foto
					$foto = subirImagen($_POST['cedula']);
					$emp->setRuta_Imagen($foto);
					
					// Empleado
					$emp->setFecha_Ingreso($_POST['FI_nomina']);

					// Administrativo (Aún no tiene datos especificos)
					
					$emp->insertarAdministrativo();
					break;
				
				// Respuesta en caso aparte
				default:
					header('Location: ../lobby/consultar/index.php?error');
					break;
			}
			
			// Ficha de contacto
			require('../clases/contacto.php');
			$con = new Contacto();
			
			$con->setCorreo($_POST['correo']);	
			$con->setid_Personas($emp->getid_Personas());

			$con->insertarContacto();

			// Direccion
			require('../clases/direccion.php');
			$dir = new Direccion();

			$dir->setMunicipio($_POST['municipio']);
			$dir->setParroquia($_POST['parroquia']);
			$dir->setDireccion($_POST['direccion']);
			$dir->setContactos_id_Contacto($con->getid_Contacto());

			$dir->insertarDireccion();

			// Telefonos
			require('../clases/telefono.php');
			$tel = new Telefono();

			// Telefonos principal, secundario y auxiliar.
			// En ese mismo orden
			$tel->insertarTelefono($_POST['pref_P'],$_POST['tel_P'],'P',$con->getid_Contacto());
			$tel->insertarTelefono($_POST['pref_S'],$_POST['tel_S'],'S',$con->getid_Contacto());
			$tel->insertarTelefono($_POST['pref_A'],$_POST['tel_A'],'A',$con->getid_Contacto());

			// Infome
			require('../clases/informe.php');
			$inf = new Informe();

			// Si esta vacunado con al menos una dosis 
			if ((!empty($_POST['vacuna']) and !empty($_POST['dosis_vacuna'])) and ($_POST['dosis_vacuna'] >=1)) {
				$inf->setCert_Salud("Valido");
				$inf->setTarjeta_Vac("Valido");
			}
			// Si no lo esta
			else {
				$inf->setCert_Salud("No valido");
				$inf->setTarjeta_Vac("No valido");
			}

			$inf->setPersonas_id_Persona($emp->getid_Personas());

			$inf->insertarInforme();


			// Estudios
			require('../clases/estudio.php');
			$est = new Estudio();

			$est->setNivel_Acad($_POST['N_academico']);

			// Si el empleado tiene estudios universitarios
			if ($_POST['N_academico'] >= 3) {
				$est->setTitulo_Obt($_POST['titulo']);
				$est->setMencion($_POST['mencion']);
				$est->setEstudio_2do_Nvl($_POST['E_2do_nivel']);
			}
			$est->setEmpleados_id_Empleado($emp->getid_Empleado());

			$est->insertarEstudio();

			// Carga Horaria
			require('../clases/carga-horaria.php');
			$ch = new Carga_Horaria();

			$ch->setCarga_Horaria_Semanal($_POST['horas']);
			$ch->setEmpleados_id_Empleado($emp->getid_Empleado());

			$ch->insertarCarga_Horaria();
			
			header('Location: ../lobby/consultar/index.php');	
		}

		// 
		// 
		// 
		// 
		// 	

		// ORDENES PARA EDITAR
		elseif ($_POST['orden'] == 'editar') {

			switch ($_POST['T_empleado']) {
				
				// Caso Obrero
				case 1:
					require("../clases/obrero.php");
					$emp = new Obrero();

					// Persona
					$emp->setid_Personas($_POST['id_Persona']);
					$emp->setNombre($_POST['nombre']);
					$emp->setApellido($_POST['apellido']);
					// $emp->setCedula($_POST['cedula']);
					$emp->setFecha_Nac($_POST['F_nac']);
					$emp->setSexo($_POST['sexo']);
					
					// // Foto
					// $foto = subirImagen($_POST['cedula']);
					// $emp->setRuta_Imagen($foto);
					
					// Empleado
					$emp->setFecha_Ingreso($_POST['FI_nomina']);
					
					// Obrero
					$emp->setRol($_POST['rol']);
					
					$emp->editarObrero();
					break;
				
				// Caso Docente
				case 2:
					require("../clases/docente.php");
					$emp = new Docente();

					// Persona
					$emp->setid_Personas($_POST['id_Persona']);
					$emp->setNombre($_POST['nombre']);
					$emp->setApellido($_POST['apellido']);
					// $emp->setCedula($_POST['cedula']);
					$emp->setFecha_Nac($_POST['F_nac']);
					$emp->setSexo($_POST['sexo']);

					
					// // Foto
					// $foto = subirImagen($_POST['cedula']);
					// $emp->setRuta_Imagen($foto);
					
					// Empleado
					$emp->setFecha_Ingreso($_POST['FI_nomina']);

					// Docente
					$emp->setHoras_Clase_S($_POST['horas_acad']);
					$emp->setArea($_POST['area']);

					$emp->editarDocente();
					break;

				// Caso Administrativo
				case 3:
					require("../clases/administrativo.php");
					$emp = new Administrativo();

					// Persona
					$emp->setid_Personas($_POST['id_Persona']);
					$emp->setNombre($_POST['nombre']);
					$emp->setApellido($_POST['apellido']);
					// $emp->setCedula($_POST['cedula']);
					$emp->setFecha_Nac($_POST['F_nac']);
					$emp->setSexo($_POST['sexo']);

					
					// // Foto
					// $foto = subirImagen($_POST['cedula']);
					// $emp->setRuta_Imagen($foto);
					
					// Empleado
					$emp->setFecha_Ingreso($_POST['FI_nomina']);

					// Administrativo (Aún no tiene datos especificos)
					
					$emp->editarAdministrativo();
					break;
				
				// Respuesta en caso aparte
				default:
					header('Location: ../lobby/consultar/index.php?error');
					break;
			}
			
			// Ficha de contacto
			require('../clases/contacto.php');
			$con = new Contacto();
			
			$con->setCorreo($_POST['correo']);	
			$con->setid_Personas($emp->getid_Personas());

			$con->editarContacto();

			// Direccion
			require('../clases/direccion.php');
			$dir = new Direccion();

			$dir->setMunicipio($_POST['municipio']);
			$dir->setParroquia($_POST['parroquia']);
			$dir->setDireccion($_POST['direccion']);
			$dir->setContactos_id_Contacto($con->getid_Contacto());

			$dir->editarDireccion();

			// Telefonos
			require('../clases/telefono.php');
			$tel = new Telefono();

			// Telefonos principal, secundario y auxiliar.
			// En ese mismo orden
			$tel->editarTelefono($_POST['pref_P'],$_POST['tel_P'],'P',$con->getid_Contacto());
			$tel->editarTelefono($_POST['pref_S'],$_POST['tel_S'],'S',$con->getid_Contacto());
			$tel->editarTelefono($_POST['pref_A'],$_POST['tel_A'],'A',$con->getid_Contacto());

			// Infome
			require('../clases/informe.php');
			$inf = new Informe();

			// Si esta vacunado con al menos una dosis 
			if ((!empty($_POST['vacuna']) and !empty($_POST['dosis_vacuna'])) and ($_POST['dosis_vacuna'] >=1)) {
				$inf->setCert_Salud("Valido");
				$inf->setTarjeta_Vac("Valido");
			}
			// Si no lo esta
			else {
				$inf->setCert_Salud("No valido");
				$inf->setTarjeta_Vac("No valido");
			}

			$inf->setPersonas_id_Persona($emp->getid_Personas());

			$inf->editarInforme();


			// Estudios
			require('../clases/estudio.php');
			$est = new Estudio();

			$est->setNivel_Acad($_POST['N_academico']);

			// Si el empleado tiene estudios universitarios
			if ($_POST['N_academico'] >= 3) {
				$est->setTitulo_Obt($_POST['titulo']);
				$est->setMencion($_POST['mencion']);
				$est->setEstudio_2do_Nvl($_POST['E_2do_nivel']);
			}
			$est->setEmpleados_id_Empleado($emp->getid_Empleado());

			$est->editarEstudio();

			// Carga Horaria
			require('../clases/carga-horaria.php');
			$ch = new Carga_Horaria();

			$ch->setCarga_Horaria_Semanal($_POST['horas']);
			$ch->setEmpleados_id_Empleado($emp->getid_Empleado());

			$ch->editarCarga_Horaria();

			header('Location: ../lobby/consultar/index.php');
		}

		// 
		// 
		// 
		// 
		// 

		// ORDENES PARA ELIMINAR
		elseif ($_POST['orden'] == 'eliminar') {
			require('../clases/persona.php');
			$per = new Persona();
			$per->setid_Personas($_POST['id_Persona']);
			$per->eliminarPersona();
			header('Location:../lobby/consultar/index.php');
		}
	}
	else {
		header('Location:../lobby/index.php');
	}

?>