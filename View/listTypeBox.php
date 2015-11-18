<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Almacenes Moreno</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Almacén" />
        <link rel="stylesheet" href="css/styleG.css" type="text/css" />
        <!--<link rel="stylesheet" href="css/styleTags.css" type="text/css" />-->
        <link rel="stylesheet" href="css/elementStyle.css" type="text/css" />
        <link rel="shortcut icon" href="img/favicon.ico">
        <script src="js/jquery.js"></script>
        <?php 
        include_once '../Model/CajaSorpresa.php';
        include_once '../Model/CajaFuerte.php';
        include_once '../Model/CajaNegra.php';

        session_start();
        $typeBox = $_REQUEST['boxType'];
        $column = $_REQUEST['column'];
        //bcontent=Placa Base&secContent=Cerradura&sContent=Contenido
        $arrayBoxes = $_SESSION['BOX_TYPE'];
        
        ?>
    </head>
    <body>
      <header class="head-style"><img src="img/logo-almacen.png" alt="Logo" />
        <span class="head-title">Almacén</span>
      </header>
        <div class="principal-content list-content inventory">
            <table border="1px solid">
                <thead>
                    <tr>
                        <td colspan="8">Listado de <?php echo $typeBox ?></td>
                    </tr> 
                    <tr>
                        <td colspan="3">Dimensiones caja</td>
                        <td rowspan="2">Color</td>
                        <td rowspan="2"><?php echo $column; ?></td>
                        <td rowspan="2">Fecha de entrada</td>
                        <td rowspan="2">Estantería</td>
                        <td rowspan="2">Leja</td>
                    </tr>
                    <tr>
                        <td>Alto</td>
                        <td>Ancho</td>
                        <td>Profundidad</td>
                    </tr>
                </thead>  
                <tbody>
                <?php
                foreach ($arrayBoxes as $shelve=>$arrayShelf) { 
                    foreach($arrayShelf as $shelf=>$cajas) { ?>
                    <tr>
                        <td><?php echo $cajas->getAltura(); ?></td>
                        <td><?php echo $cajas->getAnchura(); ?></td>
                        <td><?php echo $cajas->getProfundidad(); ?></td>
                        <td style="background-color: <?php echo $cajas->getColor().';'; ?>"></td>
                        <td><?php echo $cajas->getDatoBDD(); ?></td>
                        <td><?php echo $cajas->getFecha_alta(); ?></td>
                        <td><?php echo $shelve; ?></td>
                        <td><?php echo $shelf; ?></td>
                    </tr>
                <?php } } ?>
                </tbody>
            </table>
            <button class="btn-gestion" onclick="window.location.href='principal.php#almacen'">Volver a Gestion</button> <button class="btn-gestion" onclick="window.location.href='principal.php'">Volver al Inicio</button></div>
    </body>
</html>
