<?php
  class Factura
  {
      //Parámetros de entrada
      private $CodigoFactura; //talcual esta en BBDD
      private $CodigoCliente;
      private $FechaFactura;

      //definir constructor:
      public function __construct(){}

      //Setter y getters para cada atributo de la clase:

      public function setCodigoFactura($CodigoFactura)
      {
        $this ->CodigoFactura = $CodigoFactura;
      }

      public function getCodigoFactura()
      {
        return $this -> CodigoFactura;
      }

      public function setCodigoCliente($CodigoCliente)
      {
        $this ->CodigoCliente = $CodigoCliente;
      }

      public function getCodigoCliente()
      {
        return $this -> CodigoCliente;
      }

      public function setFechaFactura($FechaFactura)
      {
        $this ->FechaFactura = $FechaFactura;
      }

      public function getFechaFactura()
      {
        return $this -> FechaFactura;
      }

  }

  //testear que la clase y métodos funcionan:

  // $Competencia = new Competencia(); //creo SplObjectStorage
  // $Competencia -> setCodigoCompetencia(27);
  // $Competencia -> setNombreCompetencia('Python');
  // echo "Código competencia: " . $Competencia->getCodigoCompetencia().
  //       " Nombre competencia: " . $Competencia-> getNombreCompetencia();


 ?>
