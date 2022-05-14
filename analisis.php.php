<!DOCTYPE HTML>
<!--
        Spectral by HTML5 UP
        html5up.net | @ajlkn
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<html>
    <head>
        <title>ALEX STEWART INTERNATIONAL ARGENTINA</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="assets/css/noticias.css" />
        <!--        <link rel="stylesheet" href="assets/css/modal.css" />-->
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    </head>
    <body class="landing">

        <!-- Page Wrapper -->
        <div id="page-wrapper">

            <!-- Header -->
            <header id="header" class="alt">
                <h1><a class="more scrolly" href="#banner"><img class="img-responsive" src="images/logonew.png" alt="" style="height: 100%;" /> </a></h1>
                <nav id="nav">
                    <ul>
                        <li class="special">
                            <a href="#menu" class="menuToggle"><span>Menu</span></a>
                            <div id="menu">
                                <ul>
                                    <li><a class="more scrolly" href="index.php">Inicio</a></li>
                                    <li><a class="more scrolly" href="index.php#three">Servicios</a></li>                                    
                                    <li><a class="more scrolly" href="analisis.php">Nuestros análisis</a></li>
                                    <li><a class="more scrolly" href="noticias.php">Noticias</a></li>
                                    <li><a class="more scrolly" href="index.php#cta">Contacto</a></li>
                                    <li><a  href="../l1/index.php">Ingresar</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
            </header>

            <!-- Banner -->

            <!-- CTA -->
            <section id="cta" class="wrapper style4 container">
                <?php
                $vueltas = 0;
                include "../intercon.php";
                $consulta_noticias1 = mysqli_query($mysqli, "SELECT * FROM noticias ORDER BY id_noticia DESC LIMIT 5");
                while ($noticias1 = mysqli_fetch_array($consulta_noticias1)) {
                    ?>
                    <div id="noticia<?php echo $noticias1["id_noticia"]; ?>" class="nt" <?php
                    if ($vueltas != 0) {
                        echo "show";
                    } else {
                        echo "show";
                    }
                    ?> >                    
                        <h3 style="color:darkred;font-weight: bold;"><img src="/images/logonew.png" style="height:50px" alt="" /><?php echo $noticias1['titulo_es']; ?></h3>
                        <h5> <?php
                            $fecha1 = new DateTime($noticias1['fecha_noticia']);
                            $fecha = date_format($fecha1, "d/m/Y");
                            echo $fecha;
                            ?></h5>
                        <blockquote id="cnoti">
                            <div class="row" id="cnoti" >
                                <?php echo $noticias1['descripcion_es_noticia']; ?>
                                <p><small>Alex Stewart Mendoza</small></p>
                            </div>
                        </blockquote>
                    </div>
                    <?php
                    $vueltas = 1;
                }
                ?>

            </section>

            <!-- Footer -->
            <footer id="footer">
                <ul class="icons"> 
        <!--                    <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>-->
                    <li><a href="#" class="icon fa-facebook" ><span class="label">Facebook</span></a></li>
        <!--                    <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>-->
                    <li><a href="#" class="icon fa-envelope-o"><span class="label" >Email</span></a></li>
                </ul>
                <ul class="copyright">
                    <!--<li>&copy; Untitled</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>-->
                    Alex Stewart International Argentina - +54-261-4932253/1603 - atencion.cliente.mza@alexstewart.com.ar 
                </ul>
            </footer>

        </div>

        <!-- Scripts -->

        <script src="assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.scrollex.min.js"></script>
        <script src="assets/js/jquery.scrolly.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="assets/js/main.js"></script>
        <script>
            $('#openModal').on('shown.bs.modal', function () {
                $('#openModal').focus();
            });
        </script>
        <script src="assets/js/mainmio.js"></script>
        <?php include "modal.php" ?>
    </body>
</html>