<?php
session_start();
if (!$_SESSION['verified'] || !$_SESSION['status']) {
    header('location: ../index.php');
    session_destroy();
}
if ($_SESSION['status']) {
    if ($_SESSION['status'] === '1' || $_SESSION['status'] === '3' || $_SESSION['status'] === '4' || $_SESSION['status'] === '5' || $_SESSION['status'] === '0' || $_SESSION['verified'] === 'false') {
        header('location: ../includes/statusValidator.php');
        die();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros | Pacientes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <script src="../js/jquery-3.6.0.min.js"></script>
</head>
<style>
    body {
        background-color: #f2f2f2;
    }

    .container {
        margin-top: 50px;
    }

    #login-box {
        background-color: #ffffff;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    h3 {
        color: #333333;
        font-family: Arial, sans-serif;
        font-size: 24px;
        font-weight: bold;
        text-align: center;
    }

    p {
        color: #666666;
        font-family: Arial, sans-serif;
        font-size: 16px;
        text-align: center;
        margin-top: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        font-weight: bold;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .form-control:focus {
        outline: none;
        box-shadow: 0 0 5px #b4d5ff;
    }

    .btn {
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
        color: #ffffff;
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
        color: #ffffff;
    }

    .btn-success:hover,
    .btn-danger:hover {
        opacity: 0.8;
    }

    .text-center {
        text-align: center;
    }

    .justify-content-center {
        justify-content: center;
    }

    .align-items-center {
        align-items: center;
    }

    .row {
        margin-bottom: 20px;
    }

    .col-sm-6 {
        margin-bottom: 20px;
    }
</style>
<body>

    <form action="../includes/functions.php" method="POST">
        <br>
        <br>
        <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <h3 class="text-center">Registra tus datos de paciente</h3>
                    <br>
                    <p>Completa la información solicitada para poder registrarte como paciente y agendar tu cita con nosotros</p>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombres:</label>
                                <input type="text" id="nombre" name="nombre" autocapitalize="words" oninput="validarTexto(this, '[a-záéíóúñ ]')" class="form-control" required>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Apellidos:</label>
                                <input type="text" id="apellidos" name="apellidos" autocapitalize="words" oninput="validarTexto(this, '[a-záéíóúñ ]')" class="form-control" required>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            <div class="mb-3">
                                <label for="username" class="form-label">Edad:</label><br>
                                <input type="text" name="edad" id="edad" class="form-control" readonly required>
                            </div>
                        </div>
                     
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="username" class="form-label">Ocupacion</label><br>
                                <input type="text" name="ocupacion" id="ocupacion" class="form-control" required>
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
                                <label for="username" class="form-label">Estado Civil:</label><br>

                                <select name="estado_civil" id="estado_civil" class="form-control" required>
                                    <option value="">--Selecciona una opcion--</option>
                                    <option value="Soltero(a)">Soltero(a)</option>
                                    <option value="Casado(a)">Casado(a)</option>
                                    <option value="Divorciado(a)">Divorciado(a)</option>
                                    <option value="Union libre(a)">Union libre(a)</option>
                                    <option value="Viudo(a)">Viudo(a)</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="username" class="form-label">Peso:</label><br>
                                <input type="number" name="peso" id="peso" class="form-control" required>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="username" class="form-label">Fecha de Nacimiento</label><br>
                                <input type="date" name="nacimiento" id="nacimiento" value=""  class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="username" class="form-label">Familiar Responsable</label><br>
                                <input type="text" name="familiar" id="familiar" autocapitalize="words" oninput="validarTexto(this, '[a-záéíóúñ ]')" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono:</label><br>
                                <input type="number" name="telefono" id="telefono" oninput="minlengthNumber(this);" minlength="10" maxlength="10" class="form-control" required>
                            </div>
                        </div>
                        <script>
        function minlengthNumber (obj) {
            console.log(obj.value);
            if (obj.value.length > obj.minLength) {
                obj.value = obj.value.slice(0, obj.minLength);
            }
        }
    </script>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="username" class="form-label">Dirección</label><br>
                                <input type="text" name="direccion" id="direccion" class="form-control" required>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="username" class="form-label">Enfermedades</label><br>
                                <input type="text" name="enfermedad" id="enfermedad" autocapitalize="words" oninput="validarTexto(this, '[a-záéíóúñ ]')" class="form-control" required>

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="username" class="form-label">Tipo de Sangre</label><br>
                                <select name="tipo_sangre" id="tipo_sangre" class="form-control" required>
                                    <option value="">--Selecciona una opcion--</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="username" class="form-label">Alergias</label><br>
                                <input type="text" name="alergias" id="alergias" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="username" class="form-label">Curp</label><br>
                                <input type="text" name="curp" id="curp" minlength="18" maxlength="18"  class="form-control" required>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">

                        <input type="hidden" name="estado" id="estado" value="Pendiente" class="form-control">
                    </div>



                    <input type="hidden" name="accion" value="insertar_paciente2">
                

                    <div class="mb-3">

                        <input type="submit" value="Continuar" id="register" class="btn btn-success" name="registrar">
                        <a href="../index.php" class="btn btn-danger">Regresar</a>

                    </div>
                </div>
            </div>

    </form>
    </div>
    </div>


</body>
<script>
   $(function(){
            $('#nacimiento').on('change', calcularEdad);
        });
        
        function calcularEdad() {
            
            fecha = $(this).val();
            var hoy = new Date();
            var edadActual = new Date(fecha);
            var edad = hoy.getFullYear() - edadActual.getFullYear();
            var m = hoy.getMonth() - edadActual.getMonth();

            if (m < 0 || (m === 0 && hoy.getDate() < edadActual.getDate())) {
                edad--;
            }
            $('#edad').val(edad);
        }
</script>

<script src="../js/validar.js"></script>

</html>