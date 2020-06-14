<?php

session_start();

if(!(isset($_SESSION["NombreUsuario"]))) //si la sesión no existe redireccionar al login:
{
  //redireccionar al al login:
  header("Location:../../index.php");
}


 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar</title>
  </head>
  <body>
    <h1 align="center">Ingresar productos</h1>
    <form class="" action="../Controlador/ControladorProducto.php" method="post">
      Código producto: <input type="text" name="CodigoCompetencia" id="CodigoCompetencia" value="">
      <br>
      Cantidad: <input type="text" name="NombreCompetencia" id="NombreCompetencia" value="">
      <br>
      ValorUnitario: <input type="text" name="NombreCompetencia" id="NombreCompetencia" value="">
      <br>
      <input type="hidden" name="Registrar" id="Registrar" value="">
      <!-- //hidden para identificar que vista realiza la peticion -->
      <button type="submit" name="button">Registrar</button>
    </form>
  </body>
</html>
