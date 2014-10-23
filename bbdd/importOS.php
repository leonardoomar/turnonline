<?php

$os = simplexml_load_file("osociales.xml");

foreach ($os->obrasocial as $obs){
	
          $obs['idObraSocial'],
          $obs->nombre,
          $obs->observaciones);

