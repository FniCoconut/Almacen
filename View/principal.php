<!DOCTYPE html>
<html>
  <head>
    <title>Almacenes Moreno</title>
    <meta charset="utf-8"/>
    <meta name="description" content="Almacén" />
    <link rel="stylesheet" href="css/styleG.css" type="text/css" />
    <link rel="stylesheet" href="css/styleTags.css" type="text/css" />
    <link rel="stylesheet" href="css/elementStyle.css" type="text/css" />
    <link rel="stylesheet" href="font-awesome-4.4.0/css/font-awesome.min.css" type="text/css" />
    <script src="js/Ajax.js"></script>
    <script src="js/indexFunction.js"></script>
    <?php 
//    if(session_start()){
//    session_destroy();} 
    include_once '../Model/Usuario.php';

    session_start();

    $user = $_SESSION['USER'];
    ?>
    
    <script>
        var permPHP = "<?php echo $user->getPermiso(); ?>";
        permPHP = parseInt(permPHP);
        window.onload = function(){
            permiso(permPHP);
        }
    </script>
  </head>
   <!-- onload="permiso(<?php // echo $user->getPermiso(); ?>)" -->
  <body>
    <header class="head-style"><img src="img/logo-almacen.png" alt="Logo" />
      <span class="head-title">Almacén</span>
      <div class="sesion" id="miniUsuario"><?php echo $user->getIdUsuario() ?> <br> <i class="fa fa-bars icono" onclick="menuUsuario();"></i></div>
    </header>
    <div class="principal-content">
        <div class="introUsuario" id="infoUsuario">
            <span>Has entrado como <?php echo $user->getIdUsuario() ?> .</span>
        </div>
        
    <!--  SECCION ESTANTERIA --- SECCION ESTANTERIA  --> 
        <span class="hidden-span" id="estanteria">estanteria</span>
        <div class="tab">
            <a href="#estanteria" onclick="basicElements()"><span id="shelves-title" class="tab-link"><i class="fa fa-th icono"></i>Crear Estantería</span></a>
            <div class="panel" id="p-shelve">
                <span class="section-title">Nueva estantería</span><br>
                <form action="../Controller/makeShelves.php" name="shelve" id="insert-shelves" class="form" method="post">
                    <label for="lejas">Nº de lejas</label>
                    <input type="number" name="lejas" id="n-lejas" min="2" max="10" required>
                    <br>
                    <label for="material">Material de estantería</label>
                    <select name="material" id="material" required></select>
                    <br>
                    <label for="pasillo">Pasillo</label>
                    <select name="pasillo" id="pasillo-estanteria" required onchange="positionAt(this.value)"></select>
                    <br>
                    <label for="num-pasillo">Número</label>
                    <select name="num-pasillo" id="num-pasillo" required></select>
                    <br>
                    <input type="submit" value="¡crear!" name="crear">
                </form>
                </div>
            </div>
    
    <!--  SECCION CAJA --- SECCION CAJA  -->      
        <span class="hidden-span" id="caja">caja</span>
        <div class="tab">
            <a href="#caja"><span class="tab-link" ><i class="fa fa-archive icono"></i>Crear Caja</span></a>
            <div class="panel p-box">
                <span id="box-title" class="section-title">Nueva caja</span>
                <br>
                <form action="../Controller/makeBox.php" name="box" id="insert-box" class="form" method="post">
                    <label for="box-type">Tipo de caja</label>
                    <select name="caja" id="t-caja" onchange="makeFormBox(this.value)" onclick="preparingShelves()" required>
                        <option>--</option>
                        <option value="c_sorpresa">Caja Sorpresa</option>
                        <option value="c_fuerte">Caja Fuerte</option>
                        <option value="c_negra">Caja de Negra</option>
                    </select>
                    <br>
                    <label for="altura">Altura</label><input type="number" name="altura" min="10" max="250" required />cm<br>
                    <label for="anchura">Anchura</label><input type="number" name="anchura" min="10" max="250" required />cm<br>
                    <label for="profundidad">Profundidad</label><input type="number" name="profundidad" min="10" max="250" required />cm<br>
                    <label for="color">Color</label><input type="color" id="colorp" name="color" value="#FF4401" /><br>
                    <label for="shelve">Localizacion</label>
                    <div id="localizacion">    
                        <select name="shelve" id="loc-caja" onchange="preparingShelf(this.value)" required>
                            <option>Selecciona Estanteria</option>
                        </select>
                        <select name="shelf" id="leja-caja">
                            <option>Selecciona Leja</option>
                        </select>
                    </div>
                    <br>
                    <div id="box-type"></div>
                    
                    <input type="submit" value="¡crear!" name="crear">
                </form>
                
            </div>  
            
        </div>
        
        <span class="hidden-span" id="almacen">almacen</span>
        <div class="tab">
            <a href="#almacen"><span class="tab-link"><i class="fa fa-cogs icono"></i>Gestión</span></a>
            <div class="panel p-admin">
                <span id="manage-title" class="section-title">Gestión del almacen</span>
                <br>
                <form action="../Controller/dispatcherGestion.php" method="post" name="gestion" class="form manage-form">
                    <input type="radio" name="rGestion" value="listShelves"/><label for="rGestion">Listar estanterias.</label><br>
                    <input type="radio" name="rGestion" value="inventoryTypeBox" onclick="makeGestionBox()" /><label for="rGestion">Inventario de cajas por tipo.</label><!-- Aquí se genera un select con las options name ="typeBox"--><br>
                        <div id="box-type-list"></div>
                    <input type="radio" name="rGestion" value="inventoryCorridor"/><label for="rGestion">Inventario del almacén.</label><br>
                    <input type="radio" name="rGestion" value="deleteBox" id="delBoxGest"/><label for="rGestion">Eliminar caja.</label><br>
                    <input type="radio" name="rGestion" value="returnBox" id="retBoxGest"/><label for="rGestion">Devolucion caja.</label><br>
                    <input type="submit" value="Siguiente" name="menuGestionSubmit">
                </form>
            </div>
        </div>
        
    </div>  
    
  </body>
</html>