
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
        <style>
		.container {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
		}
		.message {
            display: inline-block;
			text-align: center;
			background-color: gray;
			padding: 10px;
			border-radius: 10px;
		}
	</style>
    <title>Verificar cuenta</title>
</head>
<body>
<?php




include "../includes/db.php";

if(isset($_GET['email']) && isset($_GET['key'])){
    $error = '';
    $email = $_GET['email'];
    $key = $_GET['key'];
    $status = 1;
    $curDate = date("Y-m-d H:i:s");

    $sql_valid_key = mysqli_query($conexion, "SELECT * FROM `tmp_verify_code` WHERE `key`='".$key."' and `email`='".$email."';");
    $sql_valid_user = mysqli_query($conexion, "SELECT * FROM `user` WHERE `verified`= '".$status."' and `correo`='".$email."';");
    $rows_valid_key = mysqli_num_rows($sql_valid_key);
    $rows_valid_user = mysqli_num_rows($sql_valid_user);
    //validar status de ve3rificacion de cuenta
    if($rows_valid_user == 1){
        $error = '<h2>No es necesio verificar tu cuenta</h2>
        <p>Tu cuenta ya fue verificada previamente puedes iniciar sesión</p>
        <p><a href="localhost/medicina/">
        haga clic aquí</a> ir a la pagina principal.</p>';
    }
    //validar que la cuenta este sin verificar y que la llave de varificacion sea valida
    if($rows_valid_user == 0 && $rows_valid_key == 0){
        $error = '<div class="message"><h2>Enlace no válido</h2>
        <p>El enlace no es válido/caducó, no ingresaste el enlace correcto
        del correo electrónico</p>
        <p><a id="resend" href="reenviar">
        haga clic aquí</a> para reenviar el enlace</p>
        </div>';
    }
    //valida que la llave de confirmacion sea valida y que el usuario este sin verificar
    if($rows_valid_user == 0 && $rows_valid_key == 1)
    {
        $row = mysqli_fetch_assoc($sql_valid_key);
        $expDate = $row['expDate'];
        if ($expDate >= $curDate){
            $status = 1;
            $sql_valid_user = mysqli_query($conexion, "UPDATE `user` SET `verified`= '".$status."' WHERE `correo`='".$email."';");
            ?>
            <h2>Cuenta verificada correctamente</h2>
            <p><a id="resend" href="../index.php">click aqui</a> para redirigirte a iniciar sesion para continuar el registro</p>
            <?php
            
    }
    else{
        $error = '<h2>Enlace no válido</h2>
        <p>El enlace expiro</p>
        <p><a id="resend" href="reenviar">
        haga clic aquí</a> para reenviar el enlace</p>';

    }
    }
    if($error!=""){
        echo "<div class='container'>".$error."</div><br />";
        }	
}

?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="../js/resend.js"></script>