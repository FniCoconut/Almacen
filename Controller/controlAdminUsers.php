<?php

include_once '../Model/Usuario.php';

session_start();
$userBDDD = $_SESSION['USER'];


if ( isset($_REQUEST['adminUsers']) ){
$variable = $_REQUEST['adminUsers'];
}else{
    header('Location: ../View/principal.php');
}



$introduced = $_REQUEST['actualPass'];





if( isset($_REQUEST['repNewPass']) ){
    
}

if( isset($_REQUEST['newPass']) ){
    
}

if( isset($_REQUEST['rol']) ){
    
}

if( isset($_REQUEST['nombre']) ){
    
}


switch ($variable) {
    case 'editUser':
        
        
        break;

    case 'deleteUser':
        
        
        break;
    
    case 'addUser':
        
        
        break;
    
    case 'changePass':
        
        
        break;
    default:
        break;
}














