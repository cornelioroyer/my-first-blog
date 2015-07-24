<?php
require("clases/config.php");
require("clases/sesion.php");

$sesion    = new sesion();
$id_usuario = (int)$sesion->get("id_usuario");
unset($sesion);
$id_reg =  $_REQUEST['id'];

//$id_usuario = 3;
//$id_reg =  842; 

$query3  = "select compania from pp_usuario_compania where pp_usuario_id = $id_usuario";
$resultado3 = pg_query($conexion, $query3) or die("Error en la Consulta SQL");
$numReg3 = pg_num_rows($resultado3);
if($numReg3>0){
	while ($fila3=pg_fetch_array($resultado3)) {		
	$id_compania  = $fila3['compania'];
} } 
pg_free_result($resultado3); 

$query4  = "select f_pla_periodo_actual($id_compania,'2')";
$resultado4 = pg_query($conexion, $query4) or die("Error en la Consulta SQL");
$numReg4 = pg_num_rows($resultado4);
if($numReg4>0){
	while ($fila4=pg_fetch_array($resultado4)) {		
	$id_periodo  = (int)$fila4['f_pla_periodo_actual'];
} } 
pg_free_result($resultado4); 

$query2  = "select a.implemento,a.descripcion from pla_implementos a, pp_usuario_compania b where a.compania = b.compania and b.pp_usuario_id = $id_usuario and a.status = 'A' order by a.descripcion";
$resultado2 = pg_query($conexion, $query2) or die("Error en la Consulta SQL");
$numReg2 = pg_num_rows($resultado2);
$li_contarray = 0;
if($numReg2>0){
	while ($fila2=pg_fetch_array($resultado2)) {		
	$datosArray[$li_contarray] ['implemento']  = $fila2['implemento'];
    $datosArray[$li_contarray] ['descripcion']   = $fila2['descripcion'];
	 $li_contarray++;
} } 
pg_free_result($resultado2);  


$li_contarray7 = 0;
$query7  = "select turno,hora_inicio,hora_salida from pla_turnos where compania = $id_compania order by hora_inicio";
$resultado7 = pg_query($conexion, $query7) or die("Error en la Consulta SQL");
$numReg7 = pg_num_rows($resultado7);
if($numReg7>0){
	while ($fila7=pg_fetch_array($resultado7)) {		
	$datosArray7[$li_contarray7] ['turno']  = $fila7['turno'];
    $datosArray7[$li_contarray7] ['nombre_turnos']   =  (string)$fila7['hora_inicio'] . '  a  ' . (string)$fila7['hora_salida'];
	$li_contarray7++;
} } 
pg_free_result($resultado7);  


$query  = "select a.id,a.turno,b.nombre,b.apellido,c.hora_inicio,c.hora_salida,a.numero_planilla,a.fecha,a.status,a.autorizado,a.entrada1,";
$query .= "a.descanso_inicio,a.descanso_fin,a.salida1,a.implemento,a.entrada2,a.salida2,a.entrada3,a.salida3,d.descripcion as nombre_proyecto ";
$query .= "from pp_horarios a,pla_empleados b,pla_turnos c, pla_proyectos d,pp_usuario_compania e, pp_usuario_proyecto f ";
$query .= "where a.id = $id_reg and a.compania = e.compania  and a.compania = b.compania  and a.compania = c.compania  and a.codigo_empleado = b.codigo_empleado ";
$query .= "and a.pla_proyectos_id = f.pla_proyectos_id  and a.turno = c.turno and a.compania = d.compania and a.pla_proyectos_id = d.id ";
$query .= "and  e.pp_usuario_id =  $id_usuario and f.pp_usuario_id =  $id_usuario and a.pla_periodos_id = $id_periodo";
//$query  = "select * from f_horarios_empleados($id_usuario,$id_periodo)";
$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");

$numReg =pg_num_rows($resultado);
$i=0;
$idx = 0;
//$rows = array();	
$data=array();
			 
if($numReg>0){
while ($fila=pg_fetch_array($resultado)) {
    $nombre_completo = trim($fila['nombre']) . '   ' . trim($fila['apellido']);
    $nombre_proyecto = Trim($fila['nombre_proyecto']);
	$opciones =  '<a href="javascript:;"  class="btn btn-primary btn-mini edit" >Editar</a>';
	$entrada1   = $fila['entrada1'] ;
	if (strlen($entrada1) == 0) {
        $entrada1 = '';
	} 
	
	$descanso_inicio   = $fila['descanso_inicio'] ;
	if (strlen($descanso_inicio) == 0) {
        $descanso_inicio = '';
	} 
	$descanso_fin   = $fila['descanso_fin'] ;
	if (strlen($descanso_fin) == 0) {
        $descanso_fin = '';
	} 	
	$salida1   = $fila['salida1'] ;
	if (strlen($salida1) == 0) {
        $salida1 = '';
	} 		
	$implemento   = $fila['implemento'] ;
	if (strlen($implemento) == 0) {
        $implemento = '';
	} 
	$entrada2   = $fila['entrada2'] ;
	if (strlen($entrada2) == 0) {
        $entrada2 = '';
	} 	
	$salida2   = $fila['salida2'] ;
	if (strlen($salida2) == 0) {
        $salida2 = '';
	} 	
	$entrada3   = $fila['entrada3'] ;
	if (strlen($entrada3) == 0) {
        $entrada3 = '';
	} 		
	$salida3   = $fila['salida3'] ;
	if (strlen($salida3) == 0) {
        $salida3 = '';
	} 		
	
	
		
	  $data[$i]["turno"]=$fila['turno'];
	  $data[$i]["status"]=$fila['status'];
	  $data[$i]["autorizado"]=$fila['autorizado'];
	  $data[$i]["entrada1"]=$entrada1;
	  $data[$i]["descanso_inicio"]=$descanso_inicio;
	  $data[$i]["descanso_fin"]=$descanso_fin;
	  $data[$i]["salida1"]=$salida1;
	  $data[$i]["implemento"]=$fila['implemento'];
	  $data[$i]["entrada2"]=$entrada2;
	  $data[$i]["salida2"]=$salida2;
	  $data[$i]["entrada3"]=$entrada3;
	  $data[$i]["salida3"]=$salida3;
	  


      $i++;
 }}
echo json_encode($data);
?>