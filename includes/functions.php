<?php

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

        case 'insertar_esp';
            insertar_esp();
            break;

        case 'editar_user':
            editar_user();
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
    }
}


function acceso_user()
{
    include("db.php");
    extract($_POST);

    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $password = $conexion->real_escape_string($_POST['password']);
    session_start();
    $_SESSION['nombre'] = $nombre;

    $consulta = "SELECT*FROM user where nombre='$nombre' and password='$password'";
    $resultado = mysqli_query($conexion, $consulta);
    $filas = mysqli_fetch_array($resultado);

    if (isset($filas['rol']) == 1) {

        header('Location: ../views/usuarios.php');


        if ($filas['rol'] == 2) { //doctor

            header('Location: ../views/index.php');
        }
        if ($filas['rol'] == 3) { //paciente


            header('Location: ./_sesion/login.php');
            session_destroy();
        }
    } else {


        echo "<script language='JavaScript'>
        alert('Usuario o Contraseña Incorrecta');
        location.assign('./_sesion/login.php');
        </script>";
        session_destroy();
    }
}

function acceso_paciente()
{
    include("db.php");
    extract($_POST);

    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $password = $conexion->real_escape_string($_POST['password']);
    session_start();
    $_SESSION['nombre'] = $nombre;

    $consulta = "SELECT*FROM user where nombre='$nombre' and password='$password'";
    $resultado = mysqli_query($conexion, $consulta);
    $filas = mysqli_fetch_array($resultado);


    if (isset($filas['rol']) == 3) {

        header('Location: ../home/consulta.php');


        if ($filas['rol'] == 2) { //doctor

            header('Location: ../index.php');
            session_destroy();
        }
        if ($filas['rol'] == 1) { //paciente
            header('Location: ../index.php');
            session_destroy();
        }
    } else {


        echo "<script language='JavaScript'>
        alert('Usuario o Contraseña Incorrecta');
        location.assign('../index.php');
        </script>";
        session_destroy();
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
    include "db.php";
    extract($_POST);
    $consulta = "INSERT INTO citas (fecha, hora, id_paciente, id_doctor ,   estado)
      VALUES ('$fecha', '$hora', '$id_paciente', '$id_doctor',  '$estado')";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
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
    $consulta = "INSERT INTO pacientes (nombre, apellidos, correo, edad , ocupacion,  sexo, estado_civil,
    peso, nacimiento, familiar, telefono, direccion, enfermedad, tipo_sangre, alergias, curp, estado)
      VALUES ('$nombre', '$apellidos', '$correo', '$edad', '$ocupacion',  '$sexo',  '$estado_civil'
      ,  '$peso',  '$nacimiento',  '$familiar',  '$telefono',  '$direccion',  '$enfermedad',  '$tipo_sangre',  
      '$alergias',  '$curp',  '$estado')";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
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

function editar_user()
{
    include "db.php";
    extract($_POST);
    $consulta = "UPDATE user SET nombre = '$nombre', correo = '$correo', password = '$password',
     rol ='$rol' WHERE id = '$id' ";
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
