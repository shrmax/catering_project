<?php

if (isset($_POST["submit"])){
  $name = $_POST["name"];  
  $pwd = $_POST['psw'];  
  
  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';
  
  loginAdmin($con,$name,$pwd );
  // echo 'it is working';
}

else{
    header("location: ../index.php");
}