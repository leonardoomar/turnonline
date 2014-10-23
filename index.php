<?php
	session_start();
	$_SESSION['usuario']="";
	header('Location: controlador/interruptor.php?accion=0');
	die();

