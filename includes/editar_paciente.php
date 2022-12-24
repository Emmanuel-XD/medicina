<?php


session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

if ($varsesion == null || $varsesion = '') {
    header("Location: _sesion/login.php");
}

////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////
$id = $_GET['id'];
include "db.php";
$consulta = "SELECT * FROM pacientes WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);
?>
<?php include_once "header.php"; ?>






<form action="../includes/functions.php" method="POST">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $usuario['nombre']; ?>" required>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Apellidos</label>
                    <input type="text" id="apellidos" name="apellidos" class="form-control" value="<?php echo $usuario['apellidos']; ?>" required>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="username">Correo:</label><br>
                    <input type="email" name="correo" id="correo" class="form-control" value="<?php echo $usuario['correo']; ?>">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="username">Edad</label><br>
                    <input type="number" name="edad" id="edad" class="form-control" value="<?php echo $usuario['edad']; ?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="username">Ocupacion</label><br>
                    <input type="text" name="ocupacion" id="ocupacion" class="form-control" value="<?php echo $usuario['ocupacion']; ?>">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="sexo" class="form-label">Sexo</label>
                    <select name="sexo" id="sexo" class="form-control" value="<?php echo $usuario['sexo']; ?>" required>
                        <option <?php echo $usuario['sexo'] === 'Masculino' ? "selected='selected' " : "" ?> value="Masculino">Masculino</option>
                        <option <?php echo $usuario['sexo'] === 'Femenino' ? "selected='selected' " : "" ?> value="Femenino">Femenino</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="username">Estado Civil</label><br>
                    <input type="text" name="estado_civil" id="estado_civil" class="form-control" value="<?php echo $usuario['estado_civil']; ?>">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="username">Peso</label><br>
                    <input type="number" name="peso" id="peso" class="form-control" value="<?php echo $usuario['peso']; ?>">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="username">Fecha de Nacimiento</label><br>
                    <input type="date" name="nacimiento" id="nacimiento" class="form-control" value="<?php echo $usuario['nacimiento']; ?>">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="username">Familiar</label><br>
                    <input type="text" name="familiar" id="familiar" class="form-control" value="<?php echo $usuario['familiar']; ?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="telefono">Telefono:</label><br>
                    <input type="number" name="telefono" id="telefono" class="form-control" value="<?php echo $usuario['telefono']; ?>" required>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="username">Direccion</label><br>
                    <input type="text" name="direccion" id="direccion" class="form-control" value="<?php echo $usuario['direccion']; ?>">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="username">Enfermemedad</label><br>
                    <input type="text" name="enfermedad" id="enfermedad" class="form-control" value="<?php echo $usuario['enfermedad']; ?>">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="username">Tipo de Sangre</label><br>
                    <input type="text" name="tipo_sangre" id="tipo_sangre" class="form-control" value="<?php echo $usuario['tipo_sangre']; ?>">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="username">Alergias</label><br>
                    <input type="text" name="alergias" id="alergias" class="form-control" value="<?php echo $usuario['alergias']; ?>">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="username">Curp</label><br>
                    <input type="text" name="curp" id="curp" class="form-control" value="<?php echo $usuario['curp']; ?>">
                </div>
            </div>
        </div>



        <div class="form-group">
            <label for="pendiente" class="form-label">Estado:</label>
            <select name="estado" id="estado" class="form-control"  value="<?php echo $usuario['estado']; ?>" required>
                <option <?php echo $usuario['estado'] === 'Pendiente' ? "selected='selected' " : "" ?> value="Pendiente">Pendiente</option>
                <option <?php echo $usuario['estado'] === 'Atendido' ? "selected='selected' " : "" ?> value="Atendido">Atendido</option>

            </select>
        </div>


        <input type="hidden" name="accion" value="editar_paciente">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <br>

        <div class="mb-3">

            <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
            <a href="../views/pacientes.php" class="btn btn-danger">Cancelar</a>

        </div>
    </div>


</form>





<?php include_once "footer.php"; ?>

</html>