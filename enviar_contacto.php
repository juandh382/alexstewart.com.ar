<?php
include('db.php');
include('datos_locales.php');
header('Content-Type: text/html;charset=UTF-8');
$asunto="[Contacto] ". $_POST['asunto_contacto'];
  
$nombre=mysqli_real_escape_string($mysqli,utf8_decode($_POST['nombre_contacto']));
$mail=mysqli_real_escape_string($mysqli,$_POST['email_contacto']);
$telefono=mysqli_real_escape_string($mysqli,$_POST['telefono_contacto']);
$consulta= utf8_decode($_POST['consulta_contacto']);

$mensaje="<br/><div>";
$mensaje.='<label style="font-size:14px;">Formulario de contacto www.alexstewart.com.ar</label><br/>';
$mensaje.='<label style="font-size:12px;">Mensaje de: <b>'.$nombre.'</b><label><br/>';
$mensaje.='<label style="font-size:12px;">Tel&eacute;fono: <b>'.$telefono.'</b></label><br/>';
$mensaje.='<label style="font-size:12px;">Correo electr&oacute;nico: <b>'.$mail.'</b></label><br/>';
$mensaje.='<label style="font-size:12px;">El dia  :<b>'.$fecha_actual.'</b> a las : <b>'.$hora_actual.'</b><br/><br/>';
$mensaje.='<label style="font-size:12px;">Comentarios:</label><br/>';
$mensaje.='<label style="font-size:14px;font-weight:bold;font-style:italic;">'.$consulta.'</label>';

$mensaje.="</div><hr/>";
$consulta_o=mysqli_real_escape_string($mysqli,utf8_decode($_POST['consulta_contacto']));
$consulta_guardar_contacto="INSERT INTO contactos 
(
  `nombre_contacto`,
  `email_contacto`,
  `telefono_contacto`,
  `comentarios_contacto`,
  `fecha_contacto`,
  `ip_contacto`
  ) VALUES (
  '$nombre',
  '$mail',
  '$telefono',
  '$consulta_o',
  '$fecha_hora_server_actual',
  '$ip_actual'
  )";
$guardar_contacto=mysqli_query($mysqli,$consulta_guardar_contacto,$conexion);

$exito=enviar_email($asunto,(nl2br($mensaje)));
if ($exito){
  echo 'OK';
}else{
  echo 'KO';
}

function enviar_email($asunto,$mensaje){
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

  $mail->FromName = "Contacto Sitio alexstewart.com.ar";
  $mail->AddReplyTo($_POST['email_contacto']);
	//$mail->AddCC("rvergara@alexstewart.com.ar", "Atencion Cliente");
	$mail->Priority=3;
  $mail->Timeout=20;
  $mail->ClearAddresses();
	$mail->HeaderLine('MIME-Version', '1.0');
	$mail->Encoding = "quoted-printable";
	$mail->HeaderLine('Content-Type', 'text/html; charset="ISO-8859-1";');
	$mail->AddBCC("rvergara@alexstewart.com.ar","Rodrigo Vergara");
  //$mail->AddBCC("sistemas@alexstewart.com.ar","Sistemas");
	$mail->AddAddress("atencion.cliente.mza@alexstewart.com.ar","Atencion al cliente");
	$mail->AddBCC("comercial@alexstewart.com.ar","Comercial");

  $mail->Subject = $asunto;
  $mail->Body = $mensaje;
	//$mail->AddAttachment($ruta_adjunto.'/'.$archivo_adjunto, $archivo_adjunto);
  $mail->Port = 465;
  $exito = $mail->Send();
  $intentos=1;
  while ((!$exito) && ($intentos < 2)) {
    sleep(1);
		echo $mail->ErrorInfo.'<br><BR><BR><BR>';
    $exito = $mail->Send();
    $intentos=$intentos+1;  
  }
	if ($exito){
	  return true;
	}else{
	  return false;
	}
}
//FIN ENVIAR MAIL AUTENTICADO

?>