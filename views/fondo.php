<?php
session_start();
error_reporting(0);
if($_SESSION['nombre']){

  ?>
  <div id="notAllow" ></div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script  src="../js/not-allowed.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php 
die();
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta registrada</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    
<div class="container">

<section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">

  <h2>Gracias <?php echo $_SESSION['nombre'];?> por generar tu cuenta de cliente con nosotros. </h2>
  <a class="btn btn-outline-secondary" href="../index.php">Back to home</a>
  <img src="../img/img.jpg" class="img-fluid py-5" alt="Page Not Found">
  <div class="credits">
   
  
  </div>
</section>

</div>
</body>
</html>