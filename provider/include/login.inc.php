<?php

if (isset($_POST["submit"])){
  $name = $_POST["vname"];  
  $pwd = $_POST['vpsw']; 
  // echo $name; 
  // echo $pwd;

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';
  loginprovider($con,$name,$pwd);
}

else{
    header("location: ../index.php");
}