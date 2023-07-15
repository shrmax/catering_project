<?php
include_once 'partial/header.php';

?> 
<div class="order">
<section style="width: 900px;">
    <form action="newpsw.php" method="post">
                <div class="formdata" >
                <label for="">User Name </label>
                    :   <input type="text" name="name" required>
                    </div>
                <div class="formdata" >
                <label for="">E-mail</label>
                    :   <input type="email" name="email"
                    min="8" required>
                    </div>
                <div class="formdata" >
                <label for="">Phone Number</label>
                    :   <input type="text" name="pn"  required>
                    </div>
                
                    <div class="bb">
                <button type="submit" name="submit" value="submit">submit</button>
                </div>
                
    </form>
</section>
</div>
<?php
               