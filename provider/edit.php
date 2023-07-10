<?php
include_once 'partial/header.php';

?> 
<div class="order">
<section style="width: 1000px;">
    <form action="include/updateprice.php" method="post">
                <div class="formdata" >
                <label for="">Veg Price </label>
                    :   <input type="number" name="vegp" required>
                    </div>
                <div class="formdata" >
                <label for="">Non Veg Price </label>
                    :   <input type="number" name="nonvegp"
                    min="8" required>
                    </div>
                <div class="formdata" >
                <label for="">Minimum nubmer of People</label>
                    :   <input type="number" name="min" min="8" required>
                    </div>
                <div class="formdata" >
                <label for="">Maximum nubmer of People</label>
                    :   <input type="number" name="max" min="8" required>
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