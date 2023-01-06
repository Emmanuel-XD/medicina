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


if($rows > 0){

    $expFormat = mktime(date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y"));
    $expDate = date("Y-m-d H:i:s",$expFormat);
    $key = md5(2418*2 . $email);
    $addKey = substr(md5(uniqid(rand(),1)),3,10);
    $key = $key . $addKey;
    mysqli_query($conexion, "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES ('".$email."', '".$key."', '".$expDate."');");

        $output='<p>Dear user,</p>';
        $output.='<p>Please click on the following link to reset your password.</p>';
        $output.='<p>-------------------------------------------------------------</p>';
        $output.='<p><a href="localhost/medicina/includes/reset-password.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">
       CLICK HERE';		
        $output.='<p>-------------------------------------------------------------</p>';
        $output.='<p>The link will expire after 1 day for security reason.</p>';
        $output.='<p>Si tu no solicitaste este correo ignoralo</p>';   	
        $output.='<p>Gracias,</p>';

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
        $mail->Body    = $output;
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