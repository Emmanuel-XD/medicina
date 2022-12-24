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
$consulta = "SELECT h.id, h.dias, h.id_doctor, h.fecha, d.name  FROM horario h 
INNER JOIN doctor d ON h.id_doctor = d.id WHERE h.id = $id";
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
                     
                            <h3 class="text-center">Editar Disponibilidad de <?php echo $usuario ['id_doctor']; ?></h3>
                            <br>
                            <div class="form-group">
                            <label for="nombre" class="form-label">Dias de atencion*</label>
                            <input type="text"  id="dias" name="dias" class="form-control" value="<?php echo $usuario ['dias']; ?>">
                            </div>

                            <div class="form-group ">
								<label>Doctor</label>
								<select class="form-control" id="id_doctor" name="id_doctor" >
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


                        
                            <input type="hidden" name="accion" value="editar_hora">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                               <br>
                                <div class="mb-3">
                                    
                                <button type="submit" id="form" name="form" class="btn btn-success" >Editar</button>
                               <a href="../views/horarios.php" class="btn btn-danger">Cancelar</a>
                               
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