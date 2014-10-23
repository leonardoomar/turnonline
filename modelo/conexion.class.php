<?php

class Conexion extends PDO{

	private $tipo_de_base = 'mysql';
	private $host = 'localhost';
	private $nombre_de_base = 'turnOnline';
	private $usuario;
	private $contrasena; 
	
	public function __construct(){
		
		$arrayArgumentos = func_get_args();										//obtiene array de argumentos del constructor
        $i = func_num_args();													//obtiene cantidad de argumentos del constructor
        if (method_exists($this,$f='__construct'.$i)) {							//si existe constructor para el numero de argumentos
            call_user_func_array(array($this,$f),$arrayArgumentos);				//llama al consutrctor correspondiente
        } 
	
	}//fin __construct()
	

	public function __construct0(){
		
		try{
			parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->usuario, $this->contrasena);
			parent::setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
			parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	/*configura la conexion para que lance excepciones*/
			parent::exec("SET NAMES UTF8");										/* permite almacenar acentos y ñ */
			
			}catch(PDOException $e){
				
				throw new Exception('Error al intentar conectar a la base de datos ('.$e->getMessage().')<br>');
 
			}
	}//fin __construnct0() 
	
	public function __construct2($usua,$pass){
		
		$this->usuario = $usua;
		$this->contrasena	=	$pass;
	
	try{
		parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->usuario, $this->contrasena);
		parent::setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
		parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	/*configura la conexion para que lance excepciones*/
		parent::exec("SET NAMES UTF8");										/* permite almacenar acentos y ñ */
		
		}catch(PDOException $e){
			
			throw new Exception('Error al intentar conectar a la base de datos ('.$e->getMessage().')<br>');

		}
	}//fin __construnct2() 

}
