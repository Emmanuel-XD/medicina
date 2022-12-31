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


