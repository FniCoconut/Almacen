<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="View/css/styleG.css" type="text/css" />
        <link rel="stylesheet" href="View/css/elementStyle.css" type="text/css" />
        <link rel="stylesheet" href="View/font-awesome-4.4.0/css/font-awesome.min.css" type="text/css" />
        <link rel="shortcut icon" href="View/img/favicon.ico">
        <script src="View/js/Ajax.js"></script>
        <script src="View/js/indexFunction.js"></script>
        <?php 
            if(session_start()){
                session_destroy();} 
                ?>
    </head>
    <body>
            <header class="head-style"><img src="View/img/logo-almacen.png" alt="Logo" />
      <span class="head-title">Almacén</span>
    </header>
        <div class="principal-content">
<!--  onsubmit="return login()" -->
            <form id="EntradaUsuarios" action="Controller/controlUsers.php" class="usuarios" post="post">
                <label for="nomUsuario"><i class="fa fa-user icono"></i>Usuario</label>
                <br>
                <input type="text" placeholder="Nombre de usuario" class="acceso" id="nomUsuario" name="user">
                <br><br>
                <label for="contraseña"><i class="fa fa-key icono"></i></i>Contraseña</label>
                <br>
                <input type="password" placeholder="contraseña" class="acceso" id="contrasena" name="pass">
                <br><br>
                <button class="acceso">¡Entrar al almacén! <i class="fa fa-sign-in"></i></button>
                <!--<input type="submit" value="¡Entrar al almacén!" class="acceso" />-->
            
            </form>

        </div>
    </body>
</html>
