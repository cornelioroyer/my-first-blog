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

$query2  = " select a.id,c.nombre as nombre_compania,a.descripcion from pla_proyectos a,pp_usuario_proyecto b,pla_companias c ";
$query2 .= "  where a.id = b.pla_proyectos_id ";
$query2  .= "    and b.pp_usuario_id = $id ";
$query2 .= "    and c.compania = a.compania ";
$query2 .= "   order by c.nombre,a.descripcion ";

$resultado2 = pg_query($conexion, $query2) or die("Error en la Consulta SQL");
$numReg2 = pg_num_rows($resultado2);
$li_contarray = 0;
if($numReg2>0){
	while ($fila2=pg_fetch_array($resultado2)) {		
	$datosArray[$li_contarray] ['id']  = $fila2['id'];
	$datosArray[$li_contarray] ['nombre_compania']   = $fila2['nombre_compania'];
    $datosArray[$li_contarray] ['nombre']   = $fila2['descripcion'];
	$datosArray[$li_contarray] ['marca']   = "X";
	 $li_contarray++;
} } 
pg_free_result($resultado2); 


$query3   = "select a.id,c.nombre as nombre_compania,a.descripcion from pla_proyectos a,pp_usuario_compania b,pla_companias c ";
$query3  .= "where a.compania = b.compania "; 
$query3  .= "  and b.compania = c.compania ";
$query3  .= "  and pp_usuario_id = $id ";
$query3  .= "  and a.id not in (select pla_proyectos_id from pp_usuario_proyecto where pp_usuario_id = $id ) ";
$query3  .= "  order by c.nombre,a.descripcion ";

$resultado3 = pg_query($conexion, $query3) or die("Error en la Consulta SQL");
$numReg3 = pg_num_rows($resultado3);
if($numReg3>0){
	while ($fila3=pg_fetch_array($resultado3)) {		
	$datosArray[$li_contarray] ['id']  = $fila3['id'];
	$datosArray[$li_contarray] ['nombre_compania']   = $fila3['nombre_compania'];
    $datosArray[$li_contarray] ['nombre']   = $fila3['descripcion'];
	$datosArray[$li_contarray] ['marca']   = "-";
	 $li_contarray++;
} } 
pg_free_result($resultado3); 
pg_close($conexion);
?>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Proyectos</h3>
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
											<th>Proyecto</th>
											<th>Conpania</th>
											<th>Nombre del Proyecto</th>
										</tr>
									</thead>
									<tbody>
									<?php

									if ($li_contarray > 0) {
										   foreach($datosArray as $valor) {		
											
									?>
										<tr>
                                             <td class="aligncenter"><span class="center"><input type="checkbox" name="ids[]" class="checkboxes" <?php if ($valor['marca'] == "X") echo "checked='checked'"; ?>  value="<?php echo $valor['id']; ?>" ></span></td>
											<td><?php echo $valor['id']; ?></td>
											<td><?php echo $valor['nombre_compania']; ?></td>
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
			                id: "required",
		                   },
		            messages: {
			                    id: {
			                               required: "Debe especificar el nombre y apellido"
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
								url: "update_proyectos.php",
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
						//	  bootbox.alert('<strong>' + 'Debe relacionar el proyecto para grabar el registro' + '</strong>', 'Salir');
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







