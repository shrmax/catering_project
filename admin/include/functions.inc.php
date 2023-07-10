<?php
// for admin login
function nameexist($con,$name){
    $sql= "SELECT * FROM adminlogin  WHERE name=?;";
    $stmt= mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$name);
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


function loginAdmin($con,$name,$pwd){
    $nameexists= nameexist($con,$name);
    if ($nameexists ===false){
        // echo "<script>alert('name dont exist.')</script>";
        header("location: ../index.php?error=namedontexist");
        exit();
    }
    $checkpsw=false;
    // $checkpsw=true;
    if($pwd===$nameexists['password']){
        $checkpsw=true;
    }
    //    $pswhashed=$nameexists['password'];
    //    $checkpsw=password_verify($pwd,$pswhashed);
    
    if ($checkpsw === false){
        header("location: ../index.php?error=pwddontmatch ");
        exit();
    }
    else if ($checkpsw === true){
        header("location: ../adminindex.php");
        
        session_start();
        $_SESSION["id"] = $nameexists["id"];
        $_SESSION["admin"] = $nameexists["name"];
    }
    
    // header("location: ../index.php?error=none");
    // exit();
}
// for adding new provider
function providerexist($con,$name,$email){
    $sql= "SELECT * FROM providers  WHERE name=? or email=?;";
    $stmt= mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: insert.php?error=stmtfailed");
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

function createProvider($con,$name,$owner,$phone_no,$email,$address,$pwd){
    $sql= "INSERT INTO providers (name,owner_name,email,phone_no,address,password) VALUES (?,?,?,?,?,?);";
    $stmt= mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:insert.php?error=stmtfailed");
        exit();
    }
    $hashedpsw=password_hash($pwd,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"ssssss",$name,$owner,$email,$phone_no,$address,$hashedpsw);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../providers.php?error=none");
    exit();
}

function additem($con,$name,$description,$image){
    $sql= "INSERT INTO ".$_SESSION['table']." (image,name,description) VALUES (?,?,?);";
    $stmt= mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:../items.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"sss",$image,$name,$description);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../items.php?error=none");
    exit();
}
function addevent($con,$name,$description,$image){
    $sql= "INSERT INTO events (image,name,description) VALUES (?,?,?);";
    $stmt= mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:../events.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"sss",$image,$name,$description);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../events.php?error=none");
    exit();
}
function remove($con, $id){
    $sql= "DELETE FROM ".$_SESSION['table']." where id=?;";
    $stmt= mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:../items.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    // mysqli_query($con,$sql);

    header("location: ../items.php?error=delete");
    exit();
}

function removeprovider($con, $id){
    $sql= "DELETE FROM providers where id=?;";
    $stmt= mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:../items.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    // mysqli_query($con,$sql);

    header("location: ../providers.php?error=delete");
    exit();
}
function block($con, $id){
    $sql= "update signup set status='blocked' where usr_id=".$id.";";
    $stmt=mysqli_query($con,$sql);
  

    header("location: ../users.php?error=blocked");
    exit();
}
function unblock($con, $id){
    $sql= "update signup set status=NULL where usr_id=".$id.";";
    $stmt=mysqli_query($con,$sql);
  

    header("location: ../users.php?error=unblocked");
    exit();
}
