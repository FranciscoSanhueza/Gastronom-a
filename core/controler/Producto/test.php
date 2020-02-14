<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//requiere la clase productos
require_once '../../model/Producto.php';
//testea que retorne de forma correcta los productos desde base de datos
$valor= Producto::ListarProducto(null);
//comprueba si se retornaron productos
if($valor){
    foreach($valor as $item =>$registros){
        echo $registros[0]."<br>";
    }
}
