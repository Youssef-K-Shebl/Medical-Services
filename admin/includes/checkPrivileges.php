<?php
if (!$_SESSION['admin_type'] == "super_admin") {
    $errorMessage = "You don't have privileges to access this page";
    require BL.'functions/messages.php';
    header("refresh:2;url=".BURLA.'admins');
    exit();
}