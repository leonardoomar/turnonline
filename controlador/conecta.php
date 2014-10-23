<?php
	
	@session_start();
	
	$_SESSION['url']="con";
	$u=$_POST['usr'];
	$_SESSION['usuario']=$u;
	
	require "sesiones.php";
	if ($_SESSION['hab']=="true"){
		
		$p=$_POST['pss'];
		require "../modelo/conexion.class.php";
		
		try{
			
			$conex = new conexion($u,$p);			
			$_SESSION['pd']=$p;
			
		}catch(Exception $e){
			
			echo "excepcion en modelo paciente (".$e->getMessage().")"; 
			$_SESSION['usuario']="";
			
		}
	
	}
	
	header('Location: interruptor.php?accion=0');
	

?>
