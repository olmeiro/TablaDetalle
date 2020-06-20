<!-- Controla las peticiones enviadas desde los formularios -->

<?php

session_start();

if(!(isset($_SESSION["NombreUsuario"]))) //si la sesión no existe redireccionar al login:
{
  //redireccionar al al login:
  header("Location:../../index.php");
}


  require_once('../../conexionProfe.php');
  require_once('../Modelo/Competencia.php'); //Vincular la clase competencia
  require_once('../Modelo/CrudCompetencia.php'); //Vincular la clase Crud
  require_once('')
  // echo "Controlador";

  $Competencia = new Competencia();
  $CrudCompetencia = new CrudCompetencia();

  if (isset($_POST["Registrar"])) //verifica si la peticion es de registrar
  {
    echo "Registrar";
    $Competencia-> setCodigoCompetencia($_POST["CodigoCompetencia"]); //instanciar los atributos
    $Competencia-> setNombreCompetencia($_POST["NombreCompetencia"]);

    echo $Competencia->getCodigoCompetencia(); //Se verifica instanciacion.
    echo $Competencia->getNombreCompetencia();

    $CrudCompetencia::InsertarCompetencia($Competencia); //llamar el metodo Insertar
  }
  else if (isset($_POST["Modificar"])) //verifica si la peticion es de registrar
  {
    // echo "Modificar";
    $Competencia-> setCodigoCompetencia($_POST["CodigoCompetencia"]); //instanciar los atributos
    $Competencia-> setNombreCompetencia($_POST["NombreCompetencia"]);

    $CrudCompetencia::ModificarCompetencia($Competencia); //llamar el metodo modificar
  }

  else if ($_GET['Accion']=="EliminarCompetencia")
  {
    $CrudCompetencia::EliminarCompetencia($_GET["CodigoCompetencia"]);//Llamar al metodo eliminar
    //echo "En desarrollo";
    //echo $_GET["CodigoCompetencia"];

  }

 ?>
