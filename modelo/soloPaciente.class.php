<?php

include "conexion.class.php";

class soloPaciente{
	
	private $dni;
	private $cel;
	private $fijo;
	private $otros;
	private $idOS;
	private $obs;
		
	public function __construct($doc,$celu,$tel,$otras,$os,$notas){
		$this->dni = $doc;
		$this->cel = $celu;
		$this->fijo = $tel;
		$this->otros = $otras;
		$this->idOS = $os;
		$this->obs = $notas;		
	}
	
	public function guardar(){
		
		$conex = new conexion();
		
		try{
			$consulta = $conex->prepare('INSER INTO paciente
			 (nombre,apellido,dni)
			  VALUES (:nombres,:apellidos,:nrodoc)');
			  
			$consulta->bindParam(':nombres',$this->nombre);
			$consulta->bindParam(':apellidos',$this->apellido);
			$consulta->bindParam(':nrodoc',$this->dni);

			$consulta->execute();
			
		}catch(PDOException $e){
			throw new Exception('Error al insertar registro nuevo: '.$e->getMessage());
		}
	}
	
	public function setDni($docu){
		$this->dni = $docu;
	}
		
	public function getDni(){
		return $this->dni;
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
