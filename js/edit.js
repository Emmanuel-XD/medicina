$("#submitedit").click(function (e) { 
    e.preventDefault();
    var datos = new FormData();
    datos.append('accion','editar_perfil')                       
    datos.append('id',  $("#nombre").data("id"))
    datos.append('nombre' , $("#nombre").val())
    datos.append('correo', $("#correo").val())
    datos.append('rol', $("#rol").val())
 

    fetch('../includes/functions.php',{
        method : 'POST',
        body: datos

    }).then((response) => response.json()).then((response => {
        confirmation (response);
    }))
});
function confirmation(r) {
    if(r){
        if(r === "updated"){{
            console.log("test")
            
            new swal({
                title: "cambios realzado correctamente",   
                text: "Por favor inicia sesion nuevamente... cerrando sesión...",   
                timer: 5000,   
                showCancelButton: false,
                showConfirmButton: false, 
                allowOutsideClick: false
            });
            setTimeout(function(){
                url = "../includes/_sesion/cerrarSesion.php";
                $(location).attr('href',url);
                },3000);
        }}
    }
    
}