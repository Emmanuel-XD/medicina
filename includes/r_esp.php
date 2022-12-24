<?php

session_start();
error_reporting(0);
	$varsesion = $_SESSION['nombre'];

	if($varsesion== null || $varsesion= ''){

	    header("Location: ./_sesion/login.php");
		die();
	}
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=especialidades.xls");
?>
       <table>            
                   <thead>    
                         <tr>
                    
                        <th>Especialidad Medica</th>
                        <th>Fecha_Registro</th>
                       
                        </tr>
                        </thead>
                        <tbody>
                        <?php
include "db.php";             
$result=mysqli_query($conexion,"SELECT * FROM especialidades ");
while ($fila = mysqli_fetch_assoc($result)):
    
?>
<tr>
<td><?php echo $fila['nombre']; ?></td>

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