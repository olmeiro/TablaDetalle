<?php

session_start();

if(!(isset($_SESSION["NombreUsuario"]))) //si la sesión no existe redireccionar al login:
{
  //redireccionar al al login:
  header("Location:../../index.php");
}

require_once('../Modelo/Usuario.php');
$Usuario = new Usuario();
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Nuevo Usuario de la plataforma</title>
  </head>
  <body>
    <h1 align="center">Ingresar Usuario</h1>
    <form id="frmIngresoUsuario" action="../Controlador/ControladorUsuario.php" method="post">
      <!-- Codigo Producto: <input type="text" name="CodigoProducto" id="CodigoProducto"> -->
      <br>
      Nombre Usuario: <input type="text" name="NombreUsuario" id="NombreUsuario">
      <br>
      Contraseña: <input type="password" name="Contrasena" id="Contrasena">
      <br>
      IdRol: <input type="text" name="IdRol" id="IdRol">
      <br>
      IdEstado:(Inactivo=0 - Activo=1) <input type="number" name="IdEstado" id="IdEstado">
      <br>

      <input type="hidden" name="Registrar" id="Registrar" value="">
      <!-- //hidden para identificar que vista realiza la peticion -->
      <button type="submit" name="button">Ingresar</button>
    </form>
  </body>
</html>
