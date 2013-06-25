<?php session_start(); if( isset($_POST['ordenador']) && $_POST['tipo']=='update' && isset($_GET['2up'])) {              require_once '../clase406.php'; 	         require_once '../config.php';              $db = new MySQL(); 			 $codigo_actualizar=xss_clean($_GET['2up']);              $b=array();              while ($post = each($_POST)){                    $b[]=xss_clean(ucwords($post[1]));              }	 	         foreach ($_POST as $key => $value){              if (empty($value) && $key!="tipo" && $key!="ordenador"  && $key!="email" ){ 		         $espacio_blanco=1;  				 $errors=$key; 	 break;} }  if((num($b[8]) && num($b[10]) && num($b[14]) && num($b[18]) && num($b[22]))==false || $espacio_blanco==1 || emailv($b[7])==false){     $error=1;  $_SESSION['fallo']=array($b[0],$b[1],$b[2],$b[3],$b[4],$b[5],$b[6],$b[7],$b[8],$b[9],$b[10],$b[11],$b[12],$b[13],$b[14],$b[15],$b[16],$b[17],$b[18],$b[19],$b[20],$b[21],$b[22],$b[23],$b[24],$error,$errors); 	             ob_start(); header('Location: ..\edit.php?2up='.$codigo_actualizar.''); ob_end_flush(); 		     } 		     else{ 		         $query = $db->consulta("SELECT COUNT(*) FROM usuarios");                   $row = $db->fetch_array($query); 	             $ipe=ip(); 	             $nameasesor=$b[5]; 			     $code=generarCodigo(10).$row[0]; 				 $fecha=gmdate('Y-m-d'); 				 $consulta = "SELECT *";  		         $consulta .= " FROM usuarios";  		         $consulta .= " WHERE nomasesor like '%$nameasesor%'";  		         $sql = $db->consulta($consulta);  	             $results = $db->num_rows($sql);              if($results>=2){ 				 $error=2; 				 $_SESSION['fallo']=array($b[0],$b[1],$b[2],$b[3],$b[4],$b[5],$b[6],$b[7],$b[8],$b[9],$b[10],$b[11],$b[12],$b[13],$b[14],$b[15],$b[16],$b[17],$b[18],$b[19],$b[20],$b[21],$b[22],$b[23],$b[24],$error,$z); 	             ob_start(); header('Location: ..\edit.php?2up='.$codigo_actualizar.''); ob_end_flush(); 	         }else{ 			  $insert = $db->consulta("UPDATE usuarios SET carreragen='$b[0]',universidad='$b[1]',facultad='$b[2]',director='$b[3]',afiliacion='$b[4]',nomasesor='$b[5]',gradacademico='$b[6]',email='$b[7]',tel='$b[8]',nombre1='$b[9]',matricula1='$b[10]',carrera1='$b[11]',semestre1='$b[12]',nombre2='$b[13]',matricula2='$b[14]', 			  carrera2='$b[15]',semestre2='$b[16]', nombre3='$b[17]',matricula3='$b[18]',carrera3='$b[19]',semestre3='$b[20]',nombre4='$b[21]',matricula4='$b[22]',carrera4='$b[23]',semestre4='$b[24]' WHERE codigo='$codigo_actualizar'");  $bander=true; }}  }  else{ ob_start(); header('Location: ..\update.php'); ob_end_flush(); }  if(isset($bander) && $bander==true){  require('fpdf/fpdf.php'); class PDF extends FPDF{ function Header(){ $this->Image('logo.jpg',0,0,210);          $this->Ln(50);     global $title;          $this->SetFont('Arial','B',13);          $this->SetDrawColor(0);          $this->SetTextColor(0,0,0);          $this->SetLineWidth(1);          $this->SetXY(84,34);          $this->Cell(0,0,$title,0,0,'L',0);          $this->Ln(10); 	     global $title2; 	     $this->SetFont('Arial','B',13); 	     $this->SetTextColor(0,0,0);          $this->Cell(269,-20,$title2,0,0,'C',0); 	     $this->Ln(20); 	     }          function Footer(){          $this->SetY(-15);          $this->SetFont('Arial','',8);          $this->SetTextColor(128);          $this->Cell(0,10,'Página '.$this->PageNo(),0,0,'R');          }          function ChapterTitle($num, $label)          {          $this->SetFont('Arial','',12);          $this->SetFillColor(200,220,255);          $this->Ln(4);          }          function ChapterBody($file){                $b=array();          foreach($_POST as $nombre_campo => $valor){                 $b[]=xss_clean(ucwords($valor));          }
   
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

";
    
         $this->SetFont('helvetica','',12);          $this->SetXY(65,43);          $this->MultiCell(162,5.5,$txt);          $this->Ln();          $this->SetFont('','','I');          $this->SetXY(37,250);          }          function PrintChapter($num, $title, $file){          $this->AddPage();          $this->ChapterTitle($num,$title);          $this->ChapterBody($file);          }      }          ($b[0]==1)? $tache1='X' : $tache2='X';          $pdf = new PDF();          $title = $tache1;          $title2 = $tache2;          $pdf->SetTitle($title);          $pdf->PrintChapter(1,'',''); 		 $consulta = "SELECT *";  		 $consulta .= " FROM usuarios";  		 $consulta .= " WHERE codigo like '%$codigo_actualizar%'";  		 $sql = $db->consulta($consulta);         	     $results = $db->fetch_array($sql);          ($b[0]==1)? $carpeta="administracion" : $carpeta="mercadotecnia"; 	     ($b[0]==1)? $documento=$results['codigo'].".pdf" : $documento=$results['codigo'].".pdf"; 	     $fh = fopen($carpeta.'/'.$documento, 'a');          fwrite($fh, '');          fclose($fh);          unlink($carpeta.'/'.$documento);          $pdf->Output($carpeta.'/'.$documento,'F');          $error=3; 		 $_SESSION['full']=array($error,$code,$carpeta); 	     ob_start(); header('Location: ..\edit.php?2up='.$results['codigo'].''); ob_end_flush(); 		          } ?>