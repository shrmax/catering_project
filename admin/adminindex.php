<?php
 include_once 'partial/header.php';
 include_once 'include/dbh.inc.php';
 $sql='select * from signup;';
 $result=mysqli_query($con,$sql);
 $user=mysqli_num_rows($result);
 $sql='select * from providers;';
 $result=mysqli_query($con,$sql);
 $provider=mysqli_num_rows($result);
?>
   
   <div class="main">
    <div class="hello">
    <?php
    if (isset($_SESSION["id"])){
        
        $age = array("Total users"=>$user, "Total providers"=>$provider, "Total Orders"=>"43");

foreach($age as $x => $x_value) {
  
    ?>
    <div class="numbers">
        <p><?php echo $x; ?> :</p>
        <p><span><?php echo $x_value; ?></span></p>
        
    </div>
    <?php
    
        }
    }
    ?>
    </div>
   
  </div>
  <?php
  include_once 'partial/footer.php';
  ?>
  