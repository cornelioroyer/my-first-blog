<?php
require("clases/sesion.php");
$sesion    = new sesion();
$nombre_usuario   = $sesion->get("nombre_usuario");
$id_usuario = (int)$sesion->get("id_usuario");
$usuario    = $sesion->get("usuario");
$tipo_usuario    = $sesion->get("tipo_usuario");
unset($sesion);
if( $nombre_usuario == false )
{	
	header("Location: index.php");		
}
else 
{
 include('header.php');
?>
<div class="row-fluid">
	<div class="span12">
		<?php
				if ($tipo_usuario == '2'){
					require_once("usuarios.php");
				} elseif ($tipo_usuario == '3'){
					require_once("usuarios.php");
				}	
				else {
					require_once("horarios.php");
				}
		?>  				
	</div>
</div>	
<?php 
include('footer.php'); 
}
?>