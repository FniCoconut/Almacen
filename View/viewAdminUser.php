<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="../View/css/styleG.css" type="text/css" />
        <link rel="stylesheet" href="../View/css/elementStyle.css" type="text/css" />
        <link rel="stylesheet" href="../View/font-awesome-4.4.0/css/font-awesome.min.css" type="text/css" />
        <script src="../View/js/Ajax.js"></script>
        <script src="../View/js/indexFunction.js"></script>
        <?php 
        include_once '../Model/Usuario.php';

    session_start();

    $user = $_SESSION['USER'];
        ?>
    </head>
    <body>
            <header class="head-style"><img src="../View/img/logo-almacen.png" alt="Logo" />
      <span class="head-title">Almacén</span>
    </header>
        <div class="principal-content">
<!--  onsubmit="return login()" -->
            <form id="cuentaUsuarios" action="../Controller/controlAdminUsers.php" class="usuarios" post="post">
                <label for="nomUsuario"><i class="fa fa-user icono"></i><?php echo $user->getIdUsuario(); ?></label>
                <br><br>
                <input type="hidden" value="<?php echo $user->getIdUsuario(); ?>" name="usuario" />
                <label for="contrasena"><i class="fa fa-key icono"></i></i>Contraseña actual</label>
                <br>
                <input type="password" placeholder="contraseña" class="acceso" id="contrasena" name="actualPass">
                <br><br>
                <label for="nueva"><i class="fa fa-key icono"></i></i>Contraseña nueva</label>
                <br>
                <input type="password" placeholder="contraseña" class="acceso" id="nueva" name="newPass">
                <br><br>
                <label for="nueva"><i class="fa fa-key icono"></i></i>Repita la contraseña nueva</label>
                <br>
                <input onblur="validaPassword(this.value)" type="password" placeholder="contraseña" class="acceso" id="repNueva" name="repNewPass">
                <br><div id="mensaje"></div><br>
                <button class="acceso" id="cambioPass">Cambiar contraseña <i class="fa fa-sign-in"></i></button>
                <!--<input type="submit" value="¡Entrar al almacén!" class="acceso" />-->
            </form>

        </div>
    </body>
</html>

