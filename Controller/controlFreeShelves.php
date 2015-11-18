<?php

include_once '../DAO/OperationShelve.php';
include_once '../Model/Estanteria.php';

session_start();

$freeShelves = OperationShelve::freeShelves(); //get available Shelves for save boxes in.

$_SESSION['FREE_SHELVES'] = $freeShelves;

    $str = "<option>Selecciona estanteria</option>";

    foreach ($freeShelves as $shelve) {

        $libres = $shelve->getNumLejas() - $shelve->getOcupados();
        $str .= "<option value='".$shelve->getCodigo()."'>Estanteria: ".$shelve->getCodigo()." en pasillo: ".$shelve->getPasillo()." con ".$libres." lejas libres.</option>";
    }
    
    print_r($str);

