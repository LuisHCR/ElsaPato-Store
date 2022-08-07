<?php

$page = $_GET["page"] ?? null;

switch ($page) {
	case "contacto":
		require("pages/contacto.php");
		break;

	case "login":
		require("pages/login.php");
		break;

	case "logout":
		require("pages/logout.php");
		break;

	case "registro":
		require("pages/registro.php");
		break;

	case "hombre":
		require("pages/hombre.php");
		break;

	case "mujer":
		require("pages/mujer.php");
		break;

	case "verano":
		require("pages/verano.php");
		break;

	case "dashboard":
		require("pages/dashboard.php");
		break;

	default:
		require("pages/home.php");
		break;
}