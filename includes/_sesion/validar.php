
  
  <?php

  /**
   * Parte de registro de usuarios
   */
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   use PHPMailer\PHPMailer\SMTP;
   
   require '../../PHPMailer/Exception.php';
   require '../../PHPMailer/PHPMailer.php';
   require '../../PHPMailer/SMTP.php';
   




    include "../db.php"; 
	if(isset($_POST)){
		if (strlen($_POST['nombre']) >= 1 && strlen($_POST['correo']) >= 1 && strlen($_POST['password']) >= 1 
        && strlen($_POST['rol']) >= 1) {
			$nombre = trim($_POST['nombre']);
			$correo = trim($_POST['correo']);
			$password = trim($_POST['password']);
			$password2 = trim($_POST['password2']);
			$rol= trim($_POST['rol']);
			if(isset($_POST['status'])){
				$status = $_POST['status'];

			}
			else{
				$status = 2;
			}

		$sql = "SELECT * FROM  user WHERE correo = '$correo'";
		$validmail =mysqli_query($conexion, $sql);
		$rows = mysqli_num_rows($validmail);
		if($rows >= 1){
			echo json_encode('mail');
			die();
		}
			if(strcmp($password, $password2) !== 0)
        {
            echo json_encode('pass');

        }else{
		$password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 5]);
		$consulta = "INSERT INTO user (nombre, correo,  password, rol, status)
			VALUES ('$nombre', '$correo', '$password', '$rol', '$status')";
		$resultado=mysqli_query($conexion, $consulta);

			if($resultado){
				$sql = "SELECT id, status from user where correo = '$correo'";
				$result=mysqli_query($conexion, $sql);
				$rows = mysqli_fetch_assoc($result);
				session_start();	
				//sesiones para validar registros se destruyen despues
				$_SESSION['status'] = $rows['status'];
				$_SESSION['id'] = $rows['id'];
				$_SESSION['verified'] = 'false';
				$_SESSION['correo'] = $correo;

				
				if($resultado){


						$expFormat = mktime(date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y"));
						$expDate = date("Y-m-d H:i:s",$expFormat);
						$key = md5(2418*2 . $correo);
						$addKey = substr(md5(uniqid(rand(),1)),3,10);
						$key = $key . $addKey;
						mysqli_query($conexion, "INSERT INTO tmp_verify_code(`email`, `key`, `expDate`) VALUES ('".$correo."', '".$key."', '".$expDate."');");
							$output='<p>Buen dia estimado/a: '.$nombre.'</p>';
							$output.='<p>Este correo es para confirmar tú identidad.</p>';
							$output.='<p>-------------------------------------------------------------</p>';
							$output.='<p><a href="http://localhost/medicina/home/verification.php?key='.$key.'&email='.$correo.'&action=verify" target="_blank">CLICK AQUI PARA VALIDAR MI CUENTA</a>';		
							$output.='<p>-------------------------------------------------------------</p>';
							$output.='<p>El link expira en 1 dia.</p>';
							$output.='<p>Si tu no solicitaste este correo ignoralo</p>';   	
							$output.='<p>Gracias, Saludos cordiales</p>';


					$phpmailer = new PHPMailer(true);
					try{
					$phpmailer->isSMTP();
					$phpmailer->CharSet    = 'UTF-8';  
					$phpmailer->Host = 'smtp.zoho.com';
					$phpmailer->SMTPAuth = true;
					$phpmailer->Port = 587;
					$phpmailer->Username = 'fortestmail@zohomail.com';
					$phpmailer->Password = 'ZPBF#we38weWn!r';

					$phpmailer->setFrom('fortestmail@zohomail.com', 'IMSS');
					$phpmailer->addAddress($correo, $nombre); 

					$phpmailer->isHTML(true);                                  //Set email format to HTML
       				$phpmailer->Subject = 'Correo para verificación de cuenta';
        			$phpmailer->Body    = $output;
        			$phpmailer->AltBody = '';

					$phpmailer->send();
					echo json_encode('success');
					}
					catch (Exception $e) {
						echo json_encode($e);
					}
				}
		
			}else{
				echo json_encode('error');
			}
		}
	}else{
		echo 'No data';
	}

	}






