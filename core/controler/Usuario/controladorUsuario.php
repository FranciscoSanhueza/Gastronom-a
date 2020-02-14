<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$mensaje = "";
$codigo = -1;
//requiere GeneralProducto y la clase producto
require_once 'GeneralUsuario.php';
require_once '../../model/Usuario.php';
//comprueba que el tipo de envio sea POST, en caso de ser otro retorna mensaje de error
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //compueba que exista un action en la ejecucion, en caso de no existir envia mensaje de error
    if (isset($_POST['action'])) {
        $gn = new GeneralUsuario();
        $valorAction = filter_var($_POST['action'], FILTER_SANITIZE_STRING);
        //compeuba si el action a ejecutar esta en la lista de actions permitidos, almacenados en la clase GeneralProducto, sino envia mensaje de error
        if (in_array($valorAction, $gn->getListaAcion())) {

            //filtra el action y ejecuta la accion deseada
            switch ($valorAction) {

                case 'loginUsuario'://Valida el login
                    $u = new Usuario();
                    $u->setClave(filter_var($_POST('txt_pass'), FILTER_SANITIZE_STRING));
                    $u->setRun(filter_var($_POST['txt_user'], FILTER_SANITIZE_STRING));
                    echo $u->verificarLogin();
                    exit;
                    break;
            }
        } else {
            $mensaje = "Error, Action no soportado";
            $codigo = -2;
        }
    } else {
        $mensaje = "Error, no existe ninguna accion en el formulario";
        $codigo = -3;
    }
} else {
    $mensaje = "Error, solo se admiten envios del tipo POST";
    $codigo = -4;
}
//se ejecuta para enviar datos en caso de error
header("Content-Type: application/json, charset=utf-8");
$datos = array();
$datos[] = array(
    'message' => $mensaje,
    'code' => $codigo,
);
echo json_encode($datos);

