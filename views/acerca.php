<?php
// Seguridad de sesiones
session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

	if($varsesion== null || $varsesion= ''){

	    header("Location: ../includes/_sesion/login.php");
	die();
	} 
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="../js/jquery.min.js"></script>

</head>
<?php include "../includes/header.php";?>



<body id="page-top">

                <!-- Begin Page Content -->
                <div class="container-fluid">



                        <div class="card-body">
                            <div class="table-responsive">


        <h1>Sistema Administrativo de Citas Medicas "Medical PC" Version 1.0</h1>
		<br>

        <p> Medical PC es un Sistema Administrativo de Citas Medicas Web la su funcion principal
			es llevar una mejor gestion sobre las operaciones administrativas que se tiene en un consultorio
			medico, de esta manera se lleva un mejor control de las citas medicas atravez de este sistema .
		</p>
			<br>

        <h2>Sobre el Desarrollador</h2>
		<br>
        <p>Desarrollado y Mantenido por <a  href="https://softcodeweb.mysistemventa.com/index.php">SoftCodEPM	</a>.
            Este sistema es exclusivo para la venta e implementacion del publico en general.
        
            También te invitamos a suscribirte a nuestro canal de  <a href="https://www.youtube.com/channel/UCVmGqUX5HUzI3HS3LYwZqHA/videos">Youtube</a>.
        </p>

		<br>

		<h2>Contacto</h2>

		<br>
        <p>
            ¿Quieres contactarnos para alguna duda, queja o comentario?
			</p>

	      <a href="https://softcodeweb.mysistemventa.com/views/index.php#contact-us">Presiona Aqui </a> 
         
			
				<?php include "../includes/footer.php";?>
            
        
</body>

</html>