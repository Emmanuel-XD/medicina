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
            <label for="hora" class="form-label">Hora*</label>
            <input type="time" id="hora" name="hora" min="07:00" max="17:00" class="form-control" required>
          </div>

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
              <option value="">--Selecciona una opcion--</option>
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

<script>
  var fechatxt
  $(document).ready(function() {

    function checkdates() {

      var accion = "citas";
      var datos = new FormData();
      datos.append("accion", accion)
      fetch('../includes/functions.php', {
          method: 'POST',
          body: datos
        }).then(response => response.json())
        .then(response => {
          if (response === 'no_Dates') {

          } else {
            var eventvalidator = []
            response.map(function(i) {


              eventvalidator.push({
                title: "FULL",
                start: `${i['date']}`,
                end: `${i['date']}`
              })


            })
          }
          $('#calendar').fullCalendar({
            locale: 'es',
            header: {
              left: '',
              center: 'title',
              right: ''
            },

            defaultView: 'month',
            //Aqui  se pone la respuesta que genere el array 
            events: eventvalidator,

            dayRender: function(date, cell) {

              if (date.day() === 0 || date.day() === 3) { // if day is Friday
                // apply disabled styles
                cell.addClass('disabled');
                cell.css('pointer-events', 'none');
              }
              // Get all events for the current day
              var events = $('#calendar').fullCalendar('clientEvents', function(event) {
                return moment(event.start).format('YYYY-MM-DD') === moment(date).format('YYYY-MM-DD');
              });
              ///
              if (date < moment().startOf('day')) {
                cell.addClass('disabled');
              }
              if (date >= moment().startOf('day')) {
                var events = $('#calendar').fullCalendar('clientEvents', function(event) {
                  return moment(event.start).isSame(date, 'day');
                });
                if (events.length >= 1) {

                  cell.addClass('disabled');
                  cell.html('<div class=""></div>');
                }
              }
            },
            dayClick: function(date, jsEvent, view) {
              // Check if the cell has the "disabled" class
              if ($(this).hasClass('disabled')) {
                // Do nothing if the cell is disabled
                alert('No puedes tomar cita este dia');
              } else {
                // Show an alert if the cell is clickable
                fechatxt = moment(date).format(`YYYY-MM-DD`)
                $("#fecha").val(fechatxt);
                $("#fecha").removeClass('is-invalid');
                $("#calendarModal").modal('hide.bs.modal')
                $("#calendarModal").hide('')
                $('.jquery-modal').hide();
              }

            }
          });
        })

    }




    checkdates();

    $('#calendarModal').on('shown.bs.modal', function() {
      $('#calendar').fullCalendar();
      closeClass: 'close-modal'
    });




  });
  $("#register").click(function(e) {
    e.preventDefault();
    var form = $('#registro')[0]; // Get the form element
    var inputs = $('input, select', form); // Get all input and select elements within the form
    var valid = true;

    // Check if all inputs and selects have a value
    inputs.each(function() {
      if (!$(this).val()) {
        valid = false;
        $(this).addClass('is-invalid');
      } else {
        $(this).removeClass('is-invalid');
      }
    });

    if (valid) {
      var datos = new FormData();
      datos.append('accion', 'insertar_cita2')
      datos.append('fecha', fechatxt)
      datos.append('hora', $("#hora").val())
      datos.append('id_paciente', $('#id_paciente').val())
      datos.append('id_doctor', $('#id_doctor').val())
      datos.append('estado', '2')

      fetch('../includes/functions.php', {
          method: 'POST',
          body: datos
        }).then(response => response.json())
        .then(response => {

          if (response === "success") {
            alert('El registro fue guardado correctamente');
            location.assign('../home/consulta.php');

          }
          if (response === "error") {
            alert('Algo salio mal. Intentalo de nuevo');
            location.assign('../home/agendar.php');
          }

        })

    }
  });



  $('#registro input, select').blur(function() {

    if ($(this).val().length === 0) {

      $(this).addClass('is-invalid');
    } else {
      $(this).removeClass('is-invalid');
    }
  })
</script>

</html>