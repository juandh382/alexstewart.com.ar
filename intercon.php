<?php
$cadena_control="Alex1234Stewart";
/***** DATOS DATTATEC *******/
$username ='ya000327_asa';
$hostname ='localhost';
$password='Asa12345';
$database ="ya000327_sitio_web";
/***** FIN DATOS DATTATEC *****/
//MySQLi
$mysqli = new mysqli($hostname, $username, $password, $database);
if ($mysqli->connect_errno) {
    die("Fallo la conexión a MySQL: (" . $mysqli->mysqli_connect_errno()
            . ") " . $mysqli->mysqli_connect_error());
} else {
    //conexion exitosa
}
?>
