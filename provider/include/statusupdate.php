<?php

if (isset($_POST["reject"])){
  
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    $status='rejected';
  statusupdate($con,$_POST['reject'],$status);

}
elseif(isset($_POST['accept'])){
  require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    $status='accepted';
  statusupdate($con,$_POST['accept'],$status);
}

else{
    header("location: ../mybookings.php");
}