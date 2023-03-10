<?php
// Seguridad de sesiones
session_start();
error_reporting(0);
include '../includes/header.php';
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
        <h1>Bienvenido <?php echo $_SESSION['nombre']; ?> </h1> 
        <br>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<?php  if ($typeUser === '1' || $typeUser === '2'){?>
    <h1 class="h3 mb-0 text-gray-800">Panel Administrativo</h1>
<?php }
else{?>
    <h1 class="h3 mb-0 text-gray-800">Panel de usuario</h1>
<?php } ?>
</div>


<!-- Content Row -->
<?php  if ($typeUser === '1' || $typeUser === '2'){?>
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="citas.php" class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Numero de citas</a>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php 
                               include "../includes/db.php"; 
    
                                $SQL="SELECT id FROM citas ORDER BY id";
                                $dato = mysqli_query($conexion, $SQL);
                                $fila= mysqli_num_rows($dato);
    
                                echo($fila); ?>
                                
                            </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="pacientes.php" class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Numero de pacientes</a>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 
                               include "../includes/db.php"; 
    
                                $SQL="SELECT id FROM pacientes ORDER BY id";
                                $dato = mysqli_query($conexion, $SQL);
                                $fila= mysqli_num_rows($dato);
    
                                echo($fila); ?>

                        </div>
                    </div>
                    <div class="col-auto">
                    <i class="fa-solid fa fa-male fa-2x text-gray-300" aria-hidden="true"></i>
             
                      
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="medicos.php" class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Numero de medicos </a>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                <?php 
                               include "../includes/db.php"; 
    
                                $SQL="SELECT id FROM doctor ORDER BY id";
                                $dato = mysqli_query($conexion, $SQL);
                                $fila= mysqli_num_rows($dato);
    
                                echo($fila); ?>

                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-user-md fa-2x text-gray-300" aria-hidden="true"></i></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                           Numero de Usuarios</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 
                               include "../includes/db.php"; 
    
                                $SQL="SELECT id FROM user ORDER BY id";
                                $dato = mysqli_query($conexion, $SQL);
                                $fila= mysqli_num_rows($dato);
    
                                echo($fila); ?>

                        </div>
                    </div>
                    <div class="col-auto">
                    <i class="fa fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

        <!-- End of Content Wrapper -->

    </div>
   <?php }
   if($typeUser === '3'){ ?>
<div class="row">
<div class="col-xl-4 col-md-4 mb-4">

    </div>
       <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="../home/consulta.php" class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Tus citas</a>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 
                               include "../includes/db.php"; 
                                $usuario = $_SESSION["correo"];
                                $SQL = "SELECT id from pacientes WHERE correo = '$usuario'";
                                $dato = mysqli_query($conexion, $SQL);
                                $rows = mysqli_fetch_assoc($dato);
                                $id = $rows['id'];
                                $SQL="SELECT id FROM citas WHERE id_paciente = '$id'";
                                $dato = mysqli_query($conexion, $SQL);
                                $fila= mysqli_num_rows($dato);
    
                                echo($fila); ?>

                        </div>
                    </div>
                    <div class="col-auto">
                    <i class="fa-solid fa fa-male fa-2x text-gray-300" aria-hidden="true"></i>
             
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-4 mb-4">

    </div>
</div>
<?php }?>
<?php 
include '../includes/footer.php'; ?>
</html>

