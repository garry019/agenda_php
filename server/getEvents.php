<?php
require('conectarPHP.php');
$con = new ConectorBD();
$regs = [];
$response['usuario'] = $_POST['usuario'];

if( $con->initConexion('agenda_nextu') == 'OK'){
  if($resultado = $con->consultar(['eventos'],['*'],' WHERE usuario = '.$response['usuario'])){
    while($fila =  $resultado->fetch_assoc()){
      $regs[] = $fila;
      $response['eventos'][] = array(
        'id' => $fila['id'],
        'title' => $fila['titulo'],
        'start' => $fila['fecha_inicio'],
        'end' =>  $fila['fecha_finalizacion'],
        'allDay' => $fila['allday'],
        'description' => 'ookokokokokok'
      );
    }
  }
}

$response['cantidad_eventos'] = count($regs);
$response['msg'] = 'OK';
echo json_encode($response);
?>
