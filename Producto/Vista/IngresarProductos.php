<?php

session_start();

if(!(isset($_SESSION["NombreUsuario"]))) //si la sesión no existe redireccionar al login:
{
  //redireccionar al al login:
  header("Location:../../index.php");
}

require_once('../Modelo/Producto.php');
$Producto = new Producto();
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Producto</title>
  </head>
  <body>
    <h1 align="center">Ingresar Producto</h1>
    <form id="frmIngresoProducto" action="../Controlador/ControladorProducto.php" method="post">
      <!-- Codigo Producto: <input type="text" name="CodigoProducto" id="CodigoProducto"> -->
      <br>
      Nombre Producto: <input type="text" name="NombreProducto" id="NombreProducto">
      <br>
      Valor Unitario: <input type="text" name="ValorUnitario" id="ValorUnitario">
      <br>

      <input type="hidden" name="Registrar" id="Registrar" value="">
      <!-- //hidden para identificar que vista realiza la peticion -->
      <button type="submit" name="button">Ingresar</button>
    </form>
  </body>
</html>
