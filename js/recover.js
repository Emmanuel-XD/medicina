$("#btnrecover").click(function (e) { 
    e.preventDefault();
    var datos = new FormData();
    datos.append('email',$('#mail').val());

    fetch('pwdr.php',{
        method: 'POST',
        body: datos

    }).then((response) => response.json()).then((response => {
        confirmation (response);
    }))
});
function confirmation(r) {
    if(r === 'success'){
        $(".alerts").html(`
        <div class="alert alert-success" role="alert">
        Codigo de verificacion enviado correctamente verifica tu correo
      </div>`)
      $(".alerts").fadeTo(2000, 500).slideUp(500, function(){
        $(".alerts").slideUp(500);
    });
    }
    if(r === 'no_user_error'){
        $(".alerts").html(`
        <div class="alert alert-danger" role="alert">
       Ingrese un correo valido
      </div>`)
      $(".alerts").fadeTo(2000, 500).slideUp(500, function(){
        $(".alerts").slideUp(500);
    });
    }
    if(r === 'server_error'){
        $(".alerts").html(`
        <div class="alert alert-warning" role="alert">
       Error del servidor intente de nuevo mas tarde
      </div>`)
      $(".alerts").fadeTo(2000, 500).slideUp(500, function(){
        $(".alerts").slideUp(500);
    });
    }
    
}
