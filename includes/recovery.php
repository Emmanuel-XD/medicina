<?php
 ?>

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
                <a class="navbar-brand" href="../index.php"> IMSS-BIENESTAR</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>



                    </ul>
                </div>
            </div>
        </nav>
        <div class="formreset container h-100">
             <div class="row h-100 justify-content-center align-items-center">
                 <div class="col-10 col-md-8 col-lg-6">

                 <form class="form-ex" action="" method="post">
                <h1>RECUPERAR CONTRASEÑA</h1>
                <div class="alerts">

                </div>
                <p class="description">Ingresa el correo de la cuenta a recuperar.</p>
                <!-- Input fields -->
                <div class="form-group">
                    <input type="text" class="form-control username" id="mail" placeholder="Correo..." name="username">
                </div>
                <button type="button" id="btnrecover" class="btn btn-primary btn-customized">Recuperar</button>
            </form>

                 </div>
             </div>
        </div> 
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="./js/scripts.js"></script>
<script src="../js/recover.js"></script>
</html>
