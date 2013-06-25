<?php
$dbhost="localhost"; 
$dbusuario="root";
                      
$dbpassword="root"; 
                      
$db="reportes";       
$conexion = mysql_connect($dbhost, $dbusuario, $dbpassword);
mysql_select_db($db, $conexion);
?>