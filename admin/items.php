<?php
 include_once 'partial/header.php';
 include_once 'include/dbh.inc.php';
 $_SESSION['table'] = $_POST["color"];
//  $color=$_SESSION['table'];
 if ($_SESSION['table'] == ""){
   $_SESSION['table'] = "veg_items";
  }
  echo $_SESSION['table'];
  $query= 'select * from '.$_SESSION['table'];
  echo $query;
  $result = mysqli_query($con, $query);
?>

   <form action="items.php" method="post" id=form> 
   </form>
    <div class="items">
        <p>Select the item category</p>
        <button form="form" type="submit" name="color" value="veg_items">veg</button>
        <button form="form" type="submit" name="color" value="non_veg_items">non-veg</button>
        <button form="form" type="submit" name="color" value="juice_items">drinks</button>
        <button form="form" type="submit" name="color" value="deserts_items">desert</button>
    </div>
  
   
   <main>
   <div class="list">
   
        <div class="fields name">
          <table>
            <thead>
                <th>id</th>
                <th>image</th>
                <th>name</th>
                <th>discription</th>
            </thead>
          </table>
        </div>
        <!-- datas -->
        <?php
        while($row= mysqli_fetch_assoc($result)){
          ?> 
            <div class="line name">
              <table>
              <tr>
            <td class="name">
                <p><?php echo $row['id']; ?></p>
        </td>
            <td >
            <img src=<?php echo "../admin/image/".$row['image']; ?> alt="" height="70px">
          </td>
            <td >
            <p><?php echo $row['name']; ?></p>
        </td>
            <td class="text">
               <p><?php echo $row['description']; ?></p>
        </td>
        <td>
          <form action="include/remove.php" method="post">
            <button type="submit" name="submit" class="button_delete" value="<?php echo $row['id']; ?>">DELETE</button>
          </form>
        </td>
              </tr>  
            </table>
        </div>
        <?php
        }
        ?>
        </div>
      </main>

      <div class="buttons">
          <a href="include/new.php"><button class="button_add" >add new item</button></a>
        </div>
  <?php
  if (isset($_GET["error"])){
    if ($_GET["error"]== "none"){
        echo "<script>alert('itmes added succesfully.')</script>";
    }
    if ($_GET["error"]== "delete"){
        echo "<script>alert('item removed succesfully.')</script>";
    }
}
  include_once 'partial/footer.php';
  // tablename($_SESSION['table']);
  ?>