<?php
    require("clases/sesion.php");
	$sesion = new sesion();
	$usuario = $sesion->get("nombre_usuario");	
	if( $usuario == false )
	{	
		 header("Location: index.php");	
	}
	else 
	{
		$usuario = $sesion->get("nombre_usuario");	
		$sesion->termina_sesion();	
		 header("Location: index.php");	
	}
?>