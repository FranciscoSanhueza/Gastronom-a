<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GeneralUsuario
 * Controla los actions del controlador
 * @author pancho-PC
 */
class GeneralUsuario {
    private $listaAcion = array();

    public function __construct() {
        //lista de actions que son permitidos
        $this->listaAcion = array("loginUsuario", "", "", "", "");
    }
     //retorna la lista con los actions
    public function getListaAcion() {
        return $this->listaAcion;
    } 
}
