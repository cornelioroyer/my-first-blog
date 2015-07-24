<?php
$user = "planilla";
$password = "planilla%";
$dbname = "planilla";
$port = "5432";
$host = "200.75.216.83";

$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";

$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
?>