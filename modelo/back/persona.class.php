<?php

include "conexion.class.php";

class persona{
	
	private $nombre;
	private $apellido;
	private $dni;
	
	public function __construct($doc,$nom,$ape){
		$this->nombre = $nom;
		$this->apellido = $ape;
		$this->dni = $doc;
	}
	
	public function alta(){
		
		$conex = new conexion();
		
		try{
			$consulta = $conex->prepare('INSER INTO persona
			 (nombre,apellido,dni)
			  VALUES (:nombres,:apellidos,:nrodoc)');
			  
			$consulta->bindParam(':nombres',$this->nombre);
			$consulta->bindParam(':apellidos',$this->apellido);
			$consulta->bindParam(':nrodoc',$this->dni);

			$consulta->execute();
			
		}catch(PDOException $e){
			throw new 'Error al intentar dar de alta una persona: '.$e->getMessage();
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
