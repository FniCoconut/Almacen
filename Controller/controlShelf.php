<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../DAO/OperationShelve.php';

$shelve = $_REQUEST['shelve'];

$numShelf = OperationShelve::getTotalAt($shelve);//numero de lejas totales de la estanteria
$shelvesBooked = OperationShelve::shelfAt($shelve);//numero de lejas ocupadas de dicha estanteria

foreach($shelvesBooked as $shelf){
    $shelfBooked[] = $shelf->getShelf();
    if(!isset($shelfBooked)){
        $shelfBooked[0] = -1;
    }
}

$str = "<option>Selecciona nivel</option>";
//print_r($shelvesBooked);
for ($i = 0 ; $i < $numShelf; $i++){//mientras que $i sea inferior a la cantidad de lejas
    if( !(in_array($i, $shelfBooked))){//si ese indice se encuentra en el array de ocupadas lo omite
       $str .= '<option value="'.$i.'">'.$i.'</option>';
    }
}

print_r($str);
