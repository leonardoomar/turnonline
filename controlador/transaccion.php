<?php

	session_start();			
			
	if(!isset($_POST['accion']))
		header("Location: ../index.php");
	
	$accion = $_POST['accion'];					//indica desde que formulario o pagina son las variables POST
	
	if($accion == 'altaPaci'){					//si se quiere dar de alta un paciente
		
		altaPaci();
	
	} elseif($accion == 'buscaDniPaci') {		//si se quiere buscar un paciente
		
		buscaPaci();
	
	} elseif($accion == 'bajaPaci') {			//si se quiere dar de baja un paciente
		
		bajaPaci();
	
	} elseif($accion == 'editaPaci') {			//si se quiere actualizar un paciente
		
		actualizaPaci();
	
	} else {
		
		header("Location: ../index.php");
		die();
		
	}
	
	function altaPaci(){
		
		require "../modelo/paciente.class.php";		
		
		$paciente = new paciente($_POST['dni'],$_POST['nombre'],$_POST['apellido'],$_POST['telcel'],$_POST['telfijo'],$_POST['otrosTel'],$_POST['os'],$_POST['obs']);

		try{
			
			$paciente->alta();
			
		} catch(Exception $e){
			
			echo "Excepcion en modelo paciente alta: (".$e->getMessage().")";
			
		}

	}	
	
	function bajaPaci(){
		
		require "../modelo/paciente.class.php";	
		
		$paciente = new paciente($_POST['dni']);	

		try{
			
			$paciente->baja();
			
		} catch(Exception $e){
			
			echo "Excepcion en modelo paciente baja: (".$e->getMessage().")";
			
		}
		
	}	
	
	function buscaPaci(){
		
		require "../modelo/paciente.class.php";	
		
		$paciente = new paciente($_POST['dni']);	
		
		try{
			
			$res = $paciente->buscar();
			$_SESSION['respuesta']=$res;
			header("Location: interruptor.php?accion=4");
			
		} catch(Exception $e){
			
			echo "Excepcion en modelo modificar paciente buscar: (".$e->getMessage().")";
			
		}		
		
	}
	
	function actualizaPaci(){
		
		require "../modelo/paciente.class.php";
		
		$dn = $_POST['dni'];
		$dnOrig = $_POST['dniOrig'];
		$no = $_POST['nombre'];	
		$ap = $_POST['apellido'];
		$tc = $_POST['telcel'];
		$tf = $_POST['telfijo'];
		$ot = $_POST['otrosTel'];
		$os = $_POST['os'];
		$ob = $_POST['obs'];
		
		$paciente = new paciente($dn,$no,$ap,$tc,$tf,$ot,$os,$ob);
		$paciente->setDniOrig($dnOrig);											//setea dni original en clase "persona"
		
		try{
			
			$res = $paciente->actualizar();

		} catch(Exception $e){
			
			echo "Excepcion en modelo modificar paciente editar: (".$e->getMessage().")";
			
		}		
		
	}	
	
?>
