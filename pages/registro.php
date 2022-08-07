<?php include "partials/header.php"; ?>
<?php include "partials/nav.php"; ?>
<?php require_once "app/Logic/CreateUser.php" ?>

<?php  
// Definimos variables y le damos un valor vacío
$error_invalid1 = $error_invalid2 = $error_invalid3 = $error_invalid4 = $error_nombre_feedback = $error_correo_feedback = $error_password_feedback = $error_domicilio_feedback = "";

// Comprobamos que los datos enviados del formulario vengan por el método "POST"
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Si los campos llegan vacíos indicamos error, si no, validamos y limpiamos para guardar los datos en memoria.
    if (empty($_POST["nombre"])) {
        $error_invalid1 = "is-invalid";
        $error_nombre_feedback = '<div class="invalid-feedback">Debes escribir tu nombre de usuario </div>';

        } elseif (!preg_match("/^[a-zA-Z0-9]{3,15}$/",$_POST["nombre"])) { 
        $error_invalid1 = "is-invalid";
        $error_nombre_feedback = '<div class="invalid-feedback">El nombre de usuario puede tener entre 3 y 15 caracteres alfanuméricos </div>';
        
        } else {
            $nombre = limpiar($_POST["nombre"]);
        }
    

    if (empty($_POST["correo"])) {
        $error_invalid3 = "is-invalid";
        $error_correo_feedback = '<div class="invalid-feedback">Debes escribir un correo </div>';
        
        } elseif (!filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL)) {
            $error_invalid3 = "is-invalid";
            $error_correo_feedback = '<div class="invalid-feedback"> El formato del correo debe ser: usuario@email.com </div>';
        
        } else {
            $correo = limpiar($_POST["correo"]);
        }


    if (empty($_POST["password"]) || empty($_POST["password2"]) || $_POST["password"] != $_POST["password2"]) {
        $error_invalid2 = "is-invalid";
        $error_password_feedback = '<div class="invalid-feedback"> Las contraseñas no coinciden o son inválidas </div>';

        } elseif (!preg_match("/^[a-zA-Z0-9]{8,30}$/",$_POST["password"])) {
            $error_invalid2 = "is-invalid";
            $error_password_feedback = '<div class="invalid-feedback"> Las contraseña debe tener entre 8 a 30 caracteres alfanúmericos </div>';
        
        } else {
            $password = limpiar($_POST["password"]);
        }


    if (empty($_POST["domicilio"])) {
        $error_invalid4 = "is-invalid";
        $error_domicilio_feedback = '<div class="invalid-feedback">Debes escribir una dirección de envío </div>';

    } else {
        $domicilio = limpiar($_POST["domicilio"]);
    }

    var_dump($_POST);
}

// Función para eliminar espacios y caracteres especiales de una cadena de texto
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
        <form class="mt-5 m-3 border border-secondary p-5 rounded col-md-auto" method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2 class="h2 mb-3 fs-3 fw-bold text-uppercase text-center p-3"> Formulario de registro </h2> 

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre/Usuario:</label>
                <input type="text" name="nombre" class="form-control <?= $error_invalid1 ?>" id="nombre" placeholder="Escribe un nombre de usuario">
                <?= $error_nombre_feedback ?>
            </div>

            <div class="mb-3">
                <label for="correo" class="form-label">Correo:</label>
                <input type="correo" name="correo" class="form-control <?= $error_invalid3 ?>" id="correo" placeholder="Escribe una dirección de correo electrónico">
                <?= $error_correo_feedback ?>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" name="password" class="form-control <?= $error_invalid2 ?>" id="password" placeholder="Escribe tu contraseña">
                <?= $error_password_feedback ?>
            </div>
            <div class="mb-3">
                <label for="password2" class="form-label">Repetir contraseña:</label>
                <input type="password" name="password2" class="form-control <?= $error_invalid2 ?>" id="password2" placeholder="Repite la contraseña">
                <?= $error_password_feedback ?>
            </div>
          
            <div class="mb-3">
                <label for="domicilio" class="form-label">Domicilio:</label>
                <input type="text" name="domicilio" class="form-control <?= $error_invalid4 ?>" id="domicilio" placeholder="Escribe tu dirección de envío">
                <?= $error_domicilio_feedback ?>
            </div>


            <button class="w-100 btn btn-lg btn-primary p-2 mb-2" type="submit">Registrar</button>
        </form>
    </div>
</div>


<?php include "partials/footer.php"; ?>