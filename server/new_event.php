<?php
require('conectarPHP.php');
$con = new ConectorBD();

//DATOS DE PRUEBA FUNCIONANDO
// $datos['titulo'] = '"Titulo prueba"';
// $datos['fecha_inicio'] = '"2019-01-20"';
// $datos['hora_inicio'] = '"07:00:00"';
// $datos['fecha_finalizacion'] = '"2019-01-20"';
// $datos['hora_finalizacion'] = '"20:00:00"';
// $datos['allday'] = 1;
// $datos['usuario'] = 2;

$fi = $_POST['start_date'].' '.$_POST['start_hour'];
$ff = $_POST['end_date'].' '.$_POST['end_hour'];

//DATOS DELFORMULARIO
$datos['titulo'] = '"'.$_POST['titulo'].'"';
$datos['fecha_inicio'] = '"'.$fi.'"';
$datos['fecha_finalizacion'] = '"'.$ff.'"';
$datos['allday'] = $_POST['allDay'];
$datos['usuario'] = $_POST['usuario'];

if( $con->initConexion('agenda_nextu') == 'OK'){
  if($result = $con->insertData('eventos',$datos)){
    $response['msg'] = 'OK';
  }
}

echo json_encode($response);
?>
