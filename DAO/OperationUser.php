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
include_once '../Model/Usuario.php';

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
    
    public static function editUser($user, $newPass){
        global $conection;
        $conection->beginTransaction();
        
        $result = $conection->query("UPDATE dbalmacen2.usuarios SET AUTENTICACION='$newPass' WHERE ID_USUARIO='$user';");
        if ( !$result ){
            $conection->rollback();
//            return false;
        }else{
            $conection->commit();
//            return true;
        }
    }
    
    public static function addUser($user){
        global $conection;
        
        $id = $user->getIdUsuario();
        $hash = $user->getAutenticacion();
        $salt = $user->getSalt();
        $perm = $user->getPermiso();
        
        $conection->beginTransaction();
        
        $result = $conection->query("INSERT INTO dbalmacen2.usuarios VALUES('$id', '$hash', '$salt', $perm);");
        if ( !$result ){
            $conection->rollback();
//            return false;
        }else{
            $conection->commit();
//            return true;
        }
    }
    
    public static function getUsers(){
        global $conection;
        $arrayUsers = array();
        $result = $conection->query("");
        if($result != false){
            while( $user = $result->fetch() ){
                $arrayUsers[] = new Usuario($user['ID_USUARIO'], $user['AUTENTICACION'], $user['SALT'], $user['PERMISO']);
            }
        }
        return $arrayUsers;
    }
    
    public static function delUser($id, $rol){
        global $conection;
        
        $conection->beginTransaction();
        
        $result = $conection->query("DELETE FROM dbalmacen2.usuarios WHERE ID_USUARIO = '$id' AND SALT = '$rol';");
        if ( !$result ){
            $conection->rollback();
//            return false;
        }else{
            $conection->commit();
//            return true;
        }        
        
    }
    
    
}
