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
      <header class="head-style"><img src="img/logo-almacen.png" alt="Logo" />
        <span class="head-title">Almacén</span>
      </header>
          <div class="principal-content list-content inventory">
            <span id="manage-title" class="section-title">Salida de cajas del almacén</span>
                <br>
            <div class="form manage-form ">
                <label for="deleteType">Tipo de caja vendida</label>
                <select name="deleteType" id="typeBoxDeleted" onchange="deleteTypeBox(this.value)">
                    <option>Selecciona Tipo de caja</option>
                    <option value="caja_sorpresa">Caja Sorpresa</option>
                    <option value="caja_negra">Caja Negra</option>
                    <option value="caja_fuerte">Caja Fuerte</option>
                </select>
                <br>
                <label for="idBox">Código de caja vendida</label>
                <br>
                <!--<input type="number" min="0" id="idBoxDelete" onblur="" required/>-->
                <input name="idBox" id="idBoxDel" list="idBoxDelete">
                <datalist id="idBoxDelete">
                    <option>Selecciona Codigo</option>
                </datalist>
                <br>
                <button onclick="secureDeleteBox(typeBoxDeleted.value, idBoxDel.value)">¡Eliminar!</button>
            </div>
            
              
                <button class="btn-gestion" onclick="window.location.href='principal.php#almacen'">Volver a Gestion</button> <button class="btn-gestion" onclick="window.location.href='principal.php'">Volver al Inicio</button>
          </div>
    </body>
</html>