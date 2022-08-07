<?php include "partials/header.php"; ?>
<?php include "partials/nav.php"; ?>


<?php if(isset($_SESSION["username"]) && isset($_SESSION["password"])): ?>

<main>
  <div class=" container-sm vh-100 mt-5">
    <h2 class="text-center p-5"> Panel de control del usuario <span class="fw-bold"> <?= $_SESSION["username"] ?></span></h2> 
  </div>
</main>

<?php   
    include "partials/footer.php";
    die();
?>


<?php else : ?>

<main class="vh-100">
  <div class="container-sm mt-5 mb-5">
    <h2 class="text-center p-5"> Error 403: Acceso denegado. </h2> 
    <p class="text-center"><a class="btn btn-primary" role="button" href="login.php">Iniciar sesión</a></p>
  </div>
</main>

<?php  endif ?>

<?php include "partials/footer.php"; ?>