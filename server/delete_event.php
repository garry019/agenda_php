<?php
require('conectarPHP.php');
$con = new ConectorBD();

$usuario = $_POST['usuario'];
$evento = $_POST['id'];

if( $con->initConexion('agenda_nextu') == 'OK'){
  if($con->eliminarRegistro('eventos',' id = "'.$evento.'"')){
    $data['msg'] = 'OK';
  }
}

echo json_encode($data);
 ?>
