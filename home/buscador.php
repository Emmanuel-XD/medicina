<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "../includes/db.php";
if (isset($_POST['buscar'])) {
    $correo = $_POST["buscar"];
    $buscador = mysqli_query($conexion, "SELECT ct.id, ct.fecha, ct.hora, ct.estado, ct.fecha_registro, 
p.nombre, d.name, est.estado FROM citas ct INNER JOIN pacientes p ON ct.id_paciente = p.id 
INNER JOIN doctor d ON ct.id_doctor = d.id LEFT JOIN estado est ON ct.estado = est.id WHERE p.correo LIKE  '$correo'");
    $numero = mysqli_num_rows($buscador);
}
?>
<br>
<h5 class="card-tittle">Resultados encontrados (<?php echo $numero; ?>)</h5>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>NumCita#</th>
                    <th>Fecha_Cita</th>
                    <th>Horario</th>
                    <th>Paciente</th>
                    <th>Doctor</th>


                    <th>Estado</th>
                    <th>Fecha_Registro</th>

                </tr>
            </thead>
            <?php while ($resultado = mysqli_fetch_assoc($buscador)) { ?>


                <tr>
                    <td><?php echo $resultado['id']; ?></td>
                    <td><?php echo $resultado['fecha']; ?></td>
                    <td><?php echo $resultado['hora']; ?></td>
                    <td><?php echo $resultado['nombre']; ?></td>
                    <td><?php echo $resultado['name']; ?></td>
                    <td><?php echo $resultado['estado']; ?></td>
                    <td><?php echo $resultado['fecha_registro']; ?></td>

                </tr>
            <?php
            }

            ?>
            </tbody>
        </table>


    </div>
</div>
</div>

</div>
<!-- /.container-fluid -->

</div>