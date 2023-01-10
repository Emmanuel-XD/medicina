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
$consulta = "SELECT * FROM user WHERE id = $id";
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
                     
                            <h3 class="text-center">Editar el registro de <?php echo $usuario ['nombre']; ?> </h3>
                            <br>    
                            <div class="form-group">
                            <label for="nombre" class="form-label">Nombre *</label>
                            <input type="text"  id="nombre" name="nombre" class="form-control" value="<?php echo $usuario ['nombre']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="username">Correo:</label><br>
                                <input type="email" name="correo" id="correo" class="form-control" placeholder="No se puede repetir con alguno de la lista..." value="<?php echo $usuario ['correo']; ?>">
                            </div>
                            <?php 
                                $passrand = rand(1000, 9999);
                            ?>
                            <div class="form-group">
                                <label for="password">Contraseña: (para actualizar datos es necesario generar nueva contraseña,Escribe una o la contraseña por defecto es: <i><b>Defaultpass<?php echo $passrand; ?> </b> </i>)</label><br>
                                <input type="password" name="password" id="password" class="form-control" value="Defaultpass<?php echo $passrand; ?>">
                            </div>
                      
                            <div class="form-group">
                                  <label for="rol_id" class="form-label">Rol de usuario:</label>
                                  <select name="rol" id="rol" class="form-control" required >
                                  <option <?php echo $usuario ['rol']==='1' ? "selected='selected' ": "" ?> value="1">Administrador</option>
                                  <option <?php echo $usuario ['rol']==='2' ? "selected='selected' ": "" ?> value="2">Doctor</option>
                                  <option <?php echo $usuario ['rol']==='3' ? "selected='selected' ": "" ?> value="3">Paciente</option>
                                  <input type="hidden" name="accion" value="editar_user">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                               </select>
                            </div>
                            <div class="form-group">
                                  <label for="rol" class="form-label"> Nivel de registro:</label>
                                  <select name="status" id="status" class="form-control" required>
                                  <option value="">--Selecciona una opcion--</option>
                                  <option <?php if($usuario['status'] == '0'){?>selected<?php }?>  value="0">Habilitado (Registro completo)</option>
                                  <option <?php if($usuario['status'] == '1'){?>selected<?php }?>  value="1">Deshabilitado (No podra ingresar)</option>
                                  <option <?php if($usuario['status'] == '2'){?>selected<?php }?>  value="2">Pedir datos usuario</option>
                                  <option <?php if($usuario['status'] == '3'){?>selected<?php }?>  value="3">Pedir agendar primera cita</option>
                               </select>
                            </div>
                               <br>
                                <div class="mb-3">
                                    
                                <button type="submit" id="form" name="form" class="btn btn-success" >Editar</button>
                               <a href="../views/usuarios.php" class="btn btn-danger">Cancelar</a>
                               
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