<?php
ob_start();
require '../../config.php';
require BL.'functions/validate.php';
require BLA.'includes/header.inc.php';
if (isset($_POST['submit'])) {
    $orderId = $_POST['id'];
    $serviceId = $_POST['service'];
    $cityId = $_POST['city'];
    $name = sanitizeString($_POST['name']);
    $email = sanitizeEmail($_POST['email']);
    $mobile = $_POST['mobile'];
    $notes = sanitizeString($_POST['notes']);
    $status = $_POST['status'];
    if (checkEmpty($name) && checkEmpty($mobile) && is_numeric($mobile)) {

        if (validEmail($email) || !checkEmpty($email)) {
            $sql = "UPDATE orders SET
                                        order_name = '$name',
                                        order_mobile = '$mobile',
                                        order_email = '$email',
                                        order_notes = '$notes', 
                                        order_service_id = $serviceId,
                                        order_city_id = $cityId,
                                        order_status = '$status'
                                        WHERE order_id = $orderId;
                                ";
            $successMessage = dbUpdate($sql);
        } else {
            $errorMessage = "Please Enter Valid Email";
        }
    } else {
        $errorMessage = "Please Fill Mandatory Fields Properly";
    }
    require BL.'functions/messages.php';
    header("refresh:2;url=".BURLA.'orders');

}


ob_end_flush();