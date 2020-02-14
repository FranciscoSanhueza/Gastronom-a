<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//requiere la clase subfamilia
require_once '../../model/SubFamilia.php';
//testea que retorne de forma correcta lsa subfamilias desde base de datos
$valor= SubFamilia::ListarSubFamilia(null);
//comprueba si se retornaron productos
if($valor){
    foreach($valor as $item =>$registros){
        echo $registros[0]."<br>";
    }
}

