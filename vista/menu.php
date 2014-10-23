	<head>
		<title>GTurnos</title>
		<link rel="Stylesheet" href="../vista/css/bootstrap.css">
		<link rel="Stylesheet" href="../vista/css/default.css">
		<script src="../vista/js/jquery.js"></script>
		<script src="../vista/js/bootstrap.js"></script>
		<script src="../vista/js/twitter-bootstrap-hover-dropdown.min.js"></script><!--submenues-->
		
		<?php
		
			@session_start();
			$_SESSION['url']="men";						//para sesiones
			require "../controlador/sesiones.php";
			if ($_SESSION['men']=="dis"){
				
				$habil = "disabled";
				
			}else{
				
				$habil="";
				$nombre = $_SESSION['usuario'];
				
			}
			
			$_SESSION['url']="";			
			
		?>	
		
	</head>

<body style="padding-top: 60px;"><!-- para evitar que la barra de menu (que esta fija) tape el contenido, se agrega esta sentencia style="padding-top: 60px;"-->
	
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation"><!--comienza la barra de menu-->

			  <div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						
						  <li class="active"><a href="../index.php">Inicio</a></li>						  

						  <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pacientes<b class="caret"></b></a>
								<ul class="dropdown-menu">
									  <li class="<?php echo$habil;?>"><a role="menuitem" href="interruptor.php?accion=1">Alta</a></li>
									  <li class="<?php echo$habil;?>"><a href="interruptor.php?accion=2">Baja</a></li>
									  <li class="<?php echo$habil;?>"><a href="interruptor.php?accion=3">Modificacion</a></li>
								</ul>
						  </li>			
						  
						  <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Listados<b class="caret"></b></a>
								<ul class="dropdown-menu">
									   
									  <li><a href="interruptor.php?accion=5">Profesionales</a></li>
									  <li class="<?php echo$habil;?>"><a href="#">Pacientes</a></li>
									  <li><a href="#">Turnos</a></li>
									  
								</ul>
						  </li>				  
					</ul>
				 
					<ul class="nav navbar-nav navbar-right">
						
						<?php		/* esta seccion habilita para ingresar usuario y contraseña o, muestra en nombre del usuario que se logueo */
						
							if (empty($habil)){		/* si hay que habilitar los menues, entonces mostrar nombre del usuario logueado */
								
								echo "<p class='navbar-text'>Conectado como $nombre</p>";
								
							}else{					/* sino hay que habilitar menues, mostrar campos para ingresar usuario y contraseña */
								
								echo "<form class='navbar-form navbar-left' role='form' action='conecta.php' method='post'>
								  <div class='form-group'>
									  <input type='text' class='form-control' placeholder='Usuario' name='usr'>
									  <input type='text' class='form-control' placeholder='Contrasenia' name='pss'>
								  </div>
								  <button type='submit' class='btn btn-default'>Login</button>
								</form>";
								
							}
						
						?>

					</ul>
					
			  </div>
		  
		</nav>
		
</body>
