<?php

include_once '../DAO/OperationShelve.php';

$option = $_REQUEST['option'];

switch ($option) {
    case 'material':
        $materials = OperationShelve::getMaterial();

        $str = "<option>Selecciona Material</option>";
        foreach ($materials as $value) {
            $str .= "<option value='".$value."'>".$value."</option>";
        }

        echo $str;

        break;
        
    case 'corridor':
        $available_corridor = OperationShelve::availableCorridor();
        
        $str = "<option>Selecciona Pasillo</option>";
        foreach ($available_corridor as $value) {
            $str .= "<option value='".$value."'>".$value."</option>";
        }

        echo $str;
        
        break;
        
    case 'position':
        $corridor = $_REQUEST['corridor'];
        $available_position = OperationShelve::getFreePositionAt($corridor);
        
        $str = "<option>Selecciona Posicion</option>";
        foreach ($available_position as $value) {
            $str .= "<option value='".$value."'>".$value."</option>";
        }

        echo $str;
        
        break;
    default:
        break;
}

    
    
