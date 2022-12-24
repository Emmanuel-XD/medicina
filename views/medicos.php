<?php
// Seguridad de sesiones
session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

	if($varsesion== null || $varsesion= ''){

	    header("Location: ../includes/_sesion/login.php");
	die();
	} 
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="../js/jquery.min.js"></script>

</head>
<?php include "../includes/header.php";?>



<body id="page-top">

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de Doctores</h6>
                            <br>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#doctor">
				            <span class="glyphicon glyphicon-plus"></span> Agregar doctor <i class="fa fa-user-md" aria-hidden="true"></i></a></button>
	
                            <a href="../includes/r_doctor.php" class="btn btn-outline-primary">
                                <i class="fa fa-table" aria-hidden="true"></i> Generar Reporte Excel</a>

                                
                            <a href="../includes/reporte_medic.php" class="btn btn-outline-danger">
                            <i class="fa fa-file" aria-hidden="true"></i>  Generar Reporte PDF</a>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id#</th>
                                            <th>Cedula</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Correo</th>
                                            <th>Horario</th>
                                            <th>Especialidad</th>
                                            <th>Sexo</th>
                                            <th>Telefono#</th>
                                            <th>Direccion</th>
                                            <th>Fecha_Nacimiento</th>
                                
                                            <th>Fecha_Registro</th>
                                            <th>Acciones..</th>
                                        </tr>
                                    </thead>
                                   
				<?php

include "../includes/db.php";             
$result=mysqli_query($conexion,"SELECT d.id, d.cedula, d.name, d.apellidos,d.correo, d.sexo, d.telefono, 
d.direccion, d.fecha, d.fecha_registro, esp.especialidad, h.dias FROM doctor d LEFT JOIN especialidades esp 
ON d.id_especialidad = esp.id LEFT JOIN horario h ON d.id_horario = h.id");
while ($fila = mysqli_fetch_assoc($result)):
    
?>
<tr>
<td><?php echo $fila['id']; ?></td>
<td><?php echo $fila['cedula']; ?></td>
<td><?php echo $fila['name']; ?></td>
<td><?php echo $fila['apellidos']; ?></td>
<td><?php echo $fila['correo']; ?></td>
<td><?php echo $fila['dias']; ?></td>
<td><?php echo $fila['especialidad']; ?></td>
<td><?php echo $fila['sexo']; ?></td>
<td><?php echo $fila['telefono']; ?></td>
<td><?php echo $fila['direccion']; ?></td>
<td><?php echo $fila['fecha']; ?></td>

<td><?php echo $fila['fecha_registro']; ?></td>

<td>
<a class="btn btn-warning" href="../includes/editar_doctor.php?id=<?php echo $fila['id']?> ">
<i  class="fa fa-edit "></i> </a>
<a href="../includes/eliminar_doctor.php?id=<?php echo $fila['id']?> " class="btn btn-danger btn-del" >
<i  class="fa fa-trash "></i></a></button>
</td>
</tr>


<?php endwhile;?>

                                    </tbody>
                                </table>

                                
   <script>
  $('.btn-del').on('click', function(e){
e.preventDefault();
const href = $(this).attr('href')

Swal.fire({
  title: 'Estas seguro de eliminar a este doctor?',
  text: "¡No podrás revertir esto!!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, eliminar!', 
  cancelButtonText: 'Cancelar!', 
}).then((result)=>{
    if(result.value){
        if (result.isConfirmed) {
    Swal.fire(
      'Eliminado!',
      'El usuario fue eliminado.',
      'success'
    )
  }

        document.location.href= href;
    }   
})

    })
</script>




                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include "../includes/footer.php";?>
            
            <?php include "../includes/form_doctor.php";?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

 


</body>

</html>