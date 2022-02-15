<?php
ob_start();
require '../../config.php';
require BLA . 'includes/header.inc.php';
require BLA . 'includes/checkPrivileges.php';



/*

1-check if the id is sent and numeric. --> Done
2-get row using id. --> Done
3-check if row exists:
    -if exist -> delete the row and display the success message. --> Done
    -if not -> display error message. --> Done
4-redirect to the city index page. -->

*/

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    if ($id != $_SESSION['admin_id']) {
        $row = getRow("admins","admin_id",$id);
        if ($row) {
            $successMessage =  dbDelete("admins", "admin_id", $id);
        } else {
            $errorMessage = "Please Type Correct Data";
        }

    } else {
        $errorMessage = "You can't delete super admin";
    }
        header("refresh:2;url=".BURLA."admins");
        require BL.'functions/messages.php';

} else {
    header("location:".BURLA);
}



require BLA . 'includes/footer.inc.php';

ob_end_flush();