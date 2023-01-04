<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];
$typeUser = $_SESSION['nombre'];
if ($varsesion == null || $varsesion = '' && $typeUser == null || $typeUser == '') {



?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>IMSS-BIENESTAR</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="./css/estilo.css" rel="stylesheet" />
        <link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

        <script src="./js/cont/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
        <script src="./js/cont/bootstrap.min.js"></script>
        <style>
            a {
                text-decoration: none;
            }

            .log {
                padding-right: 20px;
                height: 50px;
                width: 70px;
            }

            .bar {
                border: 0;
                vertical-align: middle;
                height: auto;
                max-width: 100%;
                outline: 0 none;

            }
        </style>

    </head>

    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top" id="mainNav">
            <div class="container px-4">
                <img src="./img/imss.png" class="log" width="50px" height="50px" alt="">
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
        <!-- Header-->
        <header class="bg-dark bg-gradient text-white">
            <div class="container px-4 text-center">
                <h1 class="fw-bolder"> INSTITUTO MEXICANO DEL SEGURO SOCIAL</h1>

            </div>
        </header>

        <!-- About section-->
        <section id="about">
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                        <h2>IMSS-BIENESTAR</h2>
                        <br>
                        <img src="./img/barra.jpg" class="bar" alt="">
                        <br>
                        <br>
                        <h3>Introduccion</h3>

                        <p>Con 43 años de experiencia, actualmente IMSS-BIENESTAR cuenta con una amplia red de servicios donde se conjuga la atención médica con las acciones de promoción a la salud en la propia comunidad.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark bg-gradient text-white">
            <div class="container px-4">
                <p class="m-0 text-center text-white">Copyright &copy; Sistema De Citas Medicas 2022</p>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="./js/scripts.js"></script>


    </body>
    <?php include "./home/account.php"; ?>
    <?php include "./includes/_sesion/login.php"; ?>
    <script src="./js/logins.js"></script>

    </html>
<?php  } else {
    header("Location: views/index.php");
}
?>