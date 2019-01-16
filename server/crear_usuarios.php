<?php
require('conectarPHP.php');
$con = new ConectorBD();
//$con->consultar(['usuarios'],['nombre'],'');
// if( $con->initConexion('agenda_nextu') == 'OK'){
//
//   $tablas = array('usuarios');
//   $campos = array('id','nombre');
//   if($resultado = $con->consultar($tablas,$campos)){
//       while($fila =  $resultado->fetch_assoc()){
//         $regs[] = $fila;
//       }
//
//       if(count($regs) == 0){
//         for($i=1;$i<=3;$i++){
//           $datos['correo'] = '"usuario'.$i.'@correo.com"';
//           $datos['nombre'] = '"Usuario'.$i.'"';
//           $con->insertData('usuarios',$datos);
//         }
//         $msg = 'OK';
//       }
//   }else{
//       $msg = 'Problemas en la consulta';
//   }
// }
//
//$con->cerrarConexion();
$response = array(
  'msg' => 'OK'
);
echo json_encode($response);
?>
