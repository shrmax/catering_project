<?php
include_once 'partial/header.php';

?> 
<div class="order">
<section style="width: 900px;">
    <form action="include/newpsw.php" method="post">
                <div class="formdata" >
                <label for="">Old Password* </label>
                    :   <input type="text" name="oldpsw" required>
                    </div>
                <div class="formdata" >
                <label for="">New Password*</label>
                    :   <input type="text" name="newpsw"
                    min="8" required>
                    </div>
                <div class="formdata" >
                <label for="">Confirm Password*</label>
                    :   <input type="password" name="confirmpsw" min="8" required>
                    </div>
                
                    <div class="bb">
                <button type="submit" name="submit" value="submit">submit</button>
                </div>
                
    </form>
</section>
</div>
<?php
                if (isset($_GET["error"])){
                    if ($_GET["error"]== "dmatch"){
                        echo "<script>alert('old password don't match.')</script>";
                    }
                    else if ($_GET["error"]== "nmatch"){
                        echo "<script>alert('old password don't match.')</script>";
                    }
                   
                }
                ?>