<?php



    ?>


<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <link rel="stylesheet" href="../package/dist/sweetalert2.css">
    
</head>

<body id="page-top">
    <div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Agregar un nuevo usuario</h3>
                    <button type="button" class="btn btn-black" data-dismiss="modal">
					<i class="fa fa-times" aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">

             <form  action="registros.php" method="POST">
                            <div class="form-group">
                            <label for="nombre" class="form-label">Nombre *</label>
                            <input type="text"  id="nombre" name="nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Correo:</label><br>
                                <input type="email" name="correo" id="correo" class="form-control" placeholder="No se puede repetir con alguno de la lista...">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Confirmar Contraseña:</label><br>
                                <input type="password" name="password2" id="password2" class="form-control" required>
                            </div>

                            <div class="form-group">
                                  <label for="rol" class="form-label">Rol de usuario:</label>
                                  <select name="rol" id="rol" class="form-control" required>
                                  <option value="">--Selecciona una opcion--</option>
                                  <option value="1">Administrador</option>
                                  <option value="2">Doctor</option>
                                  <option value="3">Paciente</option>
                               </select>
                            </div>
                            <div class="form-group">
                                  <label for="rol" class="form-label"> Nivel de registro:</label>
                                  <select name="status" id="status" class="form-control" required>
                                  <option value="">--Selecciona una opcion--</option>
                                  <option value="0">Habilitado (Registro completo)</option>
                                  <option value="1">Deshabilitado (No podra ingresar)</option>
                                  <option value="2">Pedir datos usuario</option>
                                  <option value="3">Pedir agendar primera cita</option>
                               </select>
                            </div>
                      <br>

                                <div class="mb-3">
                                    
                               <button type="button" id="register" class="btn btn-success" name="registrar">Guardar</button>
                               <a href="usuarios.php" class="btn btn-danger">Cancelar</a>
                               
                            </div>
                            </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    


<script src="../package/dist/sweetalert2.all.js"></script>
<script src="../package/dist/sweetalert2.all.min.js"></script>

<script type="text/javascript">
	$(function(){
        $('#register').click(function(e) {
            e.preventDefault();
            var valid = this.form.checkValidity();

            if (valid) {
                var datos = new FormData();
                datos.append('nombre', $('#nombre').val())
                datos.append('correo', $('#correo').val())
                datos.append('password', $('#password').val())
                datos.append('password2', $('#password2').val())
                datos.append('rol', $('#rol').val())
                datos.append('status', $('#status').val())

                fetch('../includes/_sesion/validar.php',{
                    method: 'POST',
                    body: datos,
                }).then((response) => response.json()).then((response => {confirmation (response); }))

}});

    function confirmation(r){
        if(r === 'success'){
                        Swal.fire({
                            'title': '¡Mensaje!',
                            'text': 'usuario creado',
                            'icon': 'success',
                            'showConfirmButton': 'false',
                            'timer': '1500'
                        }).then(function() {
                            window.location = "usuarios.php";
                        });
                    }
                        if(r === 'error'){
                        Swal.fire({
                            'title': 'Error',
                            'text': 'No se creo el usuario',
                            'icon': 'error'
                        })
                    }
                    if(r === 'mail'){
                        Swal.fire({
                            'title': 'Error',
                            'text': 'Este correo ya esta registrado prueba otro o inicia sesión',
                            'icon': 'error'
                        })
                    }
                    if(r === 'pass'){
                        Swal.fire({
                            'title': 'Error',
                            'text': 'Las contraseñas no coinciden',
                            'icon': 'error'
                        })
                    }


            } 
		
	});
    
	
</script>
</body>
</html>