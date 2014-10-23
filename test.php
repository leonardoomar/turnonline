<?php


	require("/var/www/html/octubre/modelo/paciente.class.php");
	
	$elPaciente = new paciente('90','lata','roja',33333,0,0,1,'aguante rawson');
	



/*
	require("modelo/persona.class.php");
	
	$elPaciente = new persona(12,'mañana','sera tarde');
	
	echo "nombre de la persona: ".$elPaciente->getNombre()."<br>";
*/
	

	try{	
		$elPaciente->alta();
	}catch(Exception $e){
		echo "Se produjo un error: ".$e->getMessage();
	}


