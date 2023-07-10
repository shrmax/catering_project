<?php 
include_once 'partial/header.php';
include_once 'include/dbh.inc.php';
$sql='select * from providers where id='.$_SESSION['providerid'].';';
$result= mysqli_query($con,$sql);

?>
 <!-- order form -->
 <div class="box_register order">
            <h2 style="font-size: 3em; color:#FB2576">Profile</h2>
            <?php
            while($row=mysqli_fetch_assoc($result)){
            ?>
            <section>
                <div class="profileimage">
                    <img src="providerprofile/<?php echo $row['image']; ?>" alt="">
                </div>
                <div class="bb">
                    <!-- <input type="file" name="" id=""> -->
                   <a href="updateprofile.php"><button>change profile</button></a>
                    </div>
                <!-- name -->
                <div class="formdata">
                    <label for="">Name</label>
                    :   <p><?php echo $row['name']; ?></p>
                </div>
                <!-- Phone no -->
                <div class="formdata">
                    
                    <label for="">Owner Name</label>
                    : <p><?php echo $row['owner_name']; ?></p>
                </div>
                <!-- email -->
                <div class="formdata">
                   
                    <label for="">Email</label>
                    : <p><?php echo $row['email']; ?></p>
                </div>
                <div class="formdata">
                   
                    <label for="">Phone Number</label>
                    : <p><?php echo $row['phone_no']; ?></p>
                </div>
                <div class="formdata">
                   
                    <label for="">Address</label>
                    : <p><?php echo $row['address']; ?></p>
                </div>

                <div class="bb">
                <a href="changepsw.php"><button>change password</button></a>
                    </div>
                <div class="bb">
                    <a href='include/logout.inc.php'><button>logout</button></a>
                    </div>
                    <div class="bo">
                <div class="requirements">
                <div class="formdata">
                   
                   <label for="">veg price</label>
                    <p>:&nbsp;<?php echo $row['veg_price']; ?></p>
               </div>
                <div class="formdata">
                   
                   <label for="">non-veg price</label>
                    <p>:&nbsp;<?php echo $row['non_veg_price']; ?></p>
               </div>
               </div>
               
               <div class="requirements">
                <div class="formdata">
                   
                   <label for="">min people</label>
                    <p>:&nbsp;<?php echo $row['min']; ?></p>
               </div>
                <div class="formdata">
                   
                   <label for="">max people</label>
                    <p>:&nbsp;<?php echo $row['max']; ?></p>
               </div>
               </div>
               <div class="bb">
                    <a href="edit.php"><button>edit</button></a>
                    </div>
                </div>
                
                <?php
                if (isset($_GET["error"])){
                    if ($_GET["error"]== "emptyinput"){
                        echo "<script>alert('fill all the fields.')</script>";
                    }
                    else if ($_GET["error"]== "newpsw"){
                        echo "<script>alert('new password is set successfully.')</script>";
                    }
                    else if ($_GET["error"]== "added"){
                            echo "<script>alert('image changed succesfully.')</script>";
                    }
                    else if ($_GET["error"]== "img"){
                            echo "<script>alert('image added succesfully.')</script>";
                    }
                
                }
                ?>
            </section>
            <?php
            }
            $sql='select image from workimage where provider_id='.$_SESSION["providerid"].';';
            $result=mysqli_query($con,$sql);
            ?>
        </div>
        <div id="pimages">
                    <h1 style="font-size: 3em; color:#FB2576">Work Images</h1>
                    <div class="pimages">

                        <?php
                        $i=0;
                        while($row=mysqli_fetch_assoc($result)){ 
                        ?>
                        <img src="workimage/<?php echo $row['image']; ?>" alt="" class="lkd">
                        <?php
                        $i++;
                        }
                        ?>
                    </div>
                    <div class="bb">
                    <a href="workimage.php"><button>Add New Image</button></a>
                    </div>
                </div>
                </div>
<?php 
include_once 'partial/footer.php';
?>