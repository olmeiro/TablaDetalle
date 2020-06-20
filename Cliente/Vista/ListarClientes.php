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

$Cliente = new Cliente(); // creal el objeto competencia
$CrudCliente = new CrudCliente();
$ListarClientes = $CrudCliente->ListarClientes();

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <table border="1" align="center">
       <thead>
         <th>CodigoCliente</th>
         <th>Nombres</th>
         <th>getApellidosCliente</th>
         <th>Dirección</th>
       </thead>
       <tbody>
         <?php
           foreach ($ListarClientes as $Cliente)
           {
             ?>
               <tr>
                 <td><?php echo $Cliente->getCodigoCliente()?></td>
                 <td><?php echo $Cliente->getNombreCliente()?></td>
                 <td><?php echo $Cliente->getApellidosCliente()?></td>
                 <td><?php echo $Cliente->getDireccionCliente()?></td>
               </tr>
             <?php
           }
          ?>
       </tbody>
     </table>
   </body>
 </html>
