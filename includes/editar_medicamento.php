<?php include_once "header.php"; ?>

<?php
$id = $_GET['id'];
include "db.php";
$consulta = "SELECT * FROM medicamentos WHERE id= $id";
$resultado = mysqli_query($conexion, $consulta);
$fila = mysqli_fetch_assoc($resultado);
?>
<div class="container">
    <form action="functions.php" method="POST">

        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="folio" class="form-label">Caducidad</label>
                    <input type="date" id="caducidad" name="caducidad" class="form-control" value="<?php echo $fila['caducidad']; ?>" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Medicamento</label>
                    <input type="text" id="medicamento" name="medicamento" class="form-control" value="<?php echo $fila['medicamento']; ?>" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Marca</label>
                    <input type="text" id="marca" name="marca" class="form-control" value="<?php echo $fila['marca']; ?>" required>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="username">Cantidad:</label><br>
                    <input type="number" name="cantidad" id="cantidad" class="form-control" value="<?php echo $fila['cantidad']; ?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label>Fecha de entrada</label>
                    <input type="date" name="entrada" id="entrada" class="form-control" value="<?php echo $fila['entrada']; ?>">
                </div>

            </div>
            <div class="col-sm-6">
                <div class="mb-3">
                    <label>Fecha de salida</label>
                    <input type="date" name="salida" id="salida" class="form-control" value="<?php echo $fila['salida']; ?>">
                </div>
            </div>
        </div>






        <input type="hidden" name="accion" value="editar_medicamento">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <br>

        <div class="mb-3">

            <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
            <a href="../views/medicamentos.php" class="btn btn-danger">Cancelar</a>

        </div>
</div>
</div>

</form>
<?php include_once "footer.php"; ?>
</div>
</div>
</div>