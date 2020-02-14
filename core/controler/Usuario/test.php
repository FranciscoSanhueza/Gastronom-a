<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../../model/Usuario.php';
//testea que retorne de forma correcta lsa subfamilias desde base de datos
$valor= Usuario::LoginUsuario(NULL,NULL);
//comprueba si se retornaron productos
if($valor){
    foreach($valor as $item =>$registros){
        echo $registros[0]."<br>";
    }
}
