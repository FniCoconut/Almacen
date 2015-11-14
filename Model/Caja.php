<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Caja
 *
 * @author Coconut
 */
include_once "../Controller/Exception/ExceptionMedidaCaja.php";

//function color_valid($color){
//    for($i = 0, $flag = 0 ; $i < strlen($color) && $flag === 0 ; $i++){
//            $NOpermitidos="0123456789";
//            if(!strpos($NOpermitidos, substr($color,$i,1))){
//                $flag = 0;
//            }
//            else{
//                $flag = 1;
//            }
//        }
//        if( $flag === 0){
//            return $color;
//            //$this->color = $color;
//        }
//        else{
//            return 'No permitidos códigos numéricos de colores. ';
//        }
//        //fin comprobación color
//}

abstract class Caja {
    //Propiedades.
    private $codigo;
    private $altura;
    private $anchura;
    private $profundidad;
    private $color;
//    private $estanteria;
//    private $leja;
    private $fecha_alta;
    
    //Constructor, solo uno, no admite sobrecarga.
    function __construct($altura, $anchura, $profundidad, $_color, $date) {
        
        $this->altura = $altura;
        $this->anchura = $anchura;
        $this->profundidad = $profundidad;
        $this->color = $_color;
//        $this->estanteria = $_estanteria;
//        $this->leja = $_leja;
        $this->fecha_alta = $date;
    }
                
    //Métodos.
    
    function getCodigo() {
        return $this->codigo;
    }

//    function getEstanteria() {
//        return $this->estanteria;
//    }
//
//    function getLeja() {
//        return $this->leja;
//    }

    function getFecha_alta() {
        return $this->fecha_alta;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

//    function setEstanteria($estanteria) {
//        $this->estanteria = $estanteria;
//    }
//
//    function setLeja($leja) {
//        $this->leja = $leja;
//    }

    function setFecha_alta($fecha_alta) {
        $this->fecha_alta = $fecha_alta;
    }

    function getColor() {
        return $this->color;
    }

    function setColor($_color) {
            $this->color = $_color;
    }
        
    function getAltura() {
        return $this->altura;
    }

    function getAnchura() {
        return $this->anchura;
    }

    function getProfundidad() {
        return $this->profundidad;
    }

    function setAltura($altura) {
//        if($altura <= 10){
//            throw new ExceptionMedidaCaja('Altura no válida. ',0 ,null ,$altura);
//        }
//        else if ($altura >= 200){
//            throw new ExceptionMedidaCaja('Altura no válida. ',1 ,null ,$altura);
//        }
//        else{
            $this->altura = $altura;
//        }
    }

    function setAnchura($anchura) {
//        if($anchura <= 10){
//            throw new ExceptionMedidaCaja('Anchura no válida. ',0 ,null ,$anchura);
//        }
//        else if ($anchura >= 250){
//            throw new ExceptionMedidaCaja('Anchura no válida. ',1 ,null ,$anchura);
//        }
//        else{
            $this->anchura = $anchura;
//        }
    }

    function setProfundidad($profundidad) {
//        if($profundidad <= 10){
//            throw new ExceptionMedidaCaja('Profundidad no válida. ',0 ,null , $profundidad);
//        }
//        else if ($profundidad >= 250){
//            throw new ExceptionMedidaCaja('Profundidad no válida. ',1 ,null ,$profundidad);
//        }
//        else{
            $this->profundidad = $profundidad;
//        }
    }

    public function __toString() {
        $str ="";
        
        
    }

    abstract function calcVolume();
    
    
}
