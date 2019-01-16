<?php

$response['eventos']  = array(
  array(
    'title' => 'evento 1',
    'start' => '2019-01-20',
    'end' =>  '2019-01-20'
  ),
  array(
    'title' => 'evento 2',
    'start' => '2019-01-25',
    'end' =>  '2019-01-25'
  )
);


$response['msg'] = 'OK';
echo json_encode($response);


 ?>
