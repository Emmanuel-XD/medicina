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


        <h1>Sistema Administrativo de Citas Medicas </h1>
		<br>

        <p> El Sistema Administrativo de Citas Medicas Web su funcion principal
			es llevar una mejor gestion sobre las operaciones administrativas que se tiene en un consultorio
			medico, de esta manera se lleva un mejor control de las citas medicas atravez de este sistema .
		</p>
			<br>

         
			
				<?php include "../includes/footer.php";?>
            
        
</body>

</html>