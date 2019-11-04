<?php
session_start();

$_SESSION = array();
$_SESSION['isConnected']= false;
session_destroy();
header('Location:index.php');
?>