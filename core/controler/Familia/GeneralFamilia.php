<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GeneralFamilia
 *
 * @author pancho-PC
 */
class GeneralFamilia {
    private $listaAcion = array();
    public function __construct() {
        //lista de actions que son permitidos
        $this->listaAcion = array("insertarFamilia", "comboFamilia", "eliminaFamilia", "listarFamilia", "modificarFamilia");
    }
    //retorna la lista con los actions
    public function getListaAcion() {
        return $this->listaAcion;
    } 
}
