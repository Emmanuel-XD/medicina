<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

include "db.php";
$email = $_POST['email'];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
$query = "SELECT * FROM user WHERE correo = '$email'";
$result = mysqli_query($conexion, $query);
$rows = mysqli_num_rows($result);
$data = mysqli_fetch_assoc($result);

if($rows > 0){

    $expFormat = mktime(date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y"));
    $expDate = date("Y-m-d H:i:s",$expFormat);
    $key = md5(2418*2 . $email);
    $addKey = substr(md5(uniqid(rand(),1)),3,10);
    $key = $key . $addKey;
    mysqli_query($conexion, "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES ('".$email."', '".$key."', '".$expDate."');");
        $output='<p>Buen dia estimado/a: '.$data['nombre'].'</p>';
        $output.='<p>Este correo es para restablecer tú contraseña.</p>';
        $output.='<p>-------------------------------------------------------------</p>';
        $output.='<p><a href="localhost/medicina/includes/reset-password.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">CLICK AQUI PARA RESTABLECER CONTRASEÑA</a>';		
        $output.='<p>-------------------------------------------------------------</p>';
        $output.='<p>El link expira en 1 dia por razones de seguridad.</p>';
        $output.='<p>Si tu no solicitaste este correo ignoralo</p>';   	
        $output.='<p>Gracias, Saludos cordiales</p>';

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();            
        $mail->CharSet    = 'UTF-8';                                
        $mail->Host       = 'smtp.office365.com';                    
        $mail->SMTPAuth   = true;                                 
        $mail->Username   = 'managerpr@outlook.kr';                    
        $mail->Password   = 'Sistemas18';                                        
        $mail->Port       = 587;                                    
    
        //Recipients
        $mail->setFrom('managerpr@outlook.kr', 'IMSS');
        $mail->addAddress($email, 'Generic code request'); 

    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Codigo de verificación';
        $mail->Body    = $output;
        $mail->AltBody = '';
    
        $mail->send();
        echo json_encode('success');
    } catch (Exception $e) {
        echo json_encode("server_error");
    }
}
else{
    echo json_encode('no_user_error');
}
?>