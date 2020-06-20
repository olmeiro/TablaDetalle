<?php

session_start();

if(!(isset($_SESSION["NombreUsuario"]))) //si la sesión no existe redireccionar al login:
{
  //redireccionar al al login:
  header("Location:../../index.php");
}
  require_once('../../conexionProfe.php');
  require_once('../Modelo/Producto.php');
  require_once('../Modelo/CrudProducto.php');

  $CrudProducto = new CrudProducto(); //Crear un objeto tipo CrudCompetencia
  $Producto = $CrudProducto::ObtenerProducto($_GET["CodigoProducto"]);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Editar Producto</title>
  </head>
  <body>
    <h1 align="center">Editar Producto</h1>
    <form id="frmPersona" action="../Controlador/ControladorProducto.php" method="post">
      Codigo Producto: <input type="text" name="CodigoProducto" id="CodigoProducto"
      value="<?php echo $Producto->getCodigoProducto(); ?>" readonly>
      <br>
      Nombre Producto: <input type="text" name="NombreProducto" id="NombreProducto"
      value="<?php echo $Producto->getNombre(); ?>">
      <br>
      Valor Unitario: <input type="text" name="ValorUnitario" id="ValorUnitario"
      value="<?php echo $Producto->getValorUnitario(); ?>">
      <br>
      <input type="hidden" name="Modificar" id="Modificar" value="">
      <!-- //hidden para identificar que vista realiza la peticion -->
      <button type="submit" name="button">Modificar</button>
    </form>

    <div class="" id="mensaje">
      <p id="mensajeAjax"></p>
    </div>
  </body>
  <!-- <script src="../js/main.js"></script> -->
</html>
