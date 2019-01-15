<?php

//CONEXION PDO
try{
  $conexion = new PDO('mysql:host=localhost;dbname=agenda_nextu','root','');
  $msg = 'Conexión exitosa a la base de datos';
}catch(PDOException $e){
  print 'Error: '.$e->getMessage().'</br>';
  die();
}
$conexion = null;
//FIN CONEXION PDO


$response = array(
  'msg' => $msg
);
echo json_encode($response);
?>
