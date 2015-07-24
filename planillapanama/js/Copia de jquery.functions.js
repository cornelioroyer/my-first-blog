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
	
	//http://informaticapc.com/curso-de-jquery/json.php
	//http://www.martiniglesias.eu/blog/rellenar-un-select-con-datos-obtenidos-remotamente-en-json-via-jquery/196
	//http://www.martiniglesias.eu/demos/rellenar_select_json/
	//http://remysharp.com/2007/01/20/auto-populating-select-boxes-using-jquery-ajax/
	//http://www.ozzu.com/es/programacion-del-foro/establecer-una-opcion-por-defecto-seleccionado-t98418.html
	
	// http://sharp-coders.com/web-development/load-json-data-with-jquery-and-php
	//http://www.tutorialjquery.com/ejemplo-de-altas-bajas-y-modificaciones-con-php-ajax-y-jquery/
	
	
	function ActualizarDatos(opcion,action,vurl,jsonurl){
	    //alert (action);
		
	    str = $("#FormToValidate").serialize()+"&action="+action;
		
		$.ajax({
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
				  "timeOut": 1000,
				  "extendedTimeOut": 1000
				};
			toastr.success('', data);
		    AutoReload(jsonurl);
		    $('#formulario').modal('hide');
			//$("form").validate().resetForm();
			//$("form")[0].reset();
			//jQuery('#forma').clearForm(); 

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
		  case "vehiculos":
			 var vurl = "listar_vehiculos.php";
			 var opcion = "actualizar_vehiculos.php";
			 var jsonurl = "json_vehiculos.php";
             break;		 
		}
		
		
		var action = "eliminar";
	    bootbox.confirm("Desea eliminar el registro ?", "Cancelar", "Eliminar",function(result) {
        if (result) {
		      $.ajax({
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
				  "timeOut": 1000,
				  "extendedTimeOut": 1000
				};
			        toastr.success('', data);
					
				}
			   });
		
           } else {

           }
         });
	
		return false;
	}
	
	
	

	function Cancelar(){

		$('#formulario').modal('hide');
		//$("form").validate().resetForm();

		return false;

	}
	
	

function fn_mostrar_frm_agregar(acme){

        
		
		var opciones = acme;
		switch (opciones) { 
		  case 'bancos':
			 var vurl = "nuevo_bancos.php";
			 break;
		  case 'torres':
			var vurl = "nuevo_torres.php";
			break;
		  case 'apartamentos':
			var vurl = "nuevo_apartamentos.php";
			break;	
		  case 'vehiculos':
			var vurl = "nuevo_vehiculos5.php";
			break;	

		}	
		
		
		
		 $.ajax({
        cache: false,
        type: 'GET',
        url: vurl,
        success: function(data) {
		
            $('#formulario2').modal({show:true});
			$("#formulario2").html(data);
			
			/*$('.modal-body').load(vurl,function(result){
	        $('#formulario').modal({show:true});
	        }); */
			
			
			
        }
    });
		
		

		return false;
		
}


function fn_mostrar_frm_agregar22222222(acme){

        
		
		var opciones = acme;
		switch (opciones) { 
		  case 'bancos':
			 var vurl = "nuevo_bancos.php";
			 break;
		  case 'torres':
			var vurl = "nuevo_torres.php";
			break;
		  case 'apartamentos':
			var vurl = "nuevo_apartamentos.php";
			break;	
		  case 'vehiculos':
			var vurl = "form_vehiculos.php";

			break;	

		}	;
	
		$('.modal-body').load(vurl,function(result){
		   $("form").validate().resetForm();
		   $("form")[0].reset();
		   fn_cargar_ayuda(acme);
	       $('#formulario').modal({show:true});
	    }); 

		return false;
		
}



function fn_mostrar_frm_modificar(acme,id){

		var opciones = acme;
		switch (opciones) { 
		  case "bancos":
			 var vurl = "editar_bancos.php";
			 break;
		  case "torres":
			var vurl = "editar_torres.php";
			break;
		  case "apartamentos":
			var vurl = "editar_apartamentos.php";
			break;	
		  case "vehiculos":
		    var vurl = "form_vehiculos.php";
	  	   break;	

		}
		
		$('.modal-body').load(vurl,function(result){
		   //$("form").validate().resetForm();
		   //$("form")[0].reset();
		   fn_cargar_ayuda(acme);
		   fn_cargar_datos(acme,id);
	       $('#formulario').modal({show:true});
	    }); 
		
		return false;


}

function fn_mostrar_frm_modificar222(acme,id){
        
		var opciones = acme;
       // alert (acme);
		switch (opciones) { 
		  case "bancos":
			 var vurl = "editar_bancos.php";
			 break;
		  case "torres":
			var vurl = "editar_torres.php";
			break;
		  case "apartamentos":
			var vurl = "editar_apartamentos.php";
			break;	
		  case "vehiculos":
			var vurl = "editar_vehiculos.php";
			break;	

		}
		//$(window).scrollTop(0);
		$.ajax({
		    url: vurl, 
			type: "GET",
			data: "id="+id,
			success: function(datos){
				$("#formulario").modal({show:true});
				$("#formulario").html(datos);
				
			}
		});
		return false;


}


function valida_man(acme,action){
		var opciones = acme;
		switch (opciones) { 
		  case "bancos":
			 var vurl = "listar_bancos.php";
			 var opcion = "actualizar_bancos.php";
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
		  case "vehiculos":
			 var vurl = "listar_vehiculos.php";
			 var opcion = "actualizar_vehiculos.php";
			 var jsonurl = "json_vehiculos.php";
             break;	 			 
		}
		
		 ActualizarDatos(opcion,action,vurl,jsonurl);
	 
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


function fn_cargar_ayuda(acme){

		var opciones = acme;
		switch (opciones) { 
		  case 'bancos':
			 var vurl = "nuevo_bancos.php";
			 break;
		  case 'torres':
			var vurl = "nuevo_torres.php";
			break;
		  case 'apartamentos':
			var vurl = "nuevo_apartamentos.php";
			break;	
		  case 'vehiculos':
		    var vurl_apartamentos = "json_apartamentos.php";
			jQuery.support.cors = true;
			$.getJSON(vurl_apartamentos,function(data){
				var select = $('#id_apartamento');
			
				if (select.prop) {
					var options = select.prop('options');
				}
				else {
					var options = select.attr('options');
				}
				$('option', select).remove();
				$.each(data, function(key, value){
					options[options.length] = new Option(value['nombre'], value['id']);
				});
				
            });
			break;	

		}	;

	
		
}


function fn_cargar_datos(acme,id){
        //alert(id);
		var opciones = acme;
		switch (opciones) { 
		  case "bancos":
			 var vurl = "editar_bancos.php";
			 break;
		  case "torres":
			var vurl = "editar_torres.php";
			break;
		  case "apartamentos":
			var vurl = "editar_apartamentos.php";
			break;	
		  case "vehiculos":
			var vurl = "json_edit_vehiculos.php";
			jQuery.support.cors = true;
			$.getJSON(vurl, {id: id}, function(data){
			var id_apartamento = data['id_apartamento'];
			var id_anio = data['anio'];
		    $("#id").attr("value", data['id'] );
			$("#id_apartamento option[value='" + id_apartamento + "']").get(0).selected = true;
			$("#marca").attr("value", data['marca'] );
			$("#modelo").attr("value", data['modelo'] );
			$("#anio option[value='" + id_anio + "']").get(0).selected = true;
			$("#placa").attr("value", data['placa'] );
            });
	  	   break;	

		};

}