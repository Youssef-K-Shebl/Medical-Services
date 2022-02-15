<?php
ob_start();
require '../../config.php';
require BLA.'includes/header.inc.php';
require BL.'functions/validate.php';
?>

<?php

if (isset($_POST['submit'])) {
    $city = $_POST['city'];

    if (checkEmpty($city) && checkLess($city,3)) {
        $sql = "INSERT INTO cities (`city_name`) VALUES ('$city') ";

        $successMessage = dbInsert($sql);
        header("refresh:2;url=".BURLA.'cities');

    } else {
        $errorMessage = "Please Fill All Fields";
    }

    require BL.'functions/messages.php';
}

?>


<div class="col-sm-6 offset-sm-3 border p-3">
    <h3 class="text-center p-3 bg-primary text-white">Add New City</h3>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label >Name Of City</label>
            <input type="text" name="city" class="form-control" >
        </div>

        <button type="submit" name="submit" class="btn btn-success">Save</button>
    </form>

</div>


<?php
require BLA.'includes/footer.inc.php';
ob_end_flush();