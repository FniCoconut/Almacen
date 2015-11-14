<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estanteria
 *
 * @author Coconut
 */

//include_once '../Controller/Exception/ExceptionMedidaEstanteria.php';

class Estanteria {
    //Propiedades
    private $cajasColocadas; //esto, según Daniel no tiene que estar aqui
    private $codigo;
    private $numLejas;
    private $ocupados;
    private $anchura;
    private $altura;
    private $profundidad;
    private $material;
    private $pasillo;
    private $numPasillo;
    
    //Constructor
    function __construct($totalEstantes, $ocupados, $anchura, $altura, $profundidad, $material, $pasillo, $numero) {
        /*
         * makeShelve.php asigna 0 a $ocupadas
         */
//        $this->estructura = array(); //shrot syntax for array creation
        $this->cajasColocadas;
        $this->codigo;
        $this->numLejas = $totalEstantes;
        $this->ocupados = $ocupados;
        $this->anchura = $anchura;
        $this->altura = $altura;
        $this->profundidad = $profundidad;
        $this->material = $material;
        $this->pasillo = $pasillo;
        $this->numPasillo = $numero;
    }

    
    //Métodos
    function getCodigo() {
        return $this->codigo;
    }

    function setCodigo($_codigo){
        $this->codigo = $_codigo;
    }
    
    function getAnchura() {
        return $this->anchura;
    }

    function getAltura() {
        return $this->altura;
    }

    function getProfundidad() {
        return $this->profundidad;
    }

    function getOcupados() {
        return $this->ocupados;
    }

    function getMaterial() {
        return $this->material;
    }

    function getPasillo() {
        return $this->pasillo;
    }

    function getNumPasillo() {
        return $this->numPasillo;
    }

    function setNumPasillo($numPasillo) {
        $this->numPasillo = $numPasillo;
    }

        
    function setOcupados($ocupados) {
        $this->ocupados = $ocupados;
    }

    function setMaterial($material) {
        $this->material = $material;
    }

    function setPasillo($pasillo) {
        $this->pasillo = $pasillo;
    }
        
    function setAnchura($anchura) {
        if($anchura < 10){
            throw new ExceptionMedidaEstanteria('Medida no válida. ',0 ,null, $anchura);
        }
        else if($anchura >250){
            throw new ExceptionMedidaEstanteria('Medida no válida', 1, null, $anchura);
        }
        else{
            $this->anchura = $anchura;
        }
    }

    function setAltura($altura) {
        if($altura < 10){
            throw new ExceptionMedidaEstanteria('Medida no válida. ',0 ,null, $altura);
        }
        else if($altura > 250){
            throw new ExceptionMedidaEstanteria('Medida no válida', 1, null, $altura);
        }
        else{
            $this->altura = $altura;
        }
    }

    function setProfundidad($profundidad) {
        if($profundidad < 10){
            throw new ExceptionMedidaEstanteria('Medida no válida. ',0 ,null, $profundidad);
        }
        else if($profundidad > 250){
            throw new ExceptionMedidaEstanteria('Medida no válida', 1, null, $profundidad);
        }
        else{
            $this->profundidad = $profundidad;
        }
    }

    function getNumLejas() {
        return $this->numLejas;
    }

    function setNumLejas($totalEstantes) {
        if ($totalEstantes >= 1){
            $this->numLejas = $totalEstantes;
        }
        else{
            throw new ExceptionMedidaEstanteria('Cantidad errónea. ',2 ,null, $totalEstantes);
        }
    }

    function __toString() {
        $str = "";
        $str .= "Estanteria $this->codigo de: ".$this->material.'<br>';//" en el pasillo: ".$this->pasillo;
//        foreach($this->estructura as $i => $caja){
//            //En cada posición del array muestra el toString de cada caja.
//            $str .= "En el nº $i: ".$caja."<br>";
//        }
        return $str;
    }
    
    //GESTION DE CAJAS EN LA ESTRUCTURA---->
    function addCaja($box,$shelf){
        $this->cajasColocadas[$shelf] = $box;
    }

    function addCajasOrdenadas($boxes){
        $this->cajasColocadas = $boxes;
    }
    
    function getCajasColocadas() {
        return $this->cajasColocadas;
    }
    
//    function setEstructura($estructura){ 
//        $this->estructura = $estructura;
//    }

//    function getEstructura() {
//        return $this->estructura;
//    }

//    function OrdenVoluntario($caja, $estante){
//        if($this->totalEstantes === 0){
//            throw new ExceptionMedida('Estantería llena');
//        }
//        else{
//        $this->estructura[$estante] = $caja;
//        $this->totalEstantes --;
//        }
//    }

//    function OrdenAleatorio($caja){
//        if($this->altura > $caja->getAltura() && $this->anchura > $caja->getAnchura() && $this->profundidad > $caja->getProfundidad())
//        {
//            if($this->numLejas < 1){
//                throw new ExceptionMedidaEstanteria('Error de almacenamiento', -1, null, $this->numLejas);
//            }
//            else{
//               // array_push($caja);
//                $this->estructura[] = $caja;
//                $this->numLejas --;
//            }
//        }
//        else{
//           // throw new ExceptionMedida('La caja no encaja.');
//        }
//    }


    
    
    
    
}
