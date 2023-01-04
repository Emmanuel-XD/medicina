<?php
session_start();
error_reporting(0);
	$varsesion = $_SESSION['nombre'];

if (!isset($_GET["id"])) {
    echo "<script language='JavaScript'>
    alert('No has seleccionado el registro de un paciente');
    location.assign('recetas.php');
   </script>";
}
$id = $_GET["id"];
include "../includes/db.php";
$consulta = "SELECT r.id, r.id_doctor, r.id_medicamento, r.id_paciente, r.fecha, r.diagnostico, d.name, m.medicamento, p.nombre, p.edad, p.peso FROM recetas r 
INNER JOIN doctor d ON r.id_doctor = d.id INNER JOIN medicamentos m ON r.id_medicamento = m.id INNER JOIN pacientes p 
ON r.id_paciente = p.id WHERE r.id = $id";
$resultado = mysqli_query($conexion, $consulta);

if($resultado -> num_rows > 0){
    foreach($resultado as $key => $fila ){

include "../fpdf/fpdf.php";
include "../includes/fecha.php";

$pdf = new FPDF($orientation='P',$unit='mm');
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);    

$pdf->setY(12);
$pdf->setX(75);
// Agregamos los datos del consultorio medico
$pdf-> image('../img/imss.png', 10, 1, 20);  // X, Y, Tamaño
$pdf->Cell(60,4,'RECETA MEDICA' ,0,1,'C' );
$pdf->SetFont('Arial','B',8);    


$pdf->SetFont('Arial','',10);    
$pdf->setY(35);$pdf->setX(10);
$pdf->Cell(60,4,"Numero de Receta: " . utf8_decode($fila['id']));
$pdf->setY(40);$pdf->setX(10);
$pdf->Cell(60,4,"Medico/Doctor: " . utf8_decode($fila['name']));
$pdf->setY(45);$pdf->setX(10);
$pdf->Cell(60,4,"Paciente: " . utf8_decode($fila['nombre']));
$pdf->setY(50);$pdf->setX(10);
$pdf->Cell(60,4,"Edad: " . utf8_decode($fila['edad']));
$pdf->setY(55);$pdf->setX(10);
$pdf->Cell(60,4,"Peso: " . utf8_decode($fila['peso']));
$pdf->setY(60);$pdf->setX(10);
$pdf->Cell(60,4,"Fecha: " .utf8_decode(fecha()));


/// Apartir de aqui empezamos con la tabla de medicamentos
$pdf->setY(60);$pdf->setX(135);
    $pdf->Ln(10);
/////////////////////////////
//// Array de Cabecera
$header = array( "Diagnostico","Medicamento","Medico");
//// Arrar de Productos
$products = array(
	array( "","","",""),

);
    // Column widths
    $w = array(95, 60, 30);
    // Header
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0);
    $pdf->Ln();
    // Data
    $total = 0;
    foreach($products as $row)
    {
        $pdf->Cell($w[0],6,utf8_decode($fila['diagnostico']),'1',0);
        $pdf->Cell($w[1],6,utf8_decode($fila['medicamento']),'1',0);
        $pdf->Cell($w[2],6,utf8_decode($fila['name']),'1',0);
   

        $pdf->Ln();

    }
}
}

$pdf->SetFont('Arial','B',10);  

$pdf->setY(190);
$pdf->setX(85);
$pdf->Cell(60,4,"FIRMA Y SELLO");

$pdf->SetFont('Arial','',10);    
$pdf->setY(180);
$pdf->setX(-150);

$pdf->Cell(60,4,"_________________________________________");

$pdf->setY(200);
$pdf->setX(80);

$pdf->Cell(60,4,"Nombre del Medico/Doctor");
$pdf->setY(250);
$pdf->setX(85);
$pdf->Cell(60,4, "Clinica del IMSS");


$pdf->output();
?>