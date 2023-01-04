<?php


session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

if ($varsesion == null || $varsesion = '') {
    header("Location: _sesion/login.php");
}
?>


<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <link rel="stylesheet" href="../package/dist/sweetalert2.css">

</head>

<body id="page-top">
    <div class="modal fade" id="medicamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Agregar un nuevo medicamento 
                    </h3>
                    <button type="button" class="btn btn-black" data-dismiss="modal">
                        <i class="fa fa-times" aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">

                    <form action="../includes/functions.php" method="POST">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="folio" class="form-label">Caducidad</label>
                                    <input type="date" id="caducidad" name="caducidad" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Medicamento</label>
                                    <input type="text" id="medicamento" name="medicamento" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Marca</label>
                                    <input type="text" id="marca" name="marca" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="username">Cantidad:</label><br>
                                    <input type="number" name="cantidad" id="cantidad" class="form-control" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                <label>Fecha de entrada</label>
                                <input type="date" name="entrada" id="entrada" class="form-control">
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>Fecha de salida</label>
                                    <input type="date" name="salida" id="salida" class="form-control">
                                </div>
                            </div>
                        </div>


                      



                        <input type="hidden" name="accion" value="insertar_medicamento">


                        <br>

                        <div class="mb-3">

                            <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
                            <a href="medicamentos.php" class="btn btn-danger">Cancelar</a>

                        </div>
                </div>
            </div>

            </form>
        </div>
    </div>




</html>