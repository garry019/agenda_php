<?php
require('conectarPHP.php');
$con = new ConectorBD();

$correo = $_POST['username'];
$password = $_POST['password'];
$regs = array();

if( $con->initConexion('agenda_nextu') == 'OK'){
  if($resultado = $con->consultar(['usuarios'],['*'],' WHERE correo = "'.$correo.'" ')){
    while($fila =  $resultado->fetch_assoc()){
      $regs[] = $fila;
      $p = $fila['password'];
    }
  }
  if(count($regs) == 0){
    $response['msg'] = 'Verificar datos';
  }else{
    if(count($regs) == 1){
      $val = password_verify($password, $p);
      if($val == true){
        $response['msg'] = 'OK';
      }else{
        $response['msg'] = 'El usuario existe pero la falla la contraseña';
      }
    }
  }
}

echo json_encode($response);
 ?>
