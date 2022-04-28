<?php session_start() ?>

<?php
// ESTILOS TÍTULO HEADER DINÁMICO
($_SERVER["REQUEST_URI"] == "/elsapato/index.php") ? $titulo1 = "🏪 Elsa Pato Store" : $titulo1 = "";
($_SERVER["REQUEST_URI"] == "/elsapato/mujer.php") ? $titulo2 = "👠 Zapatos para Mujer" : $titulo2 = "";
($_SERVER["REQUEST_URI"] == "/elsapato/hombre.php") ? $titulo3 = "👞 Zapatos para Hombre" : $titulo3 = "";
($_SERVER["REQUEST_URI"] == "/elsapato/verano.php") ? $titulo4 = "🎁 Ofertas de Verano" : $titulo4 = "";
($_SERVER["REQUEST_URI"] == "/elsapato/invierno.php") ? $titulo5 = "🎄 Ofertas de Invierno" : $titulo5 = "";
($_SERVER["REQUEST_URI"] == "/elsapato/contacto.php") ? $titulo6 = "📧 Formulario de Contacto" : $titulo6 = "";
($_SERVER["REQUEST_URI"] == "/elsapato/login.php") ? $titulo7 = "🐱‍💻 Inicio de Sesión" : $titulo7 = "";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $titulo1, $titulo2, $titulo3, $titulo4, $titulo5, $titulo6, $titulo7 ?> </title>

    <!-- BOOTSRAP LIBRERIA CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- FONTAWESOME ICONOS -->
    <script src="https://kit.fontawesome.com/de1bc460cb.js" crossorigin="anonymous"></script>
</head>

<body>