<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CaracteristicaProducto
 *clase que controla el agregado a caracteristicas de cada producto
 * @author pancho-PC
 */
class CaracteristicaProducto {
    private $idProducto;
    private $idCaracteristica;
    
    function __construct() {
        
    }

    function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    function setIdCaracteristica($idCaracteristica) {
        $this->idCaracteristica = $idCaracteristica;
    }

    function getIdProducto() {
        return $this->idProducto;
    }

    function getIdCaracteristica() {
        return $this->idCaracteristica;
    }


}
