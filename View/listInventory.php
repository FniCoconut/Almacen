<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/styleG.css" type="text/css" />
        <link rel="stylesheet" href="css/elementStyle.css" type="text/css" />
    <title></title>
        <?php
        include_once '../Model/Estanteria.php';
        include_once '../Model/CajaFuerte.php';
        include_once '../Model/CajaNegra.php';
        include_once '../Model/CajaSorpresa.php';
        include_once '../Model/Ocupacion.php';
        include_once '../Model/Inventario.php';
        session_start();
        $invenatrio = $_SESSION['INVENTORY']; 
        $arrayShelves = $invenatrio->getEstanterias();
        ?>
    </head>
    <body>
      <header class="head-style"><img src="img/logo-almacen.png" alt="Logo" />
        <span class="head-title">Almacén</span>
      </header>
        <div class="principal-content list-content">
        <span>Inventario a fecha: <?php echo $invenatrio->getFecha(); ?></span>
            <div class="inventory">
            <?php 
            if ( isset($arrayShelves) ){
            foreach($arrayShelves as $shelve){
                $arrayBoxes = $shelve->getCajasColocadas();
                if (count($arrayBoxes) > 0 ){
                ?>
            
            <div>
                <span>Estantería <?php echo $shelve->getCodigo(); ?> en <?php echo $shelve->getPasillo(); ?> contiene:</span>
                <ul>
                <?php
                foreach( $arrayBoxes as $index=>$box ){ 
                if ( $box instanceof CajaFuerte){ ?>
                    <li>Leja <?php echo $index ?> : Caja Fuerte <?php echo $box->getCodigo(); ?> con dimensiones: <?php echo $box->getAltura(); ?> x <?php echo $box->getAnchura(); ?> x <?php echo $box->getProfundidad(); ?> tipo de cerradura: <?php echo $box->getCerradura(); ?> dada de alta el: <?php echo $box->getFecha_alta(); ?></li>
                <?php } else if ( $box instanceof CajaNegra){ ?>
                    <li>Leja <?php echo $index ?> : Caja Negra <?php echo $box->getCodigo(); ?> con dimensiones: <?php echo $box->getAltura(); ?> x <?php echo $box->getAnchura(); ?> x <?php echo $box->getProfundidad(); ?> placa base: <?php echo $box->getPlaca(); ?> dada de alta el: <?php echo $box->getFecha_alta(); ?></li>
                <?php } else if ( $box instanceof CajaSorpresa){ ?>
                    <li>Leja <?php echo $index ?> : Caja Sorpresa <?php echo $box->getCodigo(); ?> con dimensiones: <?php echo $box->getAltura(); ?> x <?php echo $box->getAnchura(); ?> x <?php echo $box->getProfundidad(); ?> contenido: <?php echo $box->getContenido(); ?> dada de alta el: <?php echo $box->getFecha_alta(); ?></li>
                <?php }
                }?>
                </ul>
            </div>
                <?php }else{ ?>
            <div>
                <!--<span>Estantería <?php // echo $shelve->getCodigo(); ?> en <?php // echo $shelve->getPasillo(); ?> vacía.</span>-->
            </div>
                <?php }
            }  }  else{ ?>
                <span> No hay elementos en el inventario. </span>
            </div>
            <?php
            }  ?>
            <button class="btn-gestion"><a href="principal.php#almacen">Volver a Gestion</a></button> <button class="btn-gestion" ><a href="principal.php">Volver al Inicio</a></button>
        </div>
    </body>
</html>
