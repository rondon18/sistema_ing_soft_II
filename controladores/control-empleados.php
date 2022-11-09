<?php 

require('conexion.php');

// foreach ($_POST as $key => $value) {
// 	var_dump($key);
// 	var_dump($value);
// 	echo "<br>";
// }

function subirImagen($cedula) {
	
	// Codigo adaptado de https://www.w3schools.com/php/php_file_upload.asp

	$direct_objetivo = "../img/subidas/";

	// Se asigna la cédula de la persona como nombre de archivo
	// Se conseva la extensión

	$t = explode('.', $_FILES["foto"]["name"]);
	$nombre_archivo = $cedula.".".$t[1];


	$archivo_objetivo = $direct_objetivo . $nombre_archivo;
	$estado_subida = 1;
	$filetype_imagen = strtolower(pathinfo($archivo_objetivo,PATHINFO_EXTENSION));

	// Verifica si la imagen enviada existe
	$check = getimagesize($_FILES["foto"]["tmp_name"]);
	if($check !== false) {
		$estado_subida = 1;
	} 
	else {
		$estado_subida = 0;
	}

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
		echo 1;
	}

	// Verifica si no hay errores
	if ($estado_subida == 0) {
		// Establecer nula la imagen en BD
	} 
		// Intenta subir la imagen
	else {
		if (move_uploaded_file($_FILES["foto"]["tmp_name"], $archivo_objetivo)) {
			// Caso Exitoso
			return $nombre_archivo;
		}
		else {
			// Caso Fallido
			// Establecer nula la imagen en BD
		}
	}
}


if 
(
	(
		isset($_POST['paso-1'],$_POST['orden']) 
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
				
				// Foto
				$foto = subirImagen($_POST['cedula']);
				$emp->setRuta_Imagen($foto);
				
				// Empleado
				$emp->setProfesion($_POST['profesion']);
				$emp->setTipo_Cargo($_POST['T_cargo']);
				$emp->setTiempo_Nomina($_POST['T_nomina']);
				
				// Obrero
				$emp->setHoras($_POST['horas']);
				
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
				
				// Foto
				$foto = subirImagen($_POST['cedula']);
				$emp->setRuta_Imagen($foto);
				
				// Empleado
				$emp->setProfesion($_POST['profesion']);
				$emp->setTipo_Cargo($_POST['T_cargo']);
				$emp->setTiempo_Nomina($_POST['T_nomina']);

				// Docente
				$emp->setHrs_Academicas($_POST['horas']);
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
				
				// Foto
				$foto = subirImagen($_POST['cedula']);
				$emp->setRuta_Imagen($foto);
				
				// Empleado
				$emp->setProfesion($_POST['profesion']);
				$emp->setTipo_Cargo($_POST['T_cargo']);
				$emp->setTiempo_Nomina($_POST['T_nomina']);

				// Administrativo (Aún no tiene datos especificos)
				
				$emp->insertarAdministrativo();
				break;
			
			// Respuesta en caso aparte
			default:
				header('Location: ../lobby/consultar/personal.php?error');
				break;
		}
		
		// Ficha de contacto
		require('../clases/contacto.php');
		$con = new Contacto();
		
		$con->setCorreo($_POST['correo']);	
		$con->setDireccion($_POST['direccion']);
		$con->setid_Personas($emp->getid_Personas());

		$con->insertarContacto();

		// Telefonos
		require('../clases/telefono.php');
		$tel = new Telefono();

		// Telefonos principal, secundario y auxiliar.
		// En ese mismo orden
		$tel->insertarTelefono($_POST['pref_P'],$_POST['tel_P'],'P',$con->getid_Contacto());
		$tel->insertarTelefono($_POST['pref_S'],$_POST['tel_S'],'S',$con->getid_Contacto());
		$tel->insertarTelefono($_POST['pref_A'],$_POST['tel_A'],'A',$con->getid_Contacto());

		header('Location: ../lobby/consultar/personal.php');	
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
			case 0:
				require("../clases/obrero.php");
				$emp = new Obrero();

				// Persona
				$emp->setid_Personas($_POST['id_Persona']);
				$emp->setNombre($_POST['nombre']);
				$emp->setApellido($_POST['apellido']);
				$emp->setCedula($_POST['cedula']);
				$emp->setFecha_Nac($_POST['F_nac']);
				
				// // Foto
				// $foto = subirImagen($_POST['cedula']);
				// $emp->setRuta_Imagen($foto);
				
				// Empleado
				$emp->setProfesion($_POST['profesion']);
				$emp->setTipo_Cargo($_POST['T_cargo']);
				$emp->setTiempo_Nomina($_POST['T_nomina']);
				
				// Obrero
				$emp->setHoras($_POST['horas']);
				
				$emp->editarObrero();
				break;
			
			// Caso Docente
			case 1:
				require("../clases/docente.php");
				$emp = new Docente();

				// Persona
				$emp->setid_Personas($_POST['id_Persona']);
				$emp->setNombre($_POST['nombre']);
				$emp->setApellido($_POST['apellido']);
				$emp->setCedula($_POST['cedula']);
				$emp->setFecha_Nac($_POST['F_nac']);
				
				// // Foto
				// $foto = subirImagen($_POST['cedula']);
				// $emp->setRuta_Imagen($foto);
				
				// Empleado
				$emp->setProfesion($_POST['profesion']);
				$emp->setTipo_Cargo($_POST['T_cargo']);
				$emp->setTiempo_Nomina($_POST['T_nomina']);

				// Docente
				$emp->setHrs_Academicas($_POST['horas']);
				$emp->setArea($_POST['area']);

				$emp->editarDocente();
				break;

			// Caso Administrativo
			case 2:
				require("../clases/administrativo.php");
				$emp = new Administrativo();

				// Persona
				$emp->setid_Personas($_POST['id_Persona']);
				$emp->setNombre($_POST['nombre']);
				$emp->setApellido($_POST['apellido']);
				$emp->setCedula($_POST['cedula']);
				$emp->setFecha_Nac($_POST['F_nac']);
				
				// // Foto
				// $foto = subirImagen($_POST['cedula']);
				// $emp->setRuta_Imagen($foto);
				
				// Empleado
				$emp->setProfesion($_POST['profesion']);
				$emp->setTipo_Cargo($_POST['T_cargo']);
				$emp->setTiempo_Nomina($_POST['T_nomina']);

				// Administrativo (Aún no tiene datos especificos)
				
				$emp->editarAdministrativo();
				break;
			
			// Respuesta en caso aparte
			default:
				header('Location: ../lobby/consultar/personal.php?error');
				break;
		}
		
		// Ficha de contacto
		require('../clases/contacto.php');
		$con = new Contacto();
		
		$con->setCorreo($_POST['correo']);	
		$con->setDireccion($_POST['direccion']);
		$con->setid_Personas($emp->getid_Personas());

		$con->editarContacto();

		// Telefonos
		require('../clases/telefono.php');
		$tel = new Telefono();

		// Telefonos principal, secundario y auxiliar.
		// En ese mismo orden
		$tel->editarTelefono($_POST['pref_P'],$_POST['tel_P'],'P',$con->getid_Contacto());
		$tel->editarTelefono($_POST['pref_S'],$_POST['tel_S'],'S',$con->getid_Contacto());
		$tel->editarTelefono($_POST['pref_A'],$_POST['tel_A'],'A',$con->getid_Contacto());

		header('Location: ../lobby/consultar/personal.php');
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
		header('Location:../lobby/consultar/personal.php');
	}
}
else {
	header('Location:../lobby/index.php');
}

?>