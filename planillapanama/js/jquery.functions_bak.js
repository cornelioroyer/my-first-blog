	function ActualizarDatos(opcion,action,vurl,jsonurl){

	    var str = $("#FormToValidate").serialize()+"&action="+action;

		$.ajax({
		    cache: false,
			url: opcion,
			data: str,
			type: 'POST',
			success: function(data){
		 
	        AutoReload(jsonurl);
			
			toastr.options = {
				  "debug": false,
				  "positionClass": "toast-bottom-left",
				//  "positionClass": "toast-top-center",
				  "onclick": null,
				  "fadeIn": 300,
				  "fadeOut": 1000,
				  "timeOut": 1500,
				  "extendedTimeOut": 1500
				};
			toastr.success('', data);
		    
		    $('#formulario').modal('hide');
			}
		});
		
	    return false;
	}
	
	
	

	
	
		function valida_ajustedebito(){
		var jsonurl = "json_cobros.php";
		var str = $("#FormToValidate").serialize();
	    	$.ajax({
				cache: false,
				url: "actualizar_ajustedebito.php",
				data: str,
				type: 'POST',
				success: function(data){
						$('#formulario').modal('hide');
					    AutoReload(jsonurl);
						
						toastr.options = {
							  "debug": false,
							  "positionClass": "toast-bottom-left",
							  "onclick": null,
							  "fadeIn": 300,
							  "fadeOut": 1000,
							  "timeOut": 1500,
							  "extendedTimeOut": 1500
							};
						toastr.success('', data);
				
						},
						complete:function(){
							$("#FormToValidate")[0].reset();
						}
			});
		 

	    return false;
	}
	
	
	function valida_ajustedebitocxp(){
		var jsonurl = "json_pagos.php";
		var str = $("#FormToValidate").serialize();
	    	$.ajax({
				cache: false,
				url: "actualizar_ajustedebitocxp.php",
				data: str,
				type: 'POST',
				success: function(data){
						$('#formulario').modal('hide');
					    AutoReload(jsonurl);
						
						toastr.options = {
							  "debug": false,
							  "positionClass": "toast-bottom-left",
							  "onclick": null,
							  "fadeIn": 300,
							  "fadeOut": 1000,
							  "timeOut": 1500,
							  "extendedTimeOut": 1500
							};
						toastr.success('', data);
				
						},
						complete:function(){
							$("#FormToValidate")[0].reset();
						}
			});
		 

	    return false;
	}
	
	

		function valida_ajustecredito(){
		var jsonurl = "json_cobros.php";
		var str = $("#FormToValidate").serialize();
	 		$.ajax({
				cache: false,
				url: "actualizar_ajustecredito.php",
				data: str,
				type: 'POST',
				success: function(data){
				   	
					$('#formulario').modal('hide');
					AutoReload(jsonurl);
				    toastr.options = {
					  "debug": false,
					  "positionClass": "toast-bottom-left",
					  "onclick": null,
					  "fadeIn": 300,
					  "fadeOut": 1000,
					  "timeOut": 1500,
					  "extendedTimeOut": 1500
					};
				    toastr.success('', data);
				    
				},
				complete:function(){
					$("#FormToValidate")[0].reset();
				}
			});
	
	    return false;
	}
	
	    function valida_ajustecreditocxp(){
		var jsonurl = "json_pagos.php";
		var str = $("#FormToValidate").serialize();
	 		$.ajax({
				cache: false,
				url: "actualizar_ajustecreditocxp.php",
				data: str,
				type: 'POST',
				success: function(data){
				   	
					$('#formulario').modal('hide');
					AutoReload(jsonurl);
				    toastr.options = {
					  "debug": false,
					  "positionClass": "toast-bottom-left",
					  "onclick": null,
					  "fadeIn": 300,
					  "fadeOut": 1000,
					  "timeOut": 1500,
					  "extendedTimeOut": 1500
					};
				    toastr.success('', data);
				    
				},
				complete:function(){
					$("#FormToValidate")[0].reset();
				}
			});
	
	    return false;
	}
	
	
	
	function detcobros(id_apartamento,id_compania,id, documento,comentario,fecha, montopago, signo,documentotrx,montototal,archivo,tipopago,id_cuentabanco)		
{
    this.id_apartamento = id_apartamento;
    this.id_compania    = id_compania;
	this.id             = id;
    this.documento      = documento;
	this.comentario     = comentario;
	this.fecha          = fecha;
	this.montopago      = montopago;
	this.signo          = signo;
	this.documentotrx   = documentotrx;
	this.montototal     = montototal;
	this.archivo        = archivo;
	this.tipopago       = tipopago;
	this.id_cuentabanco = id_cuentabanco;
	
}


	function detcobroscxp(id_proveedor,id_compania,id, documento,comentario,fecha, montopago, signo,documentotrx,montototal,archivo)		
{
    this.id_proveedor = id_proveedor;
    this.id_compania    = id_compania;
	this.id             = id;
    this.documento      = documento;
	this.comentario     = comentario;
	this.fecha          = fecha;
	this.montopago      = montopago;
	this.signo          = signo;
	this.documentotrx   = documentotrx;
	this.montototal     = montototal;
	this.archivo        = archivo;
	this.tipopago       = tipopago;
}
	
	
		function valida_cobrossocial(archivotxt){
		var jsonurl = "json_cobros.php";
		var str = $("#FormToValidate").serialize()+"&archivo="+archivotxt;
        //bootbox.confirm("Desea aplicar el pago al area social ?", "No", "Si",function(result) {
        //if (result) {
			$.ajax({
				cache: false,
				url: "actualizar_cobrossocial.php",
				data: str,
				type: 'POST',
				success: function(data){
				  $('#formulario').modal('hide');
				  AutoReload(jsonurl);
				
				toastr.options = {
					  "debug": false,
					  "positionClass": "toast-bottom-left",
					  "onclick": null,
					  "fadeIn": 300,
					  "fadeOut": 1000,
					  "timeOut": 1500,
					  "extendedTimeOut": 1500
					};
				toastr.success('', data);
				
				
				}
			});
		 //}
         //});
	
	    return false;
	}
	
	
	
	
	function Actualizarpagos(cobrosJSON){
       
		var jsonurl = "json_cobros.php";
         $.ajax({type: "POST",
			url: "actualizar_cobros.php",
			data: {detcobros : cobrosJSON}, 
			cache: false,
			success: function(data){
                    $('#formulario').modal('hide');
					AutoReload(jsonurl);
				    toastr.options = {
						  "debug": false,
						  "positionClass": "toast-bottom-left",
						  "onclick": null,
						  "fadeIn": 300,
						  "fadeOut": 1000,
						  "timeOut": 1500,
						  "extendedTimeOut": 1500
						};
					toastr.success('', data);
			}
		});
		
		
		return false;

	}
	
	
		function Actualizarpagoscxp(pagosJSON){
       
		var jsonurl = "json_pagos.php";
         $.ajax({type: "POST",
			url: "actualizar_pagos.php",
			data: {detpagos : pagosJSON}, 
			cache: false,
			success: function(data){
                    $('#formulario').modal('hide');
					AutoReload(jsonurl);
				    toastr.options = {
						  "debug": false,
						  "positionClass": "toast-bottom-left",
						  "onclick": null,
						  "fadeIn": 300,
						  "fadeOut": 1000,
						  "timeOut": 1500,
						  "extendedTimeOut": 1500
						};
					toastr.success('', data);
			}
		});
		
		
		return false;

	}
	
	
		function imprimirestadosincorreo(id_llave){
		 var str = "id_llave="+id_llave.toString();
		 var $modal2 = $('#pleaseWaitDialog');
		 $modal2.modal();
		 $.ajax({
				cache: false,
				url: "opcion_estadodecuentasincorreo.php", 
				type: "POST",
				data: str,
				success: function(datos){
				        $('#pleaseWaitDialog').modal('hide');
						var $modal = $('#formularioenvio');
						$modal.html(datos);
						$modal.modal();
			}
			});
			return false;
	}
	
		
	function imprimircobros(id_comp,id_apartamento,archivotxt){
	  var condicion = "codigo="+archivotxt+"&id_comp="+id_comp+"&id_apartamento="+id_apartamento;
      $.ajax({
		    cache: false,
		    url: "opcion_cobros.php", 
			type: "GET",
			data: condicion,
			success: function(datos){
 		    var $modal = $('#formularioenvio');
		    $modal.html(datos);
            $modal.modal();

			}
		});
		return false;
		
	}
	
	function imprimirtransaccionesbco(){
		 var str = $("#FormToValidate").serialize();
		 $.ajax({
				cache: false,
				url: "opcion_transaccionesbco.php", 
				type: "GET",
				data: str,
				success: function(datos){
					var $modal = $('#formularioenvio');
					$modal.html(datos);
					$modal.modal();

				}
			});
			return false;
	}
	
	
	
	function imprimimorosidadcxp(){
		 var str = $("#FormToValidate").serialize();
		 $.ajax({
				cache: false,
				url: "opcion_morosidadcxp.php", 
				type: "GET",
				data: str,
				success: function(datos){
					var $modal = $('#formularioenvio');
					$modal.html(datos);
					$modal.modal();

				}
			});
			return false;
	}

	function imprimirtransacionescxp(){
		 var str = $("#FormToValidate").serialize();
		 $.ajax({
				cache: false,
				url: "opcion_transaccionescxp.php", 
				type: "GET",
				data: str,
				success: function(datos){
					var $modal = $('#formularioenvio');
					$modal.html(datos);
					$modal.modal();

				}
			});
			return false;
	}

	function imprimirgastoscxp(){
		 var str = $("#FormToValidate").serialize();
		 $.ajax({
				cache: false,
				url: "opcion_gastoscxp.php", 
				type: "GET",
				data: str,
				success: function(datos){
					var $modal = $('#formularioenvio');
					$modal.html(datos);
					$modal.modal();

				}
			});
			return false;
	}	
	
	
	function imprimirestadocuenta(){
		 var str = $("#FormToValidate").serialize();
		 $.ajax({
				cache: false,
				url: "opcion_estadocuenta.php", 
				type: "GET",
				data: str,
				success: function(datos){
				//alert(datos);
			   var $modal = $('#formularioenvio');
				$modal.html(datos);
				$modal.modal();

				}
			});
			return false;
	}
	
	function fn_imprimirrecibouser(){
		 var str = $("#FormToValidate").serialize();
		 $.ajax({
				cache: false,
				url: "opcion_recibopagos.php", 
				type: "GET",
				data: str,
				success: function(datos){
				      $("#imprimeestadocuenta").html("");
				      $("#imprimeestadocuenta").html(datos);
				}
			});
			return false;
	}	
	
	function imprimirestadocuentauser(){
		 var str = $("#FormToValidate").serialize();
		 $.ajax({
				cache: false,
				url: "opcion_estadocuentausers.php", 
				type: "GET",
				data: str,
				success: function(datos){
				      $("#imprimeestadocuenta").html("");
				      $("#imprimeestadocuenta").html(datos);
				}
			});
			return false;
	}
	
	
	
	function imprimirestadocuentadetalladousers(){
		 var str = $("#FormToValidate").serialize();
		 $.ajax({
				cache: false,
				url: "opcion_estadocuentadetalladousers.php", 
				type: "GET",
				data: str,
				success: function(datos){
				      $("#imprimeestadocuenta").html("");
				      $("#imprimeestadocuenta").html(datos);
				}
			});
			return false;
	}
	
	
	
	function imprimirestadocuentadetallado(){
		 var str = $("#FormToValidate").serialize();
		 $.ajax({
				cache: false,
				url: "opcion_estadocuentadetallado.php", 
				type: "GET",
				data: str,
				success: function(datos){
			    var $modal = $('#formularioenvio');
				$modal.html(datos);
				$modal.modal();

				}
			});
			return false;
	}
	



function mailcobros(id_comp,id_apartamento,archivotxt){
	  var condicion = "codigo="+archivotxt+"&id_comp="+id_comp+"&id_apartamento="+id_apartamento;
      $.ajax({
		    cache: false,
		    url: "pdfmail.php", 
			type: "GET",
			data: condicion,
			success: function(datos){
					toastr.options = {
						  "debug": false,
						  "positionClass": "toast-bottom-left",
						  "onclick": null,
						  "fadeIn": 300,
						  "fadeOut": 1000,
						  "timeOut": 1500,
						  "extendedTimeOut": 1500
						};
					toastr.success('', datos);

			}
		});
		return false;
		
	}

	
	function mailestadocuenta(id_compania,id_apartamento,archivo,size){
	  var condicion = "codigo="+archivo+"&id_compania="+id_compania+"&id_apartamento="+id_apartamento+"&size="+size;
      $.ajax({
		    cache: false,
		    url: "pdfmailestadocuenta.php", 
			type: "GET",
			data: condicion,
			success: function(datos){
					toastr.options = {
						  "debug": false,
						  "positionClass": "toast-bottom-left",
						  "onclick": null,
						  "fadeIn": 300,
						  "fadeOut": 1000,
						  "timeOut": 1500,
						  "extendedTimeOut": 1500
						};
				toastr.success('', datos);
			}
		});
		return false;
		
	}
	
	
	
	function ConsultaDatos(vurl){
	    //alert (datos);

		$.ajax({
			url: vurl,
			cache: false,
			type: "GET",
			success: function(datos){
			 $("#tabla").html(datos);
			}
		});
		
	}
	
	function EliminarDato(acme,id){
		var opciones = acme;
		switch (opciones) { 
		  case "bancos":
			 var vurl = "listar_bancos.php";
			 var opcion = "actualizar_bancos.php";
			 var jsonurl = "json_bancos.php";
			 break;
		  case "directiva":
			 var vurl = "listar_directiva.php";
			 var opcion = "actualizar_directiva.php";
			 var jsonurl = "json_directiva.php";
			 break;			 
		  case "tipogasto":
			 var vurl = "listar_tipogasto.php";
			 var opcion = "actualizar_tipogasto.php";
			 var jsonurl = "json_tipogasto.php";
			 break;			 
		  case "cuentabancos":
			 var vurl = "listar_cuentabancos.php";
			 var opcion = "actualizar_cuentabancos.php";
			 var jsonurl = "json_cuentabancos.php";
			 break;	 
		  case "torres":
			 var vurl = "listar_torres.php";
			 var opcion = "actualizar_torres.php";
			 var jsonurl = "json_torres.php";
             break;
		  case "apartamentos":
			 var vurl = "listar_apartamentos.php";
			 var opcion = "actualizar_apartamentos.php";
			 var jsonurl = "json_apartamentos.php";
             break;	 
		  case "proveedores":
			 var vurl = "listar_proveedores.php";
			 var opcion = "actualizar_proveedores.php";
			 var jsonurl = "json_proveedores.php";
             break;	 			 
		  case "vehiculos":
			 var vurl = "listar_vehiculos.php";
			 var opcion = "actualizar_vehiculos.php";
			 var jsonurl = "json_vehiculos.php";
             break;		
          case "instalaciones":
			 var vurl = "listar_instalaciones.php";
			 var opcion = "actualizar_instalaciones.php";
			 var jsonurl = "json_instalaciones.php";
             break;		
          case "usuarios":
			 var vurl = "listar_usuarios.php";
			 var opcion = "actualizar_usuarios.php";
			 var jsonurl = "json_usuarios.php";
             break;	
          case "usuariosadmin":
			 var vurl = "listar_usuariosadmin.php";
			 var opcion = "actualizar_usuariosadmin.php";
			 var jsonurl = "json_usuariosadmin.php";
             break;				 
           case "documentos":
			 var vurl = "listar_documentos.php";
			 var opcion = "actualizar_documentos.php";
			 var jsonurl = "json_documentos.php";
             break;	 
           case "cxctransaccion":
			 var vurl = "listar_cxctransaccion.php";
			 var opcion = "actualizar_cxctransaccion.php";
			 var jsonurl = "json_cxctransaccion.php";
             break;	 	
           case "cxptransaccion":
			 var vurl = "listar_cxptransaccion.php";
			 var opcion = "actualizar_cxptransaccion.php";
			 var jsonurl = "json_cxptransaccion.php";
             break;	
           case "bcotransaccion":
			 var vurl = "listar_bcotransaccion.php";
			 var opcion = "actualizar_bcotransaccion.php";
			 var jsonurl = "json_bcotransaccion.php";
             break;	  			 
		}
		
		
		var action = "eliminar";
	    bootbox.confirm("Desea eliminar el registro ?", "Cancelar", "Eliminar",function(result) {
        if (result) {
		      $.ajax({
			    cache: false,
				url: opcion,
				type: "POST",
				data: "id="+id+"&action="+action,
				success: function(data){
				
				AutoReload(jsonurl);
				toastr.options = {
				  "debug": false,
				  "positionClass": "toast-bottom-left",
				  "onclick": null,
				  "fadeIn": 300,
				  "fadeOut": 1000,
				  "timeOut": 1500,
				  "extendedTimeOut": 1500
				};
			        toastr.success('', data);
					
				}
			   });
		
           } else {

           }
         });
	
		return false;
	}
	
	
	
	function fn_correo(acme,action){
		var opciones = acme;
		var str = $("#FormToValidate2").serialize()+"&action="+action;
  	    var vurl = "listar_documentos.php";
		var jsonurl = "json_documentos.php";
		
		$('#formulariocorreo').modal('hide');
		
		var $modal = $('#pleaseWaitDialog');
		$modal.modal();
				
		$.ajax({
		    cache: false,
		    url: "actualizar_documentos.php",
			type: "POST",
			data: str,
			success: function(datos){
			
			        $('#pleaseWaitDialog').modal('hide');
					
					AutoReload(jsonurl);
					toastr.options = {
						  "debug": false,
						  "positionClass": "toast-bottom-left",
						  "onclick": null,
						  "fadeIn": 300,
						  "fadeOut": 1000,
						  "timeOut": 1500,
						  "extendedTimeOut": 1500
						};
					toastr.success('', datos);
					

			}
		});  

	
		return false;
	}
	
	
	function fn_imprimirrecibo(acme,action){
		var opciones = acme;
		var str = $("#FormToValidateimpresion").serialize()+"&action="+action;
  	    var vurl = "listar_cobros.php";
		var jsonurl = "json_cobros.php";
       // alert(str);
		$.ajax({
		    cache: false,
		    url: "opcion_cobros.php",
			type: "GET",
			data: str,
			success: function(datos){
			        
					/*AutoReload(jsonurl);
					toastr.options = {
						  "debug": false,
						  "positionClass": "toast-bottom-left",
						  "onclick": null,
						  "fadeIn": 300,
						  "fadeOut": 1000,
						  "timeOut": 1500,
						  "extendedTimeOut": 1500
						};
					toastr.success('', datos);*/
					$('#formularioimpresion').modal('hide');
					var $modal = $('#formularioenvio');
				    $modal.html(datos);
				    $modal.modal();

			}
		});  

	
		return false;
	}	
	

	function Cancelar(){

		$('#formulario').modal('hide');
		return false;

	}
	
	

function fn_mostrar_frm_agregar(acme){

        
		
		var opciones = acme;
		switch (opciones) { 
		  case 'bancos':
			 var vurl = "nuevo_bancos.php";
			 break;
		 case 'directiva':
			 var vurl = "nuevo_directiva.php";
			 break;	 
		  case 'tipogasto':
			 var vurl = "nuevo_tipogasto.php";
			 break; 	 
		  case 'cuentabancos':
			 var vurl = "nuevo_cuentabancos.php";
			 break;
		  case 'torres':
			var vurl = "nuevo_torres.php";
			break;
		  case 'apartamentos':
			var vurl = "nuevo_apartamentos.php";
			break;	
		  case 'proveedores':
			var vurl = "nuevo_proveedores.php";
			break;				
		  case 'vehiculos':
			var vurl = "nuevo_vehiculos.php";
			break;	
		  case 'instalaciones':
			var vurl = "nuevo_instalaciones.php";
			break;
		  case 'usuarios':
			var vurl = "nuevo_usuarios.php";
			break;	
		  case 'usuariosadmin':
			var vurl = "nuevo_usuariosadmin.php";
			break;				
		  case 'documentos':
			var vurl = "nuevo_documentos.php";
			break;	
          case 'cxctransaccion':
			var vurl = "nuevo_cxctransaccion.php";
			break;	
          case 'cxptransaccion':
			var vurl = "nuevo_cxptransaccion.php";
			break;		
          case 'bcotransaccion':
			var vurl = "nuevo_bcotransaccion.php";
			break;
          case 'saldobanco':
			var vurl = "nuevo_saldobanco.php";
			break;	
          case 'calendario':
			var vurl = "nuevo_calendario.php";
			break;			

		}	
		
		
		
		 $.ajax({
        cache: false,
        type: 'GET',
        url: vurl,
        success: function(datos) {

  		    var $modal = $('#formulario');
			$modal.html("");
		    $modal.html(datos);
            $modal.modal();

        }
    });
		
		

		return false;
		
}



function fn_mostrar_frm_modificar(acme,id){
        
		var opciones = acme;

		switch (opciones) { 
		  case "tramite":
			 var vurl = "editar_tramite.php";
			 break;
		  case "bancos":
		   var vurl = "editar_bancos.php";
			 break;
		  case "directiva":
			 var vurl = "editar_directiva.php";
			 break;			 
		  case "tipogasto":
			 var vurl = "editar_tipogasto.php";
			 break;	 
		  case "cuentabancos":
			 var vurl = "editar_cuentabancos.php";
			 break;	 
		  case "torres":
			var vurl = "editar_torres.php";
			break;
		  case "apartamentos":
			var vurl = "editar_apartamentos.php";
			break;	
		  case "proveedores":
			var vurl = "editar_proveedores.php";
			break;				
		  case "vehiculos":
			var vurl = "editar_vehiculos.php";
			break;	
		  case 'instalaciones':
			var vurl = "editar_instalaciones.php";
			break;	
          case 'usuarios':
			var vurl = "editar_usuarios.php";
			break;
          case 'usuariosadmin':
			var vurl = "editar_usuariosadmin.php";
			break;			
          case 'usuariosphotos':
			var vurl = "editar_usuariosphotos.php";
			break
          case 'usuariosver':
			var vurl = "ver_usuarios.php";
			break	
          case 'detalleapto':
			var vurl = "detalle_morosidad.php";
			break			
          case 'documentos':
			var vurl = "editar_documentos.php";
			break;	
          case 'cxctransaccion':
			var vurl = "editar_cxctransaccion.php";
			break;		
          case 'cxptransaccion':
			var vurl = "editar_cxptransaccion.php";
			break;	
          case 'bcotransaccion':
			var vurl = "editar_bcotransaccion.php";
			break;
          case 'pagos':
			var vurl = "editar_pagos.php";
			break;				
          case 'cobros':
			var vurl = "editar_cobros.php";
			break;	
          case 'cobrossocial':
			var vurl = "editar_cobrossocial.php";
			break;				
          case 'cobrosajusdb':
			var vurl = "editar_cobrosajusdb.php";
			break;	
          case 'cobrosajuscr':
			var vurl = "editar_cobrosajuscr.php";
			break;				
          case 'pagosajusdb':
			var vurl = "editar_pagosajusdb.php";
			break;	
          case 'pagosajuscr':
			var vurl = "editar_pagosajuscr.php";
			break;				


		}
		//$(window).scrollTop(0);
		$.ajax({
		    cache: false,
		    url: vurl, 
			type: "GET",
			data: "id="+id,
			success: function(datos){

  		    var $modal = $('#formulario');
		    $modal.html(datos);
            $modal.modal();
			}
		});
		return false;


}

	function fn_mostrar_frm_modificarphoto(acme,id){
		var opciones = acme;

		switch (opciones) { 
          case 'usuariosphotos':
			var vurl = "editar_usuariosphotos.php";
			break		
           case 'edificiosphotos':
			var vurl = "editar_edificiosphotos.php";
			break				
		}
		//$(window).scrollTop(0);
		$.ajax({
		    cache: false,
		    url: vurl, 
			type: "GET",
			data: "id="+id,
			success: function(datos){

  		    var $modal = $('#formulariophoto');
		    $modal.html(datos);
            $modal.modal();
			}
		});
		return false;
		
	}



function fn_mostrar_frm_modificarmail(acme,id){
    var vurl = "editar_documentosmail.php";
	var opciones = acme;
	$.ajax({
		    cache: false,
		    url: vurl, 
			type: "GET",
			data: "id="+id,
			success: function(datos){

  		    var $modal = $('#formulariocorreo');
			$modal.html("");
		    $modal.html(datos);
            $modal.modal();
			}
		});
		return false;
}


function fn_mostrar_frm_reimprecioncobros(acme,id){
    var vurl = "cobrosreimpresion.php";
	var opciones = acme;
	$.ajax({
		    cache: false,
		    url: vurl, 
			type: "GET",
			data: "id="+id,
			success: function(datos){

  		    var $modal = $('#formularioimpresion');
		    $modal.html(datos);
            $modal.modal();
			}
		});
		return false;
}



function valida_man(acme,action){
		var opciones = acme;
		//var str1 = $("#FormToValidate").serialize()
		//alert(str1);
		//return false;
		switch (opciones) { 
		  case "bancos":
			 var vurl = "listar_bancos.php";
			 var opcion = "actualizar_bancos.php";
			 var jsonurl = "json_bancos.php";
			 break;
		  case "directiva":
			 var vurl = "listar_directiva.php";
			 var opcion = "actualizar_directiva.php";
			 var jsonurl = "json_directiva.php";
			 break;			 
		  case "tipogasto":
			 var vurl = "listar_tipogasto.php";
			 var opcion = "actualizar_tipogasto.php";
			 var jsonurl = "json_tipogasto.php";
			 break;			 
		  case "cuentabancos":
			 var vurl = "listar_cuentabancos.php";
			 var opcion = "actualizar_cuentabancos.php";
			 var jsonurl = "json_cuentabancos.php";
			 break;	 
		  case "torres":
			 var vurl = "listar_torres.php";
			 var opcion = "actualizar_torres.php";
			 var jsonurl = "json_torres.php";
             break;
		  case "apartamentos":
			 var vurl = "listar_apartamentos.php";
			 var opcion = "actualizar_apartamentos.php";
			 var jsonurl = "json_apartamentos.php";
             break;	 
		  case "proveedores":
			 var vurl = "listar_proveedores.php";
			 var opcion = "actualizar_proveedores.php";
			 var jsonurl = "json_proveedores.php";
             break;	 			 
		  case "vehiculos":
			 var vurl = "listar_vehiculos.php";
			 var opcion = "actualizar_vehiculos.php";
			 var jsonurl = "json_vehiculos.php";
             break;	 
		  case "instalaciones":
			 var vurl = "listar_instalaciones.php";
			 var opcion = "actualizar_instalaciones.php";
			 var jsonurl = "json_instalaciones.php";
             break;	
		  case "usuarios":
			 var vurl = "listar_usuarios.php";
			 var opcion = "actualizar_usuarios.php";
			 var jsonurl = "json_usuarios.php";
             break;		
		  case "usuariosadmin":
			 var vurl = "listar_usuariosadmin.php";
			 var opcion = "actualizar_usuariosadmin.php";
			 var jsonurl = "json_usuariosadmin.php";
             break;				 
		  case "documentos":
			 var vurl = "listar_documentos.php";
			 var opcion = "actualizar_documentos.php";
			 var jsonurl = "json_documentos.php";
			 break;	
          case "cxctransaccion":
			 var vurl = "listar_cxctransaccion.php";
			 var opcion = "actualizar_cxctransaccion.php";
			 var jsonurl = "json_cxctransaccion.php";
			 break;	
          case "cxptransaccion":
			 var vurl = "listar_cxptransaccion.php";
			 var opcion = "actualizar_cxptransaccion.php";
			 var jsonurl = "json_cxptransaccion.php";
			 break;	
          case "bcotransaccion":
			 var vurl = "listar_bcotransaccion.php";
			 var opcion = "actualizar_bcotransaccion.php";
			 var jsonurl = "json_bcotransaccion.php";
			 break;			
          case "tramite":
			 var vurl = "listar_tramite.php";
			 var opcion = "actualizar_tramite.php";
			 var jsonurl = "json_tramite.php";
			 break;					 
		}
		
		 ActualizarDatos(opcion,action,vurl,jsonurl);
	 
	}
	
function valida_mantenimiento(acme,action){
		var opciones = acme;
		switch (opciones) { 
		  case "edificios":
			 var vurl = "listar_edificios.php";
			 var opcion = "actualizar_edificios.php";
			 break;
		 case "facturas":
			 var vurl = "listar_facturas.php";
			 var opcion = "actualizar_facturas.php";
			 break;	 
		 case "transaccionesbco":
			 var vurl = "listar_transaccionesbco.php";
			 var opcion = "actualizar_transaccionesbco.php";
			 break;				 
		}
		
		 ActualizarDatosman(opcion,action,vurl);
	 
	}
		
function ActualizarDatosman(opcion,action,vurl){
		var str = "";
	    str = $("#FormToValidate").serialize()+"&action="+action;
		
		$.ajax({
		    cache: false,
			url: opcion,
			data: str,
			type: 'POST',
			success: function(data){
			//$('#pleaseWaitDialog').modal('hide');
			//alert(data);
			toastr.options = {
				  "debug": false,
			  	 "positionClass": "toast-bottom-left",
				  "onclick": null,
				  "fadeIn": 300,
				  "fadeOut": 1000,
				  "timeOut": 1500,
				  "extendedTimeOut": 1500
				};
			toastr.success('', data);
			$("#FormToValidate")[0].reset();
			}
		});
		
	    return false;
	}


function Actualizarcuotar(acme,id_llave){

		var str = $("#FormToValidate").serialize()+"&id_llave="+id_llave;
		switch (acme) { 
		  case "1":
			 var opcion = "actualizar_generarcuotas.php";
			 break;
		  case "2":
			 var opcion = "actualizar_recargos.php";
			 break;	 
		  case "3":
			 var opcion = "actualizar_multas.php";
			 break;	
          case "4":
			 var opcion = "actualizar_cuotaextraordinaria.php";
			 break;				 
		}

		$.ajax({
		    cache: false,
			url: opcion,
			data: str,
			type: 'POST',
			success: function(data){
		
				$('#pleaseWaitDialog').modal('hide');
				
				toastr.options = {
					  "debug": false,
					  "positionClass": "toast-bottom-left",
					  "onclick": null,
					  "fadeIn": 300,
					  "fadeOut": 1000,
					  "timeOut": 1500,
					  "extendedTimeOut": 1500
					};
				toastr.success('', data);
			
			},
			complete:function(){
				/*$('#FormToValidate').each(function(){
					this.reset();   
				});*/
				$("#FormToValidate")[0].reset();
       }
		});
		
	    return false;
	}
	

function RefreshTable(tableId, urlData)
{
  $.getJSON(urlData, null, function( json )
  {
    table = $(tableId).dataTable();
    oSettings = table.fnSettings();
    
    table.fnClearTable(this);

    for (var i=0; i<json.aaData.length; i++)
    {
      table.oApi._fnAddData(oSettings, json.aaData[i]);
    }

    oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
    table.fnDraw();
  });
}

function AutoReload(jsonurl)
{
  RefreshTable('#example', jsonurl);
  setTimeout(function(){AutoReload();}, 30000);
   
}


function valida_usuario(){
        //alert("Juan Plata");
	    var str = $("#FormToValidate").serialize();
		var opcion = "valida_usuarios.php";
        
		$.ajax({
		    cache: false,
			url: opcion,
			data: str,
			type: 'POST',
			success: function(data){
			toastr.options = {
				  "debug": false,
				  "positionClass": "toast-bottom-left",
				  "onclick": null,
				  "fadeIn": 300,
				  "fadeOut": 1000,
				  "timeOut": 1500,
				  "extendedTimeOut": 1500
				};
			toastr.success('', data);
			}
		});
		
	    return false;
	}
	
	
	
	function Actualizarcobros(params){
	    //alert (action);
		//alert (str);
		//alert (params);
		
		for (i=0;i<params.length;i++)
		{
		  alert(params[i]);
		  
		 // document.write(params[i] + "<br>");
		}
		
		return false;
		
		//var str = $("#FormToValidate").serialize()+"&action="+action;

		$.ajax({
		    cache: false,
			url: opcion,
			data: str,
			type: 'POST',
			success: function(data){
			
			AutoReload(jsonurl);
			
			toastr.options = {
				  "debug": false,
				  "positionClass": "toast-bottom-left",
				  "onclick": null,
				  "fadeIn": 300,
				  "fadeOut": 1000,
				  "timeOut": 1500,
				  "extendedTimeOut": 1500
				};
			toastr.success('', data);
		    
		    $('#formulario').modal('hide');
			}
		});
		
	    return false;
	}	
	
	
	function leercampos() {
 
        var montototal = 0;
		var montores = 0;
		montototal = parseFloat($("#monto").val());
		var residuo = 0;
		var idx = 0;
		var montodet = "#montodet";
		var varmonto;
		var resultado;
		var mensaje;
		var myarray = [];
		var listacobros = [];
		var id_comp;
		var id_apartamento;
		var documento;
		var comentario;
		var archivotxt;
		var id_cuentabanco;
		var tipopago;
	    calculateSum();
		       
			  id_comp        = $("#id_compania").val();
			  id_apartamento = $("#id").val(); 
			  documento      = $("#documento").val();
			  comentario     = $("#ta").val();
			  fecha          = $("#fecha").val();
			  tipopago       = $("#tipopago").val();
			  id_cuentabanco = $("#id_cuentabanco").val();
			  archivotxt = js_yyyy_mm_dd_hh_mm_ss() + id_comp + id_apartamento;
			  
			  $("#tabladoc tbody tr").each(function (index) {
                var campo1, campo2, campo3, campo4, campo5, campo6;
				
				
				
                $(this).children("td").each(function (index2) {
                  switch (index2) {
                       case 0:
                          campo1 = $(this).text();
                          break;
                      case 1:
                          campo2 = $(this).text();
                          break;
                      case 2:
                          campo3 = $(this).text();
                          break;
					  case 3:
                          campo4 = $(this).text();
                          break;
                      case 4:
                          campo5 = $(this).text();
                          break;
                      case 5:
						  idx = idx + 1;
						  var n = idx.toString();
						  varmonto = montodet + n
						  campo6 = $(varmonto).val();
                          break;						  
                  }
                })
				
                //resultado = campo1 + "  " + campo2 + "  " + campo3 + "  " + campo4 + "  " + campo6 

				
				 if(parseFloat(campo6) > 0) 
				    {
						if(  parseFloat(campo5) < parseFloat(campo6)) 
						{
						  mensaje = "El saldo de " + campo5 + " no puede ser menor al pago de " +  campo6;
                          bootbox.alert(mensaje);						 
                          return false;
						  
						}else
						  {
                          var item = new detcobros(id_apartamento,id_comp,campo1,documento,comentario,fecha,campo6,"-",campo2,montototal,archivotxt,tipopago,id_cuentabanco);
                          listacobros.push(item);						  
						  }
			        }
            })
			
			
			if( parseFloat($("#saldofavor").html()) > 0) 
			{
			  campo6 = String($("#saldofavor").html());
			  var item = new detcobros(id_apartamento,id_comp,"",documento,comentario,fecha,campo6,"+","",montototal,archivotxt,tipopago,id_cuentabanco);
			  listacobros.push(item);
			  
			}
			
		    if( parseFloat($("#monto").val()) < parseFloat($("#sum").html())) 
			{
	           mensaje = "El monto de la transacción de " + String($("#monto").val()) + " no puede ser menor al total a pagar de " +  String($("#sum").html());
			   bootbox.alert(mensaje);	
               return false;			  
			}
			
			
			var cobrosJSON = JSON.stringify(listacobros);
			Actualizarpagos(cobrosJSON);
			imprimircobros(id_comp,id_apartamento,archivotxt);
			
	    }
	
	
		function calculateSum() {
 
        var sum = 0;
		var montosaldo = 0;
        //iterate through each textboxes and add the values
        $(".txt").each(function() {
            //add only if the value is number
            if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value);
            }
 
        });
        //.toFixed() method will roundoff the final sum to 2 decimal places
        $("#sum").html(sum.toFixed(2));
		montosaldo = parseFloat($("#monto").val()) - parseFloat(sum);
		if(montosaldo < 0) {
                montosaldo = 0;
        }
		$("#saldofavor").html(montosaldo.toFixed(2));
		
    }
	
	
		function leercamposcxp() {
 
        var montototal = 0;
		var montores = 0;
		montototal = parseFloat($("#monto").val());
		var residuo = 0;
		var idx = 0;
		var montodet = "#montodet";
		var varmonto;
		var resultado;
		var mensaje;
		var myarray = [];
		var listapagos = [];
		var id_comp;
		var id_proveedor;
		var documento;
		var id_tipogasto;
		var comentario;
		var archivotxt;
		var id_cuentabanco;
		var tipopago;
		
	    calculateSum();
		       
			  id_comp        = $("#id_compania").val();
			  id_proveedor   = $("#id").val(); 
			  documento      = $("#documento").val();
			  comentario     = $("#ta").val();
			  fecha          = $("#fecha").val();
			  tipopago       = $("#tipopago").val();
			  id_cuentabanco = $("#id_cuentabanco").val();
			  archivotxt = js_yyyy_mm_dd_hh_mm_ss() + id_comp + id_proveedor;
			  
			  $("#tabladoc tbody tr").each(function (index) {
                var campo1, campo2, campo3, campo4, campo5, campo6;
				
				
				
                $(this).children("td").each(function (index2) {
                  switch (index2) {
                       case 0:
                          campo1 = $(this).text();
                          break;
                      case 1:
                          campo2 = $(this).text();
                          break;
                      case 2:
                          campo3 = $(this).text();
                          break;
					  case 3:
                          campo4 = $(this).text();
                          break;
                      case 4:
                          campo5 = $(this).text();
                          break;
                      case 5:
						  idx = idx + 1;
						  var n = idx.toString();
						  varmonto = montodet + n
						  campo6 = $(varmonto).val();
                          break;						  
                  }
                })
				

				
				 if(parseFloat(campo6) > 0) 
				    {
						if(  parseFloat(campo5) < parseFloat(campo6)) 
						{
						  mensaje = "El saldo de " + campo5 + " no puede ser menor al pago de " +  campo6;
                          bootbox.alert(mensaje);						 
                          return false;
						  
						}else
						  {
                          var item = new detcobroscxp(id_proveedor,id_comp,campo1,documento,comentario,fecha,campo6,"-",campo2,montototal,archivotxt,tipopago);
                          listapagos.push(item);						  
						  }
			        }
            })
			
			
			if( parseFloat($("#saldofavor").html()) > 0) 
			{
			  campo6 = String($("#saldofavor").html());
			  var item = new detcobroscxp(id_proveedor,id_comp,"",documento,comentario,fecha,campo6,"+","",montototal,archivotxt,tipopago);
			  listapagos.push(item);
			  
			}
			
		    if( parseFloat($("#monto").val()) < parseFloat($("#sum").html())) 
			{
	           mensaje = "El monto de la transacción de " + String($("#monto").val()) + " no puede ser menor al total a pagar de " +  String($("#sum").html());
			   bootbox.alert(mensaje);	
               return false;			  
			}
			
			
			var pagosJSON = JSON.stringify(listapagos);
			Actualizarpagoscxp(pagosJSON);
			
	    }
	
	
	function llenarcampos() {
 
        var montototal = 0;
		var montores = 0;
		montototal = parseFloat($("#monto").val());
		var residuo = 0;
		var idx = 0;
		var montodet = "#montodet";
		var varmonto;
		
		      $("#tabladoc tbody tr").each(function (index) {
                var campo1, campo2, campo3, campo4, campo5, campo6;
				
                $(this).children("td").each(function (index2) {
                  switch (index2) {
                       case 0:
                          campo1 = $(this).text();
                          break;
                      case 1:
                          campo2 = $(this).text();
                          break;
                      case 2:
                          campo3 = $(this).text();
                          break;
					  case 3:
                          campo4 = $(this).text();
                          break;
                      case 4:
                          campo5 = $(this).text();
                          break;
                      case 5:
						  idx = idx + 1;
						  var n = idx.toString();
						  varmonto = montodet + n
						  $(varmonto).val("");
                          break;						  
                  }
                })

				 if(parseFloat(montototal) > 0) 
				    {
						if(parseFloat(campo5) >= parseFloat(montototal))
						 {
							$(varmonto).val(montototal.toFixed(2));
						    montototal = 0;
						 }
						 else
						  {
							$(varmonto).val(campo5.toString());
							montototal = parseFloat(montototal) - parseFloat(campo5);
						  }
				    }
            })
		
		calculateSum();
    }
	
		function consultaestadocuenta(){
		var str = $("#FormToValidate").serialize();
		$.ajax({
			url: 'listar_estadocuenta.php',
			data: str,
			type: "GET",
			success: function(datos){
				$("#formulario").hide();
				$("#estadocuenta").html(datos);
				$("#estadocuenta").show();
			}
		});
	}
	
	function consultamorosidad(){
		var str = $("#FormToValidate").serialize();
		$.ajax({
			url: 'listar_morosidad.php',
			data: str,
			type: "GET",
			success: function(datos){
				$("#formulario").hide();
				$("#estadocuenta").html(datos);
				$("#estadocuenta").show();
				
			}
		});
	}
	
		function reportedetalladocxc(){
		var str = $("#FormToValidate").serialize();
		$.ajax({
			url: 'listar_reportedetallado.php',
			data: str,
			type: "GET",
			success: function(datos){
				$("#formulario").hide();
				$("#estadocuenta").html(datos);
				$("#estadocuenta").show();
			}
		});
	}
	
	function fn_regresar(){
	    //window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#estadocuenta').html()));
		//window.open('data:application/vnd.ms-excel,' + $('#estadocuenta').html());
		$("#estadocuenta").hide();
		$("#estadocuenta").html("");
		$("#formulario").show();
	}
	
	
	function excel(){
	    window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#impresion').html()));
		//window.open('data:application/vnd.ms-excel,' + $('#estadocuenta').html());
	}
	
	function imprimir(){
                       $('#toPrint').printElement({
                                          overrideElementCSS:['../css/bootstrap.min.css',
		                                { href:'../css/bootstrap-responsive.min.css',media:'print'}]
                        });
	}
	
function js_yyyy_mm_dd_hh_mm_ss () {
    var d = new Date();
    var n = d.getTime();
	return n;
}


function imprimirtrasaccionesdet2(){
 var str = $("#FormToValidate").serialize();
 $.ajax({
		cache: false,
		url: "opcion_transaccionesdetalladas.php", 
		type: "GET",
		data: str,
		success: function(datos){
		var $modal = $('#formularioenvio');
		$modal.html(datos);
		$modal.modal();

		}
	});
	return false;
}


function fn_mostrar_calendario(li_compania,ls_fecha){
	 var str = "id_compania="+li_compania+"&fecha="+ls_fecha;
	 //alert(str);
	 //var str = "fecha="+ls_fecha;
		 $.ajax({
			cache: false,
			url: "editar_calendario.php", 
			type: "GET",
			data: str,
			success: function(datos){
				var $modal = $('#formulariocalendario');
				$modal.html(datos);
				$modal.modal();

			}
		});
		return false;
}

	function agregar_calendario(action){

	    var str = $("#FormToValidate").serialize()+"&action="+action;

		$.ajax({
		    cache: false,
			url: "actualizar_reservaciones.php",
			data: str,
			type: 'POST',
			success: function(data){
		 
	        $('#formulario').modal('hide');
			
			toastr.options = {
				  "debug": false,
				  "positionClass": "toast-bottom-left",
				//  "positionClass": "toast-top-center",
				  "onclick": null,
				  "fadeIn": 300,
				  "fadeOut": 1000,
				  "timeOut": 1500,
				  "extendedTimeOut": 1500
				};
			toastr.success('', data);
		    
			}
		});
		
	    return false;
	}
	
	
	function addLeadingZero(num) {
			if (num < 10) {
			  return "0" + num;
			} else {
			  return "" + num;
			}
     }
	
		function actualiza_calendario(){
		
		$.ajax({
        url : "json_reservaciones.php",
        dataType : "json",
        success : function(data){
		var jsonString = JSON.stringify(data);
		//alert(jsonString);
		//var newObject = JSON.parse(jsonString);	
		var newObject = jQuery.parseJSON(jsonString);	
		$(".responsive-calendar").responsiveCalendar({
			  events: newObject,
			  onDayClick: function(events) {     
			  var thisDayEvent, key;
              key = $(this).data('year')+'-'+addLeadingZero( $(this).data('month') )+'-'+addLeadingZero( $(this).data('day') );
              thisDayEvent = events[key];
			  var ls_fecha = thisDayEvent.fecha.toString() ;
			  var li_compania = thisDayEvent.compania.toString() ;
			  fn_mostrar_calendario(li_compania,ls_fecha);
			  }
		});

		
        }
		
});

		

	}

    // http://www.martiniglesias.eu/blog/combobox-o-selects-dependientes-de-3-niveles-con-php-y-jquery/158
    // http://www.martiniglesias.eu/blog/rellenar-un-select-con-datos-obtenidos-remotamente-en-json-via-jquery/196

    // http://www.jose-aguilar.com/blog/datepicker-jquery-dob/
	//http://williamjxj.wordpress.com/2012/06/28/jquery-birthday-picker-and-others/
	//bootbox  http://carcass.apphb.com/Example/Bootbox
	//  http://jquery-plugins.net/category/html5
	// http://component.io/component/upload
	// http://speckyboy.com/2013/05/01/bootstrap-toolbox/
	// http://bootstraphero.com/the-big-badass-list-of-twitter-bootstrap-resources
	//http://okonski.org/twipsy-bootstrap/docs/javascript.html#modal
	//http://codeseven.github.io/toastr/
	//http://www.johnpapa.net/toastr100beta/
	//http://losmejoresaudiolibrosgratis.blogspot.mx/
	//http://datatables.net/examples/api/row_details.html
	//http://www.taskforce-1.com/blog/2012/11/23/stripe-button-twitter-bootstrap-jquery-validate/
	
	//http://www.anidocs.es/bootstrap/docs/javascript.php
	//http://www.w3schools.com/php/php_ajax_database.asp
	//http://www.martiniglesias.eu/demos/rellenar_select_json/
	
	// http://www.bootsnipp.com/
					//$("#formulario").modal({show:true});
				//$("#formulario").html(datos);
	
	
	// JSON 
	//http://sharp-coders.com/web-development/load-json-data-with-jquery-and-php
	//http://informaticapc.com/curso-de-jquery/json.php
	//http://www.martiniglesias.eu/blog/rellenar-un-select-con-datos-obtenidos-remotamente-en-json-via-jquery/196
	//http://www.martiniglesias.eu/demos/rellenar_select_json/
	//http://remysharp.com/2007/01/20/auto-populating-select-boxes-using-jquery-ajax/
	//http://www.ozzu.com/es/programacion-del-foro/establecer-una-opcion-por-defecto-seleccionado-t98418.html
	
	// http://sharp-coders.com/web-development/load-json-data-with-jquery-and-php
	//http://www.tutorialjquery.com/ejemplo-de-altas-bajas-y-modificaciones-con-php-ajax-y-jquery/
	
	//http://www.pagaelpato.com/publicidad-internet/
	
	//http://xing.github.io/wysihtml5/
	//http://www.jose-aguilar.com/blog/datepicker-jquery-dob/
