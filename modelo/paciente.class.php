<?php

require_once("conexion.class.php");
require_once("persona.class.php");

class Paciente extends Persona{
	
	private $dniPaci;
	private $dniPaciOrig;
	private $cel;
	private $fijo;
	private $otrosT;
	private $idOS;
	private $obs;
		
	public function __construct(){
		
		$arrayArgumentos = func_get_args();										//obtiene array de argumentos del constructor
        $i = func_num_args();													//obtiene cantidad de argumentos del constructor
        if (method_exists($this,$f='__construct'.$i)) {							//si existe constructor para el numero de argumentos
            call_user_func_array(array($this,$f),$arrayArgumentos);				//llama al consutrctor correspondiente
        } 
	
	}//fin __construct()
	
	public function __construct8($dni,$nomb,$apell,$celu,$tel,$otrost,$oSocial,$obser){
		
		try{
			
			parent::__construct3($dni,$nomb,$apell);
			
		} catch(Exception $e) {
			
			echo $e->getMessage();
			
		}
		
		$this->dniPaci	= $dni;
		$this->cel		= $celu;
		$this->fijo		= $tel;
		$this->otrosT	= $otrost;
		$this->idOS		= $oSocial;
		$this->obs		= $obser;		
		
	}//fin __construct8()
	
	public function __construct1($dni1){
	
		try{
			
			parent::__construct1($dni1);
			
		} catch(Exception $e){
			
			echo $e->getMessage();
			
		}
		
		$this->dniPaci	= $dni1;
		
	}// fin __construct1()
	
	
	public function alta(){		
		
		try{
			
			$conex = new Conexion($_SESSION['usuario'],$_SESSION['pd']);
			
			parent::alta();
			
			$conex->beginTransaction();
			
			$sqlPaciente = "INSERT INTO paciente (dni,telCelular,telFijo,otrosTel,idObraSocial,observaciones)
			VALUES ('$this->dniPaci','$this->cel','$this->fijo','$this->otrosT','$this->idOS','$this->obs')";
			
			$afectados = $conex->exec($sqlPaciente);
			
			$insertado = $conex->commit();	

		}catch(PDOException $e){
			
			$conex->rollBack();
			throw new Exception('Error al intentar dar de alta un paciente: '.$e->getMessage());
			
		}catch(Exception $p){
		
			echo "excepcion en modelo paciente (".$p->getMessage().")";
		
		}
			
	}//fin alta()

	public function baja(){		
		
		try{
			
			$conex = new Conexion($_SESSION['usuario'],$_SESSION['pd']);
			
			$conex->beginTransaction();
			
			$sqlPaciente = "DELETE FROM turnOnline.paciente WHERE dni=$this->dniPaci";
			
			$afectados = $conex->exec($sqlPaciente);
			
			$insertado = $conex->commit();						/* da de baja al paciente */
			
			parent::baja();										/* da de baja a la persona */

		}catch(PDOException $e){
			
			$conex->rollBack();
			throw new Exception('Error al intentar dar de baja un paciente: ('.$e->getMessage().')');
			
		}catch(Exception $p){
		
			echo "excepcion en modelo paciente (".$p->getMessage().")";
		
		}
			
	}//fin baja()
	
	public function buscar(){
		
		try{
			
			$conex = new Conexion($_SESSION['usuario'],$_SESSION['pd']);
		
			$sql = "SELECT per.dni, nombre, apellido, telCelular,telFijo,otrosTel,idObraSocial,observaciones FROM persona per
					JOIN paciente pac ON per.dni=pac.dni
					WHERE (per.dni = :nrodoc)";
					
			$stmt = $conex->prepare($sql);
			
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			$stmt->bindParam(':nrodoc',$this->dniPaci);
			
			$stmt->execute();
			
			$resultados = $stmt->fetch();

			return $resultados;
			
		}catch(PDOException $e){
			
			throw new Exception('Error al intentar consultar la base ('.$e->getMessage().')');
			
		}catch(Exception $p){
			
			echo "excepcion en modelo paciente al consultar (".$p->getMessage().")";
			
		}
			
	}//fin buscar()
	
	public function actualizar(){
		
		try{
			
			$conex = new Conexion($_SESSION['usuario'],$_SESSION['pd']);
			
			$conex->beginTransaction();
			
			$dniOriginal = $this->dniPaciOrig;				//obtiene dni original
			parent::setDniOrig($dniOriginal); 				//ejecuta metodo de la clase padre "persona"
			
			$actualizado = parent::actualizar();
			
			$sql = "UPDATE paciente
					SET dni='$this->dniPaci', telCelular='$this->cel', telFijo='$this->fijo', otrosTel='$this->otrosT', idObraSocial=$this->idOS, observaciones='$this->obs'
					WHERE dni='$this->dniPaciOrig'";
			
			$afectado = $conex->exec($sql);
				
			$tot = $conex->commit();

			
		}catch(PDOException $e){
			
			throw new Exception('Error al intentar actualizar paciente ('.$e->getMessage().')');
			
		}catch(Exception $p){
			
			echo "excepcion en modelo paciente al intentar modificar (".$p->getMessage().")";
			
		}
			
	}//fin actualizar()
	
	public function setDniOrig($docu){
		
		$this->dniPaciOrig = $docu;
		
	}//fin setDni()
		
	public function getDni(){
		
		return $this->dni;
		
	}//fin getDni()
	
}
