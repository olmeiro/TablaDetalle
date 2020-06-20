<?php
require_once('Producto.php');
require_once('../../conexionProfe.php');

  class CrudProducto
  {
    public function __construct(){}

    public function ListarProductos()
        {
          //echo "listar competencias";
          $Db = Db::Conectar();
          $ListaProductos = [];
          $Sql = $Db->query('SELECT * FROM productos');
          $Sql->execute();
          foreach($Sql->fetchAll() as $Producto)
          {
            $MyProducto = new Producto();
            // echo $Competencia['CodigoCompetencia'].".....".$Competencia['NombreCompetencia'];
            $MyProducto -> setCodigoProducto($Producto['CodigoProducto']);
            $MyProducto -> setNombre($Producto['Nombre']);
            $MyProducto -> setValorUnitario($Producto['ValorUnitario']);

            $ListaProductos[] = $MyProducto;
          }
          return $ListaProductos;
        }

    public function InsertarProducto($Producto) //Se recibe objeto Competencia
    {
        $Db = Db::Conectar(); //Conectar a BBDD revisar conexion
        $Insert = $Db->prepare('INSERT INTO productos VALUES(NULL, :Nombre, :ValorUnitario)');
        $Insert->bindValue('Nombre',$Producto->getNombre());
        $Insert->bindValue('ValorUnitario',$Producto->getValorUnitario());

        try
        {
          $Insert->execute();//ejecutar el INSERT
          echo "Registro exitoso de productos";

        }
        catch(Exception $e)
        {
          echo $e->getMessage();//Mostrar errores en la insercion.
          die();
        }
    }



    public function ObtenerProducto ($CodigoProducto)
     {
       //Código para obtener una competencia:
         $Db = Db::Conectar();
         $Sql = $Db->prepare('SELECT * FROM  productos WHERE CodigoProducto=:CodigoProducto'); //aca agrego mas campo si quiero buscar por mas campos luego el bind value
         $Sql->bindValue('CodigoProducto',$CodigoProducto); //evita la inyeccion SQL
         $MyProducto = new Producto();
         try
         {
           $Sql -> execute();//ejecutar el SELEC
           $Producto = $Sql -> fetch();//se lleva el array obtenido en $Compentencia luego de realizar el sql
           $MyProducto -> setCodigoProducto($Producto['CodigoProducto']);
           $MyProducto-> setNombre($Producto['Nombre']);
           $MyProducto-> setValorUnitario($Producto['ValorUnitario']);

           //echo "Registro exitoso";
         }
         catch(Exception $e)
         {
           echo $e->getMessage();//Mostrar errores en la MODIFICACION.
           die();
         }
         return $MyProducto;
     }

 public function ModificarProducto($Producto) //Se recibe objeto Competencia
 {
     $Db = Db::Conectar(); //Conectar a BBDD revisar conexion
     //Definir la insercion a realizar.
     $Sql = $Db->prepare('UPDATE productos SET CodigoProducto=:CodigoProducto,
                                               Nombre=:Nombre,
                                               ValorUnitario=:ValorUnitario
                                               WHERE CodigoProducto=:CodigoProducto');//para usar bindvalue para evitar sqlInjection

     $Sql->bindValue('CodigoProducto', $Producto->getCodigoProducto());
     //$Sql->bindValue('CodigoProducto', $Producto->getCodigoProducto());
     $Sql->bindValue('Nombre', $Producto->getNombre());
     $Sql->bindValue('ValorUnitario', $Producto->getValorUnitario());

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

 public function EliminarProducto($CodigoProducto) //Se recibe objeto Competencia
 {
     $Db = Db::Conectar(); //Conectar a BBDD revisar conexion
     //Definir la insercion a realizar.
     $Sql = $Db->prepare('DELETE FROM productos WHERE CodigoProducto=:CodigoProducto');//para usar bindvalue para evitar sqlInjection
     $Sql->bindValue('CodigoProducto',$CodigoProducto);
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
