<?php

session_start();
error_reporting(0);
	$varsesion = $_SESSION['nombre'];

	if($varsesion== null || $varsesion= ''){

	    header("Location: ./_sesion/login.php");
		die();
	}
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=usuarios.xls");
?>
       <table>            
                   <thead>    
                         <tr>
                    
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Contraseña</th>
                        <th>Fecha</th>
                        <th>Rol</th>
                       
                        </tr>
                        </thead>
                        <tbody>
                        <?php
include "db.php";             
$result=mysqli_query($conexion,"SELECT  user.id, user.nombre, user.correo, user.password, user.fecha,
roles.rol FROM user 
LEFT JOIN roles ON user.rol= roles.id ");
while ($fila = mysqli_fetch_assoc($result)):
    
?>
<tr>
<td><?php echo $fila['nombre']; ?></td>
<td><?php echo $fila['correo']; ?></td>
<td><?php echo $fila['password']; ?></td>

<td><?php echo $fila['fecha']; ?></td>
<td><?php echo $fila['rol']; ?></td>
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