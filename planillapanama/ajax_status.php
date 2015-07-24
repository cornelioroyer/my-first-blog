<?php
$status =  (string)$_REQUEST['status'];
$datos =  '<select id="status" name="status" class="input-mini">';
$datos .= '<option value="'. "C" .'" '.(($status=='C')?'selected="selected"':"").'>'."Certificado Medico".'</option>';
$datos .= '<option value="'."D".'" '.(($status=='D')?'selected="selected"':"").'>'."Día libre feriado".'</option>';
$datos .= '<option value="'."F".'" '.(($status=='F')?'selected="selected"':"").'>'."Pagar feriado".'</option>';
$datos .= '<option value="'."I".'" '.(($status=='I')?'selected="selected"':"").'>'."Ausencia".'</option>';
$datos .= '<option value="'."L".'" '.(($status=='L')?'selected="selected"':"").'>'."Día libre".'</option>';
$datos .= '<option value="'."R".'" '.(($status=='R')?'selected="selected"':"").'>'."Registrado".'</option>';
$datos .= '</select>';
echo $datos;
?>