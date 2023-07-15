<?php
include_once 'partial/header.php';
include_once 'include/dbh.inc.php';
if(isset(($_POST['submit']))){
$name=$_POST['name'];
$query='select * from signup where name="'.$name.'" and email="'.$_POST['email'].'" and phone_no="'.$_POST['pn'].'";';
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){
?> 
<div class="order">
<section style="width: 900px;">
    <form action="include/forgot.php" method="post">
                
                <div class="formdata" >
                <label for="">New Password*</label>
                    :   <input type="text" name="newpsw"
                    min="8" required>
                    </div>
                <div class="formdata" >
                <label for="">Confirm Password*</label>
                    :   <input type="password" name="confirmpsw" min="8" required>
                    </div>
                <input type="hidden" value="<?php echo $_POST['name']; ?>" name="name">
                    <div class="bb">
                <button type="submit" name="submit" value="submit">submit</button>
                </div>
                
    </form>
</section>
</div>

<?php
}
else{
echo '<script>alert("invalid input.")
document.location = "forgot.php?";</script>';

    }
}
            