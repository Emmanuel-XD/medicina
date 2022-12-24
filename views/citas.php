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
                            <h6 class="m-0 font-weight-bold text-primary">Lista de Citas</h6>
                            <br>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#citas">
				            <span class="glyphicon glyphicon-plus"></span> Agregar cita <i class="fa fa-plus-circle" aria-hidden="true"></i> </a></button>
                            <a href="../includes/r_citas.php" class="btn btn-outline-primary">
                                <i class="fa fa-table" aria-hidden="true"></i> Generar Reporte Excel</a>

                                
                            <a href="../includes/reporte_citas.php" class="btn btn-outline-danger">
                            <i class="fa fa-file" aria-hidden="true"></i>  Generar Reporte PDF</a>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NumCita#</th>
                                            <th>Fecha_Cita</th>
                                            <th>Horario</th>
                                            <th>Paciente</th>
                                            <th>Doctor</th>
                                  

                                            <th>Estado</th>
                                            <th>Fecha_Registro</th>
                                            <th>Acciones..</th>
                                        </tr>
                                    </thead>
                                   
				<?php

include "../includes/db.php";            
$result=mysqli_query($conexion,"SELECT ct.id, ct.fecha, ct.hora, ct.estado, ct.fecha_registro, 
p.nombre, d.name, est.estado FROM citas ct INNER JOIN pacientes p ON ct.id_paciente = p.id 
INNER JOIN doctor d ON ct.id_doctor = d.id LEFT JOIN estado est ON ct.estado = est.id");
while ($fila = mysqli_fetch_assoc($result)):
    
?>
<tr>
<td><?php echo $fila['id']; ?></td>
<td><?php echo $fila['fecha']; ?></td>
<td><?php echo $fila['hora']; ?></td>
<td><?php echo $fila['nombre']; ?></td>
<td><?php echo $fila['name']; ?></td>
<td><?php echo $fila['estado']; ?></td>
<td><?php echo $fila['fecha_registro']; ?></td>

<td>
<a class="btn btn-warning" href="../includes/editar_cita.php?id=<?php echo $fila['id']?> ">
<i  class="fa fa-edit "></i> </a>
<a href="../includes/eliminar_cita.php?id=<?php echo $fila['id']?> " class="btn btn-danger btn-del" >
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
  title: 'Estas seguro de eliminar esta cita?',
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
            
            <?php include "../includes/form_cita.php";?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

 


</body>

</html>