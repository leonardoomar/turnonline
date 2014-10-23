<?php

	session_start();
	header('Content-Type: text/html; charset=UTF-8');
	require "../modelo/profesional.class.php";
	$ps = Profesional::listarAll();

	$profesionales = new SimpleXMLElement('<Profesionales></Profesionales>');

	foreach($ps as $fila) {
	  $profesional = $profesionales->addChild('profesional');
	  $profesional->addAttribute('dni', $fila['dni']);
	  $profesional->addChild('nombre', $fila['nombre']);
	  $profesional->addChild('apellido', $fila['apellido']);
	  $profesional->addChild('id_Especialidad', $fila['id_Especialidad']);
	  $profesional->addChild('telCelular', $fila['telCelular']);
	  $profesional->addChild('telFijo', $fila['telFijo']);
	  $profesional->addChild('observaciones', $fila['observaciones']);
	}

	header('Content-type: text/xml');
	echo $profesionales->asXML();
	
?>
