<?php
// Seguridad de sesiones
session_start();
$typeUser = $_SESSION['rol'];
if($typeUser === '2' || $typeUser ==='1'){
error_reporting(0);
$varsesion = $_SESSION['nombre'];

if ($varsesion == null || $varsesion = '') {

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
<?php include "../includes/header.php"; ?>



<body id="page-top">

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Pacientes</h6>
                <br>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#paciente">
                    <span class="glyphicon glyphicon-plus"></span> Agregar paciente <i class="fa fa-user-plus"></i> </a></button>

                <a href="../includes/r_pacientes.php" class="btn btn-outline-primary">
                    <i class="fa fa-table" aria-hidden="true"></i> Generar Reporte Excel</a>


                <a href="../includes/reporte_paciente.php" class="btn btn-outline-danger">
                    <i class="fa fa-file" aria-hidden="true"></i> Generar Reporte PDF</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                <th>Acciones..</th>
                                <th>Reporte</th>
                            </tr>
                        </thead>

                        <?php

                        include "../includes/db.php";
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


                                <td>
                                    <a class="btn btn-warning" href="../includes/editar_paciente.php?id=<?php echo $fila['id'] ?> ">
                                        <i class="fa fa-edit "></i> </a>
                                    <a href="../includes/eliminar_paciente.php?id=<?php echo $fila['id'] ?> " class="btn btn-danger btn-del">
                                        <i class="fa fa-trash "></i></a></button>
                                </td>

                                <td><a href="expediente.php?id=<?php echo $fila['id'] ?> " class="btn btn-outline-danger" target="_blank">
                                        <i class="fa fa-file" aria-hidden="true"></i></a></td>
                            </tr>


                        <?php endwhile; ?>

                        </tbody>
                    </table>


                    <script>
                        $('.btn-del').on('click', function(e) {
                            e.preventDefault();
                            const href = $(this).attr('href')

                            Swal.fire({
                                title: 'Estas seguro de eliminar este paciente?',
                                text: "¡No podrás revertir esto!!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Si, eliminar!',
                                cancelButtonText: 'Cancelar!',
                            }).then((result) => {
                                if (result.value) {
                                    if (result.isConfirmed) {
                                        Swal.fire(
                                            'Eliminado!',
                                            'El usuario fue eliminado.',
                                            'success'
                                        )
                                    }

                                    document.location.href = href;
                                }
                            })

                        })
                    </script>
                    <script src="../package/dist/sweetalert2.all.js"></script>
                    <script src="../package/dist/sweetalert2.all.min.js"></script>
                    <script src="../package/jquery-3.6.0.min.js"></script>



                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php include "../includes/footer.php"; ?>

    <?php include "../includes/form_pacientes.php"; ?>

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->




</body>

</html>
<?php }
else {
?>
<div id="notAllow" ></div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script  src="../js/not-allowed.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><?php
}?>