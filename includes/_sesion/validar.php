
  
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

		$sql = "SELECT * FROM  user WHERE correo = '$correo'";
		$validmail =mysqli_query($conexion, $sql);
		$rows = mysqli_num_rows($validmail);
		if($rows >= 1){
			echo json_encode('error');
			die();
		}
			if(strcmp($password, $password2) !== 0)
        {
            echo json_encode('error');

        }else{
			$password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 5]);
		$consulta = "INSERT INTO user (nombre, correo,  password, rol, status)
			VALUES ('$nombre', '$correo', '$password', '$rol', '2')";
		$resultado=mysqli_query($conexion, $consulta);

			if($resultado){
				$sql = "SELECT id, status from user where correo = '$correo'";
				$result=mysqli_query($conexion, $sql);
				$rows = mysqli_fetch_assoc($result);
				session_start();	
				//sesiones para validar registros se destruyen despues
				$_SESSION['status'] = $rows['status'];
				$_SESSION['id'] = $rows['id'];
				$_SESSION['correo'] = $correo;

				echo json_encode('success');
		
			}else{
				echo json_encode('error');
			}
		}
	}else{
		echo 'No data';
	}

	}






