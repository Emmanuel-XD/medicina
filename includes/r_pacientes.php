<?php

session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

if ($varsesion == null || $varsesion = '') {

  header("Location: ./_sesion/login.php");
  die();
}
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=pacientes.xls");
?>
<table>
  <thead>
    <tr>
      <th>Id#</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Correo</th>
      <th>Edad</th>
      <th>Ocupacion</th>
      <th>Sexo</th>
      <th>Estado_civil</th>
      <th>Peso</th>
      <th>Fecha_nacimiento</th>
      <th>Familia Responsable</th>
      <th>Telefono#</th>
      <th>Direccion</th>
      <th>Enfermedad</th>
      <th>Tipo_sangre</th>
      <th>Alergias</th>
      <th>Curp</th>
      <th>Estado</th>
      <th>Fecha_Registro</th>

    </tr>
  </thead>
  <tbody>
    <?php
    include "db.php";
    $result = mysqli_query($conexion, "SELECT * FROM pacientes ");
    while ($fila = mysqli_fetch_assoc($result)) :

    ?>
      <tr>
        <td><?php echo $fila['id']; ?></td>
        <td><?php echo $fila['nombre']; ?></td>
        <td><?php echo $fila['apellidos']; ?></td>
        <td><?php echo $fila['correo']; ?></td>
        <td><?php echo $fila['edad']; ?></td>
        <td><?php echo $fila['ocupacion']; ?></td>
        <td><?php echo $fila['sexo']; ?></td>
        <td><?php echo $fila['estado_civil']; ?></td>
        <td><?php echo $fila['peso']; ?></td>
        <td><?php echo $fila['nacimiento']; ?></td>
        <td><?php echo $fila['familiar']; ?></td>
        <td><?php echo $fila['telefono']; ?></td>
        <td><?php echo $fila['direccion']; ?></td>
        <td><?php echo $fila['enfermedad']; ?></td>
        <td><?php echo $fila['tipo_sangre']; ?></td>
        <td><?php echo $fila['alergias']; ?></td>
        <td><?php echo $fila['curp']; ?></td>
        <td><?php echo $fila['estado']; ?></td>
        <td><?php echo $fila['fecha']; ?></td>

        </div>
        </a>
        <a></a>

        </div>
        </a>
        </td>
      </tr>


    <?php endwhile; ?>
  </tbody>
</table>
</div>