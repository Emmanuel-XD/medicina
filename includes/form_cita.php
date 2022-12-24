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
    <div class="modal fade" id="citas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Agregar nueva cita<?php echo $fila['nombre']; ?>
                    </h3>
                    <button type="button" class="btn btn-black" data-dismiss="modal">
                        <i class="fa fa-times" aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">

                    <form action="../includes/functions.php" method="POST">
                        <div class="form-group">
                            <label for="fecha" class="form-label">Fecha*</label>
                            <input type="date" id="fecha" name="fecha" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="hora" class="form-label">Hora*</label>
                            <input type="time" id="hora" name="hora" class="form-control" required>
                        </div>

                        <div class="form-group ">
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

                        <div class="form-group ">
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




                        <div class="form-group">
                            <label for="pendiente" class="form-label">Estado:</label>
                            <select name="estado" id="estado" class="form-control" required>
                                <option value="">--Selecciona una opcion--</option>
                                <option value="1">Atendido</option>
                                <option value="2">Pendiente</option>
                            </select>
                        </div>

                        <input type="hidden" name="accion" value="insertar_cita">

                        <br>

                        <div class="mb-3">

                            <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
                            <a href="citas.php" class="btn btn-danger">Cancelar</a>

                        </div>
                </div>
            </div>

            </form>
        </div>
    </div>



</body>

</html>