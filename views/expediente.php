<?php
session_start();
error_reporting(0);
	$varsesion = $_SESSION['nombre'];

if (!isset($_GET["id"])) {
    echo "<script language='JavaScript'>
    alert('No has seleccionado el registro de un paciente');
    location.assign('pacientes.php');
   </script>";
}
$id = $_GET["id"];
include "../includes/db.php";
$consulta = "SELECT * FROM pacientes WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);

if($resultado -> num_rows > 0){
    foreach($resultado as $key => $fila ){


include "../fpdf/fpdf.php";

$pdf = new FPDF($orientation='P',$unit='mm');
$pdf->AddPage();
$pdf->SetFont('Arial','B',20); 


$pdf->setY(12);
$pdf->setX(80);

$pdf->Cell(60,4,'EXPEDIENTE MEDICO',0,1,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',10);    
$pdf->setY(30);$pdf->setX(10);
$pdf->Cell(60,4,"DATOS DEL PACIENTE:");

$pdf->SetFont('Arial','',10);    
$pdf->setY(35);$pdf->setX(10);
$pdf->Cell(60,4,"Nombres: ". utf8_decode($fila['nombre']));

$pdf->setY(40);$pdf->setX(10);
$pdf->Cell(60,4,"Apellidos: ". utf8_decode($fila['apellidos']));

$pdf->setY(45);$pdf->setX(10);
$pdf->Cell(60,4,"Correo: ". utf8_decode($fila['correo']));

$pdf->setY(50);$pdf->setX(10);
$pdf->Cell(60,4,"Edad: ". utf8_decode($fila['edad']));

$pdf->setY(55);$pdf->setX(10);
$pdf->Cell(60,4,"Ocupacion: ". utf8_decode($fila['ocupacion']));


$pdf->SetFont('Arial','B',10);    
$pdf->setY(30);$pdf->setX(75);


$pdf->SetFont('Arial','',10);    
$pdf->setY(35);$pdf->setX(75);
$pdf->Cell(60,4,"Direccion: ". utf8_decode($fila['direccion']));

$pdf->setY(40);$pdf->setX(75);
$pdf->Cell(60,4,"Estado Civil: ". utf8_decode($fila['estado_civil']));

$pdf->setY(45);$pdf->setX(75);
$pdf->Cell(60,4,"Telefono: ". utf8_decode($fila['telefono']));

$pdf->setY(50);$pdf->setX(75);
$pdf->Cell(60,4,"Fecha Naicmiento: ". utf8_decode($fila['nacimiento']));

$pdf->setY(55);$pdf->setX(75);
$pdf->Cell(60,4,"Familiar Responsable: ". utf8_decode($fila['familiar']));


$pdf->SetFont('Arial','B',10);    
$pdf->setY(30);$pdf->setX(135);
$pdf->Cell(60,4,"NUMERO DE REGISTRO: #".  utf8_decode($fila['id']));

$pdf->SetFont('Arial','',10);    
$pdf->setY(35);$pdf->setX(135);
$pdf->Cell(60,4,"Fecha de Registro: ". utf8_decode($fila['fecha']));

$pdf->SetFont('Arial','',10);    
$pdf->setY(40);$pdf->setX(135);
$pdf->Cell(60,4,"Estado: ". utf8_decode($fila['estado']));


$pdf->setY(45);$pdf->setX(135);
$pdf->Cell(60,4,"");
$pdf->setY(50);$pdf->setX(135);
$pdf->Cell(60,4,"");

/// Apartir de aqui empezamos con la tabla 
$pdf->setY(60);$pdf->setX(135);
    $pdf->Ln(20);

/////////////////////////////
//// Array de Cabecera
$header = array("Tipo_Sangre.", "CURP","Peso","Sexo", "Enfermedad","Alergias" );
//// Arrar
$products = array(
	array("", "",2,"",0),

);
    // Column widths
    $w = array(25, 43, 15, 20, 40, 50);
    // Header
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
    $pdf->Ln();
    // Data
    $total = 0;
    foreach($products as $row)
    {
        $pdf->Cell($w[0],6,utf8_decode($fila['tipo_sangre']),'2',0,'C');
        $pdf->Cell($w[1],6,utf8_decode($fila['curp']),'2',0,'C');
        $pdf->Cell($w[2],6,utf8_decode($fila['peso']),'2',0,'C');
        $pdf->Cell($w[3],6,utf8_decode($fila['sexo']),'2',0,'C');
        $pdf->Cell($w[4],6,utf8_decode($fila['enfermedad']),'2',0,'C');
        $pdf->Cell($w[5],6,utf8_decode($fila['alergias']),'2',0,'C');
        $pdf->Ln();
    }
    }
}
/////////////////////////////



$pdf->setY(120);
$pdf->setX(235);
    $pdf->Ln();
/////////////////////////////

$pdf->SetFont('Arial','B',10);    

$pdf->setY(-50);
$pdf->setX(-190);
$pdf->Cell(60,4,"TERMINOS Y CONDICIONES");
$pdf->SetFont('Arial','',10);    

$pdf->setY(-40);
$pdf->setX(-190);
$pdf->Cell(60,4,"El medico se compromete a mantener su informacion de manera confidencial");
$pdf->setY(-30);
$pdf->setX(-190);
$pdf->Cell(60,4,"EEEE");


$pdf->output();
