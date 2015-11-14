<?php

include_once '../DAO/OperationBox.php';

session_start();

$typeBox = $_REQUEST['typeBox'];
if(isset($_REQUEST['idBox'])){
    $idBox = $_REQUEST['idBox'];
}

if(isset($_REQUEST['shelve'])){
    $newShelve = $_REQUEST['shelve'];
}
if(isset($_REQUEST['shelf'])){
    $newShelf = $_REQUEST['shelf'];
}

if(!isset($_REQUEST['action']))
    {$action = 'reubica';}
else{
    $action = $_REQUEST['action'];    
    }
    
$str = "<option>Selecciona ID</option>";

switch ($action){
    
    case 'muestra':
//        returnBox($typeBox);
        switch ($typeBox) {
            case 'caja_sorpresa':
                $boxes = OperationBox::returnBox($typeBox);
                $_SESSION['BOXES'] = $boxes;
                foreach($boxes as $idBox){
                    $str .= "<option value='".$idBox->getCodigo()."'>".$idBox->getCodigo()."</option>";
                }
                print_r($str);
                break;

            case 'caja_fuerte':
                $boxes = OperationBox::returnBox($typeBox);
                $_SESSION['BOXES'] = $boxes;
                foreach($boxes as $idBox){
                    $str .= "<option value='".$idBox->getCodigo()."'>".$idBox->getCodigo()."</option>";
                }
                print_r($str);
                break;
            
            case 'caja_negra':
                $boxes = OperationBox::returnBox($typeBox);
                $_SESSION['BOXES'] = $boxes;
                foreach($boxes as $idBox){
                    $str .= "<option value='".$idBox->getCodigo()."'>".$idBox->getCodigo()."</option>";
                }
                print_r($str);
                break;
            
            default:
                break;
        }
        
        break;
    
    case 'reubica':
        
        switch ($typeBox) {
            case 'caja_sorpresa':
                $type = 'Caja Sorpresa';
                $boxes = $_SESSION['BOXES'];
            foreach( $boxes as $utilBox ){
                if( ($utilBox->getCodigo() == $idBox) ){
                    $booked = new Ocupacion($newShelve, $newShelf, $type);
                    OperationBox::addSurpriseBox($utilBox, $booked);
                    OperationBox::deleteBox('bkp_caja_sorpresa', $idBox);
                }
            }
                break;

            case 'caja_fuerte':
            $type = 'Caja Fuerte';
                $boxes = $_SESSION['BOXES'];
                foreach( $boxes as $utilBox ){
                if( ($utilBox->getCodigo() == $idBox) ){
                    $booked = new Ocupacion($newShelve, $newShelf, $type);
                OperationBox::addSecureBox($utilBox, $booked);
                OperationBox::deleteBox('bkp_caja_fuerte', $idBox);
                }
            }
                break;
            
            case 'caja_negra':
                $type = 'Caja Negra';
                $boxes = $_SESSION['BOXES'];
            foreach( $boxes as $utilBox ){
                if( ($utilBox->getCodigo() == $idBox) ){
                    $booked = new Ocupacion($newShelve, $newShelf, $type);
                    OperationBox::addBlackBox($utilBox, $booked);
                    OperationBox::deleteBox('bkp_caja_negra', $idBox);
                }
            }
                break;
            
            default:
                break;
        }
        
        break;
}
