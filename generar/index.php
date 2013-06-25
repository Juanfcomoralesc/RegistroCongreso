<?php session_start();  if( isset($_POST['ordenador']) && $_POST['tipo']=='insertado') {     require_once '../clase406.php'; 	 require_once '../config.php';  $db = new MySQL(); $b=array();  while ($post = each($_POST)){  $b[]=xss_clean(ucwords($post[1])); } foreach ($_POST as $key => $value){ if (!valida($value) && $key!="tipo" && $key!="ordenador"  && $key!="email" ){ $espacio_blanco=1;  $errors=$key; break;} }  if((num($b[8]) && num($b[10]) && num($b[14]) && num($b[18]) && num($b[22]))==false || $espacio_blanco==1 || emailv($b[7])==false){ $error=1; $_SESSION['fallo']=array($b[0],$b[1],$b[2],$b[3],$b[4],$b[5],$b[6],$b[7],$b[8],$b[9],$b[10],$b[11],$b[12],$b[13],$b[14],$b[15],$b[16],$b[17],$b[18],$b[19],$b[20],$b[21],$b[22],$b[23],$b[24],$error,$errors); ob_start(); header('Location: ..\index.php'); ob_end_flush(); }else{	$query = $db->consulta("SELECT COUNT(*) FROM usuarios"); $row = $db->fetch_array($query);  $ipe=ip(); $nameasesor=$b[5]; $code=generarCodigo(10).$row[0];  $fecha=gmdate('Y-m-d');	 $consulta = $db->consulta("SELECT * FROM usuarios WHERE nomasesor like '%$nameasesor%' AND ip like '%$ipe%' ORDER BY id ASC");  $results = $db->num_rows($consulta); 	if($results>=3){  $error=2; $_SESSION['fallo']=array($b[0],$b[1],$b[2],$b[3],$b[4],$b[5],$b[6],$b[7],$b[8],$b[9],$b[10],$b[11],$b[12],$b[13],$b[14],$b[15],$b[16],$b[17],$b[18],$b[19],$b[20],$b[21],$b[22],$b[23],$b[24],$error); ob_start(); header('Location: ..\index.php'); ob_end_flush();	}else{  $insert = $db->consulta("INSERT INTO usuarios (carreragen,universidad,facultad,director,afiliacion,nomasesor,gradacademico,email,tel,nombre1,matricula1,carrera1,semestre1,nombre2,matricula2,carrera2,semestre2, nombre3,matricula3,carrera3,semestre3,nombre4,matricula4,carrera4,semestre4,codigo,fecha,ip) VALUES ('$b[0]','$b[1]','$b[2]','$b[3]','$b[4]','$b[5]','$b[6]','$b[7]','$b[8]','$b[9]','$b[10]','$b[11]','$b[12]','$b[13]','$b[14]','$b[15]','$b[16]','$b[17]','$b[18]','$b[19]','$b[20]','$b[21]','$b[22]','$b[23]','$b[24]','$code','$fecha','$ipe')");  $bander=true;  }  } } else{ ob_start(); header('Location: ..\index.php'); ob_end_flush(); }  if(isset($bander) && $bander==true){ require('fpdf/fpdf.php'); class PDF extends FPDF{ function Header(){ $this->Image('logo.jpg',0,0,210); $this->Ln(50); global $title; $this->SetFont('Arial','B',13); $this->SetDrawColor(0); $this->SetTextColor(0,0,0); $this->SetLineWidth(1); $this->SetXY(84,34); $this->Cell(0,0,$title,0,0,'L',0); $this->Ln(10); global $title2; $this->SetFont('Arial','B',13);  $this->SetTextColor(0,0,0);  $this->Cell(269,-20,$title2,0,0,'C',0); $this->Ln(20);} function Footer(){ $this->SetY(-15); $this->SetFont('Arial','',8); $this->SetTextColor(128); $this->Cell(0,10,'Página '.$this->PageNo(),0,0,'R');} function ChapterTitle($num, $label){ $this->SetFont('Arial','',12); $this->SetFillColor(200,220,255); $this->Ln(4);} function ChapterBody($file) { $b=array(); foreach($_POST as $nombre_campo => $valor){ $b[]=xss_clean(ucwords($valor));}
   
             $txt="
".$b[1]."
".$b[2]."
".$b[3]."
".$b[4]."


".$b[5]."
".$b[6]."
".$b[7]."
".$b[8]."


".$b[9]."
".$b[10]."
".$b[11]."
".$b[12]."

".$b[13]."
".$b[14]."
".$b[15]."
".$b[16]."

".$b[17]."
".$b[18]."
".$b[19]."
".$b[20]."

".$b[21]."
".$b[22]."
".$b[23]."
".$b[24]."

"; $this->SetFont('helvetica','',12); $this->SetXY(65,43); $this->MultiCell(162,5.5,$txt); $this->Ln(); $this->SetFont('','','I'); $this->SetXY(37,250);}function PrintChapter($num, $title, $file){ $this->AddPage(); $this->ChapterTitle($num,$title); $this->ChapterBody($file);} }($b[0]==1)? $tache1='X' : $tache2='X'; $pdf = new PDF(); $title = $tache1; $title2 = $tache2; $pdf->SetTitle($title); $pdf->PrintChapter(1,'',''); ($b[0]==1)? $carpeta="administracion" : $carpeta="mercadotecnia"; ($b[0]==1)? $documento=$code : $documento=$code; $pdf->Output($carpeta.'/'.$documento.'.pdf','F'); $error=3; $_SESSION['full']=array($error,$documento,$carpeta);  ob_start(); header('Location: ..\index.php'); ob_end_flush(); } ?>