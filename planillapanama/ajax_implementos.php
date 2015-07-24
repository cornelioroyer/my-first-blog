<?php
require("clases/config.php");
require("clases/sesion.php");
$sesion    = new sesion();
$id_usuario = (int)$sesion->get("id_usuario");
unset($sesion);

$implemento =  $_REQUEST['implemento'];

$query3  = "select compania from pp_usuario_compania where pp_usuario_id = $id_usuario";
$resultado3 = pg_query($conexion, $query3) or die("Error en la Consulta SQL");
$numReg3 = pg_num_rows($resultado3);
if($numReg3>0){
	while ($fila3=pg_fetch_array($resultado3)) {		
	$id_compania  = $fila3['compania'];
} } 
pg_free_result($resultado3); 

$datos =  '<select id="implemento" name="implemento" class="input-mini">';
$datos .=  '<option value=""  selected="selected"></option>';
$query7  = "select a.implemento,a.descripcion from pla_implementos a, pp_usuario_compania b where a.compania = b.compania and b.pp_usuario_id = $id_usuario and a.status = 'A' order by a.descripcion";
$resultado7 = pg_query($conexion, $query7) or die("Error en la Consulta SQL");
$numReg7 = pg_num_rows($resultado7);
if($numReg7>0){
	while ($fila7=pg_fetch_array($resultado7)) {		
	$id_implemento  = $fila7['implemento'];
    $descripcion       = $fila7['descripcion'];
	$datos .= '<option value="'.$id_implemento.'" '.(($id_implemento==$implemento)?'selected="selected"':"").'>'. $descripcion .'</option>';
} } 
pg_free_result($resultado7);  
pg_close($conexion);
$datos .= '</select>';
echo $datos;
?>