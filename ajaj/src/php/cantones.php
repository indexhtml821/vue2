<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

$request = json_decode(file_get_contents('php://input'));
switch($request->id) {
    case 1:
        $cantones = array(
            array('id' => 1, 'nombre' => 'Central'),
            array('id' => 2, 'nombre' => 'Pavas')
        );
        break;
    case 2:
        $cantones = array(
            array('id' => 3, 'nombre' => 'Alajuela'),
            array('id' => 4, 'nombre' => 'San Rafael')
        );
        break;
    default:
        $cantones = array();
        break;
}
echo json_encode($cantones);