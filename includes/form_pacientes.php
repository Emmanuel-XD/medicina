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
    <div class="modal fade" id="paciente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Agregar un nuevo paciente</h3>
                    <button type="button" class="btn btn-black" data-dismiss="modal">
                        <i class="fa fa-times" aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">

                    <form action="../includes/functions.php" method="POST">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Apellidos</label>
                                    <input type="text" id="apellidos" name="apellidos" class="form-control" required>
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="username">Correo:</label><br>
                                    <input type="email" name="correo" id="correo" class="form-control" >
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="username">Edad</label><br>
                                    <input type="number" name="edad" id="edad" class="form-control" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="username">Ocupacion</label><br>
                                    <input type="text" name="ocupacion" id="ocupacion" class="form-control" >
                                </div>
                            </div>

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
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="username">Estado Civil</label><br>
                                    <input type="text" name="estado_civil" id="estado_civil" class="form-control" >
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="username">Peso</label><br>
                                    <input type="number" name="peso" id="peso" class="form-control" >
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="username">Fecha de Nacimiento</label><br>
                                    <input type="date" name="nacimiento" id="nacimiento" class="form-control" >
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="username">Familiar</label><br>
                                    <input type="text" name="familiar" id="familiar" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="telefono">Telefono:</label><br>
                                    <input type="number" name="telefono" id="telefono" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="username">Direccion</label><br>
                                    <input type="text" name="direccion" id="direccion" class="form-control">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="username">Enfermemedad</label><br>
                                    <input type="text" name="enfermedad" id="enfermedad" class="form-control" >
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="username">Tipo de Sangre</label><br>
                                    <input type="text" name="tipo_sangre" id="tipo_sangre" class="form-control">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="username">Alergias</label><br>
                                    <input type="text" name="alergias" id="alergias" class="form-control">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="username">Curp</label><br>
                                    <input type="text" name="curp" id="curp" class="form-control">
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="pendiente" class="form-label">Estado:</label>
                            <select name="estado" id="estado" class="form-control" required>
                            <option value="">--Selecciona una opcion--</option>
                                <option value="Pendiente">Pendiente</option>
                                <option value="Atendido">Atendido</option>
                            </select>
                        </div>



                        <input type="hidden" name="accion" value="insertar_paciente">
                        <br>

                        <div class="mb-3">

                            <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
                            <a href="pacientes.php" class="btn btn-danger">Cancelar</a>

                        </div>
                </div>
            </div>

            </form>
        </div>
    </div>


</body>

</html>