<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$mensaje = "";
$codigo = -1;
//requiere GeneralProducto y la clase producto
require_once 'GeneralProducto.php';
require_once '../../model/Producto.php';
//comprueba que el tipo de envio sea POST, en caso de ser otro retorna mensaje de error
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //compueba que exista un action en la ejecucion, en caso de no existir envia mensaje de error
    if (isset($_POST['action'])) {
        $gn = new GeneralProducto();
        $valorAction = filter_var($_POST['action'], FILTER_SANITIZE_STRING);
        //compeuba si el action a ejecutar esta en la lista de actions permitidos, almacenados en la clase GeneralProducto, sino envia mensaje de error
        if (in_array($valorAction, $gn->getListaAcion())) {
            $p = new Producto();
            //filtra el action y ejecuta la accion deseada
            switch ($valorAction) {
                case 'productoPorCode'://retorna un producto filtrandolo por su codigo
                    $p->setId(filter_var($_POST['txt_id'], FILTER_SANITIZE_NUMBER_INT));
                    $valor = Producto::ListarProducto($p->getId());
                    $retorno = "";
                    //comprueba si se retornaron valores, sino envia mensaje de error
                    if ($valor) {
                        //los recorre y retorna separados por un -
                        foreach ($valor as $item => $registros) {
                            $retorno = $registros[0] . "-" . $registros[1] . "-" . $registros[2] . "-" . $registros[3] . "-" . $registros[4] . "-" . $registros[5];
                        }
                    } else {
                        $retorno = "Error no se encontro el producto";
                    }
                    echo $retorno;
                    exit;
                    break;
                case 'EliminarProducto'://ejecuta la eliminacion de un producto
                    $p->setId(filter_var($_POST['txt_id'], FILTER_SANITIZE_NUMBER_INT));
                    echo $p->elimProducto();
                    exit;
                    break;
                case 'modProducto'://modifica un producto
                    $codigo = filter_var($_POST['txt_id_mod'], FILTER_SANITIZE_NUMBER_INT);
                    $nombre = filter_var($_POST['txt_nombre_mod'], FILTER_SANITIZE_STRING);
                    $unidad = filter_var($_POST['txt_unidad_mod'], FILTER_SANITIZE_NUMBER_INT);
                    $stock = filter_var($_POST['txt_stock_mod'], FILTER_SANITIZE_NUMBER_INT);
                    $sub = filter_var($_POST['txt_subfamilia_mod'], FILTER_SANITIZE_NUMBER_INT);
                    $estado = filter_var($_POST['txt_estado_mod'], FILTER_SANITIZE_NUMBER_INT);
                    //comprueba que noexitan campos basios o mal ingresados, sino envia mensaje de error
                    if (trim($nombre) != "" and trim($unidad) != "-1" and trim($stock) != "" and $stock >= 0 and trim($sub) != "-1" and trim($estado) != "" and trim($codigo) != "-1") {
                        //comprueba que lso datos de los combobox sean correctos, sino envia mensaje de error
                        if ($unidad == 1 or $unidad == 2 and $estado == 1 or estado == 2) {
                            //setea el valor de la unidad de medida
                            if ($unidad == 1) {
                                $unidad = "G";
                            } else if ($unidad == 2) {
                                $unidad = "L";
                            }
                            $p->setId($codigo);
                            $p->setNombre($nombre);
                            $p->setUnidad($unidad);
                            $p->setSubFamilia($sub);
                            $p->setStockMinimo($stock);
                            $p->setEstado($estado);
                            echo $p->mod_producto();
                            $codigo = 1;
                        } else {
                            echo"Error en el analisis de los campos";
                            $codigo = -1;
                        }
                    } else {
                        echo "Todos los Campos son obligatorios";
                        $codigo = -1;
                    }
                    exit;
                    break;
                case 'InsertarProducto'://ingresa productos
                    $nombre = filter_var($_POST['txt_nombre'], FILTER_SANITIZE_STRING);
                    $unidad = filter_var($_POST['txt_unidad'], FILTER_SANITIZE_NUMBER_INT);
                    $stock = filter_var($_POST['txt_stock'], FILTER_SANITIZE_NUMBER_INT);
                    $sub = filter_var($_POST['txt_subfamilia'], FILTER_SANITIZE_NUMBER_INT);
                    //compueba que los campos tengan datos correctos, sino envia mensaje de error
                    if (trim($nombre) != "" and trim($unidad) != "-1" and trim($stock) != "" and $stock >= 0 and trim($sub) != "-1" and $unidad == 1 or $unidad == 2) {
                        //setea los valores de unidad de medida
                        if ($unidad == 1) {
                            $unidad = "G";
                        } else if ($unidad == 2) {
                            $unidad = "L";
                        }
                        $p->setNombre($nombre);
                        $p->setUnidad($unidad);
                        $p->setSubFamilia($sub);
                        $p->setStockMinimo($stock);
                        echo $p->ing_producto();
                        $mensaje = "ingresado correctamente";
                        $codigo = 1;
                    } else {
                        $mensaje = "Error al ingresar los campos";
                        $codigo = -1;
                    }
                    exit;
                    break;
                case 'ListarProducto'://Llena la tabla de productos
                    $valor = Producto::ListarProducto(null);
                    $cod = filter_var($_POST['cod'], FILTER_SANITIZE_NUMBER_INT);
                    $retorno = "";
                    //compeuba que existan productos en la base de datos, sino llena la tabla con un campo de error
                    if ($valor) {
                        //recorre los productos y los pasa a formato html
                        foreach ($valor as $item => $registros) {
                            //filatra si se muestran losm productos elimiandos o no
                            if ($cod == 0) {
                                //filtra para no mostrar los productos elimiandos

                                if ($registros[5] == 2) {
                                    $retorno .= "<tr class='table-danger'>"
                                            . "<td>" . $registros[0] . "</td>"//codigo
                                            . "<td>" . $registros[1] . "</td>"//nombre
                                            . "<td>" . $registros[2] . "</td>"//subFamilia
                                            . "<td>" . $registros[3] . "</td>"//Unidad
                                            . "<td>" . $registros[4] . "</td>"//stockMinimo
                                            //. "<td>" . $registros[5] . "</td>"//Estado
                                            . "<td><i class='fa fa-edit' onclick= m(" . $registros[0] . ") style='font-size: 24px; color: green'></i></td>"
                                            . "<td><i class='fas fa-trash-alt' onclick=mensajeeliminar(" . $registros[0] . ") style='font-size: 24px; color: red'></i></td>"
                                            . "</tr>";
                                } else {
                                    $retorno .= "<tr>"
                                            . "<td>" . $registros[0] . "</td>"//codigo
                                            . "<td>" . $registros[1] . "</td>"//nombre
                                            . "<td>" . $registros[2] . "</td>"//subFamilia
                                            . "<td>" . $registros[3] . "</td>"//Unidad
                                            . "<td>" . $registros[4] . "</td>"//stockMinimo
                                            //. "<td>" . $registros[5] . "</td>"//Estado
                                            . "<td><i class='fa fa-edit' onclick= m(" . $registros[0] . ") style='font-size: 24px; color: green'></i></td>"
                                            . "<td><i class='fas fa-trash-alt' onclick=mensajeeliminar(" . $registros[0] . ") style='font-size: 24px; color: red'></i></td>"
                                            . "</tr>";
                                }
                            } else {
                                if ($cod == 1) {
                                    if ($registros[5] == 1) {
                                        $retorno .= "<tr>"
                                                . "<td>" . $registros[0] . "</td>"//codigo
                                                . "<td>" . $registros[1] . "</td>"//nombre
                                                . "<td>" . $registros[2] . "</td>"//subFamilia
                                                . "<td>" . $registros[3] . "</td>"//Unidad
                                                . "<td>" . $registros[4] . "</td>"//stockMinimo
                                                //. "<td>" . $registros[5] . "</td>"//Estado
                                                . "<td><i class='fa fa-edit' onclick= m(" . $registros[0] . ") style='font-size: 24px; color: green'></i></td>"
                                                . "<td><i class='fas fa-trash-alt' onclick=mensajeeliminar(" . $registros[0] . ") style='font-size: 24px; color: red'></i></td>"
                                                . "</tr>";
                                    }
                                }
                            }
                        }
                    } else {
                        $retorno = "<tr>"
                                . "<td colspan='4'>No Existen Registros Asociados</td>"
                                . "</tr>";
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
//se ejecuta para enviar datos en caso de error
header("Content-Type: application/json, charset=utf-8");
$datos = array();
$datos[] = array(
    'message' => $mensaje,
    'code' => $codigo,
);
echo json_encode($datos);
