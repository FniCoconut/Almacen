<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EsceptionMedidaAlmacenaje
 *
 * @author Coconut
 */
class EsceptionMedidaAlmacenaje extends Exception{
    private $valor;
    
    public function __construct($message, $code, $previous, $valor) {
        parent::__construct($message, $code, $previous);
        $this->valor = $valor;
    }
    
    public function __toString() {//valor de caja o estantería?
        switch ($code){
            case -1:
                return __CLASS__.$this->getMessage()."Estantería llena";
            case 0:
                return __CLASS__.$this->getMessage()."Ancho de la caja $valor";
            case 1:
                return __CLASS__.$this->getMessage()."Alto de la caja $valor";
            case 2:
                return __CLASS__.$this->getMessage()."Profundidad de la caja $valor";
        }
    }

}
