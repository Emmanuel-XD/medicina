<?php


session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

	if($varsesion== null || $varsesion= ''){
     header("Location: _sesion/login.php");
	
	}

////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////
$id = $_GET['id'];
include "db.php";
$consulta = "SELECT d.id, d.cedula, d.name, d.apellidos,d.correo, d.id_horario, d.id_especialidad, d.sexo, d.telefono, 
d.direccion, d.fecha, d.fecha_registro, esp.especialidad, h.dias FROM doctor d LEFT JOIN especialidades esp 
ON d.id_especialidad = esp.id LEFT JOIN horario h ON d.id_horario = h.id WHERE d.id = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);
?>
<?php include_once "header.php"; ?>


<form action="../includes/functions.php" method="POST">
    <br>
<div class="container">
<div class="row">
    <div class="col-sm-6">
        <div class="mb-3">
            <label for="folio" class="form-label">Cedula</label>
            <input type="number" id="cedula" name="cedula" class="form-control"  value="<?php echo $usuario ['cedula']; ?>" required>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" id="name" name="name" class="form-control"  value="<?php echo $usuario ['name']; ?>" required>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="mb-3">
            <label for="nombre" class="form-label">Apellidos</label>
            <input type="text" id="apellidos" name="apellidos" class="form-control"  value="<?php echo $usuario ['apellidos']; ?>" required>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="mb-3">
            <label for="username">Correo:</label><br>
            <input type="email" name="correo" id="correo" class="form-control"  value="<?php echo $usuario ['correo']; ?>" >
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="mb-3">
            <label for="username">Horario</label><br>
            <select class="form-control" id="id_horario" name="id_horario" >
            <option <?php echo $usuario ['id_horario']==='dias' ? "selected='selected' ": "" ?> 
                                value="<?php echo $usuario ['id_horario']; ?>"><?php echo $usuario ['dias']; ?> </option>
                <?php

                include("db.php");
                //Codigo para mostrar categorias desde otra tabla
                $sql = "SELECT * FROM horario ";
                $resultado = mysqli_query($conexion, $sql);
                while ($consulta = mysqli_fetch_array($resultado)) {
                    echo '<option value="' . $consulta['id'] . '">' . $consulta['dias'] . '</option>';
                }

                ?>


            </select>
        </div>

    </div>
    <div class="col-sm-6">
        <div class="mb-3">
            <label>Especialidad</label>
            <select class="form-control" id="id_especialidad" name="id_especialidad" >
            <option <?php echo $usuario ['id_especialidad']==='especialidad' ? "selected='selected' ": "" ?> 
                                value="<?php echo $usuario ['id_especialidad']; ?>"><?php echo $usuario ['especialidad']; ?> </option>
                <?php

                include("db.php");
                //Codigo para mostrar categorias desde otra tabla
                $sql = "SELECT * FROM especialidades ";
                $resultado = mysqli_query($conexion, $sql);
                while ($consulta = mysqli_fetch_array($resultado)) {
                    echo '<option value="' . $consulta['id'] . '">' . $consulta['especialidad'] . '</option>';
                }

                ?>


            </select>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-6">
        <div class="mb-3">
            <label for="sexo" class="form-label">Sexo:</label>
            <select name="sexo" id="sexo" class="form-control"  value="<?php echo $usuario['sexo']; ?>" required>
            <option <?php echo $usuario['sexo'] === 'Masculino' ? "selected='selected' " : "" ?> value="Masculino">Masculino</option>
                        <option <?php echo $usuario['sexo'] === 'Femenino' ? "selected='selected' " : "" ?> value="Femenino">Femenino</option>
            </select>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="mb-3">
            <label for="telefono">Telefono</label><br>
            <input type="number" name="telefono" id="telefono" class="form-control" value="<?php echo $usuario ['telefono']; ?>" required>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="mb-3">
            <label for="telefono">Direccion</label><br>
            <input type="text" name="direccion" id="direccion" class="form-control" value="<?php echo $usuario ['direccion']; ?>" required>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="mb-3">
            <label for="fecha">Fecha de nacimiento</label><br>
            <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo $usuario ['fecha']; ?>" required>
        </div>
    </div>
</div>



<input type="hidden" name="accion" value="editar_doctor">
        <input type="hidden" name="id" value="<?php echo $id; ?>">


<br>

<div class="mb-3">

    <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
    <a href="../views/medicos.php" class="btn btn-danger">Cancelar</a>

</div>
</div>
</div>

</form>
</div>
</div>


<?php include_once "footer.php"; ?>

</html>