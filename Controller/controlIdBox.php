<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../DAO/OperationBox.php';
include_once '../Model/CajaSorpresa.php';
include_once '../Model/CajaFuerte.php';
include_once '../Model/CajaNegra.php';

$typeBox = $_REQUEST['typeBox'];
$str = "<option>Selecciona Codigo</option>";

switch ($typeBox){
    case 'caja_sorpresa':
        $boxes = OperationBox::onlyBoxes($typeBox);
        foreach($boxes as $idBox){
            $str .= "<option value='".$idBox->getCodigo()."'>".$idBox->getCodigo()."</option>";
        }
        print_r($str);
        break;
    
    case 'caja_fuerte':
        $boxes = OperationBox::onlyBoxes($typeBox);
        foreach($boxes as $idBox){
            $str .= "<option value='".$idBox->getCodigo()."'>".$idBox->getCodigo()."</option>";
        }
        print_r($str);
        break;
    
    case 'caja_negra':
        $boxes = OperationBox::onlyBoxes($typeBox);
        foreach($boxes as $idBox){
            $str .= "<option value='".$idBox->getCodigo()."'>".$idBox->getCodigo()."</option>";
        }
        print_r($str);
        break;
    
    default:
        break;
    
}

