<?php
session_start();
if (isset($_POST["submit"])){
    $id=$_POST['foo'];
    $price=$_POST['price'];
  //  foreach ($id as $n){
  //  echo intval($n).'<br>' ;
  //  }
   $provider=intval($_SESSION['providerid']);
  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';
  additem($con,$id,$provider,$price);
}

else{
    header("location: ../index.php");
}