
<?php

     
   
 
//connexion à la base de données:
$BDD = array();
$BDD['host'] = "localhost";
$BDD['user'] = "root";
$BDD['pass'] = "root";
$BDD['db'] = "health_foundation";
$mysqli = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);
if(!$mysqli) {
    echo "Connexion non établie.";
    exit;
}
?>
<?php 
    
 
    
    if(isset($_POST['result'])){
        // VALUES 
        $score=$_POST['result'];
            echo ("jdiej");
        $database=connectdb();
    $reqInsertQuestion =  $database->prepare("INSERT INTO psychotestEnLigne (id,nom_pilote,score) VALUES ( 0,'ghh',?)");
    $reqInsertQuestion->execute(array(150));

    //mysql_query('INSERT INTO psychotestEnLigne ($score) VALUES ( '.($score).')');
       
    }
    ?>





<!DOCTYPE html >
<html  lang="fr" >
  <head>
		
    <title>Test psychotechnique en ligne</title>
    
  
	
	<link rel="stylesheet" type="text/css" href="psychotestEnLigne.css" />
	<script type="text/javascript" src="js/questions.js"></script>
    <script type="text/javascript" src="js/sqb.js"></script>
  </head>


  <body onload="start();">
    <div id="main">
      <div id="titre">.</div>
      <div id="instructions">.</div>
      <div id="questions">.</div>
    </div>
	

  <script src="script.js"></script> 
  </body>
  
</html>


