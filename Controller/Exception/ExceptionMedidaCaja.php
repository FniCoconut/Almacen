<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExcepcionMedida
 *
 * @author Coconut
 */
class ExceptionMedidaCaja extends Exception{
    private $valor;
    
    public function __construct($message, $code, $previous, $valor) {
        parent::__construct($message, $code, $previous);
        $this->valor = $valor;
    }
    
    public function __toString() {
        switch ($code){
            case 0:
                return __CLASS__.$this->getMessage()."Medida $valor demasiado pequeña, se requiere mayor que 10cm.";
            case 1:
                return __CLASS__.$this->getMessage()."Medida $valor demasiado grande, se requiere menor que 250cm.";
            case 2:
                return __CLASS__.$this->getMessage()."Color $valor no válido, remítase a inventario.";
        }
    }
}

/*
 * Excepcion Dani:
 * extends exception{
 *  public function __construct (message, code, valor){ ... ... }
 * 
 *  __toString(){
 *      switch ( code )
 *          case n return $message, $code, $valor;
 * }
 * 
 */
