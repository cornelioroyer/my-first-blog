/*function storeTblValues(nRow)
	{
		 
		//row
		var TableData = new Array();

		$('#example tr').each(function(nRow, tr){
			TableData[nRow]={
				"id" : $(tr).find('td:eq(0)').text(),
				"turno" : $(tr).find('td:eq(3) select').val(),
				"status" : $(tr).find('td:eq(5) select').val(),
				"autorizado" : $(tr).find('td:eq(6) select').val(),
				"entrada1" : $(tr).find('td:eq(7) input').val(),
				"descanso_inicio" : $(tr).find('td:eq(8) input').val(),
				"descanso_fin" : $(tr).find('td:eq(9) input').val(),
				"salida1" : $(tr).find('td:eq(10) input').val(),
				"implemento" : $(tr).find('td:eq(11) select').val(),
				"entrada2" : $(tr).find('td:eq(12) input').val(),
				"salida2" : $(tr).find('td:eq(13) input').val(),
				"entrada3" : $(tr).find('td:eq(14) input').val(),
				"salida3" : $(tr).find('td:eq(15) input').val()
			}    
		}); 
		TableData.shift();  // first row will be empty - so remove
		return TableData;

}*/

function fn_mostrar_frm_agregar(acme){
	
		var opciones = acme;
		switch (opciones) { 
		  case 'horarios':
			 var vurl = "nuevo_horarios.php";
			 break;
		  case 'usuarios':
			 var vurl = "nuevo_usuarios.php";
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


function fn_mostrar_frm_agregar2(acme){
	       $("#FormToValidate2")[0].reset();
	  		var $modal = $('#formulario2');
			//$modal.html("");
		    //$modal.html(datos);
            $modal.modal();

	return false;
		
}




function fn_mostrar_frm_modificar(acme,id){
        
		var opciones = acme;
		switch (opciones) { 
		  case "usuarios":
			 var vurl = "editar_usuarios.php";
			 break;
		 case "companias":
			 var vurl = "editar_companias.php";
			 break;	
		case "proyectos":
			 var vurl = "editar_proyectos.php";
			 break;	 	 
		}

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

function fn_guadarhorarios(){
        
	var str = $("#FormToValidate2").serialize();
	 $.ajax({
		 cache: false,  
		type: "POST",
		url: "insert_horarios.php",
		data: str,
		async:false,
		success: function(datos){
		/*	toastr.options = {
			  "debug": false,
			  "positionClass": "toast-top-center",
			  "onclick": null,
			  "fadeIn": 300,
			  "fadeOut": 1000,
			  "timeOut": 3000,
			  "extendedTimeOut": 3000
			};
				toastr.success('', datos);*/
			 
			// $('#formulario').modal('hide');	
				 if (datos == '0') 
				{
					bootbox.alert('Registro actualizado');
					setTimeout(function() {location.reload();}, 500);	
				}else 
				{
                   alert(datos);
				   //bootbox.alert(datos);
				}		
		}
	});


}


