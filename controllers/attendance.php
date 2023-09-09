<?php
ob_start();
session_start();
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



$nombre = $_POST['nom'];
$celular = $_POST['cel'];
$email = $_POST['email'];
$asistencia = $_POST['selec'];


// Save Data base

include("../db/connection.php");

$con = connect();
try {
  if (empty($nombre) || empty($celular) || empty($email)) {
    $_SESSION['alerta'] = 'Hay campos sin llenar';
    header('Location: ../index.html');
    exit;
  } else {

    $sql_ = "SELECT * FROM asistencia WHERE celular='$celular'";
    $query_ =  mysqli_query($con, $sql_);
    $filasa = mysqli_num_rows($query_);

    $sql__ = "SELECT * FROM asistencia WHERE email='$email'";
    $query__ =  mysqli_query($con, $sql__);
    $filasa_ = mysqli_num_rows($query__);

    if ($filasa == 0 && $filasa_ == 0) {

      $sql = "INSERT INTO asistencia VALUES('$nombre','$celular','$email','$asistencia')";
      $query = mysqli_query($con, $sql);

      $mensaje = "
<!DOCTYPE html>
<html lang='es'>
  <head>
    <meta charset='UTF-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <title>Mensaje</title>

    <style>
      @import url('https://fonts.googleapis.com/css2?family=Lora:ital@1&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Courgette&display=swap');
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        color:#000000;
      }

      .container {
        text-align: center;
        color: black;
        min-width: 500px;
        max-width: 1000px;
        width: 100%;
        margin: 0 auto;
      }
      .bg {
        display: grid;
        place-items: center;
        background-color: white;
        margin-top: 40px;
        padding: 20px 0;
      }
      .alert {
        color: black;
        text-align: center;
        font-size: 1.5em;
        position: relative;
        padding: 0.75rem 1.25rem;
        margin-bottom: 2rem;
        border: 1px solid transparent;
        border-radius: 0.25rem;
      }
      .alert-primary {
        color: black;
        margin: auto;
        text-align: center;
        text-align: center;
        margin-top: 20px;
        font-family: 'Lora', serif;
        width: 500px;
      }

      .img-fluid {
        max-width: 100%;
        height: auto;
        margin: auto;
      }

      .mensaje {
        color: black;
        width: 100%;
        display: grid;
        place-items: center;
        text-align: center;
        font-size: 20px;
        margin: 0 auto 40px;
      }

      .texto {
        color: black;
        font-size: 50px;
        text-align: center;
        font-family: 'Roboto', sans-serif;
        
      }

      .footer {
        width: 100%;
        text-align: center;
        opacity: 0.8;
        padding: 10px;
        font-size: 14px;
        font-family: 'Lora', serif;
        color: black;
      }
      h2 {
        margin-top: 20px;
        font-size: 26px;
        text-align: center;
        font-family: 'Courgette', cursive;
        color: #a85204;
      }
    </style>
  </head>
  <body>
    <div class='container'>
      <div class='bg'>
        <div class='mensaje'>
          <img
            class='img-fluid'
            src='https://i.ibb.co/BPr5KLT/logocorreo.png'
            alt='Mensaje'
          />
          <div class='alert alert-primary'>
            <strong>Gracias $nombre por confirmar.</strong>
          </div>
          <div class='texto'><strong>JULIO & MAYA</strong></div>
        </div>

        <div class='footer'><h1>wedding weekend</h1></div>
        <h2>¡Los esperamos!</h2>
      </div>
    </div>
  </body>
</html>";

      if (isset($_POST['enviar']) && $asistencia === "Si") {


        $mail = new PHPMailer(true);

        try {

          $mail->isSMTP();
          $mail->Host       = 'smtp.hostinger.com';
          $mail->SMTPAuth   = true;
          $mail->Username   = 'invitaciones@julioymaya.com';
          $mail->Password   = '1889Fegus123*';
          $mail->SMTPSecure = 'ssl';
          $mail->Port       = 465;

          $mail->setFrom('invitaciones@julioymaya.com', 'J&M');
          $mail->addAddress($email, 'Invitado');

          $mail->isHTML(true);
          $mail->Subject = 'GRACIAS POR ASISTIR';
          $mail->Body    = $mensaje;

          $mail->send();
          echo 'Enviado correctamente';
        } catch (Exception $e) {
          echo "Error al enviar: {$mail->ErrorInfo}";
        }
      }


      if ($query) {
        header("Location:" . $_SERVER['HTTP_REFERER']);
      } else {
        $_SESSION['alerta'] = 'Error en el ingreso del registro';
        header('Location: ../index.html');
        exit;
      }
    } else {
      $_SESSION['alerta'] = 'La cedula o el correo ya existen';
      header('Location: ../index.html');
      exit;
    }
  }
} catch (\Throwable $th) {
}
