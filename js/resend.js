$("#resend").click(function (e) { 
    e.preventDefault();
    valor =new URLSearchParams(document.location.search)
    var email = valor.get("email");
    const elementos = document.getElementById('correo');
    value = elementos.dataset.info;
    console.log(value)
    resend(value);
});
$("#loginre").click(function (e) { 
    e.preventDefault();
    value = "login"
    resend(value);
});

function resend(value) {


    console.log(value)
    var datos = new FormData();
    datos.append('dato', value);

    fetch('../includes/resendverify.php',{
        method: 'POST',
        body: datos
    }).then((response) => response.json()).then((response => {
        confirmation (response);
    }))
    function confirmation(r) {
        if(r === 'success'){
            alert("se reenvio correctamente el correo de verificación")
        }
        if(r === 'mail_error'){
            alert("ocurrio un problema en el servidor intenta de nuevo mas tarde")
        }
        if(r === 'verified_user'){
            alert("el usuario que intento ya esta verificado intente iniciar sesion con sus credenciales")
        }
        if(r === 'session_closed'){
            window.location.href = "../index.php"
        }
    }
    
}