<?php
header('Content-Type: text/html; charset=UTF-8');
require("clases/sesion.php"); 
$sesion    = new sesion();
$tipo_usuario    = $sesion->get("tipo_usuario");
unset($sesion);
?>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Usuarios</h3>
  </div>
  <form  id="FormToValidate" method="POST" class="form-horizontal form-validate" >
        <div class="modal-body">
	
					<div class="control-group">
						<label for="textfield" class="control-label">Nombre y Apellido</label>
						<div class="controls">
							<input type="text" name="nombre"  id="nombre" class="input-xxlarge" data-rule-required="true" data-rule-minlength="2" maxlength="50" autofocus=true>
						</div>
					</div>

					<div class="control-group">
						<label for="textfield" class="control-label">Usuario</label>
						<div class="controls">
							<input type="text" name="usuario"  id="usuario"  class="input-xlarge" data-rule-required="true" data-rule-minlength="2" maxlength="50">
						</div>
					</div>

					
					<div class="control-group">
						<label for="textfield" class="control-label">Correo</label>
						<div class="controls">
						<input    placeholder="Correo Electronico" name="email"  id="email"    class='input-xxlarge'  data-rule-minlength="2" maxlength="50" data-rule-email="true">
						</div>
					</div>
					
					<div class="control-group">
						<label for="textfield" class="control-label">Contrase&ntilde;a</label>
						<div class="controls">
						    <input type="password" name="contrasena" id="contrasena"  placeholder="Contrase&ntilde;a" class="input-xlarge"  data-rule-minlength="2" maxlength="30">
						</div>
					</div>
					

					<div class="control-group">
						<label for="select" class="control-label">Estado</label>
						<div class="controls">
							<select id="estado" name="estado" class='input-large'>
								<option value="A" selected="selected">Activo</option>
								<option value="I">Inactivo</option>
							</select>
							<label for="estado" class="error"></label>
						</div>
					</div>
					
					<div class="control-group">
						<label for="select" class="control-label">Tipo de Usuario</label>
						<div class="controls">
							<select id="tipo_usuario" name="tipo_usuario" class='input-large'>
							    <?php  
										if($tipo_usuario == '3'){
								?>				 
											<option value="1" selected="selected">Usuario común</option>
											<option value="2">Administrador</option>
											<option value="3">Super Admin</option>
								<?php  
      								    }else{
								?>			
											<option value="1" selected="selected">Usuario común</option>
											<option value="2">Administrador</option>
								<?php  
  								       }		
								?>
							</select>
							<label for="tipo_usuario" class="error"></label>
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
				var action = "nuevo";
				var str = $("#FormToValidate").serialize()+"&action="+action;
							 $.ajax({
								 cache: false,  
								type: "POST",
								url: "update_usuarios.php",
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
								},
								complete:function(){
							           setTimeout(function() {location.reload();}, 500);	
						        }
							});
			}
		});
	
		$("#email").val(' '); 
		setTimeout(function() {
		$("#email").val(''); 
		}, 500);

        //$('#nombre').focus();
	});



	
</script>







