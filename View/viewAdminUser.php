<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="../View/css/styleG.css" type="text/css" />
        <link rel="stylesheet" href="../View/css/elementStyle.css" type="text/css" />
        <link rel="stylesheet" href="../View/font-awesome-4.4.0/css/font-awesome.min.css" type="text/css" />
        <link rel="shortcut icon" href="img/favicon.ico">
        <script src="../View/js/Ajax.js"></script>
        <script src="../View/js/indexFunction.js"></script>
        <?php 
        include_once '../Model/Usuario.php';

    session_start();

    $user = $_SESSION['USER'];
    $permiso = $user->getPermiso();
        ?>
    </head>
    <body>
    <header class="head-style"><img src="../View/img/logo-almacen.png" alt="Logo" />
        <span class="head-title">Almacén</span>
        <div class="sesion"><i class="fa fa-arrow-left fa-3x" onclick="window.location.href='principal.php'"></i></div>
    </header>
        <div class="principal-content">
<!--  onsubmit="return login()" -->
    <?php if( $permiso == 2){ ?>
        
        <form id="adminUsuarios" action="../Controller/controlAdminUsers.php" method="post" class="admin form manage-form">
            <span class="section-title"><i class="fa fa-user icono"></i><?php echo $user->getIdUsuario(); ?></span>
            <br>
            <label for="contrasena"><i class="fa fa-key icono"></i></i>Contraseña</label>
            <input type="password" placeholder="contraseña" class="acceso" id="pass" name="actualPass" required>
            
            <br><br>
            <input type="radio" name="adminUsers" id="eU" value="editUser" onchange="makeAdminFields(this.id);" /><label for="eU">Editar usuario existente.</label><br>
            <input type="radio" name="adminUsers" id="dU" value="deleteUser" onchange="makeAdminFields(this.id);" /><label for="dU">Dar de baja a un usuario.</label><br>
            <input type="radio" name="adminUsers" id="aU" value="addUser" onchange="makeAdminFields(this.id);" /><label for="aU">Añadir un usuario</label><br>
            <input type="radio" name="adminUsers" id="cP" value="changePass" onchange="makeAdminFields(this.id);" /><label for="aU">Cambiar mi contraseña</label><br><br>
            <div id="mensaje"></div>
            <div id="elementosAdminUsers"></div>
            <input type="submit" value="¡Hecho!" id="cambioPass"/>
        </form>
      
    <?php
    }else{ ?>
            <form id="cuentaUsuarios" action="../Controller/controlBasicUsers.php" class="usuarios" method="post">
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
    <?php } ?>
        </div>
    </body>
</html>

