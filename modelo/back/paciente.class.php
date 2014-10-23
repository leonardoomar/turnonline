<?php

require("/var/www/html/octubre/modelo/conexion.class.php");

class Paciente extends Persona{
	
	private $dniPaci;
	private $cel;
	private $fijo;
	private $otrosT;
	private $idOS;
	private $obs;
		
	public function __construct($dni,$nomb,$apell,$celu,$tel,$otrost,$oSocial,$obser){
		try catch{
			parent::_construct($dni,$nomb,$apell);
		} catch(Exception $e){
			echo $e->getMessage();
		}
		
		$this->dniPaci	= $dni;
		$this->cel		= $celu;
		$this->fijo		= $tel;
		$this->otrosT	= $otrost;
		$this->idOS		= $oSocial;
		$this->obs		= $obser;		
	}
	
	public function alta(){
		
		$conex = new conexion();
		
		
		try{
			
			parent::alta();
			
			$conex->beginTransaction();

/*
			$sqlPersona = "INSERT INTO persona (dni,nombre,apellido)
			VALUES ('$this->dni','$this->nom','$this->ape')";
										
			$afectados1 = $conex->exec($sqlPersona);
*/
			
			$sqlPaciente = "INSERT INTO paciente (dni,telCelular,telFijo,otrosTel,idObraSocial,observaciones)
			VALUES ('$this->dni','$this->cel','$this->fijo','$this->otrosT','$this->idOS','$this->obs')";
			
			/*echo "sql paciente: $sqlPaciente <br>";*/
										
			$afectados2 = $conex->exec($sqlPaciente);
			
			$insertado = $conex->commit();	
			
/*
			echo "fueron afectados $afectados1 personas y $afectados2 pacientes<br>";
			echo "la accion $insertado lograda<br>";
*/

		}catch(PDOException $e){
			
			$conex->rollBack();
			throw new Exception('Error al intentar dar de alta un paciente: '.$e->getMessage());
			
		}catch(Exception $p){
		
			echo $p->getMessage();
		
		}
			
	}
	
	public function setDni($docu){
		$this->dni = $docu;
	}
		
	public function getDni(){
		return $this->dni;
	}
	
	public function setNombre($nomb){
		$this->nom = $nomb;
	}
	
	public function getNombre(){
		return $this->nom;
	}
	
	public function setApellido($apel){
		$this->ape = $apel;
	}
	
	public function getApellido(){
		return $this->ape;
	}
}
