<?php
session_start()

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | Cita</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <form action="../includes/functions.php" method="POST">
        <br>
        <br>
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <h3 class="text-center">Agenda tu cita</h3>
                    <br>
                    <p>Tu informacion debe estar registrada en nuestra base de datos. Ahora ya puedes registrar tu cita</p>

                    <p><b>NOTA:</b> Nuestro horario de atencion es de 07:00 - 17:00 de lunes a viernes</p>
                    <br>
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

                            include("../includes/db.php");
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

                            include("../includes/db.php");
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
                        <input type="hidden" name="estado" id="estado" value="1" class="form-control">
                    </div>

                    <input type="hidden" name="accion" value="insertar_cita2">

                    <br>


                    <div class="mb-3">

                        <input type="submit" value="Finalizar" id="register" class="btn btn-success" name="registrar">
                        <a href="../../index.php" class="btn btn-danger">Regresar</a>

                    </div>
                </div>
            </div>

    </form>
    </div>
    </div>


</body>

</html>
</body>

</html>