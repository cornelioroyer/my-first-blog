<?php
require("clases/config.php");
require("clases/sesion.php");
$sesion    = new sesion();
$id_usuario = (int)$sesion->get("id_usuario");
unset($sesion);
$action = $_POST['action'];
if($action == "nuevo"){
	$nombre          = $_POST['nombre'];
	$usuario          = $_POST['usuario'];
	$email             = $_POST['email'];
	$contrasena    = $_POST['contrasena'];
    $estado           = $_POST['estado'];
    $tipo_usuario  = $_POST['tipo_usuario'];
	$pp_usuario_id =  $id_usuario;
	$query = "INSERT INTO  pp_usuario ( usuario,nombre,email,password,estado,tipo_usuario,pp_usuario_id) VALUES('$usuario','$nombre','$email' ,'$contrasena','$estado','$tipo_usuario',$id_usuario) ";
	$resultado = pg_query($conexion, $query);	
	if (!$resultado){  
		   pg_close($conexion);
		   echo "Error al grabar los registros!!";  
		}  
		else  
		{  
           pg_free_result($resultado);  
		   pg_close($conexion);
		   echo "Registos Actualizados";
	}	
	
}
else if($action == "editar"){	
    $id                    = (int)$_POST['id'];
	$nombre          = $_POST['nombre'];
	$email             = $_POST['email'];
	$contrasena    = $_POST['contrasena'];
    $estado           = $_POST['estado'];
	$tipo_usuario  = $_POST['tipo_usuario'];	
	$query = "";
	$query = "UPDATE pp_usuario SET estado      = '$estado', ";
	$query .= "nombre          = '$nombre', ";
	$query .= "email             = '$email', "; 
	$query .= "password = '$contrasena', "; 
	$query .= "tipo_usuario = '$tipo_usuario' "; 
	$query .= " WHERE id = $id ";

	$resultado = pg_query($conexion, $query);	
	if (!$resultado){  
		   pg_close($conexion);
		   echo "Error al grabar los registros!!";  
		}  
		else  
		{  
           pg_free_result($resultado);  
		   pg_close($conexion);
		   echo "Registos Actualizados";
	}	
	
	
}

?>
