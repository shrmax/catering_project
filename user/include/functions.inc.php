<?php
function pwdmatch($pwd,$repeat_pwd){
    // $result;
    if($pwd !== $repeat_pwd){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}
function nameexist($con,$name,$email){
    $sql= "SELECT * FROM signup  WHERE name=? OR  email=?;";
    $stmt= mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss",$name,$email);
    mysqli_stmt_execute($stmt);
    
    $resultdata= mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultdata)){
        return $row;
    }
    else{
        $result=false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($con,$name,$phone_no,$email,$pwd){
    $sql= "INSERT INTO signup (name,phone_no,email,password) VALUES (?,?,?,?);";
    $stmt= mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    $hashedpsw=password_hash($pwd,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"ssss",$name,$phone_no,$email,$hashedpsw);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../index.php?error=none");
    exit();
}

function loginUser($con,$name,$pwd){
    $nameexists= nameexist($con,$name,$name);
    if ($nameexists ===false){
        // echo "<script>alert('name dont exist.')</script>";
        header("location: ../index.php?error=namedontexist");
    exit();
    }
    $checkpsw=true;
   $pswhashed=$nameexists['password'];
   $checkpsw=password_verify($pwd,$pswhashed);
    
    if ($checkpsw === false){
        header("location: ../index.php?error=pwddontmatch ");
        exit();
    }
    else if ($checkpsw === true){
        if ($nameexists['status']!='blocked'){
        session_start();
        $_SESSION["userid"] = $nameexists["usr_id"];
        $_SESSION["username"] = $nameexists["name"];
        $_SESSION['number'] = $nameexists['phone_no'];
                header("location: ../index.php");
        }
        else
        header("location: ../index.php?error=blocked");
    }

    // header("location: ../index.php?error=none");
    exit();
}

function feedback($con,$name,$msg){
    $sql= "INSERT INTO feedback (name,msg,date) VALUES (?,?,?);";
    $stmt= mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../contact_us.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"sss",$name,$msg,date("Y/m/d"));
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../contact_us.php?error=nothing");
    exit();
}
function addprofile($con,$image){
    $sql= "UPDATE signup SET image=? where usr_id=".$_SESSION['userid'].";";
    $stmt= mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:../items.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$image);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../profile.php?error=added");
    exit();
}
function updatepsw($con,$oldpsw,$newpsw,$user){
    $nameexists= nameexist($con,$user,$user);
    $pswhashed=$nameexists['password'];
   $checkpsw=password_verify($oldpsw,$pswhashed);
   if ($checkpsw==true){
    $hashedpsw=password_hash($newpsw,PASSWORD_DEFAULT);
    $sql= "UPDATE signup SET password=? where usr_id=".$_SESSION['userid'].";";
    $stmt= mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:../items.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$hashedpsw);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../profile.php?error=newpsw");
    exit();
   }
   else
   header("location: ../changepsw.php?error=dmatch");
}
function forgotpsw($con,$newpsw,$user){
    $hashedpsw=password_hash($newpsw,PASSWORD_DEFAULT);
    $sql= "UPDATE signup SET password=? where name='".$user."';";
    $stmt= mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$hashedpsw);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../index.php?error=changed");
    exit();
}
function order($con,$no_ppl,$date,$time,$loc,$phone_no,$email,$juice,$veg,$non_veg,$deserts,$request,$grand,$event,$user,$provider){
    $sql= "INSERT INTO orders (order_date,user_id,provider_id,event_id,number_ppl,address,alternative_phone_no,event_date,time,request,veg_ids,non_veg_ids,juice_ids,desert_ids,grand_total) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
    $stmt= mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../confirmorder.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"sssssssssssssss",date("Y/m/d"),$user,$provider,$event,$no_ppl,$loc,$phone_no,$date,$time,$request,$veg,$non_veg,$juice,$deserts,$grand);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    echo '<script> document.location = "mybookings.php?";</script>';
    exit();

}
function statusupdate($con,$id,$status){
    $sql= "UPDATE orders SET status=? where order_id=".$id.";";
    $stmt= mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:../mybookings.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$status);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../mybookings.php?canceled");
    exit();
}
function payment($con,$oid,$method,$amt,$trans_id,$cname,$cno,$cexp,$cvv){
    $sql= "INSERT INTO payment (py_date,or_id,py_method,py_amt,trans_id,card_name,card_no,exp,cvv) VALUES (?,?,?,?,?,?,?,?,?);";
    $stmt= mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:../payment.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"sssssssss",date('Y/m/d'),$oid,$method,$amt,$trans_id,$cname,$cno,$cexp,$cvv);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../mybookings.php");
    exit();
}