<?php
include_once '../DAO/OperationBox.php';

$option = $_REQUEST['caja'];
$alto = $_REQUEST['altura'];
$ancho = $_REQUEST['anchura'];
$profundidad = $_REQUEST['profundidad'];
if(isset($_REQUEST['color'])){$color = $_REQUEST['color'];}
else{$color = '#FF4401';}
$estanteria = $_REQUEST['shelve'];
$leja = $_REQUEST['shelf'];
$date = "fechaDelSistema";

//    list($estanteria, $leja) = explode(":", $localizacion);
    
switch ($option){
    case 'c_sorpresa':
        include_once "../Model/CajaSorpresa.php";
        
        $type = 'Caja Sorpresa';
        $content = $_REQUEST['content'];
        $surprise_box = new CajaSorpresa($alto, $ancho, $profundidad, $color, $date, $content, $type);
        $ocupacion = new Ocupacion($estanteria, $leja, $type);
        
        OperationBox::addSurpriseBox($surprise_box, $ocupacion);
        
        break;
    case 'c_fuerte':
        include_once "../Model/CajaFuerte.php";
        
        $type = 'Caja Fuerte';
        $lock = $_REQUEST['lock'];
        $secure_box = new CajaFuerte($alto, $ancho, $profundidad, $color, $date, $lock, $type);
        $ocupacion = new Ocupacion($estanteria, $leja, $type);
        
        OperationBox::addSecureBox($secure_box, $ocupacion);
        break;
    case 'c_negra':
        include_once "../Model/CajaNegra.php";
        
        $type = 'Caja Negra';
        $placaB = $_REQUEST['p-base'];
        $black_box = new CajaNegra($alto, $ancho, $profundidad, $color, $date, $placaB, $type);
        $ocupacion = new Ocupacion($estanteria, $leja, $type);
        
        OperationBox::addBlackBox($black_box, $ocupacion);
        break;
    
}

