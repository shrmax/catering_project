<?php
include_once 'partial/header.php';

?> 
<div class="order">
<section>
    <form action="include/addimage.php" method="post" enctype="multipart/form-data">
                <div class="formdata" >
                    <input type="file" name="image" id="image" style="border: none;">
                    <div class="bb">
                    <!-- <input type="file" name="" id=""> -->
                <button type="submit" name="submit" value="submit">upload image</button>
                </div>
                </div>
    </form>
</section>
</div>