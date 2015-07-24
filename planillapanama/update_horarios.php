<?php
header('Content-Type: text/html; charset=UTF-8'); 
require("clases/config.php");
$id                        =  (int)$_POST["id"];
$turno                   =  (int)$_POST["turno"];
$status                 =  $_POST["status"];
$autorizado          =  $_POST["autorizado"];
$entrada1             =  $_POST["entrada1"];
$descanso_inicio =  $_POST["descanso_inicio"];
$descanso_fin     =  $_POST["descanso_fin"];
$salida1              =  $_POST["salida1"];
$implemento      =  $_POST["implemento"];
$entrada2           =  $_POST["entrada2"];
$salida2             =  $_POST["salida2"];
$entrada3          =  $_POST["entrada3"];
$salida3            =  $_POST["salida3"];


//echo $implemento;

$query = "";
$query = "UPDATE pp_horarios SET status                 = '$status', ";
$query .= "autorizado          = '$autorizado', ";
$query .= "turno             = $turno, "; 

if (strlen($entrada1) > 0) {
$query .= "entrada1         = '$entrada1', ";  
}else {
$query .= "entrada1         = null, ";   
} 

if (strlen(trim($descanso_inicio)) > 0) {
$query .= "descanso_inicio         = '$descanso_inicio', ";  
}else {
$query .= "descanso_inicio         = null, ";   
} 

if (strlen(trim($descanso_fin)) > 0) {
$query .= "descanso_fin         = '$descanso_fin', ";  
}else {
$query .= "descanso_fin         = null, ";   
}  	  

if (strlen($salida1) > 0) {
$query .= "salida1         = '$salida1', ";  
}else {
$query .= "salida1         = null, ";   
}

if (strlen($implemento) > 0) {
 $query .= "implemento         = '$implemento', "; 
}else {
$query .= "implemento         = null, ";   
}

if (strlen($entrada2) > 0) {
 $query .= "entrada2              = '$entrada2', "; 
}else {
$query .= "entrada2         = null, ";   
}

if (strlen($salida2) > 0) {
 $query .= "salida2                = '$salida2', "; 
}else {
$query .= "salida2         = null, ";   
}

if (strlen($entrada3) > 0) {
 $query .= "entrada3              = '$entrada3', ";
}else {
$query .= "entrada3         = null, ";   
}

if (strlen($salida3) > 0) {
 $query .= "salida3                = '$salida3' ";
}else {
 $query .= "salida3         = null ";   
}

$query .= " WHERE id = $id ";

$resultado = pg_query($conexion, $query);	

if (!$resultado){  
	 $res1 = pg_get_result($conexion);
	 echo $res1;
	//exit;
}  

pg_free_result($resultado);  
pg_close($conexion);
echo "0"; 
?>
