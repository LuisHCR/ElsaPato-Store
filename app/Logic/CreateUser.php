<?php

namespace App\Logic;

use App\Classes\Authentication;



function CreateUser() {

  $nuevo_usuario = new Authentication($nombre = "", $correo = "", $password = "", $domicilio = "");

}