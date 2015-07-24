<?php
header('Content-Type: text/html; charset=UTF-8'); 
require("clases/config.php");
require("clases/sesion.php");
$sesion    = new sesion();
$nombre_usuario   = $sesion->get("nombre_usuario");
$id_usuario = (int)$sesion->get("id_usuario");
$usuario    = $sesion->get("usuario");
unset($sesion);

$id = (int)$_GET['id'];

$query2  = "select a.compania,b.nombre from pp_usuario_compania a,pla_companias b where a.compania = b.compania and a.pp_usuario_id = $id order by b.nombre";
$resultado2 = pg_query($conexion, $query2) or die("Error en la Consulta SQL");
$numReg2 = pg_num_rows($resultado2);
$li_contarray = 0;
if($numReg2>0){
	while ($fila2=pg_fetch_array($resultado2)) {		
	$datosArray[$li_contarray] ['compania']  = $fila2['compania'];
    $datosArray[$li_contarray] ['nombre']   = $fila2['nombre'];
	$datosArray[$li_contarray] ['marca']   = "X";
	 $li_contarray++;
} } 
pg_free_result($resultado2); 

$query3  = "select a.compania,a.nombre from pla_companias a where length(a.nombre) > 0 and a.status = 1 and a.compania not in (select compania from pp_usuario_compania where pp_usuario_id = $id ) order by a.nombre";
$resultado3 = pg_query($conexion, $query3) or die("Error en la Consulta SQL");
$numReg3 = pg_num_rows($resultado3);
if($numReg3>0){
	while ($fila3=pg_fetch_array($resultado3)) {		
	$datosArray[$li_contarray] ['compania']  = $fila3['compania'];
    $datosArray[$li_contarray] ['nombre']   = $fila3['nombre'];
	$datosArray[$li_contarray] ['marca']   = "-";
	 $li_contarray++;
} } 
pg_free_result($resultado3); 
pg_close($conexion);
?>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Compa&ntilde;ias</h3>
  </div>
  <form  id="FormToValidate" method="POST" class="form-horizontal form-validate" >
        <div class="modal-body">
                       	<div class="control-group" style="display: none;">
							<label for="textfield" class="control-label">Id</label>
							<div class="controls">
								<input type="text" name="id" id="id" class="input-large" value="<?php echo $id ?>" data-rule-required="true" data-rule-minlength="2" >
							</div>
					  </div>
		               <div class="box">
							<div class="box-content nopadding">
								<table class="table table-hover table-nomargin table-bordered dataTable dataTable-nosort" data-nosort="0" id="example2">
									<thead>
										<tr class='thefilter'>
											<th></th>
											<th>Compa&ntilde;ia</th>
											<th>Nombre de la compa&ntilde;ia</th>
										</tr>
									</thead>
									<tbody>
									<?php

									if ($li_contarray > 0) {
										   foreach($datosArray as $valor) {		
											
									?>
										<tr>
                                            <td class="aligncenter"><span class="center"><input type="checkbox" name="ids[]" class="checkboxes" <?php if ($valor['marca'] == "X") echo "checked='checked'"; ?>  value="<?php echo $valor['compania']; ?>" ></span></td>
											<td><?php echo $valor['compania']; ?></td>
											<td><?php echo $valor['nombre']; ?></td>
										</tr>
									<?php	
									 }}
									 
									?>
									</tbody>
								</table>
							</div>
						</div>

    				<div class="modal-footer">
				       <input type="submit" class="btn btn-primary" value="Grabar" >
				       <button type="button" data-dismiss="modal" class="btn">Cancelar</button>
			        </div>

		
		
		</div>					

	</form>	
	
<script language="javascript" type="text/javascript">
	$(document).ready(function(){

				$("#FormToValidate").validate({
					rules: {
			                nombre: "required",
							usuario: "required",
			                estado: "required",
		                   },
		            messages: {
			                    nombre: {
			                               required: "Debe especificar el nombre y apellido"
			                             },
								usuario: {
			                               required: "Debe ingresar el usuario"
			                             },			 
			                    estado:   {
			                             required: "Debe ingresar el estado"
			                            },
								tipousuario:   {
			                             required: "Debe ingresar el tipo de usuario"
			                            }		
		                      },
							  
                        errorElement: "span",
                        errorClass: "help-block error",
                        errorPlacement: function (element, t) {
                            t.parents(".controls").append(element)
                        },
                        highlight: function (element) {
                            $(element).closest(".control-group").removeClass("error success").addClass("error")
                        },
                        success: function (element) {
                            element.addClass("valid").closest(".control-group").removeClass("error success").addClass("success")
                        },							 

			onkeyup: false,
			submitHandler: function(form) {
				var action = "editar";
                //var n = jQuery(".checkboxes:checked").length;
                //if (n > 0){
				             var str = $("#FormToValidate").serialize();
							 $.ajax({
								 cache: false,  
								type: "POST",
								url: "update_compania.php",
								data: str,
								async:false,
								success: function(datos){
									toastr.options = {
									  "debug": false,
									  "positionClass": "toast-top-center",
									  "onclick": null,
									  "fadeIn": 300,
									  "fadeOut": 1000,
									  "timeOut": 3000,
									  "extendedTimeOut": 3000
									};
										toastr.success('', datos);
										//alert(datos);
								},
								complete:function(){
									    //alert(datos);
							           setTimeout(function() {location.reload();}, 500);	
						        }
							});
						//}else {
						//	  bootbox.alert('<strong>' + 'Debe relacionar una compañia para grabar el registro' + '</strong>', 'Salir');
						//}
				
				

			}
		});
		
		
				  $('#example2').dataTable( {
					"bProcessing": true,
					"bInfo": true,
					"bAutoWidth": true,
					//"aaSorting": [[ 1, "asc" ]],
					"aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0 ] } ],
					"oLanguage": {"sUrl": "espanol.txt"},
					"bScrollInfinite": true,
                    "bScrollCollapse": true,
			        "sScrollY": "250",
			        "bSortCellsTop": true
			} );	
	

	});

</script>







