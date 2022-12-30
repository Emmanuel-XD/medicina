var
    closeInSeconds = 5,
    displayText = "Redireccionando a la pagina principal...",
    timer;


$(document).ready(function () {
    swal({
        title: "Debes iniciar sesion primero para acceder",   
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
    url = "../index.php";
    $(location).attr('href',url);
    },3000);


