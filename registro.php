<?php include "partials/header.php"; ?>
<?php include "partials/nav.php"; ?>

<?php  
// Definimos variables y le damos un valor vacío
$error_invalid = $error_nombre_feedback = $error_correo_feedback = $error_password_feedback = $error_domicilio_feedback = "";
?>


<div class="container-sm form-signin">
    <!-- Tratamos los datos enviados del formulario en la misma página con $_SERVER["PHP_SELF"]  y con la función htmlspecialchars() prevenimos ataques Cross-Site Scripting (XSS)-->
    <div class="row justify-content-md-center">
        <form class="mt-5 m-3 border border-secondary p-5 rounded col-md-auto" method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2 class="h2 mb-3 fs-3 fw-bold text-uppercase text-center p-3"> Formulario de registro </h2> 

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" class="form-control <?= $error_invalid ?>" id="nombre" placeholder="Tu nombre...">
                <?= $error_nombre_feedback ?>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="text" name="password" class="form-control <?= $error_invalid ?>" id="password" placeholder="Tu contraseña...">
                <?= $error_password_feedback ?>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Repetir contraseña:</label>
                <input type="text" name="nombre" class="form-control <?= $error_invalid ?>" id="nombre" placeholder="Repetir contraseña...">
                <?= $error_password_feedback ?>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo:</label>
                <input type="correo" name="correo" class="form-control <?= $error_invalid ?>" id="correo" placeholder="Tu correo...">
                <?= $error_correo_feedback ?>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Domicilio:</label>
                <input type="correo" name="correo" class="form-control <?= $error_invalid ?>" id="correo" placeholder="Tu dirección de envío...">
                <?= $error_domicilio_feedback ?>
            </div>


            <button class="w-100 btn btn-lg btn-primary p-2 mb-2" type="submit">Registrar</button>
        </form>
    </div>
</div>


<?php include "partials/footer.php"; ?>