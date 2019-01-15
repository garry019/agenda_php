<?php

//CONEXION PHP
$mysqli = new mysqli('localhost','root','','agenda_nextu');
if($mysqli->connect_errno){
  echo 'Error: '.$mysqli->connect_error;
}else{
  $msg = 'Conexion exitosa a la base de datos';
}

$response = array(
  'msg' => $msg
);

echo json_encode($response);
?>
