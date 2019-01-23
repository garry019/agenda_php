<?php
require('conectarPHP.php');
$con = new ConectorBD();

$id = $_POST['id'];
$fi = $_POST['start_date'].' '.$_POST['start_hour'];
$ff = $_POST['end_date'].' '.$_POST['end_hour'];

if( $con->initConexion('agenda_nextu') == 'OK'){
  $datos['fecha_inicio'] = '"'.$fi.'"';
  $datos['fecha_finalizacion'] = '"'.$ff.'"';
  if($con->actualizarRegistro('eventos',$datos,'id = '.$id)){
    $response['msg'] = 'OK';
  }
}
echo json_encode($response);
?>
