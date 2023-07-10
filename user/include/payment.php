<?php

if (isset($_POST["sub"])){
  
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
   $method=$_POST['paymentMethod'];
   $trans_id=$_POST['trans_id'];
   $cname=$_POST['card_name'];
   $cno=$_POST['card_no'];
   $cexp=$_POST['card_expiry'];
   $cvv=$_POST['cvv'];
   $tt=$_POST['tot'];
   $oid=$_POST['pid'];
   $m=$method;
//    echo $oid;
payment($con,$oid,$m,$tt,$trans_id,$cname,$cno,$cexp,$cvv);

}

else{
    header("location: ../pay.php");
}