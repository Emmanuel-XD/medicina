
  
  <?php

  /**
   * Parte de registro de usuarios
   */

    include "../db.php"; 
	if(isset($_POST)){
		if (strlen($_POST['nombre']) >= 1 && strlen($_POST['correo']) >= 1 && strlen($_POST['password']) >= 1 
        && strlen($_POST['rol']) >= 1) {
			$nombre = trim($_POST['nombre']);
			$correo = trim($_POST['correo']);
			$password = trim($_POST['password']);
			$password2 = trim($_POST['password2']);
			$rol= trim($_POST['rol']);
			if(strcmp($password, $password2) !== 0)
        {
            echo json_encode('error');

        }else{
			$password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 5]);
		$consulta = "INSERT INTO user (nombre, correo,  password, rol)
			VALUES ('$nombre', '$correo', '$password', '$rol')";
		$resultado=mysqli_query($conexion, $consulta);

			if($resultado){
	echo json_encode('success');
		
			}else{
				echo json_encode('error');
			}
		}
	}else{
		echo 'No data';
	}

	}






