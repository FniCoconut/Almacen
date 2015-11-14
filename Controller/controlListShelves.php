<?php
include_once '../DAO/OperationShelve.php';
include_once '../Model/Estanteria.php';
    session_start();
    $allShelves = OperationShelve::getShelves();
    //aqui los objetos estan generados desde el método de la capa DAO
    $allCorridors = OperationShelve::getCorridor();
    $i = 0;
    foreach ($allCorridors as $way){
       foreach ($allShelves as $shelve){
           
           if($way === $shelve->getPasillo()){
               $_SESSION['ALL_SHELVES']["$way"][$i] = $shelve;
            $i++;
           }
       }
       $i = 0;
    }
 
    header('Location: ../View/listShelves.php');
