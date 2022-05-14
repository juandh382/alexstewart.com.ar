<?php
$fecha_hora_actual=date("d/m/Y H:i:s");
$fecha_hora_server_actual=date("Y-m-d H:i:s");
$fecha_actual=date("d/m/Y");
$fecha_server_actual=date("Y-m-d");
$hora_actual=date("H:i:s");
$ip_actual=$_SERVER['REMOTE_ADDR'];

$meses=array('Enero','Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
$dias_semana=array('Domingo','Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');



/********* VARIABLES IDIOMA **************/
$ver_mas=array('es'=>"Ver mas",'en'=>'See more');
$volver=array('es'=>"Volver",'en'=>'Back');
$ver_todas=array('es'=>"Ver todas",'en'=>'See all');
$nombre_usuario=array('es'=>"Nombre de usuario:",'en'=>'Username:');
$contrasena=array('es'=>utf8_decode("Contraseña:"),'en'=>'Password:');
$olvido_contrasena=array('es'=>utf8_decode("¿Olvidó su contraseña?"),'en'=>'Forgot password?');
$acceso_clientes=array('es'=>"Acceso clientes",'en'=>'Client access');
$ingresar=array('es'=>"Ingresar",'en'=>'Login');
$has_iniciado=array('es'=>"Has iniciado ".utf8_decode("sesión")." como:",'en'=>'You are logged as:');
$cerrar_sesion=array('es'=>"Cerrar ".utf8_decode("sesión")."",'en'=>'Logout');
$seguimiento=array('es'=>"Seguimiento",'en'=>'Tracking');
$cambiar_contrasena=array('es'=>utf8_decode("Cambiar contraseña"),'en'=>'Change password');
$reestablecer_contrasena=array('es'=>utf8_decode("Reestablecer contraseña"),'en'=>'Password recovery');
$reestablecer=array('es'=>utf8_decode("Reestablecer"),'en'=>'Recover');
$cambiar_contrasena_usuario=array('es'=>utf8_decode("Cambiar contraseña de usuario"),'en'=>'Change current password');

$contrasena_actual=array('es'=>utf8_decode("Contraseña actual"),'en'=>'Current password');
$contrasena_nueva=array('es'=>utf8_decode("Contraseña nueva"),'en'=>'New password');
$contrasena_repita_nueva=array('es'=>utf8_decode("Repita la contraseña"),'en'=>'Repeat the password');
$guardar_cambios=array('es'=>utf8_decode("Guardar cambios"),'en'=>'Save changes');
$link_expirado=array('es'=>utf8_decode("La dirección a la que ha ingresado no existe o ha expirado.<br/>"),'en'=>'Wrong or invalid url. Try again');

$ingrese_correo=array('es'=>utf8_decode("Ingrese su correo electrónico"),'en'=>'Enter your e-mail address');
$seguimiento_ordenes=array('es'=>utf8_decode("Seguimiento de órdenes"),'en'=>'Tracking orders');
$solicitar_cotizacion=array('es'=>utf8_decode("Solicitar cotización"),'en'=>'Quote request');
$login_error=array('es'=>"Nombre de usuario y/o ".utf8_decode("contraseña")." incorrectos",'en'=>'Wrong username and/or password');
$paginas=array('es'=>utf8_decode("Páginas"),'en'=>'Pages');
$pagina_actual=array('es'=>utf8_decode("Página actual"),'en'=>'Current page');
$ir_a_pagina=array('es'=>utf8_decode("Ir a la página "),'en'=>'Go to page ');
$buscar_orden=array('es'=>"Buscar ordenes",'en'=>'Find orders');
$desde=array('es'=>utf8_decode("Desde"),'en'=>'From');
$hasta=array('es'=>utf8_decode("Hasta"),'en'=>'To');
$buscar=array('es'=>utf8_decode("Buscar"),'en'=>'Search');
$n_orden=array('es'=>utf8_decode("Número de orden"),'en'=>'Number of order');
$cantidad_muestras=array('es'=>utf8_decode("Cantidad de muestras"),'en'=>'Amount of samples');
$fecha_informe=array('es'=>utf8_decode("Fecha de informe"),'en'=>'Report date');
$fecha_recep=array('es'=>utf8_decode("Fecha de Recepción"),'en'=>'Reception date');
$sector=array('es'=>utf8_decode("Sector"),'en'=>'Dept.');

/***** SECTORES ******/
$recepcion=array('es'=>utf8_decode("Recepción"),'en'=>'Reception');
$muestrera=array('es'=>("Muestrera"),'en'=>'Sample preparation');
$laboratorio=array('es'=>("Laboratorio"),'en'=>'Laboratory');
$certificaciones=array('es'=>("Certificaciones"),'en'=>'Certification');
/***** FIN SECTORES ******/

?>