<?php 
require_once('db.php');
if($_SERVER['REQUEST_METHOD'] !='POST'){
    echo "<script> alert('Error: No hay datos para guardar.'); location.replace('../views/calendario.php') </script>";
    $conexion->close();
    exit;
}
extract($_POST);
$allday = isset($allday);

if(empty($id)){
    $consulta = "INSERT INTO `citas` (`fecha`,`hora`,`id_paciente`,`id_doctor`,`estado`) VALUES ('$fecha','$hora','$id_paciente','$id_doctor', '$estado')";
}else{
    $consulta = "INSERT INTO `citas` (`fecha`,`hora`,`id_paciente`,`id_doctor`,`estado`) VALUES ('$fecha','$hora','$id_paciente','$id_doctor', '$estado')";
}
$guardar = $conexion->query($consulta);
if($guardar){
    echo "<script> alert('El registro se guardo correctamente.'); location.replace('../views/calendario.php') </script>";
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$conexion->error."<br>";
    echo "SQL: ".$consulta."<br>";
    echo "</pre>";
}
$conexion->close();
?>