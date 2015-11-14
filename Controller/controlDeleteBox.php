<?php
include_once '../DAO/OperationBox.php';
include_once '../Model/CajaSorpresa.php';
include_once '../Model/CajaFuerte.php';
include_once '../Model/CajaNegra.php';

$typeBox = $_REQUEST['deleteType'];
$idBox = $_REQUEST['idBox'];
$action = $_REQUEST['action'];

switch($action){
    
    case 'searchBox':
        $arrayBox = array();
        $box = OperationBox::getBox($typeBox, $idBox);
        foreach ($box as $shelve=>$shelf){
            $arrayBox['ESTANTERIA'] = $shelve;
            foreach($shelf as $position=>$boxD){
                $arrayBox['LEJA'] = $position;
                $arrayBox['TIPO_CAJA'] = $boxD->getTipoCaja();
                $arrayBox['CODIGO'] = $boxD->getCodigo();
                if ($boxD instanceof CajaFuerte){
                    $arrayBox['CARACTERISTICA'] = 'Cerradura: '.$boxD->getCerradura();
                }else if($boxD instanceof CajaNegra){
                    $arrayBox['CARACTERISTICA'] = 'Placa Base: '.$boxD->getPlaca();
                }else if($boxD instanceof CajaSorpresa){
                    $arrayBox['CARACTERISTICA'] = 'Contenido: '.$boxD->getContenido();
                }              
                $arrayBox['DIMENSIONES'] = $boxD->getAltura().'Al. x '.$boxD->getAnchura().'An. x '.$boxD->getProfundidad().'Pr.';
                $arrayBox['COLOR'] = $boxD->getColor();
                $arrayBox['FECHA_ALTA'] = $boxD->getFecha_alta();
            }
        }
//        print_r($arrayBox);
//        json_encode($arrayBox);
        print_r(json_encode($arrayBox));
        break;
    
    case 'delete':
        
        switch ($typeBox){
            case 'caja_sorpresa':
                OperationBox::deleteBox($typeBox, $idBox);
                header('Location: ../View/principal.php#almacen');
                break;

            case 'caja_fuerte':
                OperationBox::deleteBox($typeBox, $idBox);
                header('Location: ../View/principal.php#almacen');
                break;

            case 'caja_negra':
                OperationBox::deleteBox($typeBox, $idBox);
                header('Location: ../View/principal.php#almacen');
                break;

            default:
                break;
        }
        break;

}
