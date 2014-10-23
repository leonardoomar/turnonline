<?php


require_once("conexion.class.php");
require_once("persona.class.php");


class Profesional extends Persona{
	
	private $dni;
	private $id_Especialidad;
	private $telCelular;
	private $telFijo;
	private $observaciones;
	
	public function __construct(){
		
		$arrayArgumentos = func_get_args();										//obtiene array de argumentos del constructor
        $i = func_num_args();													//obtiene cantidad de argumentos del constructor
        if (method_exists($this,$f='__construct'.$i)) {							//si existe constructor para el numero de argumentos
            call_user_func_array(array($this,$f),$arrayArgumentos);				//llama al consutrctor correspondiente
        } 
	
	}//fin __construct()
	
	public function __construct7($dni,$nomb,$apell,$idEsp,$telCel,$telFij,$obser){
		
		try{
			
			parent::__construct3($dni,$nomb,$apell);
			
		} catch(Exception $e) {
			
			echo $e->getMessage();
			
		}
		
		$this->dni	= $dni;
		$this->id_Especialidad	= $idEsp;
		$this->telCelular	= $telCel;
		$this->telFijo	= $telFij;
		$this->observaciones	= $obser;
		
	}//fin __construct7()
	
	public static function listarAll(){
		
		try{
			
			$conex = new Conexion("root","123");
		
			$sql = "SELECT per.dni, per.nombre, per.apellido, pro.id_Especialidad, pro.telCelular, pro.telFijo, pro.observaciones FROM profesional pro
					JOIN persona per ON pro.dni=per.dni";
					
			$stmt = $conex->prepare($sql);
			
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			$stmt->execute();
			
			$resultados = $stmt->fetchAll();

			return $resultados;
			
		}catch(PDOException $e){
			
			throw new Exception('Error al intentar consultar la base ('.$e->getMessage().')');
			
		}catch(Exception $p){
			
			echo "excepcion en modelo paciente al consultar (".$p->getMessage().")";
			
		}
			
	}//fin buscar()
	
}
