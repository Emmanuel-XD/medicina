<?php


session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

if ($varsesion == null || $varsesion = '') {
    header("Location: ../../index.php");
}
?>

<body id="page-top">
    <div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Iniciar Sesion</h3>
                    <button type="button" class="btn bg-success" data-dismiss="modal">
                        <i class="fa fa-times" aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">

                    <form id="formAdmin">
                        <div class="alerts">
                        </div>
                        <div class="form-group">
                            <label for="nombre" class="form-label">Correo </label>
                            <input type="email" name="nombre" id="correoAdmin" class="logininp form-control" required>
                        </div>

                        <br>

                        <div class="form-group">
                            <label for="password">Contraseña:</label><br>
                            <input type="password" name="password" id="passwordAdmin" class="logininp form-control" required>
                            <a href="includes/recovery.php">¿Olvido su contraseña?</a>
                        </div>
                        <br>

                        <div class="mb-3">
                            <center>
                                <input type="button" value="Acceder" id="loginAdmin" class=" btn bg-success text-white" name="registrar">
                                <br>


                            </center>

                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>