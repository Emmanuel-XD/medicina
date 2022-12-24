<?php include "../includes/header.php";?>
<?php include "../includes/db.php";?>

<?php
error_reporting(0);
session_start();
$actualsesion = $_SESSION['nombre'];

if($actualsesion == null || $actualsesion == ''){


}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado de cita</title>
</head>
<body>
<div class="container">
<h1 class="text-center">Tu informacion <?php echo $_SESSION['nombre']; ?></h1>

<div class="col-sm-12">
<div class="table-responsive">


<table class="table table-striped table-hover">
<thead>

<tr>
<th>Nombre</th>
<th>Usuario</th>
<th>Rol</th>
<th>registro</th>


</tr>

</thead>

<tbody>

<?php

$sql = "SELECT u.correo, p.nombre, ct.fecha, d.name FROM user u LEFT JOIN pacientes P ON u.id = p.id_user
LEFT JOIN citas ct ON ct.id_paciente = p.id LEFT JOIN doctor d ON ct.id_doctor = d.id   WHERE nombre ='$actualsesion'";
$usuarios = mysqli_query($conexion, $sql);
if($usuarios -> num_rows > 0){
foreach($usuarios as $key => $fila ){




?>

<tr>
<td><?php echo $fila['nombre']; ?></td>
<td><?php echo $fila['fecha']; ?></td>
<td><?php echo $fila['rol']; ?></td>
<td><?php echo $fila['fecha']; ?></td>
</tr>


<?php
}
}else{

    ?>
    <tr class="text-center">
    <td colspan="4">No existe registros</td>
    </tr>

    <?php
}?>
</tbody>

</table>
</div>
</body>
<?php include "../includes/footer.php";?>
</html>