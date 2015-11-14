<?php

/*DISPATCHER GESTION
 * 
 * encargado de derivar cada opción 
 * al script controlador engargado de 
 * la acción correspondiente.
 */

//session_start();
$redirection = $_REQUEST['rGestion']; 

    switch ($redirection){
        case 'listShelves':
            header('location: controlListShelves.php');
            //Operation::getShelves()
            break;

        case 'inventoryTypeBox':
            if(isset($_REQUEST['typeBox'])){ $typeBox = $_REQUEST['typeBox']; }
            else{header('Location: ../View/principal.php#almacen');}
            header("location: controlInventoryBox.php?typeBox=$typeBox");
            break;
        
        case 'inventoryCorridor';
            header('Location: controlInventoryCorridor.php');
            break;
        
        case 'deleteBox':
            header('Location: ../View/viewDeleteBox.php');
            break;
        
        case 'returnBox':
            header('Location: ../View/viewReturnBox.php');
            break;
        
        default:
            header('Location: ../View/principal.php#almacen');
            break;
    }
