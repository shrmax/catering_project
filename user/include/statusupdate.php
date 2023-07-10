<?php

if (isset($_POST["cancel"])){
  
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    $status='canceled';
  statusupdate($con,$_POST['cancel'],$status);

}

else{
    header("location: ../mybookings.php");
}