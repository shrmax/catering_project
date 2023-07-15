<?php
 include_once 'partial/header.php';
 include_once 'include/dbh.inc.php';
 $query= 'SELECT o.order_id, o.order_date,o.number_ppl,o.address,o.alternative_phone_no,o.event_date,o.time,o.request,o.veg_ids,o.non_veg_ids,o.desert_ids,o.juice_ids,o.grand_total,o.status,o.reason,s.name,s.phone_no,p.name,p.phone_no,e.name,e.image  from orders o JOIN signup s on s.usr_id=o.user_id JOIN providers p on p.id=o.provider_id JOIN events e on e.id=o.event_id where s.usr_id='.$_SESSION['userid'].' order by o.order_date DESC;';
 $result = mysqli_query($con, $query);
 
 // foreach($val as $i);
                // SELECT a.name,b.providers_id, b.price FROM veg_items a join providers_veg_items b on a.id=b.item_id WHERE b.item_id=17 and b.providers_id=1;
?>
   
  <main>
  <div class="list feedback">
        
        <?php
        while($row=mysqli_fetch_array($result,MYSQLI_NUM)){
            ?> 
           <div class="line bookings">
            <img src="../admin/eventimages/<?php echo $row[20] ?> " width="250px" height="200px" alt="">
            <div class="eves">
                <p id="event"><?php echo $row[19] ?></p>   
                <p id="provider"><?php echo $row[17] ?></p>
                <p id="amont">Total People :<span><?php echo $row[2] ?></span></p>
                <p id="amont">Event Date :<span><?php echo $row[5] ?></span></p>
                <p id="amont">Total Amount :<span>&#8377;<?php echo $row[12] ?></span></p>
                <p id="status">STATUS  :<?php echo $row[13] ?></p>
                <?php
                
                if($row[13]=='rejected') {
                ?>
                <p >REASON :</p>
                <label for="">hello wolrd</label>
                <?php
                }
                ?>
            </div>
            <div class="placeorder buttons">
                <form action="details.php" method="post">
                <button type="submit" name="details" value="<?php echo $row[0] ?>">full details</button>
                </form>
                <?php
                
                if($row[13]=='accepted') {
                    $query= 'SELECT or_id from payment where or_id="'.$row[0].'";';
                    $pay = mysqli_query($con, $query);
                    while($r=mysqli_fetch_assoc($pay)){
                        if($r['or_id']==$row[0]){
                ?>
                 <form action="pay.php" method="get">
                <button type="submit" name="pay" value="<?php echo $row[0]; ?>">pay</button>
                <input type="hidden" name="amt" value="<?php echo $row[12]; ?>">
                </form>
                <?php
                    
                    }
                    else
                    echo '<button class="pay">Amount Paid</button>';
                }
                }
                if($row[13]=='pending' or $row[13]=='accepted') {
                    ?>
                    
                     <form action="include/statusupdate.php" method="post" id="cancel">
                    <button type="submit" name="cancel" value="<?php echo $row[0] ?>">cancel</button>
                    
                    </form>
                    <?php
                    }
                ?>
            </div>
            
           </div>
            <?php
        }
        ?>
        
    </div>
  </main>
  <?php
  include_once 'partial/footer.php';
  ?>