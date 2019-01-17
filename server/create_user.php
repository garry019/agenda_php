<?php
require('conectarPHP.php');
$con = new ConectorBD();
$regs = array();

if( $con->initConexion('agenda_nextu') == 'OK'){
  if($resultado = $con->consultar(['usuarios'],['nombre'],'')){
    while($fila =  $resultado->fetch_assoc()){
      $regs[] = $fila;
    }
    if(count($regs) == 0){
      for($i=1;$i<=3;$i++){
          $p = 'usuario'.$i;
          $pass = password_hash($p, PASSWORD_DEFAULT);
          $datos['correo'] = "'".'usuario'.$i.'@agenda.com'."'";
          $datos['nombre'] = "'".'usuario'.$i."'";
          $datos['password'] = "'".$pass."'";
          $datos['fecha_nacimiento'] = '"1983-01-21"';
          $con->insertData('usuarios',$datos);
      }
      $response['msg'] = 'se han creado '.count($regs).' usuarios';
    }else{
      $response['msg'] = 'Se han encontrado '.count($regs).' usuarios';
    }
  }else{
    $response['msg'] = 'Problemas en la consulta';
  }
  $con->cerrarConexion();
}else{
  $response['msg'] = 'Sin conexion';
}
echo json_encode($response);
?>
