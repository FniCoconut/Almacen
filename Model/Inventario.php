<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ocupacion
 *
 * @author Coconut
 */

include_once 'Estanteria.php';
include_once 'CajaFuerte.php';
include_once 'CajaSorpresa.php';
include_once 'CajaNegra.php';

class Inventario {
    
    private $fecha;
    private $estanterias = array();
    
    function __construct($fecha, $estanterias) {
        $this->fecha = date('d-m-Y');
        $this->estanterias = $estanterias;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getEstanterias() {
        return $this->estanterias;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setEstanterias($estanterias) {
        $this->estanterias = $estanterias;
    }
    
}
