<?php  

require('conexion.php');
require('../clases/docente.php');
require('../clases/calculos.php');

require('../fpdf185/fpdf.php');


// Consulta de todos los docentes
$doc = new Docente();

$calc = new Calculo();

$lista_doc = $doc->mostrar();

$pdf = new FPDF();

$pdf->SetFont('Arial','',14);
$pdf->AddPage('L','Legal');

$pdf->SetTitle('Reporte de docentes');

$pdf->Write(7,'Docentes registrados en el sistema');
$pdf->Ln(20);

$pdf->SetFont('Arial','B',10);
// Cabecera
$pdf->Cell(25,7,utf8_decode("Nombre"),1);
$pdf->Cell(25,7,utf8_decode("Apellido"),1);
$pdf->Cell(25,7,utf8_decode("Cédula"),1);
$pdf->Cell(40,7,utf8_decode("Fecha de nacimiento"),1);
$pdf->Cell(60,7,utf8_decode("Horas académicas"),1);
$pdf->Cell(60,7,utf8_decode("Tiempo en nomina"),1);
$pdf->Cell(40,7,utf8_decode("Área"),1);
$pdf->Ln();


$pdf->SetFont('Arial','',10);
foreach ($lista_doc as $Docente) {
	$pdf->Cell(25,7,utf8_decode($Docente['Nombre']),1);
	$pdf->Cell(25,7,utf8_decode($Docente['Apellido']),1);
	$pdf->Cell(25,7,utf8_decode($Docente['Cedula']),1);
	$pdf->Cell(40,7,utf8_decode($Docente['Fecha_Nac']),1);
	$pdf->Cell(60,7,utf8_decode($Docente['Horas_Clase_S']." Horas semanales"),1);
	$pdf->Cell(60,7,utf8_decode($calc->diferenciaF($Docente['Fecha_Ingreso'])),1);
	$pdf->Cell(40,7,utf8_decode($Docente['Area']),1);
	$pdf->Ln();
}


$pdf->Output();

?>