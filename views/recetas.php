<?php
error_reporting(0);
session_start();
$actualsesion = $_SESSION['nombre'];

if ($actualsesion == null || $actualsesion == '') {
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
<?php
//if( $actualsesion == "Administrador"){
?>


<body id="page-top">

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Recetas</h6>
                <br>

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#receta">
                    <span class="glyphicon glyphicon-plus"></span> Agregar receta </a></button>


            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Doctor</th>
                                <th>Medicamento</th>
                                <th>Paciente</th>
                                <th>Edad</th>
                                <th>Peso</th>
                                <th>Fecha</th>
                                <th>Diagnostico</th>
                                <th>Acciones</th>
                                <th>PDF</th>
                            </tr>
                        </thead>

                        <?php

                        include "../includes/db.php";
                        $result = mysqli_query($conexion, "SELECT r.id, r.id_doctor, r.id_medicamento, r.id_paciente, r.fecha, r.diagnostico, d.name, m.medicamento, p.nombre, p.edad, p.peso FROM recetas r 
                        INNER JOIN doctor d ON r.id_doctor = d.id INNER JOIN medicamentos m ON r.id_medicamento = m.id INNER JOIN pacientes p 
                        ON r.id_paciente = p.id");
                        while ($fila = mysqli_fetch_assoc($result)) :

                        ?>
                            <tr>
                                <td><?php echo $fila['name']; ?></td>
                                <td><?php echo $fila['medicamento']; ?></td>
                                <td><?php echo $fila['nombre']; ?></td>
                                <td><?php echo $fila['edad']; ?></td>
                                <td><?php echo $fila['peso']; ?></td>
                                <td><?php echo $fila['fecha']; ?></td>
                                <td><?php echo $fila['diagnostico']; ?></td>



                                <td>
                                    <a class="btn btn-warning" href="../includes/editar_receta.php?id=<?php echo $fila['id'] ?> ">
                                        <i class="fa fa-edit "></i> </a>
                                    <a href="../includes/eliminar_receta.php?id=<?php echo $fila['id'] ?> " class="btn btn-danger btn-del">
                                        <i class="fa fa-trash "></i></a></button>
                                </td>
                                <td><a href="receta.php?id=<?php echo $fila['id'] ?> " class="btn btn-outline-danger" target="_blank">
                                        <i class="fa fa-file" aria-hidden="true"></i></a></td>
                            </tr>


                        <?php endwhile; ?>
                        <?php
                        //}

                        ?>
                        </tbody>
                    </table>


                    <script>
                        $('.btn-del').on('click', function(e) {
                            e.preventDefault();
                            const href = $(this).attr('href')

                            Swal.fire({
                                title: 'Estas seguro de eliminar este registro?',
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
                                            'El registro fue eliminado.',
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
    <?php include "../includes/form_receta.php"; ?>

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->




</body>

</html>