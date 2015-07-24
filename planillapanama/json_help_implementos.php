<?php
require("clases/config.php");

$query  = "select implemento,descripcion from pla_implementos where compania = 1341 and status = 'A' order by descripcion";
$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
$numReg = pg_num_rows($resultado);
$i=0;

if($numReg>0){
	while ($fila=pg_fetch_array($resultado)) {		
	$response->rows[$i]['implemento']=$fila['implemento'];
    $response->rows[$i]['descripcion']=$fila['descripcion'];
    $i++;
} } 
pg_close($conexion);
echo json_encode($response);
?>
