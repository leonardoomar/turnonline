<form role="form" class="form-horizon tal col-lg-2" method="post" action="../controlador/transaccion.php">
	<fieldset>
		<legend>Baja Paciente</legend>
		<input type="hidden" name="accion" value="bajaPaci">
		<div class="form-group">
			<label class="control-label">Dni:</label>
			<input type="text" class="form-control" name="dni">
		</div>	
		<button type = 'submit' class =  'btn btn-primary col-md col-md-offset-6'>Eliminar</button> 
	</fieldset>    
</form>
