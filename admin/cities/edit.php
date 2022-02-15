<?php ob_start(); ?>
<?php
require '../../config.php';
require BLA.'includes/header.inc.php';
?>

<?php

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $row = getRow("cities","city_id",$id);
    if ($row) {

        $cityId = $row['city_id'];
        $cityName = $row['city_name'];

    } else {
        header("location:".BURLA);
    }
} else {
    header("location:".BURLA);
}

?>

    <div class="col-sm-6 offset-sm-3 border p-3">
        <h3 class="text-center p-3 bg-primary text-white">Edit City</h3>
        <form method="post" action="<?php echo BURLA.'cities/update.php'; ?>">
            <div class="form-group">
                <label >Name Of City</label>
                <input type="text" name="city" class="form-control" value="<?php echo $cityName;?>">
                <input type="hidden" name="city_id" value="<?php echo $cityId;?>">
            </div>

            <button type="submit" name="submit" class="btn btn-success">Save</button>
        </form>

    </div>


<?php
require BLA.'includes/footer.inc.php';
?>

<?php ob_end_flush(); ?>
