<?php

/*
 * I need all shelves and all boxes to compare 
 * the selves->codigo with the boxes->estanteria
 * 
 * 
 */
include_once '../DAO/OperationShelve.php';
include_once '../DAO/OperationBox.php';
include_once '../Model/Estanteria.php';
include_once '../Model/CajaFuerte.php';
include_once '../Model/CajaNegra.php';
include_once '../Model/CajaSorpresa.php';
include_once '../Model/Inventario.php';
session_start();

//Shelve with content
//all shelves:
$allShelves = OperationShelve::getShelves();
//all boxes:
//$allBlack = Operation::getBlackBox();
//$allSurprise = Operation::getSurpriseBox();
//$allSecurity = Operation::getSecureBox();

$shelvesInventory = array();
//$i=0;
foreach($allShelves as $shelve){
    $shelveWithBoxes[$shelve->getCodigo()] = new Estanteria($shelve->getNumLejas(), $shelve->getOcupados(), $shelve->getAnchura(), $shelve->getAltura(), $shelve->getProfundidad(), $shelve->getMaterial(), $shelve->getPasillo(), $shelve->getNumPasillo());
    $shelveWithBoxes[$shelve->getCodigo()]->setCodigo($shelve->getCodigo());
    $boxes = OperationBox::getBoxAt($shelve->getCodigo());
    $shelveWithBoxes[$shelve->getCodigo()]->addCajasOrdenadas($boxes);
}

$invenatrio = new Inventario(date('d-m-Y'), $shelveWithBoxes);

$_SESSION['INVENTORY'] = $invenatrio;
//print_r($_SESSION['INVENTORY']);
header('Location: ../View/listInventory.php');