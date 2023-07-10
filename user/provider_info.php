
<?php
include_once 'partial/header.php';
include_once 'include/dbh.inc.php';
$_SESSION['pid']=$_GET['entry_id'];
$sql='select * from providers where id='.$_GET['entry_id'].';';
$result=mysqli_query($con,$sql);
while($row =mysqli_fetch_assoc($result)){
?>
<div class="providerinfo">
    <div class="leftpane" id="leftpane">
        <div class="grp">
            
            <img src="../provider/providerprofile/<?php echo $row['image']; ?>" alt="" class="tt">
            <div class="pinfo">
            <p class="pname "><?php echo $row['name']; ?></p>
                <p class="location ">
            <span>
                <ion-icon name="location-outline"></ion-icon>
            </span><?php echo $row['address']; ?></p>
            <div class="r">
            <label for="">Owner :</label><p class="owner qq"><?php echo $row['owner_name']; ?></p></div>
            <div class="r">
            <label for="">Contact Number :</label><p class="qq"><?php echo $row['phone_no']; ?></p></div>
            <div class="r">
            <label for="">Email :</label><p class="qq"><?php echo $row['email']; ?></p></div>
            </div>
        </div>
    </div>
    <div class="rightpane">
        <div class="abc">
                <p class="prices">Staring Price</p>
                <div class="priceinfo">
                    <p >Staring Plate Veg </p>
                    <p >Staring Plate Non Veg </p>
               </div>
                <div class="priceinfo">
                    <p  style="color: #e80a54;"> &#8377;<?php echo $row['veg_price']; ?></p>
                    <p  style="color: #e80a54;">&#8377;<?php echo $row['non_veg_price']; ?> </p>
               </div>
                <div class="priceinfo">
                <p>Min Capacity </p>
               <p >Max Capacity </p>
               </div>
                <div class="priceinfo">
                <p style="color: #e80a54;"> <?php echo $row['min']; ?> </p>
               <p  style="color: #e80a54;"> <?php echo $row['max']; ?> </p>
               </div>
              
            </div>
            <div class="bookbutton">
                <?php if(isset($_SESSION["userid"])){
                    echo '<a href="events.php"><button>BOOK NOW</button></a>';
                }
                else
                echo '<button id="book">BOOK NOW</button>'; ?>
              
            </div>
            <div class="eves">
                <h1>Events supported</h1>
                <?php
                $eves=array('wedding','birthday','mehendi','haldi','fuenrals','christmas party','engagement');
                        $i=0;
                        while($i<count($eves)){ 
                        ?>
                        <button class="buttoneves"><?php echo $eves[$i] ?></button>
                        <?php
                        $i++;
                        }
                        ?>
            </div>
               
        </div>
</div>
<div class="imageabout">
                <div class="imga">
                    <a href="#leftpane">Main</a>
                    <a href="#pimages">Image</a>
                    <a href="#about">About</a>
                </div>
                <div id="pimages">
                    <h1 >Images</h1>
                    <div class="pimages">

                        <?php
                         $sql='select image from workimage where provider_id='.$_GET['entry_id'].';';
                         $result=mysqli_query($con,$sql);
                         while($r =mysqli_fetch_assoc($result)){
                        ?>
                        <img src="../provider/workimage/<?php echo $r['image'] ?>" alt="" class="lkd">
                        <?php
                        
                        }
                        ?>
                    </div>
                </div>
                <div class="about" id="about">
                    <h1>About</h1>
                   <pre> Having 20 years of experience, <?php echo $row['name']; ?> enjoy the rare distinction of being an all in one organizer for all types of functions that their clients could think of hosting. Be it birthdays or weddings their skilled team can easily manage all aspects of these functions from the beginning till the very end. They will make your special event memorable not only for you but, for every one of your guests. Their exquisite & innovative food, spectacular presentation & unfailing service has enabled <?php echo $row['name']; ?> to create a seamless match in Mangalore and Udupi.  </pre>
                </div>
 </div>
<?php
}
include_once 'partial/footer.php';
?>