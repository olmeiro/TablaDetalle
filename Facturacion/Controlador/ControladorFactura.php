<!-- Controla las peticiones enviadas desde los formularios -->

<?php

session_start();

if(!(isset($_SESSION["NombreUsuario"]))) //si la sesión no existe redireccionar al login:
{
  //redireccionar al al login:
  header("Location:../../index.php");
}


  require_once('../../conexionProfe.php');
  require_once('../Modelo/Factura.php'); //Vincular la clase competencia
  require_once('../Modelo/DetalleFactura.php');
  require_once('../Modelo/CrudFactura.php'); //Vincular la clase Crud
  require_once('../Modelo/CrudDetalleFactura.php');
  // echo "Controlador";


    $Factura = new Factura();
    $DetalleFactura = new DetalleFactura();
    $CrudFactura = new CrudFactura();
    $CrudDetalleFactura = new CrudDetalleFactura();

    //echo $CodigoFacturaGenerado;

    if (isset($_POST["Registrar"]))
    {
      $Factura->setCodigoCliente($_POST['CodigoCliente']);
      $CodigoFacturaGenerado=$CrudFactura::InsertarFactura($Factura);

    if($CodigoFacturaGenerado>-1)
    {
      for($ConsecutivoProducto=1;$ConsecutivoProducto<=$_POST['ProductosAgregados'];$ConsecutivoProducto++)
      {
        $CodigoProducto = "CodigoProducto".$ConsecutivoProducto; //undestood
        if(isset($_POST[$CodigoProducto]))
        {
          $Cantidad = "CantidadProducto".$ConsecutivoProducto;
          $ValorUnitario = "PrecioProducto".$ConsecutivoProducto;
          $DetalleFactura->setCodigoFactura($CodigoFacturaGenerado);
          $DetalleFactura->setCodigoProducto($_POST['$CodigoProducto']);
          $DetalleFactura->setCantidad($_POST['$Cantidad']);
          $DetalleFactura->setValorUnitario($_POST['$ValorUnitario']);
          $CrudDetalleFactura::InsertarDetalleFactura($DetalleFactura);
        }
      }
      echo "Registro exitoso controlador";
    }

  }




  // if (isset($_POST["Registrar"])) //verifica si la peticion es de registrar
  // {
  //   echo "Registrar";
  //   $Factura-> setCodigoFactura($_POST["CodigoFactura"]); //instanciar los atributos
  //   $Factura-> setCodigoCliente($_POST["CodigoCliente"]);
  //   $Factura->setFechaFactura($_POST['FechaFactura']);
  //
  //   echo $(); //Se verifica instanciacion.
  //   echo $Competencia->getNombreCompetencia();
  //
  //   $CrudCompetencia::InsertarCompetencia($Competencia); //llamar el metodo Insertar
  // }
  // else if (isset($_POST["Modificar"])) //verifica si la peticion es de registrar
  // {
  //   // echo "Modificar";
  //   $Competencia-> setCodigoCompetencia($_POST["CodigoCompetencia"]); //instanciar los atributos
  //   $Competencia-> setNombreCompetencia($_POST["NombreCompetencia"]);
  //
  //   $CrudCompetencia::ModificarCompetencia($Competencia); //llamar el metodo modificar
  // }
  //
  // else if ($_GET['Accion']=="EliminarCompetencia")
  // {
  //   $CrudCompetencia::EliminarCompetencia($_GET["CodigoCompetencia"]);//Llamar al metodo eliminar
  //   //echo "En desarrollo";
  //   //echo $_GET["CodigoCompetencia"];
  //
  // }
  //
 ?>
