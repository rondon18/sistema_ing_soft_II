<?php  

require('conexion.php');
require('../clases/docente.php');

require('../fpdf185/fpdf.php');


// Consulta de todos los docentes
$doc = new Docente();

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
$pdf->Cell(60,7,utf8_decode("Profesión"),1);
$pdf->Cell(60,7,utf8_decode("Tipo de cargo"),1);
$pdf->Cell(40,7,utf8_decode("Horas académicas"),1);
$pdf->Cell(60,7,utf8_decode("Área"),1);
$pdf->Ln();


$pdf->SetFont('Arial','',10);
foreach ($lista_doc as $Docente) {
	$pdf->Cell(25,7,utf8_decode($Docente['Nombre']),1);
	$pdf->Cell(25,7,utf8_decode($Docente['Apellido']),1);
	$pdf->Cell(25,7,utf8_decode($Docente['Cedula']),1);
	$pdf->Cell(40,7,utf8_decode($Docente['Fecha_Nac']),1);
	$pdf->Cell(60,7,utf8_decode($Docente['Profesion']),1);
	$pdf->Cell(60,7,utf8_decode($Docente['Tipo_Cargo']),1);
	$pdf->Cell(40,7,utf8_decode($Docente['Hrs_Academicas']." Horas"),1);
	$pdf->Cell(60,7,utf8_decode($Docente['Area']),1);
	$pdf->Ln();
}


$pdf->Output();

?>