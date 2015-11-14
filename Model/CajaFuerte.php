<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CajaFuerte
 *
 * @author Coconut
 */
include_once "Caja.php"; 

class CajaFuerte extends Caja{
    //put your code here
    private $cerradura;
    
    private $tipoCaja;
    
    function __construct($altura, $anchura, $profundidad, $_color, $date, $cerradura, $_tipo) {
        parent::__construct($altura, $anchura, $profundidad, $_color, $date);
        $this->cerradura = $cerradura;
        $this->tipoCaja = $_tipo;
    }
    
    function getTipoCaja() {
        return $this->tipoCaja;
    }

    function setTipoCaja($tipoCaja) {
        $this->tipoCaja = $tipoCaja;
    }

    function getCerradura() {
        return $this->cerradura;
    }

    function getDatoBDD(){
        return $this->cerradura;
    }
    
    function setCerradura($cerradura) {
        $this->cerradura = $cerradura;
    }

    function calcVolume(){
        return $this->getAltura()*$this->getAnchura()*$this->getProfundidad();
    }
    
}
