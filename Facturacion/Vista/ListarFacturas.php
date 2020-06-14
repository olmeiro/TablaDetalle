<?php

session_start();

if(!(isset($_SESSION["NombreUsuario"]))) //si la sesión no existe redireccionar al login:
{
  //redireccionar al al login:
  header("Location:../../index.php");
}

require_once('../../conexionProfe.php');
require_once('../Modelo/Factura.php');
require_once('../Modelo/CrudFactura.php'); //incluir el modelo CrudCompetencia

$CrudFactura = new CrudFactura(); //crear un objeto CrudCompetencia
$ListaFacturas = $CrudFactura->$ListaFacturas(); //llamado almetodo listar competencias
//var_dump($ListaCompetencias);

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Listar</title>
   </head>
   <body>
     <h1 align="center">Listado De Facturas</h1>
     <a href="../../TCPDF/examples/reportepdfcompetencias.php">IMprimir PDF</a>
     <table align="center" border="1">
       <thead>
         <tr>
           <th>Código Competencia</th>
           <th>Nombre Competencia</th>
           <th>Acciones</th>
         </tr>
       </thead>
       <tbody>
         <?php
          foreach ($ListaCompetencias as $Competencia) {
            // code...
            ?>
            <tr>
              <td>
                <?php echo $Competencia->getCodigoCompetencia(); ?>
              </td>
              <td>
                <?php echo $Competencia->getNombreCompetencia(); ?>
              </td>
              <td>
                <a href="EditarCompetencia.php?CodigoCompetencia=<?php echo $Competencia->getCodigoCompetencia(); ?>">Editar</a>
                <a href="../Controlador/ControladorCompetencia.php?CodigoCompetencia=<?php echo $Competencia->getCodigoCompetencia(); ?>&Accion=EliminarCompetencia">Eliminar</a>
                <!-- <?php echo $Competencia->getNombreCompetencia() ?> -->
              </td>
            </tr>
            <?php
          }
          ?>
       </tbody>
     </table>
     <button type="button" name="button"><a href="../index.php">Volver</a></button>
   </body>
 </html>
