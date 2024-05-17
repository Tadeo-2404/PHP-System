<?php
// Importar las clases de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Cargar el autoloader de Composer
require '../vendor/autoload.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // Crear una nueva instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'tadeo.alvarez.regalado@gmail.com'; // Tu dirección de correo electrónico de Gmail
        $mail->Password   = 'lcge tlrw bumt nljd';             // Tu contraseña de Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Destinatario del correo electrónico
        $mail->setFrom('tadeo.alvarez.regalado@gmail.com', 'Mailer');
        $mail->addAddress($email); // Correo del destinatario

        // Contenido del correo electrónico
        $mail->isHTML(true);
        $mail->Subject = 'Mensaje de contacto desde el formulario';
        $mail->Body    = "Nombre: $nombre <br> Email: $email <br> Mensaje: $mensaje";

        // Enviar el correo electrónico
        $mail->send();
        echo '¡El correo electrónico se envió correctamente!';
    } catch (Exception $e) {
        echo "Error al enviar el correo electrónico: {$mail->ErrorInfo}";
    }
} else {
    // Redirigir si se intenta acceder directamente a este script sin enviar el formulario
    header("Location: contacto.php");
    exit();
}
?>
