<?php
 require_once('Cliente.php');
 require_once('../../conexionProfe.php');

class CrudCliente
{
  public function __construct(){}

    public function ListarClientes()
        {
          //echo "listar competencias";
          $Db = Db::Conectar();
          $ListaClientes = [];
          $Sql = $Db->query('SELECT * FROM clientes');
          $Sql->execute();
          foreach($Sql->fetchAll() as $Cliente)
          {
            $MyCliente = new Cliente();
            // echo $Competencia['CodigoCompetencia'].".....".$Competencia['NombreCompetencia'];
            $MyCliente -> setCodigoCliente($Cliente['CodigoCliente']);
            $MyCliente -> setNombreCliente($Cliente['NombreCliente']);
            $MyCliente -> setApellidosCliente($Cliente['ApellidosCliente']);
            $MyCliente -> setDireccionCliente($Cliente['DireccionCliente']);

            $ListaClientes[] = $MyCliente;
          }
          return $ListaClientes;
        }

        public function InsertarCliente($Cliente) //Se recibe objeto Competencia
         {
             $Db = Db::Conectar(); //Conectar a BBDD revisar conexion
             //Definir la insercion a realizar.
             $Insert = $Db->prepare('INSERT INTO clientes VALUES(NULL, :NombreCliente, :ApellidosCliente, :DireccionCliente)');
             $Insert->bindValue('NombreCliente',$Cliente->getNombreCliente());
             $Insert->bindValue('ApellidosCliente',$Cliente->getApellidosCliente());
             $Insert->bindValue('DireccionCliente',$Cliente->getDireccionCliente());

             try
             {
               $Insert->execute();//ejecutar el INSERT
               echo "Registro exitoso Cliente";
             }
             catch(Exception $e)
             {
               echo $e->getMessage();//Mostrar errores en la insercion.
               die();
             }
         }

         public function ObtenerCliente ($CodigoCliente)
          {
            //Código para obtener una competencia:
              $Db = Db::Conectar();
              $Sql = $Db->prepare('SELECT * FROM  clientes WHERE CodigoCliente =:CodigoCliente'); //aca agrego mas campo si quiero buscar por mas campos luego el bind value
              $Sql->bindValue('CodigoCliente',$CodigoCliente); //evita la inyeccion SQL
              $MyCliente = new Cliente();
              try
              {
                $Sql -> execute();//ejecutar el SELEC
                $Cliente = $Sql -> fetch();//se lleva el array obtenido en $Compentencia luego de realizar el sql
                $MyCliente -> setCodigoCliente($Cliente['CodigoCliente']);
                $MyCliente-> setNombreCliente($Cliente['NombreCliente']);
                $MyCliente-> setApellidosCliente($Cliente['ApellidosCliente']);
                $MyCliente-> setDireccionCliente($Cliente['DireccionCliente']);

                //echo "Registro exitoso";
              }
              catch(Exception $e)
              {
                echo $e->getMessage();//Mostrar errores en la MODIFICACION.
                die();
              }
              return $MyCliente;
          }

          public function ModificarCliente($Cliente) //Se recibe objeto Competencia
          {
              $Db = Db::Conectar(); //Conectar a BBDD revisar conexion
              //Definir la insercion a realizar.
              $Sql = $Db->prepare('UPDATE clientes SET CodigoCliente=:CodigoCliente,
                                                       NombreCliente=:NombreCliente,
                                                       ApellidosCliente=:ApellidosCliente,
                                                       DireccionCliente=:DireccionCliente
                                                       WHERE CodigoCliente=:CodigoCliente');//para usar bindvalue para evitar sqlInjection
              $Sql->bindValue('CodigoCliente',$Cliente->getCodigoCliente());
              $Sql->bindValue('NombreCliente',$Cliente->getNombreCliente());
              $Sql->bindValue('ApellidosCliente',$Cliente->getApellidosCliente());
              $Sql->bindValue('DireccionCliente',$Cliente->getDireccionCliente());

              try
              {
                $Sql->execute();//ejecutar el UPDATE
                echo "Modificación exitosa";
              }
              catch(Exception $e)
              {
                echo $e->getMessage();//Mostrar errores en la insercion.
                die();
              }
          }

      public function EliminarCliente($CodigoCliente) //Se recibe objeto Competencia
      {
          $Db = Db::Conectar(); //Conectar a BBDD revisar conexion
          //Definir la insercion a realizar.
          $Sql = $Db->prepare('DELETE FROM clientes WHERE CodigoCliente=:CodigoCliente');//para usar bindvalue para evitar sqlInjection
          $Sql->bindValue('CodigoCliente',$CodigoCliente);
          try
          {
            $Sql->execute();//ejecutar el DELETE
            echo "Eliminación éxitosa";
          }
          catch(Exception $e)
          {
            echo $e->getMessage();//Mostrar errores en la insercion.
            die();
          }
      }
    }
 ?>
