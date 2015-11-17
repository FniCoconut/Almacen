<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OperationUser
 *
 * @author Coconut
 */

include 'conexBBDD.php';
include '../Model/Usuario.php';

class OperationUser {
    
    public static function autentication($usuario){
        global $conection;
        $result = $conection->query("SELECT * FROM bdalmacen2.usuarios WHERE ID_USUARIO = '$usuario';");
        
        if($result == false){
            $validUser = "Usuario incorrecto";
        }
        else{
            while($user = $result->fetch()){
                $validUser = new Usuario($user['ID_USUARIO'], $user['AUTENTICACION'], $user['SALT'], $user['PERMISO']);
            }
        }
        return $validUser;
    }
    
//    public static function changePass($usuario, $newPass){
//        global $conection;
//        
//        
//        
//        $result = $conection->query("");
//        
//        
//    }
    
}
