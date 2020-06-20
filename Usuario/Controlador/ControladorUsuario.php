<?php

require_once('../../conexionProfe.php');
require_once('../Modelo/Usuario.php'); //Incluir el modelo Usuario
require_once('../Modelo/CrudUsuario.php');

$Usuario = new Usuario(); //Crear objeto vacío de tipo Usuario
$CrudUsuario = new CrudUsuario();//crear objeto vacio de CrudUsuario

if(isset($_POST["Acceder"]))//Validar que se realiza la peticion de acceder
{
  // echo "Acceder"; Ahora obtengo los valores del form con el name:
  $Usuario->setNombreUsuario($_POST["NombreUsuario"]); //Asignar valor a atributo NombreUsuario
  $Usuario->setContrasena($_POST["Contrasena"]); //Asignar valor a atributo Contrasena

  var_dump($Usuario);//Comprobacion de objeto
  $Usuario = $CrudUsuario->ValidarAcceso($Usuario);
  var_dump($Usuario);

  if($Usuario->getExiste() == 1)
  {
    session_start(); //Inicializar sesión
    //Definir las variables de session a emplear en el aplicativo:
    //ahora la puedo utilizar en el menu.php
    $_SESSION["NombreUsuario"] = $Usuario->getNombreUsuario();
    $_SESSION["IdUsuario"] = $Usuario->getIdUsuario();
    $_SESSION["IdRol"] = $Usuario->getIdRol();
    header("Location:../../menu.php");
  }
  else
  {
    ?>
    <script>
      alert("Usuario y/o clave incorrectos");
      document.location.href = "../../index.php";
    </script>
    <?php

      // header("Location:../../index.php");
  }


}
else if(isset($_POST['Registrar']))
{
  echo "Registrar";
  //$Usuario-> setIdUsuario($_POST["IdUsuario"]);
  $Usuario-> setNombreUsuario($_POST["NombreUsuario"]);
  $Usuario-> setContrasena($_POST["Contrasena"]);
  $Usuario-> setIdRol($_POST['IdRol']);
  $Usuario-> setIdEstado($_POST['IdEstado']);

  $CrudUsuario::InsertarUsuario($Usuario); //llamar el metodo Insertar
}
else //En caso contrario envio al login
{
    header("Location:../../index.php");
}




 ?>
