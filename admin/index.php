<?php require '../config.php';  ?>
<?php require BLA.'includes/header.inc.php';  ?>


<div class="col-sm-6">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">All  Services</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="<?php echo BURLA.'services/' ?>" class="btn btn-primary"><?php echo countRows('services'); ?></a>
        </div>
    </div>
</div>
<div class="col-sm-6">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">All Cities</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="<?php echo BURLA.'cities/' ?>" class="btn btn-primary"><?php echo countRows('cities'); ?></a>
        </div>
    </div>
</div>


<div class="col-sm-6 mt-5">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">All Orders</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="<?php echo BURLA.'orders/' ?>" class="btn btn-primary"><?php echo countRows('orders'); ?></a>
        </div>
    </div>
</div>


<div class="col-sm-6 mt-5">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">All Orders This Day</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <?php
            $sql = "SELECT COUNT(*) AS count FROM orders WHERE order_created_at LIKE '".date('Y-m-d')."%';";
            $result = customSelect($sql);

            ?>
            <a href="<?php echo BURLA.'orders/' ?>" class="btn btn-primary"><?php echo $result[0]['count']; ?></a>
        </div>
    </div>
</div>





<?php require BLA.'/includes/footer.inc.php';  ?>





