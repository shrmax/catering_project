<?php
session_start();    
if (isset($_POST["submit"])){ 
$name = $_POST['name'];
$newpsw = $_POST['newpsw'];
$confirmdpsw = $_POST['confirmpsw'];
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
if(!pwdmatch($newpsw,$confirmdpsw)){
    forgotpsw($con,$newpsw,$name);
}
else{
    header("location: ../newpsw.php?error=nmatch");
}
}

else{
    header("location: ../changepsw.php");    
}