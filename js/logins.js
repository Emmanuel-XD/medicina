jQuery.extend(jQuery.validator.messages, {
    required: "Este campo no puede estar vacío."
});
function selecter (response){
    if (response === "session_error"){
        $(".alerts").html(`
        <div class="alert alert-danger" role="alert">
        Usuario o contraseña incorrecta vuelve a intentar
      </div>`)
      $(".alerts").fadeTo(2000, 500).slideUp(500, function(){
        $(".alerts").slideUp(500);
    });
    }
    if (response === "userType_error"){
        $(".alerts").html(`
        <div class="alert alert-warning" role="alert">
        Este usuario no tiene el permiso de acceder aquí prueba otro método de inicio de sesión
        </div>`)
      $(".alerts").fadeTo(2000, 500).slideUp(500, function(){
        $(".alerts").slideUp(500);
    });
    }
    if(response === "login_success"){

        $(location).attr('href','views/index.php');
    }
}

$("#loginUser").click(function (e) {
e.preventDefault();
if($("#formUser").valid()){
    var datos = new FormData();
    datos.append('accion', "acceso_paciente")
    datos.append('correo', $("#correoUser").val())
    datos.append('password',$("#passwordUser").val())

    fetch("./includes/functions.php",{
        method : 'POST',
        body: datos
    }).then((response) => response.json()).then((response => {
        console.log(response)
        selecter (response);


    }))
}
})
$("#loginAdmin").click(function (e) {
    e.preventDefault();
    if($("#formAdmin").valid()){
        var datos = new FormData();
        datos.append('accion', "acceso_user")
        datos.append('correo', $("#correoAdmin").val())
        datos.append('password',$("#passwordAdmin").val())
    
        fetch("./includes/functions.php",{
            method : 'POST',
            body: datos
        }).then((response) => response.json()).then((response => {
          
            selecter(response);
    
        }))
    }
    })
