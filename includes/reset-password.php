
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
<nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top" id="mainNav">
            <div class="container px-4">
                <img src="../img/imss.png" class="log" width="50px" height="50px" alt="">
                <a class="navbar-brand" href="#page-top"> IMSS-BIENESTAR</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#about">Home</a></li>



                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#acceso" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Acceso
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" data-toggle="modal" data-target="#user">Administración</a></li>
                                <li><a class="dropdown-item " data-toggle="modal" data-target="#login">Usuario</a></li>
                            </ul>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>


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
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "db.php";
$error = '';
if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"]=="reset") && !isset($_POST["action"])){
  $key = $_GET["key"];
  $email = $_GET["email"];
  $curDate = date("Y-m-d H:i:s");
  $sql = "SELECT * FROM `password_reset_temp` WHERE `key`='".$key."' and `email`='".$email."';";
  $query = mysqli_query($conexion,$sql);
  $row = mysqli_num_rows($query);
  if ($row==""){
  $error .= '<h2>Invalid Link</h2>
<p>The link is invalid/expired. Either you did not copy the correct link
from the email, or you have already used the key in which case it is 
deactivated.</p>
<p><a href="https://www.allphptricks.com/forgot-password/index.php">
Click here</a> to reset password.</p>';
	}else{
  $row = mysqli_fetch_assoc($query);
  $expDate = $row['expDate'];
  if ($expDate >= $curDate){
  ?>
  
<?php
}else{
$error .= "<h2>Link Expired</h2>
<p>The link is expired. You are trying to use the expired link which 
as valid only 24 hours (1 days after request).<br /><br /></p>";
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
$error.= "<p>Password do not match, both password should be same.<br /><br /></p>";
  }
  if($error!=""){
echo "<div class='error'>".$error."</div><br />";
}else{
$pass1 = password_hash($pass1, PASSWORD_DEFAULT, ['cost' => 5]);
mysqli_query($conexion,
"UPDATE `user` SET `password`='".$pass1."' WHERE `correo`='".$email."';"
);

mysqli_query($conexion,"DELETE FROM `password_reset_temp` WHERE `email`='".$email."';");
	
echo '<div class="error"><p>Congratulations! Your password has been updated successfully.</p>
<p><a href="https://www.allphptricks.com/forgot-password/login.php">
Click here</a> to Login.</p></div><br />';
	  }		
}