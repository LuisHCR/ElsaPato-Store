<?php include "partials/header.php"; ?>
<?php include "partials/nav.php"; ?>


<?php
// Definimos variables y le damos un valor vacío
$error_invalid = $error_user_feedback = $error_pass_feedback = $error_login_feedback = $username = $password = $log = "";

// Comprobamos que los datos enviados del formulario vengan por el método "POST"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Si los campos llegan vacíos indicamos error, si no, limpiamos string y validamos si usuario/password = admin para crear sesión
    if (empty($_POST["username"])) {
        $error_invalid = "is-invalid";
        $error_user_feedback = '<div class="invalid-feedback">Debes escribir tu nombre de usuario </div>';
    } else {
        $username = limpiar($_POST["username"]);
        if ($username === "admin") {
            $_SESSION["username"] = $username;
        } else {
            $error_invalid = "is-invalid";
            $error_login_feedback = '<div class="invalid-feedback">Usuario o contraseña incorrecta </div>';
        }
    }
    if (empty($_POST["password"])) {
        $error_invalid = "is-invalid";
        $error_pass_feedback = '<div class="invalid-feedback">Debes escribir tu contraseña </div>';
    } else {
        $password = limpiar($_POST["password"]);
        if ($password == "admin") {
            $_SESSION["password"] = $password;
        } else {
            $error_invalid = "is-invalid";
            $error_login_feedback = '<div class="invalid-feedback">Usuario o contraseña incorrecta </div>';
        }
    }
}

// Función para eliminar espacios y caracteres especiales de una cadena de texto
function limpiar($datos)
{
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

// function logger($log)
// {
//     if (!file_exists("../../log.txt")) {
//         file_put_contents("../../log.txt", "");
//     }
//     $ip = $_SERVER["REMOTE_ADDR"];
//     $time = date("m/d/y h:iA", time());

//     $contents  = file_get_contents("../../log.txt");
//     $contents .= "$ip\t$time\t$log\r";

//     file_put_contents("../../log.txt", $contents);
// }

?>


<?php
// Si la sesión existe (admin/admin) muestra el siguiente bloque de código y no ejecutes lo demás
if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
    echo '
        <main>
            <div class="container-fluid">     
                <div class="container-sm">
                    <div class="alert alert-success role="alert">
                    <i class="fa-solid fa-circle-check pe-2"></i> Sesión iniciada correctamente
                </div>

                <div class="container-sm ">
                    <h2 class="text-center m-5"> Bienvenido ' . $username . '</h2> 
                    <h3 class="text-center m-5"> Redirigiendo a la página de ofertas...</h3>

                    <script>
                    const redireccion = setTimeout(() => {
                        window.location.replace("http://localhost/elsapato/verano.php");
                    }, 5000);
                    </script>
                 </div>
            </div>
        </main>        
        ';
    include "partials/footer.php";

    die();
}

// Bloque que se muestra por defecto cuando no existe una sesión
?>
<main>
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col d-none d-md-block">
                <img src="https://images.pexels.com/photos/5872363/pexels-photo-5872363.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="img-fluid" />
            </div>
            <div class="col form-signin">
                <!-- Tratamos los datos enviados del formulario en la misma página con $_SERVER["PHP_SELF"]  y con la función htmlspecialchars() prevenimos ataques Cross-Site Scripting (XSS)-->
                <form class="p-5" method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <h1 class="h3 mb-3 fs-3 fw-bold text-uppercase text-center p-3">Iniciar sesión</h1>

                    <div class="mb-3">
                        <label for="username" class="form-label">Usuario</label>
                        <input type="text" name="username" class="form-control <?= $error_invalid ?>" id="username" placeholder="Tu nombre de usuario">
                        <?= $error_login_feedback ?>
                        <?= $error_user_feedback ?>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" name="password" class="form-control <?= $error_invalid ?>" id="password" placeholder="Tu contraseña">
                        <?= $error_login_feedback ?>
                        <?= $error_pass_feedback ?>
                    </div>

                    <div class="checkbox mb-3 p-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Recordarme
                        </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary p-2 mb-2" type="submit">Iniciar</button>
                    <a class="w-100 btn btn-lg btn-primary p-2 mb-2" href="logout.php" role="button">Cerrar sesión</a>

                </form>
            </div>
        </div>
    </div>
</main>

<?php include "partials/footer.php"; ?>