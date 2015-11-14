<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../Model/Estanteria.php';
include_once '../DAO/OperationShelve.php';

//catch form's values:

$numLejas = $_REQUEST['lejas'];
$material = $_REQUEST['material'];
$pasillo = $_REQUEST['pasillo'];
$numero = $_REQUEST['num-pasillo'];

$estanteria = new Estanteria($numLejas, 0, 250, 500/$numLejas, 250, $material, $pasillo, $numero);
//Contructor concreto para añadir estanterias vacías en funcion del numero de lejas.
print_r($estanteria);

OperationShelve::addShelve($estanteria);