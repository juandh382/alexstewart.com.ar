<?php
include "db.php";
include "funciones.php";
$bandera = "";
$bandera2 = "";

if ($_REQUEST['llave'] != '' && isset($_REQUEST['llave']) && $_REQUEST['us'] != '' && isset($_REQUEST['us'])) {
    $consulta = "SELECT * FROM cambio_pass where keyss='" . mysqli_real_escape_string($mysqli, $_REQUEST['llave']) . "'  and estado='0'";
    $resultado = mysqli_query($mysqli, $consulta);
    $cantidad = mysqli_num_rows($resultado);
    if ($cantidad == 0) {
        $bandera2 = "caducado";
    }
    if ($cantidad > 1) {
        $bandera2 = "error";
    }
    if ($cantidad == 1) {
        $consulta_cambio = "Select c.id,c.pass_nuevo,c.pass_viejo,c.fecha_pedido,c.id_usuario, u.nombre_usuario from cambio_pass c, usuarios u where keyss='" . mysqli_real_escape_string($mysqli, $_REQUEST['llave']) . "' and u.id_usuario=c.id_usuario";
        $resultado_cambio = mysqli_query($mysqli, $consulta_cambio);
        list($id, $pass_nuevo, $pass_old, $fecha_pedido, $usuario, $nombre) = mysqli_fetch_array($resultado_cambio);
        $date = new DateTime($fecha_pedido);
        $IP = getRealIP();

        $modifica_db2 = mysqli_query($mysqli, "update cambio_pass set keyss='', estado='1',fecha_aceptado=CURRENT_TIMESTAMP, ip='" . $IP . "' where id_usuario='" . $usuario . "' and keyss='" . mysqli_real_escape_string($mysqli, $_REQUEST['llave']) . "'");
        if ($modifica_db2) {
            $modifica_db = mysqli_query($mysqli, "update usuarios set pass_usuario=AES_ENCRYPT('" . $pass_nuevo . "','Alex1234Stewart') where id_usuario='" . $usuario . "' and nombre_usuario='" . $nombre . "'");
            if ($modifica_db) {
                $bandera2 = "ok";
            } else {
                $bandera2 = "error";
            }
        } else {
            $bandera2 = "error";
        }
    }
} else {
    if (isset($_REQUEST['us'])) {
        $bandera2 = "denegado";
    }
}

if ($_REQUEST['llave'] != '' && isset($_REQUEST['llave']) && !isset($_REQUEST['us'])) {
    $consulta = "SELECT * FROM cambio_correo where keyss='" . mysqli_real_escape_string($mysqli, $_REQUEST['llave']) . "'  and estado='0'";
    $resultado = mysqli_query($mysqli, $consulta);
    $cantidad = mysqli_num_rows($resultado);
    if ($cantidad == 0) {
        $bandera = "caducado";
    }
    if ($cantidad > 1) {
        $bandera = "error";
    }
    if ($cantidad == 1) {
        $consulta_cambio = "Select c.id,c.correo_nuevo,c.correo_old,c.fecha_pedido,c.usuario,u.nombre_usuario from cambio_correo c, usuarios u where keyss='" . mysqli_real_escape_string($mysqli, $_REQUEST['llave']) . "' and u.id_usuario=c.usuario";
        $resultado_cambio = mysqli_query($mysqli, $consulta_cambio);
        list($id, $correo_nuevo, $correo_old, $fecha_pedido, $usuario, $nombre) = mysqli_fetch_array($resultado_cambio);
        $date = new DateTime($fecha_pedido);
        $IP = getRealIP();

        $modifica_db2 = mysqli_query($mysqli, "update cambio_correo set keyss='', estado='1',fecha_aceptado=CURRENT_TIMESTAMP, ip='" . $IP . "' where usuario='" . $usuario . "' and keyss='" . mysqli_real_escape_string($mysqli, $_REQUEST['llave']) . "'");
        if ($modifica_db2) {
            $modifica_db = mysqli_query($mysqli, "update usuarios set email_usuario='" . $correo_nuevo . "' where id_usuario='" . $usuario . "' and email_usuario='" . $correo_old . "'");
            if ($modifica_db) {
                $bandera = "ok";
            } else {
                $bandera = "error";
            }
        } else {
            $bandera = "error";
        }
    }
} else {
    if (!isset($_REQUEST['us'])) {
        $bandera = "denegado";
    }
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Alex Stewart Argentina</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet"> 
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/galeria.css" rel="stylesheet">
    <link href="css/jquery.fancybox.css" rel="stylesheet">
    <link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
</head>
<body>
    <header id="home">
        <div class="main-nav">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="" href="index.php">
                        <h1><img class="img-responsive" src="images/logo.png" alt="logo" width="180px"></h1>
                    </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right" id='flexi' style='display: flex;'>                 
                        <li class="scroll" >
                            <a href="./l1" style="background-color:goldenrod;">Ingresar</a>
                        </li>
                    </ul>                        
                </div>

            </div>
        </div><!--/#main-nav-->
    </header><!--/#home-->
    <!--/#home-->
    <div class="container">

        <div class="row" style="padding-top: 1rem;">
            <div class="col-sm-12 col-lg-12">
                <?php
                //mensaje para cambio de correo
                if ($bandera != '') {
                    ?>
                    <p><strong>Recomendacion:</strong> Otorgar las cuentas de acceso al sistema a sus empleados más responsables y solicitar cambios de correo solo cuando sea necesario, ante una eventualidad o cambio de personal a cargo.</p>
                    <p>Todas las acciones realizadas en el sitio <strong>Alex Stewart International Argentina S.A.</strong> quedan bajo la entera responsabilidad de la entidad que utiliza nuestros servicios.</p>
                    <hr />
                    <?php
                }
                //mensaje para cambio de contraseña       
                if ($bandera2 != '') {
                    ?>
                    <p><strong>Recomendacion:</strong> Otorgar las cuentas de acceso al sistema a sus empleados más responsables y solicitar cambios de contraseña solo cuando sea necesario, ante una eventualidad o cambio de personal a cargo.</p>
                    <p>Todas las acciones realizadas en el sitio <strong>Alex Stewart International Argentina S.A.</strong> quedan bajo la entera responsabilidad de la entidad que utiliza nuestros servicios.</p>
                    <hr />
                    <?php
                }
                //mensajes para cambio de correo
                switch ($bandera) {
                    case "caducado":
                        ?>
                        <div class="col-sm-12 col-lg-6 alert alert-warning wow fadeInLeft" data-wow-duration="1000ms"  data-wow-delay="500ms">Esta petición de confirmación ha caducado o fue confirmada anteriormente.</div>
                        <?php
                        break;
                    case "error":
                        ?>
                        <div class="col-sm-12 col-lg-6 alert alert-danger wow fadeInLeft" data-wow-duration="1000ms"  data-wow-delay="500ms">Esta petición ha entrado en conflico, por favor intente nuevamente en unos instantes. <br />Si el problema persiste, pongase en contacto con nuestro equipo de trabajo.</div>
                        <?php
                        break;
                    case "ok":
                        ?>
                        <div class="col-sm-12 col-lg-6 alert alert-info wow fadeInLeft" data-wow-duration="1000ms"  data-wow-delay="500ms">
                            <p>Se realizaron las siguientes modificaciones para el usuario: <?php echo utf8_encode($nombre); ?></p>
                            <p><strong>Correo anterior:</strong> <?php echo $correo_old; ?></p>
                            <p><strong>Correo actual:</strong> <?php echo $correo_nuevo; ?></p>
                            <p><strong>Fecha de pedido:</strong> <?php echo $date->format('d/m/Y h:m'); ?></p>
                        </div>       
                        <div class="row"></div>
                        <div class="col-sm-12 col-lg-6 alert alert-success wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="500ms">El cambio ha sido realizado con éxito.</div>
                        <?php
                        break;
                    case "denegado":
                        ?>
                        <div class="col-sm-12 col-lg-6 alert alert-danger wow fadeInLeft" data-wow-duration="1000ms"  data-wow-delay="500ms"> Acceso denegado.<br />El link de confirmación ha sido modificado. <br />Contactese con nosotros. </div>
                        <?php
                        break;
                }
                //mensaje para cambio de contraseña
                switch ($bandera2) {
                    case "caducado":
                        ?>
                        <div class="col-sm-12 col-lg-6 alert alert-warning wow fadeInLeft" data-wow-duration="1000ms"  data-wow-delay="500ms">Esta petición de confirmación ha caducado o fue confirmada anteriormente.</div>
                        <?php
                        break;
                    case "error":
                        ?>
                        <div class="col-sm-12 col-lg-6 alert alert-danger wow fadeInLeft" data-wow-duration="1000ms"  data-wow-delay="500ms">Esta petición ha entrado en conflico, por favor intente nuevamente en unos instantes. <br />Si el problema persiste, pongase en contacto con nuestro equipo de trabajo.</div>
                        <?php
                        break;
                    case "ok":
                        ?>
                        <div class="col-sm-12 col-lg-6 alert alert-info wow fadeInLeft" data-wow-duration="1000ms"  data-wow-delay="500ms">
                            <p>Se realizaron las siguientes modificaciones para el usuario: <?php echo utf8_encode($nombre); ?></p>
                            <p><strong>Fecha de pedido:</strong> <?php echo $date->format('d/m/Y h:m'); ?></p>
                        </div>       
                        <div class="row"></div>
                        <div class="col-sm-12 col-lg-6 alert alert-success wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="500ms">El cambio ha sido realizado con éxito.</div>
                        <?php
                        break;
                    case "denegado":
                        ?>
                        <div class="col-sm-12 col-lg-6 alert alert-danger wow fadeInLeft" data-wow-duration="1000ms"  data-wow-delay="500ms"> Acceso denegado.<br />El link de confirmación ha sido modificado. <br />Contactese con nosotros. </div>
                            <?php
                            break;
                    }
                    ?>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="js/jquery.inview.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/mousescroll.js"></script>
    <script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.countTo.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
</body>