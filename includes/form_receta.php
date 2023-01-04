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
    <div class="modal fade" id="receta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Agregar nueva receta
                    </h3>
                    <button type="button" class="btn btn-black" data-dismiss="modal">
                        <i class="fa fa-times" aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">

                    <form action="../includes/functions.php" method="POST">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>Doctor</label>
                                    <select class="form-control" id="id_doctor" name="id_doctor">
                                        <option value="0">--Selecciona una opcion--</option>
                                        <?php

                                        include("db.php");
                                        //Codigo para mostrar categorias desde otra tabla
                                        $sql = "SELECT * FROM doctor ";
                                        $resultado = mysqli_query($conexion, $sql);
                                        while ($consulta = mysqli_fetch_array($resultado)) {
                                            echo '<option value="' . $consulta['id'] . '">' . $consulta['name'] . '</option>';
                                        }

                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>Medicamento</label>
                                    <select class="form-control" id="id_medicamento" name="id_medicamento">
                                        <option value="0">--Selecciona una opcion--</option>
                                        <?php

                                        include("db.php");
                                        //Codigo para mostrar categorias desde otra tabla
                                        $sql = "SELECT * FROM medicamentos ";
                                        $resultado = mysqli_query($conexion, $sql);
                                        while ($consulta = mysqli_fetch_array($resultado)) {
                                            echo '<option value="' . $consulta['id'] . '">' . $consulta['medicamento'] . '</option>';
                                        }

                                        ?>


                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>Paciente</label>
                                    <select class="form-control" id="id_paciente" name="id_paciente">
                                        <option value="0">--Selecciona una opcion--</option>
                                        <?php

                                        include("db.php");
                                        //Codigo para mostrar categorias desde otra tabla
                                        $sql = "SELECT * FROM pacientes ";
                                        $resultado = mysqli_query($conexion, $sql);
                                        while ($consulta = mysqli_fetch_array($resultado)) {
                                            echo '<option value="' . $consulta['id'] . '">' . $consulta['nombre'] . '</option>';
                                        }

                                        ?>


                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="username">Fecha de registro:</label><br>
                                    <input type="date" name="fecha" id="fecha" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mensaje" class="form-label">Diagnostico:</label>
                            <textarea class="form-control" name="diagnostico" cols="30" rows="5" type="text" id="diagnostico" placeholder="Diagnostico Medico..." required></textarea>
                        </div>






                        <input type="hidden" name="accion" value="insertar_receta">


                        <br>

                        <div class="mb-3">

                            <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
                            <a href="recetas.php" class="btn btn-danger">Cancelar</a>

                        </div>
                </div>
            </div>

            </form>
        </div>
    </div>




</html>