<?php include "../includes/header.php"; ?>
<?php include "../includes/db.php"; ?>

<?php
error_reporting(0);
session_start();
$actualsesion = $_SESSION['nombre'];

if ($actualsesion == null || $actualsesion == '') {
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado de cita</title>
    <script src="../js/cont/jquery.min.js"></script>

</head>

<body>
    <div class="container">
        <h1 class="text-center">Consulta tu Informacion <?php echo $_SESSION['nombre']; ?></h1>

        <br>
        <p>Acontinuacion puedes consultar el estado de tu cita. Asi como tambien podras ver algunos cambios
            realizados dentro del sistema en caso de algun cambio. </p>

        <div class="col-sm-12">
            <div class="mb-3">
                <label for="form-label">Buscar</label>
                <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Escribe tu nombre de paciente" required>

            </div>
            <button onclick="buscar_ahora($('#buscar').val());" class="btn btn-primary">Consultar</button>


                    <div id="datos" ></div>
   
        </div>
</body>

<script>
    function buscar_ahora(buscar) {
        var parametros = {
            "buscar": buscar
        };
        $.ajax({
            data: parametros,
            type: 'POST',
            url: 'buscador.php',
            success: function(data) {
                document.getElementById("datos").innerHTML = data;
            }
        });
    }
</script>

<?php include "../includes/footer.php"; ?>

</html>