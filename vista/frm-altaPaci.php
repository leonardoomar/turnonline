<form role="form" class="form-horizontal" method="post" action="../controlador/transaccion.php">
	<fieldset>
		<legend>Alta Paciente</legend>
		<input type="hidden" name="accion" value="altaPaci">						<!-- indica de que formulario son las variables POST -->
		<div class="form-group">
			<label class="col-lg-2 control-label">Dni:</label>
			<div class="col-lg-5" >
				<input type="text" class="input-lg form-control" name="dni" placeholder="campo numerico">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">Nombre:</label>
			<div class="col-lg-5" >
				<input type="text" class="input-lg form-control" name="nombre" placeholder="campo de texto">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">Apellido:</label>
			<div class="col-lg-5" >
				<input type="text" class="input-lg form-control" name="apellido" placeholder="campo de texto">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">Telefono Celular:</label>
			<div class="col-lg-5" >
				<input type="text" class="input-lg form-control" name="telcel" placeholder="campo de texto">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">Telefono Fijo:</label>
			<div class="col-lg-5" >
				<input type="text" class="input-lg form-control" name="telfijo" placeholder="campo de texto">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">Otros Telefonos:</label>
			<div class="col-lg-5" >
				<input type="text" class="input-lg form-control" name="otrosTel" placeholder="campo de texto">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">Obra Social:</label>
			<div class="col-lg-5" >
				<input type="text" class="input-lg form-control" name="os" placeholder="campo numerico">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">Observaciones:</label>
			<div class="col-lg-5" >
				<input type="text" class="input-lg form-control" name="obs" placeholder="campo de texto">
			</div>
		</div>
	
		<button type = 'submit' class =  'btn btn-primary col-md col-md-offset-6'>Guardar</button> 
	</fieldset>    
</form>
