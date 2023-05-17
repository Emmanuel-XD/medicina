<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 use PHPMailer\PHPMailer\SMTP;
 
 require '../PHPMailer/Exception.php';
 require '../PHPMailer/PHPMailer.php';
 require '../PHPMailer/SMTP.php';


include "db.php";
$datos = $_POST['dato'];
if($datos == "login"){
    session_start();
    session_destroy();
    echo json_encode("session_closed");
}
if($datos != "login"){
    $email = $_POST['dato'];
    $status = 0;
    $sql_valid_user = mysqli_query($conexion, "SELECT * FROM `user` WHERE `verified`= '".$status."' and `correo`='".$email."';");
    $sql_valid_non_active_links = mysqli_query($conexion, "SELECT * FROM `tmp_verify_code` WHERE `email`='".$email."';");
    $rows_user = mysqli_num_rows($sql_valid_user);
    $rows_code = mysqli_num_rows($sql_valid_non_active_links);
    if($rows_code > 0){
        $curDate = date("Y-m-d H:i:s");
        mysqli_query($conexion, "DELETE FROM tmp_verify_code WHERE `email` = '".$email."'");
    }
    if($rows_user == 1){
        $user = mysqli_fetch_assoc($sql_valid_user);
        $nombre = $user['nombre'];
        $expFormat = mktime(date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y"));
        $expDate = date("Y-m-d H:i:s",$expFormat);
        $key = md5(2418*2 . $email);
        $addKey = substr(md5(uniqid(rand(),1)),3,10);
        $key = $key . $addKey;
        mysqli_query($conexion, "INSERT INTO tmp_verify_code(`email`, `key`, `expDate`) VALUES ('".$email."', '".$key."', '".$expDate."');");
        
            $output='<p>Buen dia estimado/a: '.$nombre.'</p>';
            $output.='<p>Este correo es para confirmar tú identidad.</p>';
            $output.='<p>-------------------------------------------------------------</p>';
            $output.='<p><a href="localhost/medicina/home/verification.php?key='.$key.'&email='.$email.'&action=verify" target="_blank">CLICK AQUI PARA VALIDAR MI CUENTA</a>';		
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
    $phpmailer->addAddress($email, $nombre); 

    $phpmailer->isHTML(true);                                  //Set email format to HTML
       $phpmailer->Subject = 'Correo para verificación de cuenta';
    $phpmailer->Body    = $output;
    $phpmailer->AltBody = '';

    $phpmailer->send();
    echo json_encode('success');
    }
    catch (Exception $e) {
        echo json_encode("mail_error");
    }
    }
    else{
        echo json_encode("verified_user");
    }
}
?>