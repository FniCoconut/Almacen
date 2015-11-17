<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../Model/Usuario.php';

    session_start();

    $user = $_SESSION['USER'];

    $user = $_REQUEST['usuario']; //usuario
    $actualPass = $_REQUEST['actualPass'];//actualPass
    $newPass = $_REQUEST['newPass'];//newPass

//hash almacenado
    
//hash actualPass
    
//hash newPass
