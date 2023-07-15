<?php
include_once 'partial/header.php';
include_once 'include/dbh.inc.php';
$query= 'SELECT o.order_id, o.order_date,o.number_ppl,o.address,o.alternative_phone_no,o.event_date,o.time,o.request,o.veg_ids,o.non_veg_ids,o.desert_ids,o.juice_ids,o.grand_total,o.status,s.name,s.phone_no,p.id,p.name,p.image,p.phone_no,e.name,e.image from orders o JOIN signup s on s.usr_id=o.user_id JOIN providers p on p.id=o.provider_id JOIN events e on e.id=o.event_id where s.usr_id='.$_SESSION['userid'].' and o.order_id='.$_POST['details'].';';
$result = mysqli_query($con, $query);

while($row=mysqli_fetch_array($result,MYSQLI_NUM)){
?>  
<div class="orderinfo">
    <img src="../admin/eventimages/<?php echo $row[21] ?> " alt="" width="700px" height="400px">
    <div class="details">
    <div class="eves">
    
    <p id="event"><?php echo $row[20] ?></p>   
                <p id="provider"><?php echo $row[17] ?></p>
                <p id="amont">Total People :<span><?php echo $row[2] ?></span></p>
                <p id="amont">Event Date :<span><?php echo $row[5] ?></span></p>
                <p id="amont">Address :<span><?php echo $row[3] ?></span></p>
                <p id="amont">Request :<span><?php echo $row[7] ?></span></p>
                <p id="amont">Total Amount :<span>&#8377;<?php echo $row[12] ?></span></p>
                <p id="status">STATUS  :<?php echo $row[13] ?></p>
                <div class="placeorder buttons c">
                  <?php 
                if( $row[13]!='canceled'){
                ?>
                <form action="include/statusupdate.php" method="post">
                  <button type="submit" name="cancel" value="<?php echo $row[0] ?>">cancel</button>
                </form>
                </form>
                <?php }
                ?>
                <?php 
                if($row[13]=='accepted') {
                  $query= 'SELECT or_id from payment where or_id="'.$row[0].'" ;';
                  $pay = mysqli_query($con, $query);
                  while($r=mysqli_fetch_assoc($pay)){
                    echo $r['or_id'];
                    
                      if($row[0]!=$r['or_id']){
              ?>
               <form action="pay.php" method="get">
              <button type="submit" name="pay" value="<?php echo $row[0]; ?>">pay</button>
              <input type="hidden" name="amt" value="<?php echo $row[12]; ?>">
              </form>
              <?php
                  }
                  else
                  echo '<button >Amount Paid</button>';

              }}
                ?>
            </div>
            </div> 
    </div>
</div>

        <!-- order form -->
        <div class="imga">
                    <a href="#form">Form</a>
                    <a href="#juice_items">Juice</a>
                    <a href="#veg_items">Veg</a>
                    <a href="#non_veg_items">Non_Veg</a>
                    <a href="#deserts_items">Deserts</a>
                </div>
        <div class="list">
        <?php
        $veg=json_decode($row['8']);
        $nveg=json_decode($row['9']);
        $desert=json_decode($row['10']);
        $juice=json_decode($row['11']);
        $item= array($juice,$veg,$nveg,$desert);
   $array=array('juice_items'=>$juice,'veg_items'=>$veg,'non_veg_items'=>$nveg,'deserts_items'=>$desert);
   
            foreach($array as $index=>$val){
                
             if($val!=null){    
    ?>
        <!-- food list -->
        <div class="cat space" id="<?php echo $j; ?>">
    <p style="text-transform: uppercase;">
        <?php echo $index; ?></p>
</div>
        <div class="fields">
          <table>
            <thead>
                <!-- <th>id</th> -->
                <th>image</th>
                <th>name</th>
                <th>discription</th>
                <th>price</th>
                
            </thead>
          </table>
        </div>
        <!-- datas -->
            <?php
            foreach($val as $i){
            $query= 'select a.image, a.name, a.description  from '.$index.' a where a.id='.$i.';';
            $result = mysqli_query($con, $query);
             
            while($row= mysqli_fetch_assoc($result)){
              ?> 
                <div class="line">
                  <table>
                  <tr>
                <td >
                 <img src=<?php echo "../admin/itemimages/".$row['image']; ?> alt="" height="70px">        
            </td>
                <td >
                <p><?php echo strtoupper($row['name']); ?></p>
            </td>
            <td>
                <p><?php echo $row['description']; ?></p>
            </td>
            <?php
            $query= 'select price from providers_'.$index.' where providers_id=1 and item_id='.$i.';';
            $result = mysqli_query($con, $query);
             
            while($row= mysqli_fetch_assoc($result)){
              ?> 
            <td >
              <p><?php echo $row['price']; ?></p>
        </td>
              
            </tr>  
          </table>
        </div>
        <?php
            }
            }
          }    
            
            }
    }
            ?>
        
            </div>
            
            <!-- <div class="placeorder">
                <button type="submit" name="submit" form="form">Place Order</button>
            </div> -->
<?php
}
include_once 'partial/footer.php';
?>