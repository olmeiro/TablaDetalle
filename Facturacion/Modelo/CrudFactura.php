<?php
  // require_once('../conexion.php');
  // require_once('../../conexionProfe.php');
  // require_once('Competencia.php');

  class CrudFactura
  {
    public function __construct(){}

      public function InsertarFactura($Factura) //Se recibe objeto Competencia
       {
           $CodigoFactura = -1;
           $Db = Db::Conectar(); //Conectar a BBDD revisar conexion
           //Definir la insercion a realizar.
           $Insert = $Db->prepare('INSERT INTO facturas VALUES(NULL, :CodigoCliente, NOW())');
           //$Insert->bindValue('CodigoFactura','');
           $Insert->bindValue('CodigoCliente',$Factura->getCodigoCliente());
           //$Insert->bindValue('FechaFactura', $Factura->getFechaFactura());

           try
           {
             $Insert->execute();//ejecutar el INSERT
             echo "Registro exitoso factura";
             $CodigoFacturaGenerado = $Db->lastInsertID(); //consultar el ultimo Id de la sesion generado
           }
           catch(Exception $e)
           {
             echo $e->getMessage();//Mostrar errores en la insercion.
             die();
           }
           return $CodigoFacturaGenerado; //retornar el ultimo Id generado
       }
     }

 ?>
