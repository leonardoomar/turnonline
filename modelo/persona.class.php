<?php


require_once("conexion.class.php");


class Persona{
	
	private $nombre;
	private $apellido;
	private $dni;
	private $dniOrig;
	
	public function __construct(){
		
		$arrayArgumentos = func_get_args();										//obtiene array de argumentos del constructor
        $i = func_num_args();													//obtiene cantidad de argumentos del constructor
        if (method_exists($this,$f='__construct'.$i)) {							//si existe constructor para el numero de argumentos
        
            call_user_func_array(array($this,$f),$arrayArgumentos);				//llama al consutrctor correspondiente
            
        } 
	
	}//fin __construct()
	
	public function __construct3($doc,$nom,$ape){
		$this->nombre = $nom;
		$this->apellido = $ape;
		$this->dni = $doc;
	}//fin __construct3()
	
	public function __construct1($dni1){
		$this->dni = $dni1;
	}//fin __construct1()
	
	public function alta(){		
		
		try{
			
			$conex = new Conexion($_SESSION['usuario'],$_SESSION['pd']);
			
			$conex->beginTransaction();			

			$sqlPersona = "INSERT INTO persona (dni,nombre,apellido)
			VALUES ('$this->dni','$this->nombre','$this->apellido')";
	
			$afectados = $conex->exec($sqlPersona);
						
			$insert = $conex->commit();	
			
		}catch(PDOException $e){
			
			$conex->rollBack();
			throw new Exception('Error al intentar dar de alta una persona ('.$e->getMessage().')<br>');
			
		}catch(Exception $p){
			
			echo "excepcion en modelo persona (".$p->getMessage().")";
		}
	}//fin alta()
	
	public function baja(){				
		
		try{
			
			$conex = new Conexion($_SESSION['usuario'],$_SESSION['pd']);
			
			$conex->beginTransaction();			

			$sqlPersona = "DELETE FROM turnOnline.persona WHERE dni=$this->dni";
	
			$afectados = $conex->exec($sqlPersona);
						
			$insert = $conex->commit();								/* elimina persona */
			
		}catch(PDOException $e){
			
			$conex->rollBack();
			throw new Exception('Error al intentar dar de baja una persona ('.$e->getMessage().')<br>');
			
		}catch(Exception $p){
			
			echo "excepcion en modelo persona (".$p->getMessage().")";
		}
	}//fin baja()
	
	public function actualizar(){		
		
		try{
			
			$conex = new Conexion($_SESSION['usuario'],$_SESSION['pd']);
			
			$conex->beginTransaction();			

			$sql = "UPDATE persona
					SET dni='$this->dni', nombre='$this->nombre', apellido='$this->apellido'
					WHERE dni='$this->dniOrig'";
	
			$afectados = $conex->exec($sql);
						
			$tot = $conex->commit();	
			
			return $afectados;
			
		}catch(PDOException $e){
			
			$conex->rollBack();
			throw new Exception('Error al intentar actualizar una persona ('.$e->getMessage().')<br>');
			
		}catch(Exception $p){
			
			echo "excepcion en modelo persona (".$p->getMessage().")";
		}
	}//fin actualizar()
	
	public function setDniOrig($docu){
		$this->dniOrig = $docu;
	}
		
	public function getDniOrig(){
		return $this->dniOrig;
	}
	
	public function setNombre($nomb){
		$this->nombre = $nom;
	}
	
	public function getNombre(){
		return $this->nombre;
	}
	
	public function setApellido($apel){
		$this->apellido = $apel;
	}
	
	public function getApellido(){
		return $this->apellido;
	}
}
