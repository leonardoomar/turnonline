<?php

	@session_start();	

	if (!isset($_SESSION['respuesta'])){
		
		header("Location: interruptor.php?accion=0");
		
	}
		$fila = $_SESSION['respuesta'];

?>


<form role="form" class="form-horizontal" method="post" action="../controlador/transaccion.php">
	<fieldset>
		<legend>Modificar Paciente</legend>
		
		<input type="hidden" name="accion" value="editaPaci">
		<input type="hidden" name="dniOrig" value='<?php echo $fila['dni']?>'>
		
		<div class="form-group">
			<label class="col-lg-2 control-label">Dni:</label>
			<div class="col-lg-5" >
				<input type="text" class="input-lg form-control" name="dni" value='<?php echo $fila['dni']?>' placeholder="campo numerico">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">Nombre:</label>
			<div class="col-lg-5" >
				<input type='text' class='input-lg form-control' name='nombre' value='<?php echo $fila['nombre']?>' placeholder='campo de texto'>
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">Apellido:</label>
			<div class="col-lg-5" >
				<input type='text' class='input-lg form-control' name='apellido' value='<?php echo $fila['apellido']?>' placeholder='campo de texto'>
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">Telefono Celular:</label>
			<div class="col-lg-5" >
				<input type="text" class="input-lg form-control" name="telcel" value='<?php echo $fila['telCelular']?>' placeholder="campo de texto">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">Telefono Fijo:</label>
			<div class="col-lg-5" >
				<input type="text" class="input-lg form-control" name="telfijo" value='<?php echo $fila['telFijo']?>' placeholder="campo de texto">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">Otros Telefonos:</label>
			<div class="col-lg-5" >
				<input type="text" class="input-lg form-control" name="otrosTel" value='<?php echo $fila['otrosTel']?>' placeholder="campo de texto">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">Obra Social:</label>
			<div class="col-lg-5" >
				<input type="text" class="input-lg form-control" name="os" value='<?php echo $fila['idObraSocial']?>' placeholder="campo numerico">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">Observaciones:</label>
			<div class="col-lg-5" >
				<input type="text" class="input-lg form-control" name="obs" value='<?php echo $fila['observaciones']?>' placeholder="campo de texto">
			</div>
		</div>
	
		<button type = 'submit' class =  'btn btn-primary col-md col-md-offset-6'>Modificar</button>
		<!--<? $_SESSION['respuesta']=null;?> -->
	</fieldset>    
</form>
