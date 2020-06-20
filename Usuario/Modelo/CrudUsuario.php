<?php
  class CrudUsuario
  {
    public function __construct(){}

    public function ValidarAcceso($Usuario)
    {
      $Db = Db::Conectar();
      $Sql = $Db->prepare('SELECT * FROM usuarios WHERE NombreUsuario =:NombreUsuario AND Contrasena =:Contrasena AND IdEstado=1');
      $Sql->bindValue('NombreUsuario',$Usuario->getNombreUsuario());
      $Sql->bindValue('Contrasena',$Usuario->getContrasena()); //contraseña sin encriptación con md5
      //$Sql->bindValue('Contrasena',md5($Usuario->getContrasena())); //contraseña encripta con md5

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

    public function InsertarUsuario($Usuario) //Se recibe objeto Competencia
    {
        $Db = Db::Conectar(); //Conectar a BBDD revisar conexion
        $Insert = $Db->prepare('INSERT INTO usuarios VALUES(NULL, :NombreUsuario, :Contrasena, :IdRol, :IdEstado)');
        //$Insert->bindValue('IdUsuario','');
        $Insert->bindValue('NombreUsuario',$Usuario->getNombreUsuario());
        $Insert->bindValue('Contrasena',$Usuario->getContrasena()); //sin md5
        $Insert->bindValue('Contrasena',md5($Usuario->getContrasena())); //con md5
        $Insert->bindValue('IdRol',$Usuario->getIdRol());
        $Insert->bindValue('IdEstado',$Usuario->getIdEstado());
        try
        {
          $Insert->execute();//ejecutar el INSERT
          echo "Registro exitoso de usuario";

        }
        catch(Exception $e)
        {
          echo $e->getMessage();//Mostrar errores en la insercion.
          die();
        }
    }
  }
 ?>
