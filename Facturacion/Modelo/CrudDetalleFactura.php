<?php
class CrudDetalleFactura
{
  public function __construct(){}

  public function InsertarDetalleFactura($DetalleFactura)
  {
    $DetalleInsertado =0;
    $Db = Db::Conectar(); //Conectar a BBDD revisar conexion
    //Definir la insercion a realizar.
    $Insert = $Db->prepare('INSERT INTO detallefacturas (CodigoDetalleFactura, CodigoFactura, CodigoProducto, Cantidad, ValorUnitario, ValorTotal) VALUES(NULL,:CodigoFactura,:CodigoProducto,:Cantidad,:ValorUnitario, :ValorTotal)');
    $Insert->bindValue('CodigoFactura',$DetalleFactura->getCodigoFactura());
    $Insert->bindValue('CodigoProducto',$DetalleFactura->getCodigoProducto());
    $Insert->bindValue('Cantidad',$DetalleFactura->getCantidad());
    $Insert->bindValue('ValorUnitario',$DetalleFactura->getValorUnitario());
    $Insert->bindValue('ValorTotal',$DetalleFactura->getValorTotal());

    try
    {
      $Insert->execute();//ejecutar el INSERT
      $DetalleInsertado = 1;
    }
    catch(Exception $e)
    {
      echo $e->getMessage();//Mostrar errores en la insercion.
      //die();
      //$mensaje = "problemas con el registro detalle factura";
    }
    return $DetalleInsertado;
  }

}


 ?>
