<?php  

require('conexion.php');
require('../clases/docente.php');
require('../clases/calculos.php');


//File Name
$archivoExcel = "Reporte de docentes";         


// Consulta de todos los docentes
$doc = new Docente();
$calc = new Calculo();

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
echo utf8_decode("Horas académicas").$separador;
echo utf8_decode("Tiempo en nomina<").$separador;
echo utf8_decode("Área").$separador;

print("\n");    
// Contenido de la consulta

foreach ($lista_doc as $Docente) {
	echo utf8_decode($Docente['Nombre']).$separador;
	echo utf8_decode($Docente['Apellido']).$separador;
	echo utf8_decode($Docente['Cedula']).$separador;
	echo utf8_decode($Docente['Fecha_Nac']).$separador;
	echo utf8_decode($Docente['Horas_Clase_S']." Horas semanales").$separador;
	echo utf8_decode($calc->diferenciaF($Docente['Fecha_Ingreso'])).$separador;
	echo utf8_decode($Docente['Area']).$separador;
	print("\n");    
}

;?>