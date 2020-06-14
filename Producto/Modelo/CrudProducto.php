<?php
  // require_once('../conexion.php');
  // require_once('../../conexionProfe.php');
  // require_once('Competencia.php');

  class CrudCompetencia
  {
    public function __construct(){}

    public function InsertarProducto($Producto) //Se recibe objeto Competencia
    {
        $Db = Db::Conectar(); //Conectar a BBDD revisar conexion
        //Definir la insercion a realizar.
        $Insert = $Db->prepare('INSERT INTO productos VALUES(:CodigoProducto, :Cantidad, :ValorUnitario)');
        $Insert->bindValue('CodigoProducto',$Producto->getCodigoProducto());
        $Insert->bindValue('Cantidad',$Producto->getCantidad());
        $Insert->bindValue('ValorUnitario',$Producto->getValorUnitario());

        try
        {
          $Insert->execute();//ejecutar el INSERT
          echo "Registro exitoso de productos";
        
        }
        catch(Exception $e)
        {
          echo $e->getMessage();//Mostrar errores en la insercion.
          die();
        }
    }
  }

 ?>
