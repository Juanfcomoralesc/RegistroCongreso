<?php session_start(); if(isset($_POST['busc'])){ require_once 'clase406.php';  require_once 'config.php'; $db = new MySQL();  $b=array(); while ($post = each($_POST)){ $b[]=xss_clean($post[1]); } foreach ($_POST as $key => $value){ if (!valida($value) && $key!="busc"){ $flag=true; break;}} $campo=$b[0]; $consulta = $db->consulta("SELECT * FROM usuarios WHERE codigo like '$campo' ORDER BY id ASC"); $total = $db->num_rows($consulta); $consult = $db->consulta("SELECT * FROM usuarios WHERE codigo like '$campo' ORDER BY id ASC"); $fila = $db->fetch_array($consult); $carpeta=($fila['carreragen']==1)? 'administracion' : 'mercadotecnia';	if($fila['codigo']==$campo && $total==1){ ob_start(); header('Location: generar/'.$carpeta.'/'.$fila['codigo'].'.pdf'); ob_end_flush();}else{$flag=true;}} ?>
<!DOCTYPE HTML>
<html>
<head>
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
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$(function()
{

$("#mostrar").click(function(event) {
event.preventDefault();
$("#caja").slideToggle();
});

$("#caja a").click(function(event) {
event.preventDefault();
$("#caja").slideUp();
});
});
</script>


<style>

.alerts p {
  /* quick and dirty hack added by me, you may remove it if not needed */
  margin: 0; padding: 0;
}

.alert-message.danger, .alert-message.danger:hover, .alert-message.error, .alert-message.error:hover, .alert-message.success, alert-message.success:hover, .alert-message.info, .alert-message.info:hover {
  color: #ffffff;
}
.alert-message .close {
  font-family: Arial, sans-serif; 
  line-height: 18px;
}
.alert-message.danger, .alert-message.error {
  background-color: #c43c35;
  background-repeat: repeat-x;
  
  background-image: -khtml-gradient(linear, left top, left bottom, from(#ee5f5b), to(#c43c35));
  background-image: -moz-linear-gradient(top, #ee5f5b, #c43c35);
  background-image: -ms-linear-gradient(top, #ee5f5b, #c43c35);
  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #ee5f5b), color-stop(100%, #c43c35));
  background-image: -webkit-linear-gradient(top, #ee5f5b, #c43c35);
  background-image: -o-linear-gradient(top, #ee5f5b, #c43c35);
  background-image: linear-gradient(top, #ee5f5b, #c43c35);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ee5f5b', endColorstr='#c43c35', GradientType=0);
  
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
  border-color: #c43c35 #c43c35 #882a25;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
}
.alert-message.success {
  background-color: #57a957;
  background-repeat: repeat-x;
  
  background-image: -khtml-gradient(linear, left top, left bottom, from(#62c462), to(#57a957));
  background-image: -moz-linear-gradient(top, #62c462, #57a957);
  background-image: -ms-linear-gradient(top, #62c462, #57a957);
  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #62c462), color-stop(100%, #57a957));
  background-image: -webkit-linear-gradient(top, #62c462, #57a957);
  background-image: -o-linear-gradient(top, #62c462, #57a957);
  background-image: linear-gradient(top, #62c462, #57a957);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#62c462', endColorstr='#57a957', GradientType=0);
  
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
  border-color: #57a957 #57a957 #3d773d;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
}
.alert-message.info {
  background-color: #339bb9;
  background-repeat: repeat-x;
  
  background-image: -khtml-gradient(linear, left top, left bottom, from(#5bc0de), to(#339bb9));
  background-image: -moz-linear-gradient(top, #5bc0de, #339bb9);
  background-image: -ms-linear-gradient(top, #5bc0de, #339bb9);
  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #5bc0de), color-stop(100%, #339bb9));
  background-image: -webkit-linear-gradient(top, #5bc0de, #339bb9);
  background-image: -o-linear-gradient(top, #5bc0de, #339bb9);
  background-image: linear-gradient(top, #5bc0de, #339bb9);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#5bc0de', endColorstr='#339bb9', GradientType=0);
  
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
  border-color: #339bb9 #339bb9 #22697d;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
}

:root .alert-message {
  border-radius: 0 \0;
}
.close {
  float: right;
  color: #000000;
  font-size: 20px;
  font-weight: bold;
  line-height: 13.5px;
  text-shadow: 0 1px 0 #ffffff;
  filter: alpha(opacity=25);
  -khtml-opacity: 0.25;
  -moz-opacity: 0.25;
  opacity: 0.25;
}
.close:hover {
  color: #000000;
  text-decoration: none;
  filter: alpha(opacity=40);
  -khtml-opacity: 0.4;
  -moz-opacity: 0.4;
  opacity: 0.4;
}
.alert-message {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 13px;

  position: relative;
  padding: 7px 15px;
  margin-bottom: 18px;
  color: #404040;

  background-color: #eedc94;
  background-repeat: repeat-x;

  background-image: -khtml-gradient(linear, left top, left bottom, from(#fceec1), to(#eedc94));
  background-image: -moz-linear-gradient(top, #fceec1, #eedc94);
  background-image: -ms-linear-gradient(top, #fceec1, #eedc94);
  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fceec1), color-stop(100%, #eedc94));
  background-image: -webkit-linear-gradient(top, #fceec1, #eedc94);
  background-image: -o-linear-gradient(top, #fceec1, #eedc94);
  background-image: linear-gradient(top, #fceec1, #eedc94);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#fceec1', endColorstr='#eedc94', GradientType=0);
  
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
  border-color: #eedc94 #eedc94 #e4c652;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
  border-width: 1px;
  border-style: solid;
  
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  
  -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.25);
  -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.25);
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.25);
}
.alert-message .close {
  margin-top: 0;
}
.alert-message a {
  font-weight: bold;
  color: #404040;
  text-decoration: none;
}
.alert-message.danger p a, .alert-message.error p a, .alert-message.success p a, .alert-message.info p a {
  color: #ffffff;
}
.alert-message p a:hover {
  text-decoration: underline;
}
.alert-message p {
  margin-bottom: 0;
}</style>
	
</head>


</head>
<body>

<div id="wrapper"> 		

		<div class="divider"></div>
		

		<div class="sub_header">
				<h1>Regristro maraton anfeca</h1>
				<a href="update.php">Editar registro</a> </div>
	
		
	
		<div class="divider"></div>
		<div class="clear"></div>
		
	
		<div class="main">
				<h3>Generar registro</h3>
				<p>Si aun no se ha registrado para participar en el maratón regional <strong>ANFECA</strong>, favor de ingresar sus datos correctamente en esta sección.</p>
				
				
				
				<?php if($_SESSION['fallo'][26]=="carrera"){$x="maratón";}elseif($_SESSION['fallo'][26]=="universidad"){$x="universidad";}elseif($_SESSION['fallo'][26]=="facultad"){$x="facultad";}elseif($_SESSION['fallo'][26]=="director"){$x="nombre del director";}elseif($_SESSION['fallo'][26]=="afiliacion"){$x="numero de afiliación";}elseif($_SESSION['fallo'][26]=="nombre_asesor"){$x="nombre del asesor";}elseif($_SESSION['fallo'][26]=="grado_academico"){$x="grado academico";}elseif($_SESSION['fallo'][26]=="email"){$x="correo electronico";}elseif($_SESSION['fallo'][26]=="tel"){$x="telefono";}	elseif($_SESSION['fallo'][26]=="nombre1"){$x="nombre del primer equipo";}elseif($_SESSION['fallo'][26]=="matricula1"){$x="matricula del primer equipo";}elseif($_SESSION['fallo'][26]=="carrera1"){$x="carrera del primer equipo";}elseif($_SESSION['fallo'][26]=="semestre1"){$x="semestre del primer equipo";}elseif($_SESSION['fallo'][26]=="nombre2"){$x="nombre del segundo equipo";}elseif($_SESSION['fallo'][26]=="matricula2"){$x="matricula del segundo equipo";}elseif($_SESSION['fallo'][26]=="carrera2"){$x="carrera del segundo equipo";}elseif($_SESSION['fallo'][26]=="semestre2"){$x="semestre del segundo equipo";}elseif($_SESSION['fallo'][26]=="nombre3"){$x="nombre del tercer equipo";}elseif($_SESSION['fallo'][26]=="matricula3"){$x="matricula del tercer equipo";}elseif($_SESSION['fallo'][26]=="carrera3"){$x="carrera del tercer equipo";}elseif($_SESSION['fallo'][26]=="semestre3"){$x="semestre del tercer equipo";}elseif($_SESSION['fallo'][26]=="nombre4"){$x="nombre del cuarto equipo";}elseif($_SESSION['fallo'][26]=="matricula4"){$x="matricula del cuarto equipo";}elseif($_SESSION['fallo'][26]=="carrera4"){$x="carrera del cuarto equipo";}else{$x="semestre del cuarto equipo";} if($_SESSION['fallo'][25]==1 && isset($_SESSION['fallo'][26])){echo' <div class="alert-message danger"> <a class="close" href="index.php">×</a> <p><strong>Error!</strong> Los datos que ha ingresado en '.$x.' no son correctos.</p> </div>';}	 elseif($_SESSION['fallo'][25]==1 ){echo' <div class="alert-message danger"> <a class="close" href="index.php">×</a> <p><strong>Error!</strong> Las matriculas, correo electronico o el numero telefónico son incorrectos.</p>  </div> ';}elseif($_SESSION['fallo'][25]==2 ){echo' <div class="alert-message danger"> <a class="close" href="index.php">×</a> <p><strong>Error!</strong> Ya contamos con tu registro, no es necesario registrarse de nuevo.</p></div>';}elseif($_SESSION['full'][0]==3 ){ echo' <div class="alert-message info"><a class="close" href="index.php">×</a><p><strong>Registro exitoso!</strong> su numero de registro es <strong>'.$_SESSION['full'][1].'</strong> hacer <a  href="generar/'.$_SESSION['full'][2].'/'.$_SESSION['full'][1].'.pdf">click aqui</a > para generar reporte</p></div> ';}else{} ?>
				
				<form  class="contact_form" id="fom" method="post" action="generar/index.php">
						<fieldset>
						
						
						<div class="clear"></div><br><ul class="bullet_2">
								<li><h5>Información de la institución participante:</h5></li>
						        </ul>
						<p>
										<label>Seleccionar maratón:</label>
										<select name="carrera" class="select_style required" >
												<option ></option>
												<option value="1">Administración </option>
												<option value="2">Mercadotecnia </option>
										</select>
								</p>
								<p>
										<label>Universidad:</label>
										<input name="universidad" class="required" value="<?php echo (isset($_SESSION['fallo'][1]))? $_SESSION['fallo'][1] : '' ?>"/>
								</p>
								<p>
										<label>Facultad:</label>
										<input name="facultad" class="required" value="<?php echo (isset($_SESSION['fallo'][2]))? $_SESSION['fallo'][2] : '' ?>"/>
								</p>
								<p>
										<label>Nombre director:</label>
										<input name="director" class="required" value="<?php echo (isset($_SESSION['fallo'][3]))? $_SESSION['fallo'][3] : '' ?>"/>
								</p>
								<p>
										<label>Numero de afiliación:</label>
										<input name="afiliacion" class="required" value="<?php echo (isset($_SESSION['fallo'][4]))? $_SESSION['fallo'][4] : '' ?>"/>
								</p>
								
								<div class="clear"></div><br><br><ul class="bullet_2">
								<li><h5>Información del asesor del equipo participante:</h5></li>
						        </ul>
								
								
								<p>
										<label>Nombre:</label>
										<input name="nombre_asesor" class="required" value="<?php echo (isset($_SESSION['fallo'][5]))? $_SESSION['fallo'][5] : '' ?>"/>
								</p>
								<p>
										<label>Grado academico:</label>
										<input name="grado_academico" class="required" value="<?php echo (isset($_SESSION['fallo'][6]))? $_SESSION['fallo'][6] : '' ?>"/>
								</p>
								<p>
										<label>Correo electronico:</label>
										<input name="email" class="required" value="<?php echo (isset($_SESSION['fallo'][7]))? $_SESSION['fallo'][7] : '' ?>"/>
								</p>
								<p>
										<label>Telefono:</label>
										<input name="tel" class="number" value="<?php echo (isset($_SESSION['fallo'][8]))? $_SESSION['fallo'][8] : '' ?>"/>
								</p>
								
								
								
								<div class="clear"></div><br><br><ul class="bullet_2">
								<li><h5>Información de los integrantes del equipo participante:</h5></li>
						        </ul>
								
								
								<p>
										<label>Nombre:</label>
										<input name="nombre1" class="required" value="<?php echo (isset($_SESSION['fallo'][9]))? $_SESSION['fallo'][9] : '' ?>"/>
								</p>
								<p>
										<label>Matricula:</label>
										<input name="matricula1" class="number" value="<?php echo (isset($_SESSION['fallo'][10]))? $_SESSION['fallo'][10] : '' ?>"/>
								</p>
								<p>
										<label>Carrera:</label>
										<input name="carrera1" class="required" value="<?php echo (isset($_SESSION['fallo'][11]))? $_SESSION['fallo'][11] : '' ?>"/>
								</p>
								<p>
										<label>Semestre:</label>
										<select name="semestre1" class="select_style required" >
												<option value="<?php echo (isset($_SESSION['fallo'][12]))? $_SESSION['fallo'][12] : ''; ?>"><?php echo (isset($_SESSION['fallo'][12]))? $_SESSION['fallo'][12] : ''; ?></option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
										</select>
								</p>
								
								<div class="clear"></div><br><br>
								
                                




                                <div class="clear"></div><br><ul class="bullet_2">
								<li><h5>Información de los integrantes del equipo participante:</h5></li>
						        </ul>
								
								
								<p>
										<label>Nombre:</label>
										<input name="nombre2" class="required" value="<?php echo (isset($_SESSION['fallo'][13]))? $_SESSION['fallo'][13] : '' ?>"/>
								</p>
								<p>
										<label>Matricula:</label>
										<input name="matricula2" class="number"/ value="<?php echo (isset($_SESSION['fallo'][14]))? $_SESSION['fallo'][14] : '' ?>">
								</p>
								<p>
										<label>Carrera:</label>
										<input name="carrera2" class="required" value="<?php echo (isset($_SESSION['fallo'][15]))? $_SESSION['fallo'][15] : '' ?>"/>
								</p>
								<p>
										<label>Semestre:</label>
										<select name="semestre2" class="select_style required" >
												<option value="<?php echo (isset($_SESSION['fallo'][16]))? $_SESSION['fallo'][16] : ''; ?>"><?php echo (isset($_SESSION['fallo'][16]))? $_SESSION['fallo'][16] : ''; ?></option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
										</select>
								</p>
								
								
								<div class="clear"></div><br><br><ul class="bullet_2">
								<li><h5>Información de integrantes:</h5></li>
						        </ul>
								
								
								<p>
										<label>Nombre:</label>
										<input name="nombre3" class="required" value="<?php echo (isset($_SESSION['fallo'][17]))? $_SESSION['fallo'][17] : '' ?>"/>
								</p>
								<p>
										<label>Matricula:</label>
										<input name="matricula3" class="number" value="<?php echo (isset($_SESSION['fallo'][18]))? $_SESSION['fallo'][18] : '' ?>"/>
								</p>
								<p>
										<label>Carrera:</label>
										<input name="carrera3" class="required" value="<?php echo (isset($_SESSION['fallo'][19]))? $_SESSION['fallo'][19] : '' ?>"/>
								</p>
								<p>
										<label>Semestre:</label>
										<select name="semestre3" class="select_style required" >
												<option value="<?php echo (isset($_SESSION['fallo'][20]))? $_SESSION['fallo'][20] : ''; ?>"><?php echo (isset($_SESSION['fallo'][20]))? $_SESSION['fallo'][20] : ''; ?></option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
										</select>
								</p>

								
								
								<!----------->
								
								
								<div class="clear"></div><br><br><ul class="bullet_2">
								<li><h5>Información de integrantes:</h5></li>
						        </ul>
								
								
								<p>
										<label>Nombre:</label>
										<input name="nombre4" class="required" value="<?php echo (isset($_SESSION['fallo'][21]))? $_SESSION['fallo'][21] : '' ?>"/>
								</p>
								<p>
										<label>Matricula:</label>
										<input name="matricula4" class="number" value="<?php echo (isset($_SESSION['fallo'][22]))? $_SESSION['fallo'][22] : '' ?>"/>
								</p>
								<p>
										<label>Carrera:</label>
										<input name="carrera4" class="required" value="<?php echo (isset($_SESSION['fallo'][23]))? $_SESSION['fallo'][23] : '' ?>"/>
								</p>
								<p>
										<label>Semestre:</label>
										<select name="semestre4" class="select_style required" >
												<option value="<?php echo (isset($_SESSION['fallo'][24]))? $_SESSION['fallo'][24] : ''; ?>"><?php echo (isset($_SESSION['fallo'][24]))? $_SESSION['fallo'][24] : ''; ?></option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
										</select>
								</p>



                             
								
								
								
								<div class="clear"></div>
								
								<p>
										<br><input name="ordenador" class="submit" type="submit" value=""/>
								</p>
								<div id="result"></div>
						</fieldset>
						<input type="hidden" value="insertado" name="tipo" />
				</form>
		</div>
	
		<div class="sidebar"> 
				
		
				<div class="side_features">
						<h3>Datos importantes:</h3>
						<ul class="bullet_2">
								<li>Se les notifica que las constancias serán emitidas de acuerdo a la información proporcionada en el formulario.</li>
								<li>La constancia generada deberá estar firmada y sellada.</li>
								<li>Si ya te encuentras registrado y deseas modificar tus datos es necesario ingresar tu numero de folio en el siguiente <a href="update.php"><strong>enlace.</strong></a></li>
								<li>Si deseas consultar que tus datos hayan sido guardados correctamente, puedes acceder desde <a href="search.php"><strong>aqui.</strong></a></li>
						</ul>
				</div>
			
				
				<h5>Alguna sugerencia?</h5>
				<p>Para mas información o aclarar alguna duda puedes comunícate al siguiente correo electrónico: <br><strong>fcamxl1@gmail.com</strong></p>
				
				<div class="clear"></div>
		</div>
		
		
		<div class="clear"></div>
</div>



<div id="footer_bg">
		<div id="footer"> 
				
			
				<div class="column_3">
						<p>© copyright 2013 Universidad Autónoma de Baja California<br/>
								<a href="#">Mexicali B.C. </a> | Facultad de Ciencias ASdministrativas</p>
						<ul class="social">
								<li><a href="#"><img src="images/apple.png" width="16" height="16" alt="apple"></a></li>
								<li><a href="#"><img src="images/facebook.png" width="16" height="16" alt="apple"></a></li>
								<li><a href="#"><img src="images/googleplusone.png" width="16" height="16" alt="apple"></a></li>
						</ul>
				</div>
		
				
			
				<div class="column_3">
						<h4></h4>
						<div id="twitter"></div>
				</div>
			
				
			
				<div class="column_3_last">
						<h4>Consultar solucitud</h4>
						<div class="subscribe">
								<div class="sub_inner">
										<p>Ingrese su numero de folio para consultar su solicitud:</p>
										<form id="subform" method="post" action="index.php" target="_BLACK">
												<fieldset>
														<p>
																<input id="email" name="email" onfocus="if (this.value == 'Please enter your email to signup') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Please enter your email to signup';}"  />
														</p>
														<p>
																<input name="busc" class="sub_submit" type="submit" value="Signup"/>
														</p>
												</fieldset>
										</form>
								</div>
						</div>
				</div>
			
		</div>
		<div class="clear"></div>
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
<?php $sesiones=array($_SESSION['fallo'],$_SESSION['full']); session_destroy() or die("Error"); unset($sesiones); echo ($flag==true)? '<script type="text/javascript">alert("Los datos que ha ingresado no son correctos, por favor intente de nuevo!")</script>' : ''; ?>