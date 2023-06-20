<?php
session_start();
if (isset($_POST["submit"])){
  
  $id=intval($_POST['submit']); 
  echo $id;
  echo $_SESSION['table'];
  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  remove($con,$id);
}

else{
    header("location: ../items.php");
}