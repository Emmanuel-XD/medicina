<?php

session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

if ($varsesion == null || $varsesion = '') {

  header("Location: ./_sesion/login.php");
  die();
}
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=citas.xls");
?>
<table>
  <thead>
    <tr>
      <th>NumCita#</th>
      <th>Fecha_Cita</th>
      <th>Horario</th>
      <th>Paciente</th>
      <th>Doctor</th>
      <th>Estado</th>
      <th>Fecha_Registro</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "db.php";
    $result = mysqli_query($conexion, "SELECT ct.id, ct.fecha, ct.hora, ct.estado, ct.fecha_registro, 
    p.nombre, d.name, est.estado FROM citas ct INNER JOIN pacientes p ON ct.id_paciente = p.id 
    INNER JOIN doctor d ON ct.id_doctor = d.id LEFT JOIN estado est ON ct.estado = est.id");
    while ($fila = mysqli_fetch_assoc($result)) :

    ?>
      <tr>
        <td><?php echo $fila['id']; ?></td>
        <td><?php echo $fila['fecha']; ?></td>
        <td><?php echo $fila['hora']; ?></td>
        <td><?php echo $fila['nombre']; ?></td>
        <td><?php echo $fila['name']; ?></td>
        <td><?php echo $fila['estado']; ?></td>
        <td><?php echo $fila['fecha_registro']; ?></td>

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