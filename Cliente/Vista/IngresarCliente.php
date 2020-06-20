<?php

session_start();

if(!(isset($_SESSION["NombreUsuario"]))) //si la sesión no existe redireccionar al login:
{
  //redireccionar al al login:
  header("Location:../../index.php");
}

require_once('../Modelo/Cliente.php');
$Cliente = new Cliente();
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar</title>
  </head>
  <body>
    <h1 align="center">Ingresar Clientes</h1>
    <form id="frmIngresoCliente" action="../Controlador/ControladorCliente.php" method="post">
      <!-- Código Cliente: <input type="text" name="CodigoCliente" id="CodigoCliente"> -->
      <br>
      Nombre Cliente: <input type="text" name="NombreCliente" id="NombreCliente">
      <br>
      Apellido Cliente: <input type="text" name="ApellidosCliente" id="ApellidosCliente">
      <br>
      Dirección Cliente: <input type="text" name="DireccionCliente" id="DireccionCliente">
      <br>
      <input type="hidden" name="Registrar" id="Registrar" value="">
      <!-- //hidden para identificar que vista realiza la peticion -->
      <button type="submit" name="button">Ingresar</button>
    </form>
  </body>
</html>
