var fechatxt 
var myHour
$(document).ready(function() {
  document.getElementById("fecha").val
      function checkdates() {

          var accion = "citas";
          var datos = new FormData();
          datos.append("accion", accion)
          fetch('../includes/functions.php',{
          method: 'POST',
          body: datos
          }).then(response => response.json())
            .then(response => {
              if(response === 'no_Dates'){
                
              }
              else{
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
                      } 
                      else {
                          fechatxt = moment(date).format(`YYYY-MM-DD`)
                          $("#fecha").val(fechatxt);
                          $("#hour-select").val("");
                          toggleSelect();
                          $("#fecha").removeClass('is-invalid');
                          $("#calendarModal").modal('hide.bs.modal')
                          $("#calendarModal").hide('')
                          $('.jquery-modal').hide();
                                

                                  var accion = "horarios";
                                  var datos = new FormData();
                                  datos.append("accion", accion)
                                  datos.append("date", fechatxt)
                                  fetch('../includes/functions.php',{
                                  method: 'POST',
                                  body: datos
                                  }).then(response => response.json())
                                    .then(response => {
                                      if(response === 'no_hours'){
                                        var horasTomadas = []
                                        checkAvailability(horasTomadas);
                                      }
                                      else{
                                    var horasTomadas = []
                                    response.map(function(i) {
                                      horasTomadas.push(`${i['hora']}` );
                                      })
                                      console.log(horasTomadas);
                                      checkAvailability(horasTomadas);
                                    }
                                  })
                             }
                          }
                      });
                    })

      }
      checkdates();

      $('#calendarModal').on('shown.bs.modal', function () {
                $('#calendar').fullCalendar();
                closeClass: 'close-modal'
              });

        

        
      });
$("#register").click(function (e) { 
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
          datos.append('hora', myHour)
          datos.append('id_paciente', $('#id_paciente').val())
          datos.append('id_doctor', $('#id_doctor').val())
          datos.append('estado', '2')

          fetch('../includes/functions.php',{
      method: 'POST',
      body: datos
      }).then(response => response.json())
        .then(response => {

          if(response === "success"){
              alert('El registro fue guardado correctamente');
              location.assign('../home/fondo.php');

          }
          if(response === "error"){
              alert('Algo salio mal. Intentalo de nuevo');
              location.assign('../home/agendar.php');
          }

        })
          
        }
});
$('#registro input, select').blur(function(){

  if( $(this).val().length === 0 ) {

      $(this).addClass('is-invalid');
  }
  else{
      $(this).removeClass('is-invalid');
  }
})
  function checkAvailability(horasTomadas) {
    var selectElement = document.getElementById("hour-select");
    var options = selectElement.options;
  
    for (var i = 0; i < options.length; i++) {
      var optionValue = options[i].value;
  
      if (horasTomadas.includes(optionValue)) {
        // Disable the option
        options[i].disabled = true;
        // Or remove the option
        // options[i].remove();
      } else {
        // Enable the option (in case it was previously disabled)
        options[i].disabled = false;
      }
    }
  }

  function assignInputValue() {
    // Get the input element
    var inputElement = document.getElementById("hour-select");
  
    // Get the input value
    var inputValue = inputElement.value;
  
    // Assign the input value to a variable
     myHour = inputValue;
  
  }
  


  toggleSelect()
function toggleSelect() {
  var triggerInput = document.getElementById("fecha");
  var selectInput = document.getElementById("hour-select");

  if (triggerInput.value) {
    selectInput.disabled = false; // Enable the select input
  } else {
    selectInput.disabled = true;  // Disable the select input
  }
}