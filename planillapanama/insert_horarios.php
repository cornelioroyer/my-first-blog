<?php
header('Content-Type: text/html; charset=UTF-8'); 
require("clases/config.php");
require("clases/sesion.php");
$sesion    = new sesion();
$id_usuario = (int)$sesion->get("id_usuario");
unset($sesion);


$compania      = (int)$_POST['compania'];
$id_empleado = trim($_POST['id_empleado']);
$turno            = (int)$_POST['turno'];
$fecha           = $_POST['fecha'];
$status          = $_POST['status'];
$autorizado   = $_POST['autorizado'];
$implemento = $_POST['implemento'];

$entrada1            = $_POST['entrada1'];
$descanso_inicio = $_POST['descanso_inicio'];
$descanso_fin     = $_POST['descanso_fin'];
$salida1              = $_POST['salida1'];
$entrada2           = $_POST['entrada2'];
$salida2             = $_POST['salida2'];
$entrada3          = $_POST['entrada3'];
$salida3            = $_POST['salida3'];

if (strlen($entrada1) > 0) {
	if (strlen($entrada1) == 7) {
	  $entrada1 =  "'" .  '0' . $entrada1 . "'";
	}else {
		   $entrada1 =  "'" .  $entrada1 . "'";
	}
	$union1 = "entrada1,";
	$union2 = "$entrada1,";
}

if (strlen($descanso_inicio) > 0) {
	if (strlen($descanso_inicio) == 7) {
	  $descanso_inicio = "'" .  '0' . $descanso_inicio . "'";
	}else {
		  $descanso_inicio = "'" .  $descanso_inicio . "'";
	}
	$union1 .= "descanso_inicio,";
	$union2 .= "$descanso_inicio,";	
}

if (strlen($descanso_fin) > 0) {
	if (strlen($descanso_fin) == 7) {
	  $descanso_fin = "'" .  '0' . $descanso_fin . "'";
	}else {
		  $descanso_fin = "'" . $descanso_fin . "'";
	}
	$union1 .= "descanso_fin,";
	$union2 .= "$descanso_fin,";	
}

if (strlen($salida1) > 0) {
	if (strlen($salida1) == 7) {
	  $salida1 = "'" .  '0' . $salida1 . "'";
	}else {
		   $salida1 = "'" . $salida1 . "'";
	}
	$union1 .= "salida1,";
	$union2 .= "$salida1,";	
}

if (strlen($entrada2) > 0) {
	if (strlen($entrada2) == 7) {
	  $entrada2 = "'" .  '0' . $entrada2 . "'";
	}else {
		 $entrada2 = "'" .  $entrada2 . "'";
	}
	$union1 .= "entrada2,";
	$union2 .= "$entrada2,";		
}

if (strlen($salida2) > 0) {
	if (strlen($salida2) == 7) {
	  $salida2 = "'" .  '0' . $salida2 . "'";
	}else {
		  $salida2 = "'" .  $salida2 . "'";
	}
	$union1 .= "salida2,";
	$union2 .= "$salida2,";	
}

if (strlen($entrada3) > 0) {
	if (strlen($entrada3) == 7) {
	  $entrada3 = "'" .  '0' . $entrada3 . "'";
	}else {
		  $entrada3 = "'" . $entrada3 . "'";
	}
	$union1 .= "entrada3,";
	$union2 .= "$entrada3,";	
}

if (strlen($salida3) > 0) {
	if (strlen($salida3) == 7) {
	  $salida3 = "'" .  '0' . $salida3 . "'";
	}else {
		 $salida3 = "'" . $salida3 . "'";
	}
	$union1 .= "salida3,";
	$union2 .= "$salida3,";	
}

if (strlen($implemento) > 0) {
	$union1 .= "implemento,";
	$union2 .= "$implemento,";	
}


$query4  = "select f_pla_periodo_actual($compania,'2')";
$resultado4 = pg_query($conexion, $query4) or die("Error en la Consulta SQL");
$numReg4 = pg_num_rows($resultado4);
if($numReg4>0){
	while ($fila4=pg_fetch_array($resultado4)) {		
	$id_periodo  = (int)$fila4['f_pla_periodo_actual'];
} } 
pg_free_result($resultado4); 


$query5  = "select id_pla_proyectos from pla_empleados where compania  = $compania and codigo_empleado = '$id_empleado' ";
$resultado5 = pg_query($conexion, $query5) or die("Error en la Consulta SQL");
$numReg5 = pg_num_rows($resultado5);
if($numReg5>0){
	while ($fila5=pg_fetch_array($resultado5)) {		
	$id_pla_proyectos  = (int)$fila5['id_pla_proyectos'];
} } 
pg_free_result($resultado5); 


$query6  = "select numero_planilla from pla_periodos where id = $id_periodo ";
$resultado6 = pg_query($conexion, $query6) or die("Error en la Consulta SQL");
$numReg6 = pg_num_rows($resultado6);
if($numReg6>0){
	while ($fila6=pg_fetch_array($resultado6)) {		
	$numero_planilla  = (int)$fila6['numero_planilla'];
} } 
pg_free_result($resultado6); 

//$query  = "INSERT INTO pp_horarios(compania,codigo_empleado,turno,numero_planilla,fecha,status,autorizado,implemento,pla_proyectos_id,pla_periodos_id,pp_usuario_id,entrada1,descanso_inicio,descanso_fin,salida1,entrada2,salida2,entrada3,salida3)";
//$query  .= "VALUES($compania,'$id_empleado',$turno,$numero_planilla,'$fecha','$status','$autorizado','$implemento',$id_pla_proyectos,$id_periodo,$id_usuario,$entrada1,$descanso_inicio,$descanso_fin,$salida1,$entrada2,$salida2,$entrada3,$salida3)";
$querya  = "INSERT INTO pp_horarios(compania,codigo_empleado,turno,numero_planilla,fecha,status,autorizado,pla_proyectos_id,pla_periodos_id,pp_usuario_id," . $union1;
$querya = substr( $querya  , 0 , -1);
$querya = $querya . ")";
$queryb = "VALUES($compania,'$id_empleado',$turno,$numero_planilla,'$fecha','$status','$autorizado',$id_pla_proyectos,$id_periodo,$id_usuario," . $union2;
$queryb = substr( $queryb  , 0 , -1);
$queryb = $queryb . ")";
$query =  $querya . ' ' . $queryb;
//$query .= " entrada1,descanso_inicio,descanso_fin,salida1,entrada2,salida2,entrada3,salida3)";

//$query = "$entrada1,$descanso_inicio,$descanso_fin,$salida1,$entrada2,$salida2,$entrada3,$salida3)";

//echo $query;
$resultado = pg_query($conexion, $query);	
if (!$resultado){  
	 $res1 = pg_get_result($conexion);
	 echo $res1;
}  
else  
{  
	pg_free_result($resultado);  
	pg_close($conexion);
	echo "0"; 
}  



//echo  $entrada1 . ' --  ' . $descanso_inicio . ' --  ' . $descanso_fin . ' --  ' . $salida1 . ' --  ' . $entrada2 . ' --  ' . $salida2 . ' --  ' . $entrada3 . ' --  ' . $salida3;
?>
