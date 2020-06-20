<?php

session_start();

if (!(isset($_SESSION["NombreUsuario"]))) {
 header("location:../../Index.php");
}

require_once('../../ConexionProfe.php');
require_once('../Modelo/Factura.php');// vincular la clase
require_once('../Modelo/DetalleFactura.php');
require_once('../Modelo/CrudFactura.php');
require_once('../Modelo/CrudDetalleFactura.php');
require_once('../../Cliente/Modelo/Cliente.php');
require_once('../../Cliente/Modelo/CrudCliente.php');


$Factura = new Factura(); // creal el objeto competencia
$CrudFactura = new CrudFactura();
$DetalleFactura = new DetalleFactura();
$CrudDetalleFactura = new CrudDetalleFactura();

//echo $CodigoFacturaGenerado;



if (isset($_POST["Registrar"])){// si lapeticion se registra

     $Factura->setCodigoCliente($_POST["CodigoCliente"]);
     $CodigoFacturaGenerado=$CrudFactura::InsertarFactura($Factura);

     if($CodigoFacturaGenerado>-1){

          $ProductosAgregar = $_POST["ProductosAgregados"];
          $RegistroExitoso = 0;

          for($ConsecutivoProducto=1;$ConsecutivoProducto<=$ProductosAgregar;$ConsecutivoProducto++)
          {
               $DetalleFactura->setCodigoFactura($CodigoFacturaGenerado);
               $CodigoProducto = "CodigoProducto".$ConsecutivoProducto;
               if(isset($_POST[$CodigoProducto]))
               {

                    $DetalleFactura->setCodigoProducto($_POST[$CodigoProducto]);
                    $CantidadProducto = "CantidadProducto".$ConsecutivoProducto;
                    $DetalleFactura->setCantidad($_POST[$CantidadProducto]);
                    $PrecioProducto= "PrecioProducto".$ConsecutivoProducto;
                    $DetalleFactura->setValorUnitario($_POST[$PrecioProducto]);
                    $ValorDetalle = "ValorDetalle".$ConsecutivoProducto;
                    $DetalleFactura->setValorTotal($_POST[$CantidadProducto]*$_POST[$PrecioProducto]);

                    $RegistroExitoso =$CrudDetalleFactura::InsertarDetalleFactura($DetalleFactura);
               }
          }
          if ($RegistroExitoso==1) {
               echo "Registro Detalle exitoso";
          }
          else
          {
               echo " Error en el Registro";
          }

     }
}

?>
