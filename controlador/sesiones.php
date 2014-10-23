<?php
/* q hace: verifica existencia y valor de la variable usuario */

	if (empty($_SESSION['usuario'])){ 						/* si no existe, o existe pero su valor es vacio */
		
		$_SESSION['hab']="no";								/* habilita subpaginas del menu */
		$_SESSION['men']="dis";			
		
	}else{													/* si existe y contiene un valor */
		
		$url = $_SESSION['url'];
		if($url=="int" || $url=="men" || $url=="con" || $url="expf"){
			
			$_SESSION['hab']="true";
			$_SESSION['men']="";
			
		}
	
	}
		
?>
