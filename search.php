<?php if(isset($_POST['busc'])){ require_once 'clase406.php'; require_once 'config.php'; $db = new MySQL(); $b=array(); while ($post = each($_POST)){$b[]=xss_clean($post[1]); }foreach ($_POST as $key => $value){ if (!valida($value) && $key!="busc"){$flag=true; break;} } $campo=$b[0]; $consulta = $db->consulta("SELECT * FROM usuarios WHERE codigo like '$campo' ORDER BY id ASC"); $total = $db->num_rows($consulta); $consult = $db->consulta("SELECT * FROM usuarios WHERE codigo like '$campo' ORDER BY id ASC"); $fila = $db->fetch_array($consult); $carpeta=($fila['carreragen']==1)? 'administracion' : 'mercadotecnia';	if($fila['codigo']==$campo && $total==1){ ob_start(); header('Location: generar/'.$carpeta.'/'.$fila['codigo'].'.pdf'); ob_end_flush();}else{$flag=true;}} ?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="business corporate landing page" />
<meta name="keywords" content="business, corporate, marketing, seo, app landing page, software landing page, app page, registration form, login page, template" />
<meta name="author" content="Tansh" />
<title>Registro anfeca</title>
<link rel="stylesheet" media="screen" href="css/reset.css"/>
<link rel="stylesheet" media="screen" href="css/style.css"/>
<link rel="stylesheet" media="screen" href="css/nivo-slider.css"/>
<script src="js/modernizr-1.5.min.js" type="text/javascript"></script>
<script src="js/jquery-1.6.3.min.js" type="text/javascript"></script>
</head>
<body>
<div id="wrapper"> 
		
	
		<div class="login_logo"><a href="search.php"><img src="images/consult.png" width="108" height="30" alt="login-logo"></a></div>
		
		
	
		<div class="login_box">
				<div class="login_boxtop"></div>
				<div class="login_boxmiddle">
						<form method="post" action="search.php" id="loginform" target="_BLACK">
								<fieldset>
										<p>
												<label>N�mero de folio</label>
												<input id="user" name="user" value="<?php echo (isset($b[0]))? $b[0] : '';?>"/>
										</p>
										
										<p>
												<input name="busc" class="login_submit" type="submit" value="Consultar &raquo;"/>
										</p>
								</fieldset>
						</form>
						<p><a href="index.php">Regresar</a> | <a href="update.php">Editar solicitud</a></p>
				</div>
				<div class="login_boxbottom"></div>
		</div>
	
		
	
		<div class="clear"></div>
	
		<div class="login_homelink"><a >Ingrese su n�mero de folio para consultar su solicitud.</a></div>
</div>

<script src="js/jquery.nivo.slider.pack.js" type="text/javascript"></script>
<script src="js/jquery.fancybox-1.3.4.js" type="text/javascript"></script> 
<script src="js/jquery.cycle.all.min.js" type="text/javascript"></script> 
<script src="js/twitter.js" type="text/javascript"></script> 
<script src="js/jquery.validate.js" type="text/javascript"></script> 
<script src="js/jquery.form.js" type="text/javascript"></script> 
<script src="js/cufon-yui.js" type="text/javascript"></script> 
<script src="js/Maven_Pro_500.font.js" type="text/javascript"></script> 
<script src="js/custom.js" type="text/javascript"></script> 
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>


<?php echo ($flag==true)? '<script type="text/javascript">alert("Los datos que ha ingresado no son correctos, por favor intente de nuevo!")</script>' : '';?>