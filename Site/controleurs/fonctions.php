<?php
/**
 * Fonctions liées aux contrôleurs
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'lib/PHPMailer/src/Exception.php';
require 'lib/PHPMailer/src/PHPMailer.php';
require 'lib/PHPMailer/src/SMTP.php';

require_once ('lib/jpgraph/src/jpgraph.php');
require_once ('lib/jpgraph/src/jpgraph_log.php');
require_once ('lib/jpgraph/src/jpgraph_line.php');
require_once ('lib/jpgraph/src/jpgraph_scatter.php');
require_once ('lib/jpgraph/src/jpgraph_bar.php');
function getOS($ua = '')
{
    if(!isset($ua)) 
		{
			$ua = $_SERVER['HTTP_USER_AGENT'];
		}
	
    $os = 'Système d&#39;exploitation inconnu';
    //Uniformise les différentes versions de chaque système d'exploitation.
    $os_arr = Array(                             
                     // -- Windows
                     '/Windows NT 10.0/'     => 'Windows',
                     '/Windows NT 6.1/'       => 'Windows',
                     '/Windows NT 6.0/'       => 'Windows',
                     '/Windows NT 5.2/'       => 'Windows',
                     '/Windows NT 5.1/'       => 'Windows',
                     '/Windows NT 5.0/'       => 'Windows',
                     '/Windows 2000/'         => 'Windows',
                     '/Windows CE/'           => 'Windows',
                     '/Win 9x 4.90/'          => 'Windows',
                     '/Windows 98/'           => 'Windows',
                     '/Windows 95/'           => 'Windows',
                     '/Win95/'                => 'Windows',
                     '/Windows NT/'           => 'Windows',
                     
                     // -- Linux
                     '/Ubuntu/'               => 'Linux',
                     '/Fedora/'               => 'Linux',
                     '/Linux/'                => 'Linux',
                     
                     // -- Mac
                     '/Macintosh/'            => 'Mac',
                     '/Mac OS X/'             => 'Mac',
                     '/Mac_PowerPC/'          => 'Mac',
                     
                     // -- Autres ...
                    
                     '/Mac/'                  => 'Mac',
                   );
    
	//Regarde si l'os est référencé dans la liste précédente, et prend cette valeur si oui
    $ua = strtolower($ua); 
    foreach($os_arr as $k => $v)
	{ 
        if(preg_match_all(strtolower($k),$ua))
        {
            $os = $v;
            break;
        }
    }
    return $os;
}



/********************************************************
   Fonction : isString
----------------------------------------------
   @Desc    : Détermine si le paramètre est une string (chaîne de caractères) ou non
   @Param   : $string (mixed) l'objet à tester
   @Return  : (boolean)
*/
function isString($string) : bool
{
	//Vérifie que l'objet n'est pas vide
    if (empty($string)) 
	{
        return false;
    } 
	else 
	{
		$string = strip_tags($string);    //Enlève les <>
		$string = stripslashes($string);  //Enlève TOUS les \   => empêche la lecture de script
        return is_string($string);
    }
}

/********************************************************
   Fonction : isPassword
----------------------------------------------
   @Desc    : Détermine si le paramètre respecte les spécifications d'un mot de passe
   @Param   : $string (mixed) l'objet à tester
   @Return  : (boolean) true si l'utilisateur est connecté
*/
function isPassword($string) : bool
{
   //On vérifie que l'objet n'est pas vide et respecte une taille minimale
	if (!isString($string) || strlen($string) < 8) 
	{
    	return false;
    } 
	else 
	{
     	return is_string($string);
    }
}

function hashPassword(string $password) {
    return sha1($password);
    //return password_hash($password, PASSWORD_BCRYPT);
}

/*************************************
Fonction : sendMail
----------------------------------------------
  @Desc    : Envoie un mail à un utilisateur (réinitialisaiton mot de passe...)
  @Param   : 
  @Return  : (bool) true si mail bien envoyé
*/
function passwordMatch($password,$password2)           
{
        if($password==$password2){
            return true;
        }
        else{
            return false;
        }
}

function receiveMail($email,$last_name,$first_name,$subject,$message){
    $mail = new PHPMailer(true);
           $mail->isSMTP();                                            // Send using SMTP
               $mail->Host       = 'smtp.free.fr';                    // Set the SMTP server to send through
               $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
               $mail->Username   = 'health.foundation.g3c@free.fr';                     // SMTP username
               $mail->Password   = "q0fvwtpy";                               // SMTP password
               $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
               $mail->Port       =587;     
               $mail->setFrom('health.foundation.g3c@free.fr', 'Health Foundation');
               $mail->addAddress('health.foundation.g3c@gmail.com','Health Foundation -  Contact'); 
               if ($mail->addReplyTo($email, $last_name,$first_name,$subject,$message)){ 
                   $mail->Subject = 'Contact';
                   $mail->isHTML(false);
                   $mail->Body = "
                   Email: $email
                   Nom : $last_name
                   Prénom : $first_name
                   Objet : $subject
                   Message: $message
                   ";
               $mail->send();
                   if (!$mail->send()) {
                          return false;
                       } 
           else {
                         return true;
                   }
       }
            else {
               $erreur = 'Adresse mail invalide, vérifiez l&#39écriture';
           }
   
}
      
      
      
/*************************************
Fonction : sendMail
----------------------------------------------
  @Desc    : Envoie un mail à un utilisateur (réinitialisaiton mot de passe...)
  @Param   : 
  @Return  : (bool) true si mail bien envoyé
*/
function sendMail(string $email,$subject,$message)           
{
    $mail = new PHPMailer(true);
           $mail->isSMTP();                                            // Send using SMTP
               $mail->Host       = 'smtp.free.fr';                    // Set the SMTP server to send through
               $mail->SMTPAuth   = true;    
               $mail->Username   = 'health.foundation.g3c@free.fr';                     // SMTP username
               $mail->Password   = "q0fvwtpy";                               // SMTP password
               $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
               $mail->Port       = 587;     
               $mail->setFrom('health.foundation.g3c@free.fr', 'Health Foundation');
               $mail->addAddress($email,$subject); 
               if ($mail->addReplyTo('no-reply-health.foundation.g3c@free.fr')){ 
                   $mail->Subject = '$subject';
                   $mail->isHTML(false);
                   $mail->Body = "
                   $message
                   ";
               $mail->send();
                   if (!$mail->send()) {
                          return false;
                       } 
           else {
                          return true;
                   }
       }
            else {
               $error = "Adresse mail invalide, vérifiez l'écriture";
           }
    
           
}
function editProfil($dataToEdit,$function) {
    if(isset($dataToEdit)){ 
        //if(isString($newData)|| is_int($newData)){
        $function;
        header("Location:index.php?redirect=user&function=modificationProfil");
           // }
    }
}
function drawPointGraphics($title,$datax,$datay){
    
     
   
     
    $graph = new Graph(600,400);
    $graph->SetScale("linlin");
     
    $graph->img->SetMargin(40,40,40,40);        
    $graph->SetShadow();
     
    $graph->title->Set("$title");
    $graph->title->SetFont(FF_FONT1,FS_BOLD);
     
    $sp1 = new ScatterPlot($datay,$datax);
     
    $graph->Add($sp1);
    $graph->Stroke();
     
    
}

function drawBarGraphics($title,$datatest1,$datatest2,$datatest3,$datatest4){
    $graph = new Graph(600,400,'auto');
    $graph->SetScale("textlin");

    $graph->SetBox(false);
    $graph->ygrid->SetFill(false);
    $graph->xaxis->SetTickLabels(array('F','M'));

    $b1plot = new BarPlot($datatest1);
    $b2plot = new BarPlot($datatest2);
    $b3plot = new BarPlot($datatest3);
    $b4plot = new BarPlot($datatest4);

    $gbplot = new GroupBarPlot(array($b1plot,$b2plot,$b3plot,$b4plot));
    $graph->Add($gbplot);
    $b1plot->SetColor("white");
    $b1plot->SetFillColor("#cc1111");


    $b2plot->SetColor("white");
    $b2plot->SetFillColor("#11cccc");

    $b3plot->SetColor("white");
    $b3plot->SetFillColor("#1111cc");

    $b4plot->SetColor("white");
    $b4plot->SetFillColor("#5511cc");
    $graph->title->Set($title);

    $graph->Stroke();
}
?>