<?php

$extra = "Alex1234567Stewart";

function getRealIP() {//obtener ip de la persona que esta accediendo
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        return $_SERVER['HTTP_CLIENT_IP'];
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    return $_SERVER['REMOTE_ADDR'];
}

function codificar($valor) {
    $valor = $extra . $valor . $extra;
    return base64_encode($valor);
}

function decodificar($valor) {
    $valor = base64_decode($valor);
    $valor = substr(substr($valor, strlen($extra)), strlen($extra) * (-1));
    return $valor;
}

function convertir_fecha_server_a_normal($fecha_server) {
    $fecha_server = explode('-', $fecha_server);
    $fecha_server = $fecha_server[2] . '/' . $fecha_server[1] . '/' . $fecha_server[0];
    return $fecha_server;
}

function convertir_fecha_normal_a_server($fecha_normal) {
    $fecha_normal = explode('/', $fecha_normal);
    $fecha_normal = $fecha_normal[2] . '-' . $fecha_normal[1] . '-' . $fecha_normal[0];
    return $fecha_normal;
}

function armar_links_paginas($cantidad, $funcion, $actual) {
    include('datos_locales.php');
    $resul = "";
    $resul .= '<center>' . $paginas[$_SESSION['idioma_actual']] . '<br/><div class="contenedor_paginado" style="text-align:center;">';
    for ($p = 1; $p <= $cantidad; $p++) {
        $clase = ($p == $actual) ? "paginado_actual" : "paginado";
        $evento = ($p == $actual) ? "" : ' onclick="' . str_replace("[[pagina]]", $p, $funcion) . '" ';
        $title = ($p == $actual) ? ' title="' . $pagina_actual[$_SESSION['idioma_actual']] . '" ' : 'title="' . $ir_a_pagina[$_SESSION['idioma_actual']] . '' . $p . '" ';
        $resul .= '<label class="' . $clase . '" ' . $evento . ' ' . $title . '>' . $p . '</label>&nbsp;&nbsp;';
    }
    $resul .= '</div></center>';
    return $resul;
}

function fecha_valida($fecha) {
    if (ereg("(0[1-9]|[12][0-9]|3[01])[/](0[1-9]|1[012])[/](19|20)[0-9]{2}", $fecha)) {
        return true;
    } else {
        return false;
    }
}

function traducir($text) {
    session_start();
    include('datos_locales.php');
    if ($_SESSION['idioma_actual'] == 'en') {
        switch ($text) {
            case 'Laboratorio':
                $text = $laboratorio['en'];
                break;
            case 'Muestrera':
                $text = $muestrera['en'];
                break;
            case utf8_decode('Recepción'):
                $text = $recepcion['en'];
                break;
            case 'Certificaciones':
                $text = $certificaciones['en'];
                break;
        }
    }
    return $text;
}

function es_pdf($nombre_archivo) {
    if (strtolower(substr($nombre_archivo, -3)) == "pdf") {
        return true;
    } else {
        return false;
    }
}

function es_doc($nombre_archivo) {
    if (strtolower(substr($nombre_archivo, -3)) == "doc" OR strtolower(substr($nombre_archivo, -4)) == "docx") {
        return true;
    } else {
        return false;
    }
}

// ENVIAR MAIL AUTENTICADO
function enviar_email_rrhh($asunto, $mensaje, $ruta_adjunto, $archivo_adjunto, $nombre, $email) {
    include_once($_SERVER['DOCUMENT_ROOT']."/phpmailer/PHPMailerAutoload.php");

    $mail = new phpmailer();
    $mail->PluginDir = "phpmailer/";

    $mail->Mailer = "smtp";
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->IsHTML(true);

    //$mail->SMTPDebug = 3;
    $mail->Username = "contactos@alexstewart.com.ar";
    $mail->Password = "r3d4l3rt+123";
    $mail->From = "contactos@alexstewart.com.ar";

    $mail->FromName = "Sitio Web alexstewart.com.ar";
    $mail->AddReplyTo($email);
    $mail->AddBCC("rvergara@alexstewart.com.ar", "Rodrigo Vergara");
    $mail->AddCC("rrhhmendoza@alexstewart.com.ar", "RRHH");
    $mail->Priority = 3;
    $mail->Timeout = 20;
    $mail->ClearAddresses();
    $mail->HeaderLine('MIME-Version', '1.0');
    $mail->Encoding = "quoted-printable";
    $mail->HeaderLine('Content-Type', 'text/html; charset="ISO-8859-1";');
    //$mail->AddAddress("ncastro@alexstewart.com.ar", "Recursos Humanos Alex Stewart");
    //$mail->AddAddress("atuninetti@alexstewart.com.ar", "Recursos Humanos Alex Stewart");
    $mail->Subject = $asunto;
    $mail->Body = $mensaje;
    $mail->AddAttachment($ruta_adjunto . '/' . $archivo_adjunto, $archivo_adjunto);
    $mail->Port = 465;
    $exito = $mail->Send();
    $intentos = 1;
    while ((!$exito) && ($intentos < 5)) {
        sleep(1);
        //echo $mail->ErrorInfo.'<br/>';
        $exito = $mail->Send();
        $intentos = $intentos + 1;
    }
    if ($exito) {
        return true;
    } else {
        return false;
    }
}

//FIN ENVIAR MAIL AUTENTICADO
// ENVIAR MAIL AUTENTICADO
function enviar_email_recuperar_pass($asunto, $mensaje, $email) {
    include_once($_SERVER['DOCUMENT_ROOT']."/phpmailer/PHPMailerAutoload.php");

    $mail = new phpmailer();
    $mail->PluginDir = "/phpmailer/";

    $mail->Mailer = "smtp";
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->IsHTML(true);

    //$mail->SMTPDebug = 3;
    $mail->Username = "contactos@alexstewart.com.ar";
    $mail->Password = "r3d4l3rt+123";
    $mail->From = "contactos@alexstewart.com.ar";

    $mail->FromName = "Sitio Web alexstewart.com.ar";
    $mail->AddReplyTo('noresponder@alexstewart.com.ar');
    //$mail->AddCC("fkronhaus@alexstewart.com.ar", "Federico Kronhaus Sistemas");
    //$mail->AddCC($email, "email");
    $mail->Priority = 3;
    $mail->Timeout = 20;
    $mail->ClearAddresses();
    $mail->HeaderLine('MIME-Version', '1.0');
    $mail->Encoding = "quoted-printable";
    $mail->HeaderLine('Content-Type', 'text/html; charset="ISO-8859-1";');
    $mail->AddAddress($email, "");
    $mail->Subject = $asunto;
    $mail->Body = $mensaje;
    //$mail->AddAttachment($ruta_adjunto.'/'.$archivo_adjunto, $archivo_adjunto);
    $mail->Port = 465;
    $exito = $mail->Send();
    $intentos = 1;
    while ((!$exito) && ($intentos < 5)) {
        sleep(1);
        //echo $mail->ErrorInfo.'<br/>';
        $exito = $mail->Send();
        $intentos = $intentos + 1;
    }
    if ($exito) {
        return true;
    } else {
        return false;
    }
}

//FIN ENVIAR MAIL AUTENTICADO
?>