<?php
header('Content-Type: text/html; charset=UTF-8'); 
require("clases/config.php");
$tableData = stripcslashes($_POST['pTableData']);
$tableData = json_decode($tableData,TRUE);
//echo $tableData[0]['entrada2'];
$idx = 0;
$res = "0";
 foreach ($tableData as $key => $value) {
	  $idx = $idx + 1;
	  $id                        =  $value["id"];
	  $turno                 =  $value["turno"];
      $status                 =  $value["status"];
	  $autorizado          =  $value["autorizado"];
	  $entrada1             =  $value["entrada1"];
	  $descanso_inicio =  $value["descanso_inicio"];
	  $descanso_fin     =  $value["descanso_fin"];
	  $salida1              =  $value["salida1"];
	  $implemento      =  $value["implemento"];
	  $entrada2           =  $value["entrada2"];
	  $salida2             =  $value["salida2"];
	  $entrada3          =  $value["entrada3"];
	  $salida3            =  $value["salida3"];
  
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
		    $res = "1";

			  /*$res1 = pg_result_error_field($resultado, PGSQL_DIAG_SQLSTATE);
			  $res1 = strip_tags($res1);
			 echo  $res1;*/
			/*$success = settype($resultado, 'string'); 
			$res1 = strip_tags($success);
			$c2 = stristr( $res1, "in", true );
			echo  "c2 = [".$c2."]";*/
			 $res1 = pg_get_result($conexion);
             echo $res1;
            exit;
		}  
        else  
		{  
          // $row_count= pg_num_rows($resultado);
           pg_free_result($resultado);  
		}
	  
     

  }
 

  if ($res ==  "0") {
	 
     pg_close($conexion);
     echo "Registos Actualizados"; 
   }else{
	 //echo  pg_last_error();   
	 //$res1 = pg_get_result($conexion);
	 //echo pg_result_error_field($res1, PGSQL_DIAG_SQLSTATE);
	 
	// pg_set_error_verbosity($conexion, PGSQL_ERRORS_VERBOSE);
    // $res1 = pg_get_result($conexion);
    // echo pg_result_error($res1);
	 
	 // $res1 = pg_get_result($conexion);
     ////////echo pg_result_error_field($res1, PGSQL_DIAG_SQLSTATE);
	 
	// $errores = pg_result_error_field($conexion);   
	 //echo stript_tags($errores);
     //echo pg_result_error_field($conexion);  	 
  }	   
	   
   
?>
