<?php
include_once 'partial/header.php';
include_once 'include/dbh.inc.php';
$query= 'select * from providers';
$result = mysqli_query($con, $query);
?>
<div class="cat">
    <p>Catering providers</p>
</div>
<div class="collection">
<?php
while($row= mysqli_fetch_assoc($result)){
?>
<div class="provider">
    <a class="a" href="provider_info.php?entry_id=<?php echo $row['id']; ?>">
    <div class="img">
     <img src="../provider/providerprofile/<?php echo $row['image']; ?>" alt="">
    </div>
    <div class="ptext">
        <p class="pname pa"><?php echo $row['name']; ?></p>
        <p class="location grey">
            <span>
                <ion-icon name="location-outline"></ion-icon>
            </span><?php echo $row['address']; ?></p>
        <div class="price pa">
            <p class="grey" style="margin-top: 1.4rem;">Starting Price</p>
            <p>&#8377;<?php echo $row['veg_price']; ?></p>
        </div>
        <div class="ppl pa">
            <p>Min:<?php echo $row['min']; ?></p>
            <p>Max:<?php echo $row['max']; ?></p>
        </div>
    </div>

</a>
</div>

<?php
}
?>
</div>
<?php
include_once 'partial/footer.php';
?>