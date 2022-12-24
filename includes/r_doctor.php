<?php

session_start();
error_reporting(0);
	$varsesion = $_SESSION['nombre'];

	if($varsesion== null || $varsesion= ''){

	    header("Location: ./_sesion/login.php");
		die();
	}
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=doctores.xls");
?>
       <table>            
                   <thead>    
                         <tr>
                    
                        <th>Folio#</th>
                        <th>Nombre</th>
                        <th>Especialid</th>
                        <th>Sexo</th>
                        <th>Telefono#</th>
                        <th>Fecha_Nacimiento</th>
                        <th>Correo</th>
                        <th>Fecha_Registro</th>
                       
                        </tr>
                        </thead>
                        <tbody>
                        <?php
include "db.php";             
$result=mysqli_query($conexion,"SELECT * FROM doctor ");
while ($fila = mysqli_fetch_assoc($result)):
    
?>
<tr>
<td><?php echo $fila['cedula']; ?></td>
<td><?php echo $fila['nombre']; ?></td>
<td><?php echo $fila['especialidad']; ?></td>
<td><?php echo $fila['sexo']; ?></td>
<td><?php echo $fila['telefono']; ?></td>
<td><?php echo $fila['fecha']; ?></td>
<td><?php echo $fila['correo']; ?></td>
<td><?php echo $fila['fecha_registro']; ?></td>

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