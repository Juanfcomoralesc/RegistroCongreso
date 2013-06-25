<?php

     /*Funcion para enviar 1 post*/
     function onepost($unposteo) {
     session_start();
	     /*Primero pregunta por una variable sesión postID, si no existe toma la variable oculta del formulario y la guarda en la sesión con ese nombre, retorna true, quiere decir que es la primera vez que se envía el formulario.*/
         if(isset($_SESSION['unposteo'])) {
		      
			 /*Si ya existe esa variable en la session, pregunta si es igual a la que se esta reenviando del formulario, si es asi retorna falso que equivale a un reenvio.*/
             if ($unposteo == $_SESSION['unposteo']) {
                 return false;
             } else {
                 $_SESSION['unposteo'] = $unposteo;
                 return true;
             }
			 
         }else{
             $_SESSION['unposteo'] = $unposteo;
             return true;
         }
     }/*Cierra funcion*/
	 
	 
	 /*Detectar caracteres, esto para prevenir una inyeccion, recorre todas las condiciones hasta que no encuentre nada de ser asi regresa un true */
	 function detect($c) {
          if(preg_match('/[\'"]/', $c))
              return false;
          elseif(preg_match('/[\/\\\\]/', $c))
              return false;
          elseif(preg_match('/(--|#|\/\*)/', $c))
              return false;
          elseif(preg_match('/(=|&|\|)/', $c))
              return false;
		  elseif(preg_match('/(<|<>|>)/', $c))
              return false;
          else
              return true;
	 }/*Cierra funcion*/
	 
	 
	 /*Funcion para prevenir injecciones*/
	 function limpiaxss($dato)
     {
         // Fix &entity\n;
         $dato = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $dato);
         $dato = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $dato);
         $dato = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $dato);
         $dato = html_entity_decode($dato, ENT_COMPAT, 'UTF-8');

         // Remove any attribute starting with "on" or xmlns
         $dato = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $dato);

         // Remove javascript: and vbscript: protocols
         $dato = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $dato);
         $dato = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $dato);
         $dato = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $dato);

         // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
         $dato = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $dato);
         $dato = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $dato);
         $dato = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $dato);

         // Remove namespaced elements (we do not need them)
         $dato = preg_replace('#</*\w+:\w[^>]*+>#i', '', $dato);

         do{
	     // Remove really unwanted tags
	     $datoviejo = $dato;
	     $dato = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $dato);
         }
         while ($datoviejo !== $dato);
         // we are done...
         return $dato;
         } /*Cierra funcion*/
		 
		 
		 
		 function filter($string) {
  $replace = "";
  $search = array(">", "<", "|", ";", "OR");
  $result = mysql_escape_string( str_replace($search, $replace, $string));
  return $result;
}


function fnValidateStringr($str)

{

        #letters and space only

        return preg_match('/^[A-Za-z\s ]+$/', $str);

}






function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}








//Crearemos un fichero llamado "libreria.php" donde tendremos las funciones creadas anteriormente
function conectar_bd(){
$servidor="localhost";
$bd="propedeutico";
$usu="root";
$pass="root";

if (!($link=mysql_connect($servidor,$usu,$pass))){
echo "Error conectando a la base de datos.";
exit();
}
if (!mysql_select_db($bd,$link)){
echo "Error seleccionando la base de datos.";
exit();
}
return $link;
}

// Consulta que devuelve una sola tupla
function select($sql){
$link=conectar_bd();
$res=mysql_query($sql,$link) or die (mysql_error());
$total = mysql_num_rows($res);
mysql_close ($link);
return $total;
}


// Consulta para el pdf
function _select($sql){
$link=conectar_bd();
$result=mysql_query($sql,$link) or die (mysql_error());
$rows = mysql_fetch_array($result);
mysql_close ($link);
return $rows;
}


function insert($sql){
$link=conectar_bd();
$res=mysql_query($sql,$link) or die (mysql_error());
mysql_close ($link);
return $total;
}

// Consulta que devuelve mas de una fila/tupla 
function selectmultiple($sql){
$link=conectar_bd();
$res=mysql_query($sql,$link) or die (mysql_error());
mysql_close ($link);
return $res;
}




function hora_local($zona_horaria = 0)
{
	if ($zona_horaria > -12.1 and $zona_horaria < 12.1)
	{
		$hora_local = time() + ($zona_horaria * 3600);
		return $hora_local;
	}
	return 'error';
}


function val_nombre($valor) {
  return trim($valor) && ! is_numeric($valor);
} 







function generarCodigo($longitud) {
 $key = '';
 $pattern = '1A2B3C456789001A2B3C4D5E6F7G8H9I1J0K1L1M1N2O1P3Q1R5S1T5U1V61X7Y1X8A1B9C2D0E21G2H2I2J3K2L4M2N5O';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
 return $key;
}
 



?>