<?php include "partials/header.php"; ?>
<?php include "partials/nav.php"; ?>


<!-- Si la sesión existe (admin/admin) muestra el siguiente bloque de código y no ejecutes lo demás -->
<?php if (isset($_SESSION["username"]) && isset($_SESSION["password"])) : ?>
    <main>
        <div class="container-fluid">
            <div class="container-md">
                <div class="row">
                    <h2 class=" pt-5 pb-3 text-uppercase fs-3 fw-bold text-center">
                        Ofertas de verano
                    </h2>
                </div>
                <div class="row">
                    <div class="m-3 col">
                        <figure class="text-center">
                            <img src="img/oferta_1.jpg" class="img-fluid rounded pb-2" alt="...">
                            <blockquote class="blockquote">
                                <p>A well-known quote, contained in a blockquote element.</p>
                            </blockquote>
                            <figcaption>
                            <a class="w-50 btn btn-primary p-2 m-3 " href="#" role="button">Comprar</a>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="m-3 col">
                        <figure class="text-center">
                            <img src="img/oferta_2.jpg" class="img-fluid rounded pb-2" alt="...">
                            <blockquote class="blockquote">
                                <p>A well-known quote, contained in a blockquote element.</p>
                            </blockquote>
                            <figcaption>
                            <a class="w-50 btn btn-primary p-2 m-3 " href="#" role="button">Comprar</a>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
<?php
    include "partials/footer.php";
    die();
    endif;
?>

<main>
    <div class="container-sm vh-100">
        <div class="row justify-content-md-center">
            <h3 class="text-center m-3 p-3 text-uppercase"> Ofertas de verano</h3>
            <p class="text-center m-3 p-3">Debes iniciar sesión para ver los productos</p>
            <a class="w-50 btn btn-primary p-2 m-3 " href="login.php" role="button">Iniciar sesión</a>

        </div>
    </div>
</main>


<?php include "partials/footer.php"; ?>