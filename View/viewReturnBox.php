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
    <script src="js/indexFunction.js"></script>
    <script src="js/Ajax.js"></script>
        
    </head>
    <body>
      <header class="head-style">
          <img src="img/logo-almacen.png" alt="Logo" />
        <span class="head-title">Almacén</span>
      </header>
          <div class="principal-content list-content inventory">
            <span id="manage-title" class="section-title">Retorno de cajas del almacén</span>
                <br>
                <form action="../Controller/controlReturnBox.php?action=reubica" class="form manage-form ">
                <label for="deleteType">Tipo de caja a devolver</label>
                <select name="typeBox" id="typeBoxReturned" onchange="returnTypeBox(this.value)" >
                    <option>Selecciona Tipo de caja</option>
                    <option value="caja_sorpresa">Caja Sorpresa</option>
                    <option value="caja_negra">Caja Negra</option>
                    <option value="caja_fuerte">Caja Fuerte</option>
                </select>
                <br>
                <label for="idBox">Código de caja a devolver</label>
                <br>
                <!--<input type="number" min="0" id="idBoxReturned" onclick="preparingShelvesReturn()" required/>-->
                <input name="idBox" list="idBoxReturned" onclick="preparingShelvesReturn()">
                <datalist id="idBoxReturned">
                    <option>Selecciona Codigo</option>
                </datalist>
                <br>
                <div id="bkpCaja"></div>
                <br>
                <div id="reubic">
                    <label for="shelve">Reubicación:</label>
                    <div id="localizacion">    
                        <select name="shelve" id="reubCaja" onchange="preparingShelfReturn(this.value)" required>
                            <option>Selecciona Estanteria</option>
                        </select>
                        <select name="shelf" id="reubLejaCaja">
                            <option>Selecciona Leja</option>
                        </select>
                    </div>
                </div>
                <input type="submit" name="submit" value="¡Reubicar!" />
                <!--<button onclick="secureReturnBox(typeBoxReturned.value, idBoxReturned.value, reubCaja.value, reubLejaCaja.value)">¡Reubicar!</button>-->
            </form>
            
           <button class="btn-gestion" onclick="window.location.href='principal.php#almacen'">Volver a Gestion</button> <button class="btn-gestion" onclick="window.location.href='principal.php'">Volver al Inicio</button></div>
    </body>
</html>