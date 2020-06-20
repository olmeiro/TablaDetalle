<?php

session_start();

if(!(isset($_SESSION["NombreUsuario"]))) //si la sesión no existe redireccionar al login:
{
  //redireccionar al al login:
  header("Location:../../index.php");
}

require_once('../Modelo/Cliente.php');
require_once('../Modelo/CrudCliente.php');

$CrudCliente = new CrudCliente();
$Cliente=$CrudCliente::ObtenerCliente($_GET['CodigoCliente']);
//var_dump($Cliente);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar</title>
  </head>
  <body>
    <h1 align="center">Editar Cliente</h1>
    <form id="frmIngresoCliente" action="../Controlador/ControladorCliente.php" method="post">
      Código Cliente: <input type="text" name="CodigoCliente" id="CodigoCliente"
      value="<?php echo $Cliente->getCodigoCliente(); ?>" readonly>
      <br>
      Nombre Cliente: <input type="text" name="NombreCliente" id="NombreCliente"
      value="<?php echo $Cliente->getNombreCliente(); ?>">
      <br>
      Apellido Cliente: <input type="text" name="ApellidoCliente" id="ApellidoCliente"
      value="<?php echo $Cliente->getApellidosCliente(); ?>">
      <br>
      Dirección Cliente: <input type="text" name="DireccionCliente" id="DireccionCliente"
      value="<?php echo $Cliente->getDireccionCliente(); ?>">
      <br>
      <input type="hidden" name="Modificar" id="Modificar" value="">
      <!-- //hidden para identificar que vista realiza la peticion -->
      <button type="submit" name="button">Modificar</button>
    </form>
  </body>
</html>
