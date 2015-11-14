<?php

include_once '../DAO/OperationShelve.php';
include_once '../Model/Estanteria.php';

session_start();

$freeShelves = OperationShelve::freeShelves(); //get available Shelves for save boxes in.

$_SESSION['FREE_SHELVES'] = $freeShelves;

//print_r(json_encode($freeShelves));
    $str = "<option>Selecciona estanteria</option>";

    foreach ($freeShelves as $shelve) {

        $libres = $shelve->getNumLejas() - $shelve->getOcupados();
        $str .= "<option value='".$shelve->getCodigo()."'>Estanteria: ".$shelve->getCodigo()." en pasillo: ".$shelve->getPasillo()." con ".$libres." lejas libres.</option>";
    }
    
    print_r($str);


//include_once '../DAO/Operation.php';
//include_once '../Model/Estanteria.php';
//
//session_start();
//
//$freeShelves = Operation::freeShelves(); //get available Shelves for save boxes in.
//
//$_SESSION['FREE_SHELVES'] = $freeShelves;
//
////json_encode($freeShelves);
//
//$idShelves = array();
//$corridor = array();
//$open = array();
//
//    foreach ($freeShelves as $shelve) {
//        $idShelves[] = $shelve->getCodigo();
//    }
////json_encode($idShelves);
////$option['id'] = $idShelves;
////$option['corridor'] = $corridor;
////$option['notbooked'] = $open;
////    $blubli = implode("", $option);
//json_encode($idShelves);