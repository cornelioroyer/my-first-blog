<?php
require("clases/config.php");

 if($tipo_usuario == '3'){
	 $query  = "select * from pp_usuario  order by id desc";
 }else{
	 
	    $query3  = "select compania from pp_usuario_compania where pp_usuario_id = $id_usuario";
		$resultado3 = pg_query($conexion, $query3) or die("Error en la Consulta SQL");
		$numReg3 = pg_num_rows($resultado3);
		if($numReg3>0){
			while ($fila3=pg_fetch_array($resultado3)) {		
			$id_compania  = $fila3['compania'];
		} } 
		pg_free_result($resultado3); 
	 
	 
	  $query = "select a.* from pp_usuario a, pp_usuario_compania b where b.pp_usuario_id = a.id  and b.compania = $id_compania order by a.id desc";
}


					
//$query .= "where a.compania = 754  and a.compania = b.compania  and a.compania = c.compania  and a.codigo_empleado = b.codigo_empleado and a.pla_proyectos_id = 103  and a.turno = c.turno and a.compania = d.compania and a.pla_proyectos_id = d.id AND a.id < 20";

$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");

$numReg = pg_num_rows($resultado);
?>
<div class="box box-color box-bordered">
	<div class="box-title">
		<h3><i class="icon-table"></i>Usuarios</h3>
		<div class="actions">
			<a href="#" onClick="fn_mostrar_frm_agregar('usuarios'); return false" class='btn'><i class="icon-plus-sign"></i> Agregar</a>
		</div>
	</div>
							   
	<div class="box-content nopadding">
       <table class="table table-nomargin table-bordered " id="example1">
			<thead>
				<tr>
					<th WIDTH=6%>Id</th>
					<th>Usuario</th>
					<th>Nombre</th>
					<th>Email</th>
					<th>Estado</th>
					<th>Tipo de Usuario</th>
					<th WIDTH=18%>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
				 $idx = 0;
				 if($numReg>0){
					while ($fila=pg_fetch_array($resultado)) {
                     if($fila['estado'] == 'A'){
						 $estado = "Activo";
					 }else{
						 $estado = "Inactivo";
					}	 
					if($fila['tipo_usuario'] == '1'){
						 $tipo_usuario2 = "Usuario común";
					}elseif($fila['tipo_usuario'] == '2'){
						 $tipo_usuario2 = "Administrador";
					}else{
						 $tipo_usuario2 = "Super Admin";
					}	
					
					$opciones   =  '<a href="#" onClick="fn_mostrar_frm_modificar(\'usuarios\',' .  $fila['id'] . '); return false"  class="btn btn-primary btn-mini" > Editar</a>  ';
					if($tipo_usuario == '3'){
						 $opciones  .=  '<a href="#" onClick="fn_mostrar_frm_modificar(\'companias\',' .  $fila['id'] . '); return false"  class="btn btn-primary btn-mini" > Compañias</a>  ';
					 }
                    $opciones  .=  '<a href="#" onClick="fn_mostrar_frm_modificar(\'proyectos\',' .  $fila['id'] . '); return false"  class="btn btn-primary btn-mini" > Proyectos</a>  ';
			   ?>
			   
				<tr>
					<td><?php echo $fila['id']; ?></td>
					<td><?php echo $fila['usuario']; ?></td>
					<td><?php echo $fila['nombre']; ?></td>
					<td><?php echo $fila['email']; ?></td>
					<td><?php echo $tipo_usuario2; ?></td>
					<td><?php echo $estado; ?></td>
					<td><?php echo $opciones; ?></td>
				</tr>
				<?php
					 }}
					 pg_free_result($resultado);  
					 pg_close($conexion);
				?>
			</tbody>
		</table>
    </div>						
</div>
