<?php


session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

	if($varsesion== null || $varsesion= ''){
     header("Location: _sesion/login.php");
	
	}
require('../fpdf/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->image('../img/logo.png', 150, 1, 40); // X, Y, Tamaño
    $this->Ln(20);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
  
    // Movernos a la derecha
    $this->Cell(60);

    // Título
    $this->Cell(70,10,'Reporte de Medicos',0,0,'C');
    // Salto de línea
   
    $this->Ln(30);
    $this->SetFont('Arial','B',10);
    $this->SetX(5);
    $this->Cell(20,10,'Folio#',1,0,'C',0);
    $this->Cell(30,10,'Doctor',1,0,'C',0);
    $this->Cell(35,10,'Especialidades',1,0,'C',0,);
    $this->Cell(20,10,'Sexo',1,0,'C',0);
    $this->Cell(27,10,'Telefono',1,0,'C',0);
    $this->Cell(25,10,'Nacimiento',1,0,'C',0);
    $this->Cell(45,10,'Correo',1,1,'C',0);

	

  
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
  
    $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
   //$this->SetFillColor(223, 229,235);
    //$this->SetDrawColor(181, 14,246);
    //$this->Ln(0.5);
}
}

include "db.php";  
$consulta = "SELECT * FROM doctor";
$resultado = mysqli_query($conexion, $consulta);

$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
//$pdf->SetWidths(array(10, 30, 27, 27, 20, 20, 20, 20, 22));
while ($row=$resultado->fetch_assoc()) {

    $pdf->SetX(5);

    $pdf->Cell(20,10,$row['cedula'],1,0,'C',0);
    $pdf->Cell(30,10,$row['nombre'],1,0,'C',0);
    $pdf->Cell(35,10,$row['especialidad'],1,0,'C',0);
    $pdf->Cell(20,10, $row['sexo'],1,0,'C',0);
    $pdf->Cell(27,10, $row['telefono'],1,0,'C',0);
    $pdf->Cell(25,10, $row['fecha'],1,0,'C',0);
    $pdf->Cell(45,10, $row['correo'],1,1,'C',0);

	


} 


	$pdf->Output();
?>