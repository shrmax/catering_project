<?php
include_once 'partial/header.php';
include_once 'include/dbh.inc.php';
?>  
<form action="confirmorder.php" method="post" id="form">
        <!-- order form -->
        <div class="box_register order">
            <h2>Order Form</h2>
            <section>
                <!-- name -->
                <div class="formdata">
                    <label for="">Number of People*</label>
                    :<input type="number" name="ppl" id="ppl"  required >
                </div>
                <!-- Phone no -->
                <div class="formdata">
                    
                    <label for="">Date*</label>
                    :<input type="date" name="date" id="date"  required  >
                </div>
                <!-- email -->
                <div class="formdata">
                   
                    <label for="">Timing*</label>
                    :<input type="time" name="time" id="time"  required  >
                </div>
                <!-- password -->
                <div class="formdata">
                   
                    <label for="">Location*</label>
                    :<input type="text" name="loc" id="loc" required>
                </div>
                <div class="formdata">
                   
                    <label for="">Alternative Phone Number*</label>
                    :<input type="text" name="phone_no" id="phone_no" required pattern="[6789][0-9]{9}">
                </div>
                <div class="formdata">
                   
                    <label for="">Email</label>
                    :<input type="email" name="email" id="email" >
                </div>
                <!-- repeat password -->
                <!-- <div class="inputbox">
                    <span class="icon">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <input type="text" name="repeat_psw" id="rpsw" minlength="8" required>
                    <label for="">repeat password</label>
                </div> -->
                <!-- <button type="submit" class="btn" name="submit">Register</button> -->
                
                <?php
                if (isset($_GET["error"])){
                    if ($_GET["error"]== "emptyinput"){
                        echo "<script>alert('fill all the fields.')</script>";
                    }
                    else if ($_GET["error"]== "namehastaken"){
                        echo "<script>alert('name is already taken or user with given email already exist.')</script>";
                    }
                    else if ($_GET["error"]== "none"){
                            echo "<script>alert('You registered successfully.')</script>";
                    }
                
                }
                ?>
            </section>
        </div>
        
        <div class="imga">
                    <a href="#form">Form</a>
                    <a href="#juice_items">Juice</a>
                    <a href="#veg_items">Veg</a>
                    <a href="#non_veg_items">Non_Veg</a>
                    <a href="#deserts_items">Deserts</a>
                </div>
        <div class="list">
        <?php
   $array=array('juice_items','veg_items','non_veg_items','deserts_items');
            foreach($array as $j){
                $query= 'select a.image, a.name, a.description, p.price, p.id from '.$j.' a join providers_'.$j.' p on p.item_id=a.id where p.providers_id='.$_SESSION['pid'].';';
                $result = mysqli_query($con, $query);
                if(mysqli_num_rows($result)>0){
                    
    ?>
        <!-- food list -->
        <div class="cat space" id="<?php echo $j; ?>">
    <p style="text-transform: uppercase;">
        <?php echo $j; ?></p>
</div>
        <div class="fields">
          <table>
            <thead>
                <!-- <th>id</th> -->
                <th>image</th>
                <th>name</th>
                <th>discription</th>
                <th>price</th>
                <th>select</th>
            </thead>
          </table>
        </div>
        <!-- datas -->
            <?php
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
            <td >
              <p><?php echo $row['price']; ?></p>
        </td>
              <td>
                <input type="checkbox" class="large" name="<?php echo $j; ?>[]" value="<?php echo $row['id']; ?>" >
              </td>
            </tr>  
          </table>
        </div>
        <?php
            }
                }
    }
            ?>
        </form>
            </div>
            
            <div class="placeorder">
                <button type="submit" name="submit" form="form">Place Order</button>
            </div>
<?php
include_once 'partial/footer.php';
?>