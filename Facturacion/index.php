<?php
session_start();

if(!(isset($_SESSION["NombreUsuario"]))) //si la sesión no existe redireccionar al login:
{
  //redireccionar al al login:
  header("Location:../index.php");
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
  </head>
  <body>
    <h1 align="center">Administrar Facturacion</h1>
      <table align="center">
        <thead>
          <tr>
            <td><a href="Vista/IngresarFactura.php">Ingresar</a></td>
            <td><a href="Vista/listarFacturas.php">Listar</a></td>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
  </body>
</html>
