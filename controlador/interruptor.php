<?php

	session_start();
	header('Content-Type: text/html; charset=UTF-8');
	$_SESSION['url'] = "int";
	require "sesiones.php";
	
	$re = $_GET['accion'];
	
	if ($_SESSION['hab'] == "true" || $re == 5){		
		
		if ($re == 1){
			
			require "../vista/menu.php";
			require "../vista/frm-altaPaci.php";
			
		}elseif($re == 2){
			
			require "../vista/menu.php";
			require "../vista/frm-bajaPaci.php";
			
		}elseif($re == 3){
			
			require "../vista/menu.php";
			require "../vista/frm-buscaDniPaci.php";
			
		}elseif($re == 4){
			
			require "../vista/menu.php";
			require "../vista/frm-modifPaci.php";
			
		}elseif($re == 5){

			require "../vista/menu.php";
			header("Location: ../vista/exportProf.php");
			
		}else{
			
			require "../vista/menu.php";
			
		}

	} else {
		
		require "../vista/menu.php";
		
	}	
	
	$_SESSION['url']="";
	
?>
