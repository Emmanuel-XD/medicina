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
    <div class="modal fade" id="doctor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Agregar un nuevo doctor 
                    </h3>
                    <button type="button" class="btn btn-black" data-dismiss="modal">
                        <i class="fa fa-times" aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">

                    <form action="../includes/functions.php" method="POST">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="folio" class="form-label">Cedula</label>
                                    <input type="number" id="cedula" name="cedula" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" id="name" name="name" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Apellidos</label>
                                    <input type="text" id="apellidos" name="apellidos" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="username">Correo:</label><br>
                                    <input type="email" name="correo" id="correo" class="form-control" placeholder="No se puede repetir con alguno de la lista...">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                <label>Horario</label>
                                    <select class="form-control" id="id_horario" name="id_horario">
                                        <option value="0">--Selecciona una opcion--</option>
                                        <?php

                                        include("db.php");
                                        //Codigo para mostrar categorias desde otra tabla
                                        $sql = "SELECT * FROM horario ";
                                        $resultado = mysqli_query($conexion, $sql);
                                        while ($consulta = mysqli_fetch_array($resultado)) {
                                            echo '<option value="' . $consulta['id'] . '">' . $consulta['dias'] . '</option>';
                                        }

                                        ?>


                                    </select>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>Especialidad</label>
                                    <select class="form-control" id="id_especialidad" name="id_especialidad">
                                        <option value="0">--Selecciona una opcion--</option>
                                        <?php

                                        include("db.php");
                                        //Codigo para mostrar categorias desde otra tabla
                                        $sql = "SELECT * FROM especialidades ";
                                        $resultado = mysqli_query($conexion, $sql);
                                        while ($consulta = mysqli_fetch_array($resultado)) {
                                            echo '<option value="' . $consulta['id'] . '">' . $consulta['especialidad'] . '</option>';
                                        }

                                        ?>


                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="sexo" class="form-label">Sexo:</label>
                                    <select name="sexo" id="sexo" class="form-control" required>
                                        <option value="">--Selecciona una opcion--</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="telefono">Telefono</label><br>
                                    <input type="number" name="telefono" id="telefono" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="telefono">Direccion</label><br>
                                    <input type="text" name="direccion" id="direccion" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="fecha">Fecha de nacimiento</label><br>
                                    <input type="date" name="fecha" id="fecha" class="form-control" required>
                                </div>
                            </div>
                        </div>



                        <input type="hidden" name="accion" value="insertar_doctor">


                        <br>

                        <div class="mb-3">

                            <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
                            <a href="medicos.php" class="btn btn-danger">Cancelar</a>

                        </div>
                </div>
            </div>

            </form>
        </div>
    </div>




</html>