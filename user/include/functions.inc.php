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
        session_start();
        $_SESSION["userid"] = $nameexists["usr_id"];
        $_SESSION["username"] = $nameexists["name"];
        header("location: ../index.php");
    }

    // header("location: ../index.php?error=none");
    // exit();
}

function feedback($con,$name,$msg){
    $sql= "INSERT INTO feedback (name,msg) VALUES (?,?);";
    $stmt= mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../contact_us.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss",$name,$msg);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../contact_us.php?error=nothing");
    exit();
}
