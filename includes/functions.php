<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("db.php");




if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
            //casos de registros

        case 'acceso_user';
            acceso_user();
            break;

        case 'acceso_paciente';
            acceso_paciente();
            break;

        case 'insertar_cita';
            insertar_cita();
            break;

        case 'insertar_cita2';
            insertar_cita2();
            break;

        case 'insertar_paciente';
            insertar_paciente();
            break;

        case 'insertar_paciente2';
            insertar_paciente2();
            break;

        case 'insertar_doctor';
            insertar_doctor();
            break;


        case 'insertar_horario';
            insertar_horario();
            break;

        case 'insertar_receta';
            insertar_receta();
            break;

        case 'insertar_esp';
            insertar_esp();
            break;

        case 'insertar_medicamento';
            insertar_medicamento();
            break;

        case 'editar_user':
            editar_user();
            break;

        case 'editar_perfil':
            editar_perfil();
            break;

        case 'editar_paciente':
            editar_paciente();
            break;

        case 'editar_esp':
            editar_esp();
            break;

        case 'editar_doctor':
            editar_doctor();
            break;


        case 'editar_hora':
            editar_hora();
            break;

        case 'editar_cita':
            editar_cita();
            break;

        case 'editar_medicamento':
            editar_medicamento();
            break;

        case 'editar_receta':
            editar_receta();
            break;
    }
}


function acceso_user()
{
    include("db.php");
    extract($_POST);

    $correo = $conexion->real_escape_string($_POST['correo']);
    $password = $conexion->real_escape_string($_POST['password']);


    $consulta = "SELECT*FROM user where correo='$correo'";
    $resultado = mysqli_query($conexion, $consulta);
    $filas = mysqli_fetch_assoc($resultado);
    $rows = mysqli_num_rows($resultado);
    if ($rows > 0){
    $user_data = [
        'rol' => $filas['rol'],
        'password' => $filas['password'],
        'nombre' => $filas['nombre'],
        'status' => $filas['status']
    ];

    if ($user_data['rol']) {
        if ($user_data['rol'] == 1 && password_verify($password, $user_data['password'])) {
            session_start();

            $_SESSION['nombre'] = $user_data['nombre'];
            $_SESSION['correo'] = $correo;
            $_SESSION['rol'] = $filas['rol'];
            $_SESSION ['status'] = $user_data['status'];
            echo json_encode("login_success");
        }
        if ($user_data['rol'] == 2 && password_verify($password, $filas['password'])) { //doctor
            session_start();
            $_SESSION['nombre'] = $user_data['nombre'];
            $_SESSION['correo'] = $correo;
            $_SESSION ['status'] = $user_data['status'];
            $_SESSION['rol'] = $filas['rol'];
            echo json_encode("login_success");
        }
        if ($user_data['rol'] == 3) { //paciente
            echo json_encode("userType_error");
        }
        if(!password_verify($password, $filas['password']))
        {
            echo json_encode("session_error");

        }
    } else {

        echo json_encode("session_error");
    }
}
else{
    echo json_encode("session_error");
}
}

function acceso_paciente()
{
    include("db.php");
    extract($_POST);

    $correo = $conexion->real_escape_string($_POST['correo']);
    $password = $conexion->real_escape_string($_POST['password']);



    $consulta = "SELECT*FROM user where correo ='$correo'";
 
    $resultado = mysqli_query($conexion, $consulta);
    $filas = mysqli_fetch_assoc($resultado);
    $rows = mysqli_num_rows($resultado);
    if ($rows > 0){
    $user_data = [
        'rol' => $filas['rol'],
        'password' => $filas['password'],
        'nombre' => $filas['nombre'],
        'status' => $filas['status'],
    ];
    if ($user_data['rol']) {
        if ($filas['rol'] == 3 && password_verify($password, $user_data['password'])) {
            session_start();
            $_SESSION['correo'] = $correo;
            $_SESSION['nombre'] = $user_data['nombre'];
            $_SESSION['rol'] = $filas['rol'];
            $_SESSION ['status'] = $user_data['status'];
            $_SESSION['id'] = $filas['id'];
            echo json_encode("login_success");
        }
        if ($user_data['rol'] == 2 && password_verify($password, $user_data['password'])) { //doctor

            echo json_encode("userType_error");

        }
        if ($user_data['rol'] == 1 && password_verify($password, $user_data['password'])) { //paciente
            echo json_encode("userType_error");

        }
        if(!password_verify($password, $filas['password']))
        {
            echo json_encode("session_error");

        }
    } else {
        echo json_encode("session_error");
    }
    
}
else{
    echo json_encode("session_error");
}
}

function insertar_cita()
{
    include "db.php";
    extract($_POST);
    $consulta = "INSERT INTO citas (fecha, hora, id_paciente, id_doctor ,   estado)
      VALUES ('$fecha', '$hora', '$id_paciente', '$id_doctor',  '$estado')";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "<script language='JavaScript'>
        alert('El registro fue guardado correctamente');
        location.assign('../views/citas.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
         alert('Algo salio mal. Intentalo de nuevo');
         location.assign('../views/citas.php');
         </script>";
    }
}


function insertar_cita2()
{
    session_start();
    include "db.php";
    extract($_POST);
    $id = $_SESSION['id'];
    $consulta = "INSERT INTO citas (fecha, hora, id_paciente, id_doctor ,   estado)
      VALUES ('$fecha', '$hora', '$id_paciente', '$id_doctor',  '$estado')";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        $sql = "UPDATE user SET status = '0'  WHERE  id = '$id'";
        $resultado = mysqli_query($conexion, $sql);
        if($resultado){
            $_SESSION['status'] = '0';
        }
        echo "<script language='JavaScript'>
        alert('El registro fue guardado correctamente');
        location.assign('../home/fondo.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
         alert('Algo salio mal. Intentalo de nuevo');
         location.assign('../home/agendar.php');
         </script>";
    }
}

function insertar_medicamento()
{
    include "db.php";
    extract($_POST);
    $consulta = "INSERT INTO medicamentos (caducidad, medicamento, marca, cantidad , entrada, salida)
      VALUES ('$caducidad', '$medicamento', '$marca', '$cantidad',  '$entrada' ,  '$salida')";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "<script language='JavaScript'>
        alert('El registro fue guardado correctamente');
        location.assign('../views/medicamentos.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
         alert('Algo salio mal. Intentalo de nuevo');
         location.assign('../views/medicamentos.php');
         </script>";
    }
}

function insertar_paciente()
{
    include "db.php";
    extract($_POST);
 
    $consulta = "INSERT INTO pacientes (nombre, apellidos, correo, edad , ocupacion,  sexo, estado_civil,
    peso, nacimiento, familiar, telefono, direccion, enfermedad, tipo_sangre, alergias, curp, estado)
      VALUES ('$nombre', '$apellidos', '$correo', '$edad', '$ocupacion',  '$sexo',  '$estado_civil'
      ,  '$peso',  '$nacimiento',  '$familiar',  '$telefono',  '$direccion',  '$enfermedad',  '$tipo_sangre',  
      '$alergias',  '$curp',  '$estado')";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "<script language='JavaScript'>
        alert('El registro fue guardado correctamente');
        location.assign('../views/pacientes.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
         alert('Algo salio mal. Intentalo de nuevo');
         location.assign('../views/pacientes.php');
         </script>";
    }
}

function insertar_paciente2()
{
    include "db.php";
    extract($_POST);
    session_start();
    $correoses = $_SESSION['correo'];
    $id = $_SESSION['id'];
    $consulta = "INSERT INTO pacientes (nombre, apellidos, correo, edad , ocupacion,  sexo, estado_civil,
    peso, nacimiento, familiar, telefono, direccion, enfermedad, tipo_sangre, alergias, curp, estado, id_user)
      VALUES ('$nombre', '$apellidos', '$correoses', '$edad', '$ocupacion',  '$sexo',  '$estado_civil'
      ,  '$peso',  '$nacimiento',  '$familiar',  '$telefono',  '$direccion',  '$enfermedad',  '$tipo_sangre',  
      '$alergias',  '$curp',  '$estado', $id)";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        $sql = "UPDATE user SET status = '3'  WHERE  id = '$id'";
        $resultado = mysqli_query($conexion, $sql);
        if($resultado){
            $_SESSION['status'] = '3';
        }
        echo "<script language='JavaScript'>
        alert('El registro fue guardado correctamente');
        location.assign('../home/agendar.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
         alert('Algo salio mal. Intentalo de nuevo');
         location.assign('../home/paciente.php');
         </script>";
    }
}

function insertar_doctor()
{
    include "db.php";
    extract($_POST);

    $consulta = "INSERT INTO doctor (cedula, name, apellidos, correo, id_horario, id_especialidad, sexo,  telefono,
    direccion,  fecha ) VALUES ('$cedula',  '$name', '$apellidos', '$correo', '$id_horario', '$id_especialidad','$sexo', 
    '$telefono',  '$direccion', '$fecha')";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "<script language='JavaScript'>
        alert('El registro fue guardado correctamente');
        location.assign('../views/medicos.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
         alert('Algo salio mal. Intentalo de nuevo');
         location.assign('../views/medicos.php');
         </script>";
    }
}

function insertar_horario()
{
    include "db.php";
    extract($_POST);
    $consulta = "INSERT INTO horario (dias, id_doctor)
          VALUES ('$dias', '$id_doctor')";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "<script language='JavaScript'>
        alert('El registro fue guardado correctamente');
        location.assign('../views/horarios.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
         alert('Algo salio mal. Intentalo de nuevo');
         location.assign('../views/horarios.php');
         </script>";
    }
}

function insertar_esp()
{
    include "db.php";
    extract($_POST);
    $consulta = "INSERT INTO especialidades (especialidad)
    VALUES ('$especialidad')";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "<script language='JavaScript'>
        alert('El registro fue guardado correctamente');
        location.assign('../views/especialidades.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
         alert('Algo salio mal. Intentalo de nuevo');
         location.assign('../views/especialidades.php');
         </script>";
    }
}

function insertar_receta()
{
    include "db.php";
    extract($_POST);
    $consulta = "INSERT INTO recetas (id_doctor, id_medicamento, id_paciente, fecha , diagnostico)
      VALUES ('$id_doctor', '$id_medicamento', '$id_paciente', '$fecha',  '$diagnostico' )";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "<script language='JavaScript'>
        alert('El registro fue guardado correctamente');
        location.assign('../views/recetas.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
         alert('Algo salio mal. Intentalo de nuevo');
         location.assign('../views/recetas.php');
         </script>";
    }
}

function editar_user()
{
    include "db.php";
    extract($_POST);
    $password = trim($_POST['password']);
    $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 5]);
    $consulta = "UPDATE user SET nombre = '$nombre', correo = '$correo', password = '$password',
     rol ='$rol' , status = '$status' WHERE id = '$id' ";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "<script language='JavaScript'>
        alert('El registro fue actualizado correctamente');
        location.assign('../views/usuarios.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
        alert('Algo salio mal. Intentalo de nuevo');
         location.assign('../views/usuarios.php');
         </script>";
    }
}


function editar_perfil()
{
    include "db.php";
    extract($_POST);
    $consulta = "UPDATE user SET nombre = '$nombre', correo = '$correo' WHERE id = '$id' ";
    $resultado = mysqli_query($conexion, $consulta);
    if ($resultado === true) {
        echo json_encode("updated");
    }
    if ($resultado === false) {
        echo json_encode("error");
    }
}

function editar_paciente()
{
    include "db.php";
    extract($_POST);
    $consulta = "UPDATE pacientes SET nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', edad = '$edad',
    ocupacion = '$ocupacion', sexo = '$sexo', estado_civil = '$estado_civil', peso = '$peso', nacimiento = '$nacimiento', 
    familiar = '$familiar', telefono = '$telefono', direccion = '$direccion', enfermedad = '$enfermedad', tipo_sangre = '$tipo_sangre',
    alergias = '$alergias', curp = '$curp',  estado ='$estado' WHERE id = '$id' ";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "<script language='JavaScript'>
        alert('El registro fue actualizado correctamente');
        location.assign('../views/pacientes.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
        alert('Algo salio mal. Intentalo de nuevo');
         location.assign('../views/pacientes.php');
         </script>";
    }
}

function editar_esp()
{
    include "db.php";
    extract($_POST);
    $consulta = "UPDATE especialidades SET especialidad = '$especialidad' WHERE id = '$id' ";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "<script language='JavaScript'>
        alert('El registro fue actualizado correctamente');
        location.assign('../views/especialidades.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
        alert('Algo salio mal. Intentalo de nuevo');
         location.assign('../views/especialidades.php');
         </script>";
    }
}

function editar_doctor()
{
    include "db.php";
    extract($_POST);
    $consulta = "UPDATE doctor SET cedula = '$cedula', name = '$name', apellidos = '$apellidos', correo = '$correo',
    id_horario = '$id_horario', id_especialidad = '$id_especialidad',  sexo = '$sexo',
    telefono = '$telefono', direccion = '$direccion',  fecha = '$fecha' WHERE id = '$id' ";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "<script language='JavaScript'>
        alert('El registro fue actualizado correctamente');
        location.assign('../views/medicos.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
        alert('Algo salio mal. Intentalo de nuevo');
         location.assign('../views/medicos.php');
         </script>";
    }
}

function editar_hora()
{
    include "db.php";
    extract($_POST);
    $consulta = "UPDATE horario SET dias = '$dias', id_doctor = '$id_doctor' WHERE id = '$id' ";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "<script language='JavaScript'>
        alert('El registro fue actualizado correctamente');
        location.assign('../views/horarios.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
        alert('Algo salio mal. Intentalo de nuevo');
         location.assign('../views/horarios.php');
         </script>";
    }
}

function editar_cita()
{
    include "db.php";
    extract($_POST);
    $consulta = "UPDATE citas SET fecha = '$fecha', hora = '$hora', id_paciente = '$id_paciente', id_doctor = '$id_doctor',
     estado= '$estado' 
    WHERE id = '$id' ";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "<script language='JavaScript'>
        alert('El registro fue actualizado correctamente');
        location.assign('../views/citas.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
        alert('Algo salio mal. Intentalo de nuevo');
         location.assign('../views/citas.php');
         </script>";
    }
}

function editar_medicamento()
{
    include "db.php";
    extract($_POST);
    $consulta = "UPDATE medicamentos SET caducidad = '$caducidad', medicamento = '$medicamento', marca = '$marca', cantidad = '$cantidad',
     entrada= '$entrada', salida = '$salida' WHERE id = '$id' ";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "<script language='JavaScript'>
        alert('El registro fue actualizado correctamente');
        location.assign('../views/medicamentos.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
        alert('Algo salio mal. Intentalo de nuevo');
        location.assign('../views/medicamentos.php');
         </script>";
    }
}



function editar_receta()
{
    include "db.php";
    extract($_POST);
    $consulta = "UPDATE recetas SET id_doctor = '$id_doctor', id_medicamento = '$id_medicamento', id_paciente = '$id_paciente',
     fecha= '$fecha', diagnostico = '$diagnostico' WHERE id = '$id' ";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "<script language='JavaScript'>
        alert('El registro fue actualizado correctamente');
        location.assign('../views/recetas.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
        alert('Algo salio mal. Intentalo de nuevo');
        location.assign('../views/recetas.php');
         </script>";
    }
}
