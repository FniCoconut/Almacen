<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pasillo
 *
 * @author Coconut
 */
class Pasillo {
    private $idPasillo;
    private $posiciones;
    
    function __construct($idPasillo, $posiciones) {
        $this->idPasillo = $idPasillo;
        $this->posiciones = $posiciones;
    }
    
    function getIdPasillo() {
        return $this->idPasillo;
    }

    function getPosiciones() {
        return $this->posiciones;
    }

    function setIdPasillo($idPasillo) {
        $this->idPasillo = $idPasillo;
    }

    function setPosiciones($posiciones) {
        $this->posiciones = $posiciones;
    }



}
