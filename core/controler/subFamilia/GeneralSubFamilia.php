<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GeneralSubFamilia
 *esta clase controla los tipos de action que permite ejecutar la clase de controladorSubFamilia
 * @author pancho-PC
 */
class GeneralSubFamilia {
    private $listaAcion = array();
    public function __construct() {
        //lista de actions que son permitidos
        $this->listaAcion = array("InsertarSubFamilia", "comboSubFamilia", "EliminarSubFamilia", "", "");
    }
    //retorna la lista con los actions
    public function getListaAcion() {
        return $this->listaAcion;
    } 
}
