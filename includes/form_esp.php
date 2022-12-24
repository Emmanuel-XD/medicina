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
    <div class="modal fade" id="especialidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Nueva Especialidad</h3>
                    <button type="button" class="btn btn-black" data-dismiss="modal">
                        <i class="fa fa-times" aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">

                    <form action="../includes/functions.php" method="POST">
                        <div class="form-group">
                            <label for="nombre" class="form-label">Nombre de la Especialidad*</label>
                            <input type="text" id="especialidad" name="especialidad" class="form-control" required>
                        </div>


                        <input type="hidden" name="accion" value="insertar_esp">
                        <br>

                        <div class="mb-3">

                            <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
                            <a href="especialidades.php" class="btn btn-danger">Cancelar</a>

                        </div>

                </div>

            </div>

            </form>
        </div>


</html>