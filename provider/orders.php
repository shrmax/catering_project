<?php
 include_once 'partial/header.php';
 include_once 'include/dbh.inc.php';
 $query= 'SELECT o.order_date,o.number_ppl,o.address,o.alternative_phone_no,o.event_date,o.time,o.request,o.veg_ids,o.non_veg_ids,o.desert_ids,o.juice_ids,o.grand_total,o.status,s.name,s.phone_no,p.name,p.phone_no,e.name from orders o JOIN signup s on s.usr_id=o.user_id JOIN providers p on p.id=o.provider_id JOIN events e on e.id=o.event_id where s.usr_id='.$_SESSION['userid'].';';
 $result = mysqli_query($con, $query);
?>
   
  <main>
  <div class="list feedback">
        
        <?php
        while($row=mysqli_fetch_array($result,MYSQLI_NUM)){
            ?> 
           <div class="line bookings">
            <img src="profileimages/affro.jpg" width="250px" height="200px" alt="">
            <div class="eves">
                <p id="event"><?php echo $row[17] ?></p>   
                <p id="provider"><?php echo $row[15] ?></p>
                <p id="amont"><?php echo $row[11] ?></p>
                <p>STATUS  :<?php echo $row[12] ?></p>
            </div>
            <div class="placeorder buttons">
                <button>full details</button>
                <button>cancel</button>
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