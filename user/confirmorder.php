<?php
error_reporting(E_ERROR | E_PARSE);
if(isset($_POST['submit'])){
    $no_ppl=$_POST['ppl'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $loc=$_POST['loc'];
    $phone_no=$_POST['phone_no'];
    $email=$_POST['email'];
    $juice=$_POST['juice_items'];
    $veg=$_POST['veg_items'];
    $non_veg=$_POST['non_veg_items'];
    $deserts=$_POST['deserts_items'];
    // $item=$_POST['item'];
    echo $no_ppl;
    echo $date;
    echo $time;
    echo $loc;
    echo $phone_no;
    echo $email;
    foreach($veg as $a){
        echo $a;
    }
    foreach($non_veg as $a){
        echo $a;
    }
    

}
?>