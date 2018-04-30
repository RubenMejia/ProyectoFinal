<?php 

class Conexion extends PDO
{
	private $tipo_de_base = 'mysql';
	private $host = 'localhost';
	private $nombre_de_base = 'softcacol';
	private $usuario = 'root';
	private $contrasena = ''; 


	function __construct()
	{
	  try{
         parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->usuario, $this->contrasena);
         // echo 'Conexión exitosa';
      }catch(PDOException $e){
         echo 'Error al conectar DB. Detalle: ' . $e->getMessage();
         exit;
      }
	}
}

?>