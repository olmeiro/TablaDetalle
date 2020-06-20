<?php

class Cliente
{
  private $CodigoCliente;
  private $NombreCliente;
  private $ApellidosCliente;
  private $DireccionCliente;

  public function __construct (){}

  public function setCodigoCliente($CodigoCliente)
  {
    $this->CodigoCliente = $CodigoCliente;
  }

  public function getCodigoCliente()
  {
    return $this->CodigoCliente;
  }

  public function setNombreCliente($NombreCliente)
  {
    $this->NombreCliente = $NombreCliente;
  }

  public function getNombreCliente()
  {
    return $this->NombreCliente;
  }

  public function setApellidosCliente($ApellidosCliente)
  {
    $this->ApellidosCliente = $ApellidosCliente;
  }

  public function getApellidosCliente()
  {
    return $this->ApellidosCliente;
  }

  public function setDireccionCliente($DireccionCliente)
  {
    $this->DireccionCliente = $DireccionCliente;
  }

  public function getDireccionCliente()
  {
    return $this->DireccionCliente;
  }
}
?>
