
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
		body {
			margin: 0;
			padding: 0;
			height: 100vh;
			background-color: #f2f2f2;
			overflow: hidden;
		}
		.container {
			position: fixed;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			display: flex;
			justify-content: center;
			align-items: center;
			border-radius: 20px;
			padding: 20px;
			z-index: 1;
			overflow: hidden;
			background: url('https://example.com/background-image.jpg') no-repeat center center fixed;
			background-size: cover;
		}
		.message {
			display: inline-block;
			text-align: center;
			background-color: white;
			padding: 10px;
			border-radius: 10px;
		}
		@keyframes animateBackground {
			0% {
				background-color: #f2f2f2;
				transform: scale(1);
			}
			50% {
				background-color: #c5c5c5;
				transform: scale(1.1);
			}
			100% {
				background-color: #f2f2f2;
				transform: scale(1);
			}
		}
		.background {
			position: absolute;
			top: 0;
			left: 0;
			width: 100vw;
			height: 100vh;
			z-index: -1;
			animation: animateBackground 10s ease-in-out infinite;
		}
		.background::before {
			content: '';
			position: absolute;
			width: 20px;
			height: 20px;
			border-radius: 50%;
			background-color: rgba(255, 255, 255, 0.5);
			animation: circleAnimation 10s ease-in-out infinite;
		}
		.background::after {
			content: '';
			position: absolute;
			width: 30px;
			height: 30px;
			border-radius: 50%;
			background-color: rgba(255, 255, 255, 0.5);
			animation: circleAnimation 20s ease-in-out infinite;
		}
		@keyframes circleAnimation {
			0% {
				transform: translate(0, 0) scale(0);
			}
			50% {
				transform: translate(50vw, 50vh) scale(1);
			}
			100% {
				transform: translate(100vw, 0) scale(0);
			}
		}
	</style>
    <title>Verificar cuenta</title>
<?php


session_start();
if ($_SESSION['status'] && $_SESSION['verified'] == 'false'){
$correo = $_SESSION['correo'];

    ?>

<body>
<div class="background"></div>
    <div class="container">
    <div class="message"><h2>VERIFICA TU CUENTA PARA CONTINUAR</h2>
        <p>para verificar tu cuenta ingresa a el correo que registraste y da click al link que recibiste</p>
        <p id="correo" data-info="<?php echo $correo; ?>"><a id="resend" href="reenviar">
        haga clic aquí</a> si no recibio el correo para reenviarlo</p>
        <p id="login" data-info="delete"><a id="loginre" href="reenviar">
        haga clic aquí</a> si la cuenta ya esta verificada para continar el registro</p>
        </div>
    </div>
</body>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="../js/resend.js"></script>
    <?php

}
else{
    header('Location: http://localhost/medicina');
}


?>
