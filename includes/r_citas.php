<?php

session_start();
error_reporting(0);
	$varsesion = $_SESSION['nombre'];

	if($varsesion== null || $varsesion= ''){

	    header("Location: ./_sesion/login.php");
		die();
	}
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=citas.xls");
?>
       <table>            
                   <thead>    
                         <tr>
                        <th>NumCitas#</th>   
                        <th>Fecha_Cita</th>
                        <th>Horario</th>
                        <th>Paciente</th>
                        <th>Doctor</th>
                        <th>Especialidad</th>
                        <th>Observacion</th>
                        <th>Estado</th>
                        <th>Fecha_Registro</th>
                       
                        </tr>
                        </thead>
                        <tbody>
                        <?php
include "db.php";             
$result=mysqli_query($conexion,"SELECT * FROM citas ");
while ($fila = mysqli_fetch_assoc($result)):
    
?>
<tr>
<td><?php echo $fila['id']; ?></td>
<td><?php echo $fila['fecha']; ?></td>
<td><?php echo $fila['hora']; ?></td>
<td><?php echo $fila['paciente']; ?></td>
<td><?php echo $fila['doctor']; ?></td>
<td><?php echo $fila['especialidad']; ?></td>
<td><?php echo $fila['observacion']; ?></td>
<td><?php echo $fila['estado']; ?></td>
<td><?php echo $fila['fecha_registro']; ?></td>
 
    </div>
  </a>
  <a></a>

    </div>
  </a>
</td>
</tr>


<?php endwhile;?>
                         </tbody>
                         </table>
</div>