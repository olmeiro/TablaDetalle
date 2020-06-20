<!-- Controla las peticiones enviadas desde los formularios -->

<?php
session_start();

if(!(isset($_SESSION["NombreUsuario"]))) //si la sesión no existe redireccionar al login:
{
  //redireccionar al al login:
  header("Location:../../index.php");
}
  require_once('../../conexionProfe.php');
  require_once('../Modelo/Cliente.php'); //Vincular la clase competencia
  require_once('../Modelo/CrudCliente.php'); //Vincular la clase Crud
  // echo "Controlador";

  $Cliente = new Cliente();
  $CrudCliente = new CrudCliente();

  if (isset($_POST["Registrar"])) //verifica si la peticion es de registrar
  {
    echo "Registrar";
    //$Cliente-> setCodigoCliente($_POST["CodigoCliente"]); //instanciar los atributos
    $Cliente-> setNombreCliente($_POST["NombreCliente"]);
    $Cliente-> setApellidosCliente($_POST["ApellidosCliente"]);
    $Cliente-> setDireccionCliente($_POST["DireccionCliente"]);

    $CrudCliente::InsertarCliente($Cliente); //llamar el metodo Insertar
  }
  else if (isset($_POST["Modificar"])) //verifica si la peticion es de registrar
  {
    //echo "Modificar";
    //$Cliente-> setCodigoCliente($_POST["CodigoCliente"]); //instanciar los atributos
    $Cliente-> setCodigoCliente($_POST["CodigoCliente"]);
    $Cliente-> setNombreCliente($_POST["NombreCliente"]);
    $Cliente-> setApellidosCliente($_POST["ApellidoCliente"]);
    $Cliente-> setDireccionCliente($_POST["DireccionCliente"]);

    $CrudCliente::ModificarCliente($Cliente);
  }

  else if ($_GET['Accion']=="EliminarCliente")
  {
    $CrudCliente::EliminarCliente($_GET["CodigoCliente"]);//Llamar al metodo eliminar
    //echo "En desarrollo";
    //echo $_GET["CodigoCompetencia"];

  }

 ?>
