<?php

if (!isset($_SESSION['admin_name'])) {
    header("location:".BURLA.'login.php');
}

?>