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
    <script src="js/jquery.js"></script>
        <?php 
        include_once '../Model/Estanteria.php';
        session_start();
        if( isset($_SESSION['ALL_SHELVES'])){
        $all_Shelves = $_SESSION['ALL_SHELVES'];
        }  
        ?>
    </head>
    <body>
      <header class="head-style"><img src="img/logo-almacen.png" alt="Logo" />
        <span class="head-title">Almacén</span>
      </header>
          <div class="principal-content list-content inventory">
            <?php 
            if( isset($all_Shelves) ){
            
            foreach($all_Shelves as $pasillo=>$indice){  ?>  
              <table border="1px solid">
                  <thead>
                    <tr>
                      <td colspan="5">Listado de estanterías del pasillo <?php echo $pasillo; ?></td>
                    </tr>
                    <tr>
                      <td>Estanteria nº</td>
                      <td>Material</td>
                      <td>Lejas totales</td>
                      <td>Lejas ocupadas</td>
                      <td>Nº posición</td>
                    </tr>
                    </thead>
                <tbody>
                <?php                      
                foreach ($indice as $estanteria) { ?>
                    <tr>
                        <td> <?php echo $estanteria->getCodigo(); ?> </td>
                        <td> <?php echo $estanteria->getMaterial(); ?> </td>
                        <td> <?php echo $estanteria->getNumLejas(); ?> </td>
                        <td> <?php echo $estanteria->getOcupados(); ?> </td>
                        <td> <?php echo $estanteria->getNumPasillo(); ?></td>
                    </tr>
               <?php } ?>
                  </tbody>
              </table>
              <br>
            <?php } 
            }
            else{ ?>
              <span> No hay estanterías </span>
              <br>
            <?php    
            }
            ?>
              <button class="btn-gestion"><a href="principal.php#almacen">Volver a Gestion</a></button> <button class="btn-gestion" ><a href="principal.php">Volver al Inicio</a></button>
          </div>
    </body>
</html>
