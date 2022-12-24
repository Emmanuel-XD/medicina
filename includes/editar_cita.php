<?php


session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

	if($varsesion== null || $varsesion= ''){
     header("Location: _sesion/login.php");
	
	}

include "db.php";
$id = $_GET['id'];  
$consulta = "SELECT ct.id, ct.fecha, ct.hora, ct.estado, ct.fecha_registro, ct.id_doctor, ct.id_paciente,
p.nombre, d.name FROM citas ct INNER JOIN pacientes p ON ct.id_paciente = p.id 
INNER JOIN doctor d ON ct.id_doctor = d.id WHERE ct.id = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);
?>
<?php include_once "header.php"; ?>

<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>


    <link rel="stylesheet" href="../../css/fontawesome-all.min.css">
	<link rel="stylesheet" href="../../css/2.css">
	<link rel="stylesheet" href="../../css/estilo.css">
</head>

<body>



    <form  action="functions.php" id="form" method="POST">

        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                     
                            <h3 class="text-center">Editar Cita del Paciente <?php echo $usuario ['paciente']; ?></h3>
                            <br>
                            <div class="form-group ">
                            <label for="fecha" class="form-label">Fecha*</label>
                            <input type="date"  id="fecha" name="fecha" class="form-control" value="<?php echo $usuario ['fecha']; ?>" required >
                            </div>

                            <div class="form-group">
                            <label for="hora" class="form-label">Hora*</label>
                            <input type="time"  id="hora" name="hora" class="form-control" value="<?php echo $usuario ['hora']; ?>" required >
                            </div>

							<div class="form-group ">
								<label>Paciente</label>
								<select class="form-control" id="id_paciente" name="id_paciente" >
                                <option <?php echo $usuario ['id_paciente']==='nombre' ? "selected='selected' ": "" ?> 
                                value="<?php echo $usuario ['id_paciente']; ?>"><?php echo $usuario ['nombre']; ?> </option>
                                <?php

                                include ("db.php");
                                //Codigo para mostrar categorias desde otra tabla
                                $sql="SELECT * FROM pacientes ";
                                $resultado=mysqli_query($conexion, $sql);
                                while($consulta=mysqli_fetch_array($resultado)){
                                    echo '<option value="'.$consulta['id'].'">'.$consulta['nombre'].'</option>';
                                }

                                ?>

				
								</select>
							</div>

                            <div class="form-group ">
								<label>Doctor</label>
								<select class="form-control" id="id_doctor" name="id_doctor" >
                                   <!-- Codigo php para que no se guarde el valor html que tenemos puesto 
                                    y que nos regrese el de la db, lo mismo pasa con los demas de esta seccion-->
                                <option <?php echo $usuario ['id_doctor']==='name' ? "selected='selected' ": "" ?> 
                                value="<?php echo $usuario ['id_doctor']; ?>"><?php echo $usuario ['name']; ?> </option>
                                <?php

                                include ("db.php");
                                //Codigo para mostrar categorias desde otra tabla
                                $sql="SELECT * FROM doctor ";
                                $resultado=mysqli_query($conexion, $sql);
                                while($consulta=mysqli_fetch_array($resultado)){
                                    echo '<option value="'.$consulta['id'].'">'.$consulta['name'].'</option>';
                                }

                                ?>
		
        </select>
							</div>

                           



                            <div class="form-group">
                                  <label for="pendiente" class="form-label">Estado:</label>
                                  <select name="estado" id="estado" class="form-control" required>
                                  <option <?php echo $usuario ['estado']==='2' ? "selected='selected' ": "" ?> value="2">Pendiente</option>
                                  <option <?php echo $usuario ['estado']==='1' ? "selected='selected' ": "" ?> value="1">Atendido</option>
                               </select>
                            </div>




                            <input type="hidden" name="accion" value="editar_cita">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                               <br>
                                <div class="mb-3">
                                    
                                <button type="submit" id="form" name="form" class="btn btn-success" >Editar</button>
                               <a href="../views/citas.php" class="btn btn-danger">Cancelar</a>
                               
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
    <?php  include_once "footer.php"; ?>
</body>
</html>