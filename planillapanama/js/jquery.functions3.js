	jQuery(document).ready(function(){
				jQuery("#FormToValidate").validate({

					
					rules: {
			                usuario: "required",
			                contrasena: "required"
		                   },
		            messages: {
			                    usuario: {
			                               required: "Debe ingresar el usuario"
			                             },
			                    contrasena:   {
			                             required: "Debe ingresar la contrase&ntilde;a"
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
				verificapass();
				    
			}
		});
	});	
		
	function verificapass(){
		var str = jQuery("#FormToValidate").serialize();
		jQuery.ajax({
			url: 'actualizar_con.php',
			data: str,
			type: "POST",
			success: function(datos){
				 if (datos == '0') 
				{
					window.location.href = 'rp.php';
				}
				else 
				{
                    bootbox.alert(datos);					
				}			
			}
			
		});
		return false; 
	}		
