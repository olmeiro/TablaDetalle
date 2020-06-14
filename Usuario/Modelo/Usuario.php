<?php

class Usuario
{
  //Atributos de clase:Parametros de entrdada
  private $IdUsuario;
  private $NombreUsuario;
  private $Contrasena;
  private $IdRol;
  private $IdEstado;
  private $Existe; //no estara en la BBDD

  public function __construct(){}

  public function setIdUsuario($IdUsuario)
  {
    $this->IdUsuario = $IdUsuario;
  }

  public function getIdUsuario()
  {
    return $this->IdUsuario;
  }

//Nombre Usuario
  public function setNombreUsuario($NombreUsuario)
  {
    $this->NombreUsuario = $NombreUsuario;
  }

  public function getNombreUsuario()
  {
    return $this->NombreUsuario;
  }

  //Contrasena

  public function setContrasena($Contrasena)
  {
    $this->Contrasena = $Contrasena;
  }

  public function getContrasena()
  {
    return $this->Contrasena;
  }

  //IdRol

  public function setIdRol($IdRol)
  {
    $this->IdRol = $IdRol;
  }

  public function getIdRol()
  {
    return $this->IdRol;
  }

  //IdEstado

  public function setIdEstado($IdEstado)
  {
    $this->IdEstado = $IdEstado;
  }

  public function getIdEstado()
  {
    return $this->IdEstado;
  }

  public function setExiste($Existe)
  {
    $this->Existe = $Existe;
  }

  public function getExiste()
  {
    return $this->Existe;
  }






}

 ?>
