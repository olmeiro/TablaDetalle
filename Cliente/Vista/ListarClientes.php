<?php

session_start();

if(!(isset($_SESSION["NombreUsuario"]))) //si la sesión no existe redireccionar al login:
{
  //redireccionar al al login:
  header("Location:../../index.php");
}

require_once('../../conexionProfe.php');
require_once('../Modelo/Cliente.php');
require_once('../Modelo/CrudCliente.php');

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
         <th>Apellidos</th>
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
                 <td>
                    <a href="EditarCliente.php?CodigoCliente=<?php echo $Cliente->getCodigoCliente();?>">Editar</a>
                    <a href="../Controlador/ControladorCliente.php?CodigoCliente=<?php echo $Cliente->getCodigoCliente();?>&Accion=EliminarCliente">Eliminar</a>
                  </td>
               </tr>
             <?php
           }
          ?>
       </tbody>
     </table>
   </body>
 </html>
