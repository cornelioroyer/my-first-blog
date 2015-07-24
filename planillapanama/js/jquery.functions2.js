function detcalculadora(seccion,tramite,montocal, tarifacal,tarifains)		
{
    this.seccion   = seccion;
    this.tramite   = tramite;
	this.montocal  = montocal;
    this.tarifacal = tarifacal;
	this.tarifains = tarifains;
}

function leercampos() {
 
	var montototal = 0;
	var montores = 0;
	var residuo = 0;
	var idx = 0;
	var varmonto;
	var resultado;
	var mensaje;
	var myarray = [];
	var listacobros = [];

		   
	  
		  
		 $("#myTableData tbody tr").each(function (index) {
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
			  }
			})
			
            var item = new detcalculadora(campo1,campo2,campo3,campo4,campo5);
			listacobros.push(item);

		})
		
		var cobrosJSON = JSON.stringify(listacobros);
		Actualizarpagos(cobrosJSON);

}


	function Actualizarpagos(cobrosJSON){
        
        $.ajax({
			type: "POST",
			url: "../template2.php",
			data: {detcobros : cobrosJSON}, 
			cache: false,
			success: function(data){
				//var url = '../pdfCreator.php?id=' + data;
                //window.open(url , '_blank');
				//url = document.URL;
				//url = url.replace("#", "");
			  
			}
		});

 

        	
		

    
		return false;

	}
	
