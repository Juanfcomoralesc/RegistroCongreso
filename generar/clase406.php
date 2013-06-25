<?php


function valida($nombre)
     {
     if(preg_match('/^[a-zñÑáéíóú\d_\s]{1,28}$/i', $nombre) ){return false;}else{return true;}
     }
	  function num($element) {
     if(!preg_match("/[^0-9]/", $element) && filter_var($element, FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_LOW)){return true;}else{return false;}
     }


function xss_clean($data){
         $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
         $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
         $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
         $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');
		 
         $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);
 
         $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
         $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
         $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

         $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
         $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
         $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

         $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);
 
         do{
             $old_data = $data;
             $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
         }
         while ($old_data !== $data);
             return $data;
     }


// De una vez vamos a incluir la conexión aquí
mysql_connect('localhost','root','root');
mysql_select_db('anfeca');
 
function _post($nombre, $tipo = 'str'){
  if( isset($_POST[$nombre]) ) {
    // Aquí es donde evitamos tener diagonales
    // extra causadas por el magic quotes.
    // get_magic_quotes_gpc nos dice si las magic quotes están activas
    if( get_magic_quotes_gpc() )
      $val = stripslashes($_POST[$nombre]);
    else
      $val = $_POST[$nombre];
    // Con esto forzamos los valores a ser números
    // enteros o con punto decimal. Si no se especifica
    // un tipo, será cadena de texto.
    if( $tipo == 'int' )
      $val = intval($val);
    else if( $tipo == 'float' )
      $val = floatval($val);
    return $val;
  } else {
    // Si la variable solicitada no existe en $_POST, se devuelve
    // un valor 0 o nada de acuerdo al tipo de valor pedido.
    if( $tipo == 'int' or $tipo == 'float' )
      return 0;
    else
      return '';
  }
}
function db_insertar($tabla, $valores) {
  if( is_array($valores) ) {
    // Bandera para evitar poner coma en el primer elemento
    $ini = true;
    // Hacemos un recorrido por los campos y valores
    // que se van a insertar y generamos la cadena
    // que conformará la parte del "SET" del INSERT.
    $sqlset = '';
    foreach( $valores as $k => $v ) {
      if( !$ini )
        $sqlset .= ',';
      else
        $ini = false;
      $sqlset .= '`' . $k . '` = \'' . mysql_real_escape_string($v) . '\'';
    }
    mysql_query("INSERT INTO `{$tabla}` SET {$sqlset}");
    // Se regresa el ID del registro insertado, claro que si
    // la tabla no cuenta con uno, simplemente será nulo
    return mysql_insert_id();
  } else {
    return false;
  }
}


function select($tabla, $valores) {
    if( is_array($valores) ) {
        // Bandera para evitar poner coma en el primer elemento
        $ini = true;
 
        $sqlset = '';
        foreach( $valores as $k => $v ) {
            if( !$ini )
                $sqlset .= ',';
            else
                $ini = false;
                $sqlset .= '`' . $k . '` = \'' . mysql_real_escape_string($v) . '\'';
        }
 
        $query = "SELECT * FROM `{$tabla}` ";
        $result =mysql_query($query);
 
        return $result;
    } else {
        return false;
    }
}




  function ip(){
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


   ?>