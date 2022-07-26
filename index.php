<?php include "partials/header.php"; ?>
<?php include "partials/nav.php"; ?>

<?php
//  CUENTA ATRAS DE LA PROMOCIÓN 
$fechaFinalOferta = date('2022-07-30');
$horaFinalOferta = date('23:59:59');
$fechayHoraFinalOferta = $fechaFinalOferta . ' ' . $horaFinalOferta;


// Temporary Database
$persons_db = array(
	array(
		'Name' => "Lisa",
		'Picture' => "img/person_1.jpg",
		'Opinion' => "La mejor tienda online que he visitado.",
		'Occupation' => "Creadora de contenido"
	),
	array(
		'Name' => "Mike",
		'Picture' => "img/person_2.jpg",
		'Opinion' => "Me compré unas Jordan 10/10.",
		'Occupation' => "Jugador de baloncesto"
	),
	array(
		'Name' => "Poki",
		'Picture' => "img/person_3.jpg",
		'Opinion' => "Artículos con buen balance calidad/precio.",
		'Occupation' => "Periodista"
	),
)
?>

<main>
	<div class="container-fluid">
		<div id="ropaSlider" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#ropaSlider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				<button type="button" data-bs-target="#ropaSlider" data-bs-slide-to="1" aria-label="Slide 2"></button>
				<button type="button" data-bs-target="#ropaSlider" data-bs-slide-to="2" aria-label="Slide 3"></button>
			</div>
			<div class="carousel-inner">
				<div class="carousel-item">
					<img src="img/pexels-the-lazy-artist-gallery-144652w42.jpg" class=" border border-danger rounded d-block w-100" alt="...">
				</div>
				<div class="carousel-item active">
					<img src="img/pexels-ray-piedra-1503009w2.jpg" class="border border-info rounded d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
					<img src="img/pexels-cottonbro-615336722-2.jpg" class="border border-dark rounded d-block w-100" alt="...">
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#ropaSlider" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Anterior</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#ropaSlider" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Siguiente</span>
			</button>
		</div>
	</div> <br>
	<div class="container">
		<div class="container-fluid text-center">
			<h2>Consigue un cupón de hasta un ¡¡60% de descuento!! para tu próxima compra. </h2>
			<p class="fs-3 fw-bold text-uppercase">⬇ Promoción para nuevos clientes por tiempo limitado ⬇</p>
			<a href="registro.php" class="link-secondary fs-3 fw-bold"> > REGÍSTRATE AHORA < </a>

					<script>
						// Intervalo de tiempo
						const tiempoFinal = "<?= $fechayHoraFinalOferta; ?>";
						const intervaloTiempo = new Date(tiempoFinal).getTime();

						// Actualizar cada segundo
						const t = setInterval(() => {
							const tiempoActual = new Date().getTime();

							// Calcula tiempo restante
							const tiempoRestante = intervaloTiempo - tiempoActual;

							// Calculo por dia, horas, minutos y segundos
							const dias = Math.floor(tiempoRestante / (1000 * 60 * 60 * 24));
							const horas = Math.floor((tiempoRestante % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
							const minutos = Math.floor((tiempoRestante % (1000 * 60 * 60)) / (1000 * 60));
							const segundos = Math.floor((tiempoRestante % (1000 * 60)) / 1000);

							document.getElementById("cuentaAtras").innerHTML = dias + " días " + " | " + horas + " horas " + " | " + minutos + " minutos " + " | " + segundos + " segundos ";

							if (tiempoRestante < 0) {
								clearInterval(t);
								document.getElementById("cuentaAtras").innerHTML = " Se acabó el tiempo de la oferta ";
							}
						}, 1000);
					</script>

					<p id="cuentaAtras" class=" bg-dark text-white rounded fs-1 fw-bolder text-uppercase mt-3"></p>
		</div>
		<div class="container">
			<div class="row">
				<h2 class=" pt-5 pb-3 text-uppercase fs-3 fw-bold text-center">
					Clientes satisfechos
				</h2>
			</div>

			<div class="row">

				<?php foreach ($persons_db as $person) : ?>

					<div class="col">
						<figure class="text-center">
							<img src="<?= $person['Picture'] ?>" class="rounded pb-2" alt="...">
							<blockquote class="blockquote">
								<p> <?= $person['Opinion'] ?></p>
							</blockquote>
							<figcaption class="blockquote-footer">
								<?= $person['Name'] ?>, <cite title="Source Title"><?= $person['Occupation'] ?></cite>
							</figcaption>
						</figure>
					</div>

				<?php endforeach ?>

			</div>
		</div>
	</div>



</main>



<?php include "partials/footer.php"; ?>