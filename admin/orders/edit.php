<?php
ob_start();
require '../../config.php';
require BLA.'includes/header.inc.php';


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $data = getRow("orders","order_id",$id);

    if ($data) {
        $orderId = $data['order_id'];
        $orderName = $data['order_name'];
        $orderMobile = $data['order_mobile'];
        $orderEmail = $data['order_email'];
        $orderNotes = $data['order_notes'];
        $orderService = $data['order_service_id'];
        $orderCity = $data['order_city_id'];
        $orderStatus = $data['order_status'];
    } else {
        header(BURLA."orders");
    }

} else {
    header(BURLA."admins");
}





?>

<div class="col-sm-6 offset-sm-3 border p-3">
    <h3 class="text-center p-3 bg-primary text-white">Edit Order</h3>
    <form method="POST" action="<?php echo BURLA.'orders/update.php'; ?>" >
        <div class="form-group">
            <label >Name</label>
            <input type="text" name="name" value="<?php echo $orderName; ?>" class="form-control" >

            <label >Mobile</label>
            <input type="number" name="mobile" value="<?php echo $orderMobile; ?>" class="form-control" >

            <label >Email</label>
            <input type="email" name="email" value="<?php echo $orderEmail; ?>" class="form-control" >

            <label >Notes</label>
            <textarea name="notes" class="form-control" ><?php echo $orderNotes; ?></textarea>


            <label>Service</label>
            <select name="service" class="form-control font-1">
                <?php
                $dataService = getAllRows("services");
                foreach ($dataService as $row) {
                    ?>

                    <option <?php if ($row['service_id'] == $orderService){ echo "selected"; } ?> value="<?php echo $row['service_id'];?>"><?php echo $row['service_name'];?></option>

                    <?php
                }

                ?>
            </select>

            <label>City</label>
            <select name="city" class="form-control font-1">
                <?php
                $dataCity = getAllRows('cities');
                foreach($dataCity as $row){   ?>
                <option <?php if ($row['city_id'] == $orderCity){ echo "selected"; } ?> value="<?php echo $row['city_id']; ?>">
                    <?php echo $row['city_name']; ?>
                </option>
                <?php }
                ?>

            </select>

            <label>Status</label>
            <select name="status" class="form-control font-1">
                <option <?php if ($orderStatus == "completed"){ echo "selected"; } ?> value="completed">Completed</option>
                <option <?php if ($orderStatus == "uncompleted"){ echo "selected"; } ?> value="uncompleted">Uncompleted</option>
                <option <?php if ($orderStatus == "cancelled"){ echo "selected"; } ?> value="cancelled">Cancelled</option>
            </select>



            <input type="hidden" name="id" value="<?php echo $orderId; ?>" class="form-control" >
        </div>
        <button type="submit" name="submit" class="btn btn-success">Save</button>
    </form>

</div>

<?php
require BLA.'includes/footer.inc.php';
ob_end_flush();
?>

