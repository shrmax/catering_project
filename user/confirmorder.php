<?php
include_once 'partial/header.php';
include_once 'include/dbh.inc.php';
include_once 'include/functions.inc.php';
error_reporting(E_ERROR | E_PARSE);
if(isset($_POST['submit'])){
    $_SESSION['ppl']=$_POST['ppl'];
    $_SESSION['date']=$_POST['date'];
    $_SESSION['time']=$_POST['time'];
    $_SESSION['loc']=$_POST['loc'];
    $_SESSION['phoneno']=$_POST['phone_no'];
    $_SESSION['email']=$_POST['email'];
    $_SESSION['juice']=$_POST['juice_items'];
    $_SESSION['veg']=$_POST['veg_items'];
    $_SESSION['nveg']=$_POST['non_veg_items'];
    $_SESSION['deserts']=$_POST['deserts_items'];
    $_SESSION['request']=$_POST['request'];
    $itmes=array($_SESSION['juice'],$_SESSION['veg'],$_SESSION['nveg'],$_SESSION['deserts']);
    $jtotal= 0.0;
    $vtotal=0.0;
    $ntotal=0.0;
    $dtotal=0.0;
    
    
}
if(isset($_POST['order'])){
    order($con,$_SESSION['ppl'],$_SESSION['date'],$_SESSION['time'],$_SESSION['loc'],$_SESSION['phoneno'],$_SESSION['email'],json_encode($_SESSION['juice']),json_encode($_SESSION['veg']),json_encode($_SESSION['nveg']),json_encode($_SESSION['deserts']),$_SESSION['request'],$_SESSION['grand'],$_SESSION['eventid'],$_SESSION['userid'],$_SESSION['pid']);
    header("location: mybookings.php");
    
}
?>
<?php


?>   
<form action="confirmorder.php" method="post" id="form">
        <!-- order form -->
        <div class="box_register order">
            <h2>confirm</h2>
            <section style="width: 600px;">
                <!-- name -->
                <div class="invoice">
                    <label class="qw" for="">Event</label>
                    <label for="">:<?php echo $_SESSION['eventname']; ?></label>
                </div>
                <div class="invoice">
                    <label class="qw" for="">Address</label>
                    <label for="" class="uu">:<?php echo $_SESSION['loc']; ?></label>
                </div>
                <div class="invoice">
                    <label class="qw" for="">Alternative Phone Number</label>
                    <label for="">:<?php echo $_SESSION['phoneno']; ?></label>
                </div>
                <div class="invoice">
                    <label class="qw" for="">Number of People</label>
                    <label for="">:<?php echo $_SESSION['ppl']; ?></label>
                </div>
                <!-- Phone no -->
                <div class="invoice">
                    
                    <label class="qw" for="">Date</label>
                    <label for="">:<?php echo $_SESSION['date']; ?></label>
                </div>
                <!-- email -->
                <div class="invoice" >
                   
                    <label class="qw" for="">Timing</label>
                    <label for="">:<?php echo $_SESSION['time']; ?></label>
                </div>
                <div class="invoice" >
                   
                    <label class="qw" for="">Request</label>
                    <label for="" class="uu">:<?php echo $_SESSION['request']; ?></label>
                </div>
                <!-- veg -->
                <div  class="invoice cc">
                    <p >veg food</p>
                </div>
                <?php
                foreach($_SESSION['veg'] as $i){
                    $query= 'select a.name,  p.price from veg_items a join providers_veg_items p on p.item_id=a.id where p.item_id='.$i.';';
                    $result = mysqli_query($con, $query);
                    if(mysqli_num_rows($result)>0){
                        while($row= mysqli_fetch_assoc($result)){
                 $vtotal+=$row['price'];
                ?>
                <div class="invoice">
                    
                    <label class="qw" for=""><?php echo $row['name']; ?></label>
                    <label for="">:<?php echo $row['price']; ?></label>
                </div>
                
                <?php
               }
            }
        }
        ?>
        <div class="invoice total"  >
         <label class="qw" for="">Total</label>
                    <label for="">:<?php echo $vtotal; ?></label>
        </div>
                
        <!-- non-veg -->
                <div  class="invoice cc">
                    <p >Non-veg food</p>
                </div>
                <?php
                foreach($_SESSION['nveg'] as $i){
                    $query= 'select a.name,  p.price from non_veg_items a join providers_non_veg_items p on p.item_id=a.id where p.item_id='.$i.';';
                    $result = mysqli_query($con, $query);
                    if(mysqli_num_rows($result)>0){
                        while($row= mysqli_fetch_assoc($result)){
                 $ntotal+=$row['price'];
                ?>
                <div class="invoice">
                    
                    <label class="qw" for=""><?php echo $row['name']; ?></label>
                    <label for="">:<?php echo $row['price']; ?></label>
                </div>
                
                <?php
               }
            }
        }
        ?>
        <div class="invoice total" >
         <label class="qw" for="">Total</label>
                    <label for="">:<?php echo $ntotal; ?></label>
        </div>
        <!-- juice -->
        <div  class="invoice cc">
                    <p >Juice</p>
                </div>
                <?php
                foreach($_SESSION['juice'] as $i){
                    $query= 'select a.name,  p.price from juice_items a join providers_juice_items p on p.item_id=a.id where p.item_id='.$i.';';
                    $result = mysqli_query($con, $query);
                    if(mysqli_num_rows($result)>0){
                        while($row= mysqli_fetch_assoc($result)){
                 $jtotal+=$row['price'];
                ?>
                <div class="invoice">
                    
                    <label class="qw" for=""><?php echo $row['name']; ?></label>
                    <label for="">:<?php echo $row['price']; ?></label>
                </div>
                
                <?php
               }
            }
        }
        ?>
        <div class="invoice total" >
         <label class="qw" for="">Total</label>
                    <label for="">:<?php echo $jtotal; ?></label>
        </div>
        <!-- desert -->
                <div  class="invoice cc">
                    <p >Deserts</p>
                </div>
                <?php
                foreach($_SESSION['deserts'] as $i){
                    $query= 'select a.name,  p.price from deserts_items a join providers_deserts_items p on p.item_id=a.id where p.item_id='.$i.';';
                    $result = mysqli_query($con, $query);
                    if(mysqli_num_rows($result)>0){
                        while($row= mysqli_fetch_assoc($result)){
                 $dtotal+=$row['price'];
                ?>
                <div class="invoice">
                    
                    <label class="qw" for=""><?php echo $row['name']; ?></label>
                    <label for="">:<?php echo $row['price']; ?></label>
                </div>
                
                <?php
               }
            }
        }
        $_SESSION['grand']=($vtotal+$ntotal+$jtotal+$dtotal)*$_SESSION['ppl']+5000;
        ?>
        <div class="invoice total"  >
         <label class="qw" for="">Total</label>
                    <label for="">:<?php echo $dtotal; ?></label>
        </div>
        <div class="invoice total"  >
         <label class="qw" for="">Service charge</label>
                    <label for="">:5000</label>
        </div>
        <div class="invoice total grand"  >
         <label class="qw" for="">Grand Total</label>
                    <label for="">:<?php echo $_SESSION['grand']; ?></label>
        </div>
        <?php
                if (isset($_GET["error"])){
                    if ($_GET["error"]== "emptyinput"){
                        echo "<script>alert('fill all the fields.')</script>";
                    }
                    else if ($_GET["error"]== "namehastaken"){
                        echo "<script>alert('name is already taken or user with given email already exist.')</script>";
                    }
                    else if ($_GET["error"]== "none"){
                            echo "<script>alert('You registered successfully.')</script>";
                    }
                
                }
                ?>
            </section>
        </div>
        
        
        
        </form>
            </div>
            <form action="confirmorder.php" method="post">
            <div class="placeorder">
                    <button type="submit" name="order">Place Order</button>
                </form>
            </div>
<?php
include_once 'partial/footer.php';
?>
