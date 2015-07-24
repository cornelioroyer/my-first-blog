<?php
require("clases/config.php");
require("clases/sesion.php");
$contador      =  0;
$usuario        =  trim($_POST['usuario']); 
$contrasena  =  trim($_POST['contrasena']);
$siglas           = '';

$query2  = "select * from pp_usuario where usuario = '$usuario' AND  password = '$contrasena' AND estado = 'A' ";
$resultado2 = pg_query($conexion, $query2) or die("Error en la Consulta SQL");
$numReg2 = pg_num_rows($resultado2);
if($numReg2>0){
	while ($fila2=pg_fetch_array($resultado2)) {		
	 $id_usuario           = $fila2['id'];
	 $nombre_usuario  = $fila2['nombre'];
	 $usuario                = $fila2['usuario'];
	 $tipo_usuario                = $fila2['tipo_usuario'];
	 $contador++;
} } 
pg_free_result($resultado2);  

if ($contador == 0) {
  $sts = "1";
  $mensaje = "El nombre del usuario o la contrase&ntilde;a son incorrectos.";
  echo "<h5>" . $mensaje. "</h5>";
}else{
		$sesion = new sesion();
		$sesion->set("id_usuario",$id_usuario);
		$sesion->set("nombre_usuario",$nombre_usuario);
		$sesion->set("usuario",$usuario);
		$sesion->set("tipo_usuario",$tipo_usuario);
		unset($sesion);
		$sts = "0";
		echo $sts;
}
?>