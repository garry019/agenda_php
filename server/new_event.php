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

//DATOS DELFORMULARIO
$datos['titulo'] = '"'.$_POST['titulo'].'"';
$datos['fecha_inicio'] = '"'.$_POST['start_date'].'"';
$datos['hora_inicio'] = '"'.$_POST['start_hour'].'"';
$datos['fecha_finalizacion'] = '"'.$_POST['end_date'].'"';
$datos['hora_finalizacion'] = '"'.$_POST['end_hour'].'"';
$datos['allday'] = $_POST['allDay'];
$datos['usuario'] = $_POST['usuario'];

if( $con->initConexion('agenda_nextu') == 'OK'){
  if($result = $con->insertData('eventos',$datos)){
    $response['msg'] = 'OK';
  }
}

echo json_encode($response);
?>
