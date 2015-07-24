
<div class="box box-color box-bordered">
	<div class="box-title">
		<h3><i class="icon-table"></i>Horarios</h3>
		<div class="actions">
			<a href="#" onClick="fn_mostrar_frm_agregar('horarios'); return false" class='btn'><i class="icon-plus-sign"></i> Agregar</a>
		</div>
	</div>
							   
	<div class="box-content nopadding">
       <table class="table-nomargin table-hover table-bordered table-striped table-condensed cf" id="example">
			<thead>
				<tr>
					<th WIDTH=4%>id</th>
					<th class='hidden-350'>Proyecto</th>
					<th class='hidden-350'>Nombre</th>
					<th WIDTH=4%>Emp</th>
					<th WIDTH=4%>Turno</th>
					<th WIDTH=6%>Fecha</th>
					<th WIDTH=3%>Sts</th>
					<th WIDTH=3%>Auto</th>
					<th WIDTH=4%>Entrada1</th>
					<th WIDTH=4%>D Inicial</th>
					<th WIDTH=4%>D Final</th>
					<th WIDTH=4%>Salida1</th>
					<th WIDTH=4%>Implem</th>
					<th WIDTH=4%>Ent 2</th>
					<th WIDTH=4%>Sal 2</th>
					<th WIDTH=4%>Ent 3</th>
					<th WIDTH=4%>sal 3</th>
					<th WIDTH=3%>Opción</th>
				</tr>

			</thead>
			<tbody>

			</tbody>
		</table>

    </div>						
</div>
<script language="javascript" type="text/javascript">
	$(document).ready(function(){
			var oTable =$('#example').dataTable( {
						 "bProcessing": true,
						 "bInfo": true,
						 "bDeferRender": true,
						"bAutoWidth": true,
						"aoColumnDefs": [
													{"className": "hidden-350", "aTargets": [ 1 ]},
													{"className": "hidden-350", "aTargets": [ 2 ]},
													{"bSortable": false, "aTargets": [ 17 ],"searchable": false } ],
						"sPaginationType": "full_numbers",
						"oLanguage": {"sUrl": "espanol.txt"},
						"sDom":'T<"clear">lfrtip',
						"oTableTools": {
						"sSwfPath":"js/plugins/datatable/swf/copy_csv_xls_pdf.swf",
						"aButtons": [
												{'sExtends':'xls',
													"mColumns":[0, 1, 2, 3,4,5,6,7,8,9,10,11,12,13,14,15,16]
												},
											]
					   },
						"sAjaxSource": "json_horarios.php"
				});
				
				$("#example").css("width", '100%');
				
				$('#example').on('click','.ajaxupdate',function(){
					   var nRow = $(this).parents('tr')[0];
					   var aData = oTable.fnGetData(nRow);
					   var id = aData[0];
					   
					var str = oTable.$('input, select').serialize()+"&id="+aData[0];
					$.ajax({
						cache: false,
						url: "update_horarios.php",
						data: str,
						type: 'POST',
						success: function(data){
					 
						  if (data == '0') 
							{
								refrescar(oTable, nRow);
							}else 
							{
								alert(data);					
							}

						}
					});
			});	
				
				
			var nEditing = null;
			
			$('#example a.edit').live('click', function (e) {
				e.preventDefault();
				var nRow = $(this).parents('tr')[0];

				if (nEditing !== null && nEditing != nRow) {
					restoreRow(oTable, nEditing);
					editRow(oTable, nRow);
					nEditing = nRow;
				} else if (nEditing == nRow && this.innerHTML == "Save") {
					saveRow(oTable, nEditing);
					nEditing = null;
				} else {
					editRow(oTable, nRow);
					nEditing = nRow;
				}
			});	
			
			$('#example a.cancel').live('click', function (e) {
					e.preventDefault();
					if ($(this).attr("data-mode") == "new") {
						var nRow =$(this).parents('tr')[0];
						oTable.fnDeleteRow(nRow);
					} else {
						restoreRow(oTable, nEditing);
						nEditing = null;
					}
			});	
				
	});
	

       function restoreRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds =$('>td', nRow);

            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                oTable.fnUpdate(aData[i], nRow, i, false);
            }

            oTable.fnDraw();
        }

        function editRow(oTable, nRow) {
		    var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);

			$.post( 
                  "ajax_turno.php",
                  { turno: aData[4] },
                  function(data) {
					 jqTds[4].innerHTML = data; 
                  }
               );	
			   
			$.post( 
                  "ajax_status.php",
                  { status: aData[6] },
                  function(data) {
					 jqTds[6].innerHTML = data; 
                  }
               );			
       
			$.post( 
                  "ajax_autorizado.php",
                  { autorizado: aData[7] },
                  function(data) {
					 jqTds[7].innerHTML = data; 
                  }
               );

            jqTds[8].innerHTML = '<div class="input-append bootstrap-timepicker"><input type="text" name="entrada1" id="timepicker7" name="" class="form-control input-mini2"  value="' + aData[8] + '"></div>';
		    jqTds[9].innerHTML = '<div class="input-append bootstrap-timepicker"><input type="text" name="descanso_inicio" id="timepicker8" name="" class="form-control input-mini2" value="' + aData[9] + '"></div>';

			
			jqTds[10].innerHTML = '<div class="input-append bootstrap-timepicker"><input type="text" name="descanso_fin" id="timepicker9" name="" class="form-control input-mini2" value="' + aData[10] + '"></div>';
			jqTds[11].innerHTML = '<div class="input-append bootstrap-timepicker"><input type="text" name="salida1" id="timepicker10" name="" class="form-control input-mini2" value="' + aData[11] + '"></div>';
     
			$.post( 
                  "ajax_implementos.php",
                  { implemento: aData[12] },
                  function(data) {
					 jqTds[12].innerHTML = data; 
                  }
            );
			jqTds[13].innerHTML = '<div class="input-append bootstrap-timepicker"><input type="text" name="entrada2" id="timepicker12" class="form-control input-mini2" value="' + aData[13] + '"></div>';
			jqTds[14].innerHTML = '<div class="input-append bootstrap-timepicker"><input type="text" name="salida2" id="timepicker13" class="form-control input-mini2" value="' + aData[14] + '"></div>';
			jqTds[15].innerHTML = '<div class="input-append bootstrap-timepicker"><input type="text" name="entrada3" id="timepicker14" class="form-control input-mini2" value="' + aData[15] + '"></div>';
			jqTds[16].innerHTML = '<div class="input-append bootstrap-timepicker"><input type="text" name="salida3" id="timepicker15" class="form-control input-mini2" value="' + aData[16] + '"></div>';
         	jqTds[17].innerHTML = '<input type="button" class="ajaxupdate btn btn-success btn-mini" value="Grabar">';
           
		   $('#timepicker7').timepicker({
           minuteStep: 1,
                template: 'modal',
                appendWidgetTo: 'body',
                showSeconds: false,
                showMeridian: false,
                defaultTime: false
            });   
		   $('#timepicker8').timepicker({
           minuteStep: 1,
                template: 'modal',
                appendWidgetTo: 'body',
                showSeconds: false,
                showMeridian: false,
                defaultTime: false
            }); 
		   $('#timepicker9').timepicker({
           minuteStep: 1,
                template: 'modal',
                appendWidgetTo: 'body',
                showSeconds: false,
                showMeridian: false,
                defaultTime: false
            }); 
		   $('#timepicker10').timepicker({
           minuteStep: 1,
                template: 'modal',
                appendWidgetTo: 'body',
                showSeconds: false,
                showMeridian: false,
                defaultTime: false
            }); 			
		   $('#timepicker12').timepicker({
           minuteStep: 1,
                template: 'modal',
                appendWidgetTo: 'body',
                showSeconds: false,
                showMeridian: false,
                defaultTime: false
            });
		   $('#timepicker13').timepicker({
           minuteStep: 1,
                template: 'modal',
                appendWidgetTo: 'body',
                showSeconds: false,
                showMeridian: false,
                defaultTime: false
            }); 
		   $('#timepicker14').timepicker({
           minuteStep: 1,
                template: 'modal',
                appendWidgetTo: 'body',
                showSeconds: false,
                showMeridian: false,
                defaultTime: false
            }); 
		   $('#timepicker15').timepicker({
           minuteStep: 1,
                template: 'modal',
                appendWidgetTo: 'body',
                showSeconds: false,
                showMeridian: false,
                defaultTime: false
            }); 			
			
	   }


		function refrescar(oTable, nRow)
		{

						   var aData = oTable.fnGetData(nRow);
						   var id = aData[0];

							   $.ajax({
								type: "POST",
								dataType: "json",
								url: "ajax_horarios.php", 
								data: "id="+id,
								success : function(data) {
						 
													  $.each(data, function(i, item) {
														   aData[4] = item.turno;
														   aData[6] = item.status;
														   aData[7] = item.autorizado;
														   aData[8] = item.entrada1;
														   aData[9] = item.descanso_inicio;
														   aData[10] = item.descanso_fin;
														   aData[11] = item.salida1;
														   aData[12] = item.implemento;
														   aData[13] = item.entrada2;
														   aData[14] = item.salida2;
														   aData[15] = item.entrada3;
														   aData[16] = item.salida3;
														   oTable.fnUpdate(aData[4], nRow,4, false);
														   oTable.fnUpdate(aData[6], nRow,6, false);
														   oTable.fnUpdate(aData[7], nRow,7, false);
														   oTable.fnUpdate(aData[8], nRow,8, false);
														   oTable.fnUpdate(aData[9], nRow,9, false);
														   oTable.fnUpdate(aData[10], nRow,10, false);
														   oTable.fnUpdate(aData[11], nRow,11, false);
														   oTable.fnUpdate(aData[12], nRow,12, false);
														   oTable.fnUpdate(aData[13], nRow,13, false);
														   oTable.fnUpdate(aData[14], nRow,14, false);
														   oTable.fnUpdate(aData[15], nRow,15, false);
														   oTable.fnUpdate(aData[16], nRow,16, false);
														   oTable.fnUpdate('<a href=""  class="btn btn-primary btn-mini edit" >Editar</a>', nRow, 17, false);
														   oTable.fnDraw();
													   });
						 
									}
							});	
		   
		}
</script>
