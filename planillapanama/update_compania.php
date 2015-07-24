<?php
    require("clases/config.php");
   
	$usuario                       = (int)$_POST["id"];
	
	//$all                       = implode(",", $_POST["ids"]);
   // $condicion = "id in($all)";
	//echo "0";
	$query2  = "DELETE FROM pp_usuario_compania WHERE pp_usuario_id = $usuario";
	$resultado2 = pg_query($conexion, $query2) or die("Error en la Consulta SQL");
	pg_free_result($resultado2); 
	
	if (empty($_POST["ids"])) 
	{
    	//echo 'El array SÍ está vacío';
	}
	else{
		    $compania                   = $_POST["ids"]; 
			foreach($compania as $compania){
				$id_compania = (int)$compania;
				$query = "INSERT INTO  pp_usuario_compania ( pp_usuario_id,compania) VALUES($usuario,$id_compania) ";
				$resultado = pg_query($conexion, $query);	
				if (!$resultado){  
				   pg_close($conexion);
				   echo "Error al grabar los registros!!";  
				}  
			}
			pg_free_result($resultado);  
	}
    pg_close($conexion);	  
	echo "Registos Actualizados";
?>
