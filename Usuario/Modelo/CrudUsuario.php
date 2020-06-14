<?php
  class CrudUsuario
  {
    public function __construct(){}

    public function ValidarAcceso($Usuario)
    {
      $Db = Db::Conectar();
      $Sql = $Db->prepare('SELECT * FROM usuarios WHERE NombreUsuario =:NombreUsuario AND Contrasena =:Contrasena AND IdEstado=1');
      $Sql->bindValue('NombreUsuario', $Usuario->getNombreUsuario());
      $Sql->bindValue('Contrasena', $Usuario->getContrasena());

      $Sql->execute(); //Ejecutar la consulta, execute() es de la libreria PDO,

      $MiUsuario = new Usuario();

      if($Sql->rowCount() > 0) //Arroja el numero de registros arrojados por la consulta:
      {
        $DatosUsuario = $Sql->fetch(); //fetch : función para almancenar los datos arrojados por la consulta

        $MiUsuario->setIdUsuario($DatosUsuario['IdUsuario']);
        $MiUsuario->setNombreUsuario($DatosUsuario['NombreUsuario']);
        $MiUsuario->setIdRol($DatosUsuario['IdRol']);
        $MiUsuario->setExiste(1); //Asignar al atributo
      }
      else
      {
        $MiUsuario->setExiste(0);
      }

      return $MiUsuario;
    }
  }



 ?>
