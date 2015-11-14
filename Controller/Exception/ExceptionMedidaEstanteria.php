<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExceptionMedidaEstanteria
 *
 * @author Coconut
 */
class ExceptionMedidaEstanteria extends Exception{
    private $valor;
    
    public function __construct($message, $code, $previous, $valor) {
        parent::__construct($message, $code, $previous);
        $this->valor = $valor;
    }
    
    public function __toString() {
        switch ($code){
            case 0:
                return __CLASS__.$this->getMessage()."Medida $valor insuficiente, mínimo 10cm.";
            case 1:
                return __CLASS__.$this->getMessage()."Medita $valor excesiva, máximo 250cm.";
            case 2:
                return __CLASS__.$this->getMessage()."Se requiere más de una leja.";
        }
    }
    
}
