<?php include "partials/header.php"; ?>
<?php include "partials/nav.php"; ?>

<?php
// Si la sesión existe (admin/admin) muestra el siguiente bloque de código y no ejecutes lo demás
if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
    echo '
        <main>
            <div class="container-fluid">
                <div class="container-sm">
                <div class="row">
                    <h2 class=" pt-5 pb-3 text-uppercase fs-3 fw-bold text-center">
                        Zapatos de Mujer
                    </h2>
                </div>
                <div class=" container-md row">
                    <div class="col">
                        <figure class="text-center">
                            <img src="img/zapatosMujer-1.jpg" class="img-fluid rounded pb-2" alt="...">
                            <blockquote class="blockquote">
                             <p>A Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
                            </blockquote>
                            <figcaption>
                                <a class="w-50 btn btn-primary p-2 m-3 " href="#" role="button">Comprar</a>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col">
                        <figure class="text-center">
                            <img src="img/zapatosMujer-2.jpg" class="img-fluid rounded pb-2" alt="...">
                            <blockquote class="blockquote">
                             <p>A Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
                            </blockquote>
                            <figcaption>
                            <a class="w-50 btn btn-primary p-2 m-3 " href="#" role="button">Comprar</a>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col">
                        <figure class="text-center">
                            <img src="img/zapatosMujer-3.jpg" class="img-fluid rounded pb-2" alt="...">
                            <blockquote class="blockquote">
                             <p>A Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
                            </blockquote>
                            <figcaption>
                            <a class="w-50 btn btn-primary p-2 m-3 " href="#" role="button">Comprar</a>
                            </figcaption>
                        </figure>
                    </div>
                <div class="row">
                    <div class="col">
                        <figure class="text-center">
                            <img src="img/zapatosMujer-4.jpg" class="img-fluid rounded pb-2" alt="...">
                            <blockquote class="blockquote">
                             <p>A Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
                            </blockquote>
                            <figcaption>
                                <a class="w-50 btn btn-primary p-2 m-3 " href="#" role="button">Comprar</a>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col">
                        <figure class="text-center">
                            <img src="img/zapatosMujer-5.jpg" class="img-fluid rounded pb-2" alt="...">
                            <blockquote class="blockquote">
                             <p>A Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
                            </blockquote>
                            <figcaption>
                                <a class="w-50 btn btn-primary p-2 m-3 " href="#" role="button">Comprar</a>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col">
                        <figure class="text-center">
                            <img src="img/zapatosMujer-6.jpg" class="img-fluid rounded pb-2" alt="...">
                            <blockquote class="blockquote">
                             <p>A Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
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
        ';
    include "partials/footer.php";
    die();
}
?>

<main>
    <div class="container-sm vh-100">
        <div class="row justify-content-md-center">
            <h3 class="text-center m-3 p-3 text-uppercase"> Zapatos de mujer</h3>
            <p class="text-center m-3 p-3">Debes iniciar sesión para ver los productos</p>
            <a class="w-50 btn btn-primary p-2 m-3 " href="login.php" role="button">Iniciar sesión</a>

        </div>
    </div>




</main>




<?php include "partials/footer.php"; ?>