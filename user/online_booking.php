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
$i=0;
while($row= mysqli_fetch_assoc($result)){
?>
<div class="provider">
    <a class="a" href="provider_info.php?entry_id=<?php echo $row['id']; ?>">
    <div class="img">
     <img src="../provider/image/<?php echo $row['image']; ?>" alt="">
    </div>
    <div class="ptext">
        <p class="pname pa"><?php echo $row['name']; ?></p>
        <p class="location grey">
            <span>
                <ion-icon name="location-outline"></ion-icon>
            </span><?php echo $row['address']; ?></p>
        <div class="price pa">
            <p class="grey">Starting Price</p>
            <p>&#8377;400 onwards</p>
        </div>
        <div class="ppl pa">
            <p>Min:50</p>
            <p>Max:2000</p>
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