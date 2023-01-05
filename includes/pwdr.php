<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

include "db.php";
$email = $_POST['email'];
$query = "SELECT * FROM user WHERE correo = '$email'";
$result = mysqli_query($conexion, $query);
$rows = mysqli_num_rows($result);
if($rows > 0){

    $code = 0000;

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();                                            
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
        $mail->Subject = 'Codigo de verificacion';
        $mail->Body    = "Tu código de verificación es: $code";
        $mail->AltBody = '';
    
        $mail->send();
        echo json_encode('success');
    } catch (Exception $e) {
        echo json_encode("send_error");
    }
}
else{
    echo json_encode('no_user_error');
}
?>