<?php

header('Access-Control-Allow-Origin: *');
session_start();
if (!isset($_SESSION['id_proyecto_usuario']) || !isset($_SESSION['id_usuario']) || $_SESSION['activo_usuario'] != '1') {
    header("location: /prohibido.php?b=12412512312");
} else {
    include 'uad/adm4/include/codificar.php';
    if (isset($_REQUEST['setl']) && $_REQUEST['setl'] != ' ') {
        $orden = decodificar($_REQUEST['setl']);

        //buscar los archivos disponibles para esa orden
//        $archi = array();
//        $dir_archivos = opendir("ordenes_lims/"); //ruta actual
//        while ($archivo_ver = readdir($dir_archivos)) { //obtenemos un archivo y luego otro sucesivamente
//            if ($archivo_ver != "." && $archivo_ver != "..") {//verificamos si es o no un directorio
//                if (strpos($archivo_ver, $orden) === 0) {
//
//                    array_push($archi, $archivo_ver);
//                }
//            }
//        }
        switch ($_SESSION['sucursal']) {
            case "":
                $url = "http://alexstewart.hopto.org/lims/informes/archivos/" . $orden . "/" . $orden . ".pdf";
                break;
            case "_PM":
                $url = "http://peritomoreno.hopto.org:2222/lims/informes/archivos/" . $orden . "/" . $orden . ".pdf";
                break;
        }
        $SUCURSAL = $_SESSION['sucursal'];
        include "uad/adm4/include/db.php";
        $veri = "Select id_cliente,id_proyecto from ordenes$SUCURSAL where n_orden='" . $orden . "' limit 1";
        while ($intentos < 5) {
            $verificacion = mysqli_query(${"mysqli"}, $veri);
            list($idcliente, $idproyecto) = mysqli_fetch_array($verificacion);
            if ($idcliente != $_SESSION['id_cliente_usuario'] || $idproyecto != $_SESSION['id_proyecto_usuario']) {
                $redireccionar = "SI";
            } else {
                $redireccionar = "NO";
                break;
            }
            sleep(5);
        }
        if ($redireccionar == "SI") {
            header("location: /prohibido.php?c=" . $_SESSION['id_cliente_usuario'] . "&cr=" . $idcliente . "&p=" . $_SESSION['id_proyecto_usuario'] . "&pr=" . $idproyecto);
        }

        if ($_REQUEST['version'] === "1") {
//            header("Location:" . $url);
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header("Content-Disposition: attachment; filename=$orden.pdf");
            readfile($url);
        } else {
            header("Content-type: application/pdf");
            header("Content-Disposition: attachment; filename=$orden.pdf");
            readfile($url);
        }
    }


    if (isset($_REQUEST['onien']) && $_REQUEST['onien'] != '') {
        if (isset($_REQUEST['inre']) && $_REQUEST['inre'] != '') {
            $orden = decodificar($_REQUEST['onien']);
            $url = decodificar($_REQUEST['inre']);
            $nombre = decodificar($_REQUEST['nrtow']);
            if ($_REQUEST['version'] === "1") {
//                header("Location:" . $url);
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header("Content-Disposition: attachment; filename=$orden");
                readfile($url);
            } else {
                $pagina = str_replace("../../../", "./", $url);
                header("Content-type: application/pdf");
                header("Content-Disposition: attachment; filename=$orden");
                readfile($pagina);
            }
        }
    }
}