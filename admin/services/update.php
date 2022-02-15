<?php
ob_start();
require '../../config.php';
require BL.'functions/validate.php';
require BLA.'includes/header.inc.php';


if (isset($_POST['submit'])) {
    $serviceId = $_POST['service_id'];
    $serviceName = $_POST['service'];
    if (checkEmpty($serviceName)) {
        $row = getRow("services", "service_id", $serviceId);
        if ($row) {
            $sql = "UPDATE services SET service_name = '{$serviceName}' WHERE service_id = {$serviceId}";
            $successMessage = dbUpdate($sql);
            require BL.'functions/messages.php';
            header("refresh:2;url=".BURLA.'services');
            exit();
        } else {
            $errorMessage = "Please Enter Correct Data";
        }
    } else {
        $errorMessage = "Please Fill All Fields";
    }
    require BL.'functions/messages.php';
    header("refresh:2;url=".BURLA.'services/edit.php?id='.$serviceId);
}


require BLA.'includes/footer.inc.php';

ob_end_flush();