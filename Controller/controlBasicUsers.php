<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../Model/Usuario.php';
include_once '../DAO/OperationUser.php';
    session_start();

    $userBBDD = $_SESSION['USER'];

    $user = $_REQUEST['usuario']; //usuario
    $actualPass = $_REQUEST['actualPass'];//actualPass
    $newPass = $_REQUEST['newPass'];//newPass

//hash almacenado
    $h1 = $userBBDD->getAutenticacion();
//hash actualPass
    $h2 = sha1(md5($actualPass, $userBBDD->getSalt()));
    
    if( $h1 == $h2 ){
     //hash newPass
        $hnew = sha1(md5($newPass, $userBBDD->getSalt()));
        OperationUser::editUser($user, $hnew);
        header('Location: ../View/principal.php');
    }else{
        header('Location: ../index.php');
    }

    
