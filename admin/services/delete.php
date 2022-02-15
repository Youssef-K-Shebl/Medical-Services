<?php
ob_start();
require '../../config.php';
require BLA . 'includes/header.inc.php';


/*

1-check if the id is sent and numeric. --> Done
2-get row using id. --> Done
3-check if row exists:
    -if exist -> delete the row and display the success message. --> Done
    -if not -> display error message. --> Done
4-redirect to the service index page. --> Done

*/

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $row = getRow("services","service_id",$id);
    if ($row) {
        $successMessage =  dbDelete("services", "service_id", $id);
    } else {
        $errorMessage = "Please Type Correct Data";
    }
    require BL . 'functions/messages.php';

    header("refresh:2;url=".BURLA."services");

} else {
    header("location:".BURLA);
}



require BLA . 'includes/footer.inc.php';

ob_end_flush();