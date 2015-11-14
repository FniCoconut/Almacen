<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Material
 *
 * @author Coconut
 */
class Material {
    
    private $materialEstanteria;
    
    function __construct($materialEstanteria) {
        $this->materialEstanteria = $materialEstanteria;
    }

    function getMaterialEstanteria() {
        return $this->materialEstanteria;
    }

    function setMaterialEstanteria($materialEstanteria) {
        $this->materialEstanteria = $materialEstanteria;
    }


    
}
