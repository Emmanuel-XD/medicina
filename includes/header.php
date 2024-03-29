<?php 
error_reporting(0);
session_start();
$actualsesion = $_SESSION['nombre'];
$typeUser = $_SESSION['rol'];
$status = $_SESSION['status'];
if($actualsesion == null || $actualsesion == ''  && $typeUser == null || $typeUser == '' ){
?>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="../js/not-allowed.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
die();
}
if($status != 0){

    header( 'location: ../includes/statusValidator.php');
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

    <title>Medicina</title>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <?php if($typeUser === '2' || $typeUser ==='1'){?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                
                <div class="sidebar-brand-text mx-1">Medicina</div>
            </a>
            <style>
        .bg-gradient-dark {
    background-color: #002514 ;
    background-image: linear-gradient(180deg,#002514   10%, #1a2c23  100%);
    background-size: cover;
}
/*.bg-white {
    background-color: #8d58ca!important;
}
    */

    </style>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../views/index.php">
                <i class="fa fa-home" aria-hidden="true"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-sticky-note" aria-hidden="true"></i>
                    <span>Citas</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Ver Citas:</h6>
                        <a class="collapse-item" href="../views/citas.php">Mostrar</a>
                        <a class="collapse-item" href="../views/calendario.php">Calendario</a>
                    </div>
                    
                </div>
                
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span>Pacientes</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Ver Pacientes:</h6>
                        <a class="collapse-item" href="../views/pacientes.php">Mostar</a>
          
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Otros
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fa fa-user-md" aria-hidden="true"></i>
                    <span>Medicos</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Ver Medicos:</h6>
                        <?php if( $typeUser ==='1'){  ?>       <a class="collapse-item" href="../views/medicos.php">Mostrar</a><?php  } ?>
                        <a class="collapse-item" href="../views/medicamentos.php">Medicamentos</a>
                        <a class="collapse-item" href="../views/recetas.php">Recetas</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <?php if( $typeUser ==='1'){  ?>
            <li class="nav-item">
                <a class="nav-link" href="../views/especialidades.php">
                <i class="fa fa-medkit" aria-hidden="true"></i>
                    <span>Especialidades Medicas</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="../views/horarios.php">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                    <span>Horarios</span></a>
            </li>

            <!-- Nav Item - user -->
            <li class="nav-item">

                <a class="nav-link" href="../views/usuarios.php">
                <i class="fa fa-user" aria-hidden="true"></i>
                    <span>Usuarios</span></a>
            </li>
            <?php } ?>
            <!-- Nav Item - infor -->
            <li class="nav-item">
                <a class="nav-link" href="../views/acerca.php">
                <i class="fa fa-question-circle" aria-hidden="true"></i>
                    <span>Acerca de</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
       

        </ul>
        <!-- End of Sidebar -->
<?php };?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <?php if($typeUser === '2' || $typeUser ==='1'){?>
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <?php } ?>
                    <!-- Topbar Search -->
                    <?php include "fecha.php";?>
                    <center>
    <h8 class="ml-auto"><strong><b><?php echo fecha(); ?></h8></strong></b>

		<div class="reloj">
			<h6><span id="tiempo">00 : 00 : 00</span></h6>
		</div>

    </center>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                    <?php if($typeUser === '2' || $typeUser ==='1'){?>
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <?php }?>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <?php
                            include "db.php";
                            date_default_timezone_set('America/Mexico_City');
                            $fecha = date("Y-m-d ");
                            $sql = mysqli_query($conexion, "SELECT * FROM citas WHERE fecha = '$fecha' ");
                            $count = mysqli_num_rows($sql);

                            ?>


                            <!-- Nav Item - Messages -->
                            <?php if($typeUser === '2' || $typeUser ==='1'){?>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i id="notifa" class="fas fa-bell fa-fw"></i>
                                    <!-- Counter - Messages -->
                                    <span class="badge badge-danger badge-counter"></span>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                    <h6 class="dropdown-header">
                                        Notificaciones
                                    </h6>


                                    <div  id="notif">
            
                                              
                                        
                    
                                    
                                    </div>
                                </div>
                                <audio id="notification-sound" src="../css/not.mp3"></audio>
                                <style>
                                    .animate {
    background: linear-gradient(58deg, #cba6f7, #f38ba8, #eba0ac, #fab387, #f9e2af, #a6e3a1, #94e2d5);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  transform: scale(2.5); /* Add a CSS animation */
}
                                </style>
                    <script>
             
             var oldArray = [];
             var audio = document.getElementById('notification-sound');

setInterval(function() {
  var datos = new FormData();
  datos.append("accion", 'getNotifications');

  fetch('../includes/functions.php',{
    method: 'POST',
    body: datos
  })
  .then((response) => response.json())
  .then((newArray) => {
    
    // Compare the new array to the old array
    if (JSON.stringify(newArray) !== JSON.stringify(oldArray)) {
        html = ``
        newArray.map(function(i) {

        html +=`
        <a class="dropdown-item d-flex align-items-center" href="#"><div class="dropdown-list-image mr-3">
                                                    <img class="rounded-circle" src="../img/undraw_profile.svg" alt="..."> 
                                                    <div class="status-indicator bg-success"></div>
                                                    </div>
            
        
        <div class="text-truncate">${i.name}
               <div class="small text-gray-500">Genero cita para ${i.fecha}</div></div>`
        }),
        myIcon = document.getElementById('notifa');
        setTimeout(function() {
        myIcon.classList.add('animate'); // Add the animate class
        setTimeout(function() {
            myIcon.classList.remove('my-icon', 'animate'); // Remove the classes after 1 second
        }, 3000);
        }, 30); 
    audio.play();
     document.getElementById("notif").innerHTML = html
      // Update the old array with the new values
      oldArray = newArray;
    } else {
      
    }
  })
  .catch(function(error) {
    console.log('Fetch error:', error);
  });
}, 10000);



                    </script>
<?php }?>

                        <li class="nav-item dropdown no-arrow">
                            <a class="mr-2 text-gray-800 medium nav-link" href="../views/index.php"><b>INICIO</b></a>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?php echo $_SESSION['nombre']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
 
                           
                                <a class="dropdown-item" href="../views/perfil.php" >
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                        
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                                
    <?php include "../views/salir.php";?>
    




</body>
<script src="../js/reloj.js"></script>
</html>
