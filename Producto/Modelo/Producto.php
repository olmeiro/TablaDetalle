<?php
  class Producto
  {
      //Parámetros de entrada
      private $CodigoProducto; //talcual esta en BBDD
      //private $NombreProducto;
      private $Cantidad;
      private $ValorUnitario;

      //definir constructor:
      public function __construct(){}

      //Setter y getters para cada atributo de la clase:

      public function setCodigoProducto($CodigoProducto)
      {
        $this ->CodigoProducto = $CodigoProducto;
      }

      public function getCodigoProducto()
      {
        return $this -> CodigoProducto;
      }

      public function setCantidad($Cantidad)
      {
        $this ->Cantidad = $Cantidad;
      }

      public function getCantidad()
      {
        return $this -> Cantidad;
      }

      public function setValorUnitario($ValorUnitario)
      {
        $this ->ValorUnitario = $ValorUnitario;
      }

      public function getValorUnitario()
      {
        return $this -> ValorUnitario;
      }

  }

  //testear que la clase y métodos funcionan:

  // $Competencia = new Competencia(); //creo SplObjectStorage
  // $Competencia -> setCodigoCompetencia(27);
  // $Competencia -> setNombreCompetencia('Python');
  // echo "Código competencia: " . $Competencia->getCodigoCompetencia().
  //       " Nombre competencia: " . $Competencia-> getNombreCompetencia();


 ?>
