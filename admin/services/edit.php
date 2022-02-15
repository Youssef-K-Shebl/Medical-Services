<?php ob_start(); ?>
<?php
require '../../config.php';
require BLA.'includes/header.inc.php';
?>

<?php

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $row = getRow("services","service_id",$id);
    if ($row) {

        $serviceId = $row['service_id'];
        $serviceName = $row['service_name'];

    } else {
        header("location:".BURLA);
    }
} else {
    header("location:".BURLA);
}

?>

<div class="col-sm-6 offset-sm-3 border p-3">
    <h3 class="text-center p-3 bg-primary text-white">Edit Service</h3>
    <form method="post" action="<?php echo BURLA.'services/update.php'; ?>">
        <div class="form-group">
            <label >Name Of The Service</label>
            <input type="text" name="service" class="form-control" value="<?php echo $serviceName;?>">
            <input type="hidden" name="service_id" value="<?php echo $serviceId;?>">
        </div>

        <button type="submit" name="submit" class="btn btn-success">Save</button>
    </form>

</div>


<?php
require BLA.'includes/footer.inc.php';
?>

<?php ob_end_flush(); ?>
