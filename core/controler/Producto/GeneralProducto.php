<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GeneralProducto
 *esta clase controla los tipos de action que permite ejecutar la clase de controladorProducto
 * @author pancho-PC
 */
class GeneralProducto {
    
     private $listaAcion = array();

    public function __construct() {
        //lista de actions que son permitidos
        $this->listaAcion = array("InsertarProducto", "ListarProducto", "EliminarProducto", "productoPorCode", "modProducto");
    }
     //retorna la lista con los actions
    public function getListaAcion() {
        return $this->listaAcion;
    } 
}
