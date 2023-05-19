
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../css/estilo.css" rel="stylesheet" />
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../css/reset.css">
        <script src="../js/cont/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
        <script src="../js/cont/bootstrap.min.js"></script>
    <title>Recuperar contraseña</title>
</head>
<body>

        <?php
include "db.php";
$error = '';
if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"]=="reset") && !isset($_POST["action"])){
  $key = $_GET["key"];
  $email = $_GET["email"];
  $curDate = date("Y-m-d H:i:s");
  $sql = "SELECT * FROM `password_reset_temp` WHERE `key`='".$key."' and `email`='".$email."';";
  $query = mysqli_query($conexion,$sql);
  $row = mysqli_num_rows($query);
  if($row==0){
  $error .= '<h2>Enlace no válido</h2>
<p>El enlace no es válido/caducó. O no copiaste el enlace correcto
del correo electrónico, o ya ha utilizado la clave, en cuyo caso es
desactivado</p>
<p><a href="https://www.allphptricks.com/forgot-password/index.php">
haga clic aquí</a> para restablecer la contraseña.</p>';
	}else{
  $row = mysqli_fetch_assoc($query);
  $expDate = $row['expDate'];

  if ($expDate >= $curDate){
 
  ?>
  
<div class="formreset container h-100">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-10 col-md-8 col-lg-6">

      <form class="form-ex" action="" method="post">
        <h1>RESTAURAR CONTRASEÑA</h1>
        <div class="alerts">

        </div>
        <p class="description">Introduce tu nueva contraseña.</p>
        

        <form method="post" action="" name="update">
          <input type="hidden" name="action" value="update" />

          <label><strong>Nueva Contraseña:</strong></label>
          <input type="password" name="pass1" class="form-control username" maxlength="15" required />

          <label><strong>Confirmar Contraseña:</strong></label><br />
          <input type="password" class="form-control username" name="pass2" maxlength="15" required />

          <input type="hidden" name="email" value="<?php echo $email; ?>" />
          <input type="submit" value="Reset Password" class="btn btn-primary btn-customized" />
        </form>
    </div>
  </div>
</div>

<?php
}else{
$error .= "<h2>Link Expired</h2>
<p>El enlace está caducado. Está intentando utilizar el enlace caducado que
es válido solo 24 horas (1 día después de la solicitud).<br /><br /></p>";
            }
      }
if($error!=""){
  echo "<div class='error'>".$error."</div><br />";
  }			
} 
// isset email key validate end
if(isset($_POST["email"]) && isset($_POST["action"]) &&
 ($_POST["action"]=="update")){
$error="";
$pass1 = mysqli_real_escape_string($conexion,$_POST["pass1"]);
$pass2 = mysqli_real_escape_string($conexion,$_POST["pass2"]);
$email = $_POST["email"];
$curDate = date("Y-m-d H:i:s");
if ($pass1!=$pass2){
$error.= "<p>La contraseña no coincide, ambas contraseñas deben ser iguales.<br /><br /></p>";
  }
  if($error!=""){
echo "<div class='error'>".$error."</div><br />";
}else{
$pass1 = password_hash($pass1, PASSWORD_DEFAULT, ['cost' => 5]);
mysqli_query($conexion,
"UPDATE `user` SET `password`='".$pass1."' WHERE `correo`='".$email."';"
);

mysqli_query($conexion,"DELETE FROM `password_reset_temp` WHERE `email`='".$email."';");
	
echo '<div class="error"><p>¡Felicidades! Su contraseña se ha actualizado correctamente.</p>
<p><a href="localhost/medicina/">
Click here</a> to Login.</p></div><br />';
	  }		
}