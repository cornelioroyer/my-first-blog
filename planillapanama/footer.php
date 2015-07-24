		<div class="row-fluid">
                <div class="span12">
	                 <div id="formulario" class="modal hide" tabindex="-1" data-backdrop="static" data-keyboard="false" data-width="920"></div>
                </div>
        </div>		
			</div>
		</div></div>
		
<script language="javascript" type="text/javascript">
	$(document).ready(function(){
		           //$.noConflict();
					/*$('#FormToValidate').submit(function(){
							var TableData;
							TableData = storeTblValues();
							TableData = $.toJSON(TableData);
							
							//alert(TableData);
							 $.ajax({
								 cache: false,  
								type: "POST",
								url: "update_horarios.php",
								data: "pTableData=" + TableData,
								async:false,
								success: function(datos){
									//alert(datos);
									//setTimeout(function() {location.reload();}, 500);	
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
										
									//bootbox.alert(datos, 'Salir');
									alert(datos)
                                   setTimeout(function() {location.reload();}, 500);	
								   
								}
							});
                    });*/
	
            
                /*  $('#turno').change(function(){
					setTimeout(function() {location.reload();}, 500);	
				  });*/
			
			/*$('#example').dataTable( {
					//"bProcessing": true,
					//"bInfo": true,
					"bAutoWidth": true,
					//"aaSorting": [[ 0, "asc" ]],
					//"sPaginationType": "full_numbers",
					"oLanguage": {"sUrl": "espanol.txt"},
					//"sDom":'T<"clear">lfrtip',
					"bScrollInfinite": true,
                    "bScrollCollapse": true,
			        "sScrollY": "400"
			        //"bSortCellsTop": true
			} );*/
			
			
					$('#example1').dataTable( {
					"bProcessing": true,
					"bInfo": true,
					"bAutoWidth": true,
					"aaSorting": [[ 0, "desc" ]],
					//"sPaginationType": "full_numbers",
					"oLanguage": {"sUrl": "espanol.txt"},
					//"sDom":'T<"clear">lfrtip',
					"bScrollInfinite": true,
                    "bScrollCollapse": true,
			        "sScrollY": "400",
			        "bSortCellsTop": true
			} );	

		/*	$("#fechabtnfin").datepicker({ language: "es", autoclose: true}); 
			
			$('#FormToValidate2').submit(function(){
			
			var id_empleados = $("#id_empleado").val();
			var turno = $("#id_empleado").val();
			
			if (id_empleados.length == 0) {
               //bootbox.alert("Debe registrar el empleado…")
			   alert("Debe registrar el empleado…");
            } else {
               if (turno.length == 0) {
			     // bootbox.alert("Debe registrar el turno…")
				  alert("Debe registrar el turno…");
 			   } else {
                  $(".modal").modal("hide");
               } 				
            }
			
		});*/
					
	});
	
</script>	
	</body>


	</html>
