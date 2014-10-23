<form role="form" class="form-horizon tal col-lg-2" method="post" action="../controlador/alta.php">
	<fieldset>
		<legend>Alta Profesional</legend>
		<input type="hidden" name="accion" value="altaProf">
		<div class="form-group">
			<label class="control-label">Apellido:</label>
			<input type="text" class="form-control" name="apellido">
		</div>
		<div class="form-group">
			<label class="control-label">Nombre:</label>
			<input type="text" class="form-control" name="nombre">
		</div>
		<div class="form-group">
			<label class="control-label">Dni:</label>
			<input type="text" class="form-control" name="dni">
		</div>
		<div class="form-group">
			<label class="control-label">Especialidad:</label>
			<input type="datetime" class="form-control datepicker" name="espacialidad">
		</div>
		<div class="form-group">
			<label class="control-label">Telefono Celular:</label>
			<input type="text" class="form-control" name="telcel">
		</div>
		<div class="form-group">
			<label class="control-label">Telefono Fijo:</label>
			<input type="text" class="form-control" name="telfijo">
		</div>
		<div class="form-group">
			<label class="control-label">Observaciones:</label>
			<input type="text" class="form-control" name="observaciones">
		</div>
	
		<button type = 'submit' class =  'btn btn-primary col-md col-md-offset-6'>Guardar</button> 
	</fieldset>    
</form>
