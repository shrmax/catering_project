<?php
function nameexist($con,$name,$email){
    $sql= "SELECT * FROM providers  WHERE name=? OR  email=?;";
    $stmt= mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../../user/index.php?error=stmtfailed");
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
function loginprovider($con,$name,$pwd){
    $nameexists= nameexist($con,$name,$name);
    if ($nameexists ===false){
        // echo "<script>alert('name dont exist.')</script>";
        header("location: ../../user/index.php?error=namedontexist");
    exit();
    }
    $checkpsw=true;
   $pswhashed=$nameexists['password'];
   $checkpsw=password_verify($pwd,$pswhashed);
    
    if ($checkpsw === false){
        header("location: ../../user/index.php?error=pwddontmatch ");
        exit();
    }
    else if ($checkpsw === true){
        session_start();
        $_SESSION["providerid"] = $nameexists["id"];
        $_SESSION["providername"] = $nameexists["name"];
        header("location: ../index.php");
    }

    // header("location: ../index.php?error=none");
    // exit();
}

function additem($con,$id,$provider,$price){
    
    $table='providers_'.$_SESSION['table'];
    // $column='item_id';
    
    $n=sizeof($id);
    for($i=0;$i<$n;$i++){
        $j=intval($id[$i]);
        $a=intval($price[$i]);
        $sql= "INSERT INTO ".$table." (providers_id,item_id,price) VALUES ($provider,$j,$a);";
        $result=mysqli_query($con,$sql);
    }
    if($result)
    header("location: ../manage_items.php?error=none");
    else
    header("location: ../item_list.php?error=sqlerror");
}
function remove($con, $id){
    $sql= "DELETE FROM providers_".$_SESSION['table']." where id=?;";
    $stmt= mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:../manage_items.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    // mysqli_query($con,$sql);

    header("location: ../manage_items.php?error=delete");
    exit();
}