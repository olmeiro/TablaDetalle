<!-- Controla las peticiones enviadas desde los formularios -->

<?php

session_start();

if(!(isset($_SESSION["NombreUsuario"]))) //si la sesión no existe redireccionar al login:
{
  //redireccionar al al login:
  header("Location:../../index.php");
}

  require_once('../../conexionProfe.php');
  require_once('../Modelo/Producto.php'); //Vincular la clase competencia
  require_once('../Modelo/CrudProducto.php'); //Vincular la clase Crud

  // echo "Controlador";

  $Producto = new Producto();
  $CrudProducto = new CrudProducto();

  if (isset($_POST["Registrar"])) //verifica si la peticion es de registrar
  {
    echo "Registrar";
    //$Producto-> setCodigoProducto($_POST["CodigoProducto"]); //instanciar los atributos
    $Producto-> setNombre($_POST["NombreProducto"]);
    $Producto-> setValorUnitario($_POST["ValorUnitario"]);

    $CrudProducto::InsertarProducto($Producto); //llamar el metodo Insertar
  }
  else if (isset($_POST["Modificar"])) //verifica si la peticion es de registrar
  {
    // echo "Modificar";
    $Producto-> setCodigoProducto($_POST["CodigoProducto"]);
    $Producto-> setNombre($_POST["NombreProducto"]);
    $Producto-> setValorUnitario($_POST["ValorUnitario"]);

    $CrudProducto::ModificarProducto($Producto); //llamar el metodo modificar
  }

  else if ($_GET['Accion']=="EliminarProducto")
  {
    $CrudProducto::EliminarProducto($_GET["CodigoProducto"]);//Llamar al metodo eliminar
    //echo "En desarrollo";
    //echo $_GET["CodigoCompetencia"];

  }

 ?>
