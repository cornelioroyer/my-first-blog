<?php
$autorizado =  (string)$_REQUEST['autorizado'];
$datos =  '<select id="autorizado" name="autorizado" class="input-mini">';
$datos .= '<option value="'. "S" .'" '.(($autorizado=='S')?'selected="selected"':"").'>'."Si".'</option>';
$datos .= '<option value="'. "N" .'" '.(($autorizado=='N')?'selected="selected"':"").'>'."No".'</option>';
$datos .= '</select>';
echo $datos;
?>