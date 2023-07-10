<?php
if (isset($_POST["submit"])){
  
  $id=intval($_POST['submit']); 
//   echo $id;
  
  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  block($con,$id);
}
if (isset($_POST["unblock"])){
  
  $id=intval($_POST['unblock']); 
//   echo $id;
  
  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';
 
  unblock($con,$id);
}

else{
    header("location: ../items.php");
}