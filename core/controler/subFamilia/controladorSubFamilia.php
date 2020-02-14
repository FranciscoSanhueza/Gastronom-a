<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//clase para ejecutar las acciones solicitadas por la pagina
$mensaje = "";
$codigo = -1;
// requiere los siguientes archivos
require_once 'GeneralSubFamilia.php';
require_once '../../model/SubFamilia.php';
//comprueba que el tipo de envio sea POST, en caso de ser otro retorna mensaje de error
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //compueba que exista un action en la ejecucion, en caso de no existir envia mensaje de error
    if (isset($_POST['action'])) {
        $gn = new GeneralSubFamilia();
        $valorAction = filter_var($_POST['action'], FILTER_SANITIZE_STRING);
        //compeuba si el action a ejecutar esta en la lista de actions permitidos, almacenados en la clase GeneralSubFamilia
        if (in_array($valorAction, $gn->getListaAcion())) {
            $g = new SubFamilia();
            
            //filtra el action y ejecuta la accion deseada
            switch ($valorAction) {
                case 'InsertarSubFamilia':
                   
                case 'EliminarSubFamilia':
                    
                case 'comboSubFamilia'://sirve para llenar un combobox con las subfamilias deseadas
                    $valor = SubFamilia::ListarSubFamilia(null);
                    $retorno = "";
                    //comprueba si existen valores en base de datos, sino retorna un combobox sin valores
                    if ($valor) {
                        //recorre los valores para pasarlos a formato HTML
                        foreach ($valor as $item => $registros) {
                            $retorno .= "<option value='".$registros[0]."'>".$registros[1]."</option>" ;
                        }
                    } else {
                        $retorno = "<option value='-1'>sin registros</option>";
                    }
                    echo $retorno;
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
//realiza el envio de valores cada ves que se genera un error
header("Content-Type: application/json, charset=utf-8");
$datos = array();
$datos[] = array(
    'message' => $mensaje,
    'code' => $codigo
);
echo json_encode($datos);
