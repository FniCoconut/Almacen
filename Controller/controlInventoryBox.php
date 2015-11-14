<?php
/*
 * 
 * 
 */

include_once '../DAO/OperationBox.php';
session_start();

$typeBox = $_REQUEST['typeBox'];

switch ($typeBox){
    case 'tBox':
        $boxes['Contenido'] = OperationBox::getSurpriseBox();
        $boxes['Cerradura'] = OperationBox::getSecureBox();
        $boxes['Placa Base'] = OperationBox::getBlackBox();
        $_SESSION['BOX_TYPE'] = $boxes;
//        print_r($_SESSION['BOX_TYPE']);
        header("Location: ../View/listAllBoxes.php?bcontent=Placa Base&secContent=Cerradura&sContent=Contenido");
        break;
    
    case 'sBox':
        $_SESSION['BOX_TYPE'] = OperationBox::getSurpriseBox();
        header("Location: ../View/listTypeBox.php?boxType=cajas sorpresa&column=Contenido");
        break;
    case 'fBox':
        $_SESSION['BOX_TYPE'] = OperationBox::getSecureBox();
        header("Location: ../View/listTypeBox.php?boxType=cajas fuertes&column=Cerradura");
        break;
    case 'nBox':
        $_SESSION['BOX_TYPE'] = OperationBox::getBlackBox();
        header("Location: ../View/listTypeBox.php?boxType=cajas negras&column=Placa Base");
        break;
}
//$objectsArray;


