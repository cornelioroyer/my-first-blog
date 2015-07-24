<?php
require("clases/config.php");
require("clases/sesion.php");
$sesion    = new sesion();
$id_usuario = (int)$sesion->get("id_usuario");
unset($sesion);

$turno =  (int)$_REQUEST['turno'];

$query3  = "select compania from pp_usuario_compania where pp_usuario_id = $id_usuario";
$resultado3 = pg_query($conexion, $query3) or die("Error en la Consulta SQL");
$numReg3 = pg_num_rows($resultado3);
if($numReg3>0){
	while ($fila3=pg_fetch_array($resultado3)) {		
	$id_compania  = $fila3['compania'];
} } 
pg_free_result($resultado3); 

$datos =  '<select id="turno" name="turno" class="input-mini">';
$query7  = "select turno,hora_inicio,hora_salida from pla_turnos where compania = $id_compania order by hora_inicio";
$resultado7 = pg_query($conexion, $query7) or die("Error en la Consulta SQL");
$numReg7 = pg_num_rows($resultado7);
if($numReg7>0){
	while ($fila7=pg_fetch_array($resultado7)) {		
	$id_turno  = (int)$fila7['turno'];
    $nombreturno   =  (string)$fila7['hora_inicio'] . '  a  ' . (string)$fila7['hora_salida'];
	$datos .= '<option value="'.$id_turno.'" '.(($id_turno==$turno)?'selected="selected"':"").'>'. $nombreturno .'</option>';
} } 
pg_free_result($resultado7);  
pg_close($conexion);
$datos .= '</select>';
echo $datos;
?>