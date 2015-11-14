<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CajaNegra
 *
 * @author Coconut
 */
include_once "Caja.php";

class CajaNegra extends Caja{
    //put your code here
    private $placa;
    
    private $tipoCaja;
    
    function __construct($altura, $anchura, $profundidad, $_color, $date, $placa, $_tipo){
        parent::__construct($altura, $anchura, $profundidad, $_color,  $date);
        $this->placa = $placa;
        $this->tipoCaja = $_tipo;
    }

    function getTipoCaja() {
        return $this->tipoCaja;
    }

    function setTipoCaja($tipoCaja) {
        $this->tipoCaja = $tipoCaja;
    }

    function getPlaca() {
        return $this->placa;
    }

    function getDatoBDD(){
        return $this->placa;
    }
    
    function setPlaca($placa) {
        $this->placa = $placa;
    }

    function calcVolume(){
        return $this->getAltura()*$this->getAnchura()*$this->getProfundidad();
    }
    
}
