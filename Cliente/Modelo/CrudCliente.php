<?php
 //require_once('Modelo/Cliente.php');
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
}
 ?>
