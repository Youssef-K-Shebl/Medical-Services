<?php
ob_start();
require '../../config.php';
require '../../functions/validate.php';
require '../../functions/messages.php';
require '../includes/header.inc.php';
if (isset($_POST['submit'])) {
    $adminId = $_POST['id'];
    $adminName = $_POST['username'];
    $adminEmail = $_POST['email'];
    if (checkEmpty($adminId) && checkEmpty($adminName) && checkEmpty($adminEmail) && checkLess($adminName,3)) {
        if (validEmail($adminEmail)) {
            $row = getRow("admins", "admin_email", $adminEmail);
            if (!$row || $row['admin_id'] == $adminId) {

                $sql = "UPDATE admins SET admin_name = '$adminName', admin_email='$adminEmail' where admin_id=$adminId;";
                $update = dbUpdate($sql);
                $successMessage = "Admin Updated Successfully";
                require BL.'functions/messages.php';
                header("refresh:2;url=".BURLA.'admins');
                exit();

            } else {
                $errorMessage = "Email Already exists";
            }
        } else {
            $errorMessage = "Please Use Valid Email";
        }
    } else {
        $errorMessage = "Please Fill All Fields";
    }
    require BL.'functions/messages.php';
    header("refresh:2;url=".BURLA.'admins/edit.php?id='.$adminId);


} else {
    header("location:".BURLA.'admins');
}

require '../includes/footer.inc.php';
ob_end_flush();
