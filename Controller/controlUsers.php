<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../DAO/OperationUser.php';
include_once '../Model/Usuario.php';

session_start();

if( !isset($_REQUEST['user']) || !isset($_REQUEST['pass'])){

    header('Location: ../index.php');

}else{
    $user = $_REQUEST['user'];
    $pass = $_REQUEST['pass'];

    $_SESSION['USER'] = OperationUser::autentication($user);
    $validUser = $_SESSION['USER'];

    //print_r($validUser);

    if ($validUser == "Usuario incorrecto"){
        header('Location: ../index.php');
    }
    else{
        $ubbdd = $validUser->getAutenticacion();
        $iUser = sha1(md5($pass, $validUser->getSalt()));

        if( $ubbdd == $iUser){
            header('Location: ../View/Principal.php');
        }
        else{
            header('Location: ../index.php');
        }
    }

}