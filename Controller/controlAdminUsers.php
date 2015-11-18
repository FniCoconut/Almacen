<?php

include_once '../Model/Usuario.php';
include_once '../DAO/OperationUser.php';

session_start();
$userALFA = $_SESSION['USER'];
$saltAlfa =  $userALFA->getSalt();

if ( isset($_REQUEST['adminUsers']) ){
$variable = $_REQUEST['adminUsers'];
}else{
    header('Location: ../View/principal.php');
}
$introduced = $_REQUEST['actualPass'];

//actual hash
$ha = $userALFA->getAutenticacion();
//introduced pass hash
$hi = sha1(md5($introduced, $userALFA->getSalt()));


if( $ha != $hi){
    header('Location: ../index.php');
}else{

    if( isset($_REQUEST['nombre']) ){
        $id = $_REQUEST['nombre'];
    }
    
    if( isset($_REQUEST['rol']) ){
        $rol = $_REQUEST['rol'];
        if($rol == 'gern'){$perm = 1;}
        if($rol == 'empl'){$perm = 0;}
    }else{
        $userMod = OperationUser::getUsers($id);
        $rol = $userMod->getSalt();
    }

    if( isset($_REQUEST['newPass']) ){
        $rnp = $_REQUEST['newPass'];
        //new hass
        $hn = sha1(md5($rnp,$rol));
    }

    switch ($variable) {
        case 'editUser':
            OperationUser::editUser($id, $hn);
            header('Location: ../View/principal.php');
            break;

        case 'deleteUser':
            OperationUser::delUser($id, $rol);
            header('Location: ../View/principal.php');
            break;

        case 'addUser':
            $user = new Usuario($id, $hn, $rol, $perm);
            OperationUser::addUser($user);
            header('Location: ../View/principal.php');
            break;

        case 'changePass':
            OperationUser::editUser($userALFA->getIdUsuario(), $hn);
            header('Location: ../View/principal.php');
            break;
        default:
            break;
    }

}












