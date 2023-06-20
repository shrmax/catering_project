<?php
 include_once 'partial/header.php';
?>
   
   <div class="main">
    
    <div class="hello">
        <p>We make your event <span>delicious.</span></p>
    <?php
    // if (isset($_SESSION["userid"])){
    //     echo 'hello ' .$_SESSION["username"];
    // }
    // else{
    //     echo '';
    // }
    ?>
    <div class="search">
        <span><ion-icon name="search-outline"></ion-icon></span>
        <input type="text" placeholder="Search for provider, events">
        <button type="submit"> search</button>
    </div>
    <!-- hello user <br> -->
    </div>
    <p>Trending Events</p>
    <div class="events">
        <?php
        $event=array("wedding","birthday","mehendi","gggg","aaaa","thr");
        for($i=0;$i<6;$i++){
           echo "<a href='provider.php'><p>$event[$i]</p></a>";
        }
        ?>
    </div>
  </div>
<!-- new change -->
hello there
  <?php
  include_once 'partial/footer.php';
  ?>
  
