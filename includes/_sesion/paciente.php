<?php
session_start()

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros | Pacientes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <form action="../functions.php" method="POST">
        <br>
        <br>
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <h3 class="text-center">Registra tus datos de paciente</h3>
                    <br>
                    <p>Completa la informacion solicitada para poder registrarte como paciente y agender tu cita con nosotros</p>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombres</label>
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
                                <input type="email" name="correo" id="correo" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="username">Edad</label><br>
                                <input type="number" name="edad" id="edad" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="username">Ocupacion</label><br>
                                <input type="text" name="ocupacion" id="ocupacion" class="form-control">
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
                                <input type="text" name="estado_civil" id="estado_civil" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="username">Peso</label><br>
                                <input type="number" name="peso" id="peso" class="form-control">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="username">Fecha de Nacimiento</label><br>
                                <input type="date" name="nacimiento" id="nacimiento" class="form-control">
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
                                <input type="text" name="enfermedad" id="enfermedad" class="form-control">
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
                         
                            <input type="hidden" name="estado" id="estado" value="Pendiente" class="form-control">
                        </div>



                    <input type="hidden" name="accion" value="insertar_paciente2">
                    <br>

                    <div class="mb-3">

                        <input type="submit" value="Continuar" id="register" class="btn btn-success" name="registrar">
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