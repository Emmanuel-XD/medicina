<?php
error_reporting(0);
session_start();
if($_SESSION["status"]){

    header('location: ../includes/statusValidator.php');

}

?>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="../js/cont/jquery.min.js"></script>
  <script src="../js/cont/bootstrap.min.js"></script>
<form action="registros.php" method="POST">
    <br>
    <br>
    <br>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">

                    <h3 class="text-center">Crear Cuenta de Usuario</h3>
                    <br>
                    <p>Para poder genenerar tu cuenta de paciente primero debes completar algunos pasos. Rellena todos los campos</p>
                    <br>
                    <div class="form-group">
                        <label for="nombre" class="form-label">Nombre *</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Escribe tu nombre de usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Correo:</label><br>
                        <input type="email" name="correo" id="correo" class="form-control" placeholder="Escribe un correo valido">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label><br>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Escribe tu contraseña" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Confirmar contraseña:</label><br>
                        <input type="password" name="password2" id="password2" class="form-control" placeholder="Escribe tu contraseña" required>
                    </div>

                    <div class="form-group">
                        <label for="rol" class="form-label">Tipo de Usuario:</label>
                        <select name="rol" id="rol" class="form-control" required>

                            <option value="3">Paciente</option>
                        </select>
                    </div>
                    <br>
                    <br>

                    <div class="mb-3">
                        <center>
                            <input type="submit" value="Continuar" id="register" class="btn btn-success" name="registrar">
                            <a href="../index.php" class="btn btn-danger">Regresar</a>
                        </center>
                    </div>
                </div>
            </div>

</form>
</div>
</div>


<script src="../package/dist/sweetalert2.all.js"></script>
<script src="../package/dist/sweetalert2.all.min.js"></script>

<script type="text/javascript">
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
                            window.location = "paciente.php";
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

</script>
</body>

</html>