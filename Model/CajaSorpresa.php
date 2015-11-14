<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CajaSorpresa
 *
 * @author Coconut
 */
include_once "Caja.php";

class CajaSorpresa extends Caja{
    private $contenido;
    
    private $tipoCaja;
    
    function __construct($altura, $anchura, $profundidad, $_color, $date, $contenido, $_tipo) {
        parent::__construct($altura, $anchura, $profundidad, $_color, $date);
        $this->contenido = $contenido;
        $this->tipoCaja = $_tipo;
    }

    function getTipoCaja() {
        return $this->tipoCaja;
    }

    function setTipoCaja($tipoCaja) {
        $this->tipoCaja = $tipoCaja;
    }
    
    function getContenido() {
        return $this->contenido;
    }

    function getDatoBDD(){
        return $this->contenido;
    }
    
    function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    public function __toString() {
        //Llamamos al método toString de la clase padre y concatenamos:
        return parent::__toString().", contenido: ".$this->contenido."<br>";
    }

    public function calcVolume(){ //¿Por qué Dani ha puesto este método público? aunque no lo ponga, lo es.
        return $this->getAltura()*$this->getAnchura()*$this->getProfundidad();
    }
    
}
