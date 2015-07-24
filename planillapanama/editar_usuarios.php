<?php
header('Content-Type: text/html; charset=UTF-8'); 
require("clases/config.php");
require("clases/sesion.php");
$sesion    = new sesion();
$tipo_usuario    = $sesion->get("tipo_usuario");
unset($sesion);



$id = (int)$_GET['id'];
$query  = "select * from pp_usuario where id = $id";
$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
$numReg = pg_num_rows($resultado);
 if($numReg>0){
	while ($fila=pg_fetch_array($resultado)) {
			$usuario = $fila['usuario']; 
			$nombre = $fila['nombre']; 
			$email = $fila['email']; 
			$password = $fila['password']; 
			$estado = $fila['estado']; 
			$tipo_usuario = $fila['tipo_usuario']; 
 }}
 pg_free_result($resultado);  
 pg_close($conexion);		

?>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Usuarios</h3>
  </div>
  <form  id="FormToValidate" method="POST" class="form-horizontal form-validate" >
        <div class="modal-body">
	  				<div class="control-group" style="display: none;">
						<label for="textfield" class="control-label">Id</label>
						<div class="controls">
							<input type="text" name="id" id="id" class="input-large" value="<?php echo $id ?>" data-rule-required="true" data-rule-minlength="2" >
						</div>
					</div>
					<div class="control-group">
						<label for="textfield" class="control-label">Nombre y Apellido</label>
						<div class="controls">
							<input type="text" name="nombre"  id="nombre" value="<?php echo $nombre ?>" class="input-xxlarge" data-rule-required="true" data-rule-minlength="2" maxlength="50" >
						</div>
					</div>

					<div class="control-group">
						<label for="textfield" class="control-label">Usuario</label>
						<div class="controls">
							<input type="text" name="usuario"  id="usuario"  value="<?php echo $usuario ?>" class="input-xlarge" data-rule-required="true" data-rule-minlength="2" maxlength="50"  disabled>
						</div>
					</div>

					
					<div class="control-group">
						<label for="textfield" class="control-label">Correo</label>
						<div class="controls">
						<input    placeholder="Correo Electronico" name="email"  id="email"  value="<?php echo $email ?>"  class='input-xxlarge'  data-rule-minlength="2" maxlength="50" data-rule-email="true">
						</div>
					</div>
					
					<div class="control-group">
						<label for="textfield" class="control-label">Contrase&ntilde;a</label>
						<div class="controls">
						    <input type="password" name="contrasena" id="contrasena" value="<?php echo $password ?>"  placeholder="Contrase&ntilde;a" class="input-xlarge"  data-rule-minlength="2" maxlength="30">
						</div>
					</div>
					

					<div class="control-group">
						<label for="select" class="control-label">Estado</label>
						<div class="controls">
							<select id="estado" name="estado" class='input-large'>
								<option  <?php if ($estado == "A" ) echo 'selected'; ?>  value="A">Activo</option>
								<option <?php if ($estado == "I" ) echo 'selected'; ?>  value="I">Inactivo</option>
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
									<option  <?php if ($tipo_usuario == "1" ) echo 'selected'; ?>  value="1">Usuario común</option>
									<option <?php if ($tipo_usuario == "2" ) echo 'selected'; ?>  value="2">Administrador</option>
									<option <?php if ($tipo_usuario == "3" ) echo 'selected'; ?>  value="3">Super Admin</option>
								<?php  
      								    }else{
								?>
									<option  <?php if ($tipo_usuario == "1" ) echo 'selected'; ?>  value="1">Usuario común</option>
									<option <?php if ($tipo_usuario == "2" ) echo 'selected'; ?>  value="2">Administrador</option>
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
				var action = "editar";
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
	
		var str = $("#email").val(); 
        var n = str.length;
		if (n == 0)
		{
			$("#email").val(' '); 
			setTimeout(function() {
			$("#email").val(''); 
			}, 500);
		}

        $('#nombre').focus();
	});



	
</script>







