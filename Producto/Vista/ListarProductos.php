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

$CrudProducto = new CrudProducto();
$ListarProductos = $CrudProducto->ListarProductos();

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <h1>Productos</h1>
     <table border="1" align="center">
       <thead>
         <th>CodigoProducto</th>
         <th>Nombres</th>
         <th>Valor Unitario</th>
       </thead>
       <tbody>
         <?php
           foreach ($ListarProductos as $Producto)
           {
             ?>
               <tr>
                 <td><?php echo $Producto->getCodigoProducto()?></td>
                 <td><?php echo $Producto->getNombre()?></td>
                 <td><?php echo $Producto->getValorUnitario()?></td>
                 <td>
                    <a href="EditarProducto.php?CodigoProducto=<?php echo $Producto->getCodigoProducto();?>">Editar</a>
                    <a href="../Controlador/ControladorProducto.php?CodigoProducto=<?php echo $Producto->getCodigoProducto();?>&Accion=EliminarProducto">Eliminar</a>
                  </td>
               </tr>
             <?php
           }
          ?>
       </tbody>
     </table>
   </body>
 </html>
