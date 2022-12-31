<?php

session_start();
error_reporting(0);
	$varsesion = $_SESSION['nombre'];

	if($varsesion== null || $varsesion= ''){

	    header("Location: ./_sesion/login.php");
		die();
	}
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=horarios.xls");
?>
       <table>            
                   <thead>    
                         <tr>
                    
                        <th>Dias de atencion medica</th>
                        <th>Doctor</th>
                        <th>Fecha_Registro</th>
                       
                        </tr>
                        </thead>
                        <tbody>
                        <?php
include "db.php";             
$result=mysqli_query($conexion,"SELECT h.id, h.dias, h.id_doctor, h.fecha, d.name  FROM horario h 
INNER JOIN doctor d ON h.id_doctor = d.id");
while ($fila = mysqli_fetch_assoc($result)):
    
?>
<tr>
<td><?php echo $fila['dias']; ?></td>
<td><?php echo $fila['name']; ?></td>
<td><?php echo $fila['fecha']; ?></td>
<td>
 
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