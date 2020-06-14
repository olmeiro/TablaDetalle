<?php
class CrudDetalleFactura
{
  public function __construct(){}

  public function InsertarDetalleFactura($DetalleFactura)
  {
    $Db = Db::Conectar(); //Conectar a BBDD revisar conexion
    //Definir la insercion a realizar.
    $Insert = $Db->prepare('INSERT INTO detallefacturas VALUES(:CodigoDetalleFactura,
                                                               :CodigoFactura,
                                                               :CodigoProducto,
                                                               :Cantidad,
                                                               :$ValorUnitario)');
    //$Insert->bindValue('CodigoFactura','');
    //$Insert->bindValue('CodigoDetalleFactura',$DetalleFactura->setCodigoDetalleFactura());
    $Insert->bindValue('CodigoDetalleFactura','');
    $Insert->bindValue('CodigoFactura',$DetalleFactura->getCodigoFactura());
    $Insert->bindValue('CodigoProducto',$DetalleFactura->getCodigoProducto());
    $Inset->bindValue('Cantidad',$DetalleFactura->getCantidad());
    $Insert->bindValue('ValorUnitario',$DetalleFactura->getValorUnitario());
    try
    {
      $Insert->execute();//ejecutar el INSERT
      $mensaje = "Registro exitoso detalle factura";
    }
    catch(Exception $e)
    {
      //echo $e->getMessage();//Mostrar errores en la insercion.
      //die();
      $mensaje = "problemas con el registro detalle factura";
    }
    return $mensaje;
  }

}


 ?>
