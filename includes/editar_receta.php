<?php


session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

	if($varsesion== null || $varsesion= ''){
     header("Location: _sesion/login.php");
	
	}

include "db.php";
$id = $_GET['id'];  
$consulta = "SELECT r.id, r.id_doctor, r.id_medicamento, r.id_paciente, r.fecha, r.diagnostico, d.name, m.medicamento, p.nombre, p.edad, p.peso FROM recetas r 
INNER JOIN doctor d ON r.id_doctor = d.id INNER JOIN medicamentos m ON r.id_medicamento = m.id INNER JOIN pacientes p 
ON r.id_paciente = p.id WHERE r.id = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);
?>
<?php include_once "header.php"; ?>
<div class="container">

    <form action="functions.php" method="POST">

        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label>Doctor</label>
                    <select class="form-control" id="id_doctor" name="id_doctor">
                    <option <?php echo $usuario ['id_doctor']==='name' ? "selected='selected' ": "" ?> 
                    value="<?php echo $usuario ['id_doctor']; ?>"><?php echo $usuario ['name']; ?> </option>
                        <?php

                        include("db.php");
                        //Codigo para mostrar categorias desde otra tabla
                        $sql = "SELECT * FROM doctor ";
                        $resultado = mysqli_query($conexion, $sql);
                        while ($consulta = mysqli_fetch_array($resultado)) {
                            echo '<option value="' . $consulta['id'] . '">' . $consulta['name'] . '</option>';
                        }

                        ?>

                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-3">
                    <label>Medicamento</label>
                    <select class="form-control" id="id_medicamento" name="id_medicamento">
                    <option <?php echo $usuario ['id_medicamento']==='name' ? "selected='selected' ": "" ?> 
                    value="<?php echo $usuario ['id_medicamento']; ?>"><?php echo $usuario ['medicamento']; ?> </option>
                        <?php

                        include("db.php");
                        //Codigo para mostrar categorias desde otra tabla
                        $sql = "SELECT * FROM medicamentos ";
                        $resultado = mysqli_query($conexion, $sql);
                        while ($consulta = mysqli_fetch_array($resultado)) {
                            echo '<option value="' . $consulta['id'] . '">' . $consulta['medicamento'] . '</option>';
                        }

                        ?>


                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label>Paciente</label>
                    <select class="form-control" id="id_paciente" name="id_paciente">
                    <option <?php echo $usuario ['id_paciente']==='nombre' ? "selected='selected' ": "" ?> 
                    value="<?php echo $usuario ['id_paciente']; ?>"><?php echo $usuario ['nombre']; ?> </option>
                        <?php

                        include("db.php");
                        //Codigo para mostrar categorias desde otra tabla
                        $sql = "SELECT * FROM pacientes ";
                        $resultado = mysqli_query($conexion, $sql);
                        while ($consulta = mysqli_fetch_array($resultado)) {
                            echo '<option value="' . $consulta['id'] . '">' . $consulta['nombre'] . '</option>';
                        }

                        ?>


                    </select>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="username">Fecha de registro:</label><br>
                    <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo $usuario ['fecha']; ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="mensaje" class="form-label">Diagnostico:</label>
            <textarea required id="diagnostico" name="diagnostico" cols="30" rows="5" class="form-control" placeholder="Diagnostico Medico..."  required ><?php echo $usuario ['diagnostico']; ?></textarea>

        </div>






        <input type="hidden" name="accion" value="editar_receta">
        <input type="hidden" name="id" value="<?php echo $id;?>">

        <br>

        <div class="mb-3">

            <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
            <a href="../views/recetas.php" class="btn btn-danger">Cancelar</a>

        </div>
</div>
</div>

</form>
</div>
</div>
</div>