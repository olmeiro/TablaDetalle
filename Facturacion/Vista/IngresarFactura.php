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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Ingresar Factura</title>
  </head>
  <body>
    <h1 align="center">Factura</h1>

    <form class="" action="../Controlador/ControladorFactura.php" method="post">
    Cliente:
      <select name="CodigoCliente" id="CodigoCliente">
        <option value="">Seleccione</option>
        <option value="1206">Alejandro Guerrero</option>
        <option value="1111">Nilton Ospina</option>
      </select>
      <br>
      Producto:
      <select name="CodigoProducto" id="CodigoProducto">
        <option values="">Seleccione</option>
        <option value="10">Arroz</option>
        <option value="11">Panela</option>
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
      <button type="submit" name="button">Registrar</button>
      <br>
      <table id="ListaProductos" border="2">
      <thead>
        <th>Nombre producto</th>
        <th>Codigo Producto</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Valor total</th>
        <th></th>
      </thead>
      <tbody>

      </tbody>
      </table>
      <input type="text" id="ProductosAgregados" name="ProductosAgregados" value="0">
    </form>
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

      let htmlTags = '<tr>' +
        '<td>'+ NombreProducto + '</td>'+
        '<td>'+ '<input type="text" id="CodigoProducto '+ ConsecutivoProducto +'" name="CodigoProducto '+ ConsecutivoProducto +'" value="'+CodigoProducto+'">' + '</td>'+
        '<td>'+ '<input type="text" id="CantidadProducto '+ ConsecutivoProducto +'" name="CantidadProducto '+ ConsecutivoProducto +'" value="'+CantidadProducto+'">' + '</td>'+
        '<td>'+ '<input type="text" id="PrecioProducto '+ ConsecutivoProducto +'" name="PrecioProducto '+ ConsecutivoProducto +'" value="'+PrecioProducto+'">' + '</td>'+
        '<td>'+ '<input type="text" id="ValorDetalle '+ ConsecutivoProducto +'" name="ValorDetalle'+ ConsecutivoProducto +'" value="'+ValorDetalle+'">' + '</td>'+
        '<td>'+ '<button type="button" onclick="EliminarDetalle('+ ConsecutivoProducto +')">Eliminar</button>' + '</td>'+
        '</tr>';

      $('#ListaProductos tbody').append(htmlTags);

    }

    function EliminarDetalle(ConsecutivoProducto)
    {
      alert("hola mundo" + ConsecutivoProducto);
    }
    </script>
</html>
