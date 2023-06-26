
<?php
include_once 'partial/header.php';
$_SESSION['pid']=$_GET['entry_id'];
?>
<div class="providerinfo">
    <div class="leftpane" id="leftpane">
        <div class="grp">
            
            <img src="image/maxresdefault.jpg" alt="" class="tt">
            <div class="pinfo">
            <p class="pname ">aadhya caterers</p>
                <p class="location ">
            <span>
                <ion-icon name="location-outline"></ion-icon>
            </span>gurupura road mangalore 575110 Karnataka</p>
            <div class="r">
            <label for="">Owner :</label><p class="owner qq">viajy malua</p></div>
            <div class="r">
            <label for="">Contact Number :</label><p class="qq">9866458456</p></div>
            <div class="r">
            <label for="">Email :</label><p class="qq">asdkrd@djeedj.com</p></div>
            </div>
        </div>
    </div>
    <div class="rightpane">
        <div class="abc">
                <p class="prices">Staring Price</p>
                <div class="priceinfo">
                    <p >Staring Plate Veg </p>
                    <p >Staring Plate Non Veg </p>
               </div>
                <div class="priceinfo">
                    <p  style="color: #e80a54;"> &#8377;600</p>
                    <p  style="color: #e80a54;">&#8377;800 </p>
               </div>
                <div class="priceinfo">
                <p>Min Capacity </p>
               <p >Max Capacity </p>
               </div>
                <div class="priceinfo">
                <p style="color: #e80a54;"> 40 </p>
               <p  style="color: #e80a54;"> 2000 </p>
               </div>
              
            </div>
            <div class="bookbutton">
                <?php if(isset($_SESSION["userid"])){
                    echo '<a href="events.php"><button>BOOK NOW</button></a>';
                }
                else
                echo '<button id="book">BOOK NOW</button>'; ?>
              
            </div>
            <div class="eves">
                <h1>Events supported</h1>
                <?php
                $eves=array('wedding','birthday','mehendi','haldi','fuenrals','christmas party','engagement');
                        $i=0;
                        while($i<count($eves)){ 
                        ?>
                        <button class="buttoneves"><?php echo $eves[$i] ?></button>
                        <?php
                        $i++;
                        }
                        ?>
            </div>
               
        </div>
</div>
<div class="imageabout">
                <div class="imga">
                    <a href="#pimages">Image</a>
                    <a href="#about">About</a>
                    <a href="#leftpane">Main</a>
                </div>
                <div id="pimages">
                    <h1 >Images</h1>
                    <div class="pimages">

                        <?php
                        $i=0;
                        while($i<7){ 
                        ?>
                        <img src="image/logo.png" alt="" class="lkd">
                        <?php
                        $i++;
                        }
                        ?>
                    </div>
                </div>
                <div class="about" id="about">
                    <h1>About</h1>
                   <pre> What is grid layout?

A grid is a collection of horizontal and vertical lines creating a pattern against which we can line up our design elements. They help us to create layouts in which our elements won't jump around or change width as we move from page to page, providing greater consistency on our websites.

A grid will typically have columns, rows, and then gaps between each row and column. The gaps are commonly referred to as gutters.Creating your grid in CSS

Having decided on the grid that your design needs, you can use CSS Grid Layout to create it. We'll look at the basic features of Grid Layout first and then explore how to create a simple grid system for your project.

The following video provides a nice visual explanation of using CSS Grid:</pre>
                </div>
 </div>
<?php
include_once 'partial/footer.php';
?>