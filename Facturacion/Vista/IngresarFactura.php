<?php
session_start();

if(!(isset($_SESSION["NombreUsuario"]))) //si la sesión no existe redireccionar al login:
{
  //redireccionar al al login:
  header("Location:../../index.php");
}

require_once('../../conexionProfe.php');
require_once('../../Cliente/Modelo/Cliente.php');
require_once('../../Cliente/Modelo/CrudCliente.php');
require_once('../../Producto/Modelo/Producto.php');
require_once('../../Producto/Modelo/CrudProducto.php');

$Cliente = new Cliente(); // creal el objeto competencia
$CrudCliente = new CrudCliente();
$ListarClientes = $CrudCliente->ListarClientes();

$Producto = new Producto();
$CrudProducto = new CrudProducto();
$ListarProductos = $CrudProducto->ListarProductos();

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Ingresar Factura</title>
  </head>
  <body>
    <h1 align="center">Factura</h1>

    <form class="" action="../Controlador/ControladorFactura.php" method="post">
    Cliente:
      <select name="CodigoCliente" id="CodigoCliente">
        <option value="">Seleccione</option>
        <?php
          foreach ($ListarClientes as $Cliente)
          {
            ?>
              <option value="<?php echo $Cliente->getCodigoCliente();?>"><?php echo $Cliente->getCodigoCliente()."-".$Cliente->getNombreCliente()."-".$Cliente->getApellidosCliente();?></option>
            <?php
          }
         ?>
      </select>
      <br>
      Producto:
      <select name="CodigoProducto" id="CodigoProducto">
        <option values="">Seleccione</option>
        <?php
          foreach ($ListarProductos as $Producto)
          {
            ?>
              <option value="<?php echo $Producto->getCodigoProducto();?>"><?php echo $Producto->getNombre();?></option>
            <?php
          }
         ?>
      </select>
      <br>
      Precio:
      <input type="text" id="PrecioProducto" name="PrecioProducto">
      <br>
      Cantidad:
      <input type="text" id="CantidadProducto" name="CantidadProducto">
      <br>
      <button type="button" name="AgregarProducto" id="AgregarProducto" onclick="AgregarDetalle()" >Agregar Detalle</button>
      <br>
      <input type="hidden" name="Registrar" id="Registrar" value="">
      <!-- //hidden para identificar que vista realiza la peticion -->
      <button type="submit">Registrar</button>
      <br>
      <table id="ListaProductos" border="2">
      <thead>
        <th>Nombre producto</th>
        <th>Codigo Producto</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Valor Detalle</th>
        <th></th>
      </thead>
      <tbody>

      </tbody>
      </table>
      <input type="text" id="ProductosAgregados" name="ProductosAgregados" value="0">
    </form>
    <br>
    <div align="center">
    <button><a href="../Index.php">Volver</a></button>
    </div>
  </body>
  <script>
    function AgregarDetalle()
    {
      let CodigoProducto = $("#CodigoProducto").val();
      let NombreProducto = $('select[name="CodigoProducto"] option:selected').text();
      let CantidadProducto = $("#CantidadProducto").val();
      let PrecioProducto = $("#PrecioProducto").val();
      let ValorDetalle = CantidadProducto * PrecioProducto;

      //variable autoincremento para el id de los productos agregados:
      $('#ProductosAgregados').val(parseInt($('#ProductosAgregados').val()) + 1 );
      let ConsecutivoProducto = $("#ProductosAgregados").val();

      let htmlTags = '<tr id="'+ConsecutivoProducto+'">' +
        '<td>'+ NombreProducto + '</td>'+
        '<td>'+ '<input type="text" id="CodigoProducto'+ConsecutivoProducto+'"name="CodigoProducto'+ConsecutivoProducto+'" value="'+CodigoProducto+'">' + '</td>'+
        '<td>'+ '<input type="text" id="CantidadProducto'+ConsecutivoProducto+'"name="CantidadProducto'+ConsecutivoProducto+'" value="'+CantidadProducto+'">' + '</td>'+
        '<td>'+ '<input type="text" id="PrecioProducto'+ConsecutivoProducto+'"name="PrecioProducto'+ConsecutivoProducto+'" value="'+PrecioProducto+'">' + '</td>'+
        '<td>'+ '<input type="text" id="ValorDetalle'+ConsecutivoProducto+'"name="ValorDetalle'+ConsecutivoProducto+'" value="'+ValorDetalle+'">' + '</td>'+
        '<td>'+ '<button type="button" class="borrar">Eliminar</button>' + '</td>'+
        '</tr>';

      $('#ListaProductos tbody').append(htmlTags);

    }

    $(function (){
      $(document).on('click','.borrar',function(event){
        event.preventDefault();
        $(this).closest('tr').remove();
      });
    });

    </script>
</html>
