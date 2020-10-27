<?php


$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'ONIET2020';
//$db_port = '3308';


$conexion = @new mysqli($db_host, $db_user, $db_password, $db_name/*, $db_port*/);
if( $conexion -> connect_error) die('Error: '.$conexion -> connect_error);
$conexion ->set_charset('UTF-8');	


?>