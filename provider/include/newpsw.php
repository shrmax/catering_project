<?php
session_start();    
if (isset($_POST["submit"])){ 
$oldpsw = $_POST['oldpsw'];
$newpsw = $_POST['newpsw'];
$confirmdpsw = $_POST['confirmpsw'];
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
if(!pwdmatch($newpsw,$confirmdpsw)){
    updatepsw($con,$oldpsw,$newpsw,$_SESSION["providername"]);
}
else{
    header("location: ../changepsw.php?error=nmatch");
}
}

else{
    header("location: ../changepsw.php");    
}