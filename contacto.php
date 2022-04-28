<?php include "partials/header.php"; ?>
<?php include "partials/nav.php"; ?>

<?php
/**********************************************************
Creamos una cuenta temporal en: https://yopmail.com/
Crear cuenta en mailjet.com y validar la cuenta activadola con un email que nos mandan.
 ***********************************************************/

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require './vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

// Definimos variables y le damos un valor vacío
$error_invalid = $error_nombre_feedback = $error_correo_feedback = $error_mensaje_feedback = $nombre = $correo = $mensaje = "";
$nombreVal = $correoVal  = false;

// Comprobamos que los datos enviados del formulario vengan por el método "POST"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Si existe un nombre, limpiamos string y validamos, si no, indicamos error
    if (isset($_POST["nombre"])) {
        $nombre = limpiar($_POST["nombre"]);
        if (preg_match("/^[a-zA-Z]{2,15}$/", $nombre)) {
            $nombreVal = true;
        } else {
            $error_invalid = "is-invalid";
            $error_nombre_feedback = '<div class="invalid-feedback">Debes escribir un nombre</div>';
        }
    }
    // Si existe un correo, limpiamos string y validamos, si no, indicamos error
    if (isset($_POST["correo"])) {
        $correo = limpiar($_POST["correo"]);
        $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
        if (preg_match($pattern, $correo)) {
            $correoVal = true;
        } else {
            $error_invalid = "is-invalid";
            $error_correo_feedback = '<div class="invalid-feedback">Debes escribir una dirección de correo correctamente</div>';
        }
    }

    // Si no está vacío el campo del mensaje y lo demás está validado enviamos email
    if ((!empty($_POST["mensaje"])) && $nombreVal && $correoVal) {
        $mensaje = $_POST["mensaje"];
        echo '  <div class="container-sm">
        <div class="alert alert-success role="alert">
        <i class="fa-solid fa-circle-check pe-2"></i> Mensaje enviado correctamente
        </div>';


        try {
            //API ec61b36f321f2b1cfb864b4b50eba798
            //CLAVE 087d8ac9bfa991d3f648b44d0a3e17a9

            $mail->isSMTP();
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->Host = 'in-v3.mailjet.com'; // host
            $mail->SMTPAuth = true;
            $mail->Username = 'ec61b36f321f2b1cfb864b4b50eba798'; //API_KEY username
            $mail->Password = '087d8ac9bfa991d3f648b44d0a3e17a9'; //SECRET_KEY password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587; //smtp port

            //$mail->setFrom('SENDER_EMAIL_ADDRESS', 'SENDER_NAME');
            $mail->setFrom('alt.r9-cf9twca@yopmail.com');
            //$mail->addAddress('RECIPIENT_EMAIL_ADDRESS', 'RECIPIENT_NAME');
            $mail->addAddress('yo_victor@yahoo.es');

            $mail->isHTML(true);
            $mail->Subject = 'Formulario de contacto';
            $mail->Body = ' 
            Remitente: ' . $nombre . ' </br>
            Correo: ' . $correo . ' </br>
            Mensaje:  </br>' . $mensaje;

            if (!$mail->send()) {
                echo 'Error: ' . $mail->ErrorInfo;
            } else {
                //         echo 'Mensaje enviado con éxito. <br>
                // <a href="contacto.php> Click aquí para volver atrás </a>';
            }
        } catch (Exception $e) {
            echo "El mensaje no pudo ser enviado. Error: {$mail->ErrorInfo}";
        }
    } else {
        $error_invalid = "is-invalid";
        $error_mensaje_feedback = '<div class="invalid-feedback">Este campo no puede estar vacío</div>';
    }
}

function limpiar($datos)
{
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

?>


<div class="container-sm form-signin">
    <!-- Tratamos los datos enviados del formulario en la misma página con $_SERVER["PHP_SELF"]  y con la función htmlspecialchars() prevenimos ataques Cross-Site Scripting (XSS)-->
    <div class="row justify-content-md-center">
        <h3 class="text-center m-3">Rellena el siguiente formulario para ponerte en contacto con nosotros.</h3>
        <form class="mt-5 m-3 border border-secondary p-5 rounded col-md-auto" method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h3 class="h3 mb-3 fs-3 fw-bold text-uppercase text-center p-3">Formulario de contacto</h3>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" class="form-control <?= $error_invalid ?>" id="nombre" placeholder="Tu nombre...">
                <?= $error_nombre_feedback ?>
            </div>

            <div class="mb-3">
                <label for="correo" class="form-label">Correo:</label>
                <input type="correo" name="correo" class="form-control <?= $error_invalid ?>" id="correo" placeholder="Tu correo...">
                <?= $error_correo_feedback ?>
            </div>
            <div class="mb-3">
                <label class="form-label" for="textarea">Mensaje:</label>
                <textarea class="form-control <?= $error_invalid ?> " name="mensaje" placeholder="Escribe aquí tu mensaje" id="textarea" style="height: 100px"></textarea>
                <?= $error_mensaje_feedback ?>
            </div>


            <button class="w-100 btn btn-lg btn-primary p-2 mb-2" type="submit">Enviar</button>
        </form>
    </div>
</div>
<div class="container-sm mt-5 text-center">
    <h3 class="m-5">Ubicación del local</h3>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3535.033489780522!2d-0.535208505849655!3d38.302352173790744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6237a389dad265%3A0x15af7ad81ed13040!2sFEMPA!5e0!3m2!1sen!2ses!4v1650357094646!5m2!1sen!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<?php include "partials/footer.php"; ?>