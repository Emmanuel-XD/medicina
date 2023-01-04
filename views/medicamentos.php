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
                <h6 class="m-0 font-weight-bold text-primary">Lista de Medicamentos</h6>
                <br>

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#medicamento">
                    <span class="glyphicon glyphicon-plus"></span> Agregar medicamento </a></button>


            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Caducidad</th>
                                <th>Nombre</th>
                                <th>Marca</th>
                                <th>Cantidad</th>
                                <th>Fechada_entrada</th>
                                <th>Fecha_salida</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <?php

                        include "../includes/db.php";
                        $result = mysqli_query($conexion, "SELECT * FROM medicamentos");
                        while ($fila = mysqli_fetch_assoc($result)) :

                        ?>
                            <tr>
                                <td><?php echo $fila['caducidad']; ?></td>
                                <td><?php echo $fila['medicamento']; ?></td>
                                <td><?php echo $fila['marca']; ?></td>
                                <td><?php echo $fila['cantidad']; ?></td>
                                <td><?php echo $fila['entrada']; ?></td>
                                <td><?php echo $fila['salida']; ?></td>



                                <td>
                                    <a class="btn btn-warning" href="../includes/editar_medicamento.php?id=<?php echo $fila['id'] ?> ">
                                        <i class="fa fa-edit "></i> </a>
                                    <a href="../includes/eliminar_medicamento.php?id=<?php echo $fila['id'] ?> " class="btn btn-danger btn-del">
                                        <i class="fa fa-trash "></i></a></button>
                                </td>
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
                                title: 'Estas seguro de eliminar este usuario?',
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
    <?php include "../includes/form_medicamento.php"; ?>

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->




</body>

</html>