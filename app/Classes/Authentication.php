<?php

namespace App\Classes;

class Authentication {

  protected $usuario;
  protected $correo;
  protected $password;
  protected $domicilio;

  function __construct($usuario, $correo, $password, $domicilio) {
    $this->usuario = $usuario;
    $this->correo = $correo;
    $this->password = $password;
    $this->domicilio = $domicilio;
  }
  
  public function getUsuario() {
    return $this->usuario;
  }

  public function getCorreo() {
    return $this->correo;
  }

  public function getPassword() {
    return $this->password;
  }

  public function getDomicilo() {
    return $this->domicilio;
  }

}