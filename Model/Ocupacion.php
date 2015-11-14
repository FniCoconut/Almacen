<?php

/**
 * Description of Ocupacion
 *
 * @author Coconut
 */
class Ocupacion {
    
    private $idShelve;
    private $idBox;
    private $shelf;
    private $tipoCaja;
    
    function __construct($idShelve, $shelf, $tipoCaja) {
        $this->idShelve = $idShelve;
        $this->idBox;
        $this->shelf = $shelf;
        $this->tipoCaja = $tipoCaja;
    }
    
    function getIdShelve() {
        return $this->idShelve;
    }

    function getIdBox() {
        return $this->idBox;
    }

    function getShelf() {
        return $this->shelf;
    }

    function getTipoCaja() {
        return $this->tipoCaja;
    }

    function setIdShelve($idShelve) {
        $this->idShelve = $idShelve;
    }

    function setIdBox($idBox) {
        $this->idBox = $idBox;
    }

    function setShelf($shelf) {
        $this->shelf = $shelf;
    }

    function setTipoCaja($tipoCaja) {
        $this->tipoCaja = $tipoCaja;
    }

    

    
    
    
}
