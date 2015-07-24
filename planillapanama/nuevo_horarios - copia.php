<?php
require("clases/config.php");
require("clases/sesion.php");
$sesion    = new sesion();
$nombre_usuario   = $sesion->get("nombre_usuario");
$id_usuario = (int)$sesion->get("id_usuario");
$usuario    = $sesion->get("usuario");
unset($sesion);

$query3  = "select compania from pp_usuario_compania where pp_usuario_id = $id_usuario";
$resultado3 = pg_query($conexion, $query3) or die("Error en la Consulta SQL");
$numReg3 = pg_num_rows($resultado3);
if($numReg3>0){
	while ($fila3=pg_fetch_array($resultado3)) {		
	$id_compania  = $fila3['compania'];
} } 
pg_free_result($resultado3); 


$query6  = "select a.codigo_empleado,a.nombre,a.apellido from pla_empleados a,pp_usuario_compania b where a.compania = b.compania and b.pp_usuario_id = $id_usuario order by a.nombre";
$resultado6 = pg_query($conexion, $query6) or die("Error en la Consulta SQL");
$numReg6 = pg_num_rows($resultado6);
$empleados =  '<option value=""  selected="selected"></option>';
if($numReg6>0){
	while ($fila6=pg_fetch_array($resultado6)) {		
	$codigo_empleado           = $fila6['codigo_empleado'];
	$nombre_completo = $fila6['nombre'] . '  ' . $fila6['apellido'];
	$empleados .= '<option value="'.$codigo_empleado.'">'.$nombre_completo.'</option>';
} } 
pg_free_result($resultado6);  

$query7  = "select turno,hora_inicio,hora_salida from pla_turnos where compania = $id_compania order by hora_inicio";
$resultado7 = pg_query($conexion, $query7) or die("Error en la Consulta SQL");
$numReg7 = pg_num_rows($resultado7);
$turnos =  '<option value=""  selected="selected"></option>';
if($numReg7>0){
	while ($fila7=pg_fetch_array($resultado7)) {		
	$turno           = $fila7['turno'];
	$nombre_turnos = (string)$fila7['hora_inicio'] . '  a  ' . (string)$fila7['hora_salida'];
	$turnos .= '<option value="'.$turno.'">'.$nombre_turnos.'</option>';
} } 
pg_free_result($resultado7);  

$query8  = "select implemento,descripcion from pla_implementos where compania = $id_compania order by descripcion";
$resultado8 = pg_query($conexion, $query8) or die("Error en la Consulta SQL");
$numReg8 = pg_num_rows($resultado8);
$implementos =  '<option value=""  selected="selected"></option>';
if($numReg8>0){
	while ($fila8=pg_fetch_array($resultado8)) {		
	$implemento           = $fila8['implemento'];
	$descripcion           = $fila8['descripcion'];
	$implementos .= '<option value="'.$implemento.'">'.$descripcion.'</option>';
} } 
pg_free_result($resultado8);  
pg_close($conexion);
$fecha = date("Y-m-d");
?>


	   
	<div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       <h3> Horarios</h3>
    </div>
	
    <form  action="#" method="POST" class='form-horizontal form-validate' id="FormToValidate2" >

    <div class="modal-body">
        <div class="row-fluid">
					<div class="span6">	
					
						<div class="control-group">
							<label for="textfield" class="control-label">Empleado</label>
							<div class="controls">
								<select name="id_empleado" id="id_empleado" class="input-xlarge">
									 <?php
										echo  $empleados;
									 ?>
								</select>
							</div>
						</div>

						<div class="control-group">
							<label for="textfield" class="control-label">Turno</label>
							<div class="controls">
								<select name="turno" id="turno" class="input-large">
									 <?php
										echo  $turnos;
									 ?>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label for="textfield" class="control-label">Fecha</label>
							<div class="controls">
								<div is-open="opened" class="input-append date" id="fechabtnfin" data-date="<?php echo $fecha ?>" data-date-format="yyyy-mm-dd">
									<input id="fecha" name="fecha" class="input-small" type="text" value="<?php echo $fecha ?>"  data-rule-required="true" readonly>
									<span class="add-on"><i class="icon-calendar"></i></span>
								</div>
							</div>
						</div>
						<div class="control-group">
							<label for="textfield" class="control-label">Status</label>
							<div class="controls">
								<select id="status" name="status" class='input-medium'>
										<option  value="C">Certificado Medico</option>
									<option  value="D">Día libre feriado</option>
									<option  value="F">Pagar feriado</option>
									<option  value="I">Ausencia</option>
									<option  value="L">Día libre</option>
									<option  value="R" selected="selected">Registrado</option>
								</select>
							</div>
						</div>
				
						<div class="control-group">
							<label for="textfield" class="control-label">Autorizado</label>
							<div class="controls">
								<select id="status" name="status" class='input-small'>
									<option  value="S" selected="selected">Si</option>
									<option  value="N">No</option>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label for="textfield" class="control-label">Implementos</label>
							<div class="controls">
								<select name="implemento" id="implemento" class="input-xlarge" ">
									 <?php
										echo  $implementos;
									 ?>
								</select>
							</div>
						</div>

				</div>
			
				<div class="span6">
						
						<div class="control-group">
							<label for="textfield" class="control-label">Entrada1</label>
							<div class="controls">
								 <input type='text'  class='js-ok-time-24 input-mini' id='entrada1' name='entrada1' maxlength="8"/>
							</div>
						</div>
						<div class="control-group">
							<label for="textfield" class="control-label">Descanso inicio</label>
							<div class="controls">
								<input type='text'  class='js-ok-time-24 input-mini' id="descanso_inicio" name="descanso_inicio" maxlength="8"/>
							</div>
						</div>
						<div class="control-group">
							<label for="textfield" class="control-label">Descanso fin</label>
							<div class="controls">
								<input type='text'  class='js-ok-time-24 input-mini' id="descanso_fin" name="descanso_fin" maxlength="8"/>
							</div>
						</div>
						<div class="control-group">
							<label for="textfield" class="control-label">Salida1</label>
							<div class="controls">
								<input type='text'  class='js-ok-time-24 input-mini' id="salida1" name="salida1" maxlength="8"/>
							</div>
						</div>
						<div class="control-group">
							<label for="textfield" class="control-label">Entrada2</label>
							<div class="controls">
								<input type='text'  class='js-ok-time-24 input-mini'  id="entrada2" name="entrada2" maxlength="8"/>
							</div>
						</div>
						<div class="control-group">
							<label for="textfield" class="control-label">Salida2</label>
							<div class="controls">
								   <input type='text'    class='js-ok-time-24 input-mini' id="salida2" name="salida2" maxlength="8"/>
							</div>
						</div>
						<div class="control-group">
							<label for="textfield" class="control-label">Entrada3</label>
							<div class="controls">
								<input type='text'  class='js-ok-time-24 input-mini' id="entrada3" name="entrada3" maxlength="8"/>
							</div>
						</div>
						<div class="control-group">
							<label for="textfield" class="control-label">Salida3</label>
							<div class="controls">
								<input type='text'   class='js-ok-time-24 input-mini'  id="salida3" name="salida3" maxlength="8"/>
							</div>
						</div>	
				</div>
		</div>	
					
	</div>		
	<div class="modal-footer">
		   <input type="submit" class="btn blue" value="Grabar" id="btnValidate2">
		   <button type="button" data-dismiss="modal" class="btn">Cancelar</button>
	 </div>
     </form>
	   


<script language="javascript" type="text/javascript">
	jQuery(document).ready(function(){
				jQuery("#FormToValidate2").validate({
					rules: {
			                   id_empleado: "required",
			                   turno:   "required"
		                     },
		            messages: {
			                    id_empleado: {
			                               required: "Debe registrar el empleado"
			                             },
			                    turno:   {
			                             required: "Debe registrar el turno"
			                            },
		                      },
							  
                     errorElement: "span",
                        errorClass: "help-block error",
                        errorPlacement: function (element, t) {
                            t.parents(".controls").append(element)
                        },
                        highlight: function (element) {
                            jQuery(element).closest(".control-group").removeClass("error success").addClass("error")
                        },
                        success: function (element) {
                            element.addClass("valid").closest(".control-group").removeClass("error success").addClass("success")
                        },	

			onkeyup: false,		
			submitHandler: function(form) {
				var acme = "bodegas";
				var action = "nuevo";
				//valida_man(acme,action);
				    
			}
		});
	
	
        $("#fechabtnfin").datepicker({ language: "es", autoclose: true}); 
		
	});
	
</script>

