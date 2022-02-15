<?php
ob_start();
require '../../config.php';
require BLA.'includes/header.inc.php';

if ($_SESSION['admin_type'] == "super_admin") {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $data = getRow("admins","admin_id",$id);

        if ($data) {
            $adminId = $data['admin_id'];
            $adminName = $data['admin_name'];
            $adminEmail = $data['admin_email'];
        } else {
            header(BURLA."admins");
        }

    } else {
        header(BURLA."admins");
    }
} else {
    $errorMessage = "You don't have privilege to access this page";
    header("refresh:2;url=".BURLA."admins");
    require BL.'functions/messages.php';
    exit();
}




?>

<div class="col-sm-6 offset-sm-3 border p-3">
    <h3 class="text-center p-3 bg-primary text-white">Edit Service</h3>
    <form method="POST" action="<?php echo BURLA.'admins/update.php'; ?>" >
        <div class="form-group">
            <label >Username</label>
            <input type="text" name="username" value="<?php echo $adminName; ?>" class="form-control" >

            <label >Email</label>
            <input type="email" name="email" value="<?php echo $adminEmail; ?>" class="form-control" >


            <input type="hidden" name="id" value="<?php echo $adminId?>" class="form-control" >
        </div>

        <button type="submit" name="submit" class="btn btn-success">Save</button>
    </form>

</div>

<?php
require BLA.'includes/footer.inc.php';
ob_end_flush();
?>

