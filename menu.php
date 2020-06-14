<?php

session_start();

if(!(isset($_SESSION["NombreUsuario"]))) //si la sesión no existe redireccionar al login:
{
  //redireccionar al al login:
  header("Location:index.php");
}

echo $_SESSION["NombreUsuario"];
echo "Rol: " . $_SESSION["IdRol"];


 ?>

 <a href="Facturacion/">Facturacion</a>
 <br>
  <a href="CerrarSession.php">Cerrar sesión</a>
