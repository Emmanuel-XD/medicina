var
    closeInSeconds = 5,
    displayText = "Redireccionando a la pagina principal...",
    title = "Debes iniciar sesion primero para acceder",
    url = "../index.php",
    timer;
   

$(document).ready(function () {
    
    if(document.getElementById('notAllow')){
        title = "No tienes permisos para acceder aqui"
    }
    if(document.getElementById('notAllow1')){
        title = "Este usuario esta deshabilitado"
    }
    if(document.getElementById('notAllow2')){
        title = "Aun no has completado el registro"
        url = "../home/paciente.php"
    }
    if(document.getElementById('notAllow3')){
        title = "No tienes permisos para acceder aqui"
        url = "../home/agendar.php"
    }
    if(document.getElementById('regcomplete')){
        title = "No puedes acceder aqui ya has completado el registro"
        url = "../views/index.php"
    }
    swal({
        title: title,   
        text: displayText.replace(/#1/, closeInSeconds),   
        timer: closeInSeconds * 1000,   
        button: false,
        closeOnClickOutside: false
    });
    
timer = setInterval(function() {

    closeInSeconds--;

    if (closeInSeconds < 0) {

        clearInterval(timer);
    }

    $('.sweet-alert > p').text(displayText.replace(/#1/, closeInSeconds));

}, 1000);


});
setTimeout(function(){
    $(location).attr('href',url);
    },3000);


