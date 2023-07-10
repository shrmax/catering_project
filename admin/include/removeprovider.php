<?php
session_start();
if (isset($_POST["submit"])){
  
  $id=intval($_POST['submit']); 
  echo $id;
  
  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  removeprovider($con,$id);
}

else{
    header("location: ../items.php");
}