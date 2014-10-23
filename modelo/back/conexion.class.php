<?php

class Conexion extends PDO{

	private $tipo_de_base = 'mysql';
	private $host = 'localhost';
	private $nombre_de_base = 'turnOnline';
	private $usuario = 'root';
	private $contrasena = '123'; 

	public function __construct(){
		try{
			parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->usuario, $this->contrasena);
/*
				parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->usuario, $this->contrasena,array(PDO::ATTR_PERSISTENT => true));
*/

			}catch(PDOException $e){
				echo('No se puede conectar a la base de datos. Detalle: ' . $e->getMessage());
				//exit;		 
			}
	} 

}
