<?php  

require('conexion.php');
require('../clases/docente.php');


//File Name
$archivoExcel = "Reporte de docentes";         


// Consulta de todos los docentes
$doc = new Docente();

$lista_doc = $doc->mostrar();

//header info for browser
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$archivoExcel.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");

/*******Start of Formatting for Excel*******/   
//define separator (defines columns in excel & tabs in word)

$separador = "\t"; //tabbed character

// Columnas de titulo
echo utf8_decode("Nombre").$separador;
echo utf8_decode("Apellido").$separador;
echo utf8_decode("Cédula").$separador;
echo utf8_decode("Fecha de nacimiento").$separador;
echo utf8_decode("Profesión").$separador;
echo utf8_decode("Tipo de cargo").$separador;
echo utf8_decode("Horas académicas").$separador;
echo utf8_decode("Área").$separador;

print("\n");    
// Contenido de la consulta

foreach ($lista_doc as $Docente) {
	echo utf8_decode($Docente['Nombre']).$separador;
	echo utf8_decode($Docente['Apellido']).$separador;
	echo utf8_decode($Docente['Cedula']).$separador;
	echo utf8_decode($Docente['Fecha_Nac']).$separador;
	echo utf8_decode($Docente['Profesion']).$separador;
	echo utf8_decode($Docente['Tipo_Cargo']).$separador;
	echo utf8_decode($Docente['Hrs_Academicas']).$separador;
	echo utf8_decode($Docente['Area']).$separador;
	print("\n");    
}

;?>