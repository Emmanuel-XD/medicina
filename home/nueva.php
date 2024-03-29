<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro | Cita</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/locale/es.js"></script>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <form id="registro" action="../includes/functions.php" method="POST">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
          <div class="login-box">

            <h3 class="text-center">Agenda tu cita </h3>
            <p>Tu informacion debe estar registrada en nuestra base de datos. Ahora ya puedes registrar tu cita</p>
            <p><b>NOTA:</b> Nuestro horario de atencion es de 07:00 - 17:00 de lunes, martes, jueves, viernes, sabado. Solo 20 personas por dia.</p>
            <p><b>Dias Inhabiles:</b> Miercoles y Domingo.</p>
          </div>
          <input type="date" id="fecha" class="form-control" required disabled>
          <div class="row" style="
    margin: 5%  30% 5%;
">
            <div class="col-sm-12">
              <a href="#calendarModal" class="button" rel="modal:open">Seleccionar fecha de mi cita</a>
            </div>
          </div>
          <div id="calendarModal" class="modal">
            <div id="calendar"></div>
          </div>

          <div class="form-group">
            <label for="hour-select">Selecciona un horario:</label>
            <select class="form-control" id="hour-select" onchange="assignInputValue()">
              <option value="">--Selecciona una opción--</option>
              <option value="07:00:00">7:00 AM</option>
              <option value="07:30:00">7:30 AM</option>
              <option value="08:00:00">8:00 AM</option>
              <option value="09:00:00">9:00 AM</option>
              <option value="09:30:00">9:30 AM</option>
              <option value="10:00:00">10:00 AM</option>
              <option value="10:30:00">10:30 AM</option>
              <option value="11:00:00">11:00 AM</option>
              <option value="11:20:00">11:20 AM</option>
              <option value="11:40:00">11:40 AM</option>
              <option value="12:00:00">12:00 PM</option>
              <option value="12:20:00">12:20 PM</option>
              <option value="12:40:00">12:40 PM</option>
              <option value="13:20:00">13:20 PM</option>
              <option value="13:40:00">13:40 PM</option>
              <option value="16:00:00">16:00 PM</option>
              <option value="16:20:00">16:20 PM</option>
              <option value="16:40:00">16:40 PM</option>
            </select>
          </div>

          <div id="clock" class="container text-center"></div>


          <div class="form-group ">
            <label>Paciente</label>
            <select disabled class="form-control" id="id_paciente" name="id_paciente">

              <?php

              include("../includes/db.php");
              //Codigo para mostrar categorias desde otra tabla
              $correo = $_SESSION['correo'];
              $sql = "SELECT * FROM pacientes where correo = '$correo'";
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
              <option value="">--Selecciona una opción--</option>
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



          <!-- 
                    <div class="form-group">
                        <input type="hidden" name="estado" id="estado" value="2" class="form-control">
                    </div>

                    <input type="hidden" name="accion" value="insertar_cita2">

                    <br> -->
          <br>

          <div class="mb-3">

            <button type="submit" id="register" class="btn btn-success" name="registrar">Finalizar</button>
            <a href="consulta.php" class="btn btn-danger">Continuar mas tarde...</a>

          </div>
        </div>
      </div>

  </form>
  </div>
  </div>


</body>

</html>
</body>
<script src="../js/agendar.js">


</script>

</html>