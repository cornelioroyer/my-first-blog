<?php
    require("clases/config.php");
    //$all                       = implode(",", $_POST["ids"]);
	$usuario                       = (int)$_POST["id"];
	
    //$where = "id in($all)";
	
	$query2  = "DELETE FROM pp_usuario_proyecto WHERE pp_usuario_id = $usuario";
	$resultado2 = pg_query($conexion, $query2) or die("Error en la Consulta SQL");
	pg_free_result($resultado2); 
	
	if (empty($_POST["ids"])) 
	{
    	//echo 'El array SÍ está vacío';
	}
	else{	
	$proyectos                   = $_POST["ids"];
	foreach($proyectos as $proyectos){
		$id_proyectos = (int)$proyectos;
		$query = "INSERT INTO  pp_usuario_proyecto ( pp_usuario_id,pla_proyectos_id) VALUES($usuario,$id_proyectos) ";
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
