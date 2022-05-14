<?php 
session_start();
include('db.php');
include('datos_locales.php');
include('funciones.php');
header('Content-Type: text/xml; charset=UTF-8');
$nombre=mysqli_real_escape_string($mysqli,utf8_decode($_POST['nombre_trabaja_nosotros']));
$email=mysqli_real_escape_string($mysqli,utf8_decode($_POST['email_trabaja_nosotros']));
$respuesta_xml='';

    $respuesta_xml.= '<?xml version="1.0" encoding="ISO-8859-1" standalone="yes"?>';
	$respuesta_xml.= '<contenido>';
		
		//comprobamos que sea una petici�n ajax
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		 	
		    //obtenemos el archivo a subir
		    $file = $_FILES['archivo']['name'];                                    
		 	
		 	// COMPROBAR LA EXTENSI�N DEL ARCHIVO SI ES PDF O DOC O DOCX
		 	if (es_pdf($file) OR es_doc($file)){
			    //comprobamos si existe un directorio para subir el archivo
			    $directorio='CVS';
			    //si no es as�, lo creamos
			    if(!is_dir($directorio."/")) {
			        mkdir($directorio."/", 0777);
			    }
			    $nombre_archivo_final=date("Y.m.d-H.i.s-").$file;
			    //comprobamos si el archivo ha subido
			    if ($file && move_uploaded_file($_FILES['archivo']['tmp_name'],$directorio."/".$nombre_archivo_final)) {
			       	$respuesta_xml.= '<respuesta>OK</respuesta>';
			       	//sleep(2);//retrasamos la petici�n 2 segundos
			       	$respuesta_xml.= '<archivo>'.$file.'</archivo>';
			       	$respuesta_xml.= '<nombre>'.$nombre.'</nombre>';
			       	$respuesta_xml.= '<email>'.$email.'</email>';
			       	$asunto="Se ha recibido un Curriculum a traves del sitio web de alexstewart.com.ar";
					$mensaje="<br/><div>";
					$mensaje.='<label style="font-size:14px;">Se ha recibido un curriculum vitae a traves del formulario del sitio web www.alexstewart.com.ar</label><br/>';
					$mensaje.='<label style="font-size:12px;">CV recibido de: <b>'.$nombre.'</b><label><br/>';
					$mensaje.='<label style="font-size:12px;">con correo electronico: <b>'.$email.'</b></label><br/>';
					$mensaje.='<label style="font-size:12px;">el dia  :<b>'.$fecha_actual.'</b> a las : <b>'.$hora_actual.'</b><br/><br/>';
					// $mensaje.='<label style="font-size:12px;">Comentarios:</label><br/>';
					// $mensaje.='<label style="font-size:14px;font-weight:bold;font-style:italic;">'.$consulta.'</label>';

					$mensaje.="</div><hr/>";

			       	enviar_email_rrhh($asunto,$mensaje,$directorio,$nombre_archivo_final,$nombre,$email);
			    }else{
			 		/**** el archivo no se subi� ****/
			 		$respuesta_xml.= '<respuesta>KO</respuesta>';
			 		$respuesta_xml.= '<error>ns</error>';
			 		$respuesta_xml.='<tmp>'.$_FILES['archivo']['tmp_name'].'</tmp>';
			 		$respuesta_xml.= '<archivo>'.getcwd()."/".$directorio."/".$file.'----'.$file.'</archivo>';

			    }

		 	}else{
		 		/**** no es pdf o doc o docx ****/
		 		$respuesta_xml.= '<respuesta>KO</respuesta>';
		 		$respuesta_xml.= '<error>ext</error>';	
		 		$respuesta_xml.='<ext>'.$file.'</ext>';
		 	}
		}else{
			/**** no hubo petici�n ********/
		    $respuesta_xml.= '<respuesta>KO</respuesta>';
		    $respuesta_xml.= '<error>nopet</error>';	
		}

	$respuesta_xml.= '</contenido>';

echo utf8_encode($respuesta_xml);

?>