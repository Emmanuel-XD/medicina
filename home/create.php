<?php


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
                        <input type="password" name="password" id="password" class="form-control" placeholder="Escribe tu contraseña 1-8 digitos" required>
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
    $(function() {
        $('#register').click(function(e) {

            var valid = this.form.checkValidity();

            if (valid) {


                var nombre = $('#nombre').val();
                var correo = $('#correo').val();
                var password = $('#password').val();
                var rol = $('#rol').val();


                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '../includes/_sesion/validar.php',
                    data: {
                        nombre: nombre,
                        correo: correo,
                        password: password,
                        rol: rol
                    },
                    success: function(data) {
                        Swal.fire({
                            'title': '¡Mensaje!',
                            'text': data,
                            'icon': 'success',
                            'showConfirmButton': 'false',
                            'timer': '1500'
                        }).then(function() {
                            window.location = "paciente.php";
                        });

                    },

                    error: function(data) {
                        Swal.fire({
                            'title': 'Error',
                            'text': data,
                            'icon': 'error'
                        })
                    }
                });


            } else {

            }





        });


    });
</script>
</body>

</html>