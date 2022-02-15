<?php ob_start(); ?>
<?php
require '../../config.php';
require BL.'functions/validate.php';
require BLA.'includes/header.inc.php';
?>

<?php
if (isset($_POST['submit'])) {
    $city = $_POST['city'];
    $cityId = $_POST['city_id'];

    if (checkEmpty($city) && checkLess($city,3)) {

        $row = getRow('cities', 'city_id', $cityId);
        if ($row) {
            $sql = "UPDATE cities SET `city_name` = '$city' WHERE city_id = $cityId;";
            $successMessage = dbUpdate($sql);

        } else {
            $errorMessage = "Please Type Correct Data";
        }
        header("refresh:2;url=".BURLA.'cities');


    } else {
        $errorMessage = "Please Fill All Fields";
        header("refresh:2;url=".BURLA.'cities/edit.php?id='.$cityId);
    }

    require BL.'functions/messages.php';
}
?>


<?php
require BLA.'includes/footer.inc.php';
?>

<?php ob_end_flush(); ?>
