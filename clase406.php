<?php function valida($nombre){ if(preg_match('/^[a-zñÑáéíóú.\d_\s]{1,70}$/i', $nombre) ){ return  true;} else{return false;} }
	 function num($element) { if(!preg_match("/[^0-9\d_\s]/", $element) && filter_var($element, FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_LOW)){return true;}else{return false;} }
     function xss_clean($data){ $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data); $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data); $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data); $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8'); $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);  $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);  $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);  $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data); $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);   $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);  $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);
     $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data); do{ $old_data = $data; $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);}
     while ($old_data !== $data);  return $data; }
     function ip(){ if (!empty($_SERVER['HTTP_CLIENT_IP'])){ $ip=$_SERVER['HTTP_CLIENT_IP']; } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){ $ip=$_SERVER['HTTP_X_FORWARDED_FOR']; }  else{ $ip=$_SERVER['REMOTE_ADDR']; }	 return $ip; }
     function emailv($email){ $mail_correcto = 0;  if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){  if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) {  if (substr_count($email,".")>= 1){  $term_dom = substr(strrchr ($email, '.'),1); if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){ 
                $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1); 
               	 $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1); 
               	 if ($caracter_ult != "@" && $caracter_ult != "."){ 
                  	 $mail_correcto = 1; 
               	 } 
            	 } 
         	 } 
      	 } 
   	 } 
   	 if ($mail_correcto) return true; else  return false;    }
     function generarCodigo($longitud){ $key = ''; $pattern = '1A2B3C456789001A2B3C4D5E6F7G8H9I1J0K1L1M1N2O1P3Q1R5S1T5U1V61X7Y1X8A1B9C2D0E21G2H2I2J3K2L4M2N5O'; $max = strlen($pattern)-1; for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)}; return $key; }
     function hora_local($zona_horaria = 0){ if ($zona_horaria > -12.1 and $zona_horaria < 12.1){ $hora_local = time() + ($zona_horaria * 3600); return $hora_local; } return 'error';  }
     function val_nombre($valor) { return trim($valor) && ! is_numeric($valor); } ?>