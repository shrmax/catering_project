<?php
 include_once 'partial/header.php';
 include_once 'include/dbh.inc.php';
 $query= 'SELECT o.order_id, o.order_date,o.number_ppl,o.address,o.alternative_phone_no,o.event_date,o.time,o.request,o.veg_ids,o.non_veg_ids,o.desert_ids,o.juice_ids,o.grand_total,o.status,s.name,s.phone_no,p.name,p.phone_no,e.name,e.image from orders o JOIN signup s on s.usr_id=o.user_id JOIN providers p on p.id=o.provider_id JOIN events e on e.id=o.event_id where p.id='.$_SESSION['providerid'].' order by o.order_date desc;';
 $result = mysqli_query($con, $query);
 $query= 'SELECT or_id from payment;';
 $pay = mysqli_query($con, $query);
?>
   
  <main>
  <div class="list feedback">
        
        <?php
        while($row=mysqli_fetch_array($result,MYSQLI_NUM)){
            ?> 
           <div class="line bookings">
            <img src="../admin/eventimages/<?php echo $row[19]?>" width="250px" height="200px" alt="">
            <div class="eves">
                <p id="event"><?php echo $row[18] ?></p>   
                <p id="provider"><?php echo $row[14] ?></p>
                <p id="amont">Total People :<span><?php echo $row[2] ?></span></p>
                <p id="amont">Event Date :<span><?php echo $row[5] ?></span></p>
                <p id="amont">Total Amount :<span>&#8377;<?php echo $row[12] ?></span></p>
                <p id="status">STATUS  :<?php echo $row[13] ?></p>
            </div>
            <div class="placeorder buttons">
                <form action="details.php" method="post">
                <button type="submit" name="details" value="<?php echo $row[0] ?>">full details</button>
                </form>
                <?php  if($row[13]=='accepted') {
                    while($r=mysqli_fetch_assoc($pay)){
                        if($row[0]==$r['or_id']){
                ?>
                <button>Amount Paid</button>
                <?php
                    }
                  

                }}
                if($row[13]=='pending'){
                ?>
                <form action="include/statusupdate.php" method="post">
                <button type="submit" name="accept" value="<?php echo $row[0] ?>">accept</button>
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